@extends('admin.include.master')
@section('page_title')
    نظرات
@endsection
@section('main_content')
    <div class="container comments-section">

        <h1 class="text-center">مدیریت نظرات</h1>

        <div class="row subject_menu">


            <div class="col-md-3">
                <a href="#" id="sample_comments" class="menu_item">
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
                <a href="#" class="menu_item">
                    <p class="text-center mt-4">دوره های آموزشی</p>
                </a>
            </div>


        </div>

        <div class="row list_comments">

            <div class="col-lg-10 col-lg-offset-1">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>عنوان نمونه کار</th>
                        <th>کاربر</th>
                        <th>متن دیدگاه</th>
                        <th>تایید</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('my_script_admin')
    <script>

        $(document).ready(function () {

           $(document).on('click','#sample_comments',function () {
                //console.log(' sample comments clicked');

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   method: 'GET',
                   url: '{{ route('get_likes') }}',
                   data: {sample_id: sample_id},
               }).done(function (data) {


               });
            })


        })


    </script>
@endsection
