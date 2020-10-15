@extends('layouts.app')

@section('page-title')
    {{ $game->title." || Game Store" }}
@endsection

@section('content')
    <div class="games-details-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="game-image-gallery-wrap">
                                <div class="game-description mb-45">
                                    <a href="{{ route('games.index') }}"><i class="fa fa-arrow-left"></i> {{ trans('text.game-detail.back') }}</a>
                                </div>
                                <div class="game-image-large">
                                    <div class="game-image img-full">
                                        <img src="{{ asset(config('link.games') . $game->id . config('link.large-image-1')) }}" alt="">
                                    </div>
                                    <div class="game-image img-full">
                                        <img src="{{ asset(config('link.games') . $game->id . config('link.large-image-2')) }}" alt="">
                                    </div>
                                    <div class="game-image img-full">
                                        <img src="{{ asset(config('link.games') . $game->id . config('link.large-image-3')) }}" alt="">
                                    </div>
                                    <div class="game-image img-full">
                                        <img src="{{ asset(config('link.games') . $game->id . config('link.large-image-4')) }}" alt="">
                                    </div>
                                </div>
                                <div class="game-image-thumbs">                   
                                    <div class="sm-image"><img src="{{ asset(config('link.games') . $game->id . config('link.image-1')) }}" alt=""></div>
                                    <div class="sm-image"><img src="{{ asset(config('link.games') . $game->id . config('link.image-2')) }}" alt=""></div>
                                    <div class="sm-image"><img src="{{ asset(config('link.games') . $game->id . config('link.image-3')) }}" alt=""></div>
                                    <div class="sm-image"><img src="{{ asset(config('link.games') . $game->id . config('link.image-4')) }}" alt=""></div>
                                </div>
                                <div class="game-description mb-45">
                                    <h3>{{ $game->title }}</h3>
                                    <p><strong>{{ $game->title }}</strong>
                                        {{ $game->summary }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="timelaine-wrapper mb-30">
                                <div class="single-timeline pb-30">
                                    <h4>{{ trans('text.game-detail.features') }}</h4>
                                    <p>{{ $game->features }}</p>
                                </div>
                                <div class="single-timeline pb-30">
                                    <h4>{{ trans('text.game-detail.sys') }}</h4>
                                    <p>{!! $game->requirement !!}</p>
                                </div>
                                <div class="single-timeline pb-30">
                                    <h4>{{ trans('text.game-detail.release_date') }}</h4>
                                    <p>{{ $game->release_date }}</p>
                                </div>
                                <div class="single-timeline pb-30">
                                    <h4>{{ trans('text.game-detail.publisher') }}</h4>
                                    <span>{{ $game->publisher->name }}</span>
                                </div>
                                <div class="single-timeline pb-30">
                                    <h4>{{ trans('text.game-detail.price_add') }}</h4>
                                    <span class="game-price">{{ trans('text.game-detail.price') }}: {{ $game->price.trans('text.game-detail.vnd') }}</span>
                                    @if (isset(Session::get('cart')[$game->id]))
                                        <a><i class="fa fa-exclamation-triangle"></i> GAME ALREADY EXISTS IN CART</a>
                                    @elseif (!$isBuy)
                                        <a href="{{ route('cart.store', ['id' => $game->id, 'name' => $game->title, 'price' => $game->price, 'quantity' => 1]) }}">{{ trans('text.game-detail.click_add') }}</a>
                                    @elseif ($role == config('role.publisher'))
                                        <a><i class="fa fa-exclamation-triangle"></i> {{ trans('text.game-detail.publisher_not_buy') }}</a>
                                    @else
                                        <a href="{{ route('games.download') }}">{{ trans('text.game-detail.own') }} <i class="fa fa-download"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="review-wrap">
                                <h3>{{ trans('text.game-detail.comments') }} ()</h3> 
                                <div class="single-review mb-30">
                                    <h4>Best action game play ever</h4>
                                    <div class="ratting">
                                        <i class="fa fa-user"></i> Nick
                                    </div>
                                    <p>The Witcher 3 is the best action game that i play ever. encounter consequences that are mely painful. Nor again is there me anyone who loves or pursues or desires take a trivial meaning less sexample, which of us ever undertakes laborious physical exercise.</p>
                                </div>
                                <div class="single-review mb-30">
                                    <h4>Really love this game</h4>
                                    <div class="ratting">
                                        <i class="fa fa-user"></i> Bob
                                    </div>
                                    <p>The Witcher 3 is the best action game that i play ever. encounter consequences that are mely painful. Nor again is there me anyone who loves or pursues or desires take a trivial meaning less sexample, which of us ever undertakes laborious physical exercise.</p>
                                </div>
                                <div class="reply-btn">
                                    <a href="#">{{ trans('text.game-detail.view_more') }} <i class="icofont-long-arrow-right"></i></a>
                                </div>

                                <div>
                                   &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-50 mt-xs-50">
                        <div class="single-sidebar-widget mb-45">
                            <h3>{{ trans('text.game-detail.newest') }}</h3>
                            @foreach ($newestGames as $newGame)
                                <div class="single-featured-game mb-20">
                                    <div class="game-img">
                                        <a href="#"><img src="{{ asset(config('link.games') . $newGame->id . config('link.image-1')) }}" alt=""></a>
                                        <a class="game-title" href="#">{{ $newGame->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="single-sidebar-widget mb-45">
                            <h3>{{ trans('text.game-detail.follow_us') }}</h3>
                            <div class="sidebar-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="icofont-youtube-play"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="icofont-instagram"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="icofont-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar-widget mb-45">
                            <h3>{{ trans('text.game-detail.pop_rec') }}</h3>
                            @foreach ($recomendedGames as $recGame)
                                <div class="popular-game mb-20">
                                    <div class="game-img">
                                        <a href="#"><img src="{{ asset(config('link.games') . $recGame->id . config('link.image-1')) }}" alt=""></a>
                                    </div>
                                    <div class="game-content">
                                        <h3><a href="#">{{ $recGame->title }}</a></h3>
                                        <span>{{ $recGame->price.trans('text.game-detail.vnd') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('notification')
    @if (session('error'))
        <input type="hidden" name="error" id="error-message" value="{{ session('error') }}">        
    @elseif (session('success'))
        <input type="hidden" name="success" id="success-message" value="{{ session('success') }}">
    @endif
        <script type="text/javascript" src="{{ asset('js/notification.js') }}"></script>
@endsection
