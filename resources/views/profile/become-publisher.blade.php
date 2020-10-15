@extends('layouts.app2')

@section('page-title')
    Become Publisher || Game Store
@endsection

@section('content')
	<img class="pre-load" src='client/images/infinity.gif'>
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m">
		<h2 class="l-text2 t-center">
			Become Publisher
		</h2>
		<p class="m-text13 t-center">
			Become our partner
		</p>
	</section>

	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<image class="contact-map size21" src="{{ asset('client/images/become-publisher.gif') }}">
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Publisher Infomation
						</h4>

						<span class="s-text8 p-b-40">
							<i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong class="notice">Notice:</strong> If you request to become a Publisher, all of your user features will be disabled, including games you have purchased.
						</span>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" placeholder="Name" name="name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" placeholder="Phone Number" name="phone">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" placeholder="Address" name="address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" placeholder="Some thing about your company" name="description"></textarea>

						<div class="w-size25">
							<button class="btn-become-publiser flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript">
		$('.btn-become-publiser').on('click', function() {
			var name = $('input[name=name]').val();
			var phone = $('input[name=phone]').val();
			var address = $('input[name=address]').val();
			var description = $('textarea[name=description]').val();

			$.ajax({
				url: "/publisher-request",
				type: "GET",
				data: {
					"_token": $('meta[name="csrf-token"]').attr('content'),
		        	"name": name,
		        	"address": address,
		        	"phone": phone,
		        	"description": description,
				},
				beforeSend: function() {
					$('.btn-become-publiser').html("<img src='client/images/infinity.gif'>");
				},
				success: function(result) {
					$('.btn-become-publiser').text('Send');
					if(result == "success"){
						swal("Profile", "Profile updated!", "success");
					}
					
				},
				error: function(result){
					$('.btn-become-publiser').text('Send');
			        var data = result.responseJSON;
			        if($.isEmptyObject(data.errors) == false) {
			            $.each(data.errors, function (key, value) {
			                switch(key) {
			                	case "name":
			                		swal("Name", "" + value, "warning");
			                		break;
			                	case "phone":
			                		swal("Phone", "" + value, "warning");
			                		break;
			                	case "address":
			                		swal("Address", "" + value, "warning");
			                		break;
			                }
			            });
			        }
			    }
			});
		});
	</script>
@endsection
