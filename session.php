<?php
	session_start();
		
	if(isset($_SESSION['username'])){
		$user = $_SESSION['username'];
		$logedin = true;
		$rol = $_SESSION['rol'];
	}else{
		$rol = 0;
		$logedin = false;
	}

?>