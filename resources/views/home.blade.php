@extends('layouts.app')
@section('content')
    <div class="mtContact">
        <form action="{{route('contact.import')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv_file">
            <button>CSV</button>
        </form>
    </div>
@endsection
