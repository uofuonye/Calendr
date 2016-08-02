<?php
	include('databaseHW8S16.php');
	include('users_model.php');
	$message='';
	$mode;
	$edit_id;
	if(isset($_POST['action']))
	{
		$action = $_POST['action'];
	}
	else if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}
	else
	{
		$action = "View";
	}
	
	
	//Start
	if($action == 'View')
	{
		$accounts = getAccounts();
		$message = "";
		$mode='VIEW';
		$edit_id = null;
		include('users_view.php');
	}
	else if($action =='Delete')
	{
		$id = $_POST['id'];
		delete($id);
		$message = "Account deleted Successfully";
		$accounts = getAccounts();
		$mode='VIEW';
		$edit_id = null;
		include('users_view.php');
	}
	else if ($action == 'Edit')
	{
		$accounts = getAccounts();
		$mode = "EDIT";
		$edit_id= $_POST['id'];
		include('users_view.php');
	}
	else if ($action == 'Update')
	{   
		if(!empty($_POST['name']) && !empty($_POST['login'])&& !empty($_POST['password']))
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$login= $_POST['login'];
			$password = $_POST['password'];
		
			if(update($id, $name, $login, $password))
			{
				$message= "Account Updated Successfully";
			} 
			else
			{
				$message= "Could not update account due to duplicate logins!";
			}
		}
		else
		{
			$message = "Name, Login or Password cannot be empty. Please try again!";
		}
		$accounts = getAccounts();
		$mode='VIEW';
		include('users_view.php');
	}
	else if ($action == 'Cancel')
	{
		$accounts = getAccounts();
		$mode= 'VIEW';
		include('users_view.php');
	}
	else if ($action == 'Add')
	{	
		$name = $_POST['name'];
		$login= $_POST['login'];
		$password = $_POST['password'];
		
		if(add($name, $login, $password))
		{
			$message= "Account Added Successfully";
		} 
		else
		{
			$message= "Could not add account due to duplicate logins!";
		}
		$accounts = getAccounts();
		$mode='VIEW';
		include('users_view.php');
	}

?>
