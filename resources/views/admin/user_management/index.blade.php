@extends('admin.include.master')
@section('page_title')
@endsection
@section('main_content')
    <div class="container">

        <div class="row user-messages">
            @if(session('success'))
                <div class="alert alert-success">
                <strong>{{ session('success')  }}</strong>
                </div>
            @endif
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id  }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{  $user->activate == 1 ? 'فعال' : 'غیر فعال' }}</td>
                    <td><a href="#" class="btn btn-info">ویرایش</a></td>
                    @if($user->hasRole('admin'))
                    @else
                    <td><a href="userDelete?user={{$user->id}}" class="btn btn-danger">حذف</a></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
