@extends('layouts.base_layout')

@section("backgroundCss","bgclass")

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>سامانه اطلاع رسانی پروژه های سازمان عمران</h1>
                <p class="text-muted">اطلاعات خود را وارد نمایید</p>
                <form method="POST" action="">
                    @csrf
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="c-icon cil-user"></i>
                        </span>
                    </div>
                    <input class="form-control" type="text" placeholder="" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="c-icon cil-lock-locked"></i>
                        </span>
                    </div>
                    <input class="form-control" type="password" placeholder="" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">ورود</button>
                    </div>
                    </form>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection
