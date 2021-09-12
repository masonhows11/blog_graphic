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
        <div  id="app" class="row list-course-lesson-row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>مدت زمان ویدئو</th>
                    <th>ویرایش | حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->lesson_duration }}</td>
                        <td><a href="/admin/course/editLesson?lesson={{ $lesson->id }}"><i class="fa fa-edit"></i></a>
                            <a href="/admin/course/deleteLesson?lesson={{$lesson->id}}"  onclick="deleteItem(event)"><i class="fa fa-remove"></i></a>
                            <form action="/admin/course/deleteLesson?lesson={{$lesson->id}}" method="post" id="delete-item_{{$lesson->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        <div class="row row-paginate">
            <div class="col-lg-3 col-lg-offset-4 col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-5 col-xs-4 col-xs-offset-4">
                {{ $lessons->appends(['course'=>$course->id])->links() }}
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
    </script>
@endsection

