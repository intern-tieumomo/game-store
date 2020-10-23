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
            var html = `
                <p class='comment-detail' data-id='${result['id']}'>
                    <i>
                        <b><i class='fa fa-user-circle' aria-hidden='true'></i> ${result['email']}</b> - ${result['updated_at']} &nbsp;<i class='fa fa-pencil-square-o notice' aria-hidden='true' data-toggle='modal' data-target='#update-comment-${result['id']}'></i>
                        <br>
                    </i>
                    <p class='comment-text p-b-25' data-id='${result['id']}'>${result['comment']}</p>
                </p>
                <div class='modal show' id='update-comment-${result['id']}' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-lg'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>${result['modal-title']}</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <textarea class='dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20' id='ta-update-comment' data-id='${result['id']}' name='update_comment' placeholder='${result['ph']}'>${result['comment']}</textarea>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' data-id='${result['id']}' class='delete-comment btn btn-secondary bo-rad-20 s-text1'>${result['delete']}</button>
                                <button type='button' data-id='${result['id']}' class='update-comment btn flex-c-m bg1 bo-rad-20 hov1 s-text1 trans-0-4'>${result['save']}</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('.no-comment').remove();
            $('textarea[name=comment]').val("");
            $('.comments').prepend(html);
            var count_comment = parseInt($('.number-comment').html());
            $('.number-comment').text(count_comment + 1);
        }
    });
});

$(document).on('click', '.delete-comment', function(e) {
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
            var count_comment = parseInt($('.number-comment').html());
            $('.number-comment').text(count_comment - 1);
        }
    });
});

$(document).on('click', '.update-comment', function(e) {
    var id = $(this).data("id");
    var comment = $(this).parent().parent().find('#ta-update-comment').val();

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
