<?php
if(!empty($_GET['id'])){

		$orders = $db->run_query_find_all( 'SELECT * FROM orders');
		
		$orderdetails = $db->run_query_find_all( 'SELECT * FROM orderdetail where orderid=' . $_GET['id']);

		$order = $db->run_query_find_one( 'SELECT * FROM orders where id=' . $_GET['id']);

		$customer = $db->run_query_find_one( 'SELECT * FROM customer where id=' . $order->customerid);
?>
		<h3><?php printf('Order: %s', $order->name) ?></h3>
		
		<?php if($_SESSION['role'] == 1){ ?>
			<h4><?php printf('Customer: %s', $customer->name) ?></h4>
		<?php
				}
		?>
<?php		
		$products = Array();
		
		while($orderdetail = $orderdetails->fetch_assoc()){

			$product = $db->run_query_find_one( 'SELECT * FROM product where id=' . $orderdetail['productid']);

			$order = $db->run_query_find_one( 'SELECT * FROM orders where id=' . $orderdetail['orderid']);

			array_push($products, $product);

			$total += ($orderdetail['amount'] * $product->price);
?>
			<ul>
			<li><?php printf('product: %s', $product->name) ?></li>
			<li><?php printf('amount: %s', $orderdetail['amount']) ?></li>
			<li><?php printf('price: € %s,-', $product->price) ?></li>
			
			<hr>
			<li><?php printf('sub-total: € %s,-', ($orderdetail['amount'] * $product->price)) ?></li>
			<hr>
		</ul>
<?php
		}

?>
		<ul>
			<p>
			<hr>
			<li><?php printf('total: € %s,-', $total) ?></li>
			<hr>
		</ul>


		<div class="page_nav">
			<ul>
			<?php

				if($order->id > 1){ 
					echo '<li class="prev"><a href="orders.php?id='. ($order->id == 1 ? $order->id :  $order->id-1) . '"> prev</a></li>';
				}

				while($orders->fetch_assoc()){
					$count++;
				}
				
				if($count > $order->id){
					echo '<li class="next"><a href="orders.php?id='. ($order->id+1) . '"> next</a></li>';
				}
			?>
			</ul>
		</div>
	<?php
	}
?>