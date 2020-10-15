var errorEmail = $('#error-email').val();
if (errorEmail != null)
	toastr["error"](errorEmail);

var errorPassword = $('#error-password').val();
if (errorPassword != null)
	toastr["error"](errorPassword);
