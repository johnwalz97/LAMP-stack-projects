<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<title>Courses</title>
</head>
<body>
	<h1>Add a new course</h1>
	<form action="/courses/add" method="post">
		<p style="color: red;">
		<?php if(!empty($this->session->flashdata('message'))){
			echo $this->session->flashdata('message');
		} ?>
		</p>
		<p>Name: <input type="text" name="name" required></p>
		<p>Description: <input type="text" name="description"></p>
		<input class="btn btn-success" type="submit" value="Add">
	</form>
	<h1>Courses</h1>
	<table class="table">
		<thead>
			<th>Course Name</th>
			<th>Description</th>
			<th>Date Added</th>
			<th>Actions</th>
		</thead>
		<tbody>
			<?php
				foreach ($courses as $course){ ?>
					<tr>
						<td><?= $course['name'] ?></td>
						<td><?= $course['description'] ?></td>
						<td><?= $course['created_at'] ?></td>
						<td><a href='/courses/destroy/<?= $course['id'] ?>'>Delete</a></td>
					</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>