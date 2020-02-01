@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <!-- /.row-->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="row">
                            <div class="col justify-content-lg-start">
                                <h6>مدیریت رسانه و فایل ها</h6>

                            </div>
                            <div class="col justify-content-lg-end">
                                <div class="card-header-action">
                                    <form action="{{ route("media.index") }}" name="search" method="get">
                                        <div class="input-group">
                                            <input class="form-control" name="find" type="text"
                                                   placeholder="برای جستجو وارد نمایید">
                                            <div class="input-group-append">
                                                <input type="submit" value="بگرد" class="btn-sm btn btn-dark in">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="container-fluid">
                        <div class="row">
                            @if($files->count())
                            @foreach($files as  $item)
                                <div class="col">
                                    <div class="card" id="card{{$item->id}}" style="width: 18rem;">
                                    <div class="card-img-top text-lg-center">
                                        @if(file_exists("uploads/".$item->path))
                                        @if(strtoupper($item->extension)=="JPG" || strtoupper($item->extension)=="JPEG" || strtoupper($item->extension)=="PNG" || strtoupper($item->extension)=="BMP")
                                            <img src="{{ url("uploads/".$item->path) }}" style="width: 100%;height: 150px;">
                                        @elseif(strtoupper($item->extension)=="WEBM" || strtoupper($item->extension)=="MP4" || strtoupper($item->extension)=="WEBVTT" || strtoupper($item->extension)=="OGV")
                                            <video src="{{ url("uploads/".$item->path) }}" style="width: 100%;height: 150px;" controls >
                                                <source src="{{ url("uploads/".$item->path) }}">
                                            </video>
                                            @else
                                             <div class="cil-image1" style="width: 100%;height: 150px;font-size: 10rem;color: #2a015e"></div>
                                            @endif
                                            @else
                                            <div class="cil-image-broken" style="width: 100%;height: 150px;font-size: 10rem;color: #e55353  "></div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->description }}</p>
                                    </div>
                                        <div class="card-footer">
                                            @if(file_exists("uploads/".$item->path))
                                            <div class="input-group">
                                                <textarea type="text" id="el{{ $item->id }}" class="form-control" style="font-size: 10px">{{ url("uploads/".$item->path) }}</textarea>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-light" onclick="copy(this,'el{{ $item->id }}')">کپی آدرس فایل</button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-danger" onclick="delete_file({{ $item->id }})">حذف فایل</button>
                                        </div>
                                </div>                            </div>
                            @endforeach
                                @else
                                <h5 class="text-center">موردی برای نمایش یافت نشد</h5>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/pace.min.js') }}"></script>
    <script src="{{ asset('public/js/coreui.min.js') }}"></script>
    <script type="text/javascript">
        function delete_file(id) {
            state=confirm("آیا از حذف فایل اطمینان دارید؟");
            if(state){
                $.get("{{ route("delete_file") }}",{id:id},function (data) {
                    $("#card"+id).remove();
                })
            }else{
                return false;
            }
        }

    </script>
@endsection
