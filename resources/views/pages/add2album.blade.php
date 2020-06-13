@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <!-- /.row-->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>افزودن عکس به اسلایدر پروژه  </h6>
                    </div>
                    @if( session("state"))
                        <div class="alert alert-primary" role="alert">
                            {{ session("state") }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                    @endif
                    <form action="{{ route("album_create") }}" method="post" enctype="multipart/form-data">
                        <div class="">
                            <br>
                            <h6>امکان انتخاب چند عکس به صورت همزمان وجود دارد</h6>
                            <div class="col-8">
                                @csrf
                                <input type="hidden" name="pid" value="{{ $item->id }}">
                                <input type="hidden" name="description" value="{{ $item->project_name }}">
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-1">
                                        <input type="file" class="btn btn-large btn-primary" name="album[]" multiple accept="image/jpeg" id="album" placeholder="فایل مورد نظر را انتخاب نمایید">
                                    </div>
                                    <div class="col-5">
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
