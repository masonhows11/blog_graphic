@extends('front.include.master')
@section('page-title')
    خانه
@endsection
@section('content')
    @include('front.include.slider')
    <!-- start latest-gold-tips   -->
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3">
                <h4 class="text-center title-section">آخرین نکات طلایی</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center  mt-5 w3-flat-clouds">

        <div class="col-lg-2 mt-5 animate-div">
            <img src="{{'/images/template/animate-img-1.png'}}" data-aos="fade-right" class="img-fluid" alt="">
        </div>

        <div class="row latest-gold-tips d-flex justify-content-center " id="trigger-left">


            <div class="col-sm mt-5 latest-gold-tips-item" >
                <img src="{{'/images/template/vector-tips.jpg'}}" class="img-thumbnail" alt="gold-tip-image">
                <p class="text-center tips-summary">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                </p>
                <a href="#" class="continue-post">ادامه مطلب</a>
            </div>

            <div class="col-sm mt-5 latest-gold-tips-item" >
                <img src="{{'/images/template/vector-tips.jpg'}}" class="img-thumbnail" alt="gold-tip-image">
                <p class="text-center tips-summary">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                </p>
                <a href="#" class="continue-post">ادامه مطلب</a>
            </div>

            <div class="col-sm mt-5 latest-gold-tips-item" id="trigger-right">
                <img src="{{'/images/template/vector-tips.jpg'}}" class="img-thumbnail" alt="gold-tip-image">
                <p class="text-center tips-summary">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                </p>
                <a href="#" class="continue-post">ادامه مطلب</a>
            </div>

        </div>

        <div class="col-lg-2 mt-5 animate-div">
            <img src="{{'/images/template/animate-img-2.png'}}" data-aos="fade-left" class="img-fluid" alt="">
        </div>
    </div>
    <!-- end latest-gold-tips   -->

    <!-- start latest-creativity   -->
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3">
                <h4 class="text-center title-section">آخرین خلاقیت ها و طراحی ها</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center mt-5 w3-flat-clouds">

        <div class="col-lg-2  mt-5 animate-div" data-aos="fade-right">
            <img src="{{'/images/template/animate-img-3.png'}}" class="img-fluid" alt="">
        </div>

        <div class="row latest-creativity d-flex justify-content-center mt-5">
            <div class="col-sm latest-gold-tips-item">
                <img src="{{'/images/template/vector-creative.jpg'}}" class="img-thumbnail" alt="gold-tip-image">
                <p class="text-center  tips-summary">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                </p>
                <a href="#" class="continue-post">ادامه مطلب</a>
            </div>

            <div class="col-sm latest-gold-tips-item">
                <img src="{{'/images/template/vector-creative.jpg'}}" class="img-thumbnail" alt="gold-tip-image">
                <p class="text-center tips-summary">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                </p>
                <a href="#" class="continue-post">ادامه مطلب</a>
            </div>

            <div class="col-sm latest-gold-tips-item">
                <img src="{{'/images/template/vector-creative.jpg'}}" class="img-thumbnail" alt="gold-tip-image">
                <p class="text-center tips-summary">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                </p>
                <a href="#" class="continue-post">ادامه مطلب</a>
            </div>
        </div>

        <div class="col-lg-2  mt-5 animate-div" data-aos="fade-left">
            <img src="{{'/images/template/animate-img-4.png'}}" class="img-fluid" alt="">
        </div>

    </div>

    <!-- end latest-creativity   -->

    <!-- start site introducing  -->
    <div class="container">
        <div class="row  site-introducing d-flex justify-content-center mt-5">

            <div class="col-lg-10 site-introducing-content rounded-3">
                <h4 class="text-center">معرفی سایت</h4>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                    متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده
                    شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                    الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و
                    دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                    اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </div>

        </div>
    </div>
    <!-- start site introducing  -->
@endsection
