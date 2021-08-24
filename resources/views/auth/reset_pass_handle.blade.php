@extends('front.include.master')
@section('page-title')
    تغییر رمز عبور
@endsection
@section('content')

    <div class="row">
        <div class="offset-lg-3 offset-md-3 offset-sm-6 col-lg-6 col-md-6 col-sm-6 mb-3 mt-3 login-msg-wrapper">

            @if(session('error'))
                <div class="alert alert-info" role="alert">
                    <p class="text-center">{{ session('error')  }}</p>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning" role="alert">
                    <p class="text-center">{{ session('warning')  }}</p>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info" role="alert">
                    <p class="text-center">{{ session('info')  }}</p>
                </div>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="offset-lg-3 offset-md-3 offset-sm-6 col-lg-6 col-md-6 col-sm-6 user-login-wrapper">
            <form action="/handleResetPass" method="post">
                @csrf


                <div class="form-group mb-4">
                    <label for="email" class="mb-2">ایمیل</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                           id="email" value="{{ $email  }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="pass" class="mb-2">رمز عبور جدید</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                           id="pass">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="pass" class="mb-2">تکرار رمز عبور جدید</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                           id="pass">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary">تغییر رمز</button>

            </form>
        </div>
    </div>
@endsection


