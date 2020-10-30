<?php

include 'server.php';

$username = $_SESSION['username'];

$sql = " DELETE  FROM OrderTB_user_$username ";
$querry = mysqli_query($conn,$sql);