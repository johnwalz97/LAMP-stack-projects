<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Course</title>
</head>
<body>
	<h1>Are you sure you want to delete the following course?</h1>
	<p>Name:  <?=$this->input->post('course_name')?></p>
	<p>Description:  <?=$this->input->post('description')?></p>
	<form action="/">
		<input type="submit" value="No">
	</form>
	<form action="/courses/delete" method="post">
		<input type="hidden" name="course_name" value="<?=$this->input->post('course_name')?>">
		<input type="submit" value="Yes! I want to delete this">
	</form>
</body>
</html>