@extends('front.include.master')
@section('page-title')
    {{ $tip->title }}
@endsection
@section('content')
    <div class="row  d-flex justify-content-center one-sample">

        <div class="col-lg-9 mt-2">
            <div class="card">
                <input type="hidden" id="tip_id" value="{{ $tip->id }}">
                <input type="hidden" id="token" value="{{ csrf_token() }}">
                <img src="{{ asset('/template/tips/'.$tip->image) }}" class="card-img-top" alt="">
                <div class="card-header">
                    {{ $tip->title }}
                </div>
                {{-- body--}}
                <div class="card-body">
                    <p class="card-text">{{ strip_tags($tip->description) }}</p>
                </div>
                {{--end body--}}

                {{-- footer  --}}
                <div class="card-footer">
                    <div class="row d-flex flex-row justify-content-evenly">
                        <div class="col-6">
                            <div class="created_date">
                                {{ jdate($tip->created_at)->format('%d %B %Y') }}
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end">

                            <div class="d-flex flex-row-reverse">

                                {{--   <input type="hidden" id="auth_user"
                                          value="{{ \Illuminate\Support\Facades\Auth::user() }}">--}}
                                <div class="dislike_sec">
                                    @if(Auth::check())
                                        @if( Auth::user()->likes()->where('tips_id','=',$tip->id) &&
                                             Auth::user()->likes()->where('tip_id','=',$tip->id)->where('like','=',0)->first())
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
                                        @if( Auth::user()->likes()->where('tip_id','=',$tip->id) &&
                                             Auth::user()->likes()->where('tip_id','=',$tip->id)->where('like','=',1)->first())
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
                {{--end footer--}}
            </div>
        </div>
    </div>

    {{-- comments--}}
    <div class="row mt-5 d-flex  justify-content-center comments-sec">


        <div class="col-lg-9 mt-5 list-comments">
            @foreach($tip->comments as $comment)
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
                    <input type="hidden" name="tip_id" value="{{ $tip->id }}">
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
    {{-- end comments--}}


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
                let tip_id = document.getElementById('tip_id').value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'GET',
                    url: '{{ route('get_tip_likes') }}',
                    data: {tip_id: tip_id},
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
                let tip_id = document.getElementById('tip_id').value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '{{ route('add_tip_Like') }}',
                    data: {is_like: is_like, tip_id:tip_id},
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
