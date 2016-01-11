<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cart/Checkout</title>
</head>
<body>
	<h1>Checkout</h1>
	<table>
		<th>Qty.</th>
		<th>Description</th>
		<th>Price</th>
		<?php
			foreach($products as $item){
				$id = $item['id'];?>
				<tr>
					<td><?=$this->session->userdata("cart")[$id]?></td>
					<td><?=$item['description']?></td>
					<td>$<?=$item['price']?></td>
					<td><a href="/products/delete/<?=$item['id']?>">Delete</a></td>
				</tr>
		<?php } ?>
	</table>
	<h4>Total:
	<?php
		$total = 0;
		foreach($products as $item){
			$id = $item['id'];
			$total += $item['price'] * $this->session->userdata("cart")[$id];
		}
		echo $total;
	?></h4>
	<h3>Billing Info</h3>
	<form action="/products/order" method="post">
		<p><input type="text" name="name" placeholder="Name"></p>
		<p><input type="text" name="address" placeholder="Address"></p>
		<p><input type="number" name="card" placeholder="Card Number"></p>
		<input type="submit" value="Order">
	</form>
</body>
</html>