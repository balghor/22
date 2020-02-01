@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("set_password") }}" method="post">
                        @csrf
                    <div class="card-header">
                        <h6>تغییر کلمه عبور</h6>
                    </div>
                    <div class="clearfix"></div>
                    @if( session("state"))
                            <div class="alert alert-primary" role="alert">
                                {{ session("state") }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        @endif
                    <div class="row">
                        <div class="col-6">
                            <label for="password">کلمه عبور جدید</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-keyboard"></span>
                                    </span>
                                </div>
                                <input class="form-control" type="password" id="password" placeholder="کلمه عبور جدید" name="password" value="" required autofocus>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="col-6">
                            <label for="repassword">تکرار کلمه عبور</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-keyboard"></span>
                                    </span>
                                </div>
                                <input class="form-control" type="password" id="repassword" placeholder=" تکرار کلمه عبور" name="repassword" value="" required autofocus>
                            </div>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-outline-success" value="تغییر کلمه عبور">
                        <input type="reset" name="reset" class="btn btn-outline-secondary" value="پاک کردن فرم">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/pace.min.js') }}"></script>
    <script src="{{ asset('public/js/coreui.min.js') }}"></script>
@endsection
