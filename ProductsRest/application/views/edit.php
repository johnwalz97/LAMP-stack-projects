<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
</head>
<body>
	<h1>Edit Product <?=$id?></h1>
	<p style="color: red;">
		<?php if(!empty($this->session->flashdata('message'))){
			echo $this->session->flashdata('message');
		} ?>
	</p>
	<form action="/products/update" method="post">
		<input type="hidden" name="id" value="<?=$id?>">
		<p>Name: <input id="name" type="text" name="name" value="<?=$name?>"></p>
		<p>Description: <input id="description" type="text" name="description" value="<?=$description?>"></p>
		<p>Price: <input id="price" type="text" name="price" value="<?=$price?>"></p>
		<input type="submit" value="Update">
	</form>
	<a href="/products/show/<?=$id?>">Show</a>
	<a href="/">Back</a>
</body>
</html>