@include('front.include.header')
@include('front.include.navbar')
@include('front.include.search_box')
@include('front.include.main_menu')
{{--@include('front.include.slider')--}}
<div class="container">
    @yield('content')
</div>
@include('front.include.footer')
