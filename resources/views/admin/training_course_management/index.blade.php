@extends('admin.include.master')
@section('page_title')
    لیست دوره های آموزشی
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
                <h3>دوره های آموزشی</h3>
            </div>
        </div>
        <div class="row">
            <a href="/admin/course/create" class="btn btn-success">ایجاد دوره جدید</a>
        </div>
        <div class="row list-courses-row">

            <table class="table table-bordered table-responsive table-course">
                <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">نام دوره</th>
                            <th class="text-center">مشخصات دوره</th>
                            <th class="text-center">ایجاد قسمت  جدید</th>
                            <th class="text-center">ویرایش</th>
                            <th class="text-center">حذف</th>
                        </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <tr>
                    <td class="text-center">{{ $course->id }}</td>
                    <td class="text-center">{{ $course->title }}</td>
                    <td class="text-center"><a href="/admin/course/detail?course={{$course->id}}"><i class="fa fa-list-alt"></i></a></td>
                    <td class="text-center"><a href="/admin/course/newLesson?course={{ $course->id }}"><i class="fa fa-save"></i></a></td>
                    <td class="text-center"><a href="/admin/course/edit?course={{$course->id}}"><i class="fa fa-edit"></i></a></td>
                    <td class="text-center">
{{--                        <a href="/admin/course/delete?course_id={{$course->id}}"  onclick="deleteItem(event)" ><i class="fa fa-remove"></i></a>--}}
                        <form action="/admin/course/delete?course_id={{$course->id}}" method="post" id="delete-item_form">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="submit"  value="حذف" onclick="deleteItem(event)">
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
