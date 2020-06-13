@php
use Hekmatinasser\Verta\Verta;
@endphp

@extends('layouts.Home_layout')

@section("backgroundCss","")

@section('content')
    <header class="">
           <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#">سامانه شفافیت پروژه های عمرانی </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" data-scroll href="{{ route("Home") }}">خانه </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            پروژه ها
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($category as $cat)
                            <a class="dropdown-item" href="{{ route("category",["id"=>$cat->id]) }}">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("show_login_vip") }}" >کاربران ویژه</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{ route("Home") }}" name="search" method="get">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="جستجو پروژه" aria-label="جستجو">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">بگرد</button>
                </form>
            </div>
        </nav>
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
        <div class="container card">
            <div class="clearfix">&nbsp;</div>

            <h4>لیست پروژه ها</h4>
            <hr>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        @php
                            $counter=0;
                        @endphp
                        @foreach($projects as $item)
                            @php
                                if($counter >=2){
                                        echo '<div class="w-100"></div>';
                                        $counter=1;
                                    }else{
                                        $counter++;
                                    }

                                    $startDate = Verta::parse($item->start_date);
                                    $today = new Verta();
                                    $endDate = Verta::parse($item->end_date);
                            @endphp
                            <div class="col-lg">
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
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
@endsection

@section('javascript')
@endsection
