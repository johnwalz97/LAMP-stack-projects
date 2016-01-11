<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create a new product</title>
</head>
<body>
	<h1>Add a new product</h1>
	<form action="/products/create" method="post">
		<p style="color: red;">
		<?php if(!empty($this->session->flashdata('message'))){
			echo $this->session->flashdata('message');
		} ?>
		</p>
		<p>Name: <input type="text" name="name" required></p>
		<p>Description: <input type="text" name="description"></p>
		<p>Price: <input type="text" name="price"></p>
		<input style="background: green; color: white; border: solid thin black;" type="submit" value="Create">
	</form>
	<a href="/">Go Back</a>
</body>
</html>