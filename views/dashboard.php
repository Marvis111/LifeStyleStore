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
	<meta http-equiv="" content="3">
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
			<h2>Welcome to Lifestyle Store</h2>
			<h6>You dont have to hunt around again, we got you</h6>
		</div>

<div class="buyers_cart">
	<b><a href="cart.php"><i class="icon-shopping-cart"></i></a></b>
</div>


<div class="ourproducts">

	<div class="products">
		<div class="product_img">
			<img src="../assets/images/img8.jpg">
		</div>
		<div class="products_desc">
			<h4>Dell Monitor</h4>
			<h5>30000</h5>
		</div>
		<div class="products_order">
			<h4>Add to Cart</h4>
		</div>

	</div>

	<div class="products">
		<div class="product_img">
			<img src="../assets/images/img3.jpg">
		</div>
		<div class="products_desc">
			<h4>Dell Laptop</h4>
			<h5>20000</h5>
		</div>
		<div class="products_order">
			<h4>Add to Cart</h4>
		</div>

	</div>
<div class="products">
		<div class="product_img">
			<img src="../assets/images/img5.jpg">
		</div>
		<div class="products_desc">
			<h4>Hp Laptop core I9</h4>
			<h5>300000</h5>
		</div>
		<div class="products_order">
			<h4>Add to Cart</h4>
		</div>

	</div>
<div class="products">
		<div class="product_img">
			<img src="../assets/images/slide0.jpg">
		</div>
		<div class="products_desc">
			<h4>Hyundai Buzzing Car</h4>
			<h5>3000000</h5>
		</div>
		<div class="products_order">
			<h4>Add to Cart</h4>
		</div>

	</div>


<div class="products">
		<div class="product_img">
			<img src="../assets/images/img9.jpg">
		</div>
		<div class="products_desc">
			<h4>High Speed Cam</h4>
			<h5>30000</h5>
		</div>
		<div class="products_order">
			<h4>Add to Cart</h4>
		</div>

	</div>






	
</div>




	</section>

<style type="text/css">
	.buyers_cart a{
		color: white;
	}

	.buyers_cart{
		font-size: 20px;
		position: fixed;
		 left: 95%;
		 background:#005580;
		 color: white;
		 padding: 5px 8px;
		 border-radius: 5px;
	
	}
	@media(max-width: 760px ){
		.buyers_cart {
			left: 85%; 
		}
	}


	.mobile_signIn{
		height: 150px;
		cursor: none;
	}
</style>

</body>
<script type="text/javascript">
	$(document).ready(function(){


	})
	/*
	<div class="products">
		<div class="product_img">
			<img src="../assets/images/img9.jpg">
		</div>
		<div class="products_desc">
			<h4>High Speed Cam</h4>
			<h5>#30000</h5>
		</div>
		<div class="products_order">
			<h4>Add to Cart</h4>
		</div>

	</div


	 


	 */
	

	$(document).on('click','.products_order',function(){
		var product_name = $(this).parent('.products').children('.products_desc').children('h4').html();
		var product_amt = $(this).parent('.products').children('.products_desc').children('h5').html();
		var product = $(this);
		var username = $('#user_name').val();
		var products_details = new Array(
			product_name,
			product_amt,
			username
			)

		$.ajax({
			url:'../controllers/order_goods.php?q='+products_details,
			method:'GET',
			success:function(data){

				product.removeClass();
				product.addClass('products_unorder');
				product.children('h4').html('');
				product.children('h4').html('Remove from Cart');
			}
		})
		
		




		
	})

$(document).on('click','.products_unorder',function(){
		var product_name = $(this).parent('.products').children('.products_desc').children('h4').html();
		var product_amt = $(this).parent('.products').children('.products_desc').children('h5').html();
var product = $(this);
		var username = $('#user_name').val();
		var products_details = new Array(
			product_name,
			product_amt,
			username
			)

		$.ajax({
			url:'../controllers/unordered_goods.php?q='+products_details,
			method:'GET',
			success:function(data){
				product.removeClass();
				product.addClass('products_order');
				product.children('h4').html('');
				product.children('h4').html('Add to Cart');
			}
		})
		

	})
	function navToggle(){
	$('.mobile_signIn').slideToggle();
	}



</script>



</html>