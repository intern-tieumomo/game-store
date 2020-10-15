$('.cart-img-product').each(function() {
    var nameProduct = $(this).parent().parent().find('.item-name').html();
    var id = $(this).data('id');

    $(this).on('click', function() {
    	swal({
			title: "Are you sure?",
			text: "Remove " + nameProduct + "?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
		        	url: "/delete-cart-item",
		        	type: "DELETE",
		        	data: {
		        		"_token": $('meta[name="csrf-token"]').attr('content'),
		        		"id": id,
		        	},
		        	success: function(result) {
		        		switch(result) {
		        			case "success":
		        				swal("Cart", nameProduct + " removed!", "success");
		        				$('#header-icons-noti').load(' #header-icons-noti-item');
		        				$('#header-cart').load(' #header-cart-detail>*');
		        				$('tr[data-id=' + id + ']').remove();
		        				$('.m-text21').text("Updating");
		        				break;
		        		}
		        		
		        	}
		        });
			} else {
				swal(nameProduct + " still in your cart");
			}
		});
    });
});

$('.update-cart').each(function() {
	$(this).on('click', function() {
		location.reload();
	});
});
