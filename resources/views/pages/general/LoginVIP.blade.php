@extends('layouts.base_layout')

@section("backgroundCss","bgclass")

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 align-content-center">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>سامانه شفافیت پروژه های عمرانی</h1>
                            <h4>ورود کاربران ویژه</h4>
                            <p class="text-muted">اطلاعات خود را وارد نمایید</p>
                            @if( session("state"))
                                <div class="clearfix">&nbsp;</div>
                                <div class="alert alert-primary" role="alert">
                                    {{ session("state") }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                            @endif
                            @if( session("error"))
                                <div class="clearfix">&nbsp;</div>
                                <div class="alert alert-danger" role="alert">
                                    {{ session("error") }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                            @endif
                            <form method="POST" action="{{ route("doing_vip") }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="c-icon cil-user"></i>
                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="نام کاربری " name="username"
                                           value="{{ old('username') }}"  required autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="c-icon cil-lock-locked"></i>
                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="کلمه عبور" name="password" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">ورود</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
