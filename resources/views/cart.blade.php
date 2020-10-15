@extends('layouts.app2')

@section('page-title')
	{{ 'Cart || Game Store' }}
@endsection

@section('content')  
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
        <h2 class="l-text2 t-center">
            Cart
        </h2>
    </section>

    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            @if (!session()->get('cart') || count(session()->get('cart')) < 1)
                <div class="alert alert-warning" role="alert">
                    <i>!No game in cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></i>
                </div>
                <script type="text/javascript" src="{{ asset('bower_components/client/js/redirect.js') }}" key="no-game-in-cart"></script>
            @else
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Game</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70"></th>
                                <th class="column-5">Total</th>
                            </tr>

                            @foreach(session()->get('cart') as $item)
                                <tr class="table-row" data-id={{ $item['game']->id }}>
                                    <td class="column-1">
                                        <div class="cart-img-product b-rad-4 o-f-hidden" data-id={{ $item['game']->id }}>
                                            <img src="{{ asset(config('link.game-detail-link') . $item['game']->id . '/preview.jpg') }}">
                                        </div>
                                    </td>
                                    <td class="column-2">
                                        <a class="item-name" href="{{ route('games.detail', ['id' => $item['game']->id]) }}">
                                            {{ $item['game']->title }}
                                        </a>
                                    </td>
                                    <td class="column-3">{{ $item['game']->price . config('string.vnd') }}</td>
                                    <td class="column-4"></td>
                                    <td class="column-5">{{ $item['game']->price . config('string.vnd') }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <button id="update-cart" class="update-cart flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Update Cart
                        </button>
                    </div>
                </div>

                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        Checkout
                    </h5>

                    <div class="flex-w flex-sb-m p-b-12">
                        <span class="s-text18 w-size19 w-full-sm">
                            Total:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            {{ $total . config('string.vnd') }}
                        </span>
                    </div>

                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text18 w-size19 w-full-sm">
                            Checkout:
                        </span>

                        <div class="w-size20 w-full-sm">
                            <p class="s-text8 p-b-23">
                                Fill all field to checkout.
                            </p>

                            <span class="s-text19">
                                <i class="fa fa-cc-amex" style="color: blue" data-toggle="tooltip" data-placement="top"title="AMEX"></i>
                                <i class="fa fa-cc-visa" style="color: navy"  data-toggle="tooltip" data-placement="top"title="VISA"></i>
                                <i class="fa fa-cc-mastercard" style="color: red"  data-toggle="tooltip" data-placement="top"title="MASTERCARD"></i>
                                <i class="fa fa-cc-discover" style="color: orange"  data-toggle="tooltip" data-placement="top"title="DISCOVER"></i>
                            </span>
                            <div>
                                <div class="size13 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name" placeholder="Name on Card">
                                </div>

                                <div class="size13 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="card-number" placeholder="Credit Card Number">
                                </div>

                                <div class="size13 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="cvv" placeholder="CVV">
                                </div>

                                <div class="size13 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="exp-month" placeholder="Exp Month">
                                </div>

                                <div class="size13 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="exp-year" placeholder="Exp Year">
                                </div>

                                <div class="size14 trans-0-4 m-b-10">
                                    <button class="checkout flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                        Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="bower_components/client/js/cart-detail.js"></script>
    <script type="text/javascript" src="bower_components/client/js/checkout.js"></script>
    @if (!session()->get('cart') || count(session()->get('cart')) < 1)
        <script type="text/javascript" src="bower_components/client/js/redirect.js" key="no-game-in-cart"></script>
    @endif
@endsection
