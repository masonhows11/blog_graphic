@extends('admin.include.master')
@section('page_title')
    دسته بندی ها
@endsection
@section('main_content')
    <div class="container">

        <h1 class="text-center"> دسته بندی ها </h1>
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
            <div class="col-lg-6  category-index-col">
                <form action="/admin/category/store" class="category-form" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="well well-sm">
                            <label for="title">نام دسته بندی به فارسی</label>
                        </div>

                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                               id="title" placeholder="نام دسته بندی">
                        @error('title')
                        <div class="alert alert-warning alert-war-margin">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="well well-sm">
                            <label for="name">نام دسته بندی به انگلیسی</label>
                        </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" placeholder="نام دسته بندی">
                        @error('name')
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
                    <button type="submit" class="btn btn-success">ذخیره</button>
                </form>
            </div>
            <div class="col-lg-5 col-lg-offset-1 category-index-tree" style="height:auto">
                <ul class="list-group">
                    @if(!$parent_categories->isEmpty())
                    @foreach ($parent_categories as $cat )
                        <li class="">
                            <h5 class="parent well well-sm">{{$cat->title}}</h5>
                            @if($cat->parent_id != null )
                                <a href="/admin/category/edit?cat={{ $cat->id }}" class="label label-info">ویرایش</a>
                                <a href="/admin/category/delete?cat={{ $cat->id }}" class="label label-danger">حذف</a>
                                <a href="/admin/category/detachParent?cat={{ $cat->id  }}"
                                   class="label label-warning">حذف از والد </a>
                            @else
                                <a href="/admin/category/edit?cat={{ $cat->id }}" class="label label-info ">ویرایش</a>
                                <a href="/admin/category/delete?cat={{ $cat->id }}" class="label label-danger">حذف</a>
                            @endif

                            @if (count($cat->subCategory))
                                @include('admin.category_management.sub_category_index',
                                   ['sub_category'=>$cat->subCategory])
                            @endif
                        </li>
                    @endforeach
                    @else
                     <p class="no-category-message" style="margin-top: 15px">دسته بندی وجود ندارد</p>
                    @endif
                </ul>
            </div>
        </div>
    </div>


    </div>

@endsection

