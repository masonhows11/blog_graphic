@extends('admin.include.master')
@section('page_title')
    لیست دوره های آموزشی
@endsection
@section('main_content')
    <div class="container">




        <form action="/admin/course/store" method="post">
            @csrf
            <div class="form-group">
                <label for="title">عنوان:</label>
                <input type="text"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}"
                       id="title">
                @error('title')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">نام انگلیسی دوره:</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name">
                @error('name')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">توضیحات:</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="editor-text" rows="5"
                          name="description">
                            {{ old('description') }}
                </textarea>
                @error('description')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="level_course">سطح دوره:</label>
                <input type="text" class="form-control @error('level_course') is-invalid @enderror"
                       name="level_course" value="{{ old('level_course') }}" id="level_course">
                @error('level_course')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="paid">نوع پرداخت:</label>
                <select class="form-control  @error('status_paid') is-invalid @enderror"
                        name="status_paid"
                        id="paid">
                    <option value="">نوع پرداخت راانتخاب کنید...</option>
                    <option value="0">رایگان</option>
                    <option value="1">خریدنی</option>
                </select>
                @error('status_paid')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">قیمت دوره:</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror"
                       name="price" value="{{ old('price') }}" id="price">
                @error('price')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            </div>

            {{-- select image  --}}
            <div class="input-group">
                <input type="text"
                       id="image_label"
                       class="form-control @error('image') is-invalid @enderror"
                       name="image"
                       value="{{ old('image') }}"
                       aria-label="Image" aria-describedby="button-image">
                <div class="input-group-btn">
                    <button class="btn btn-default"
                            type="button"
                            id="button-image">انتخاب تصویر</button>
                </div>
            </div>
            @error('image')
            <div class="alert alert-danger fade-in">{{ $message }}</div>
            @enderror

        {{--  select category    --}}
            <div class="category-index-sample" style="height: auto">
                <label for="">انتخاب دسته بندی:</label>
                <ul class="list-group ">
                    @foreach ($parent_categories as $cat )
                        <li class="category-index-sample-ul">
                            <i class="fa fa-plus-circle parent"></i>
                            <input type="checkbox" id="cat_{{ $cat->id }}"
                                   class="@error('cat') is-invalid @enderror"
                                   name="cat[]"
                                   value="{{ $cat->id }}">
                            <label for="cat_{{ $cat->id }}" class="">{{$cat->title}}</label>
                            @if (count($cat->subCategory))
                                @include('admin.training_course_management.sub_category_index',
                                   ['sub_category'=>$cat->subCategory])
                            @endif
                        </li>
                    @endforeach
                </ul>

                @error('cat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">ذخیره</button>
                <a href="/admin/course/index" class="btn btn-default">انصراف</a>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });
        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
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

