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
	<head>
		<meta charset="UTF-8">
		<title> Input form</title>
		<link rel= "stylesheet" type = "text/css" href = "AdRotator.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body>	
		<script type="text/javascript" src= "Adrotator.js"></script>
		<div>
			<nav>
				<a href= "ofuon001calendar.php"> Calendar</a> &nbsp;
				<a href= "input.php"> Input</a>&nbsp;
				<a href= "admin.php"> Admin</a>  
			</nav>
		</div>
		<div>
			<h1> Input Page</h1>
		</div>
		<h2 style="color:gold; text-align:center;" >Welcome <?php echo $username; ?> <br> 
			<a href = "logout.php">Sign Out</a>
		</h2>
		
		<div>
			<input  type="image"  class="prev" src="Images/prev_blue.png" onMouseOver="this.src='Images/prev_orange.png'" onMouseOut="this.src='Images/prev_blue.png'" onclick="moveLeft()"> &nbsp;
			<a href="" target= '_blank'>
				<img  id="banner" height= "365" width = "1000" src="">
				<p id="tooltip"></p>
			</a>&nbsp;
			<input  type="image"  class="next" src="Images/next_blue.png" onMouseOver="this.src='Images/next_orange.png'" onMouseOut="this.src='Images/next_blue.png'" onclick="moveRight()"> &nbsp;
		</div>
		<div id="spaceMe"></div>
		<div>
			<input  type="image"  id="dot0" class="dot" src="Images/bullet_gray.png" 
						onMouseOver="makeOrange(0)" onMouseOut="makeGray(0)" onclick="moveTo(0)"> &nbsp;
			<input  type="image"  id="dot1" class="dot" src="Images/bullet_gray.png" 
						onMouseOver="makeOrange(1)" onMouseOut="makeGray(1)" onclick="moveTo(1)"> &nbsp;
			<input  type="image"  id="dot2" class="dot" src="Images/bullet_gray.png" 
						onMouseOver="makeOrange(2)" onMouseOut="makeGray(2)" onclick="moveTo(2)"> &nbsp;
		</div>
		<div>
			<h1>Input Form for Uche's calendar</h1>
		</div>
		<div class="calform">
			<form method="post" action = "input.html" id ='input'>
			
				<!-- hidden inputs below - no visual inputs that will -->
				<!-- be submitted when the form is submitted -->
				<input type = "hidden" name = "recipient"
					value = "ofuon001@umn.edu">
				<input type = "hidden" name = "subject"
					value = "Input Form">
				<input type = "hidden" name = "redirect"
					value = "http://www-users.cselabs.umn.edu/~ofuon001/">

				<!-- Input from here-->
				<p>
					<label>Event Name:</label>
					<input name = "name" type = "text" required>
				</p>
				<p>
					<label>Sart Time:</label>
					<input name = "start_time" type = "text" required>
				</p>
				<p>
					<label>End Time:</label>
					<input name = "end_time" type = "text" required>
				</p>
				<p>
					<label>Location:</label>
					<input name = "location" type = "text" required>
				</p>
				
				<!-- submit and reset insert buttons for submitting -->
				<!-- and clearing the form's contents				-->
				<p>
					<input type = "submit" value = "Submit">
					<input type = "reset" value = "Clear">
				</p>
			</form>
		</div>
	</body>
</html>
