<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Survey Form</title>
</head>
<body>
	<form action="/surveys/process_form" method="post">
		<p>Your Name:
		<input type="text" name="name">
		</p>
		<p>Dojo Location:
		<select name="location">
			<option value="Seattle">Seattle</option>
			<option value="San Jose">San Jose</option>
			<option value="Los Angeles">Los Angeles</option>
		</select>
		</p>
		<p>Favorite Language:
		<select name="language">
			<option value="Javascript">Javascript</option>
			<option value="PHP">PHP</option>
			<option value="Ruby">Ruby</option>
		</select>
		</p>
		<p>Comment (optional):</p>
		<textarea name="comment"></textarea>
		<input type="submit" value="Submit">
	</form>
</body>
</html>