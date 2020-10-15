@extends('layouts.app')

@section('page-title')
    {{ "Owned Games || Game Store" }}
@endsection

@section('content')
    <div class="page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content text-center">
                        <h1>OWNED GAMES</h1>
                        <a class="df-btn" href="#"></a>
                        <ul class="page-breadcrumb">
                            <li><a href="{{ route('home') }}">HOME</a></li>
                            <li>OWNED GAMES</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        &nbsp;
    </div>

    <div class="hero-section section position-relative">
        <div class="hero-item-4 hero-item-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-hero-item-slider-area">
                            <div class="row hero-game-slide clearfix">
                                @foreach($ownedGames as $ownedGame)
                                    <div class="col-4">
                                        <div class="single-game game-slide-item">
                                            <div class="game-img">
                                                <a href="{{ route('games.detail', ['id' => $ownedGame->game_id]) }}"><img src="{{ asset('images/game/'.$ownedGame->game_id.'/game'.rand(1,3).'.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="game-content">
                                                <h4><a href="{{ route('games.detail', ['id' => $ownedGame->game_id]) }}">{{ $ownedGame->game->title }}</a></h4>
                                                <span><a href="{{ route('games.download') }}"><i class="fa fa-download"></i> Download</a></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        &nbsp;
    </div>
@endsection
