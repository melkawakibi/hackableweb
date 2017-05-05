<?php
include 'database.php';
include 'session.php';

	$db = new database('root','root','unsafedb');

	if(!isset($_SESSION['username'])){
		exit(header("Location: index.php"));
	}

?>

<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
<body>
	<div class="container">
	
		<?php include 'nav.php'; ?>

		<div class="content">
			<?php
			if(empty($_GET['id'])){
				$orders = $db->run_query_find_all( 'SELECT * FROM orders');

				foreach($orders as $order){ ?>
				<?php $customer = $db->run_query_find_one( 'SELECT * FROM customer where id=' . $order[4]); ?>
				<ul><li><?php echo '<a href="customers.php?id='. $customer->id . '">'; printf('customer: %s', $customer->name); ?></a></li></ul>
				<ul><?php echo '<a href="orders.php?id='. $order[0] . '">' ?>
					<li><?php printf('order name: %s', $order[1]) ?></li>
					<li><?php printf('amount: %s', $order[2]) ?></li>
					<br>
					<?php $product = $db->run_query_find_one( 'SELECT * FROM product where id=' . $order[3]); ?>
					<li><?php echo '<a href="products.php?id='. $product->id . '">'; printf('product: %s', $product->name) ?></a></li>
					</a>
					<hr>
				</ul>
			<?php
				}
			}
				
				include 'order_detail.php';

			?>
		</div>
	</div>
</body>
</html>
