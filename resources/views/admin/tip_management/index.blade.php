@extends('admin.include.master')
@section('page_title')
    نکات طلایی
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
        <div class="row page-header-row">
            <div class="page-header">
                <h3>نکات طلایی</h3>
            </div>
        </div>
        <div class="row new-tip-row">
            <a href="/admin/tip/create" class="btn btn-success">نکته جدید</a>
        </div>
        <div class="row list-tips-row">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>چکیده</th>
                    <th>نویسنده</th>
                    <th>وضعیت</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tips as $tip)
                    <tr>
                        <td>{{ $tip->id }}</td>
                        <td>{{ $tip->title }}</td>
                        <td>{{ $tip->short_description }}</td>
                        <td>{{ $tip->writer }}</td>
                        <td><a href="/admin/tip/active?tip={{$tip->id}}" class="btn btn-default">{{ $tip->status == 0 ? 'منتشر نشده' : 'منتشر شده'  }}</a></td>
                        <td><a href="/admin/tip/edit?tip={{$tip->id}}" class="btn btn-info">ویرایش</a></td>
                        <td><a href="/admin/tip/delete?tip={{$tip->id}}" onclick="deleteItem(event)" class="btn btn-danger" >حذف</a>
                            <form action="/admin/tip/delete?tip={{$tip->id}}" method="post" id="delete-item">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

