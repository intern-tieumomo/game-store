<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('page-title', trans('text.app.title'))
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('images/favicon.ico') }}" type="img/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/qanto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bauhaus93.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    
<div id="main-wrapper">
    <header class="header header-transparent header-sticky">
        <div class="default-header menu-right mt-55 mt-lg-10 mt-md-10 mt-sm-10 mt-xs-10">
            <div class="container container-1520">
                <div class="row">
                    <div class="col-3 mt-20 mb-20">
                        <div class="logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="hero-section section position-relative">
        <div class="hero-item" style="background-image: url({{ asset('images/hero/hero-1.jpg') }})">
            <div class="container container-1520">
                <div class="row">
                    <div class="col-md-6">
                        <div class="hero-content-2">
                            <h1><i class="fa fa-download"></i> DOWNLOADING</h1>
                            <h3>OWN YOUR DREAM GAMES</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-front-image">
                            <img src="{{ asset('images/hero/hero-front.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="newslatter" class="newslatter-section section pt-100 pt-lg-80 pt-md-30 pt-sm-60 pt-xs-50">
        <div class="container">
            <div class="row">
               <div class="col-12">
                   <div class="news-latter-area">
                       <div class="news-latter-box">
                           <h3>SUBSCRIBE OUR <span class="color-blue">NEWSLETTER</span> <br> GET ALL <span class="color-red">LATEST</span> NEWS, UPDATE, <br> <span class="color-blue">VIDEOS</span> AND OFFERS </h3>
                           <form action="#">
                               <input type="text" placeholder="Enter your email here">
                           </form>
                       </div>
                       <div class="news-latter-banner-image">
                           <img src="assets/images/news-latter/news-banner.png" alt="">
                       </div>
                   </div>
               </div> 
            </div>           
        </div>
    </div>

    <div class="testimonial-section section pt-125 pt-lg-105 pt-md-70 pt-sm-85 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
        <div class="container">          
            <div class="row">
                <div class="col-lg-8 col-md-10 col-12 ml-auto mr-auto">                  
                    <div class="testimonial-slider-content section">
                        <div class="testimonial">
                            <div class="testimonial-inner">
                                <p>Some comments about page</p>
                                <h4>Some names</h4>
                                <span>Some jobs</span>
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="testimonial-inner">
                                <p>Some comments about page</p>
                                <h4>Some namse</h4>
                                <span>Some jobs</span>
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="testimonial-inner">
                                <p>Some comments about page</p>
                                <h4>WSome namse</h4>
                                <span>Some jobs</span>
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="testimonial-inner">
                                <p>Some comments about page</p>
                                <h4>Some names</h4>
                                <span>Some jobs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>