@extends('layouts.app')

@section('content')
    <div class="mtContact px-5">
        <table class="table-light table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Job Title & Company</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($contacts as $contact)
                    <tr class="align-middle text-center">
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($contact->featured_img == null)
                                    <img src="{{asset('profile/profile.png')}}" height="40" width="40" class="rounded-circle" alt="">
                                @else
                                    <img src="{{asset(Storage::url($contact->featured_img))}}" height="40" width="40" class="rounded-circle" alt="">
                                @endif
                                {{$contact->first_name}} {{$contact->last_name}}
                            </div>
                        </td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->job_title}}</td>
                        <td>
                            <div class="d-flex align-items-center gap-5">
                                <a href="{{route("contact.edit", $contact->id)}}">
                                    <i class="fa fa-edit text-dark"></i>
                                </a>
                                <div class="dropdown">

                                    <i class="fa fa-ellipsis-vertical dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <form id="delete" action="{{route('contact.destroy', $contact->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm w-100 border-0">delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">There is no Contact</td>
                    </tr>

                    @endforelse
            </tbody>
        </table>
    </div>
@endsection
