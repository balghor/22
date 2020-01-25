@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value-lg">9.823</div>
                            <div>تعداد پروژه</div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart1" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-6">
                    <div class="card text-white bg-info">
                        <div class="card-body pb-0">
                            <div class="text-value-lg">9.823</div>
                            <div>تعداد کاربران</div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row-->
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!-- /.col-->
                    </div>
                    <!-- /.row-->

                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/coreui.min.js') }}"></script>
@endsection
