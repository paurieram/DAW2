<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="js/main.js"></script> 
		<link rel="icon" type="image/png" href="img/favicon.ico"/>
		<title>Portfoli | login</title>
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/login-bg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">Portfoli</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="log_in.php">
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <div class="container-login100-form-btn m-t-32">
                                <button class="login100-form-btn">Login</button>
                            </div>
						</div>
                        <a href="register.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30 m-t-32">
							Sign Up
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>