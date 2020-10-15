@extends('layouts.app2')

@section('page-title', trans('text.home.title'))

@section('content')
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" id="slide1">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							{{ trans('text.home.late_2020') }}
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							{{ $newGames[0]->title }}
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<a href="{{ route('games.detail', ['id' => $newGames[0]->id]) }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								{{ trans('text.home.buy_now') }}
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" id="slide2">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							{{ trans('text.home.late_2020') }}
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							{{ $newGames[1]->title }}
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<a href="{{ route('games.detail', ['id' => $newGames[1]->id]) }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								{{ trans('text.home.buy_now') }}
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" id="slide3">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							{{ trans('text.home.late_2020') }}
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							{{ $newGames[2]->title }}
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<a href="{{ route('games.detail', ['id' => $newGames[2]->id]) }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								{{ trans('text.home.buy_now') }}
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{{ asset('client/images/shooter-genre.jpg') }}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{{ trans('text.home.shooter') }}
							</a>
						</div>
					</div>

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{{ asset('client/images/sport-genre.jpg') }}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{{ trans('text.home.sport') }}
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{{ asset('client/images/adventure-genre.jpg') }}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{{ trans('text.home.adventure') }}
							</a>
						</div>
					</div>

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{{ asset('client/images/rpg-genre.jpg') }}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{{ trans('text.home.rpg') }}
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{{ asset('client/images/indie-genre.jpg') }}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{{ trans('text.home.indie') }}
							</a>
						</div>
					</div>

					<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="client/images/icons/bg-01.jpg" alt="IMG">

						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
								{{ trans('text.home.explore') }}
							</h4>

							<p class="t-center w-size4">
								{!! trans('text.home.gs') !!}
							</p>

							<div class="w-size2 p-t-25">
								<a href="{{ route('games.index') }}" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									{{ trans('text.home.view_all') }}
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					{{ trans('text.home.featured') }}
				</h3>
			</div>

			<div class="wrap-slick2">
				<div class="slick2">
                    @foreach($featuredGames as $game)
    					<div class="item-slick2 p-l-15 p-r-15">
    						<div class="block2">
    							<div class="block2-img wrap-pic-w of-hidden pos-relative @if (config('app.locale') == config('string.vi')) {{ 'block2-labelfeatured-vi' }} @else {{ 'block2-labelfeatured' }} @endif">
    								<img src="{{ asset('client/images/games/' . $game->id . '/preview.jpg') }}" alt="IMG-PRODUCT">

    								<div class="block2-overlay trans-0-4">
    									<div class="block2-btn-addcart w-size1 trans-0-4">
    										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                {{ trans('text.home.add') }}									
    										</button>
    									</div>
    								</div>
    							</div>

    							<div class="block2-txt p-t-20">
    								<a href="{{ route('games.detail', ['id' => $game->id]) }}" class="block2-name dis-block s-text3 p-b-5">
    									{{ $game->title }}
    								</a>

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

	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				{{ trans('text.home.ins') }}
			</h3>
		</div>

		<div class="flex-w">
            @for($i = 1;$i <= 5;$i++)
    			<div class="block4 wrap-pic-w">
    				<img src="{{ asset('client/images/ins/ins-' . $i . '.jpg') }}" alt="IMG-INSTAGRAM">

    				<a href="{{ config('link.instagram') }}" class="block4-overlay sizefull ab-t-l trans-0-4">
    					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
    						<p class="s-text10 m-b-15 h-size1 of-hidden">
    							{{ trans('text.home.ins') }}
    						</p>

    						<span class="s-text9">
    							{{ trans('text.home.mark') }}
    						</span>
    					</div>
    				</a>
    			</div>
            @endfor
		</div>
	</section>

	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					{{ trans('text.home.new_updates') }}
				</h4>

				<a href="{{ route('games.index') }}" class="s-text11 t-center">
					{{ trans('text.home.more_info') }} &nbsp;<i class="fa fa-arrow-right"></i>
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					{{ trans('text.home.refund') }}
				</h4>

				<span class="s-text11 t-center">
					{{ trans('text.home.error') }} &nbsp;<i class="fa fa-exclamation-triangle"></i>
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					{{ trans('text.home.opening') }}
				</h4>

				<span class="s-text11 t-center">
					{{ trans('text.home.24/7') }} &nbsp;<i class="fa fa-clock-o"></i>
				</span>
			</div>
		</div>
	</section>
@endsection
