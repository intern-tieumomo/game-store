<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="{{ asset('client/images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/vendor/toastr/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/css/util.css">
	<link rel="stylesheet" type="text/css" href="bower_components/client/auth/css/main.css">
</head>
<body>
	@yield('content')
	<script src="bower_components/client/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="bower_components/client/auth/vendor/animsition/js/animsition.min.js"></script>
	<script src="bower_components/client/auth/vendor/bootstrap/js/popper.js"></script>
	<script src="bower_components/client/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="bower_components/client/auth/vendor/select2/select2.min.js"></script>
	<script src="bower_components/client/auth/vendor/daterangepicker/moment.min.js"></script>
	<script src="bower_components/client/auth/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="bower_components/client/auth/vendor/countdowntime/countdowntime.js"></script>
	<script src="bower_components/client/vendor/toastr/toastr.min.js"></script>
	<script src="bower_components/client/auth/js/main.js"></script>
	@yield('notification')
</body>
</html>
