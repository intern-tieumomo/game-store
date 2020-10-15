@extends('layouts.app')

@section('page-title')
    {{ trans('text.games.title') }}
@endsection

@section('content')
    <div class="page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content text-center">
                        <h1>{{ trans('text.games.games') }}</h1>
                        <a class="df-btn" href="#"></a>
                        <ul class="page-breadcrumb">
                            <li><a href="{{ route('home') }}">{{ trans('text.games.home') }}</a></li>
                            <li>{{ trans('text.games.games') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                    	<form id="filter" method="get" action="">
	                        <div class="game-search-box">
	                            <h3><i class="fa fa-search"></i> {{ trans('text.games.search') }}</h3>
	                        	<input type="text" name="filter" placeholder="{{ trans('text.games.game_name') }}" value="{{ $data['filter'] ?? "" }}">
	                        	<button type="submit"><i class="icofont-search-2"></i></button>
	                        </div>

                            <div class="toolbar-short-area d-md-flex align-items-center">
                                <div class="toolbar-shorter">
                                    <h3><i class="fa fa-sort"></i> {{ trans('text.games.sort') }}</h3>
                                    <select id="sort" class="wide" name="sort">
                                        <option value="">{{ trans('text.games.sort_type') }}</option>
                                        <option value="{{ config('sort.newest') }}" @if ( ($data['sort'] ?? '') == config('sort.newest')) {{ 'selected' }} @endif>{{ trans('text.games.newest') }}</option>
                                        <option value="{{ config('sort.atoz') }}" @if ( ($data['sort'] ?? '') == config('sort.atoz')) {{ 'selected' }} @endif>{{ trans('text.games.a_to_z') }}</option>
                                        <option value="{{ config('sort.ztoa') }}" @if ( ($data['sort'] ?? '') == config('sort.ztoa')) {{ 'selected' }} @endif>{{ trans('text.games.z_to_a') }}</option>
                                        <option value="{{ config('sort.ltoh') }}" @if ( ($data['sort'] ?? '') == config('sort.ltoh')) {{ 'selected' }} @endif>{{ trans('text.games.l_to_h') }}</option>
                                        <option value="{{ config('sort.htol') }}" @if ( ($data['sort'] ?? '') == config('sort.htol')) {{ 'selected' }} @endif>{{ trans('text.games.h_to_l') }}</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="toolbar-short-area d-md-flex align-items-center">
                            <div class="toolbar-shorter">
                                <span>{{ trans('text.games.display') }} {{ $games->count() }} {{ trans('text.games.of') }} {{ $games->total() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	@if ($games->count() == 0)
            		<div class="col-lg-4 col-md-6">
            			<div class="single-game mb-50">
            				<i class="fa fa-exclamation-triangle"></i> {{ trans('text.games.no_game') }}
            			</div>
            		</div>
            	@endif

            	@foreach($games as $game)
	                <div class="col-lg-4 col-md-6">
	                    <div class="single-game mb-50">
	                        <div class="game-img">
	                            <a href="{{ route('games.detail', ['id' => $game->id]) }}"><img src="{{ asset(config('link.games').'game'.rand(1, 12).'.jpg') }}" alt=""></a>
	                        </div>
	                        <div class="game-content">
	                            <h4><a href="{{ route('games.detail', ['id' => $game->id]) }}">{{ $game->title }}</a></h4>
	                            <span>{{ $game->price." ".trans('text.games.VND') }}</span>
	                        </div>
	                    </div>
	                </div>
                @endforeach
            </div>
           	{{ $games->appends($data)->render('layouts.pagination') }}
        </div>
    </div>

    <div>
        &nbsp;
    </div>

    <script src="{{ asset('js/games-page.js') }}"></script>
@endsection
