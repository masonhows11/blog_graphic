@extends('admin.include.master')
@section('page_title')
    نکته جدید
@endsection
@section('main_content')
    <div class="container">

        <div class="row tip-create-row">
            <form action="/admin/tip/update" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $tip->id }}">
                <div class="form-group">
                    <label for="title">عنوان:</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title" value="{{ $tip->title }}">
                    @error('title')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="short_description">چکیده:</label>
                    <textarea type="text" name="short_description"
                              rows="5"
                              class="form-control @error('short_description') is-invalid @enderror"
                              id="short_description">{{ $tip->short_description }}</textarea>
                    @error('short_description')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="editor-text" name="description">{{ $tip->description }}</textarea>
                    @error('short_description')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" id="image_title" class="form-control @error('image') is-invalid @enderror"
                           name="image"
                           aria-label="Image"
                           aria-describedby="button-image" value="{{ $tip->image }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default"
                                type="button"
                                id="button-image">انتخاب تصویر</button>
                    </div>
                </div>
                @error('image')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-success btn-save-tip">ذخیره</button>
                <a href="/admin/tip/index" class="btn btn-default btn-save-tip">انصراف</a>
            </form>
        </div>

    </div>
@endsection
@section('my_script_admin')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // for button-image-title
            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_title'
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

        });
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }
    </script>
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor-text', {
            language: 'fa',
            removePlugins: 'image',
        });
    </script>
@endsection
