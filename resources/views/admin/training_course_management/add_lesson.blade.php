@extends('admin.include.master')
@section('page_title')
    ایجاد قسمت جدید
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

        <div class="page-header">
            <h3>دوره آموزشی : {{ $course->title }}</h3>
        </div>
        <div class="row hr-row">
        </div>
        <div class="row row-add-lesson">
            <form action="/admin/course/storeNewLesson" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="course_id" name="id" value="{{ $course->id }}">
                <div class="form-group">
                    <label for="title">عنوان:</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           value="{{ old('title') }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">نام انگلیسی:</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lesson_duration">مدت زمان ویدئو:</label>
                    <input type="text"
                           name="lesson_duration"
                           class="form-control @error('lesson_duration') is-invalid @enderror"
                           id="lesson_duration"
                           value="{{ old('lesson_duration') }}">
                    @error('lesson_duration')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{--<div class="form-group">
                    <label for="video_path">انتخاب فایل ویدئو:</label>
                    <input type="file"
                           class="form-control @error('video_path') is_invalid @enderror"
                           name="video_path" id="input_file" onchange="selectFile(event)">
                    @error('video_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>--}}
                <div class="form-group">
                    <label for="video_path">لینک فایل آموزشی:</label>
                    <input type="text" class="form-control @error('video_path') is-invalid @enderror"
                           name="video_path">
                    @error('video_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex">
                    <button type="submit" class="btn btn-success btn-save-lesson">ذخیره</button>
                    <a href="/admin/course/index" class="btn btn-default btn-cancel-lesson">انصراف</a>

                </div>

            </form>
        </div>
        <div id="app" class="row list-course-lesson-row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>مدت زمان ویدئو</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->lesson_duration }}</td>
                        <td><a href="/admin/course/editLesson?lesson={{ $lesson->id }}&course_id={{$course->id}}"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <button class="fa fa-remove" data-lesson-id="{{ $lesson->id }}" id="deleteItem"></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        <div class="row row-paginate">
            <div
                class="col-lg-3 col-lg-offset-4 col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-5 col-xs-4 col-xs-offset-4">
                {{ $lessons->appends(['course'=>$course->id])->links() }}
            </div>
        </div>
    </div>
@endsection
@section('my_script_admin')
    {{--<script type="text/javascript">
        function selectFile(event) {
            const size = 180;
            const fileList = event.target.files;
            this.path_file = fileList[0].name;
            const types = ['video/mp4', 'video/mkv', 'video/avi'];
            // get type of selected file
            const selectedType = fileList[0].type;
            // get size of selected file and round it to normal number or Number without decimals
            const selectedSize = (fileList[0].size / 1024 / 1024).toFixed(0);
            // fill error variable for show error message
            let error = null;
            if (!types.includes(selectedType)) {
                error++;
            }
            if (selectedSize > size) {
                error++;
            }
            if (error > null) {
                swal.fire({
                    title: 'نوع فایل انتخابی مجاز نمی باشد',
                    icon: 'error',
                    text: 'حجم فایل انتخابی نباید بیشتر از ۱۸۰ مگابایت باشد. فرمت فایل انتخابی باید mp4,mkv,avi باشد',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'بازگشت !',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('input_file').value = null;
                    }
                });
            }
        }
    </script>--}}
    <script>
        $(document).on('click', '#deleteItem', function (event) {
            event.preventDefault();
            let lesson_id = event.target.getAttribute('data-lesson-id');
            let course_id = document.getElementById('course_id').value;
            let course_element = event.target.parentElement.parentElement;
            swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('deleteLesson') }}',
                        data: {course_id: course_id, lesson_id: lesson_id},
                    }).done(function (data) {
                       // console.log(data);
                        course_element.remove();
                         if (data['status'] === 200) {
                             swal.fire({
                                 icon: 'success',
                                 text: data['success'],
                             })
                         }
                         if(data['status']===500)
                         {
                             swal.fire({
                                 icon: 'error',
                                 text: data['error'],
                             })
                         }
                    }).fail(function (data) {
                         console.log(data);
                    });
                }
            });
        });
    </script>
@endsection
