@extends('layouts.Home_layout')

@section("backgroundCss","")

@section('content')
    <header class="c-header c-header-light c-header-fixed px-3" style="background-color: #f8ac06;">
        <a class="c-header-brand" href="#">سازمان عمران شهرداری مشهد</a>
        <div class="c-header-nav">
            <a class="c-header-nav-item c-header-nav-link" data-scroll href="{{ route("Home") }}#home">خانه</a>
            <a class="c-header-nav-item c-header-nav-link" data-scroll href="{{ route("Home") }}#projects">پروژه ها</a>
            <a class="c-header-nav-item c-header-nav-link" href="{{ route("show_login_vip") }}">کاربران ویژه</a>
        </div>
    </header>
    <div class="c-main">
        <div id="pr">
            <div class="clearfix">&nbsp;</div>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            @php
                                $startDate = Verta::parse($project->start_date);
                                $today = new Verta();
                                $endDate = Verta::parse($project->end_date);
                            @endphp
                            <div class="card-header"><h3>{{ $project->project_name }}</h3></div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-4 col bg-light rounded">
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-5">تاریخ شروع:</div>
                                        <div class="col-7"><b>{{ $project->start_date }}</b></div>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-5">تاریخ اتمام:</div>
                                        <div class="col-7"><b>{{ $project->end_date }}</b></div>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-5">مدت زمان پروژه:</div>
                                        <div class="col-7"><b>{{ $startDate->diffDays($endDate) }} روز </b></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">{{ $project->description }}</div>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9 col-lg-8 col">
                                    <div class="row">
                                        <div class="col align-content-lg-center align-content-center align-content-md-center align-content-xl-center align-content-sm-center">
                                            <div id="flipdown" class="flipdown "></div>
                                        </div>
                                    </div>
                                        <div class="w-100"></div>
                                    <script type="text/javascript">
                                        document.addEventListener('DOMContentLoaded', () => {
                                            @php
                                               $v = new \Carbon\Carbon($endDate->formatGregorian('Y-m-d')." 07:30:00");
                                            @endphp
                                            // Unix timestamp (in seconds) to count down to
                                            var twoDaysFromNow = ({{ $v->getTimestamp() }});

                                            // Set up FlipDown
                                            var flipdown = new FlipDown(twoDaysFromNow)

                                                // Start the countdown
                                                .start()

                                                // Do something when the countdown ends
                                                .ifEnded(() => {
                                                    console.log("روزشمار به اتمام رسیده است")
                                                });
                                            body.querySelector('#flipdown').classList.toggle('flipdown__theme-dark');

                                            // Show version number
                                            var ver = document.getElementById('ver');
                                            ver.innerHTML = flipdown.version;
                                        });
                                    </script>
                                    <div class="clearfix">&nbsp;</div>
                                    <hr>
                                    <div class="clearfix">&nbsp;</div>
                                    <!-- Swiper -->
                                    @php
                                        $arrImage = @trim($project->album,"[]\"");
                                        $pic = @explode("\",\"",$arrImage);
                                    @endphp
                                    @if(@count($pic) && trim($pic[0])!="")
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($pic as $key=>$value)
                                                <div class="swiper-slide"><img src="{{ url("/uploads/".$value) }}" style="width: 100%;height: 400px" ></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                        @endif
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="w-100"></div>
                            <div class="row">
                                <div class="container">
                                    <div class="col-12 fillbackpie rounded">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">   پیشرفت فیزیکی
                                                    <script>
                                                        am4core.ready(function() {

                                                            var chart = am4core.create("physicalpie", am4charts.PieChart3D);
                                                            var colorSet = new am4core.ColorSet();
                                                            colorSet.list = ["#388E3C", "#FBC02D", "#0288d1", "#F44336", "#8E24AA"].map(function(color) {
                                                                return new am4core.color(color);
                                                            });

                                                            chart.rtl=true;
                                                            chart.data = [
                                                                {
                                                                    done: "کار انجام شده",
                                                                    precent: {{ $project->physical_progress }}
                                                                },{
                                                                    done: "کار انجام نشده",
                                                                    precent: {{ (100-$project->physical_progress) }}
                                                                }
                                                            ];

                                                            var series = chart.series.push(new am4charts.PieSeries3D());
                                                            series.dataFields.value = "precent";
                                                            series.dataFields.category = "done";

                                                            // this creates initial animation
                                                            series.hiddenState.properties.opacity = 0;
                                                            series.labels.template.disabled = true;
                                                            series.ticks.template.disabled = true;
                                                            series.colors = colorSet;
                                                            chart.legend = new am4charts.Legend();

                                                        });
                                                    </script>

                                                    <div id="physicalpie" style="width: 100%;height: 400px; margin: 0 auto"></div>

                                                </div>
                                                <div class="col ">
                                                    زمان پروژه
                                                    <script>
                                                        am4core.ready(function() {

                                                            var charttime = am4core.create("timepie", am4charts.PieChart3D);
                                                            var colorSet = new am4core.ColorSet();
                                                            colorSet.list = ["#8e0200", "#FBC02D"].map(function(color) {
                                                                return new am4core.color(color);
                                                            });
                                                            charttime.rtl=true;
                                                            charttime.data = [
                                                                {
                                                                    done: "زمان گذشته",
                                                                    precent: @php
                                                                        if ($startDate->diffDays($endDate)>0){
                                                                                if ($startDate->diffDays($today)>0){
                                                                                    echo(round(($startDate->diffDays($today)/$startDate->diffDays($endDate))*100));
                                                                                }else{
                                                                                    echo "0";
                                                                                }
                                                                            }else{
                                                                                echo "0";
                                                                            }
                                                                    @endphp
                                                                },{
                                                                    done: "زمان باقیمانده",
                                                                    precent: @php
                                                                        if ($startDate->diffDays($endDate)>0){
                                                                                if ($startDate->diffDays($today)>0){
                                                                                    echo(100-round(($startDate->diffDays($today)/$startDate->diffDays($endDate))*100));
                                                                                }else{
                                                                                    echo "0";
                                                                                }
                                                                            }else{
                                                                                echo "0";
                                                                            }
                                                                    @endphp
                                                                }
                                                            ];

                                                            var series = charttime.series.push(new am4charts.PieSeries3D());
                                                            series.dataFields.value = "precent";
                                                            series.dataFields.category = "done";

                                                            // this creates initial animation
                                                            series.hiddenState.properties.opacity = 0;
                                                            series.labels.template.disabled = true;
                                                            series.ticks.template.disabled = true;
                                                            series.colors = colorSet;
                                                            charttime.legend = new am4charts.Legend();

                                                        });
                                                    </script>

                                                    <div id="timepie" style="width: 100%;height: 400px; margin: 0 auto"></div>
                                                </div>
                                                @if(session()->has("VIPLogin"))
                                                    <div class="col">
                                                    پیشرفت ریالی
                                                    <script>
                                                        am4core.ready(function() {
                                                            var chartcost = am4core.create("costpie", am4charts.PieChart3D);
                                                            var colorSet = new am4core.ColorSet();
                                                            colorSet.list = ["#0c6a8e", "#FBC02D"].map(function(color) {
                                                                return new am4core.color(color);
                                                            });
                                                            chartcost.rtl=true;
                                                            chartcost.data = [
                                                                {
                                                                    done: "صورت وضعیت تایید شده",
                                                                    precent: {{ $project->cost }}
                                                                },{
                                                                    done: "الباقی",
                                                                    precent: {{ 100 - $project->cost }}
                                                                }
                                                            ];

                                                            var series = chartcost.series.push(new am4charts.PieSeries3D());
                                                            series.colors= colorSet;
                                                            series.dataFields.value = "precent";
                                                            series.dataFields.category = "done";

                                                            // this creates initial animation
                                                            series.hiddenState.properties.opacity = 0;
                                                            series.labels.template.disabled = true;
                                                            series.ticks.template.disabled = true;
                                                            chartcost.legend = new am4charts.Legend();

                                                        });
                                                    </script>

                                                    <div id="costpie" style="width: 100%;height: 400px; margin: 0 auto"></div>
                                                </div>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        {!! $project->detail !!}
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <ul class="card">
                                                            @foreach($comments as  $Com)
                                                                @if($Com->parents==0)
                                                                    <li class="p-3"><b>{{ $Com->fullname }}:</b> {{ $Com->context }}<ul>
                                                                            @foreach($comments as $reply)
                                                                                @if($Com->id == $reply->parents)
                                                                                    <li class="card"><b>{{ $reply->fullname }}:</b> {{ $reply->context }}</li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-6 border-right">
                                                            <div class="row">
                                                                <div class="col-12 pr-4">
                                                                    <h4>ثبت انتقادات ، نظرات یا پیشنهادات</h4>
                                                                    <hr>
                                                                    @if(session("StateOK"))
                                                                        <div class="alert alert-success" role="alert">
                                                                            {{ session("StateOK") }}
                                                                        </div>
                                                                        @endif
                                                                    @if(session("StateError"))
                                                                        <div class="alert alert-danger" role="alert">
                                                                            {{ session("StateError") }}
                                                                        </div>
                                                                        @endif
                                                                    <form action="{{ route("insert_comment") }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="pid" value="{{ $id }}">
                                                                        <div class="row">
                                                                            <label for="fullname">نام و نام خانوادگی</label>
                                                                            <div class="input-group mb-2">
                                                                                <div class="input-group-prepend">
                                                                                  <span class="input-group-text">
                                                                                  <span class="c-icon cil-user"></span>
                                                                                </span>
                                                                                </div>
                                                                                <input class="form-control" type="text" id="fullname" placeholder="نام و نام خانوادگی" name="fullname" value="" required autofocus>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <label for="context">متن نظر</label>
                                                                            <div class="input-group mb-2">
                                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text">
                                                                  <span class="c-icon cil-wrap-text"></span>
                                                                </span>
                                                                                </div>
                                                                                <textarea class="form-control" type="text" id="context" placeholder="متن نظر" name="context" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input type="submit" name="submit" value="ثبت" class="btn btn-primary">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="clearfix">&nbsp;</div>
                            </div>
                        </div>
                    </div>

                </div>
            <div class="clearfix">&nbsp;</div>
        </div>
@endsection

@section('javascript')
@endsection
