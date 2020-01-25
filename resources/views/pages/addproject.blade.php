@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                  <form action="" method="post">
                    @csrf
                    @method("POST")
                      <div class="card-header">
                          <h6>افزودن پروژه</h6>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-8">
                              <div class="input-group mb-2">
                                  <label for=""></label>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <span class="c-icon"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" placeholder="" name="name" value="" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                          <input type="submit" name="submit" class="btn btn-outline-success" value="ثبت پروژه">
                          <input type="reset" name="reset" class="btn btn-outline-secondary" value="پاک کردن فرم">
                      </div>
                  </form>

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
