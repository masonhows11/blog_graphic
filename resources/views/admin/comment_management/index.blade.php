@extends('admin.include.master')
@section('page_title')
    نظرات
@endsection
@section('main_content')
    <div class="container comments-section">

        <h1 class="text-center">مدیریت نظرات</h1>

        <div class="row subject_menu">


            <div class="col-md-3">
                <a href="#" id="sample_comments" data-uri="{{ route('getSampleComments') }}" class="menu_item">
                    <p class="text-center mt-4">نمونه کارها</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" id="creative_comments" data-uri="{{ route('getCreativesComments') }}" class="menu_item">
                    <p class="text-center mt-4"> خلاقیت و طراحی</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" id="tip_comments" data-uri="{{ route('getTipsComments') }}" class="menu_item">
                    <p class="text-center mt-4">نکات طلایی</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" id="course_comments" data-uri="{{ route('getCoursesComments') }}" class="menu_item">
                    <p class="text-center mt-4">دوره های آموزشی</p>
                </a>
            </div>


        </div>

        <div class="row list_comments">
            <div class="col-lg-10 col-lg-offset-1">
                <table class="table table-bordered" id="tbl_comments">

                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="commentBodyModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">متن دیدگاه</h4>
                        </div>
                        <div class="modal-body">
                            <p id="comment_body"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">خروج</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('my_script_admin')
    <script>
        let global_data_uri = '';
        function load_comment(data_uri) {
            let comments = '';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'GET',
                url: data_uri,
                success: function (data) {
                    const comments_ln = data.length;

                    comments += '<table>' +
                        '<thead><tr>' +
                        '<th class="text-center">شناسه</th>' +
                        '<th class="text-center">عنوان مقاله</th>' +
                        '<th class="text-center">کاربر</th>' +
                        '<th class="text-center">متن دیدگاه</th>' +
                        '<th class="text-center">تایید</th>' +
                        '<th class="text-center">حذف</th>' +
                        '</tr></thead><tbody>';
                    for (let i = 0; i < comments_ln; i++) {
                        comments +=
                            '<tr>' +
                            '<td class="text-center">' + data[i].id + '</td>' +
                            '<td class="text-center">' + data[i].title + '</td>' +
                            '<td class="text-center">' + data[i].user_name + '</td>' +
                            '<td class="text-center"><button type="button"' +
                            ' data-toggle="modal"' +
                            ' data-target="#commentBodyModal"' +
                            ' class="btn btn-outline-light" onclick="get_comment_body(this)" data-comment="' + data[i].description + '" >' +
                            'مشاهد متن دیدگاه</button></td>' +
                            '<td class="text-center"><button onclick="confirm_comment(this)" data-id=" ' + data[i].id + ' "' +
                            ' class="btn btn-light">تایید نشده</button></td>' +
                            '<td class="text-center"><button onclick="delete_comment(this) " data-id=" ' + data[i].id + ' "' +
                            ' class="btn btn-danger">حذف</button></td>' +
                            '</tr>';
                    }
                    comments += '</tbody>';
                    document.getElementById('tbl_comments').innerHTML = comments;
                }, error: function (error) {
                    console.log(error)
                },
            });
        }
        // load comment when comment index page is complete loaded
        /*  $(window).on('load',function () {
            load_comment();
        });*/
        $(document).on('click', '#sample_comments', function () {

            let data_uri = document.getElementById('sample_comments').getAttribute('data-uri');
            global_data_uri = data_uri;
            load_comment(data_uri);
        });
        $(document).on('click', '#creative_comments', function () {

            let data_uri = document.getElementById('creative_comments').getAttribute('data-uri');
            global_data_uri = data_uri;
            load_comment(data_uri);
        });
        $(document).on('click', '#tip_comments', function () {

            let data_uri = document.getElementById('tip_comments').getAttribute('data-uri');
            global_data_uri = data_uri;
            load_comment(data_uri);
        });
        $(document).on('click', '#course_comments', function (event) {
            let data_uri = document.getElementById('course_comments').getAttribute('data-uri');
            global_data_uri = data_uri;
            load_comment(data_uri);
        });

        /*********get comment body / text *******/
        function get_comment_body(body) {
            let comment_body = '';
            comment_body = body.getAttribute('data-comment');
            document.getElementById('comment_body').innerHTML = comment_body;
        }

        /********* Confirm comment **********/
        function confirm_comment(id) {
            let comment_id = '';
            comment_id = id.getAttribute('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                data: {comment_id: comment_id},
                url: '{{ route('confirmComment') }}',
                success: function (data) {
                    if (data['status'] === 200) {
                        Swal.fire({
                            icon: 'success',
                            text: data['success'],
                        })
                    }
                    load_comment(global_data_uri);
                }, error: function () {
                }
            });
        }
        /*********delete comment*********/
        function delete_comment(id) {
            let comment_id = '';
            comment_id = id.getAttribute('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'GET',
                data: {comment_id: comment_id},
                url: '{{ route('deleteComment') }}',
                success: function (data) {
                    if (data['status'] === 200) {
                        Swal.fire({
                            icon: 'success',
                            text: data['success'],
                        })
                    }
                    load_comment(global_data_uri);
                }, error: function () {

                }
            });
        }

    </script>
@endsection
