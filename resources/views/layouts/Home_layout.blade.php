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
<script type="text/javascript" src="{{ asset("public/js/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/popper.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/coreui.min.js") }}"></script>

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
