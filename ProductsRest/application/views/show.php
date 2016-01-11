<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
</head>
<body>
	<h1>Product <?=$id?></h1>
	<p>Name:          <?=$name?></p>
	<p>Description:   <?=$description?></p>
	<p>Price:         <?=$price?></p>
	<a href="/products/edit/<?=$id?>">Edit</a>
	<a href="/">Back</a>
</body>
</html>