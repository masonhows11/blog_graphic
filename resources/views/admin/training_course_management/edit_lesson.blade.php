@extends('admin.include.master')
@section('page_title')
    ویرایش دروس
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
        <div class="row hr-row">
        </div>
        <div class="row row-add-lesson">
            <form action="/admin/course/updateLesson" method="post">
                @csrf
                <input type="hidden" id="course_id" name="id" value="{{ $course }}">
                <div class="form-group">
                    <label for="title">عنوان:</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           value="{{ $lesson->title }}">
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
                           value="{{ $lesson->name }}">
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
                           value="{{ $lesson->lesson_duration  }}">
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
                           name="video_path" value="{{ $lesson->video_path }}">
                    @error('video_path')
                    <div class="alert alert-danger">{{ $message  }}</div>
                    @enderror
                </div>

                <div class="flex">
                    <button type="submit" class="btn btn-success btn-save-lesson">ویرایش</button>
                    <a href="/admin/course/index" class="btn btn-default btn-cancel-lesson">انصراف</a>

                </div>

            </form>
        </div>
    </div>
@endsection
