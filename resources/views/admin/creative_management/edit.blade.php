@extends('admin.include.master')
@section('page_title')
    ویرایش خلاقیت
@endsection
@section('main_content')
    <div class="container">

        <div class="row creative-create-row">

            <form action="/admin/creative/update" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $creative->id }}">
                <div class="form-group">
                    <label for="title">عنوان خلاقیت را به فارسی وارد کنید:</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title" value="{{ $creative->title }}">
                    @error('title')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name"> نام خلاقیت را به انگلیسی وارد کنید:</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           id="title" value="{{ $creative->name  }}">
                    @error('name')
                    <div class="alert alert-danger fade-in">{{ $message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">توضیحات را وارد کنید:</label>
                    <textarea id="editor-text"
                              class="form-control @error('description') is-invalid @enderror"
                              name="description">
                        {{ $creative->description }}
                    </textarea>
                    @error('description')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>

                <label for="" class="">یک تصویر انتخاب کنید:</label>

                <div class="input-group">
                    <input type="text" id="image_title" class="form-control @error('image') is-invalid @enderror"
                           name="image"
                           aria-label="Image" aria-describedby="button-image" value="{{ $creative->image  }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" id="button-image-title">آپلود عکس</button>
                    </div>
                </div>
                @error('image')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-save-tip">ذخیره</button>
                    <a href="/admin/creative/index" class="btn btn-default btn-save-tip">انصراف</a>
                </div>
            </form>

        </div>

    </div>
@endsection
@section('my_script_admin')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // for button-image-title
            document.getElementById('button-image-title').addEventListener('click', (event) => {
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
