@extends('layouts.layout')

@section('top-insert')
    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">

                        @foreach($posts as $post)
                            <div class="blog-box">
                                <div class="post-media d-flex justify-content-center">  {{--align-items-stretch--}}
                                    <a href="{{ route('post', ['slug' => $post->slug]) }}" title="" class="d-flex">
                                        <img src="{{ $post->getImage() }}" alt="" class="img-fluid" style="object-fit:contain;">
                                        <div class="hovereffect">
                                        </div>
                                        <!-- end hover -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="blog-meta big-meta text-center">
                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div><!-- end post-sharing -->
                                    <h4><a href="{{ route('post', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                                    <div>{!! $post->description !!}</div>
                                    <small><a>{{ \Carbon\Carbon::make($post->updated_at)->translatedFormat('d F Y') }}</a></small>
                                    <small><a><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                        @endforeach

                            <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                {{ $posts->links('vendor.pagination.bootstrap-4') }}
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    @include('layouts.sidebar')
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection


