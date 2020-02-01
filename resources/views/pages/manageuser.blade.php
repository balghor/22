@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>مدیریت کاربران</h6>
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
                            @if($users->count())
                            <table id="datatable_users" class="table table-clear table-hover table-responsive-lg table-bordered" >
                                <thead>
                                <tr>
                                    <th>نام و نام خانوادگی</th>
                                    <th>نام کاربری</th>
                                    <th>نوع دسترسی</th>
                                    <th>وضعیت</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $List)
                                    <tr>
                                    <td>{{ $List->full_name }}</td>
                                    <td>{{ $List->username }}</td>
                                    <td>@php
                                            if($List->type=="VIP") echo "<span class='badge badge-success'>VIP ویژه</span>";
                                            if($List->type=="Manager") echo "<span class='badge badge-primary'>مدیر کل</span>";
                                            if($List->type=="User") echo "<span class='badge badge-info'>کاربر عادی</span>";
                                            if($List->type=="ProjectUser") echo "<span class='badge badge-warning'>مدیر پروژه</span>";
                                            @endphp</td>
                                    <td>@php
                                            if($List->active == "enabled") echo "<span class='badge badge-success'>فعال</span>";
                                            if($List->active == "disabled") echo "<span class='badge badge-dark'>غیرفعال</span>";
                                            @endphp</td>
                                    <td>
                                        <form action="{{route("user.destroy",$List)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $List->id }}" name="id">
                                            <a class="btn btn-sm btn-outline-warning align-baseline" href="{{ route("user.edit",$List) }}"><span class="c-icon cil-pencil"></span></a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger align-baseline" ><span class="c-icon cil-remove" ></span></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نام و نام خانوادگی</th>
                                    <th>نام کاربری</th>
                                    <th>نوع دسترسی</th>
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
                        {{ $users->links() }}
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
