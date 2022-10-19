@extends('layouts.app')
@section('content')

    <div class="w-50 px-5">
        <form action="{{ route('contact.store') }}" class="mtContact" enctype="multipart/form-data" method="post">
            @csrf
            <div class="w-100">
                {{--Upload Photo--}}
                <div class=" d-flex justify-content-between align-items-end">
                    <div class="upload__photo__container position-relative" id="featuredImgContainer">
                        <i class="fa fa-camera-alt absolute__icons"></i>
                        <img src="{{asset('profile/profile.png')}}" class="upload__photo" alt="">
                        <input type="file" name="featuredImg" id="featuredImg" hidden>
                        @error('featuredImg') <small class="text-danger text-nowrap">{{$message}}</small> @enderror
                    </div>
                    <div>
                        <button class="btn btn-secondary opacity-50 px-3">save</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex gap-2 w-100">
                <i class="fa fa-user mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="mb-1">
                        <div class="form-floating mb-3">
                            <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="floatingInput" placeholder="First Name">
                            <label for="floatingInput">First Name</label>
                            @error('firstName') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>

                    <div class="mb-1">
                        <div class="form-floating mb-3">
                            <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="floatingInput" placeholder="Last Name">
                            <label for="floatingInput">Last Name</label>
                            @error('lastName') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 w-100">
                <i class="fa fa-building mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="floatingInput" placeholder="Company">
                        <label for="floatingInput">Company</label>
                        @error('company') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="jobTitle" class="form-control @error('jobTitle') is-invalid @enderror" id="floatingInput" placeholder="Job Title">
                        <label for="floatingInput">Job Title</label>
                        @error('jobTitle') <small class="text-danger">{{$message}}</small> @enderror

                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-envelope mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        @error('email') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-phone mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="Phone">
                        <label for="floatingInput">Phone</label>
                        @error('phone') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-calendar mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" id="floatingInput" placeholder="Birthday">
                        <label for="floatingInput">Birthday</label>
                        @error('birthday') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-note-sticky mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="text" name="note" class="form-control  @error('note') is-invalid @enderror" id="floatingInput" placeholder="Note">
                        <label for="floatingInput">Note</label>
                        @error('note') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>

        </form>
    </div>

    @endsection
