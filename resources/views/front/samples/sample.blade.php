@extends('front.include.master')
@section('page-title')
   {{ $sample->title }}
@endsection
@section('content')
        <div class="row">

            <div class="col-md-3 right-category">
                @include('front.samples.sample_category')
            </div>

            <div class="col-md-9  one-sample" style="border:1px solid tomato">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9 mt-2" style="border:1px solid tomato">
                        <div class="card">
                            <img src="{{ asset('/template/samples/'.$sample->image_title) }}" class="card-img-top" alt="...">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
