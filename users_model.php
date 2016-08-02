<?php
	require_once('databaseHW8S16.php');
	//connect to db
	$db = mysqli_connect($db_servername,$db_username,$db_password,$db_name, $db_port);
	if(mysqli_connect_errno())
	{
		$error = 'mysqlerror';
	}
	
	function getAccounts()
	{
		global $db;
		$query = "SELECT * FROM tbl_accounts";
		$result = mysqli_query($db,$query);
		$count = mysqli_num_rows($result);
		$accounts = array();
		while($row=mysqli_fetch_assoc($result))
		{	
			$accounts []= $row;
		}
		return $accounts;
	}
	
	function update($id, $name, $login, $password)
	{
		global $db;
		if(loginAvailable($login))
		{
			$query = "UPDATE tbl_accounts SET acc_name ='$name', acc_login ='$login', acc_password ='". sha1($password) . "' WHERE acc_id='$id'";
			$result = mysqli_query($db,$query);
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function delete($id)
	{
		global $db;
		$query = "DELETE FROM tbl_accounts WHERE acc_id='$id'";
		$result = mysqli_query($db,$query);
	}
	
	function add($name, $login, $password)
	{
		global $db;
		if (loginAvailable($login))
		{	
			$query = "INSERT INTO tbl_accounts (acc_name, acc_login, acc_password) VALUES ('$name', '$login', '". sha1($password)."')";
			$result = mysqli_query($db,$query);
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function loginAvailable($login)
	{
		global $db;
		$query = "SELECT * FROM tbl_accounts WHERE acc_login='$login'";
		$result = mysqli_query($db,$query);
		$count = mysqli_num_rows($result);
		if($count>=1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

?>
