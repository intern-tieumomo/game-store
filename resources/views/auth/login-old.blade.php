@extends('layouts.app')

@section('page-title')
    {{ trans('text.login.title') }}
@endsection

@section('content')
    <div class="login-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 d-flex">
                    <div class="gilbard-login">
                        
                        <h3>{{ trans('text.login.login_to') }}</h3>
                        <p>{{ trans('text.login.shopping') }} <i class="fa fa-gamepad"></i></i></p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-30">
                                    <input id="email" class="@error ('email') is-invalid @enderror" type="email" name="email" placeholder="{{ trans('text.login.type_your_email_address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error ('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-20">
                                    <input id="password" type="password" name="password" placeholder="{{ trans('text.login.enter_your_password') }}" class="@error ('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error ('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12"><input type="submit" value="{{ trans('text.login.login') }}"></div>
                            </div>
                        </form>
                        <h4>{{ trans('text.login.dont_have_account_please_click') }} <a href="{{ route('register') }}">{{ trans('text.login.register') }}</a></h4>
                    </div>
                </div>

                <div class="col-md-1 col-12 d-flex">
                    <div class="login-reg-vertical-boder"></div>
                </div>

                <div class="col-md-5 col-12 d-flex">
                    <div class="gilbard-social-login">
                        <h3>{{ trans('text.login.also_you_can') }}</h3>
                        <a href="#" class="facebook-login">{{ trans('text.login.login_with') }} <i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter-login">{{ trans('text.login.login_with') }} <i class="fa fa-twitter"></i></a>
                        <a href="#" class="google-plus-login">{{ trans('text.login.login_with') }} <i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        &nbsp;
    </div>
@endsection
