@extends('layouts.app2')

@section('page-title', 'Publish Game || Game Store')

@section('content')
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
		<h2 class="l-text2 t-center">
			Publish Game
		</h2>
	</section>

	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<form class="row" id="publish-game-form" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="col-md-6 p-b-30">
					<div class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Game's Infomation
						</h4>

						<span class="s-text8 p-b-40">
							<strong>Title:</strong>
						</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="title" placeholder="Title" value="">
						</div>

						<span class="s-text8 p-b-40">
							<strong>Price:</strong>
						</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="price" placeholder="Price" value="">
						</div>

						<span class="s-text8 p-b-40">
							<strong>Release Date:</strong>
						</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="date" name="release_date" placeholder="Release Date" value="">
						</div>

						<span class="s-text8 p-b-40">
							<strong>Summary:</strong>
						</span>
						<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="summary" placeholder="Summary"></textarea>

						<span class="s-text8 p-b-40">
							<strong>Feature:</strong>
						</span>
						<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="features" placeholder="Features"></textarea>

						<span class="s-text8 p-b-40">
							<strong>System Requirement:</strong>
						</span>
						<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="requirement" placeholder="System Requirement"></textarea>

						<div class="w-size25">
							<button type="submit" class="btn-publish-game flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send Request
							</button>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Game's Image
						</h4>

						<span class="s-text8 p-b-40">
							<strong>A preview image:</strong> <span class="notice">720 x 960, < 2MB recommended for display in cart preview, games page, ...<span>
						</span>
						<div class="of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-t-10 p-r-22" id="preview" type="file" name="preview" placeholder="Preview Image" value="">
						</div>

						<span class="s-text8 p-b-40">
							<strong>3 detail images:</strong> <span class="notice">1200 x 1600, < 2MB recommended for display in game detail<span>
						</span>
						<div class="of-hidden size20 m-b-20">
							<input class="s-text7 p-t-10 p-r-22" type="file" name="detail_1" placeholder="Detail Image" value="">
							<input class="s-text7 p-t-10 p-r-22" type="file" name="detail_2" placeholder="Detail Image" value="">
							<input class="s-text7 p-t-10 p-r-22" type="file" name="detail_3" placeholder="Detail Image" value="">
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="{{ mix('/client/scripts/publish-game.js') }}"></script>
@endsection
