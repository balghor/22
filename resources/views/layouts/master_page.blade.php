<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0-alpha.1
* @link https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
@section("Title","سازمان عمران شهرداری مشهد")

<html lang="fa" dir="rtl">
<head>
    <base href="{{ url("") }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield("Title")</title>
    <link rel="apple-touch-icon" sizes="57x57" href="public/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="public/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="public/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="public/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="public/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="public/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="public/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="public/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="public/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="public/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="public/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/favicon/favicon-16x16.png">
    <link rel="manifest" href="public/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('public/css/fontface.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/coreui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/persian-datepicker.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    @yield('css')
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>



<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    @include('shared.nav-builder')

    @include('shared.header')

    <div class="c-body">

        <main class="c-main">

            @yield('content')

        </main>
    </div>
    @include('shared.footer')
</div>


<script type="text/javascript" src="{{ asset("public/js/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/persian-datepicker.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/sweetalert.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/select2.min.js") }}"></script>
@yield('javascript')
<script type="text/javascript" src="{{ asset("public/js/main.js") }}"></script>
</body>
</html>
