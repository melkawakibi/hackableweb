<?php
	session_start();

	if(!isset($_SESSION['username'])){
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

				echo '<a href="add_product.php">add product</a>';
				
				$products = $db->run_query_find_all( 'SELECT * FROM product');
				
				while ($product = $products->fetch_assoc()) {
			?>
					<ul><?php echo '<a href="products.php?id='. $product['id'] . '">' ?>
						<li><?php printf('name: %s', $product['name']) ?></li>
						<li><?php printf('price: € %s,-', $product['price']) ?></li>
						</a>
						<hr>
					</ul>
			<?php
				}

			}
				include 'product_detail.php';

			?>
		</div>
	</div>
</body>
</html>