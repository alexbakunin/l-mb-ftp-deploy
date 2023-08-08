@extends('layouts/layout')

@section('content')

    <section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Flash --}}
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h3>{{ $post->title }}</h3>

                            <div class="blog-meta big-meta">
                                <small><a>{{ \Carbon\Carbon::make($post->updated_at)->translatedFormat('d F Y') }}</a></small>
                                <small><a><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="post-media single-post-media d-flex justify-content-center">
                            <img src="{{ $post->getImage() }}" alt="" class="img-fluid" style="object-fit:contain;">
                            <div class="hovereffect">
                            </div>
                        </div><!-- end media -->

                        <div class="blog-content">
                            <div class="pp">
                                {!! $post->content !!}
                            </div><!-- end pp -->
                        </div><!-- end content -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        {{--<img src="{{ asset('assets/front/upload/banner_01.jpg') }}" alt="" class="img-fluid">--}}
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">{{ count($post->comments) }} Comments</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">

                                    @foreach($post->comments as $comment)
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading user_name">{{ $comment['user_name'] }} <small>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small></h4>
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custombox -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">Оставить комментарий</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    {{-- Flash --}}
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form id="comment_form" class="form-wrapper" method="post" action="{{ route('comment') }}">
                                        @csrf
                                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Имя" value="{{ old('user_name') }}">
                                        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                        <textarea name="content" id="content" class="form-control" placeholder="Комментарий">{{ old('content') }}</textarea>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    @include('layouts.sidebar')
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
