@extends('admin.include.master')
@section('page_title')
    ویرایش دسته بندی
@endsection
@section('main_content')
    <div class="container">

        <h1 class="text-center"> ویرایش دسته بندی ها </h1>
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
        <div class="row">
                <form action="/admin/category/update" class="category-form" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="well well-sm">
                            <label for="title">نام دسته بندی به فارسی</label>
                        </div>
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                               id="title" placeholder="نام دسته بندی" value="{{ $category->title }}">
                        @error('title')
                        <div class="alert alert-warning alert-war-margin">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="well well-sm">
                            <label for="name">نام دسته بندی به انگلیسی</label>
                        </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" placeholder="نام دسته بندی" value="{{ $category->name }}">
                        @error('name')
                        <div class="alert alert-warning alert-war-margin">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="well well-sm">
                            <label for="slug">اسلاگ به انگلیسی</label>
                        </div>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                               id="slug" placeholder="نام دسته بندی" value="{{ $category->slug}}">
                        @error('slug')
                        <div class="alert alert-warning alert-war-margin">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="well well-sm">
                            <label for="parent">انتخاب دسته بندی والد</label>
                        </div>
                        <select class="form-control" id="parent" name="parent">
                            <option value=""></option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">ویرایش</button>
                    <a href="/admin/category/index" class="btn btn-warning">انصراف</a>
                </form>
            </div>
    </div>


    </div>

@endsection


