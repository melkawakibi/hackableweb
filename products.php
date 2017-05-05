<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
<body>
	<div class="container">
		
		<?php include 'nav.php'; ?>

		<div class="content">
			<?php

			if(empty($_GET['id'])){

				echo '<a href="add_product.php">add product</a>';
				
				$products = $db->run_query_find_all( 'SELECT * FROM product');

				foreach($products as $product){ ?>
				<ul><?php echo '<a href="products.php?id='. $product[0] . '">' ?>
					<li><?php printf('name: %s', $product[1]) ?></li>
					<li><?php printf('price: € %s,-', $product[2]) ?></li>
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
