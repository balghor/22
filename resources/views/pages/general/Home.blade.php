@php
use Hekmatinasser\Verta\Verta;
@endphp

@extends('layouts.Home_layout')

@section("backgroundCss","")

@section('content')
    <header class="c-header c-header-light c-header-fixed px-3" style="background-color: #f8ac06;">
        <a class="c-header-brand" href="#">سامانه شفافیت پروژه های عمرانی </a>
        <div class="c-header-nav">
            <a class="c-header-nav-item c-header-nav-link" data-scroll href="#home">خانه</a>
            <a class="c-header-nav-item c-header-nav-link" data-scroll href="#projects">پروژه ها</a>
            <a class="c-header-nav-item c-header-nav-link" href="{{ route("show_login_vip") }}">کاربران ویژه</a>
        </div>
    </header>
<div id="home" class="homeBody">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-4 col-xl-4 align-content-sm-center align-content-xl-center align-content-lg-center align-content-md-center">
                <img class="" src="{{ asset("/public/img/omranlogo2.png") }}" width="444" height="431">
                <h5 class="text-center text-white mt-5"> اجرا : سازمان عمران شهرداری مشهد </h5>

            </div>
            <div class="col-lg-8 col-xl-5 mt-5">
                        <div class="w-100"></div>
                        <div class="d-flex">
                            <div class="p-5">
                                <h3 class="text-center text-white ">سامانه شفافیت پروژه های عمرانی شهرداری مشهد  </h3>
                                <h2 class="text-center text-white mt-5" >رصد عملکرد خادمان عمرانی مشهد </h2>
                            </div>
                        </div>

            </div>
        </div>
    </div>
</div>
    <div class="clearfix"></div>
    <div id="projects">
        <div class="clearfix">&nbsp;</div>
        <div class="container">
            <div class="row">
                @php
                $counter=0;
                @endphp
                @foreach($projects as $item)
                    @php
                    if($counter >=4){
                            echo '<div class="w-100"></div>';
                            $counter=1;
                        }else{
                            $counter++;
                        }

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
                                    $pic = @explode("\",\"",$arrImage);
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
                                @if($today->diffDays($endDate)>=0)
                                <span class="">{{ $today->diffDays($endDate) }}    روز تا پایان </span>
                                    @else
                                    <span class="">روزشمار اتمام یافته</span>
                                @endif
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
        $('#loginmodal').modal()
    </script>
@endsection
