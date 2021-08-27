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
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9 mt-2">
                        <div class="card">
                            <img src="{{ asset('/template/samples/'.$sample->main_image) }}" class="card-img-top" alt="...">
                            <div class="card-header">
                                {{$sample->title}}
                            </div>
                            <div class="card-body">

                                <p class="card-text">{{ strip_tags($sample->description) }}</p>
{{--                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
