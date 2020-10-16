$('#publish-game-form').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "/publish-game",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            swal("Game Store", result, "success");
        },
        error: function(result){
            swal("Oops!", "Something went wrong", "warning");
        }
    });
});
