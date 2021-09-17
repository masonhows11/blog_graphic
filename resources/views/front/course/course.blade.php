@extends('front.include.master')
@section('page-title')
    {{ $course->title }}
@endsection
@section('content')
    <div class="row">

        <div class="col-md-3 right-category">
            @include('front.course.course_category')
        </div>

        <div class="col-md-9  one-sample">

            <div class="row d-flex  justify-content-center">
                {{-- start course body --}}
                <div class="col-lg-8 mt-2">
                    <div class="card">

                        <input type="hidden" id="course_id" value="{{ $course->id }}">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <img src="{{ asset($course->image) }}" class="card-img-top" alt="...">
                        <div class="card-header">
                            {{$course->title}}
                        </div>
                        <!--  card-body                       -->
                        <div class="card-body">
                            <p class="card-text">{{ strip_tags($course->description) }}</p>
                        </div>
                        <!-- card-footer                       -->
                        <div class="card-footer">
                            <div class="row d-flex flex-row justify-content-evenly">
                                <div class="col-6">
                                    <div class="created_date">
                                        {{ jdate($course->created_at)->format('%d %B %Y') }}
                                    </div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">

                                    <div class="d-flex flex-row-reverse">
                                        <div class="dislike_sec">
                                            @if(Auth::check())
                                                @if( Auth::user()->likes()->where('course_id','=',$course->id) &&
                                                     Auth::user()->likes()->where('course_id','=',$course->id)->where('like','=',0)->first())
                                                    <span id="dislike_count" class="dislike_count"></span>
                                                    <i class="far fa-thumbs-down like" style="color:tomato"
                                                       id="dislike"></i>
                                                @else
                                                    <span id="dislike_count" class="dislike_count"></span>
                                                    <i class="far fa-thumbs-down like" id="dislike"></i>
                                                @endif
                                            @else
                                                <span id="dislike_count" class="dislike_count"></span>
                                                <i class="far fa-thumbs-down like_un_auth" id="dislike"></i>
                                            @endif
                                        </div>
                                        <div class="like_sec mx-2">
                                            @if(Auth::check())
                                                @if( Auth::user()->likes()->where('course_id','=',$course->id) &&
                                                     Auth::user()->likes()->where('course_id','=',$course->id)->where('like','=',1)->first())
                                                    <span id="like_count" class="like_count"></span>
                                                    <i class="far fa-thumbs-up like" style="color:green" id="like"></i>
                                                @else
                                                    <span id="like_count" class="like_count"></span>
                                                    <i class="far fa-thumbs-up like" id="like"></i>
                                                @endif
                                            @else
                                                <span id="like_count" class="like_count"></span>
                                                <i class="far fa-thumbs-up like_un_auth" id="like"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- end course body --}}

                {{-- start course properties and add by user--}}
                <div class="col-lg-3 mt-2 course-detail">
                    <div class="row d-flex flex-column align-content-center">
                        <div class="col-lg-10 mt-2">
                            <p class="text-center mt-2"> {{ $course->title }}</p>
                        </div>
                        <div class="col-lg-10 mt-2">
                            @php
                                $author = \App\Models\Course::join('users','courses.user_id','=','users.id')->select('user_name')->first();
                            @endphp
                            <p class="text-center mt-2"> مدرس : {{ $author->user_name }} </p>
                        </div>
                        <div class="col-lg-10 mt-2">
                            <p class="text-center mt-2"> تعداد دانشجویان : {{ $course->student_count }}</p>
                        </div>
                        <div class="col-lg-10 mt-2">
                            <p class="text-center mt-2"> تعداد ویدئو ها : {{ $course->video_count }} </p>
                        </div>
                        <div class="col-lg-10 mt-2">
                            <p class="text-center mt-2"> سطح دوره : {{ $course->level_course }}</p>
                        </div>
                        <div class="col-lg-10 mt-2">
                            <p class="text-center mt-2"> مدت زمان دوره : {{ $course->course_duration }} </p>
                        </div>
                        <div class="col-lg-10 mt-2">
                            <p class="text-center mt-2"> وضعیت دوره
                                : {{ $course->course_status == 1 ? 'در حال برگزاری' : 'پایان دوره' }} </p>
                        </div>
                        <div class="col-lg-10 d-flex justify-content-center align-content-center mt-2">
                            <div class="d-flex flex-column mt-2 mb-2">
                                @if($course->status_paid == 1 )
                                    <div class="mb-2"><a href="#" class="btn btn-danger" id="price">ثبت نام رایگان در دوره</a></div>
                                @elseif($course->status_paid == 2)
                                    <div class="mb-2"><p class="price "> {{ number_format($course->price) }} تومان </p></div>
                                    <div class="mb-2"><a href="#" class="btn btn-danger" id="price">خرید دروه</a></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{--end course properties and add by user--}}
            </div>

        </div>
    </div>




    <div class="row  mt-5">

        <div class="col-md-3">

        </div>

        <div class="col-md-9">
            <div class="row d-flex flex-column justify-content-center comments-sec">

                <div class="col-lg-9 mt-5 list-comments">
                    @foreach($course->comments as $comment)
                        <div class="card mt-5">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $comment->description }}
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div><span class="users_comment">{{ $comment->user_name }}</span></div>
                                <div><span
                                        class="date_comment">{{ jdate($comment->created_at)->format('%d %B %Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(Auth::check())
                    <div class="col-lg-9 mt-5 mb-5 rounded-3 add-comment">

                        <form action="/comment/store" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="mb-5">
                                <label for="subject-body" class="form-label mt-5">متن دیدگاه</label>
                                <textarea class="form-control @error('description') is_invalid @enderror"
                                          name="description" wrap="physical" id="subject-body" rows="6" cols="6">
                        </textarea>
                                @error('description')
                                <div class="alert alert-danger mt-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary">ارسال دیدگاه</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-lg-9 mt-5 mb-5  message_auth">
                        <p class="text-center">کاربر گرامی برای ثبت دیدگاه خود ابتدا <a href="/loginForm"
                                                                                        class="text-center">وارد</a>
                            سایت شوید با تشکر.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
@section('my-scripts')
    @if(session('message'))
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ session('message') }}',
            })
        </script>
    @endif
    <script type="text/javascript">

        $(document).ready(function () {

            function load_likes() {
                let course_id = document.getElementById('course_id').value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'GET',
                    url: '{{ route('get_course_likes') }}',
                    data: {course_id: course_id},
                }).done(function (data) {

                    document.getElementById('like_count').innerText = data['likes'];
                    document.getElementById('dislike_count').innerText = data['dislikes'];
                });
            }


            $(window).on('load', function () {
                load_likes();
            })


            $('.like').on('click', function (event) {
                event.preventDefault();

                let like = document.getElementById('like');
                let dis_like = document.getElementById('dislike');
                let is_like = '';
                if (event.target.id === 'dislike') {

                    is_like = false;
                } else {
                    is_like = true;
                }
                let course_id = document.getElementById('course_id').value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '{{ route('add_course_Like') }}',
                    data: {is_like: is_like, course_id: course_id},
                }).done(function (data) {
                    if (data['like'] == null) {
                        dis_like.style.color = '';
                        like.style.color = '';
                    } else if (data['like'] === 0) {
                        dis_like.style.color = 'tomato';
                        like.style.color = '';
                    } else if (data['like'] === 1) {
                        like.style.color = 'green';
                        dis_like.style.color = '';
                    }

                    load_likes();
                });
            });
        });

    </script>
@endsection

