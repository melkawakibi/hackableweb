<?php
include 'session.php';
include 'insert.php';
	
	$db = new database('root','root','unsafedb'); 	

	if(!isset($_SESSION['username'])){
		exit(header("Location: index.php"));
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Webshop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
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