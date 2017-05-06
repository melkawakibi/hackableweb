<?php
	session_start();

	$db = new database('root','root','unsafedb'); 
	
	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$res = $db->run_query_num_row( "SELECT * FROM user WHERE username = '$username' and password = '$pass'");

		if($res){
		    echo '<script> location.replace("index.php"); </script>';
		    $_SESSION['username'] = $username;
		}else{
			echo 'error error error'; 
		}
	}

?>