@extends('front.include.master')
@section('page-title')
    {{ $sample->title }}
@endsection
@section('content')
    <div class="row">

        <div class="col-md-3 right-category">
            @include('front.samples.sample_category')
        </div>

        <div class="col-md-9  one-sample">
            <div class="row d-flex flex-column justify-content-center">
                <div class="col-lg-9 mt-2">
                    <div class="card">
                        <input type="hidden" id="sample_id" value="{{ $sample->id }}">
                        <input type="hidden" id="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <img src="{{ asset('/template/samples/'.$sample->main_image) }}" class="card-img-top" alt="...">
                        <div class="card-header">
                            {{$sample->title}}
                        </div>
                        <div class="card-body">

                            <p class="card-text">{{ strip_tags($sample->description) }}</p>

                            <div class="container  sample-images">
                                    <div class="row d-flex justify-content-center">

                                        <div class="mt-2 d-flex justify-content-center col-sm col-sm">
                                            <a class="my_box" href="{{ asset('/template/samples/'.$sample->image1) }}">
                                                <img class="rounded-3" src="{{ asset('/template/samples/'.$sample->image1) }}" width="120"
                                                     alt="image">
                                            </a>
                                        </div>

                                        <div class="mt-2 d-flex justify-content-center col-sm col-sm">
                                            <a class="my_box" href="{{ asset('/template/samples/'.$sample->image2) }}">
                                                <img class="rounded-3" src="{{ asset('/template/samples/'.$sample->image2) }}" width="120"
                                                     alt="image">
                                            </a>
                                        </div>

                                        <div class="mt-2 d-flex justify-content-center col-sm col-sm">
                                            <a class="my_box" href="{{ asset('/template/samples/'.$sample->image3) }}">
                                                <img class="rounded-3" src="{{ asset('/template/samples/'.$sample->image3) }}" width="120"
                                                     alt="image">
                                            </a>
                                        </div>

                                        <div class="mt-2 d-flex justify-content-center col-sm col-sm">
                                            <a class="my_box" href="{{ asset('/template/samples/'.$sample->image4) }}">
                                                <img class="rounded-3" src="{{ asset('/template/samples/'.$sample->image4) }}" width="120"
                                                     alt="image">
                                            </a>
                                        </div>

                                    </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row d-flex flex-row justify-content-evenly">
                                <div class="col-6">
                                    <div class="created_date">
                                        {{ jdate($sample->created_at)->format('%d %B %Y') }}
                                    </div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">

                                    <div class="d-flex flex-row-reverse">

                                        <input type="hidden" id="auth_user" value="{{ \Illuminate\Support\Facades\Auth::user() }}">
                                        <div class="dislike_sec">
                                            @if(Auth::check())
                                                @if( Auth::user()->likes()->where('sample_id','=',$sample->id) &&
                                                     Auth::user()->likes()->where('sample_id','=',$sample->id)->where('like','=',0)->first())
                                                    <span id="dislike_count" class="dislike_count"></span>
                                                    <i class="far fa-thumbs-down like" style="color:tomato" id="dislike"></i>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex flex-column justify-content-center align-content-center comments-sec mt-5" style="border:1px solid tomato;height:auto">
        <div class="col-lg-7 mt-5 list-comments" style="border:1px solid orangered;height: 100px">

        </div>
        <div class="col-lg-7 mt-5 mb-5 add-comment" style="border:1px solid black;height: 100px">

        </div>
    </div>
@endsection
@section('my-scripts')
    <script type="text/javascript">


        $(document).ready(function () {
            function load_likes() {
                let sample_id = document.getElementById('sample_id').value;
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
                let sample_id = document.getElementById('sample_id').value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '{{ route('add_sample_Like') }}',
                    data: {is_like: is_like, sample_id: sample_id},
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

