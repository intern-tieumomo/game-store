@extends('layouts.app2')

@section('page-title')
    {{ trans('text.games.title') }}
@endsection

@section('content')
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m">
		<h2 class="l-text2 t-center">
			Games
		</h2>
		<p class="m-text13 t-center">
			{{ trans('text.app.slogan') }}
		</p>
	</section>

	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<h4 class="m-text14 p-b-7">
							Search
						</h4>

						<div class="search-product pos-relative bo4 of-hidden">
							<form id="search-form">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="name" placeholder="Search Games..." value="{{ $data['name'] ?? "" }}">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<div>&nbsp;</div>

						<h4 class="m-text14 p-b-7">
							Popular Genres
						</h4></a>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="{{ route('genres.index', ['id' => 3]) }}" class="s-text13 active1">
									Shooter
								</a>
							</li>
							<li class="p-t-4">
								<a href="{{ route('genres.index', ['id' => 9]) }}" class="s-text13 active1">
									Role-playing (RPG)
								</a>
							</li>
							<li class="p-t-4">
								<a href="{{ route('genres.index', ['id' => 18]) }}" class="s-text13 active1">
									Adventure
								</a>
							</li>
							<li class="p-t-4">
								<a href="{{ route('genres.index') }}" class="s-text13 active1">
									All Genres ....
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting" id="sorting">
									<option value="{{ config('sort.newest') }}" @if ( ($data['sorting'] ?? '') == config('sort.newest')) {{ 'selected' }} @endif>Default Sorting</option>
									<option value="{{ config('sort.atoz') }}" @if ( ($data['sorting'] ?? '') == config('sort.atoz')) {{ 'selected' }} @endif>Name: A to Z</option>
									<option value="{{ config('sort.ztoa') }}" @if ( ($data['sorting'] ?? '') == config('sort.ztoa')) {{ 'selected' }} @endif>Name: Z to A</option>
									<option value="{{ config('sort.ltoh') }}" @if ( ($data['sorting'] ?? '') == config('sort.ltoh')) {{ 'selected' }} @endif>Price: low to high</option>
									<option value="{{ config('sort.htol') }}" @if ( ($data['sorting'] ?? '') == config('sort.htol')) {{ 'selected' }} @endif>Price: high to low</option>
								</select>
								</form>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing {{ $games->count() }} of {{ $games->total() }} results
						</span>
					</div>

					<div class="row">
						@foreach($games as $game)
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="{{ asset('client/images/games/' . $game->id . '/preview.jpg') }}" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											@if (canAdd($game->id) == "canAdd")
												<div class="block2-btn-addcart w-size1 trans-0-4" data-role="user">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
														Add to Cart
													</button>
												</div>
											@elseif (canAdd($game->id) == "isOwned")
												<div class="block2-btn-addcart w-size1 trans-0-4" data-role="download">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" disabled>
														Download
													</button>
												</div>
											@elseif (canAdd($game->id) == "isPublisher")
												<div class="block2-btn-addcart w-size1 trans-0-4" data-role="publisher">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
														View
													</button>
												</div>
											@endif
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="{{ route('games.detail', ['id' => $game->id]) }}" class="block2-name dis-block s-text3 p-b-5">
											{{ $game->title }}
										</a>
										<input type="hidden" class="block2-id" value="{{ $game->id }}">
										<input type="hidden" class="block2-token" value="{{ csrf_token() }}">

										<span class="block2-price m-text6 p-r-5">
											{{ moneyFormat($game->price) . config('string.vnd') }}
										</span>
									</div>
								</div>
							</div>
						@endforeach
					</div>

					{{ $games->appends($data)->render('layouts.pagination2') }}

				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="bower_components/client/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="bower_components/client/vendor/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="{{ mix('/client/scripts/game.js') }}"></script>
@endsection
