$('.btn-update-user-profile').click(function() {
	var name = $('input[name=name]').val();
	var birthday = $('input[name=birthday]').val();
	var phone = $('input[name=phone]').val();
	var address = $('input[name=address]').val();
	var token = $('input[name=_token]').val();

	$.ajax({
		url: "/user-profile",
		type: "POST",
		data: {
			"_token": token,
			"name": name,
			"birthday": birthday,
			"phone": phone,
			"address": address,
		},
		success: function(result) {
			if(result == "success"){
				swal("Profile", "Profile updated!", "success");
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
	                	case "birthday":
	                		swal("Birthday", "" + value, "warning");
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

$('.btn-change-password').click(function() {
	var current_password = $('input[name=current_password]').val();
	var new_password = $('input[name=new_password]').val();
	var confirm_new_password = $('input[name=confirm_new_password]').val();

	$.ajax({
		url: "change-password",
		type: "POST",
		data: {
			"_token": $('meta[name="csrf-token"]').attr('content'),
			"current_password": current_password,
			"new_password": new_password,
			"confirm_new_password": confirm_new_password
		},
		success: function(result) {
			swal("Game Store", result, "success");
		},
		error: function(result){
	        var data = result.responseJSON;
	        if($.isEmptyObject(data.errors) == false) {
	            $.each(data.errors, function (key, value) {
	                switch(key) {
	                	case "current_password":
	                		swal("Game Store", "" + value, "warning");
	                		break;
	                	case "new_password":
	                		swal("Game Store", "" + value, "warning");
	                		break;
	                	case "confirm_new_password":
	                		swal("Game Store", "" + value, "warning");
	                		break;
	                }
	            });
	        }
	    }
	});
});

$('.btn-update-publisher-profile').click(function() {
	var name = $('input[name=name]').val();
	var phone = $('input[name=phone]').val();
	var address = $('input[name=address]').val();
	var token = $('input[name=_token]').val();

	$.ajax({
		url: "/publisher-profile",
		type: "POST",
		data: {
			"_token": token,
			"name": name,
			"phone": phone,
			"address": address,
		},
		success: function(result) {
			if(result == "success"){
				swal("Profile", "Profile updated!", "success");
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

$(document).ready(function() {
	var $paymentHistory = $(".payment-history-detail");
	var pagination = $('.pagination');
	pagination.hide();
	var $li = $(".next-page");

	$(".view-more").click(function() {
		var link = $("a[rel='next']").attr("href");
		if (typeof link !== "undefined") {
		    $.get(link, function(response) {
		    	$('.pagination').remove();
				$paymentHistory.append(
				    $(response).find(".payment-history-detail").html()
				);
				$('.pagination').hide();
				$li.remove();
		    });
		} else {
			$(".view-more").html("That's all <i class='fa fa-smile-o' aria-hidden='true'></i>");
		}
	});

	var $publishHistory = $(".publish-history-detail");

	$(".view-more-publish").click(function() {
		var link = $("a[rel='next']").attr("href");
		if (typeof link !== "undefined") {
		    $.get(link, function(response) {
		    	$('.pagination').remove();
				$publishHistory.append(
				    $(response).find(".publish-history-detail").html()
				);
				$('.pagination').hide();
				$li.remove();
		    });
		} else {
			$(".view-more-publish").html("That's all <i class='fa fa-smile-o' aria-hidden='true'></i>");
		}
	});
});
