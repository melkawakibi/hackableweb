
<?php
if(!empty($_GET['id'])){
		$order = $db->run_query_find_one( 'SELECT * FROM orders where id=' . $_GET['id']);
		$product = $db->run_query_find_one( 'SELECT * FROM product where id=' . $order->productid);
		$orders = $db->run_query_find_all( 'SELECT * FROM orders');
		?>
		<ul> 
			<li><?php printf('name: %s', $order->name) ?></li>
			<li><?php printf('product: %s', $product->name) ?></li>
			<li><?php printf('amount: %s', $order->amount) ?></li>
			<li><?php printf('price: € %s,-', $product->price) ?></li>
			<hr>
			<li><?php printf('total: € %s,-', ($order->amount * $product->price)) ?></li>
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