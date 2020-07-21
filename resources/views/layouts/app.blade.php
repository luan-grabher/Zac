<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-dark text-light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/sp-1.0.1/datatables.min.js"></script>
@include("js.js")


<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/9534ff476f.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/sp-1.0.1/datatables.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body class="bg-dark text-light">
<div id="app">
    @if (!isset($hideNav))
    @include('layouts.nav')
    @endif

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
