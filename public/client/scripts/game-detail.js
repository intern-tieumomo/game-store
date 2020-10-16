$(".btn-review").on("click", function() {
    var rating = $("input[name=rating]").val();
    var review = $("textarea[name=review]").val();
    var game_id = $("input[name=game_id]").val();

    $.ajax({
        url: "/reviews",
        type: "POST",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "rating": rating,
            "review": review,
            "game_id": game_id,
        },
        success: function(result) {
            if(result == "success"){
                swal("Review", "Review updated!", "success");
            }
            $('#review').load(' #review-content');
            
        },
        error: function(result){
            var data = result.responseJSON;
            if($.isEmptyObject(data.errors) == false) {
                $.each(data.errors, function (key, value) {
                    switch(key) {
                        case "review":
                            swal("Name", "" + value, "warning");
                            break;
                        case "rating":
                            swal("Birthday", "" + value, "warning");
                            break;
                    }
                });
            }
        }
    });
});