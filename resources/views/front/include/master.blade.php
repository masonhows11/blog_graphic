@include('front.include.header')
@include('front.include.navbar')
@include('front.include.search_box')
@include('front.include.main_menu')
<div class="container mt-5 main-section">
    @yield('content')
</div>

@include('front.include.footer')
@yield('my-scripts')
