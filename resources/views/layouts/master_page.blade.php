<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0-alpha.1
* @link https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="fa" dir="rtl">
<head>
    <base href="{{ url("") }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield("Title")</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/fontface.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/coreui.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/persian-datepicker.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    @yield('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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


@yield('javascript')
<script type="text/javascript" src="{{ asset("js/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/persian-date.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/persian-datepicker.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/sweetalert.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/select2.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/main.js") }}"></script>
</body>
</html>
