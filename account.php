<?php
	include('databaseHW8S16.php');
		//connect to db
	$db = mysqli_connect($db_servername,$db_username,$db_password,$db_name, $db_port);
	if(mysqli_connect_errno())
	{
		$error = 'mysqlerror';
	}
	
	function login($login, $password)
	{
		global $db;
		global $error;
		$hash= sha1($password);
		$sql = "SELECT * FROM tbl_accounts WHERE acc_login = '$login'";
		$result = mysqli_query($db,$sql);

		$row=mysqli_fetch_assoc($result);
		$count = mysqli_num_rows($result);
		// if results match
		if($count == 1) {
			if($hash==$row['acc_password'])
			{
				$user= array();
				$user['id']= 1;
				$user['name']= $row['acc_name'];
				$user['login'] = $login;
				$user['password'] = $password;
				$_SESSION['user']= $user;
				mysqli_free_result($result);
				mysqli_close($db);
				return true;
			}
			else
			{
				$error = "Password is incorrect. Please check the password and try again";
			}
		}
		else {
		 $error = "Login is incorrect. Please check the login and try again";
		}
		
		return false;
	}
	
?>
