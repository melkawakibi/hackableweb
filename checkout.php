<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
<body>
	<div class="container">
		
		<?php include 'nav.php'; ?>

		<div class="content">
			
			<h3>Checkout</h3>

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
						$count ++;
					}
				?>	

				<table class="checkout_tb">
					<tr>
						<th>Amount |</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><?php echo $count . ' products |'?></td>
						<td><?php printf('€%s,-',$total) ?></td>
					</tr>
				</table>
				<p>Are you done shopping?</p>
				<a href="index.php">Continue shopping</a> | <a href="orderproces.php">Place order</a>
		</div>
	</div>
</body>
</html>

