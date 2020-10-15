@extends('layouts.app2')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
        <h2 class="l-text2 t-center">
            Reset Password
        </h2>
    </section>

    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ 'Reset Password' }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="leave-comment">
                        <h4 class="m-text25 p-b-14">
                            Reset Password
                        </h4>

                        <span class="s-text8 p-b-40">
                            Reset password link will be sent to your account's email.
                        </span>

                        <div class="bo12 of-hidden size19 m-b-20">
                            <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email">
                        </div>

                        <div class="w-size24">
                            <button class="btn-review flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" data-game="">
                                Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
