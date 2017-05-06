<?php
	session_start();

	if(!isset($_SESSION['username'])){
		exit(header('Location: index.php'));
	}else if($_SESSION['role'] != 1){
		exit(header('Location: index.php'));
	}

?>
<!DOCTYPE html>
<html>
	<?php 
		include 'header.php';
		$db = new database('root','root','unsafedb');
	?>
<body>
	<div class="container">
		
		<?php include 'nav.php'; ?>

		<div class="content">
			<?php

			if(empty($_GET['id'])){
				
				$orders = $db->run_query_find_all( 'SELECT * FROM orders');
				
				while ($order = $orders->fetch_assoc()) {

				$customer = $db->run_query_find_one( 'SELECT * FROM customer where id=' . $order['customerid']); 
			?>						
					<ul>
						<li><?php echo '<a href="customers.php?id='. $customer->id . '">'; printf('customer: %s', $customer->name); ?></a></li>
					</ul>

					<ul><?php echo '<a href="orders.php?id='. $order['id'] . '">' ?>
						<li><?php printf('name: %s', $order['name']) ?></li>
						</a>

					<p>

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