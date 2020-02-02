@extends('layouts.master_page')
@component("")
@section("css")
    <link rel="stylesheet" href="{{ asset("public/css/trumbowyg.min.css") }}">
@endsection
@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                  <form action="{{ route('project.update',$projects) }}" method="post">
                    @csrf
                      @method("PUT")
                      <input type="hidden" name="id" value="{{ $projects->id }}">
                      <div class="card-header">
                          <h6>ویرایش پروژه <i class="badge badge-pill"> {{ $projects->project_name }}</i></h6>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <label for="project_cp_id">پروژه مورد نظر را جهت بروزرسانی انتخاب نمایید</label>
                      <div class="clearfix">
                          <select id="project_cp_id" name="cp_id" class="select listproject" disabled>
                              <?php
                              $project = file_get_contents("http://cp.sazmanomran.org/ceo/index/record/list/project/");
                              $List = json_decode($project,true);
                              ?>
                              @foreach($List as $item => $value)
                                  <option value="{{ $value['ID'] }}" @if($projects->cp_id==$value['ID']) {{ "selected" }}   @endif>{{$value['ProjectName']}}</option>
                                  @endforeach
                          </select>
                      </div>

                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-12">
                              <label for="project_name">نام پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-center-focus"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="project_name" placeholder="نام پروژه" name="project_name" readonly value="{{ $projects->project_name }}" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="start_date">تاریخ شروع روزشمار پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-calendar"></span>
                                    </span>
                                  </div>
                                  <input class="form-control jalali-date-input" type="text" id="start_date" placeholder="تاریخ شروع روزشمار پروژه" name="start_date" value="{{ str_replace("-","/",str_replace(" 00:00:00","",$projects->start_date)) }}" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="start_date">تاریخ پایان روزشمار پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-calendar-check"></span>
                                    </span>
                                  </div>
                                  <input class="form-control jalali-date-input" type="text" id="end_date" placeholder="تاریخ اتمام روزشمار پروژه" name="end_date" value="{{ str_replace("-","/",str_replace(" 00:00:00","",$projects->end_date)) }}" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="start_date">درصد پیشرفت فیزیکی</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-task"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="physical_progress" placeholder="درصد پیشرفت فیزیکی" name="physical_progress" value="{{ $projects->physical_progress }}" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="start_date">درصد پیشرفت ریالی</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-dollar"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="cost" placeholder="درصد پیشرفت ریالی" name="cost" value="{{ $projects->cost }}" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                              <div class="custom-control-inline custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" id="ccv1" name="active_state" value="0" @if($projects->active==0) {{ "checked" }}   @endif required>
                                  <label class="custom-control-label" for="ccv1">عدم انتشار</label>
                              </div>
                              <div class="custom-control-inline custom-radio mr-5">
                                  <input type="radio" class="custom-control-input" id="ccv2" name="active_state" value="1" @if($projects->active==1) {{ "checked" }}   @endif required>
                                  <label class="custom-control-label" for="ccv2">انتشار</label>
                              </div>
                              <div class="custom-control-inline custom-radio mr-5">
                                  <input type="radio" class="custom-control-input" id="ccv3" name="active_state" value="2" @if($projects->active==2) {{ "checked" }}   @endif required>
                                  <label class="custom-control-label" for="ccv3">اتمام یافته</label>
                              </div>
                       <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-12">
                              <label for="description"> خلاصه پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-append">
                                      <span class="input-group-text">
                                          <span class="c-icon cil-description"></span>
                                      </span>
                                  </div>
                                  <textarea class="form-control" placeholder="خلاصه پروژه" name="description" id="description">{{ $projects->description }}</textarea>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-12">
                              <label for="detail"> جزئیات پروژه</label>
                                  <textarea class="summernote" placeholder="جزئیات پروژه" name="detail" id="detail">
                                      {!! $projects->detail  !!}
                                  </textarea>
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

    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/pace.min.js') }}"></script>
    <script src="{{ asset('public/js/coreui.min.js') }}"></script>
    <script src="{{ asset('public/js/trumbowyg.min.js") }}"></script>
    <script src="{{ asset('public/js/langs/fa.min.js") }}"></script>
<script type="text/javascript">
        $(".listproject").on('select2:select', function (e) {
            var data = e.params.data;
            $.get("{{ route("load_project_id") }}",{id:data.id},function (data) {
                $("#project_name").val(data.ProjectName);
                $("#start_date").val(data.StartDate);
                $("#end_date").val(data.EndDate);
                $("#physical_progress").val(data.Physical);
                $("#cost").val(data.Financial);
                if(data.finished=="0"){
                    $("#ccv2").select();
                    $("#ccv2").click();
                }
                if(data.finished=="1"){
                    $("#ccv3").select();
                    $("#ccv3").click();
                }
                $("#description").val(data.description);
            })
        });
        $('.summernote').trumbowyg({
            lang:'fa',
        });
</script>
@endsection
