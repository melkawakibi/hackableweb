<?php

	$db = new database('root','root','unsafedb'); 	
	
	if(isset($_POST['product_submit'])){

		if(empty($_POST['name']) || empty($_POST['price']) ){
			echo 'Empty fields';
		}else{

			$name = $_POST['name'];
			$price = $_POST['price'];


			$res = $db->run_query_insert( "INSERT INTO product (name, price) VALUES ('$name','$price')" );

			if($res){
				echo '<script> location.replace("index.php"); </script>';
			}else{
				echo 'error error';
			}
		}
	}

	if(isset($_POST['order_submit'])){

		if(empty($_POST['name']) || empty($_POST['price']) ){
			echo 'Empty fields';
		}

		$username = $_POST['username'];
		$pass = $_POST['pass'];


		$res = $db->run_query_insert( "" );
	}

?>