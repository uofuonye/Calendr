<html>
	<head>
		<meta charset="UTF-8">
		<title> My Calendar </title>
		<link rel= "stylesheet" type = "text/css" href = "AdRotator.css"/>
		<title>Login Page</title>
	</head>

	<body>
		<script type="text/javascript" src= "AdRotator.js"></script>
		<div>
			<nav>
				<a href= "ofuon001calendar.php"> Calendar</a> &nbsp;
				<a href= "input.php"> Input</a>&nbsp;
				<a href= "admin.php"> Admin</a>  
			</nav>
		</div>
		<div >
			<h1>Admin Page</h1>
		</div>
		<h2 style="color:gold; text-align:center;" >Welcome <?php echo $username; ?> <br> 
			<a href = "logout.php">Sign Out</a>
		</h2>
		<div id= 'spaceMe'></div>
		<h2 style="color:gold; text-align:center;"> List of Users</h2>
		<p style= "color:maroon;text-align:center;"> <?php echo $message; ?></p> <br>
		<div>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Login</th>
					<th>New Password</th>
					<th>Action</th>
				</tr>
				<?php foreach($accounts as $account) : ?>
					<?php if($mode=='EDIT' && $account['acc_id']==$edit_id) { ?>
						<tr>
							<td><?php echo $account['acc_id'];?></td>
							<form action= "", method = "POST" id = "edit_form"></form>	
							<td>
								<input type="text" name ="name" value="<?php echo $account['acc_name'];?>" form ="edit_form" >
							</td>
							<td>
								<input type= "text" name ="login" value="<?php echo $account['acc_login'];?>" form ="edit_form" >
							</td>
							<td>
								<input type= "password" name = "password" value="<?php echo "";?>" form ="edit_form" >
							</td>
							<td> 						
								<input type="hidden" name= "id" value= "<?php echo $account['acc_id'];?>" form ="edit_form">
								<input type="submit" name= "action" value= "Update" form ="edit_form">
								<input type="submit" name= "action" value = "Cancel" form ="edit_form">										
							</td>
						</tr>
					<?php } else {?>
						<tr>
							<td><?php echo $account['acc_id'];?></td>
							<td><?php echo $account['acc_name'];?></td>
							<td><?php echo $account['acc_login'];?></td>
							<td><?php echo "";?></td>
							<td> 
								<form action= "" method = "POST">
									<input type="hidden" name= "id" value= "<?php echo $account['acc_id'];?>">
									<input type="submit" name= "action" value= "Edit">
									<input type="submit" name= "action" value = "Delete">
								</form>							
							</td>
						</tr>
					<?php } ?>	
				<?php endforeach ; ?>		
			</table>	
		</div>
		<br><br>
		<h2 style="color:gold; text-align:center;"> Add New Users</h2>
		<div>
			<form action ="", method = "POST"> 
				<label>Name</label>
				<input type="input" name = "name" required> <br>
				<Label>Login</Label>
				<input type="input" name = "login" required> <br>
				<label>Password</label>
				<input type= "password" name = "password" required><br><br>
				<input type="hidden" name ="action" value= "Add">
				<input type = "submit"  value = "Add User">
			</form>
		</div>
	</body>
</html>
