@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                  <form action="{{ route("user.store") }}" method="post">
                    @csrf
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
                                      <span class="c-icon cil-center-focus"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="full_name" placeholder="نام و نام خانوادگی" name="project_name" value="" required autofocus>
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
                                      <span class="c-icon cil-calendar"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="text" id="username" placeholder="نام کاربری" name="username" value="" required autofocus>
                              </div>
                          </div><div class="col-6">
                              <label for="password">کلمه عبور</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-calendar-check"></span>
                                    </span>
                                  </div>
                                  <input class="form-control" type="password" id="password" placeholder="کلمه عبور" name="password" value="" required autofocus>
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
                                      <span class="c-icon cil-task"></span>
                                    </span>
                                  </div>
                                  <select class="select2"  id="type" placeholder="نوع دسترسی" name="type" required autofocus>
                                      <option value="VIP">کاربر ویژه VIP</option>
                                      <option value="Manager">مدیرکل</option>
                                      <option value="ProjectUser">مدیر پروژه</option>
                                      <option value="User">کاربر عادی</option>
                                  </select>
                              </div>
                          </div><div class="col-6">
                              <label for="start_date">درصد پیشرفت ریالی</label>
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
                                  <textarea class="editor" placeholder="جزئیات پروژه" name="detail" id="detail"></textarea>
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
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        function saveData(str){
            $("#detail").val(str)
        }
        ClassicEditor
            .create( document.querySelector( '.editor' ), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        'fontSize',
                        'fontBackgroundColor',
                        'fontColor',
                        'highlight',
                        'underline',
                        'removeFormat',
                        '|',
                        'alignment',
                        'indent',
                        'outdent',
                        '|',
                        'horizontalLine',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo'
                    ]
                },
                language: 'fa',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',
                autosave: {
                    save( editor ) {
                   	return saveData( editor.getData() );
                    },
                	waitingTime: 21
                		},

            } )
            .then( editor => {
                window.editor = editor;




            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
