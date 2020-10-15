@extends('auth.layouts.app')

@section('title', trans('text.register.title'))

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					@csrf
					<span class="login100-form-title p-b-43">
						{{ trans('text.register.register_to') }}
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "{{ trans('text.login.valid_email') }}">
						<input class="input100 has-val" id="email" type="text" name="email" value="{{ old('email') }}">
						<span class="focus-input100"></span>
						<span class="label-input100">{{ trans('text.register.email') }}</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="{{ trans('text.login.valid_password') }}">
						<input class="input100 has-val" id="password" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">{{ trans('text.register.password') }}</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="{{ trans('text.login.valid_password') }}">
						<input class="input100 has-val" id="password" type="password" name="password_confirmation">
						<span class="focus-input100"></span>
						<span class="label-input100">{{ trans('text.register.confirm') }}</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{ trans('text.register.register') }}
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							{{ trans('text.register.or') }} <a href="{{ route('login') }}">{{ trans('text.register.login') }}</a>
						</span>
					</div>
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="{{ route('home') }}"><i class="fa fa-arrow-left"></i> {{ trans('text.register.back') }}</a>
						</span>
					</div>
				</form>

				<div class="login100-more"></div>
			</div>
		</div>
	</div>
@endsection

@section('notification')
	@error ('email')
        <input type="hidden" name="error" id="error-email" value="{{ $message }}">
    @enderror
    @error ('password')
        <input type="hidden" name="error" id="error-password" value="{{ $message }}">
    @enderror
    <script src="bower_components/client/auth/js/notification.js"></script>
@endsection