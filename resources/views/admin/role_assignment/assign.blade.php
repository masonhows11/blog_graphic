@extends('admin.include.master')
@section('page_title')
    تخصیص نقش
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
        <div class="row">

            <form action="/admin/roleAssign/assign" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="form-group">
                    <label for="user">نام کاربری</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" readonly id="user">
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th colspan="3" class="text-center">نام نقش</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($roles as $role)
                            <td>
                                <label for="" class="checkbox-inline">
                                    <input type="checkbox"
                                           name="roles[]"
                                           class=""
                                           value="{{ $role->id }}"
                                           {{ in_array( $role->id,$user->hasRoleIds()->toArray()) ? 'checked' : '' }} >
                                    {{ $role->name }}
                                </label>
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">ذخیره نقش ها</button>
                <a href="/admin/roleAssign/list" class="btn btn-warning">انصراف</a>
            </form>

        </div>
    </div>
@endsection
