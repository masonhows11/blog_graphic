@extends('admin.include.master')
@section('page_title')
    لیست نمونه کارها
@endsection
@section('main_content')
        <div class="container bg-transparent">

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
            <div class="row new-tip-row">
                <a href="/admin/sample/create" class="btn btn-success">ایجاد نمونه کار جدید</a>
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
                    @foreach($samples as $sample)
                        <tr>
                            <td>{{ $sample->id }}</td>
                            <td>{{ $sample->title }}</td>
                            <td><a href="/admin/sample/active?sample={{$sample->id}}" class="btn btn-default">{{ $sample->approved == 0 ? 'منتشر نشده' : 'منتشره شده'  }}</a></td>
                            <td><a href="/admin/sample/edit?sample={{$sample->id}}" class="btn btn-info">ویرایش</a> |
                                <a href="/admin/sample/delete?sample={{$sample->id}}" onclick="deleteItem(event)" class="btn btn-danger" >حذف</a>
                                <form action="/admin/sample/delete?sample={{$sample->id}}" method="post" id="delete-item">
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
