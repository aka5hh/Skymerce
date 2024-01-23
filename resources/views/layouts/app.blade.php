<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets\css\font-awesome.min.css') }}" rel="stylesheet"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets\css\custom.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div id="app">


        @include('layouts.inc.frontend.navbar')

      
        <main>
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets\js\jquery-3.7.1.min.js') }}" defer></script>
    <script src="{{ asset('assets\js\bootstrap.bundle.min.js') }}" defer></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireScripts
</body>

</html>
