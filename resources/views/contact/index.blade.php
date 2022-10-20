@extends('layouts.app')

@section('content')
    <div class="mtContact px-5">
        <div class="d-flex gap-1 px-4 w-100 gap-5 align-items-center">
            <form class="d-flex align-items-center gap-2 mx-1">
                <input type="checkbox" class="selectAll checkBox__style"  id="multipleSelect">
                <label class="mb-0 h5" for="multipleSelect"> <i class="fa fa-list"></i></label>
            </form>
            <form action="{{route('multipleDelete')}}" id="multipleDelete" method="post">
                @csrf
            </form>
            <div id="deleteBtn"><i class="fa fa-trash-can h5 icons__hover"></i></div>
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
                                <div class="d-flex align-items-center w-100">
                                    <form class="d-flex gap-3 align-items-center w-100 justify-content-between">
                                            <div class="d-flex justify-content-center align-items-center item__show">
                                               <div class="d-flex align-items-center gap-2">
                                                   <i class="fa fa-grip-vertical text-secondary check__icons"></i>
                                                   <input
                                                       class="checkBox__style item__checkbox selectItem"
                                                       onchange="checkStatus(this)"
                                                       type="checkbox"
                                                       value="{{$contact->id}}"
                                                       name="contacts[]"
                                                       form="multipleDelete" id="selectItem{{$contact->id}}"
                                                   />
                                               </div>
                                                <div class="item__photo " id="itemPhoto" style="background-image:url(
                                                {{ $contact->featured_img == null ? asset('profile/profile.png') : asset(Storage::url($contact->featured_img)) }}
                                                    )">
                                                    <input type="text" value="{{$contact->id}}" hidden>
                                                </div>
                                            </div>

                                            <label class="w-100" for="selectItem{{$contact->id}}">
                                                {{$contact->first_name}} {{$contact->last_name}}
                                            </label>

                                    </form>
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

                                        <ul class="dropdown-menu py-2">

                                            <li class="drop__hover px-2 py-1">
                                                <div class="d-flex gap-5 align-items-center text-secondary">
                                                    <i class="fa fa-print"></i>
                                                    <div>print</div>
                                                </div>
                                            </li>

                                            <li class="drop__hover px-2 py-1">
                                                <div class="d-flex gap-5 align-items-center text-secondary">
                                                    <i class="fa fa-cloud-arrow-down"></i>
                                                    <div>Export</div>
                                                </div>
                                            </li>

                                            <li class="drop__hover px-2 py-1">
                                                <div class="d-flex gap-5 align-items-center text-secondary">
                                                    <i class="fa fa-box-archive"></i>
                                                    <div class="text-nowrap">hide from contants</div>
                                                </div>
                                            </li>

                                            <li class="drop__hover px-2 py-1">
                                                <form id="deleteItemForm" action="{{route('contact.destroy', $contact->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <div class="d-flex gap-5 align-items-center text-secondary" id="deleteItem">
                                                    <i class="fa fa-trash-can"></i>
                                                    <div>delete</div>
                                                </div>
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
