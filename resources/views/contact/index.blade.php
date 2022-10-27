@extends('layouts.app')

@section('content')
    <div class="mtContact px-5">
        {{--multiple Send Modal Start--}}
            <div class="modal fade" id="multipleSendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close border-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="multipleForm">
                            @csrf
                            <input type="text" name="to" class="form-control" placeholder="email send to . . . . ">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="multipleSendBtn">send</button>
                    </div>
                </div>
            </div>
        </div>
        {{--multiple Send Modal End--}}

        <div class="table__scroll">
            <table class="table-light table table-hover table-borderless">
                <thead class="border-1 border-primary">
                    <tr class="text-dark text-opacity-50" style="border-bottom:1px solid #E5E6E7; box-shadow:0 0 20px #E5E6E7"  id="normalHead">
                        <th  id="normalHead"><small>Name</small></th>
                        <th  id="normalHead"><small>Email</small></th>
                        <th  id="normalHead"><small class="text-nowrap">Phone Number</small></th>
                        <th  id="normalHead"><small class="text-nowrap">Job Title & Company</small></th>
                        <th  id="normalHead"><small class="text-nowrap">Job Title & Company</small></th>
                        <th class="position-absolute w-100" style="left:0; top: 0"  id="selectHead">
                            <div class="d-flex px-4 w-100 gap-5 align-items-center" id="selectDeleteContainer">
                                <form class="d-flex align-items-center gap-2 mx-1">
                                    <input type="checkbox" class="selectAll checkBox__style"  id="multipleSelect">
                                </form>

                                <div class="dropdown">

                                    <div class="toggle__hover dropdown-toggle px-3" style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class=" fa fa-ellipsis-vertical "></i>
                                    </div>

                                    <ul class="dropdown-menu py-2 px-1">
                                        <li class="drop__hover rounded-2 px-2 py-1" style="cursor:pointer">
                                            <form id="multipleForm" method="post">
                                                @csrf
                                            </form>
                                            <div id="deleteBtn" class="d-flex gap-5 align-items-center text-secondary">
                                                <i class="fa fa-trash-can text-secondary"></i>
                                                <div>delete</div>
                                            </div>
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1" style="cursor:pointer">
                                            <div id="copyBtn" class="d-flex gap-5 align-items-center text-secondary">
                                                <i class="fa fa-copy text-secondary"></i>
                                                <div>copy</div>
                                            </div>
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1" style="cursor:pointer">
                                            <div id="copyBtn" class="d-flex gap-5 align-items-center text-secondary" data-bs-toggle="modal" data-bs-target="#multipleSendModal">
                                                <i class="fa fa-paper-plane text-secondary"></i>
                                                <div>send</div>
                                            </div>
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1" style="cursor:pointer" >
                                            <div id="noneSelect" class="d-flex gap-5 align-items-center text-secondary text-nowrap">
                                                <i class="fa fa-check-square text-secondary" style="cursor:pointer"></i>
                                                <div>none select</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                @forelse($contacts as $contact)
                    <tr class="align-middle text-start hover__table">
                        <td class="h-100">
                            <div class="d-flex align-items-center w-100 h-100 px-2">
                                <form class="d-flex gap-3 align-items-center h-100 w-100 justify-content-between">
                                    <div class="d-flex justify-content-center align-items-center item__show">
                                        <div class="d-flex align-items-center h-100">
                                            <i class="fa fa-grip-vertical text-secondary check__icons"></i>
                                            <input
                                                class="checkBox__style item__checkbox selectItem mx-3"
                                                onchange="checkStatus(this)"
                                                type="checkbox"
                                                value="{{$contact->id}}"
                                                name="contacts[]"
                                                form="multipleForm" id="selectItem{{$contact->id}}"
                                            />
                                        </div>
                                        <div
                                            class="item__photo d-flex justify-content-between align-items-center"
                                            style="background-color:{{Arr::random($colors)}}"
                                            id="itemPhoto"
                                        >
                                            @if($contact->featured_img === null)
                                                <div class="w-100 text-center fw-bold text-light">
                                                    {{$contact->first_name[0]}}
                                                </div>
                                            @else
                                                <img src="{{asset(Storage::url($contact->featured_img))}}" height="50" width="50" alt="">
                                                @endif

                                            <input type="text" value="{{$contact->id}}" hidden>
                                        </div>
                                    </div>

                                    <label class="w-100 text-start"  style="cursor:pointer" for="selectItem{{$contact->id}}">
                                        <small>{{$contact->first_name}} {{$contact->last_name}}</small>
                                    </label>

                                </form>
                            </div>
                        </td>
                        <td  onclick="window.location='{{route('contact.show', $contact->id)}}'">
                            <div class="w-100">
                                <small>{{$contact->email}}</small>
                            </div>
                        </td>
                        <td onclick="window.location='{{route('contact.show', $contact->id)}}'">
                            <div class="w-100">
                                <small>{{$contact->phone}}</small>
                            </div>
                        </td>
                        <td onclick="window.location='{{route('contact.show', $contact->id)}}'">
                            <div class="w-100">
                                <small>{{$contact->job_title}}</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-5">
                                <a href="{{route("contact.edit", $contact->id)}}" class="icons__hover toggle__hover">
                                    <i class="fa fa-edit text-dark"></i>
                                </a>

                                <div class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close border-0 " data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('send.store') }}" method="POST" id="sendForm">
                                                    @csrf
                                                    <input type="text" name="to" class="form-control" placeholder="email send to . . . . ">
                                                    <input type="number" value="{{$contact->id}}" name="id" hidden>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="sendBtn">send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown">

                                    <div class="icons__hover toggle__hover dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class=" fa fa-ellipsis-vertical "></i>
                                    </div>

                                    <ul class="dropdown-menu py-2 px-1">

                                        <li class="drop__hover rounded-2 px-2 py-1">
                                            <div class="d-flex gap-5 align-items-center text-secondary">
                                                <i class="fa fa-print"></i>
                                                <div>print</div>
                                            </div>
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1">
                                            <a href="{{route('contact.singleExport', $contact->id)}}" class="text-decoration-none d-flex gap-5 align-items-center text-secondary">
                                                <i class="fa fa-cloud-arrow-down"></i>
                                                <div>Export</div>
                                            </a>
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1">
                                            <form id="deleteItemForm" action="{{route('contact.destroy', $contact->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <div class="d-flex gap-5 align-items-center text-secondary" id="deleteItem">
                                                <i class="fa fa-trash-can"></i>
                                                <div>delete</div>
                                            </div>
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1">
                                            <!-- send modal -->
                                            <div class="d-flex gap-5 align-items-center text-secondary" data-bs-toggle="modal" data-bs-target="#sendModal">
                                                <i class="fa fa-paper-plane"></i>
                                                <div>send</div>
                                            </div><!-- send modal end -->
                                        </li>

                                        <li class="drop__hover rounded-2 px-2 py-1">
                                            <a href="{{route('contact.copy', $contact->id)}}" class="text-decoration-none d-flex gap-5 align-items-center text-secondary">
                                                <i class="fa fa-copy"></i>
                                                <div>copy</div>
                                            </a>
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


        <div class="mt-2 d-flex justify-content-end align-items-center">
            <div>
                <small class="mb-0 text-dark">CONTACTS({{\App\Models\Contact::all()->count()}})</small>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        let sendForm = document.getElementById('sendForm');
        let sendBtn = document.getElementById('sendBtn');

        sendBtn.addEventListener('click', ()=> {
            sendForm.submit();
        })
    </script>
@endpush
