<?php

			if(empty($_GET['id'])){
				
				if($_SESSION['role'] == 1){
					$orders = $db->run_query_find_all( "SELECT * FROM orders");
				}else{
					$current_customer = $db->run_query_find_one( "SELECT * FROM customer WHERE userid=" . $_SESSION['id']);

					$orders = $db->run_query_find_all( "SELECT * FROM orders WHERE customerid =". $current_customer->id); 
				}

				while ($order = $orders->fetch_assoc()) {

				if($_SESSION['role'] == 1){	
					$customer = $db->run_query_find_one( 'SELECT * FROM customer where id=' . $order['customerid']); 
				?>						
						<ul>
							<li><?php echo '<a href="customers.php?id='. $customer->id . '">'; printf('customer: %s', $customer->name); ?></a></li>
						</ul>
				<?php } ?>

					<?php $file; ($_SESSION['role'] == 2 ? $file = 'my_orders.php?id='. $order['id'] : $file = 'orders.php?id='. $order['id']) ?>
					<ul><?php printf('<a href="%s">' , $file); ?>
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