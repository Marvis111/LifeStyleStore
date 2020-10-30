<?php
date_default_timezone_set('Africa/Lagos');
session_start();
 $dbServername ='localhost';
$dbUsername="root";
$dbPassword="";
$lifestyle_database = 'lifestyle_store';
 $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$lifestyle_database);


$login_err_Array = array();

//db variables
$sqlQuery=$sql="";
class lifeStyle_user{
	private $username,$user_email,
	$user_address,$user_pwd,$user_comf_pwd;

	private function validate_user_name($username){
		if (!empty($username)) {
			$username = trim($username);
			$username = htmlspecialchars($username);
			$username = stripslashes($username);
			return true;
		}else{
			array_push($GLOBALS['login_err_Array'], 'Username is required.');
			return false;
		}
	}
	private function validate_user_email($user_email){
		if (!empty($user_email)) {
			if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
				array_push($GLOBALS['login_err_Array'], 'Invalid Email address');
				return false;
			}else{
				return true;
			}
		}else{
			array_push($GLOBALS['login_err_Array'], 'Email is required.');
			return false;
		}
	}

	private function validate_user_address($user_address){
		if (!empty($user_address)) {
			$user_address = trim($user_address);
			$user_address = htmlspecialchars($user_address);
			$user_address = stripslashes($user_address);
			return true;
		}else{
			array_push($GLOBALS['login_err_Array'], 'User address is required.');
			return false;
		}

	}
	private function validate_user_pwd($user_pwd,$user_comf_pwd){
		if (!empty($user_comf_pwd) && !empty($user_pwd)) {
			if ($user_pwd == $user_comf_pwd) {
				return true;
			}else{
				array_push($GLOBALS['login_err_Array'], 'Password Mismatched.');
				return false;
			}
		}else{
			array_push($GLOBALS['login_err_Array'], 'Password is required.');
			return false;
		}
	}


	 function __construct($username,$user_email,$user_address,$user_pwd,$user_comf_pwd){
	 	if ( $this->validate_user_name($username) && 
	 		 $this->validate_user_email($user_email) &&
	 		 $this->validate_user_address($user_address)&& 
	 		 $this->validate_user_pwd($user_pwd,$user_comf_pwd)) {
	 		$user_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);
	 		$GLOBALS['sql'] = "INSERT INTO user_login(user_name,user_email,user_address,user_password)
	 			values('$username','$user_email','$user_address','$user_pwd') ";
	 			$GLOBALS['sqlQuery'] = mysqli_query($GLOBALS['conn'],$GLOBALS['sql']);
	 			$_SESSION['username'] = $username;

	 		//create user order table...
	 		$GLOBALS['sql'] = "CREATE TABLE OrderTB_user_$username(
	 		ID INT(250) PRIMARY KEY AUTO_INCREMENT,
	 		ordered_goods varchar(250) not null,
	 		goods_amt varchar(250) not null  ) ";
	 		mysqli_query($GLOBALS['conn'],$GLOBALS['sql']);

	 			header('location:dashboard.php');
	 	}
	 }

}


/**
 * 
 */
$rowResult = $enc_pwd ="";
$aut_userPwd;
class users{
	private $user_email,$user_pwd;

	private function validate_user_email($user_email){
		if (!empty($user_email)) {
			if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
				array_push($GLOBALS['login_err_Array'], 'Invalid Email Address');
				return false;
			}else{
				return true;
			}
		}else{
				array_push($GLOBALS['login_err_Array'], 'Email is required.');
				return false;
			}
	}

	private function validate_pwd($user_pwd){
		if (!empty($user_pwd)) {
			return true;
		}else{
			array_push($GLOBALS['login_err_Array'], 'Password is required.');
			return false;
		}
	}




	function __construct($user_email,$user_pwd){
		if ($this->validate_user_email($user_email) &&
			$this->validate_pwd($user_pwd) 
	) {
		$GLOBALS['sql'] = " SELECT * FROM user_login where user_email='$user_email' ";
		$GLOBALS['query'] = mysqli_query($GLOBALS['conn'],$GLOBALS['sql']);
		if ($GLOBALS['query']) {
			$GLOBALS['rowResult'] = mysqli_fetch_assoc($GLOBALS['query']);
			$GLOBALS['enc_pwd'] = $GLOBALS['rowResult']['user_password'];
			//echo $GLOBALS['enc_pwd'];
			$GLOBALS['aut_userPwd'] = password_verify($user_pwd,$GLOBALS['enc_pwd']);
			if ($GLOBALS['aut_userPwd'] ==1 ) {
				$_SESSION['username'] = $GLOBALS['rowResult']['user_name'];
				header('location:dashboard.php');
			}else{
				array_push($GLOBALS['login_err_Array'],'Wrong Email/Password combination.');
				return false;
			}
	
		}


				
	  }
	}



}

if (isset($_POST['signIn'])) {
	new lifeStyle_user($_POST['user_name'],$_POST['user_email'],
		$_POST['user_address'],$_POST['user_password'],$_POST['user_Comf_password']);
}

if (isset($_POST['login'])) {
	new users($_POST['user_email'],$_POST['user_pwd']);
}







function get_all_ordered_goods($conn,$username){
	$output = "
	<tr>
    <th>Product Name</th>
    <th>Product Amount</th>
    <th></th>
  </tr>

	";
	$sql = "SELECT * FROM OrderTB_user_$username ";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		while ($row = mysqli_fetch_assoc($query)) {
$output .="

  <tr class='goods_n_amounts'>
    <td>".$row['ordered_goods']."</td>
    <td class='amounts'>".$row['goods_amt']."</td>
    <td class='delete_product'>Remove</td>
    <input type='hidden' value='".$row['ID']."'
  </tr>

				";
		}
		$output .= "
		 <tr class='amount_order'>
  <td  class='total'>Total Amount</td>
   <td class='total_amount'></td>
   <td class='order'>Order Now</td>
  </tr>
		";


		echo $output;
	}
}