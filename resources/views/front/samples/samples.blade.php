@extends('front.include.master')
@section('page-title')
    نمونه کارها
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 right-category">
            <h5 class="mt-4">دسته بندی ها</h5>
            <ul class="list-group samples-category">
                @foreach($categories as $category)
                    <li class="list-group-item mt-2 parent"><a href="/samples/samplesCategory/{{$category->name}}" class="">{{$category->title}}
                        </a></li>
                    @if(count($category->subCategory) > 0)
                        @include('front.samples.sub_category',
                        ['sub_category'=>$category->subCategory])
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="col-md-9  list-samples-left">

            <div class="row  row-cols-lg-3 row-cols-md-1 row-cols-sm-1 row-cols-1">

                @foreach($samples as $sample)
                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="{{ asset('/template/samples/'.$sample->image_title) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sample->title }}</h5>
                            <p class="card-text">
                            {{ strip_tags($sample->description) }}
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
