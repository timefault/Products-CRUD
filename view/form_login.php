<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - User Login Form
 **/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>User Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
		<link rel="stylesheet" href="styles/login.css" />
	</head>
	<body>
		<a href=".?action=show_add_user_form" class="btn">New User</a>
		<h1 style="text-align: center;">Login</h1>
		<div class="my-container">
			<form action=".?action=login" method="post" >
				<label for="">Username</label>
				<input type="text" id="" name="username" value=""/>
				<label for="">Password</label>
				<input type="text" id="" name="password" value=""/>
				<input type="submit" name="" value="Submit" class="btn" />
			</form>
		</div>
	</body>
</html>