@extends('layouts.app2')

@section('page-title', trans('text.blog.title'))

@section('content')
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
		<h2 class="l-text2 t-center">
			{{ trans('text.blog.blogs') }}
		</h2>
	</section>

	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						@foreach ($posts as $post)
							<div class="item-blog p-b-80">
								<a href="{{ route('blogs.show', $post->id) }}" class="item-blog-img pos-relative dis-block hov-img-zoom">
									<img src="{{ asset(config('link.blog-link') . $post->id . '/preview.jpg') }}">

									<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
										{{ $post->release_date }}
									</span>
								</a>

								<div class="item-blog-txt p-t-33">
									<h4 class="p-b-11">
										<a href="{{ route('blogs.show', $post->id) }}" class="m-text24">
											{{ $post->title }}
										</a>
									</h4>

									<div class="s-text8 flex-w flex-m p-b-21">
										<span>
											{{ trans('text.blog.by') }} <b>{{ $post->account->publisher->name }}</b>
											<span class="m-l-3 m-r-6">|</span>
										</span>

										<span>
											{{ count($post->comments) }} {{ trans('text.blog.comments') }}
										</span>
									</div>

									<p class="p-b-12">
										{{ $post->summary }}
									</p>

									<a href="{{ route('blogs.show', $post->id) }}" class="s-text20">
										{{ trans('text.blog.continue_reading') }}
										<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						@endforeach
					</div>

					{{ $posts->render('layouts.pagination2') }}
				</div>
			</div>
		</div>
	</section>
@endsection
