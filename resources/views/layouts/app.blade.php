<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact App</title>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dropdown-toggle::after{
            content:none;
        }
    </style>
</head>
<body class="bg-light">

    @include('layouts.nav')
    <div class="d-flex">
        @include('layouts.sidebar')
        <div class="p-2 w-100">
            @yield('content')
        </div>
    </div>

</body>
</html>
