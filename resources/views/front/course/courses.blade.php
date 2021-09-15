@extends('front.include.master')
@section('page-title')
    فروشگاه
@endsection
@section('content')
    <div class="row mb-4 filter-courses">
        <div class="col d-flex filter-courses-item">
            <ul class="nav mt-1 justify-content-start">
                <li class="nav-item">
                    <a class="nav-link disabled" aria-current="page" href="#">فیلتر دوره ها :</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">رایگان</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">نقدی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">اعضای ویژه</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 right-category">
            <h5 class="mt-4">دسته بندی ها</h5>
            <ul class="list-group samples-category">
                @foreach($categories as $category)
                    <li class="list-group-item mt-2 parent"><a href="#" class="">{{$category->title}}</a></li>
                    @if(count($category->subCategory) > 0)
                        @include('front.course.sub_category',
                        ['sub_category'=>$category->subCategory])
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="col-md-9  list-samples-left">

            <div class="row  row-cols-lg-3 row-cols-md-1 row-cols-sm-1  row-cols-1">

                @foreach($courses as $course)
                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="{{asset($course->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ strip_tags(\Illuminate\Support\Str::substr($course->description,0,160))}}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="/" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
