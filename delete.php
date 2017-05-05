<?php
include 'database.php';

	$db = new database('root','root','unsafedb'); 

	if(!empty($_GET['id'])){
		$db->run_query_find_all( 'DELETE FROM product WHERE id=' . $_GET['id']);
		exit(header("Location: products.php"));
	}
?>