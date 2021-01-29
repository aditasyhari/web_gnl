<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>GNL - Glenmore Natural Life</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets/user/img/core-img/gnl.jpeg') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css')}}">

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/user/css/responsive.css') }}" rel="stylesheet">

    <style>
        ul li.nav-item .nav-link.active {
            color: darkorange !important;
        }
    </style>

</head>

<body>
    

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        <header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#"><img src="{{ asset('assets/user/img/core-img/gnl.jpeg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="{{ $fb->name }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com/{{ $ig->name }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://api.whatsapp.com/send?phone={{ substr($wa->name, 1) }}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item"><a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                                            <li class="nav-item"><a class="nav-link {{ (request()->is('product*')) ? 'active' : '' }}" href="{{ url('product') }}">Product</a></li>
                                            <li class="nav-item"><a class="nav-link {{ (request()->is('faq*')) ? 'active' : '' }}" href="{{ url('faq') }}">Faq</a></li>
                                            <li class="nav-item"><a class="nav-link {{ (request()->is('about*')) ? 'active' : '' }}" href="{{ url('about') }}">About</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:{{ $wa->name }}"><i class="ti-headphone-alt"></i> Phone</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->

        @yield('content')

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single_footer_area">
                            <div class="footer-logo">
                                <img src="{{ asset('assets/user/img/core-img/gnl.jpeg') }}" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-9">
                        <div class="single_footer_area">
                            <div class="footer_social_area text-center">
                                <a href="{{ $fb->name }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com/{{ $ig->name }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://api.whatsapp.com/send?phone={{ substr($wa->name, 1) }}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="line"></div>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <p>
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="/" target="_blank">Glenmore Natural Life</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('assets/user/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/user/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/user/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/user/js/active.js') }}"></script>

</body>

</html>