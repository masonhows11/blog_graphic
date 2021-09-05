@extends('admin.include.master')
@section('page_title')
    نظرات
@endsection
@section('main_content')
    <div class="container comments-section" style="border:1px solid tomato">

        <h1 class="text-center">مدیریت نظرات</h1>

        <div class="row subject_menu" style="border:1px solid red;height: auto">


            <div class="col-md-3">
                <a href="/samples/index" class="menu_item">
                   <p class="text-center mt-4">نمونه کارها</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" class="menu_item">
                   <p class="text-center mt-4"> خلاقیت و طراحی</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" class="menu_item">
                   <p class="text-center mt-4">نکات طلایی</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/store/index" class="menu_item">
                    <p class="text-center mt-4">دوره های آموزشی</p>
                </a>
            </div>








        </div>

        <div class="row list_comments " style="border:1px solid red;height: auto">

            <div class="col-lg-10 col-lg-offset-1" style="border:1px solid black;height: 100px">

            </div>

        </div>

    </div>
@endsection
