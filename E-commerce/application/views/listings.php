<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Products Listing</title>
</head>
<body>
	<h1>Products</h1>
	<a href="/products/view_cart">Your Cart (<?=$this->session->userdata('cart_count')?>)</a>
	<table>
		<th>Description</th>
		<th>Price</th>
		<th>Qty.</th>
		<?php
			foreach($products as $product){ ?>
				<tr>
					<td><?=$product['description']?></td>
					<td>$<?=$product['price']?></td>
					<td><input type="number" name="quantity" form="buy<?=$product['id']?>" value="1" min="1"></td>
					<td>
						<form id="buy<?=$product['id']?>" action="/products/add/<?=$product['id']?>" method="get">
							<input type="submit" value="Buy">
						</form>
					</td>
				</tr>
		<?php } ?>
	</table>
</body>
</html>