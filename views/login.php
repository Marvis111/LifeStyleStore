<?php 
	include '../controllers/server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="r" content="3">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script src="../assets/js/jquery.ui.min.js"></script>
    	
	<script  src="../assets/js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
   
   <script  src="../assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui-1.12.1/jquery-ui.min.css">
	<title>Life-sTYLE STORE</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
</head>
<body>
	<nav class="navbar">
		<div class="sitenate">
			<a href="../index.html"><h5>Lifestyle Store</h5></a>
		</div>
		<div class="user_login">

			<div class="signIn">
				<b><a href="signup.php"><i class="icon-person_outline" style="font-size: 20px;"></i>SignUp </a>
				</b>
			</div>
			<div class="signIn">
				<b><a href="login.php"><i class="icon-power-off" style="font-size: 20px;"></i> Login </a>
				</b>
			</div>
		</div>
		<div class="navBar" style="" onclick="navToggle()">
			<h5><i class="icon-bars"></i></h5>
		</div>
	</nav>
	<div class="mobile_signIn">
		<div class="signIn">
				<b><a href="signup.php"><i class="icon-person_outline" style="font-size: 20px;"></i>SignUp</a>
				</b>
			</div>
			<div class="signIn">
				<b><a href="login.php"><i class="icon-power-off" style="font-size: 20px;"></i> Login</a>
				</b>
			</div>

	</div>



	<div class="formDiv">
		<div class="form_login">
			<h3><b>Login</b></h3>
		</div>
		<div class="form">
			<form method="POST" action="login.php">
				<?php 
					include '../controllers/form_err_array.php';
				?>
				<h4>Login to Make A purchase</h4>
				<input type="text" name="user_email" placeholder="Email">
				<input type="password" name="user_pwd" placeholder="Enter your password">
				<button type="submit" name="login">Login</button>
			</form>	

		</div>
		<div class="register">
			<p>Dont have an account? <a href="signup.php">Register</a></p>
		</div>


	</div>


<style type="text/css">
	.form_login_err{
		background: white;
	}
</style>

	
</body>
<script type="text/javascript">
	$(document).ready(function(){


	})

	function navToggle(){
		$('.mobile_signIn').slideToggle();
	}




</script>



</html>