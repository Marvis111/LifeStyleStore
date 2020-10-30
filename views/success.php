<?php
	include '../controllers/server.php';
	if (!isset($_SESSION['username'])) {
		header('location:login.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="refrh" content="3">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script src="../assets/js/jquery.ui.min.js"></script>
    	
	<script  src="../assets/js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
   
   <script  src="../assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui-1.12.1/jquery-ui.min.css">
	<title>Life-sTYLE STORE</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/homePage.css">
	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
</head>
<body>
	<div class="loggedInUserDetails">
		<input type="hidden" name="" id="user_name" value="<?php echo $_SESSION['username'] ?>">
	</div>
	<nav class="navbar">
		<div class="sitenate">
			<a href="dashboard.php"><h5>Lifestyle Store</h5></a>
		</div>
		<div class="user_login">

			<div class="signIn">
				<b><a href="cart.php"><i class="icon-shopping-cart" style="font-size: 20px;"></i>Cart</a>
				</b>
			</div>
			<div class="signIn">
				<b><a href=" "><i class="icon-settings" style="font-size: 20px;"></i>Settings</a>
				</b>
			</div>
			<div class="signIn">
				<b><a href="logout.php"><i class="icon-power-off" style="font-size: 20px;"></i> Logout </a>
				</b>
			</div>
		</div>
		<div class="navBar" style="" onclick="navToggle()">
			<h5><i class="icon-bars"></i></h5>
		</div>
	</nav>
	<div class="mobile_signIn">
		<div class="signIn">
				<b><a href="cart.php"><i class="icon-shopping-cart" style="font-size: 20px;"></i>Cart</a>
				</b>
			</div>
			<div class="signIn">
				<b><a href=" "><i class="icon-settings" style="font-size: 20px;"></i>Settings</a>
				</b>
			</div>
			<div class="signIn">
				<b><a href="logout.php"><i class="icon-power-off" style="font-size: 20px;"></i> Logout </a>
				</b>
			</div>


	</div>
	

	<section id="ourGoods">
		<div class="welcome_container">
			<h3>Thank you for Buying!..</h3>
			<h6>Your Goods will be delivered at your door steps soon.</h6>
			<h6  ><B><a href="dashboard.php" style="color: green;">Back to Home <i class="icon-arrow-right"></i></a></B></h6>
		</div>

	</section>

<style type="text/css">
	.mobile_signIn{
		height: 150px;
		cursor: none;
	}
	.welcome_container{
		width: 70%;
		margin-top: 190px;
	}

	@media(max-width:800px ){
		.welcome_container{
		
		margin-top: 200px;
		width: 90%;
	}
@media(max-width:680px ){
		.welcome_container{
		
		margin-top: 200px;
		width: 98%;
	}


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