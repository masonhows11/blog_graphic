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
            @include('front.course.course_category')
        </div>
        <div class="col-md-9  list-samples-left">
            <div class="row  row-cols-lg-3 row-cols-md-1 row-cols-sm-1  row-cols-1">
                @foreach($courses as $course)
                    <div class="col mt-2 samples-item">
                        <div class="card">
                            <img src="{{ asset('template/images/'.$course->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ strip_tags(\Illuminate\Support\Str::substr($course->description,0,96))}}</p>
                                <p class="author"></p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    @if($course->status_paid == 1)
                                        <p class="course_price w3-flat-alizarin text-center">رایگان</p>
                                    @elseif($course->status_paid == 2)
                                        <p class="course_price w3-flat-alizarin text-center">{{ number_format($course->price) }}  تومان  </p>
                                    @endif
                                </div>
                                <div>
                                    <a href="/courses/course/{{$course->slug}}" class="text-center continue-course">ادامه...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
