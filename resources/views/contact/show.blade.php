@extends('layouts.app')
@section('content')

    <div class="w-50 px-5">
        <form action="{{route('contact.update', $contact->id)}}" class="mtContact" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="w-100">
                {{--Upload Photo--}}
                <div class="d-flex gap-5 align-items-center" >
                    <div class="upload__photo__container" id="featuredImgContainer">
                        @if($contact->featured_img == null)
                            <img src="{{asset('profile/profile.png')}}" class="upload__photo" alt="">
                        @else
                            <img src="{{asset(Storage::url($contact->featured_img))}}" class="upload__photo" alt="">
                        @endif

                        <input type="file" name="featured_img" id="featuredImg" hidden>
                        @error('featuredImg') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div>
                        <h6>Name : {{$contact->first_name}} {{$contact->last_name}}</h6>
                        @if($contact->email != null)
                            <h6>Email : {{$contact->email}}</h6>
                            @endif
                        <h6>Phone : {{$contact->phone}}</h6>
                    </div>
                </div>
            </div>
            <hr>

        </form>
    </div>

@endsection

