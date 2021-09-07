@extends('admin.include.master')
@section('page_title')
    خلاقیت جدید
@endsection
@section('main_content')
    <div class="container">

        <div class="row creative-create-row">

            <form action="/admin/creative/store" method="post">
                @csrf

                <div class="form-group">
                    <label for="title">هنوان را به فارسی وارد کنید</label>
                    <input type="text"
                           name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name"> نام خلاقیت را به انگلیسی وارد کنید</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           id="title" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>

            </form>

        </div>

    </div>
@endsection
@section('my_script_admin')

@endsection
