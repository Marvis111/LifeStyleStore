<?php
include 'server.php';

get_all_ordered_goods($conn,$_SESSION['username']);

echo "
<style>
.delete_product{
	color:white;
	font-weight:bolder;
	background: #005580;
	border-radius:10px;
	margin: 5px auto;
	display:flex;
	flex-direction:column;
	text-align:center;
	cursor:pointer;
	width:100px;
	height:35px;

}

.order{
	color:white;
	font-weight:bolder;
	background: green;
	border-radius:10px;
	margin: 5px auto;
	display:flex;
	flex-direction:column;
	text-align:center;
	cursor:pointer;
	width:100px;
	height:35px;
}


</style>

";