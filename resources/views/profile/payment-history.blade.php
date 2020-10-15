@extends('layouts.app')

@section('page-title')
{{ 'Payment History || Game Store' }}
@endsection

@section('content')  
<div class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-content text-center">
                    <h1>PAYMENT HISTORY</h1>
                    <a class="df-btn" href="#"></a>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('home') }}">HOME</a></li>
                        <li>PAYMENT HISTORY</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="forum-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(count($payments) > 0)
                @foreach($payments as $payment)
                <div class="single-forum mb-30">
                    <h3><a href="{{ route('checkout.detail', ['id' => $payment->id]) }}"><i class="fa fa-shopping-cart"></i> #{{ $payment->id." - ".$payment->payment_date }}</a></h3>
                    <div class="forum-meta">
                        <ul>
                            <li><a>Total: </a></li>
                            <li><a>{{ $payment->amount." VND" }}</a></li>
                        </ul>
                        <span class="view"><a href="{{ route('checkout.detail', ['id' => $payment->id]) }}">View detail <i class="fa fa-arrow-right"></i></a></span>
                    </div>
                </div>
                @endforeach

                {{ $payments->render('layouts.pagination') }}
                @else
                <div class="single-forum mb-30">
                    <h3><a><i class="fa fa-shopping-cart"></i> No Payment</a></h3>
                    <div class="forum-meta">
                        <ul>
                            <li><a href="{{ route('games.index') }}"><i class="fa fa-arrow-left"></i> Go to Games page and get some</a></li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div>
    &nbsp;
</div>
@endsection