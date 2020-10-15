@extends('layouts.app2')

@section('page-title')
    {{ trans('text.profile.title') }}
@endsection

@section('content')
	@if (Auth::user()->role == config('role.user'))
		@include('profile.user')
	@else
		@include('profile.publisher')
	@endif
@endsection
