<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('page-title', 'Forbiden || 403 Error')
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
                            <a href="{{ url()->previous() }}"><h4 style="color: white;"><i class="fa fa-arrow-left"></i> Back to previous page</h4>></a>
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
                            <h1><i class="fa fa-exclamation-circle"></i> 403</h1>
                            <h3>This action is unauthorized.</h3>
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
</div>

<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>