<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="{{ asset('/frontend') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/frontend') }}/css/animate.css">
    <link href="{{ asset('/frontend') }}/css/style.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/frontend') }}/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/frontend') }}/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/frontend') }}/img/favicon.ico" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css?family=Lato:700,900%7CDidact+Gothic" rel="stylesheet">
    <title>Hologram {{ $title ?? '' }}</title>
</head>

<body>
    <!-- LOADER -->
    <div id="loader-wrapper">
        <div class="cssload-container">
            <div class="cssload-whirlpool"></div>
        </div>
    </div>
    <!-- LOADER -->

    <!-- HEADER -->
    @include('frontend.sidebar')
    <!-- HEADER -->

    <!-- OVERLAY-MENU -->
    {{-- <div class="overlay-wrapper height-min">
        <div class="overlay-animation"></div>
        <div class="flex">
            <div class="flex-in">
                <div class="overlay-menu">
                    <div class="container">
                        <div class="row">
                            <div class="btn-close"><span></span><span></span></div>
                            <div class="col-lg-2 col-lg-offset-5">
                                <ul>
                                    <li class="dropdown-plus">
                                        <a href="index.html">HOME</a>
                                        <span></span>
                                        <ul>
                                            <li><a href="index.html">Home #1</a></li>
                                            <li><a href="index2.html">Home #2</a></li>
                                            <li><a href="index3.html">Home #3</a></li>
                                            <li><a href="index4.html">Home #4</a></li>
                                            <li><a href="index5.html">Home #5</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about.html">ABOUT</a>
                                    </li>
                                    <li>
                                        <a href="detail.html">PORTFOLIO</a>
                                    </li>
                                    <li class="dropdown-plus">
                                        <a href="blog.html">BLOG</a>
                                        <span></span>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blogdetail.html">Blog detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">CONTACT</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- end OVERLAY-MENU -->

    <!-- content -->
    <div id="content-wrapper">
        @yield('content')
        <div class="empty-space h55-xs h95-sm">
        </div>

        <!-- footer -->

        <footer class="footer-style">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="copyright normal-s">
                            &copy; 2024 All rights reserved. Development with <i class="fa fa-heart"></i> by <a
                                href="https://igedemiarta.github.io/" target="blank">Miartayasa.</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer -->
    </div>
    <!-- content -->

    <script src="{{ asset('/frontend') }}/js/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/wow.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/global.js"></script>

</body>

</html>
