@extends('layouts.app')
@section('content')

    <div class="mtContact w-50">
        {{--Upload Photo--}}
        <div class="px-5 d-flex justify-content-between align-items-end">
            <div class="">
                <img src="{{asset('profile/profile.png')}}"class="upload__photo" alt="">
            </div>
            <div>
                <button class="btn btn-secondary opacity-50 px-3">save</button>
            </div>
        </div>
    </div>
    <hr>

    <div class="w-50 px-5">
        <form action="" method="post">
            @csrf

           <div class="d-flex gap-2 w-100">
               <i class="fa fa-user mt-3 text-secondary"></i>
               <div class="w-100">
                   <div class="mb-1">
                       <div class="form-floating mb-3">
                           <input type="text" name="firstName" class="form-control" id="floatingInput" placeholder="First Name">
                           <label for="floatingInput">First Name</label>
                       </div>
                   </div>

                   <div class="mb-1">
                       <div class="form-floating mb-3">
                           <input type="text" name="lastName" class="form-control" id="floatingInput" placeholder="Last Name">
                           <label for="floatingInput">Last Name</label>
                       </div>
                   </div>
               </div>
           </div>


            <div class="d-flex gap-2 w-100">
                <i class="fa fa-building mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="text" name="company" class="form-control" id="floatingInput" placeholder="Company">
                        <label for="floatingInput">Company</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="jobTitle" class="form-control" id="floatingInput" placeholder="Job Title">
                        <label for="floatingInput">Job Title</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-envelope mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-phone mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Phone">
                        <label for="floatingInput">Phone</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-calendar mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-1 w-100">
                <i class="fa fa-note-sticky mt-3 text-secondary"></i>
                <div class="w-100">
                    <div class="form-floating mb-3">
                        <input type="text" name="birthday" class="form-control" id="floatingInput" placeholder="Birthday">
                        <label for="floatingInput">Birthday</label>
                    </div>
                </div>
            </div>


        </form>
    </div>

    @endsection
