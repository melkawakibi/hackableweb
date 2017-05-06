<?php

	if(!empty($_GET['id'])){
		$product = $db->run_query_find_one( 'SELECT * FROM product where id=' . $_GET['id']);
		$products = $db->run_query_find_all( 'SELECT * FROM product');
		

?>
		<ul> 
			<li><?php printf('name: %s', $product->name) ?></li>
			<li><?php printf('price: € %s,-', $product->price) ?></li>
			<hr>
		</ul>

		<div class="page_nav">
			<ul>
			<?php

				if($product->id > 1){ 
					echo '<li class="prev"><a href="products.php?id='. ($product->id == 1 ? $product->id :  $product->id-1) . '"> prev</a></li>';
				}

				while($products->fetch_assoc()){
					$count++;
				}

				if($count > $product->id){
					echo '<li class="next"><a href="products.php?id='. ($product->id+1) . '"> next</a></li>';
				}
			?>
			</ul>
		</div>
	<?php
	}
?>