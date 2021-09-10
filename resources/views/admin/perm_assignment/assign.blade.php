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

            <form action="/admin/permAssign/assign" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $role->id }}">

                <div class="form-group">
                    <label for="user">نام نقش</label>
                    <input type="text" class="form-control" value="{{ $role->name }}" readonly id="user">
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th colspan="3" class="text-center">نام مجوز</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($perms as $perm)
                            <td>
                                <label for="" class="checkbox-inline">
                                    <input type="checkbox"
                                           name="perms[]"
                                           class=""
                                           value="{{ $perm->id }}"
                                        {{ in_array( $perm->id,$role->getPermissionIds()->toArray()) ? 'checked' : '' }} >
                                    {{ $perm->name }}
                                </label>
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">ذخیره نقش ها</button>
                <a href="/admin/permAssign/list" class="btn btn-warning">انصراف</a>
            </form>

        </div>
    </div>
@endsection
