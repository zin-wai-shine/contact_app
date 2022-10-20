@extends('layouts.app')

@section('content')
    <div class="mtContact px-5">
        <div class="d-flex gap-2 px-2 w-100 gap-5 align-items-center">
            <input type="checkbox" class="selectAll checkBox__style"  id="multipleSelect">
            <form action="{{route('multipleDelete')}}" id="multipleDelete" method="post">
                @csrf
                <button class="btn btn-secondary btn-sm" id="deleteBtn"><i class="fa fa-trash-can"></i></button>
            </form>
        </div>
        <table class="table-light table table-hover table-borderless">
            <thead>
                <tr class="text-primary">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Job Title & Company</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($contacts as $contact)
                        <tr class="align-middle text-start hover__table">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex gap-2 align-items-center w-100">
                                        <div class="d-flex justify-content-center align-items-center item__show">
                                            <input class="checkBox__style item__checkbox" type="checkbox" value="{{$contact->id}}" name="contacts[]" form="multipleDelete" id="selectItem">
                                            <div class="item__photo" id="itemPhoto" style="background-image:url(
                                            {{ $contact->featured_img == null ? asset('profile/profile.png') : asset(Storage::url($contact->featured_img)) }}
                                                )">
                                            </div>
                                        </div>

                                        <div class="w-100" onclick="window.location='{{route('contact.show', $contact->id)}}'">
                                            {{$contact->first_name}} {{$contact->last_name}}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td  onclick="window.location='{{route('contact.show', $contact->id)}}'">
                                    <div class="w-100">
                                        {{$contact->email}}
                                    </div>
                            </td>
                            <td onclick="window.location='{{route('contact.show', $contact->id)}}'">
                                    <div class="w-100">
                                        {{$contact->phone}}
                                    </div>
                            </td>
                            <td onclick="window.location='{{route('contact.show', $contact->id)}}'">
                                    <div class="w-100">
                                        {{$contact->job_title}}
                                    </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-5">
                                    <a href="{{route("contact.edit", $contact->id)}}" class="icons__hover toggle__hover">
                                        <i class="fa fa-edit text-dark"></i>
                                    </a>
                                    <div class="dropdown">

                                       <div class="icons__hover toggle__hover dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                           <i class=" fa fa-ellipsis-vertical "></i>
                                       </div>

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
                <h6 class="mb-0 text-dark">CONTACTS({{\App\Models\Contact::all()->count()}})</h6>
            </div>
        </div>
    </div>
@endsection
