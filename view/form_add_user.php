<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - New User Creation Form
 **/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Account Registration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
		<!-- <link rel="stylesheet" href="styles/default.css" /> -->
	</head>
	<body>
        <a href="index.php" class="btn btn-primary">Home</a>
        <a href="?action=logout" class="btn btn-secondary">Logout</a>
		<div class="container">
			<header><h2>Create New User</h2></header>
			<form action=".?action=add_user" method="post" >
				<label for="">Username</label>
				<input type="text" id="" name="new_username" value=""/>
				<label for="">Password</label>
				<input type="text" id="" name="new_password" value=""/>
				<input type="submit" name="new_user_submit" value="Submit" class="btn-submit" />
			</form>
		</div>
	</body>
</html>