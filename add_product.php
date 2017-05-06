<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
	<?php include 'insert.php';	?>
<body>
	<div class="container">
		
		<?php include 'nav.php'; ?>

		<div class="content">
			<form action="add_product.php" method="post">
				product name:<br>
			  <input type="text" name="name">
			  <br>
			  	product price:<br>
			  <input type="text" name="price">
			  <br><br>
			  <input type="submit" value="Submit" name="product_submit">
			</form>
		</div>
	</div>
</body>
</html>