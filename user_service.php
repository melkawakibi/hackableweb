<?php
	session_start();

	$db = new database('root','root','unsafedb'); 
	
	if(isset($_POST['login_submit'])){

		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$res = $db->run_query_num_row( "SELECT * FROM user WHERE username = '$username' and password = '$pass'");
		$user = $db->run_query_find_one( "SELECT role FROM user WHERE username = '$username'");

		if($res){
		    echo '<script> location.replace("index.php"); </script>';
		    $_SESSION['username'] = $username;
		    $_SESSION['role']= $user->role;
		}else{
			echo 'error error error'; 
		}
	}

	if(isset($_POST['signin_submit'])){

		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$account = $_POST['bankaccount'];

		$res = $db->run_query_insert( "INSERT INTO user (username, password, role) VALUES ('$username','$pass', 2)" );

		echo 'this insert';

		$res = $db->run_query_insert( "INSERT INTO customer (name, address, bankaccount ) VALUES ('$name','$address', '$account')" );

		$_SESSION['username'] = $username;
		$_SESSION['role']= 2;
		echo '<script> location.replace("index.php"); </script>';
	}

?>