$('.checkout').click(function() {
	var name = $('input[name=name]').val();
	var card_number = $('input[name=card-number]').val();
	var cvv = $('input[name=cvv]').val();
	var exp_month = $('input[name=exp-month]').val();
	var exp_year = $('input[name=exp-year]').val();

	$.ajax({
		url: "/checkout",
		type: "POST",
		data: {
			"_token": $('meta[name="csrf-token"]').attr('content'),
			"name": name,
			"card-number": card_number,
			"cvv": cvv,
			"exp-month": exp_month,
			"exp-year": exp_year,
		},
		success: function(result) {
			switch(result) {
				case "isNotLogin":
					window.location.href = "/login";
					break;
				case "noGameInCart":
					swal("Cart", "No game in cart!", "warning");
					break;
				case "success":
					window.location.href = "/owned-games";
					break;
			}
			
		},
		error: function(result){
	        var data = result.responseJSON;
	        if($.isEmptyObject(data.errors) == false) {
	            $.each(data.errors, function (key, value) {
	                switch(key) {
	                	case "name":
	                		swal("Name", "" + value, "warning");
	                		break;
	                	case "card-number":
	                		swal("Number on Card", "" + value, "warning");
	                		break;
	                	case "cvv":
	                		swal("CVV", "" + value, "warning");
	                		break;
	                	case "exp-month":
	                		swal("Exp Month", "" + value, "warning");
	                		break;
	                	case "exp-year":
	                		swal("Exp Year", "" + value, "warning");
	                		break;
	                }
	            });
	        }
	    }
	});
});