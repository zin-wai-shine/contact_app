<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@guest
    <div class="d-flex align-items-center justify-content-between gap-5 p-2">
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-primary rounded-circle item__photo d-flex justify-content-center align-items-center">
                    <i class="fa fa-user text-light"></i>
                </div>
                <h5 class="mb-0 text-secondary fw-light">Contacts</h5>
            </div>
        </div>

      <div class="d-flex align-items-center justify-content-center gap-2">
          @if (\Illuminate\Support\Facades\Route::has('login'))
              <a class=" btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
          @endif
          @if (\Illuminate\Support\Facades\Route::has('register'))
              <a class=" btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endif
      </div>


    </div>

    <div class="p-2 w-100">
        @yield('content')
    </div>
@else
    @include('layouts.nav')
    <div class="d-flex">
        @include('layouts.sidebar')
        <div class="p-2 w-100">
            @yield('content')
        </div>
    </div>
@endguest

@stack('script')

</body>
</html>
