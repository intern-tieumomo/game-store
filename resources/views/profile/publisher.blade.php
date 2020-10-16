<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
	<h2 class="l-text2 t-center">
		Profile
	</h2>
</section>

<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-3 p-b-30">
				<div class="leave-comment">
					<h4 class="m-text26 p-b-36 p-t-15">
						Features
					</h4>

					<div class="of-hidden m-b-20">
						<a href="javascript:void(0)" data-toggle="modal" data-target="#change-password">Change Password <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a><hr>
						<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="change-password-label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">	
									<div class="modal-header">
										<h5 class="modal-title" id="change-password-label">
											Change Password
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body">
										<div class="bo4 of-hidden size15 m-b-20">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="current_password" placeholder="Old Password" value="">
										</div>

										<div class="bo4 of-hidden size15 m-b-20">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="new_password" placeholder="New Password" value="">
										</div>

										<div class="bo4 of-hidden size15 m-b-20">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="confirm_new_password" placeholder="Confirm New Password" value="">
										</div>

										<div class="w-size25">
											<button class="btn-change-password flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
												Change
											</button>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" data-dismiss="modal">
											Close
										</button>
									</div>
								</div>
							</div>
						</div>
						<a href="{{ route('publisher.index') }}">Publish Game <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a><hr>
						<a href="#">Create Post <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>

			<div class="col-md-4 p-b-30">
				<div class="publish-history leave-comment">
					<h4 class="m-text26 p-b-36 p-t-15">
						Recent Publish
					</h4>

					<div class="publish-history-detail">
						@foreach($publishes as $game)
							<div class="of-hidden size15 m-b-20">
								<a href="{{ route('games.detail', ['id' => $game->id]) }}" target="_blank">
									<i class="fa fa-history" aria-hidden="true"></i> #{{ $game->id }} - {{ $game->release_date }} - <i class="fa fa-gamepad" aria-hidden="true"></i> Title: {{ $game->title }}
								</a>
							</div>
						@endforeach

						{{ $publishes->render('layouts.pagination2') }}
					</div>
				</div>

				<a href="javascript:void(0)" class="view-more-publish">View more <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
			</div>

			<div class="col-md-5 p-b-30">
				<div class="leave-comment">
					@csrf
					<h4 class="m-text26 p-b-36 p-t-15">
						Infomation
					</h4>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name" value="{{ $publisher->name }}">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Phone Number" value="{{ $publisher->phone }}">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="address" placeholder="Address" value="{{ $publisher->address }}">
					</div>

					<div class="w-size25">
						<button class="btn-update-publisher-profile flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
							Update
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@section('js')
	<script type="text/javascript" src="{{ mix('/client/scripts/profile.js') }}"></script>
@endsection
