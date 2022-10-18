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
                        <tr class="align-middle text-start">
                            <td>
                                <a href="{{route('contact.show', $contact->id)}}" class="text-decoration-none text-dark">
                                    <div class="d-flex align-items-center gap-3">
                                        @if($contact->featured_img == null)
                                            <img src="{{asset('profile/profile.png')}}" height="40" width="40" class="rounded-circle" alt="">
                                        @else
                                            <img src="{{asset(Storage::url($contact->featured_img))}}" height="40" width="40" class="rounded-circle" alt="">
                                        @endif
                                        {{$contact->first_name}} {{$contact->last_name}}
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('contact.show', $contact->id)}}" class="text-decoration-none text-dark">
                                    <div class="w-100">
                                        {{$contact->email}}
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('contact.show', $contact->id)}}" class="text-decoration-none text-dark">
                                    <div class="w-100">
                                        {{$contact->phone}}
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('contact.show', $contact->id)}}" class="text-decoration-none text-dark">
                                    <div class="w-100">
                                        {{$contact->job_title}}
                                    </div>
                                </a>
                            </td>
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

        <div class="mt-2 d-flex justify-content-between align-items-center">
            <div>
                {{$contacts->onEachSide(1)->links()}}
            </div>
            <div>
                <h6 class="mb-0 text-dark">contacts({{\App\Models\Contact::all()->count()}})</h6>
            </div>
        </div>
    </div>
@endsection
