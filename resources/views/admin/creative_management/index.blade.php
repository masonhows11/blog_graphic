@extends('admin.include.master')
@section('page_title')
    لیست خلاقیت ها
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
        <div class="row page-header-row">
            <div class="page-header">
                <h3>خلاقیت و طراحی</h3>
            </div>
        </div>
        <div class="row new-tip-row">
            <a href="/admin/creative/create" class="btn btn-success">ایجاد خلاقیت جدید</a>
        </div>
        <div class="row list-tips-row">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($creatives as $creative)
                    <tr>
                        <td>{{ $creative->id }}</td>
                        <td>{{ $creative->title }}</td>
                        <td><a href="/admin/creative/active?creative={{$creative->id}}" class="btn btn-default">{{ $creative->status == 0 ? 'منتشر نشده' : 'منتشر شده'  }}</a></td>
                        <td><a href="/admin/creative/edit?creative={{$creative->id}}" class="btn btn-info">ویرایش</a> |
                            <a href="/admin/creative/delete?creative={{$creative->id}}" onclick="deleteItem(event)" class="btn btn-danger" >حذف</a>
                            <form action="/admin/creative/delete?creative={{$creative->id}}" method="post" id="delete-item">
                                @csrf
                                @method('delete')
                            </form>
                        <td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
@section('my_script_admin')

@endsection
