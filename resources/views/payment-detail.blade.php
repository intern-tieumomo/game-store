@extends('layouts.app')

@section('page-title')
	{{ 'Payment Detail || Game Store' }}
@endsection

@section('content')
    <div class="page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content text-center">
                        <h1>PAYMENT DETAIL</h1>
                        <a class="df-btn" href="#"></a>
                        <ul class="page-breadcrumb">
                            <li><a href="{{ route('home') }}">HOME</a></li>
                            <li>PAYMENT DETAIL</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-list-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($paymentDetails as $paymentDetail)
                        <div class="col-12">
                            <div class="single-blog-post blog-list mb-30">
                                <div class="blog-img">
                                    <a href="single-blog.html"><img src="{{ asset(config('link.games').$paymentDetail->game_id.'/game1.jpg') }}" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="{{ route('games.detail', ['id' => $paymentDetail->game_id]) }}">{{ $paymentDetail->game->title }}</a></h3><hr>
                                    <p>&nbsp;</p><p>&nbsp;</p>
                                    <p><i class="fa fa-calendar-plus-o"></i> {{ $paymentDetail->payment->payment_date }}</p>
                                    <div class="blog-bottom">
                                        <ul class="meta">
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i> {{ $paymentDetail->subtotal." VND" }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    {{ $paymentDetails->render('layouts.pagination') }}

                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-55 mt-xs-50">
                        <div class="single-sidebar-widget mb-45">
                            <h3><i class="fa fa-shopping-cart"></i> Payment #{{ $payment->id }}</h3><hr>
                            <h5>{{ $payment->payment_date }}</h5>
                        </div>
                        <div class="single-sidebar-widget mb-45">
                            <h3>Total: {{ $payment->amount." VND" }}</h3>
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