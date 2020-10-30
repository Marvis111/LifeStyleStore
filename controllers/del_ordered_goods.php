<?php
include 'server.php';
$q = $_REQUEST['q'];

$prduct_id = $q;
$username = $_SESSION['username'];
$sql = "DELETE FROM OrderTB_user_$username WHERE ID = '$prduct_id' ";

mysqli_query($conn,$sql);