<!DOCTYPE html>
<html lang="en">
<head>
	<title>
        @yield('page-title', trans('text.app.title'))
    </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="{{ asset('client/images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/fonts/themify/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/fonts/elegant-font/html-css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/vendor/lightbox2/css/lightbox.min.css') }}">
	@yield('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/client/css/main.css') }}">
</head>
<body class="animsition">
	<header class="header1">
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="{{ config('link.facebook') }}" class="topbar-social-item fa fa-facebook"></a>
					<a href="{{ config('link.instagram') }}" class="topbar-social-item fa fa-instagram"></a>
					<a href="{{ config('link.pinterest') }}" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="{{ config('link.youtube') }}" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					{{ trans('text.app.slogan') }} <i class="fa fa-gamepad"></i>
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						@if (Auth::check())
							<form action="{{ route('logout') }}" method="POST">
								@csrf
								<button type="submit" type="button" class="logout-btn">
									<i class="fa fa-sign-out" aria-hidden="true"></i> {{ trans('text.app.logout_from') }} {{ Auth::user()->email }}
								</button>
							</form>
						@endif
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option value="en" @if (config('app.locale') == config('string.en')) {{ 'selected' }} @endif>EN</option>
							<option value="vi" @if (config('app.locale') == config('string.vi')) {{ 'selected' }} @endif>VI</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<a href="{{ route('home') }}" class="logo">
					<img src="{{ asset('client/images/icons/logo2.png') }}">
				</a>

				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li class="sale-noti">
								<a href="{{ route('games.index') }}">{{ trans('text.app.games') }}</a>
							</li>

							<li>
								<a href="">{{ trans('text.app.videos') }}</a>
							</li>

							<li>
                                <a href="{{ route('blogs.index') }}">{{ trans('text.app.blogs') }}</a>
							</li>

							<li>
								<a href="{{ route('cart.index') }}">{{ trans('text.app.cart') }}</a>
							</li>
						</ul>
					</nav>
				</div>

				<div class="header-icons">
					@if (Auth::check())
						<a href="{{ route('profile.index') }}" class="header-wrapicon1 dis-block">
							<img src="{{ asset(config('link.user-icon')) }}" class="header-icon1">
						</a>

						@if (Auth::user()->role == config('role.user'))
							<span class="linedivide1"></span>
							
							<div class="header-wrapicon2" id="header-wrapicon2">
								<img src="{{ asset(config('link.cart-icon')) }}" class="header-icon1 js-show-header-dropdown">

								<span class="header-icons-noti" id="header-icons-noti">
									@if (session()->get('cart'))
										<span id="header-icons-noti-item">{{ count(session()->get('cart')) }}</span>
									@else
										<span id="header-icons-noti-item">0</span>
									@endif
								</span>

								<div class="header-cart header-dropdown" id="header-cart">
									<div id="header-cart-detail"> 
										@if (!session()->get('cart') || count(session()->get('cart')) < 1)
											<ul class="header-cart-wrapitem" id="header-cart-wrapitem">
												<li class="header-cart-item">
													{{ trans('text.app.cart_empty') }} &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</li>
											</ul>

											<div class="header-cart-total"></div>

											<div class="header-cart-buttons">
												<div class="header-cart-wrapbtn">
													<a href="{{ route('games.index') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
														{{ trans('text.app.buy_more') }}
													</a>
												</div>
											</div>
										@else
											<ul class="header-cart-wrapitem" id="header-cart-wrapitem">
												@foreach(session()->get('cart') as $item)
													<li class="header-cart-item">
														<div class="header-cart-item-img">
															<img src="{{ asset(config('link.game-detail-link') . $item['game']->id . '/preview.jpg') }}">
														</div>

														<div class="header-cart-item-txt">
															<a href="{{ route('games.detail', ['id' => $item['game']->id]) }}" class="header-cart-item-name">
																{{ $item['game']->title }}
															</a>

															<span class="header-cart-item-info">
																{{ $item['game']->price . config('string.vnd') }}
															</span>
														</div>
													</li>
												@endforeach
											</ul>

											<div class="header-cart-total" id="header-cart-total">
												{{ trans('text.app.total') }}: {{ session()->get('cart-total') . config('string.vnd') }}
											</div>

											<div class="header-cart-buttons">
												<div class="header-cart-wrapbtn">
													<a href="{{ route('cart.index') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
														{{ trans('text.app.view_cart') }}
													</a>
												</div>

												<div class="header-cart-wrapbtn">
													<a href="{{ route('cart.index') . '#checkout' }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
														{{ trans('text.app.checkout') }}
													</a>
												</div>
											</div>
										@endif
									</div>
								</div>
							</div>
						@endif
					@else
						<a href="{{ route('login') }}" class="header-wrapicon1 dis-block">
							{{ trans('text.app.login') }}
						</a>

						<span class="linedivide1"></span>

						<a href="{{ route('register') }}" class="header-wrapicon2">
							{{ trans('text.app.register') }}
						</a>
					@endif
				</div>
			</div>
		</div>

		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							{{ trans('text.app.slogan') }} <i class="fa fa-gamepad"></i>
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							@if (Auth::check())
								<form action="{{ route('logout') }}" method="POST">
									@csrf
									<button type="submit" type="button" class="logout-btn">
										<i class="fa fa-sign-out" aria-hidden="true"></i> {{ trans('text.app.logout_from') }} {{ Auth::user()->email }}
									</button>
								</form>
							@endif

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option value="en" @if (config('app.locale') == config('string.en')) {{ 'selected' }} @endif>EN</option>
									<option value="vi" @if (config('app.locale') == config('string.vi')) {{ 'selected' }} @endif>VI</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="{{ config('link.facebook') }}" class="topbar-social-item fa fa-facebook"></a>
							<a href="{{ config('link.instagram') }}" class="topbar-social-item fa fa-instagram"></a>
							<a href="{{ config('link.pinterest') }}" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="{{ config('link.youtube') }}" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('games.index') }}">{{ trans('text.app.games') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a>{{ trans('text.app.videos') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a>{{ trans('text.app.blogs') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('cart.index') }}">{{ trans('text.app.cart') }}</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	@yield('content')

	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<img src="{{ asset(config('link.logo')) }}">
				<div>
					&nbsp;
				</div>

				<div>
					<p class="s-text7 w-size27">
						{{ trans('text.app.question') }}
					</p>

					<div class="flex-m p-t-30">
						<a href="{{ config('link.facebook') }}" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="{{ config('link.instagram') }}" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="{{ config('link.pinterest') }}" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="{{ config('link.youtube') }}" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4"></div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					{{ trans('text.app.links') }}
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="{{ route('games.index') }}" class="s-text7">
							{{ trans('text.app.games') }}
						</a>
					</li>

					<li class="p-b-9">
						<a class="s-text7">
							{{ trans('text.app.videos') }}
						</a>
					</li>

					<li class="p-b-9">
						<a class="s-text7">
							{{ trans('text.app.blogs') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{ route('cart.index') }}" class="s-text7">
							{{ trans('text.app.cart') }}
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					{{ trans('text.app.help') }}
				</h4>

				<ul>
					<li class="p-b-9">
						<a class="s-text7">
							{{ trans('text.app.history') }}
						</a>
					</li>

					<li class="p-b-9">
						<a class="s-text7">
							{{ trans('text.app.refund') }}
						</a>
					</li>

					<li class="p-b-9">
						<a class="s-text7">
							{{ trans('text.app.faqs') }}
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					{{ trans('text.app.newsletter') }}
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							{{ trans('text.app.subcribe') }}
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a>
				<img class="h-size2" src="{{ asset('client/images/icons/paypal.png') }}">
			</a>

			<a>
				<img class="h-size2" src="{{ asset('client/images/icons/visa.png') }}">
			</a>

			<a>
				<img class="h-size2" src="{{ asset('client/images/icons/mastercard.png') }}">
			</a>

			<a>
				<img class="h-size2" src="{{ asset('client/images/icons/express.png') }}">
			</a>

			<a>
				<img class="h-size2" src="{{ asset('client/images/icons/discover.png') }}">
			</a>

			@include('layouts.copyright')
		</div>
	</footer>

	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/animsition/js/animsition.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/bootstrap/js/popper.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/select2/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/js/localization.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/js/slick-custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/countdowntime/countdowntime.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/lightbox2/js/lightbox.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/bower_components/client/js/cart.js') }}"></script>
	@yield('js')
	<script src="{{ asset('/bower_components/client/js/main.js') }}"></script>
</body>
</html>
