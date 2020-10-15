@extends('layouts.app2')

@section('page-title', $post->title . ' || Game Store')

@section('content')
	<style type="text/css">
		.comments {
			max-height: 500px;
			overflow-y: scroll;
		}

		.comments::-webkit-scrollbar {
			display: none;
		}
	</style>
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="{{ route('home') }}" class="s-text16">
			{{ trans('text.blog-detail.home') }}
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="{{ route('blogs.index') }}" class="s-text16">
			{{ trans('text.blog-detail.blogs') }}
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			{{ $post->title }}
		</span>
	</div>

	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="{{ asset('client/images/blogs/' . $post->id . '/preview.jpg') }}">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									{{ $post->title }}
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										{{ trans('text.blog-detail.by') }} <i class="fa fa-gitlab" aria-hidden="true"></i> <b>{{ $post->account->email }}</b>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $post->release_date }}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span class="count-comment">
										<i class="fa fa-comments-o" aria-hidden="true"></i>
										<span class="number-comment">{{ count($post->comments) }}</span> {{ trans('text.blog-detail.comments') }}
									</span>
								</div>

								<p class="p-b-25">
									{!! $post->content !!}
								</p>
							</div>
						</div>

						<h4 class="m-text25 p-b-14">
							Comments
						</h4>
						<p class="s-text8 p-b-10">
							Scroll to view more <i class="fa fa-arrows-v" aria-hidden="true"></i>
						</p>
						<div id="section-comment">
							<div id="list-comment">
								@if (count($post->comments) == 0)
									<div class="leave-comment m-b-30">
										<p class="p-b-25">
											<i>
												<i class="fa fa-comments-o" aria-hidden="true"></i> <span class="p-b-25">No comment yet! <label for="comment">Be the first one <i class="fa fa-hand-o-down" aria-hidden="true"></i></label></span>
											</i>
										</p>
									</div>
								@else
									<div class="comments m-b-30">
										@foreach($post->comments as $item)
											<p class="comment-detail" data-id="{{ $item->id }}">
												<i>
													<b><i class="fa fa-user-circle" aria-hidden="true"></i> {{ $item->account->email }}</b>@if ($post->account_id == $item->account->id) <span class="badge badge-success">Author</span> @endif - {{ $item->updated_at }}
													@if (Auth::check() && Auth::id() == $item->account->id)
														&nbsp;<i class="fa fa-pencil-square-o notice" aria-hidden="true" data-toggle="modal" data-target="#update-comment-{{ $item->id }}"></i>
													@endif
													<br>
												</i>
												<p class="comment-text p-b-25" data-id="{{ $item->id }}">{{ $item->comment }}</p>
											</p>
											<div class="modal fade" id="update-comment-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Update Comment</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" id="ta-update-comment" data-id="{{ $item->id }}" name="update_comment" placeholder="{{ trans('text.blog-detail.comment_ph') }}">{{ $item->comment }}</textarea>
														</div>
														<div class="modal-footer">
															<button type="button" data-id="{{ $item->id }}" class="delete-comment btn btn-secondary bo-rad-20 s-text1">Delete</button>
															<button type="button" data-id="{{ $item->id }}" class="update-comment btn flex-c-m bg1 bo-rad-20 hov1 s-text1 trans-0-4">Save changes</button>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								@endif
							</div>
						</div>

						@if (Auth::check())
							<div class="leave-comment">
								<h4 class="m-text25 p-b-14">
									{{ trans('text.blog-detail.comment') }}
								</h4>

								<p class="s-text8 p-b-40">
									{!! trans('text.blog-detail.email') !!}
								</p>

								<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" id="comment" name="comment" placeholder="{{ trans('text.blog-detail.comment_ph') }}"></textarea>

								<div class="w-size24">
									<button data-post="{{ $post->id }}" class="post-comment flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										{{ trans('text.blog-detail.post') }}
									</button>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" id="#script">
		$('.post-comment').on('click', function(e) {
			e.stopPropagation();
			var comment = $('textarea[name=comment]').val();
			var post_id = $(this).data("post");

			$.ajax({
				url: "/post-comment",
				type: "POST",
	        	data: {
	        		"_token": $('meta[name="csrf-token"]').attr('content'),
	        		"comment": comment,
	        		"post_id": post_id,
	        	},
	        	success: function(result) {
	        		var html = "" +
	        		"<p class='comment-detail' data-id='" + result['id'] + "'>\n" +
	        			"<i>\n" +
	        				"<b><i class='fa fa-user-circle' aria-hidden='true'></i> " + result['email'] + "</b> - " + result['updated_at'] + " &nbsp;<i class='fa fa-pencil-square-o notice' aria-hidden='true' data-toggle='modal' data-target='#update-comment-" + result['id'] + "'></i>\n" +
	        				"<br>\n" +
	        			"</i>\n" +
	        			"<p class='comment-text p-b-25' data-id='" + result['id'] + "'>" + result['comment'] + "</p>\n" +
	        		"</p>\n" +
	        		"<div class='modal show' id='update-comment-" + result['id'] + "' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>\n" +
	        			"<div class='modal-dialog modal-lg'>\n" +
	        				"<div class='modal-content'>\n" +
	        					"<div class='modal-header'>\n" +
	        						"<h5 class='modal-title' id='exampleModalLabel'>Update Comment</h5>\n" +
	        						"<button type='button' class='close' data-dismiss='modal' aria-label='Close'>\n" +
	        							"<span aria-hidden='true'>&times;</span>\n" +
	        						"</button>\n" +
	        					"</div>\n" +
	        					"<div class='modal-body'>\n" +
	        						"<textarea class='dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20' id='ta-update-comment' data-id='" + result['id'] + "' name='update_comment' placeholder='Comment...'>" + result['comment'] + "</textarea>\n" +
	        					"</div>\n" +
	        					"<div class='modal-footer'>\n" +
	        						"<button type='button' data-id='" + result['id'] + "' class='delete-comment btn btn-secondary bo-rad-20 s-text1'>Delete</button>\n" +
	        						"<button type='button' data-id='" + result['id'] + "' class='update-comment btn flex-c-m bg1 bo-rad-20 hov1 s-text1 trans-0-4'>Save changes</button>\n" +
	        					"</div>\n" +
	        				"</div>\n" +
	        			"</div>\n" +
	        		"</div>\n";
	        		$('textarea[name=comment]').val("");
	        		$('.comments').prepend(html);
	        		// $('.leave-comment').html(html);
	        		console.log(html);
	        	}
			});
		});

		$(document).on('click', '.delete-comment', function(e) {
			e.stopPropagation();
			var id = $(this).data("id");

			$.ajax({
				url: "/delete-comment/" + id,
				type: "DELETE",
	        	data: {
	        		"_token": $('meta[name="csrf-token"]').attr('content')
	        	},
	        	success: function(result) {
	        		$(".comment-detail[data-id=" + id + "]").remove();
	        		$(".comment-text[data-id=" + id + "]").remove();
	        		$("#update-comment-" + id).remove();
	        		$(".modal-backdrop").remove();
	        	}
			});
		});

		$(document).on('click', '.update-comment', function(e) {
			var id = $(this).data("id");
			var comment = $(this).parent().parent().find('#ta-update-comment').val();

			$.ajax({
				url: "/update-comment",
				type: "POST",
				data: {
					"_token": $('meta[name="csrf-token"]').attr('content'),
					"comment": comment,
					"id": id,
				},
				success: function(result) {
					swal("Game Store", result['text'], "success");
					$(".comment-text[data-id=" + id + "]").html(result['comment']);
					$("#update-comment-" + id).modal('hide');
				}
			});
		});
	</script>
@endsection