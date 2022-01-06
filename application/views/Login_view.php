<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg') ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('Login_v12/images/icons/favicon.ico') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('Login_v12/css/main.css') ?>">
	<!--===============================================================================================-->
	<title>AL-BAHRI | Log in</title>
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v12/images/abcd.jpeg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<div class="login100-form-avatar">
					<img src="Login_v12/images/ab-icon.jpeg" alt="AVATAR">
				</div>
				<span class="login100-form-title p-t-20 p-b-45">
					SMK AL-BAHRI BEKASI
				</span>
				<?php echo form_open('Login/login'); ?>
				<div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>
				<div class="container-login100-form-btn p-t-10">
					<button type="submit" class="login100-form-btn">
						Login
					</button>
				</div>
				<?php echo form_close(); ?>
				<div class="text-center w-full p-t-25 p-b-230">
					<a href="#" class="txt1">
						Forgot Username / Password?
					</a>
				</div>
				<div class="text-center w-full">
					<a class="txt1" href="#">
						Create new account
						<i class="fa fa-long-arrow-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="Login_v12/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v12/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v12/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v12/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v12/js/main.js"></script>
</body>

</html>