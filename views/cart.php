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
			<h2>In  Lifestyle Store</h2>
			<h6>Your Products are safe and are delivered at your door step.</h6>
		</div>


<table>

</table>





	</section>

<style type="text/css">

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin: 20px auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}



	.total_amount,.total{
		font-weight: bolder;

	}
	.mobile_signIn{
		height: 150px;
		cursor: none;
	}
</style>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		get_all_ordered_goods();
		add_ordered_goods_amnt();

		setInterval(()=>{
			get_all_ordered_goods();
		add_ordered_goods_amnt();
		},2000);

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

<tr class='goods_n_amounts'>
    <td>".$row['ordered_goods']."</td>
    <td>".$row['goods_amt']."</td>
    <td class='delete_product'>Remove</td>
    <input type='hidden' value='".$row['ID']."'
  </tr>

				";
		}
		$output .= "
		 <tr >
  <td style='visibility:hidden;' >Amount</td>
   <td class='total_amount'>Amount</td>
   <td class='order'>Order Now</td>
  </tr>

	*/


	$(document).on('click','.order',function(){
		$.ajax({
			url:'../controllers/order_products.php',
			method:'POST',
			success:function(){
				window.location.assign('success.php');
			}
		})
	})

	 function add_ordered_goods_amnt(){
	 	//var total_amt_arena = $('.amount_order');

	 		 $.ajax({
	 		 	url:'../controllers/total_amount.php',
	 		 	method:'POST',
	 		 	success:function(data){
	 		 		$('.total_amount').html(data);
	 		 	}
	 		 })
	 };

 
function get_all_ordered_goods(){
	$.ajax({
		url:'../controllers/get_all_ordered_goods.php',
		method:'POST',
		success:function(data){
			$('table').html(data);
		}
	})
}

$(document).on('click','.delete_product',function(){
	var product_id = $(this).parent('tr').children('input').val();
	$.ajax({
		url:'../controllers/del_ordered_goods.php?q='+product_id,
		method:'GET',
		success:function(data){
			
		}
	})

})




	function navToggle(){
	$('.mobile_signIn').slideToggle();
	}



</script>



</html>