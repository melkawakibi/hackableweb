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

					if(isset($_POST['submit'])){

						$name = $_POST['product_name'];
						$price = $_POST['product_price'];
						$amount = $_POST['product_amount'];
					}

					$cart = $db->run_query_find_all("SELECT * FROM shoppingcart WHERE customerid='$customer->id'");

					while($c = $cart->fetch_assoc()){
						$total += ($c['price'] * $c['amount']);
						?>
						<hr>
						<table>
							<tr>
								<th>name |</th>
								<th>price | </th>
								<th>amount | </th>
								<th>sub total</th>
							</tr>
							<tr>
								<td><?php echo $c['name'] ?></td>
								<td><?php printf('€%s,-', $c['price']) ?></td>
								<td><?php echo $c['amount'] ?></td>
								<td><?php printf('€%s,-', ($c['price'] * $c['amount'])) ?></td>
							</tr>
						</table>
				<?php		
					}
				?>		
						<hr>
						<table>
							<tr>
								<th>Total</th>
							<tr>
							<tr>
								<td><?php printf('€%s,-',$total) ?></td>
							<tr>
						</table>

				<a class="rfloat" href="checkout.php">Check out</a>
		</div>
	</div>
</body>
</html>

