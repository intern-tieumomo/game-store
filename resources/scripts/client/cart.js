$('.block2-btn-addcart').each(function() {
	var role = $(this).data("role");
	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
	var id = $(this).parent().parent().parent().find('.block2-id').val();
	var token = $(this).parent().parent().parent().find('.block2-token').val();
	$(this).on('click', function(){
		if(role == "publisher") {
			window.location.href = "/game-detail?id=" + id;
		} else if (role == "download") {
			window.location.href = "/download";
		} else {
			$.ajax({
				url: "/add-to-cart",
				type: "GET",
				data: {
					"_token": token,
					"id": id,
				},
				success: function(result) {
					switch(result) {
						case "isNotLogin":
							window.location.href = "/login";
							break;
						case "isNotExist":
							swal("Game", "Game does not exist!", "warning");
							break;
						case "isOwned":
							swal("Owned", "You owned this game!", "warning");
							break;
						case "isPublisher":
							swal("Publisher", "Publisher can not buy game!", "warning");
							break;
						case "isInCart":
							swal("Cart", "This game already in cart!", "warning");
							break;
						case "success":
							swal("Cart", "Added to cart!", "success");
							$('#header-icons-noti').load(' #header-icons-noti-item');
							$('#header-cart').load(' #header-cart-detail>*');
							break;
					}
					
				}
			});
		}
	});
});

$('.btn-addcart-product-detail').each(function(){
	var nameProduct = $('.product-detail-name').html();
	var id = $('.block2-id').val();
	var token = $('.block2-token').val();
	$(this).on('click', function(){
		$.ajax({
			url: "/add-to-cart",
			type: "GET",
			data: {
				"_token": token,
				"id": id,
			},
			success: function(result) {
				switch(result) {
					case "isNotLogin":
						window.location.href = "/login";
						break;
					case "isNotExist":
						swal("Game", "Game does not exist!", "warning");
						break;
					case "isOwned":
						swal("Owned", "You owned this game!", "warning");
						break;
					case "isPublisher":
						swal("Publisher", "Publisher can not buy game!", "warning");
						break;
					case "isInCart":
						swal("Cart", "This game already in cart!", "warning");
						break;
					case "success":
						swal("Cart", "Added to cart!", "success");
						$('#header-icons-noti').load(' #header-icons-noti-item');
						$('#header-cart').load(' #header-cart-detail>*');
						break;
				}
				
			}
		});
	});
});
