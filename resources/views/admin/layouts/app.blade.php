<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('client/images/icons/favicon.ico') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/extensions/shepherd-theme-default.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/components.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    @yield('css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> --}}
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item">
                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us"></i><span class="selected-language">EN</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <a class="dropdown-item" href="#" data-language="en">
                                    <i class="flag-icon flag-icon-us"></i> EN
                                </a>
                                <a class="dropdown-item" href="#" data-language="fr">
                                    <i class="flag-icon flag-icon-vn"></i> VI
                                </a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-link-expand">
                                <i class="ficon feather icon-maximize"></i>
                            </a>
                        </li>
                        <li class="nav-item nav-search">
                            <a class="nav-link nav-link-search">
                                <i class="ficon feather icon-search"></i>
                            </a>
                            <div class="search-input">
                                <div class="search-input-icon">
                                    <i class="feather icon-search primary"></i>
                                </div>
                                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close">
                                    <i class="feather icon-x"></i>
                                </div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600">
                                        {{ Auth::user()->email }}
                                    </span>
                                    <span class="user-status text-success">
                                        Online
                                    </span>
                                </div>
                                <span>
                                    <img class="round" src="bower_components/admin/images/portrait/small/avatar-s-27.jpg" alt="avatar" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item w-100" type=submit>
                                        <i class="feather icon-power text-danger"></i> Logout
                                    </button>
                                </form>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="feather icon-chevrons-left text-warning"></i> Back to Game Store
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.index') }}">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Game Store</h2>
                    </a></li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dashboard nav-item">
                    <a href="{{ route('admin.index') }}">
                        <i class="feather icon-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>

                <li class=" navigation-header">
                    <span>Models</span>
                </li>
                <li class="account nav-item">
                    <a href="{{ route('manage-accounts.index') }}">
                        <i class="feather icon-unlock"></i>
                        <span class="menu-title" data-i18n="Account">Account</span>
                    </a>
                </li>
                <li class="comment nav-item">
                    <a href="{{ route('manage-comments.index') }}">
                        <i class="feather icon-message-circle"></i>
                        <span class="menu-title" data-i18n="Comment">Comment</span>
                    </a>
                </li>

                <li class="game nav-item">
                    <a href="{{ route('manage-games.index') }}">
                        <i class="feather icon-gitlab"></i>
                        <span class="menu-title" data-i18n="Game">Game</span>
                    </a>
                </li>
                <li class="genre nav-item">
                    <a href="{{ route('manage-genres.index') }}">
                        <i class="feather icon-filter"></i>
                        <span class="menu-title" data-i18n="Genres">Genres</span>
                    </a>
                </li>
                <li class="payment nav-item">
                    <a href="{{ route('manage-payments.index') }}">
                        <i class="feather icon-shopping-cart"></i>
                        <span class="menu-title" data-i18n="Payment">Payment</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="feather icon-file-text"></i>
                        <span class="menu-title" data-i18n="Payment Detail">Payment Detail</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="feather icon-file"></i>
                        <span class="menu-title" data-i18n="Post">Post</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="feather icon-user"></i>
                        <span class="menu-title" data-i18n="Publisher">Publisher</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="feather icon-message-square"></i>
                        <span class="menu-title" data-i18n="Review">Review</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="feather icon-users"></i>
                        <span class="menu-title" data-i18n="User">User</span>
                    </a>
                </li>

                <li class=" navigation-header">
                    <span>Requests</span>
                </li>
                <li class="pending-games nav-item">
                    <a href="{{ route('pending-games.index') }}">
                        <i class="feather icon-activity"></i>
                        <span class="menu-title" data-i18n="Publish Game">Publish Game</span>
                    </a>
                </li>
                <li class="publisher-requests nav-item">
                    <a href="{{ route('publisher-requests.index') }}">
                        <i class="feather icon-activity"></i>
                        <span class="menu-title" data-i18n="Become Publisher">Become Publisher</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="bower_components/admin/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="bower_components/admin/vendors/js/charts/apexcharts.min.js"></script>
    <script src="bower_components/admin/vendors/js/extensions/tether.min.js"></script>
    <script src="bower_components/admin/vendors/js/extensions/shepherd.min.js"></script>
    <script src="bower_components/admin/vendors/js/extensions/dropzone.min.js"></script>
    <script src="bower_components/admin/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="bower_components/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="bower_components/admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="bower_components/admin/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="bower_components/admin/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="bower_components/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="bower_components/admin/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="bower_components/admin/js/core/app-menu.js"></script>
    <script src="bower_components/admin/js/core/app.js"></script>
    <script src="bower_components/admin/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="bower_components/admin/js/scripts/extensions/sweet-alerts.js"></script>
    @yield('js')
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
