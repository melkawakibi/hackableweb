<!DOCTYPE html>
<html>
	<?php 
		include 'header.php'; 
		include 'login_service.php';
	?>
<body>
	<div class="container">
	<?php include 'nav.php'; ?>
		<form action="login.php" method="post">
				username:<br>
			  <input type="text" name="username">
			  <br>
			  	password:<br>
			  <input type="password" name="pass">
			  <br><br>
			  <input type="submit" value="Submit" name="submit">
		</form>
	</div>
</body>
</html>