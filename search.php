<?php

	$db = new database('root','root','unsafedb');

	if(isset($_POST['search'])){

		$test = $_POST['search'];

		//test
		$res = $db->run_query_find_all( "SELECT * FROM product WHERE name LIKE '%$test%'");

		while($product = $res->fetch_assoc()){
			print_r($product);
		}
	}

?>
