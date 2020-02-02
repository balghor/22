@php
use Hekmatinasser\Verta\Verta;
@endphp

@extends('layouts.Home_layout')

@section("backgroundCss","")

@section('content')
    <header class="c-header c-header-light c-header-fixed px-3" style="background-color: #f8ac06;">
        <a class="c-header-brand" href="#">سازمان عمران شهرداری مشهد</a>
        <div class="c-header-nav">
            <a class="c-header-nav-item c-header-nav-link" data-scroll href="#home">خانه</a>
            <a class="c-header-nav-item c-header-nav-link" data-scroll href="#projects">پروژه ها</a>
            <a class="c-header-nav-item c-header-nav-link" href="#">کاربران ویژه</a>
        </div>
    </header>
<div id="home" class="homeBody">
    <div class="container-fluid">
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
        <div class="container-fluid">
            <div class="row">
                @foreach($projects as $item)
                    @php
                        $startDate = Verta::parse($item->start_date);
                        $today = new Verta();
                        $endDate = Verta::parse($item->end_date);
                    @endphp
                    <div class="col-sm">
                    <div class="card" style="height: 25rem">
                        <div class="card-header"><span class="c-icon cil-list"></span>&nbsp;{{ $item->project_name }}</div>
                        <div class="card-body">
                            <div class="card-img-top text-center align-content-center">
                                @php
                                    $arrImage = @trim($item->album,"[]\"");
                                    $pic = @explode(",",$arrImage);
                                @endphp
                                @if(@count($pic) && trim($pic[0])!="")
                                    <img src="{{ url("uploads/".$pic[0]) }}" style="width: 100%;height: 150px" >
                                    @else
                                    <div class="cil-image1" style="width: 100%;height: 150px;font-size: 10rem;color: #d69405"></div>
                                @endif
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="card-text">
                                @if(strlen($item->description)>100)
                                    {{ mb_substr($item->description,0,100)." ..." }}
                                    @else
                                    {{ $item->description }}

                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="text-muted">
                                <span class="c-icon cil-av-timer"></span>
                                <span class="">{{ $today->diffDays($endDate) }}    روز تا پایان </span>
                            </span>
                            &middot;
                            <a class="btn btn-sm btn-outline-primary" href="{{ route("projectShow",$item)  }}">مشاهده</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
@endsection

@section('javascript')

    <script>
        var scroll = new SmoothScroll('a[href*="#"]', {
            speed: 500,
            speedAsDuration: true
        });
    </script>
@endsection
