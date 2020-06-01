<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0-alpha.1
* @link https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
@section("Title","سامانه شفافیت پروژه های عمرانی ")

<html lang="fa" dir="rtl">
<head>
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
    <link rel="manifest" href="public/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('public/css/fontface.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/coreui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/flipdown.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/Chart.min.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    @yield('css')
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset("public/js/smooth-scroll.polyfills.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("public/js/core.js") }}"></script>
    <script type="text/javascript" src="{{ asset("public/js/charts.js") }}"></script>
    <script type="text/javascript" src="{{ asset("public/js/material.js") }}"></script>
    <script type="text/javascript" src="{{ asset("public/js/animated.js") }}"></script>
</head>



<body class="c-app @yield("backgroundCss")">


            @yield('content')

    @include('shared.footer')

@yield('javascript')
<script type="text/javascript" src="{{ asset("public/js/flipdown.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/swiper.min.js") }}"></script>
            <script>
                var swiper = new Swiper('.swiper-container', {
                    spaceBetween: 30,
                    centeredSlides: true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            </script>
</body>
</html>
