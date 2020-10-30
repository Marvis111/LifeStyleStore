<?php
include 'server.php';
$username = $_SESSION['username'];

// get the request data...
$q = $_REQUEST['q'];
//get the individual data
$product_details = explode(',', $q);

$product_name = $product_details[0];
$product_amnt = $product_details[1];

$sql = "DELETE FROM OrderTB_user_$username WHERE ordered_goods = '$product_name' and goods_amt = '$product_amnt' ";
$query = mysqli_query($conn,$sql);