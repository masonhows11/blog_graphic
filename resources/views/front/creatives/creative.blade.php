@extends('front.include.master')
@section('page-title')
    {{ $creative->title }}
@endsection
@section('content')
    <div class="row">

        <div class="col-md-9 one-sample">

            <div class="row d-flex flex-column justify-content-center">
                <div class="col-lg-9 mt-2">
                    <div class="card">
                        <input type="hidden" id="sample_id" value="{{ $creative->id }}">
                        <input type="hidden" id="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <img src="{{ asset('/template/creativity/'.$creative->image) }}" class="card-img-top" alt="">
                        <div class="card-header">
                            {{ $creative->title }}
                        </div>
                        {{-- body--}}
                        <div class="card-body">
                            <p class="card-text">{{ strip_tags($creative->description) }}</p>
                        </div>
                        {{--end body--}}

                        {{-- footer  --}}
                        <div class="card-footer">
                            <div class="row d-flex flex-row justify-content-evenly">
                                <div class="col-6">
                                    <div class="created_date">
                                        {{ jdate($creative->created_at)->format('%d %B %Y') }}
                                    </div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">

                                    <div class="d-flex flex-row-reverse">

                                        <input type="hidden" id="auth_user"
                                               value="{{ \Illuminate\Support\Facades\Auth::user() }}">
                                        <div class="dislike_sec">
                                            @if(Auth::check())
                                                @if( Auth::user()->likes()->where('sample_id','=',$sample->id) &&
                                                     Auth::user()->likes()->where('sample_id','=',$sample->id)->where('like','=',0)->first())
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
                                                @if( Auth::user()->likes()->where('sample_id','=',$sample->id) &&
                                                     Auth::user()->likes()->where('sample_id','=',$sample->id)->where('like','=',1)->first())
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

        </div>

        {{-- comments--}}
        <div class="row mt-5">
            <div class="col-md-9">
                <div class="row d-flex flex-column justify-content-center comments-sec">
                    <div class="col-lg-9 mt-5 list-comments">
                        @foreach($sample->comments as $comment)
                            <div class="card mt-5">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $comment->description }}
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <div><span class="users_comment">{{ $comment->user_name }}</span></div>
                                    <div><span class="date_comment">{{ jdate($comment->created_at)->format('%d %B %Y') }}</span></div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if(Auth::check())
                        <div class="col-lg-9 mt-5 mb-5 rounded-3 add-comment">

                            <form action="/comment/store" method="post">
                                @csrf
                                <input type="hidden" name="sample_id" value="{{ $sample->id }}">
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
                            <p class="text-center">کاربر گرامی برای ثبت دیدگاه خود ابتدا <a href="/loginForm" class="text-center">وارد</a>
                                سایت شوید با تشکر.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- end comments--}}

    </div>
@endsection
@section('my-scripts')
    @if(session('message'))
        <script>
            Swal.fire({
                icon:'success',
                text: '{{ session('message') }}',
            })
        </script>
    @endif
@endsection
