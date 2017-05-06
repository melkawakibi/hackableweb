<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
<body>
	<div class="container">
		
		<?php include 'nav.php'; ?>

		<div class="content">
			
			<h3>Shoppingcart</h3>

			<?php
				
				$db = new database('root','root','unsafedb');

				$customer = $db->run_query_find_one( "SELECT * FROM customer where userid=" . $_SESSION['id'] ); 
				$product = $db->run_query_find_one( 'SELECT * FROM product where id=' . $_GET['id']);
				$action = 'shopping.php=' . $_GET['id'];
			?>
				<form action="<?php $action ?>" method="post">
					<table>
						<tr>
							<th>name</th>
							<th>price</th>
							<th>amount</th>
						</tr>
						<tr>
							<td><?php echo '<a href="products.php?id=' . $product->id  . '">' . $product->name . '</a>'; ?></td>
							<td><label name="product_price"><?php printf('€ %s,-', $product->price) ?></td></label>
							<td>
								<input type="number" min="1" name="product_amount">
							</td>
							<td>
								<input type="submit" value="add" name="submit">
							</td>
						</tr>
					</table>
					<input type="hidden" name="product_name" value="<?php echo $product->name; ?>">
					<input type="hidden" name="product_price" value="<?php echo $product->price; ?>">
				</form>

				<?php 

					if(isset($_POST['submit'])){

						$name = $_POST['product_name'];
						$price = $_POST['product_price'];
						$amount = $_POST['product_amount'];

						$db->run_query_insert("INSERT INTO shoppingcart (name, price, amount, customerid) VALUES ('$name','$price','$amount', '$customer->id')");		
					}

					$cart = $db->run_query_find_all("SELECT * FROM shoppingcart WHERE customerid='$customer->id'");

					while($c = $cart->fetch_assoc()){
						?>
						<hr>
						<table>
							<tr>
								<th>name</th>
								<th>price</th>
								<th>amount</th>
								<th>total</th>
							</tr>
							<tr>
								<td><?php echo $c['name'] ?></td>
								<td><?php echo $c['price'] ?></td>
								<td><?php echo $c['amount'] ?></td>
								<td><?php echo ($c['price'] * $c['amount']) ?></td>
							<tr>
						</table>
				<?php		
					}

				?>

				<a class="rfloat" href="checkout.php">Check out</a>
		</div>
	</div>
</body>
</html>

