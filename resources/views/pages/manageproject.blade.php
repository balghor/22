@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>مدیریت پروژه ها</h6>
                    </div>
                    <div class="container-fluid">
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
                        <div class="row">
                            @if($projects->count())
                            <table id="datatable_projects" class="table table-clear table-hover table-responsive-lg table-bordered" >
                                <thead>
                                <tr>
                                    <th>نام پروژه</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>پیشرفت فیزیکی</th>
                                    <th>پیشرفت ریالی</th>
                                    <th>وضعیت</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $List)
                                    <tr>
                                    <td>{{ $List->project_name }}</td>
                                    <td>{{ $List->start_date }}</td>
                                    <td>{{ $List->end_date }}</td>
                                    <td>{{ $List->physical_progress }}</td>
                                    <td>{{ $List->cost }}</td>
                                    <td>@php
                                            if($List->active == 0) echo "<span class='badge badge-info'>عدم انتشار</span>";
                                            if($List->active == 1) echo "<span class='badge badge-success'>انتشار</span>";
                                            if($List->active == 2) echo "<span class='badge badge-dark'>اتمام یافته</span>";
                                            @endphp</td>
                                    <td>
                                        <form action="{{route("project.destroy",$List)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $List->id }}" name="id">
                                            <a class="btn btn-sm btn-outline-dark align-baseline" title="مدیریت آلبوم پروژه" href="{{ route("album.index",["id"=>$List->id]) }}"><span class="c-icon cil-library-add"></span></a>
                                            <a class="btn btn-sm btn-outline-warning align-baseline" title="ویرایش" href="{{ route("project.edit",$List->id) }}"><span class="c-icon cil-pencil"></span></a>
                                            <a class="btn btn-sm btn-outline-primary align-baseline" title="افزودن عکس شاخص" href="{{ route("add2album",$List) }}"><span class="c-icon cil-image-plus"></span></a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger align-baseline" title="حذف" ><span class="c-icon cil-remove" ></span></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نام پروژه</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>پیشرفت فیزیکی</th>
                                    <th>پیشرفت ریالی</th>
                                    <th>وضعیت</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                            @else
                                <h5 class="text-center">موردی برای نمایش یافت نشد</h5>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        {{ $projects->links() }}
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
