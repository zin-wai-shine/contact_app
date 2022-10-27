@extends('layouts.app')
@section('content')

    <div class="w-50 px-5 mtContact">
        <div class="w-100">
            {{--Upload Photo--}}
            <div class="d-flex gap-5 align-items-end" >
                <div class="d-flex gap-5 align-items-center">
                    <div class="upload__photo__container" style="background-image:url(
                    {{ $contact->featured_img == null ? asset('profile/profile.png') : asset(Storage::url($contact->featured_img)) }}
                        )">
                    </div>
                    <div>
                        <h6>From : {{ $send->from }}</h6>
                        <h6>To : {{$send->to}}</h6>
                        <h6>Name : {{$contact->first_name}} {{$contact->last_name}}</h6>
                        @if($contact->email != null)
                            <h6>Email : {{$contact->email}}</h6>
                        @endif
                        <h6>Phone : {{$contact->phone}}</h6>
                    </div>
                </div>

                <div>
                    <a href="{{route('send.index')}}">
                        <button class="btn btn-secondary px-3 btn-sm "><i class="fa fa-arrow-left"></i></button>
                    </a>
                </div>
            </div>
        </div>
        <hr>
    </div>

@endsection

