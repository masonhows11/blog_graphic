@extends('front.include.master')
@section('page-title')
    فروشگاه
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 right-category">
            <h5 class="mt-4">دسته بندی ها</h5>
            <ul class="list-group samples-category">
                @foreach($categories as $category)
                    <li class="list-group-item mt-2 parent"><a href="#" class="">{{$category->title}}</a></li>
                    @if(count($category->subCategory) > 0)
                        @include('front.store.sub_category',
                        ['sub_category'=>$category->subCategory])
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="col-md-9  list-samples-left">

            <div class="row  row-cols-lg-3 row-cols-md-1 row-cols-sm-1">

                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="/images/template/vector-sample-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">عنوان دوره</h5>
                            <p class="card-text">
                                ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="/images/template/vector-sample-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">عنوان دوره</h5>
                            <p class="card-text">
                                ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="/images/template/vector-sample-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">عنوان دوره</h5>
                            <p class="card-text">
                                ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="/images/template/vector-sample-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">عنوان دوره</h5>
                            <p class="card-text">
                                ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="/images/template/vector-sample-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">عنوان دوره</h5>
                            <p class="card-text">
                                ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>

                <div class="col mt-2 samples-item">
                    <div class="card">
                        <img src="/images/template/vector-sample-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">عنوان دوره</h5>
                            <p class="card-text">
                                ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#" class="text-center">ادامه...</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
