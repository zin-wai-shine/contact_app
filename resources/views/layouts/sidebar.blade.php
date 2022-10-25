<div class="sidebar__container">
    <div class="mtContact p-1">
        <a href="{{route('contact.create')}}" class="text-decoration-none">
            <button class="create__btn d-flex bg-secondary bg-opacity-10 justify-content-center gap-3 align-items-center px-3 border-0 mt-4">
                <svg width="36" height="36" viewBox="0 0 36 36">
                    <path fill="#34A853" d="M16 16v14h4V20z"></path>
                    <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
                    <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
                    <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
                    <path fill="none" d="M0 0h36v36H0z"></path></svg>
                <small class="mb-0">Create Contact</small>
            </button>
        </a>

        <div class="mt-3">
            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-user"></i>
                        <small class="mb-0 text-dark">Contacts</small>
                        <div class="text-dark">{{\App\Models\Contact::all()->count()}}</div>
                    </div>
                </a>
            </div>

            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-clock-rotate-left"></i>
                        <small class="mb-0 text-dark text-nowrap">Frequently Contacted</small>
                    </div>
                </a>
            </div>

            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-paper-plane"></i>
                        <small class="mb-0 text-dark text-nowrap">Merge & Fix</small>
                    </div>
                </a>
            </div>
        </div>

        <hr>

        <div>
            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-plus"></i>
                        <small class="mb-0 text-dark text-nowrap">Create Label</small>
                    </div>
                </a>
            </div>
        </div>

        <hr>

        <div>
            <div class="sidebar__item__container">
                <div class="text-decoration-none text-light w-100" >
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu class="data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="text-secondary fa fa-box-tissue"></i>
                        <small class="mb-0 text-dark text-nowrap">Import</small>

                        <!--Import Modal Start-->
                            <div class="modal" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered text-dark">
                                <div class="modal-content p-3">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex flex-column gap-3 align-items-center">
                                            <h5 class="text-dark">Import Contacts</h5>
                                            <small>To import contacts, select a CSV </small>

                                            <div>
                                                <form action="{{route('contact.import')}}" id="importForm" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="csv_file" hidden id="csvInput">
                                                </form>
                                            </div>

                                            <button data-bs-toggle="popover" class="btn btn-primary" id="getCsvFile">Get CSV File</button>
                                            @error('csv_file') <small class="text-danger">{{$message}}</small> @enderror
                                            <div id="csvName" class="fw-bold text-primary"></div>
                                            <div class="mt-5 d-flex align-items-center gap-5">
                                                <button type="button" data-bs-dismiss="modal" class="border-0 bg-light text-danger" >Cancel</button>
                                                <button class="border-0 bg-light text-success" form="importForm">Import</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Import Modal End-->
                    </div>
                </div>
            </div>

            <div class="sidebar__item__container">
                <div class="text-decoration-none text-light w-100" >
                    <div class="w-100  d-flex px-3 py-2 align-items-center sidebar__menu" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="text-secondary fa fa-boxes-packing"></i>
                        <small class="mb-0 text-dark text-nowrap" style="margin-left: 43px">Export</small>

                        <!--Export Modal Start-->
                        <div class="modal" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered text-dark">
                                <div class="modal-content p-3">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex flex-column gap-3 align-items-center">
                                            <h5 class="text-dark">Export Contacts</h5>
                                            <div class="d-flex flex-column gap-4 align-items-center">
                                                <a href="{{route("contact.export")}}" class="text-decoration-none text-dark">
                                                    <button class="btn btn-warning btn-sm mx-5">export all contacts</button>
                                                </a>

                                                <a href="" class="text-decoration-none text-dark">
                                                    <button class="btn btn-primary btn-sm mx-5">export only selected contacts</button>
                                                </a>
                                            </div>
                                            <div id="csvName" class="fw-bold text-primary"></div>
                                            <div class="mt-5 d-flex align-items-center gap-5">
                                                <button type="button" class="border-0 bg-light text-danger" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Export Modal End-->
                    </div>
                </div>
            </div>

            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-print"></i>
                        <small class="mb-0 text-dark text-nowrap">Print</small>
                    </div>
                </a>
            </div>

        </div>

        <div>
            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-inbox"></i>
                        <small class="mb-0 text-dark text-nowrap">Other Contact</small>
                    </div>
                </a>
            </div>

            <div class="">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                    <div class="w-100  d-flex px-3 py-2 gap-5 align-items-center sidebar__menu">
                        <i class="text-secondary fa fa-trash"></i>
                        <small class="mb-0 text-dark text-nowrap">Trash</small>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
