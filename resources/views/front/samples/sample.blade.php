@extends('front.include.master')
@section('page-title')
   {{ $sample->title }}
@endsection
@section('content')
        <div class="row">

            <div class="col-md-3 right-category">
                @include('front.samples.sample_category')
            </div>

            <div class="col-md-9  one-sample">
                <div class="row d-flex flex-column justify-content-center">
                    <div class="col-lg-9 mt-2">
                        <div class="card">
                            <img src="{{ asset('/template/samples/'.$sample->main_image) }}" class="card-img-top" alt="...">
                            <div class="card-header">
                                {{$sample->title}}
                            </div>
                            <div class="card-body">

                                <p class="card-text">{{ strip_tags($sample->description) }}</p>

                            <div class="col-lg-12">
                                    <div class="container mt-5 mb-5 sample-images">
                                        <a class="my_box" href="{{ asset('/template/samples/'.$sample->image1) }}">
                                            <img src="{{ asset('/template/samples/'.$sample->image1) }}" width="150" alt="image">
                                        </a>
                                        <a class="my_box" href="{{ asset('/template/samples/'.$sample->image2) }}">
                                            <img src="{{ asset('/template/samples/'.$sample->image2) }}" width="150" alt="image">
                                        </a>
                                        <a class="my_box" href="{{ asset('/template/samples/'.$sample->image3) }}">
                                            <img src="{{ asset('/template/samples/'.$sample->image3) }}" width="150"  alt="image">
                                        </a>
                                        <a class="my_box" href="{{ asset('/template/samples/'.$sample->image4) }}">
                                            <img src="{{ asset('/template/samples/'.$sample->image4) }}" width="150"  alt="image">
                                        </a>
                                    </div>
                            </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div class="created_date"><span>ایجاد شده در تاریخ : </span>{{ jdate($sample->created_at)->format('%d %B %Y') }}</div>
                                <div class="like_dislike">like</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

@endsection
