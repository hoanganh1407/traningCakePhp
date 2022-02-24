<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'null';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/login_admin_html/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/login_admin_html/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/login_admin_html/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_admin_html/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login_admin_html/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../login_html/images/1bf1dc6a8760790fb55d5c1c48b448cb.png);">
					<span class="login100-form-title-1">
						Reset Pass
					</span>
				</div>
                <?= $this->Form->create(null,['class' => 'login100-form validate-form']) ?>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">New Pass</span>
						<input class="input100" type="text" name="password" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Confirm
						</button>
					</div>
                <?= $this->Form->end() ?>  
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="/login_admi_html/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/login_admi_html/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/login_admi_html/vendor/bootstrap/js/popper.js"></script>
	<script src="/login_admi_html/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/login_admi_html/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/login_admi_html/vendor/daterangepicker/moment.min.js"></script>
	<script src="/login_admi_html/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/login_admi_html/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/login_admi_html/js/main.js"></script>

</body>
</html>