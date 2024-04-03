<!DOCTYPE html>
<html lang="ru">

<head>

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Tech Blog - Stylish Magazine Blog Template</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('assets/front/images/apple-touch-icon.png') }}">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<div id="wrapper">
    <header class="tech-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/front/images/version/tech-logo.png') }}" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Главная11111</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">
                                Панель администратора
                            </a>
                        </li>
                        @auth()
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Выход</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

    @yield('top-insert')

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="widget">
                        <div class="footer-text text-left">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/front/images/version/tech-footer-logo.png') }}" alt="" class="img-fluid"></a>
                            <p>Tech Blog is a technology blog, we sharing marketing, news and gadget articles.</p>
                            <div class="social">
                                <a data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>

                            <hr class="invis">
                        </div><!-- end footer-text -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a>Marketing <span>(21)</span></a></li>
                                <li><a>SEO Service <span>(15)</span></a></li>
                                <li><a>Digital Agency <span>(31)</span></a></li>
                                <li><a>Make Money <span>(22)</span></a></li>
                                <li><a>Blogging <span>(66)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Copyrights</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a>About us</a></li>
                                <li><a>Advertising</a></li>
                                <li><a>Write for us</a></li>
                                <li><a>Trademark</a></li>
                                <li><a>License & Help</a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <div class="copyright">&copy; Tech Blog.</div>
                </div>
            </div>
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<script src="{{ asset('assets/front/js/front.js') }}"></script>

</body>
</html>
