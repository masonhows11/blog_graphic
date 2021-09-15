@extends('front.include.master')
@section('page-title')

@endsection
@section('content')
    <div class="row">

        <div class="col-md-3 right-category">
            @include('front.course.course_category')
        </div>

        <div class="col-md-9  list-samples-left">

            <div class="row  row-cols-lg-3 row-cols-md-1 row-cols-sm-1 row-cols-1">

                @foreach($courses as $course)
                    <div class="col mt-2 samples-item">
                        <div class="card">
                            <img src="{{ asset($course->image) }}" class="card-img-top"
                                 alt="main_image_sample">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">
                                    {{ strip_tags(\Illuminate\Support\Str::substr($course->description,0,160)) }}
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="/courses/course/{{$course->slug}}" class="text-center">ادامه...</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection

