@extends('admin.include.master')
@section('page_title')
    ویرایش نقش
@endsection
@section('main_content')
    <div class="container">

        <div class="row alert-messages-row">
            <div class="alert-messages">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success')  }}</strong>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-warning">
                        <strong>{{ session('error')  }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="row add-role-row" style="height: auto">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <form action="/admin/role/update" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <label for="role">نام نقش</label>
                        <input type="text"
                               name="name"
                               class="form-control  @error('name') is-invalid @enderror"
                               id="role" value="{{ $role->name }}">
                        @error('name')
                        <div class="alert alert-warning fade-in">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">ویرایش</button>
                    <a href="/admin/role/roles" class="btn btn-default">انصراف</a>
                </form>
            </div>
        </div>
    </div>
@endsection
