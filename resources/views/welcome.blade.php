<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="tokenazo" content="{{ csrf_token() }}">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap_simplex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">


    <script src="{{ asset('dist/js/bootstrap.js') }}"></script>

</head>

<body>
    @include('header')
        
    <div class="container">
        @yield('contenido')

    </div>

    @include('footer')

    @yield('scripts')

</body>

</html>