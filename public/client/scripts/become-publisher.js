$('.btn-become-publiser').on('click', function() {
    var name = $('input[name=name]').val();
    var phone = $('input[name=phone]').val();
    var address = $('input[name=address]').val();
    var description = $('textarea[name=description]').val();

    $.ajax({
        url: "/publisher-request",
        type: "GET",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "name": name,
            "address": address,
            "phone": phone,
            "description": description,
        },
        beforeSend: function() {
            $('.btn-become-publiser').html("<img src='client/images/infinity.gif'>");
        },
        success: function(result) {
            $('.btn-become-publiser').text('Send');
            if(result == "success"){
                swal("Profile", "Profile updated!", "success");
            }

        },
        error: function(result){
            $('.btn-become-publiser').text('Send');
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
