@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>مدیریت نظرات</h6>
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
                            @if($comments->count())
                            <table id="datatable_comments" class="table table-clear table-hover table-responsive-lg table-bordered" >
                                <thead>
                                <tr>
                                    <th>پروژه</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>خلاصه</th>
                                    <th>وضعیت کامنت</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $List)
                                    <tr>
                                    <td>{{ $List->project_name }}</td>
                                    <td>{{ $List->fullname }}</td>
                                    <td>{{ mb_substr($List->context,0,550)." ... " }}</td>
                                        <td>@php
                                                if($List->active==1) echo "<span class='badge badge-success'>تایید شده</span>";
                                                if($List->active==0) echo "<span class='badge badge-danger'>عدم تایید</span>";
                                            @endphp</td>
                                    <td>
                                        <form action="{{route("comment.destroy",$List)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $List->id }}" name="id">
                                            <a class="btn btn-sm btn-outline-warning align-baseline" href="{{ route("comment.edit",$List) }}"><span class="c-icon cil-applications"></span></a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger align-baseline" ><span class="c-icon cil-remove" ></span></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>پروژه</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>خلاصه</th>
                                    <th>وضعیت کامنت</th>
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
                        {{ $comments->links() }}
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
