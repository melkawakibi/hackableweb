<?php
	session_start();
	include 'database.php';
	
	$db = new database('root','root','unsafedb');

	$customer = $db->run_query_find_one( "SELECT * FROM customer where userid=" . $_SESSION['id'] ); 

	$cart = $db->run_query_find_all("SELECT * FROM shoppingcart WHERE customerid='$customer->id'");

	while($c = $cart->fetch_assoc()){

		$amount += ($c['price'] * $c['amount']);				

	}

	$ordername = 'order-' . rand(1, 10000);
		
	$db->run_query_insert("INSERT INTO orders (name, customerid) VALUES ('$ordername', '$customer->id')");

	$order = $db->run_query_find_one("SELECT * FROM orders where name='$ordername'");
	
	$cart->data_seek(0);	
	while($c = $cart->fetch_assoc()){
		
		$name = $c['name'];
		$product_ammount = $c['amount'];
		$product = $db->run_query_find_one("SELECT * FROM product where name='$name'"); 
			
		$res = $db->run_query_insert("INSERT INTO orderdetail (productid, orderid, amount) VALUES ('$product->id', '$order->id', '$product_ammount')");

		if($res){
			$db->run_query_delete("DELETE FROM shoppingcart WHERE customerid='$customer->id'");
		}

	}


	
	$_SESSION['message'] = 'Your order is placed.';
	echo '<script> location.replace("index.php"); </script>';

?>