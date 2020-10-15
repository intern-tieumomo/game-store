@extends('layouts.app2')

@section('page-title')
    {{ "Owned Games || Game Store" }}
@endsection

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
        <h2 class="l-text2 t-center">
            Owned Games
        </h2>
    </section>

    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    All Owned Games
                </h3>
            </div>

            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($ownedGames as $ownedGame)
                        <div class="item-slick2 p-l-15 p-r-15">
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative @if (config('app.locale') == config('string.vi')) {{ 'block2-labelowned-vi' }} @else {{ 'block2-labelowned' }} @endif">
                                    <img src="{{ asset('client/images/games/' . $ownedGame->game_id . '/preview.jpg') }}" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a class="block2-btn-addcart w-size1 trans-0-4">
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" disabled>
                                                Download                                  
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="{{ route('games.detail', ['id' => $ownedGame->game_id]) }}" class="block2-name dis-block s-text3 p-b-5">
                                        <strong>{{ $ownedGame->game->title }}</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-b-30">
                    <div class="leave-comment">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Search
                        </h4>

                        <div class="leave-comment">
                            <div class="bo12 of-hidden size19 m-b-20">
                                <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name">
                            </div>

                            <div class="w-size24">
                                <button class="btn-search-owned-game flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" data-game="">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-b-30">
                    <div class="leave-comment">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Result
                        </h4>

                        <div class="result">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('.btn-search-owned-game').on('click', function(){
            var name = $('input[name=name]').val();

            $.ajax({
                url: "/search-owned-games",
                type: "GET",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "name": name,
                },
                success: function(result) {
                    $('.result').empty();
                    $('.result').append(result);
                    console.log(result);
                }
            });
        });

        $('.block2-btn-addcart').on('click', function(e) {
            e.stopPropagation();
        });
    </script>
@endsection
