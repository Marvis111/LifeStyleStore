<?php
include 'server.php';
$username = $_SESSION['username'];

$sql = "SELECT SUM(goods_amt) AS total_amt from OrderTB_user_$username ";
$query = mysqli_query($conn,$sql);

if ($query) {
	while ($row = mysqli_fetch_assoc($query)) {
		echo $row['total_amt'];
	}
}