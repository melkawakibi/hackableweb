<?php
	session_start();
	echo session_id();

	$db = new database('root','root','unsafedb'); 
	
	if(isset($_POST['submit'])){

		if(empty($_POST['username']) || empty($_POST['password']) ){
			echo 'Empty fields';
		}

		$username = $_POST['username'];
		$pass = $_POST['pass'];
		echo $username;
		echo $pass;
		// setcookie('username',$username, time()+3600);
		// setcookie('password',$pass, time()+3600);

		$res = $db->run_query_num_row( "SELECT * FROM user WHERE username = '$username' and password = '$pass'");

		if($res){
			$user = $db->run_query_find_one( "SELECT * FROM user WHERE username = '$username'");
			$_SESSION['username']=$user->name;
			$_SESSION['rol']=$user->role;
		    echo '<script> location.replace("index.php"); </script>';
		}else{
			echo 'error error error'; 
		}
	}

?>