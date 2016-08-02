<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title> My Calendar </title>
		<link rel= "stylesheet" type = "text/css" href = "AdRotator.css"/>
		<title>Login Page</title>
	
	</head>

	<body>
		<div>
			<form action = "" method = "post">
				<div><h1> Login page</h1></div>
				<div style= "color:blue;"><?php echo $error; ?></div><br>
				<div >Please enter your user's login name and password. Both values are case sensitive</div><br>
				<label>Login:</label><input type = "text" name = "login" value= "<?php echo htmlentities($login); ?>"/><br><br>
				<label>Password:</label><input type = "password" name = "password"/><br><br>
				<input type = "submit" value = " Submit "/><br />
			</form>			
		</div>

	</body>
</html>
