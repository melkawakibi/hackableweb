<?php

	if($_SESSION['role'] == 1){
		
	}

	if($_SESSION['role'] == 2){
		
		if(isset($_SESSION['message']))
		{ 
			echo $_SESSION['message']; 
		}
		
		$db = new database('root','root','unsafedb');
		$products = $db->run_query_find_all( 'SELECT * FROM product');
		
		echo '<h3>Products</h3>';

		while ($product = $products->fetch_assoc()) {
			?>
			<ul class="lfloat">
				<?php echo '<li><a href="products.php?id='. $product['id'] . '">' . $product['name'] . '</a></li>'; ?>
				<li><?php printf('price: € %s,-', $product['price']) ?></li>
				<?php echo '<li><a href="shopping_product.php?id='. $product['id'] . '">add</a></li>';?>
			</ul>
<?php
		}
	}
?>
