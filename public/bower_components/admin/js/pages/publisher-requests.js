$(document).ready(function() {
	$('.publisher-requests').addClass("active");

	$('.table').on('click', '.action-edit', function(e) {
		e.stopPropagation();
		var element = $(this);
		var id = $(this).data("id");

		Swal.fire({
			title: 'Game Store',
			text: "Change this user to publisher!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, do it!',
			confirmButtonClass: 'btn btn-primary',
			cancelButtonClass: 'btn btn-danger ml-1',
			buttonsStyling: false,
		}).then(function (result) {
			if (result.value) {
				$.ajax({
					url: "publisher-requests",
					type: "POST",
		        	data: {
		        		"_token": $('meta[name="csrf-token"]').attr('content'),
		        		"id": id
		        	},
		        	success: function(result) {
		        		element.closest('td').parent('tr').fadeOut();
		        		Swal.fire({
							type: "success",
							title: 'Game Store',
							text: result,
							confirmButtonClass: 'btn btn-success',
						}); 		
		        	},
		        	error: function(result) {
		        		Swal.fire({
							type: "error",
							title: 'Game Store',
							text: result,
							confirmButtonClass: 'btn btn-success',
						}); 
		        	}
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				Swal.fire({
					title: 'Game Store',
					text: 'User is still waiting to be publisher!',
					type: 'error',
					confirmButtonClass: 'btn btn-success',
				});
			}
		});
	});

	$('.table').on('click', '.action-delete', function(e) {
		e.stopPropagation();
		var element = $(this);
		var id = $(this).data("id");

		Swal.fire({
			title: 'Game Store',
			text: "Delete this request!",
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
					url: "publisher-requests/" + id,
					type: "DELETE",
		        	data: {
		        		"_token": $('meta[name="csrf-token"]').attr('content')
		        	},
		        	success: function(result) {
		        		element.closest('td').parent('tr').fadeOut();
		        		Swal.fire({
							type: "success",
							title: 'Game Store',
							text: result,
							confirmButtonClass: 'btn btn-success',
						}); 		
		        	},
		        	error: function(result) {
		        		Swal.fire({
							type: "error",
							title: 'Game Store',
							text: result,
							confirmButtonClass: 'btn btn-success',
						}); 
		        	}
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				Swal.fire({
					title: 'Game Store',
					text: 'User is still waiting to be publisher!',
					type: 'error',
					confirmButtonClass: 'btn btn-success',
				});
			}
		});
	});
});