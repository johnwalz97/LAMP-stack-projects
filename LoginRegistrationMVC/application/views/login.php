<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login/Registration</title>
	<style>
		input {
			display: block;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h1>Login</h1>
	<?=$this->session->flashdata('errors')?>
	<form action="/users/login" method="post">
		<input type="email" name="email" placeholder="Email" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" value="Login">
	</form>
	
	<h1>Register</h1>
	<?=validation_errors()?>
	<form action="/users/register" method="post">
		<input type="text" name="first_name" placeholder="First Name" required>
		<input type="text" name="last_name" placeholder="Last Name" required>
		<input type="email" name="email" placeholder="Email" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="password" name="passconf" placeholder="Confirm Password" required>
		<input type="submit" value="Register">
	</form>
</body>
</html>