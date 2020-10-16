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
    		$('textarea[name=comment]').val("");
    		$('#section-comment').load(' #list-comment>*');
    	}
	});
});

$('.delete-comment').on('click', function(e) {
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

$('.update-comment').on('click', function(e) {
	e.stopPropagation();
	var id = $(this).data("id");
	var comment = $('#update-comment').val();

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