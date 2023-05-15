<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- color of address bar in mobile browser -->
    <meta name="theme-color" content=" #00bdff">
    <!-- favicon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav-logo.png') }}" type="image/x-icon">
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{ asset('frontend_styles/css/plugins/font-awesome.min.css') }}">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('frontend_styles/css/plugins/bootstrap.min.css') }}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('frontend_styles/css/plugins/swiper.min.css') }}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('frontend_styles/css/plugins/datepicker.css') }}">
    <!-- mapbox css -->
    <link href="{{ asset('frontend_styles/css/plugins/mapbox-style.css') }}" rel='stylesheet'>
    <!-- fancybox css -->
    <link rel="stylesheet" href="{{ asset('frontend_styles/css/plugins/fancybox.min.css') }}">
    <!-- starbelly css -->
    <link rel="stylesheet" href="{{ asset('frontend_styles/css/style.css') }}">
    <!-- page title -->
    <title>Sree Madapalli | Divine Taste | Hotel | Outdoor Caterers | Services Apartments</title>
</head>

<body>
    <!-- app wrapper -->
    <div class="sb-app">
        <!-- preloader -->
        <div class="sb-preloader">
            <div class="sb-preloader-bg"></div>
            <div class="sb-preloader-body">
                <div class="sb-loading">
                    <div class="sb-percent" style="color: white;"><span class="sb-preloader-number"
                            data-count="101">00</span><span>%</span>
                    </div>
                </div>
                <div class="sb-loading-bar">
                    <div class="sb-bar"></div>
                </div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- click effect -->
        <div class="sb-click-effect"></div>

        <!-- loader -->
        <div class="sb-load"></div>

        <!-- top bar -->
        <div class="sb-top-bar-frame">
            <div class="sb-top-bar-bg"></div>
            <div class="container">
                <div class="sb-top-bar">
                    <a href="{{ route('index') }}" class="sb-logo-frame">
                        <!-- logo img -->
                        <img src="{{ asset('assets/images/logo2.png') }}" alt="Stree Madapalli" style="height: 30px;">
                    </a>
                    <!-- menu -->
                    <div class="sb-right-side">
                        <nav id="sb-dynamic-menu" class="sb-menu-transition">
                            <ul class="sb-navigation">
                                <li class="sb-has-children {{ Route::is('index') ? 'sb-active' : '' }}">
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="sb-has-children {{ Route::is('about') ? 'sb-active' : '' }}">
                                    <a href="{{ route('about') }}">About</a>
                                </li>
                                <li class="sb-has-children {{ Route::is('outdoorcaterers') ? 'sb-active' : '' }}">
                                    <a href="{{ route('outdoorcaterers') }}">Outdoor Caterers</a>
                                </li>
                                <li class="sb-has-children {{ Route::is('menu') ? 'sb-active' : '' }}">
                                    <a href="{{ route('menu') }}">Menu</a>
                                </li>
                                <li class="{{ Route::is('contact') ? 'sb-active' : '' }}">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="sb-buttons-frame">
                            <!-- menu btn -->
                            <div class="sb-menu-btn"><span></span></div>
                            <!-- info btn -->
                            <div class="sb-info-btn"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- info bar -->
            <div class="sb-info-bar">
                <div class="sb-infobar-content">
                    <div class="sb-ib-title-frame sb-mb-30">
                        <h4>Contact</h4><i class="fas fa-arrow-down"></i>
                    </div>
                    <ul class="sb-list sb-mb-30">
                        <li><b>Address:</b><span>Srirangam, Tiruchirappalli</span></li>
                        <li><b>Working hours:</b><span>07:00 AM - 09:30 PM</span></li>
                        <li><b>Phone:</b><span>+91 90251 66000</span></li>
                        <li><b>Email:</b><span>info@sreemadapalli.in</span></li>
                    </ul>
                </div>
                <div class="sb-info-bar-footer">
                    <ul class="sb-social">
                        <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#."><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- info bar end -->
        </div>
        <!-- top bar end -->
