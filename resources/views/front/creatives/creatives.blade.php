@extends('front.include.master')
@section('page-title')
    خلاقیت و طراحی ها
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 articles-creativity">
            <div class="row row-cols-lg-3 row-cols-md-1 row-cols-sm-1 row-cols-1">

                @foreach($creatives as $creative)
                <div class="col mt-2 articles-creativity-item">
                    <div class="card">
                        <img src="{{ asset('/template/creativity/'.$creative->image) }}" class="card-img-top" alt="article-image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $creative->title }}</h5>
                            <p class="card-text">
                            {{ strip_tags(Str::substr($creative->description,0,160))  }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
@section('my-scripts')
@endsection
