@extends('admin.include.master')
@section('page_title')
    نظرات
@endsection
@section('main_content')
    <div class="container comments-section" style="border:1px solid tomato">

        <h1 class="text-center">مدیریت نظرات</h1>

        <div class="row subject_menu" style="border:1px solid red;height: auto">


            <a href="/samples/index" class="col-lg-2 col-md-2 menu_item ">
                <div><p class="text-center mt-4">نمونه کارها</p></div>
            </a>

            <a href="#" class="col-lg-2 col-md-2 menu_item ">
                <div><p class="text-center mt-4"> خلاقیت و طراحی</p></div>
            </a>

            <a href="#" class="col-lg-2 col-md-2 menu_item ">
                <div><p class="text-center mt-4">نکات طلایی</p></div>
            </a>

            <a href="/store/index" class="col-lg-2 col-md-2 menu_item ">
                <div><p class="text-center mt-4">دوره های آموزشی</p></div>
            </a>

        </div>

        <div class="row list_comments " style="border:1px solid red;height: auto">

            <div class="col-lg-10 " style="border:1px solid black;height: 100px">

            </div>

        </div>

    </div>
@endsection
