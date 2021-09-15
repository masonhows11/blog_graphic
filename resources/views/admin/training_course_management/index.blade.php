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
                    <th class="text-center">وضعیت انتشار</th>
                    <th class="text-center">ایجاد قسمت جدید</th>
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
                        <td class="text-center"><button data-course-id="{{$course->id}}" id="publish_course">{{ $course->status_publish == 1 ? 'منتشر شده': 'منتشر نشده' }}</button></td>
                        <td class="text-center"><a href="/admin/course/edit?course={{$course->id}}"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><button  data-course-id="{{ $course->id }}" class="fa fa-remove" id="deleteItem"></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('my_script_admin')
    <script>
        $(document).on('click', '#deleteItem', function (event) {
            event.preventDefault();
            let  course_id = event.target.getAttribute('data-course-id');
            let  course_element = event.target.parentElement.parentElement;
            swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result)=>{
                if (result.isConfirmed) {
                   $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('deleteCourse') }}',
                        data: {course_id:course_id},
                    }).done(function (data) {
                        course_element.remove();
                        if(data['status'] === 200)
                        {
                            swal.fire({
                                icon: 'success',
                                text: data['success'],
                            })
                        }
                    }).fail(function (data) {
                        if(data['status'] === 500)
                        {
                            swal.fire({
                                icon: 'error',
                                text: data['error'],
                            })
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '#publish_course', function (event) {
            event.preventDefault();
            let  course_id = event.target.getAttribute('data-course-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: '{{ route('changePublishStatus') }}',
                data: {course_id:course_id},
            }).done(function (data) {
                console.log(data);
                if(data['status'] === 200)
                {
                    if(data['publish'] == 0)
                    {
                        event.target.innerText = 'منتشر نشده';
                    }
                    if (data['publish'] == 1){
                        event.target.innerText = 'منتشر شده';
                    }

                    swal.fire({
                        icon: 'success',
                        text: data['success'],
                    })
                }
                if(data['status'] === 500)
                {
                    swal.fire({
                        icon: 'error',
                        text: data['error'],
                    })
                }
            }).fail(function (data) {
                console.log(data);
            });
        });
    </script>
@endsection
