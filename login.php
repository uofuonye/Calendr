<?php
	include('databaseHW8S16.php');
	include('account.php');
	session_start();
	$login ='';
	$error = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	   
		if (!empty($_POST['login']) && !empty($_POST['password']))
		{
			// get login and password from the form
			$login = trim($_POST['login']);
			$password = trim($_POST['password']); 
			if(login($login, $password))
			{
				header("location: ofuon001calendar.php");
			}
			else
			{
				include('login_view.php');
			}
			
		}
		else if(empty($_POST['login']) && !empty($_POST['password']))
		{
			$error = "Please enter a valid value for User Login Field.";
			include('login_view.php');
		}
		else if(!empty($_POST['login']) && empty($_POST['password']))
		{
			$error = "Please enter a valid value for Password Field.";
			include('login_view.php');
		}
		else
		{
			$error = "Please enter a valid value for User Login Field."."<br>".
					 "Please enter a valid value for Password Field";
			include('login_view.php');
		}
	}
	else
	{
		include('login_view.php');
	}
?>
