@extends('layouts.app')

@section('page-title')
    {{ trans('text.register.title') }}
@endsection

@section('content')
    <div class="login-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-12 d-flex">
                    <div class="gilbard-login">

                        <h3>{{ trans('text.register.need_info') }}</h3>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-30">
                                    <input id="email" type="email" class="@error ('email') is-invalid @enderror" name="email" placeholder="{{ trans('text.register.type_your_email_address') }}" value="{{ old('email') }}" required autocomplete="email">

                                    @error ('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-30">
                                    <input id="password" type="password" class="@error ('password') is-invalid @enderror" name="password" placeholder="{{ trans('text.register.enter_your_password') }}" required autocomplete="new-password">

                                    @error ('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-30">
                                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="{{ trans('text.register.confirm_password') }}" required autocomplete="new-password">
                                </div>
                                <div class="col-12"><input type="submit" value="{{ trans('text.register.register') }}"></div>
                            </div>
                        </form>
                        <h4>{{ trans('text.register.have_account') }} <a href="{{ route('login') }}">{{ trans('text.register.login') }}</a></h4>
                    </div>
                </div>

                <div class="col-md-1 col-12 d-flex">

                    <div class="login-reg-vertical-boder"></div>

                </div>

                <div class="col-md-5 col-12 d-flex">

                    <div class="gilbard-social-login">
                        <h3>{{ trans('text.register.also_you_can') }}</h3>

                        <a href="#" class="facebook-login">{{ trans('text.register.login_with') }} <i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter-login">{{ trans('text.register.login_with') }} <i class="fa fa-twitter"></i></a>
                        <a href="#" class="google-plus-login">{{ trans('text.register.login_with') }} <i class="fa fa-google-plus"></i></a>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
