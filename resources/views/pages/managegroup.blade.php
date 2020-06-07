@extends('layouts.master_page')
@component("")

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h6>مدیریت گروه ها</h6>
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
                            <div class="col-6">
                                <form action="{{ route("category.store") }}" method="post">
                                    @csrf
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="group_name">نام گروه</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              <span class="c-icon cil-notes"></span>
                                            </span>
                                                </div>
                                                <input class="form-control" type="text" id="group_name" placeholder="نام گروه" name="group_name" value="" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="ordered">شماره ردیف</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              <span class="c-icon cil-list-numbered"></span>
                                            </span>
                                                </div>
                                                <input class="form-control" type="number" id="ordered" placeholder="شماره ردیف" name="ordered" min="1" value="1" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" name="submit" class="btn btn-success" value="ثبت گروه">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                @if($category->count())
                                    <table id="datatable_group" class="table table-clear table-hover table-responsive-lg table-bordered" >
                                        <thead>
                                        <tr>
                                            <th>نام گروه</th>
                                            <th>شماره ردیف</th>

                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category as $List)
                                            <tr>
                                                <td>{{ $List->name }}</td>
                                                <td>{{ $List->ordered }}</td>
                                                <td>
                                                    <form action="{{route("category.destroy",$List)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" value="{{ $List->id }}" name="id">
                                                        <a class="btn btn-sm btn-outline-warning align-baseline" href="{{ route("category.edit",$List) }}"><span class="c-icon cil-pencil"></span></a>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger align-baseline" ><span class="c-icon cil-remove" ></span></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>نام گروه</th>
                                            <th>شماره ردیف</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <h5 class="text-center">موردی برای نمایش یافت نشد</h5>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="card-footer">
                        {{ $category->links() }}
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
