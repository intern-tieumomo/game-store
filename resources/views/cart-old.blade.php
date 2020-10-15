@extends('layouts.app')

@section('page-title')
{{ 'Cart || Game Store' }}
@endsection

@section('content')
<div class="page-banner-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="page-content text-center">
					<h1>CART</h1>
					<a class="df-btn" href="#"></a>
					<ul class="page-breadcrumb">
						<li><a href="{{ route('home') }}">HOME</a></li>
						<li>CART</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="forum-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
	<div class="container" id="cart-content">
		<div class="row" id="cart-list">
			@if (Auth::user()->role == config('role.publisher'))
			<div class="col-12">
				<div class="single-forum mb-30">
					<h3><a><i class="fa fa-exclamation-triangle"></i> Publisher can not use cart</a></h3>
					<div class="forum-meta">
						<ul>
							<li><a>Loggin a user account to buy games</a> <i class="fa fa-arrow-right"></i></li>
							<form action="{{ route('logout') }}" method="POST">
								@csrf<button type="submit" class="dropdown-item" type="button">
								{{ trans('text.app.logout') }}
								</button>
							</form>
						</ul>
					</div>
				</div>
			</div>
			@elseif (count(session()->get('cart')))
			@foreach(session()->get('cart') as $id => $item)
				<div class="col-12" id="{{ $id }}">
					<div class="single-forum mb-30">
						<h3><a href="{{ route('games.detail', ['id' => $id]) }}">{{ $item['name'] }}</a></h3>
						<div class="forum-meta">
							<ul>
								<li><a href="#"><i class="fa fa-gamepad"></i> {{ $item['price']." VND" }}</a></li>
								<li>X <span>{{ $item['quantity'] }}</span></li>
							</ul>
							<span class="view">Subtotal: {{ $item['price']." VND" }}</span>
						</div>
						<span class="sticker" data-id="{{ $id }}"><a>Delete</a></span>
					</div>
				</div>
				@endforeach

				<div class="col-12">
					<div class="single-forum mb-30">
						<h3><a>Total</a></h3>
						<div class="forum-meta">
							<ul>
								<li><a>Count: </a></li>
								<li><span>{{ count(session()->get('cart')) }}</span></li>
							</ul>
							<span class="view">Cost: {{ $total." VND" }}</span>
						</div>
					</div>
				</div>

				<div class="col-12">
					<div class="single-forum mb-30">
						<h3><a href="{{ route('checkout.index') }}">Go to check out <i class="fa fa-arrow-right"></i></a></h3>
						<div class="forum-meta">
							<ul>
								<li><a href="{{ route('games.index') }}"><i class="fa fa-arrow-left"></i> Back to games</a></li>
							</ul>
						</div>
					</div>
				</div>
				@else
				<div class="col-12">
					<div class="single-forum mb-30">
						<h3><a><i class="fa fa-shopping-cart"></i> Cart is Empty</a></h3>
						<div class="forum-meta">
							<ul>
								<li><a href="{{ route('games.index') }}"><i class="fa fa-arrow-left"></i> Go to Games page and get some</a></li>
							</ul>
						</div>
					</div>
				</div>
				@endif
		</div>
	</div>
</div>

<div>
	&nbsp;
</div>
@endsection

@section('extendsion')
<script type="text/javascript" src="{{ asset('js/extendsion.js') }}"></script>
@endsection

@section('notification')
@if (session('error'))
<input type="hidden" name="error" id="error-message" value="{{ session('error') }}">
@elseif (session('success'))
<input type="hidden" name="success" id="success-message" value="{{ session('success') }}">
@endif
<script type="text/javascript" src="{{ asset('js/notification.js') }}"></script>
@endsection
