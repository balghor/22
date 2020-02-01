@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <!-- /.row-->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>افزودن رسانه </h6>
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
                    <form action="{{ route("media.store") }}" method="post" enctype="multipart/form-data">
                        <div class="">
                            <br>
                            <h6>امکان انتخاب چند عکس به صورت همزمان وجود دارد</h6>
                            <div class="col-12">
                                @csrf
                                <div class="row" style="padding-top:10px;">
                                    <div class="container">
                                        <div class="col-12">
                                            <label for="description">توضیحات فایل</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="description" id="description" placeholder="توضیحات مر بوط به فایل های که بارگزاری میکنید">
                                            </div>
                                            <div class="clearfix">&nbsp;</div>
                                            <input type="file" class="btn btn-large btn-light form-control-file" name="file[]" multiple accept="image/*,video/*,.pdf,.csv" id="album" placeholder="فایل مورد نظر را انتخاب نمایید">
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="col-12">
                                            <h6 class="badge badge-info">چند نکته مهم:</h6>
                                            <ol>
                                                <li>در انتخاب فایل های ویدیویی دقت شود به صورت تکی انتخاب نمایید</li>
                                                <li>حتما برای فایل های خود اسم یا توضیحات وارد نمایید تا دسترسی به آن راحت تر باشد</li>
                                                <li>در انتخاب نام فایل ها دقت کنید فایل با نام فارسی را تا حد امکان بارگذاری ننمایید</li>
                                                <li>به دلیل کاهش منابع سایت و استفاده از پهنای باند سازمان لطفا برای نمایش فایل های ویدیویی از ابزارهای بهینه و خوب مانند <a href="https://aparat.com" title="سایت آپارات">#آپارات</a> استفاده نمایید</li>
                                                <li>در انتخاب فایل ویدیویی دقت نمایید و از پسوند های مرسوم در وب مانند mp4 و یا webm استفاده نمایید که حجم فایل را کاهش و از کیفیت آن کم نمیکند</li>
                                                <li>در انتخاب فایل عکس تا حد امکان از تصاویر jpg که برای محیط web بهینه شده استفاده نمایید</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </div>
                    <div class="card-footer">
                        <input type="submit" name="submit" value="ثبت" class="btn btn-info">
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
