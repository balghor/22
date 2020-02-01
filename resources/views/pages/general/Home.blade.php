@extends('layouts.Home_layout')

@section("backgroundCss","")

@section('content')
<div id="home" class="homeBody">
    <div class="container-fluid">
        <header class="c-header c-header-light px-3" style="background-color: #f8ac06;">
            <a class="c-header-brand" href="#">سازمان عمران شهرداری مشهد</a>
            <div class="c-header-nav">
                <a class="c-header-nav-item c-header-nav-link" href="#">خانه</a>
                <a class="c-header-nav-item c-header-nav-link" href="#">پروژه ها</a>
                <a class="c-header-nav-item c-header-nav-link" href="#">کاربران ویژه</a>
            </div>
        </header>
        <div class="row mt-5">
            <div class="col-sm-4">
                <img class="" src="{{ asset("/public/img/omranlogo1.png") }}" width="444" height="431">
            </div>
            <div class="col-sm-5 mt-5">

                        <h3 class="text-center text-white ">سامانه اطلاع رسانی پروژه ها و شفافیت عملکرد</h3>
                        <h5 class="text-center text-white ">سازمان عمران شهرداری مشهد</h5>

            </div>
        </div>
    </div>
</div>
    <div class="clearfix"></div>
    <div id="projects">
        <div class="clearfix">&nbsp;</div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 18rem">
                        <div class="card-header">پروژه ۱</div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div><div class="col">
                    <div class="card" style="width: 18rem">
                        <div class="card-header">پروژه ۱</div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div><div class="col">
                    <div class="card" style="width: 18rem">
                        <div class="card-header">پروژه ۱</div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div><div class="col">
                    <div class="card" style="width: 18rem">
                        <div class="card-header">پروژه ۱</div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
