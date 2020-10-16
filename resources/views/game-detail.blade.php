@extends('layouts.app2')

@section('page-title')
	{{ $game->title . "|| Game Store" }}
@endsection

@section('content')
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="{{ route('home') }}" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="{{ route('games.index') }}" class="s-text16">
			Games
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			{{ $game->title }}
		</span>
	</div>

	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<div class="slick3">
						<div class="item-slick3" data-thumb="{{ asset('client/images/games/' . $game->id . '/detail-1.jpg') }}">
							<div class="wrap-pic-w">
								<img src="{{ asset('client/images/games/' . $game->id . '/detail-1.jpg') }}" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="{{ asset('client/images/games/' . $game->id . '/detail-2.jpg') }}">
							<div class="wrap-pic-w">
								<img src="{{ asset('client/images/games/' . $game->id . '/detail-2.jpg') }}" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="{{ asset('client/images/games/' . $game->id . '/detail-3.jpg') }}">
							<div class="wrap-pic-w">
								<img src="{{ asset('client/images/games/' . $game->id . '/detail-3.jpg') }}" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{{ $game->title }}
				</h4>
				<input type="hidden" class="block2-id" value="{{ $game->id }}">
				<input type="hidden" class="block2-token" value="{{ csrf_token() }}">

				<span class="m-text17">
					{{ $game->price . config('string.vnd') }}
				</span>

				@if (!Auth::check() || Auth::user()->role != config('role.user'))
					<div class="p-t-33 p-b-60">
						<div class="size15 trans-0-4 m-t-10 m-b-10">
							<i>Login to an user account to buy this game</i> 
							<i class="fa fa-gamepad" aria-hidden="true"></i>
						</div>
					</div>
				@elseif (Auth::user()->role == config('role.user'))
					<div class="p-t-33 p-b-60">
						<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Add to Cart
							</button>
						</div>
					</div>
				@endif

				<div class="p-b-45">
					<span class="s-text8 m-r-35">{{ "Release Date: " . $game->release_date }}</span>
					<br>
					<span class="s-text8">Genres: 
						@foreach($game->genres as $genre)
							<a href="{{ route('genres.index', ['id' => $genre->id]) }}">{{ $genre->name }} |</a>
						@endforeach
					</span>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Summary
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{{ $game->summary }}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Features
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{{ $game->features }}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						System Requirement
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{!! $game->requirement !!}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Rating ({{ $game->rating }}/10)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div id="review" class="dropdown-content dis-none p-t-15 p-b-23">
						<p id="review-content" class="s-text8">
							@if (count($listReview) == 0)
								<i><b><i class="fa fa-comments-o" aria-hidden="true"></i> No review yet!</b></i>
							@else
								@foreach($listReview as $item)
									<b><i class="fa fa-user-circle" aria-hidden="true"></i> {{ $item->account->email }}</b> - {{ $item->updated_at }}<br>
									<b><i class="fa fa-bolt" aria-hidden="true"></i> {{ $item->rating }}</b><br>
									{{ $item->review }}<br><br>
								@endforeach
							@endif
						</p>
					</div>
				</div>

				<div>&nbsp;</div>

				@if (canAdd($game->id) == "isOwned")
					<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
						<div class="leave-comment">
							<h4 class="m-text25 p-b-14">
								Add a Review
							</h4>

							<span class="s-text8 p-b-40">
								Your email address will be published.
							</span>

							<input type="hidden" name="game_id" value="{{ $game->id }}"><br>
							<label class="m-text19" for="points">Points (between 1 and 10):</label><br>
							<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
							<input type="range" id="rating" name="rating" min="1" max="10" style="width: 210px; margin-bottom: 20px;" value="{{ $review->rating ?? ""}}">	
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i><br>

							<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="review" placeholder="Comment...">{{ $review->review ?? ""}}</textarea>

							<div class="w-size24">
								<button class="btn-review flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" data-game="{{ $game->id }}">
									Post Review
								</button>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Games
				</h3>
			</div>

			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($relatedGames as $game)
						<div class="item-slick2 p-l-15 p-r-15">
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative @if (config('app.locale') == config('string.vi')) {{ 'block2-labelrelated-vi' }} @else {{ 'block2-labelrelated' }} @endif">
									<img src="{{ asset('client/images/games/' . $game->id . '/preview.jpg') }}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="{{ route('games.detail', ['id' => $game->id]) }}" class="block2-name dis-block s-text3 p-b-5">
										{{ $game->title }}
									</a>
									<input type="hidden" class="block2-id" name="game_id" value="{{ $game->id }}">
									<input type="hidden" class="block2-id" name="account_id" value="{{ Auth::id() }}">
									<input type="hidden" class="block2-token" value="{{ csrf_token() }}">

									<span class="block2-price m-text6 p-r-5">
										{{ $game->price . config('string.vnd') }}
									</span>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="{{ mix('/client/scripts/game-detail.js') }}"></script>
@endsection
