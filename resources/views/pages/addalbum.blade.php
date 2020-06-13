@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <!-- /.row-->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>مدیریت آلبوم پیشرفت پروژه: <b>{{ $project_name }} </b> </h6>
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
                    <form action="{{ route("album.store") }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="{{ $id }}">
                        <div class="">
                            <br>
                            <h6>امکان انتخاب چند عکس به صورت همزمان وجود دارد</h6>
                            <div class="col-12">
                                @csrf
                                <div class="row" style="padding-top:10px;">
                                    <div class="container">
                                        <div class="col-12">
                                            <label for="description">توضیحات عکس</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="description" id="description" placeholder="توضیحات مر بوط به عکس های که بارگزاری میکنید">
                                            </div>
                                            <div class="clearfix">&nbsp;</div>
                                            <input type="file" class="btn btn-large btn-light form-control-file" name="file[]" multiple accept="image/*" id="album" placeholder="فایل مورد نظر را انتخاب نمایید">
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
                    <hr>
                    <div class="clearfix">&nbsp;</div>
                    <div class="container-fluid">
                        <div class="row">
                            @if($archive->count())
                                @foreach($archive as  $item)
                                    <div class="col">
                                        <div class="card" id="card{{$item->id}}" style="width: 18rem;">
                                            <div class="card-img-top text-lg-center">
                                                        <img src="{{ url("uploads/".$item->path) }}" style="width: 100%;height: 150px;">
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{ $item->title }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <form action="{{ route("album.delete",["id"=>$item->id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    @method("delete")
                                                <button type="submit" class="btn btn-sm btn-danger" >حذف آلبوم</button>
                                                </form>
                                            </div>
                                        </div>                            </div>
                                @endforeach
                            @else
                                <h5 class="text-center">موردی برای نمایش یافت نشد</h5>
                            @endif
                        </div>
                    </div>

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
