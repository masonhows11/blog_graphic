@extends('admin.include.master')
@section('page_title')
    تخصیص نقش ها
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
        <div class="row list-users-row">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام کاربری</th>
                    <th>تخصیص</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="/admin/roleAssign/assignForm/?user={{$user->id}}" class="btn btn-primary">تخصیص</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
