@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                  <form action="{{ route("user.update",$users) }}" method="post">
                    @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{ $users->id }}">
                      <div class="card-header">
                          <h6>افزودن کاربر</h6>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-12">
                              <label for="full_name">نام و نام خانوادگی کاربر:</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-user"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="full_name" placeholder="نام و نام خانوادگی" name="full_name" value="{{ $users->full_name }}" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="start_date">نام کاربری</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-user-follow"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="username" placeholder="نام کاربری" name="username" readonly  value="{{ $users->username }}" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="password">کلمه عبور</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-keyboard"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="password" id="password" placeholder="کلمه عبور" name="password"  value=""  autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="type">نوع دسترسی</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-beach-access"></span>
                                    </span>
                                  </div>
                                  <select class="select2"  id="type" placeholder="نوع دسترسی" name="type" required autofocus style="width: 50%">
                                      <option value="VIP" @if($users->type == "VIP") {{ "selected" }}     @endif>کاربر ویژه VIP</option>
                                      <option value="Manager" @if($users->type == "Manager") {{ "selected" }}     @endif>مدیرکل</option>
                                      <option value="ProjectUser" @if($users->type == "ProjectUser") {{ "selected" }}     @endif>مدیر پروژه</option>
                                      <option value="User" @if($users->type == "User") {{ "selected" }}     @endif>کاربر عادی</option>
                                  </select>
                              </div>
                          </div><div class="col-6">
                              <label for="access_project">دسترسی به پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-tags"></span>
                                    </span>
                                  </div>
                                  <select id="access_project" name="access_project" class="select listproject">
                                      <option value="all" @if($users->access_project == "all") {{ "selected" }}     @endif >همه پروژه ها</option>
                                  <?php
                                      $project = file_get_contents("http://cp.sazmanomran.org/ceo/index/record/list/project/");
                                      $List = json_decode($project,true);
                                      ?>
                                      @foreach($List as $item => $value)
                                          <option value="{{ $value['ID'] }}" @if($users->access_project == $value['ID'] ) {{ "selected" }}     @endif>{{$value['ProjectName']}}</option>
                                      @endforeach
                                  </select>                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                              <div class="custom-control-inline custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" id="acen" name="active" value="enabled" @if($users->active == "checked") {{ "checked" }}     @endif  checked required>
                                  <label class="custom-control-label" for="acen">فعال</label>
                              </div>
                              <div class="custom-control-inline custom-radio mr-5">
                                  <input type="radio" class="custom-control-input" id="acdi" name="active" value="disabled" @if($users->active == "disabled") {{ "checked" }}     @endif  required>
                                  <label class="custom-control-label" for="acdi">غیرفعال</label>
                              </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="card-footer">
                          <input type="submit" name="submit" class="btn btn-outline-success" value="ثبت کاربر">
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
