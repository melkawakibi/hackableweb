<?php

function delete(){ 
	$db->run_query_delete( "DELETE FROM product WHERE id=" . $product->id); 
}