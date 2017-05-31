<?php
	
	session_start();

	if(isset($_SESSION['username'])){
		exit(header('Location: index.php'));
	}

?>

<!DOCTYPE html>
<html>
	<?php
		include 'header.php'; 
	?>
<body>
	<div class="container">
		<?php 

			include 'nav.php';
			include 'search.php'; 

		?>
		
		<form action="login.php" method="post">
			<h3>Login</h3>
				username:<br>
			  <input type="text" name="username">
			  <br>
			  	password:<br>
			  <input type="password" name="pass">
			  <br><br>
			  <input type="submit" value="Submit" name="login_submit">
		</form>
	</div>
</body>
</html>

<?php 
	include 'user_service.php'; 
?>