$(document).ready(function() {
	$('.account').addClass("active");
	$('input[type=search]').removeClass('form-control-sm');
	$('input[type=search]').removeAttr('placeholder');
	$('.custom-select').css('border', 'none');

	$('.table').on('click', '.action-delete', function(e) {
		e.stopPropagation();
		var element = $(this);
		var id = $(this).data("id");

		Swal.fire({
			title: 'Game Store',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			confirmButtonClass: 'btn btn-primary',
			cancelButtonClass: 'btn btn-danger ml-1',
			buttonsStyling: false,
		}).then(function (result) {
			if (result.value) {
				$.ajax({
					url: "accounts/" + id,
					type: "DELETE",
		        	data: {
		        		"_token": $('meta[name="csrf-token"]').attr('content')
		        	},
		        	success: function(result) {
		        		element.closest('td').parent('tr').fadeOut();
		        		Swal.fire({
							type: "success",
							title: 'Game Store',
							text: 'Account has been deleted!',
							confirmButtonClass: 'btn btn-success',
						}); 		
		        	},
		        	error: function(result) {
		        		Swal.fire({
							type: "success",
							title: 'Game Store',
							text: result,
							confirmButtonClass: 'btn btn-success',
						}); 
		        	}
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				Swal.fire({
					title: 'Game Store',
					text: 'Account is safe!',
					type: 'error',
					confirmButtonClass: 'btn btn-success',
				});
			}
		});
	});

	$('.table').on('click', '.action-edit', function(e) {
		e.stopPropagation();
		var id = $(this).data("id");
		var email = $(this).parent().parent().find('.product-email').html();
		var password = $(this).parent().parent().find('.product-password').data("password");
		var role = $(this).parent().parent().find('.chip-text').data("role");

		$('#data-id').val(id);
		$('#data-email').val(email);
		$('#data-password').val(password);
		$('#data-role').val(role);
		$('#data-email').prop("disabled", true);
		$('#data-password').prop("disabled", true);
		$('.btn-submit').text('Update');
		$(".add-new-data").addClass("show");
		$(".overlay-bg").addClass("show");
	});

	$('.add-data-btn').on('click', function(e) {
		if ($(this).children().text() == "Update") {
			e.stopPropagation();
			var id = $(this).parent().parent().find('#data-id').val();
			var role = $(this).parent().parent().find('#data-role').val();
			var role_text = $(this).parent().parent().find('#data-role option:selected').text();
	 
			$.ajax({
				url: "accounts/" + id,
				type: "PUT",
	        	data: {
	        		"_token": $('meta[name="csrf-token"]').attr('content'),
	        		"role": role
	        	},
	        	success: function(result) {
	        		Swal.fire({
						type: "success",
						title: 'Game Store',
						text: result,
						confirmButtonClass: 'btn btn-success',
					});
					$(".chip-text*[data-id=" + id + "]").text(role_text);
					$(".chip-text*[data-id=" + id + "]").data('role', role);
					$(".chip*[data-id=" + id + "]").removeClass("chip-success chip-warning chip-danger");
					switch(role) {
						case '1':
							$(".chip*[data-id=" + id + "]").addClass("chip-success");
							break;
						case '2':
							$(".chip*[data-id=" + id + "]").addClass("chip-warning");
							break;
						case '9':
							$(".chip*[data-id=" + id + "]").addClass("chip-danger");
							break;
					}
	        	},
	        	error: function(result) {
	        		Swal.fire({
						type: "error",
						title: 'Game Store',
						text: 'Some thing went wrong!',
						confirmButtonClass: 'btn btn-warning',
					});
	        	}
			});
		} else {
			e.stopPropagation();
			var email = $('input[name=email]').val();
			var password = $('input[name=password]').val();
			var role = $('select[name=role]').val();

			$.ajax({
				url: "accounts",
				type: "POST",
	        	data: {
	        		"_token": $('meta[name="csrf-token"]').attr('content'),
	        		"email": email,
	        		"password": password,
	        		"role": role,
	        	},
	        	success: function(result) {
	        		Swal.fire({
						type: "success",
						title: 'Game Store',
						text: 'Account has been Created!',
						confirmButtonClass: 'btn btn-success',
					});

					var table = $('.table').DataTable();
					var roleClass = "chip-success";
					var role = "User";
					if (result.role == 2) {
                    	roleClass = "chip-warning";
                    	role = "Publisher";
                    } else if (result.role == 9) {
                    	roleClass = "chip-danger";
                    	role = "Admin";
                    }
					var row = table.row.add([
						"",
						result.email,
						"********",
						"<div class='chip " + roleClass + "' data-id='" + result.id + "'><div class='chip-body'><div class='chip-text' data-role='" + result.role + "' data-id='" + result.id + "'>" + role + "</div></div></div>",
						"<span class='action-edit' data-id='" + result.id + "'><i class='feather icon-edit'></i></span><span class='action-delete' data-id='" + result.id + "'><i class='feather icon-trash'></i></span>"
					]);
					table.row(row).column(1).nodes().to$().addClass('product-email');
					table.row(row).column(2).nodes().to$().addClass('product-password');
					table.row(row).column(2).nodes().to$().attr('data-password', result.password);
					table.row(row).draw(false);
	        	},
	        	error: function(result) {
	        		Swal.fire({
						type: "error",
						title: 'Game Store',
						text: 'Some thing went wrong!',
						confirmButtonClass: 'btn btn-warning',
					});
	        	}
			});
		}
	});

	$('.btn-outline-primary').on('click', function() {
		$('.btn-submit').text('Add');
		$('#data-email').val("");
		$('#data-password').val("");
		$('#data-role').val(1);
		$('#data-email').prop("disabled", false);
		$('#data-password').prop("disabled", false);
	});
});