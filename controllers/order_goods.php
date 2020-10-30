<?php
include 'server.php';
$username = $_SESSION['username'];

// get the request data...
$q = $_REQUEST['q'];
//get the individual data
$product_details = explode(',', $q);

$product_name = $product_details[0];
$product_amnt = $product_details[1];
//CHECK IF THE GOODS HAS ALREADY BEEN ORDERED...
$sql = "SELECT * FROM OrderTB_user_$username where ordered_goods ='$product_name' and goods_amt = '$product_amnt' ";
$query = mysqli_query($conn,$sql);
if ($query) {
	$rowNo = mysqli_num_rows($query);
	if ($rowNo > 0) {
	
	}else{
	$sql = "INSERT INTO OrderTB_user_$username (ordered_goods,goods_amt)
		VALUES('$product_name','$product_amnt') ";
$query = mysqli_query($conn,$sql);
}

}



