$('.btn-search-owned-game').on('click', function(){
    var name = $('input[name=name]').val();

    $.ajax({
        url: "/search-owned-games",
        type: "GET",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "name": name,
        },
        success: function(result) {
            $('.result').empty();
            $('.result').append(result);
            console.log(result);
        }
    });
});

$('.block2-btn-addcart').on('click', function(e) {
    e.stopPropagation();
});
