<?php
	
	include("databaseHW8S16.php");
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:login.php");
	}
	$username = $_SESSION['user']['name'];
	
?>
<!DOCTYPE html>
<html>
	<?php include('users.php');?>
</html>
