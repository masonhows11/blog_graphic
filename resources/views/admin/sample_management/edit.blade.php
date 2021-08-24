
@extends('admin.include.master')
@section('page_title')
    ویرایش نمونه کار
@endsection
@section('main_content')
    <div class="container">

        <div class="row sample-create-row">
            <form action="/admin/sample/update" class="" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $sample->id }}">
                <div class="form-group">
                    <label for="title">عنوان:</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title" value="{{ $sample->title }}">
                    @error('title')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="editor-text"
                              name="description">{{ $sample->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger fade-in">{{ $message }}</div>
                    @enderror
                </div>

                <label for="" class="label-select-image">انتخاب تصویر:</label>
                <!-- input file type button image 1                -->
                <div class="input-group">
                    <input type="text" id="image1" class="form-control @error('image') is-invalid @enderror"
                           name="image1"
                           aria-label="Image" aria-describedby="button-image" value="{{ $sample->image1 }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" id="button-image-1">آپلود عکس ۱</button>
                    </div>
                </div>
                @error('image-1')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            <!-- input file type button image 2                -->
                <div class="input-group">
                    <input type="text" id="image2" class="form-control @error('image') is-invalid @enderror"
                           name="image2"
                           aria-label="Image" aria-describedby="button-image" value="{{ $sample->image2 }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" id="button-image-2">آپلود عکس ۲</button>
                    </div>
                </div>
                @error('image-2')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            <!-- input file type button image 3                -->
                <div class="input-group">
                    <input type="text" id="image3" class="form-control @error('image') is-invalid @enderror"
                           name="image3"
                           aria-label="Image" aria-describedby="button-image" value="{{ $sample->image3 }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" id="button-image-3">آپلود عکس ۳</button>
                    </div>
                </div>
                @error('image-3')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror
            <!-- input file type button image 4                -->
                <div class="input-group">
                    <input type="text" id="image4" class="form-control @error('image') is-invalid @enderror"
                           name="image4"
                           aria-label="Image" aria-describedby="button-image" value="{{ $sample->image4 }}">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" id="button-image-4">آپلود عکس ۴</button>
                    </div>
                </div>

                @error('image-4')
                <div class="alert alert-danger fade-in">{{ $message }}</div>
                @enderror


                <div class="category-index-sample" style="height: auto">
                    <label for="">انتخاب دسته بندی:</label>
                    <ul class="list-group ">
                        @foreach ($parent_categories as $cat )
                            <li class="category-index-sample-ul">
                                <i class="fa fa-plus-circle parent"></i>
                                <input type="checkbox" id="cat_{{ $cat->id }}"
                                       class="@error('cat') is-invalid @enderror"
                                       name="cat[]"
                                       value="{{ $cat->id }}" {{ in_array($cat->id,$sample->categories()->pluck('category_id')->toArray()) ? 'checked':''}}>
                                <label for="cat_{{ $cat->id }}" class="">{{$cat->title}}</label>
                                @if (count($cat->subCategory))
                                    @include('admin.sample_management.sub_category_index',
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
                    <button type="submit" class="btn btn-success btn-save-tip">ویرایش</button>
                    <a href="/admin/sample/index" class="btn btn-default btn-save-tip">انصراف</a>
                </div>

            </form>
        </div>

    </div>
@endsection

