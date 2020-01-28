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
                        <div class="row">
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
                                            <a class="btn btn-sm btn-outline-warning align-baseline" href="{{ route("project.edit",$List->id) }}"><span class="c-icon cil-pencil"></span>&nbsp;     ویرایش </a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger align-baseline" ><span class="c-icon cil-remove" ></span>&nbsp;     حذف </button>
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

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/coreui.min.js') }}"></script>

@endsection
