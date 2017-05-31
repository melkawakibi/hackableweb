<?php
	session_start();

	$db = new database('root','root','unsafedb'); 
	
	if(isset($_POST['login_submit'])){

		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$res = $db->run_query_find_one( "SELECT password FROM user WHERE username = '$username'");

		$hash = $res->password;

		if(password_verify($pass, $hash)){

			$res = $db->run_query_num_row( "SELECT * FROM user WHERE username = '$username' and password = '$hash'");
			$user = $db->run_query_find_one( "SELECT id, username, role FROM user WHERE username = '$username'");

			if($res){
			    echo '<script> location.replace("index.php"); </script>';
			    $_SESSION['id'] = $user->id;
			    $_SESSION['username'] = $user->username;
			    $_SESSION['role']= $user->role;    
			}else{
				echo 'error error error'; 
			}
			
		}else{
			echo 'credentails are wrong'; 
		}
	}

	if(isset($_POST['signin_submit'])){

		$username = $_POST['username'];
		$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$name = $_POST['name'];
		$address = $_POST['address'];
		$account = $_POST['bankaccount'];

		$res = $db->run_query_insert( "INSERT INTO user (username, password, role) VALUES ('$username','$pass', 2)" );

		$user = $db->run_query_find_one( "SELECT id, username, role FROM user WHERE username = '$username'");

		$res = $db->run_query_insert( "INSERT INTO customer (name, address, bankaccount, userid ) VALUES ('$name','$address', '$account', '$user->id')" );

		$_SESSION['id'] = $user->id;
		$_SESSION['username'] = $user->username;
		$_SESSION['role']= $user->role;

		echo '<script> location.replace("index.php"); </script>';
	}

?>