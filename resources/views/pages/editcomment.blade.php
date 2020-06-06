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
                        <div class="clearfix">&nbsp;</div>

                        <div class="row">
                            <div class="col-6">نام و نام خانوادگی : <b>{{ $comment->fullname }}</b></div>
                            <div class="col-6">عنوان پروژه: <b> {{ $ProjectName }}</b></div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="col-12">
                                متن نظر:   <b>{{ $comment->context }}</b>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <form action="{{ route("comment.update",$comment) }}" method="post">
                                <div class="col-12 mr-3">
                                    <label for="reply">پاسخ:</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                      <span class="input-group-text">
                                      <span class="c-icon cil-tag"></span>
                                    </span>
                                        </div>
                                        <textarea class="form-control"  id="reply" placeholder="پاسخ" name="reply" required ></textarea>
                                    </div>
                                </div>
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="pid" value="{{ $comment->pid }}">
                                <input type="hidden" name="parents" value="{{ $comment->id }}">
                                <input type="submit" name="submit" value="ثبت پاسخ" class="btn btn-success">
                            </form>
                        </div>

                    </div>
                    <div class="clearfix">&nbsp;</div>

                    <div class="card-footer">
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
