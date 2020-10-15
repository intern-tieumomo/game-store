@extends('layouts.app')

@section('page-title')
    {{ trans('text.home.title') }}
@endsection

@section('content')
    <div class="hero-section section position-relative">
        <div class="hero-slider">
            <div class="hero-item hero-item-2">
                <div class="container container-1520">
                    <div class="row">
                        <div class="col-12">

                            <div class="hero-content">
                                <h1>{{ $newestGame->title }}</h1>
                                <h2>BATTLE BEGAN’S HERE</h2>
                                <a class="df-btn" href="{{ route('cart.store', ['id' => $newestGame->id, 'name' => $newestGame->title, 'price' => $newestGame->price, 'quantity' => 1]) }}">{{ trans('text.home.buy_now') }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-item hero-item-2">
                <div class="container container-1520">
                    <div class="row">
                        <div class="col-12">

                            <div class="hero-content">
                                <h1>THE WITCHER 3</h1>
                                <h2>BATTLE BEGAN’S HERE</h2>
                                <a class="df-btn" href="#">{{ trans('text.home.buy_now') }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-section section pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="featured-title">
                        <h2>{{ trans('text.home.featured_games') }}</h2>
                        <a href="{{ route('games.index') }}">{{ trans('text.home.view_all_games') }}</a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="featured-slide">
                        @foreach($featuredGames as $featuredGame)
                            <div class="single-featured img-full">
                                <a href="{{ route('games.detail', ['id' => $featuredGame->id]) }}"><img src="{{ asset('images/feature/feature-slide-'.rand(1,6).'.jpg') }}" alt=""></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="new-game-area section pb-50 pb-lg-30 pb-md-20 pb-sm-10 pb-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2><span class="color-blue">{{ trans_choice('text.home.new', 0) }}</span> {{ trans_choice('text.home.games', 1) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row game-slide">
                @foreach($newGames as $newGame)
                    <div class="col-4">
                        <div class="single-game mb-50">
                            <div class="game-img">
                                <a href="{{ route('games.detail', ['id' => $newGame->id]) }}"><img src="{{ asset('images/game/'.$newGame->id.'/game'.rand(1,4).'.jpg') }}" alt=""></a>
                            </div>
                            <div class="game-content">
                                <h4><a href="{{ route('games.detail', ['id' => $newGame->id]) }}">{{ $newGame->title }}</a></h4>
                                <span><a href="{{ route('games.detail', ['id' => $newGame->id]) }}">View Detail</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="video-section section pb-135 pb-lg-115 pb-md-105 pb-sm-95 pb-xs-85">
        <div class="container-fluid p-0">
            <div class="row no-gutters align-items-end">
                <div class="col-12">
                    <div class="video-slider-active">
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="{{ asset('images/video/video-front1.jpg') }}" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> {{ trans('text.home.view_demo') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="{{ asset('images/video/video-front3.jpg') }}" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> {{ trans('text.home.view_demo') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="{{ asset('images/video/video-front2.jpg') }}" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> {{ trans('text.home.view_demo') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="{{ asset('images/video/video-front4.jpg') }}" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> {{ trans('text.home.view_demo') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="{{ asset('images/video/video-front1.jpg') }}" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> {{ trans('text.home.view_demo') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="{{ asset('images/video/video-front4.jpg') }}" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> {{ trans('text.home.view_demo') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="games-review-section section pb-105 pb-lg-85 pb-md-20 pb-sm-65 pb-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2><span class="color-blue">{{ trans_choice('text.home.games', 2) }}</span> {{ trans_choice('text.home.review', 1) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-games-review mb-50">
                        <div class="review-img">
                            <a href="games-details.html"><img src="{{ asset('images/review/review1.jpg') }}" alt=""></a>
                        </div>
                        <div class="review-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                            <span>{{ trans('text.home.rating') }}: 9.9</span>
                            <p>The Elder Scroll is the most popular are ames that your can Latest Mega 2019 games offer you ioous league and also alow you to make youe and smile</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-games-review mb-50">
                        <div class="review-img">
                            <a href="games-details.html"><img src="{{ asset('images/review/review2.jpg') }}" alt=""></a>
                        </div>
                        <div class="review-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                            <span>{{ trans('text.home.rating') }}: 9.9</span>
                            <p>The Elder Scroll is the most popular are ames that your can Latest Mega 2019 games offer you ioous league and also alow you to make youe and smile</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-games-review mb-50">
                        <div class="review-img">
                            <a href="games-details.html"><img src="{{ asset('images/review/review3.jpg') }}" alt=""></a>
                        </div>
                        <div class="review-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                            <span>{{ trans('text.home.rating') }}: 9.9</span>
                            <p>The Elder Scroll is the most popular are ames that your can Latest Mega 2019 games offer you ioous league and also alow you to make youe and smile</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="newslatter-section section pb-125 pb-lg-105 pb-md-70 pb-sm-85 pb-xs-50">
        <div class="container">
           
            <div class="row">
               <div class="col-12">
                   <div class="news-latter-area">
                       <div class="news-latter-box">
                           <h3>{{ trans('text.home.subcribe_our') }} <span class="color-blue">{{ trans('text.home.newsletter') }}</span> <br> {{ trans('text.home.get_all') }} <span class="color-red">{{ trans('text.home.lastest') }}</span> {{ trans('text.home.news') }}, {{ trans('text.home.update') }}, <br> <span class="color-blue">{{ trans('text.home.videos') }}</span> {{ trans('text.home.and_offers') }} </h3>
                           <form action="#">
                               <input type="text" placeholder="{{ trans('text.home.enter_your_email_here') }}">
                           </form>
                       </div>
                   </div>
               </div> 
            </div>
            
        </div>
        
    </div>
@endsection
