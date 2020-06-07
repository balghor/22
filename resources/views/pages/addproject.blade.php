@php
    use GuzzleHttp\Client;
@endphp
@extends('layouts.master_page')
@component("")

    @section("css")
        <link rel="stylesheet" href="{{ asset("public/css/trumbowyg.min.css") }}">
        <link rel="stylesheet" href="{{ asset("public/js/plugins/table/ui/trumbowyg.table.css") }}">
        @endsection
@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                  <form action="{{ route("project.store") }}" method="post">
                    @csrf
                      <div class="card-header">
                          <h6>افزودن پروژه</h6>
                      </div>
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
                                  <input class="form-control" type="text" id="project_name" placeholder="نام پروژه" name="project_name" value="" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-12">
                              <label for="category_id">گروه پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-object-group"></span>
                                    </span>
                                  </div>
                                  <select class="form-control" type="text" id="category_id" placeholder="گروه بندی پروژه" name="category_id" required >
                                      @foreach($CatList as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                      @endforeach
                                  </select>
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
                                  <input class="form-control jalali-date-input" type="text" id="start_date" placeholder="تاریخ شروع روزشمار پروژه" name="start_date" value="" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="end_date">تاریخ پایان روزشمار پروژه</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-calendar-check"></span>
                                    </span>
                                  </div>
                                  <input class="form-control jalali-date-input" type="text" id="end_date" placeholder="تاریخ اتمام روزشمار پروژه" name="end_date" value="" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="karfarma">کارفرما</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-control"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="karfarma" placeholder="کارفرما پروژه" name="karfarma" value="" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="contractor">پیمانکار</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-coffee"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="contractor" placeholder="پیمانکار پروژه" name="contractor" value="" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="moshaver">مشاور</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-globe-alt"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="moshaver" placeholder="مشاور پروژه" name="moshaver" value="" >
                              </div>
                          </div><div class="col-6">
                              <label for="ordered">شماره ردیف</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-input"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="number" id="ordered" placeholder="شماره ردیف" name="ordered" min="1" value="1" >
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-6">
                              <label for="physical_progress">درصد پیشرفت فیزیکی</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-task"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="physical_progress" placeholder="درصد پیشرفت فیزیکی" name="physical_progress" value="" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="cost">درصد پیشرفت ریالی</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-dollar"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="cost" placeholder="درصد پیشرفت ریالی" name="cost" value="" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                              <div class="custom-control-inline custom-radio mr-3">
                                  <input type="radio" class="custom-control-input" id="ccv1" name="active_state" value="0" required>
                                  <label class="custom-control-label" for="ccv1">عدم انتشار</label>
                              </div>
                              <div class="custom-control-inline custom-radio mr-5">
                                  <input type="radio" class="custom-control-input" id="ccv2" name="active_state" value="1" checked required>
                                  <label class="custom-control-label" for="ccv2">انتشار</label>
                              </div>
                              <div class="custom-control-inline custom-radio mr-5">
                                  <input type="radio" class="custom-control-input" id="ccv3" name="active_state" value="2" required>
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
                                  <textarea class="form-control" placeholder="خلاصه پروژه" name="description" id="description"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                          <div class="col-12">
                              <label for="detail"> جزئیات پروژه</label>
                                  <textarea class="summernote" placeholder="جزئیات پروژه" name="detail" id="detail"></textarea>
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
    <script src="{{ asset('public/js/trumbowyg.min.js') }}" ></script>
    <script src="{{ asset('public/js/langs/fa.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.js') }}"></script>
    <script src="{{ asset('public/js/plugins/base64/trumbowyg.base64.js') }}"></script>
    <script src="{{ asset('public/js/plugins/colors/trumbowyg.colors.js') }}"></script>
    <script src="{{ asset('public/js/plugins/pasteembed/trumbowyg.pasteembed.js') }}"></script>
    <script src="{{ asset('public/js/plugins/resizimg/resizable-resolveconflict.js') }}"></script>
    <script src="{{ asset('public/js/plugins/resizimg/jquery-resizable.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/resizimg/trumbowyg.resizimg.js') }}"></script>
    <script src="{{ asset('public/js/plugins/table/trumbowyg.table.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/insertvideo/trumbowyg.insertvideo.js') }}"></script>
    <script>
        $('.summernote').trumbowyg({
            lang:'fa',
            btnsDef: {
                // Create a new dropdown
                image: {
                    dropdown: ['insertImage','base64'],
                    ico: 'insertImage'
                }
            },
            // Redefine the button pane
            btns: [
                ['viewHTML'],
                ['formatting'],
                ['foreColor', 'backColor'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertVideo'],
                ['image'], // Our fresh created dropdown
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['table'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ],
            plugins: {
                allowTagsFromPaste: {
                    allowedTags: ['h4', 'p', 'br']
                },
                resizimg: {
                    minSize: 64,
                    step: 16,
                }
        }});
    </script>
@endsection
