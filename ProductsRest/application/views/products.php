<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			margin: 0;
			padding: 10px;
		}
		table{
			border: solid thin black;
			width: 100%;
			border-collapse: collapse;
		}
		thead {
			background: silver;
		}
		th, td {
			text-align: center;
			width: 16.66%;
			border: solid thin black;
			border-collapse: collapse;
		}
	</style>
	<title>Courses</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('a').click(function(){
				$(this).closest('form').submit();
			});
		})
	</script>
</head>
<body>
	<h1>Courses</h1>
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Actions</th>
		</thead>
		<?php
			foreach ($products as $product){
				echo "<tr>";
				foreach ($product as $row){
					echo "<td>$row</td>";
				}?>
				<td>
					<a href="/products/show/<?=$product['id']?>">View Details</a>
					<a href="/products/edit/<?=$product['id']?>">Edit Product</a>
					<a href="/products/destroy/<?=$product['id']?>"><button>Remove</button></a>
				</td>
				</tr>
		<?php } ?>
	</table>
	<a href="/products/new_product">Add a new product.</a>
</body>
</html>