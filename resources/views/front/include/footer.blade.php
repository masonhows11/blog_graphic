<!-- start bottom-nav   -->
<div class="container">
    <div class="row d-flex justify-content-evenly bottom-nav mt-5">

        <div class="col-lg-2 col-md-2 mt-2 col-sm-3 bottom-nav-item text-center">
            <img src="{{'/images/template/vector-contact-us-resized.jpg'}}" class="img-thumbnail" alt="contact_us_image">
            <a href="#"><p>ارتباط با ما</p></a>
        </div>
        <div class="col-lg-2 col-md-2 mt-2 col-sm-3  bottom-nav-item text-center">
            <img src="{{'/images/template/vector-store2_resized.jpg'}}" class="img-thumbnail" alt="store_image">
            <a href="#"><p>فروشگاه</p></a>
        </div>
        <div class="col-lg-2 col-md-2 mt-2 col-sm-3 bottom-nav-item text-center">
            <img src="{{'/images/template/vector-question.jpg'}}" class="img-thumbnail" alt="ask_question_image">
            <a href="#"><p>پرسش و پاسخ</p></a>
        </div>

    </div>
</div>
<!-- end bottom-nav   -->

<!-- start footer    -->
<div class="container footer-wrapper">
    <div class="row gy-5 justify-content-around  w3-flat-clouds footer mt-5">

        <div class="col-lg-3 footer-about text-center">
            <strong>درباره :</strong>
            <div class="p-2"><a href="about_us.html">هدف مجموعه <span class="key-name-site">بردگراف</span> آموزش تخصصی نرم افزارهای گرافیکی است و در تلاشیم نکات گرافیکی را در اختیار مخاطبان و علاقمندان قرار دهیم....</a></div>
        </div>
        <div class="col-lg-3 footer-links">
            <div class="p-5 d-flex justify-content-around">
                <div><a href="#"><img src="{{'/front/icons/telegram-icon48.png'}}" alt="telegram-link"></a></div>
                <div><a href="#"><img src="{{'/front/icons/instagram-icon48.svg'}}" alt="instagram-link"></a><span></span></div>
                <div><a href="#"><img src="{{'/front/icons/whatsapp-icon-40.png'}}" class="whatsapp-link" alt="whats'app-link"></a></div>
            </div>
        </div>

        <div class="col-lg-9 footer-copy-right p-4  d-flex justify-content-between">

            <div class="col-lg-6 text-center">تمام حقوق مادی و معنوی این سایت متعلق است به سازنده آن.</div>
            <div class="col-lg-6 text-center">طراحی و برنامه نویسی شده توسط mason.hows11</div>
        </div>
    </div>
</div>
<!-- end footer   -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/http_unpkg.com_aos@2.3.1_dist_aos.js') }}"></script>
<script>
    AOS.init({
        duration: 1200,
        easing: 'ease-in-out-back'
    });
</script>
</body>
</html>

