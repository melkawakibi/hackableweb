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
		<form action="signin.php" method="post">
			<h3>Sign up</h3>
				username:<br>
			  <input type="text" name="username">
			  <br>
			  	password:<br>
			  <input type="password" name="pass">
			  <br>
			 	 name:<br>
			  <input type="text" name="name">
			  <br>
			 	 address:<br>
			  <input type="text" name="address">
			  <br>
			 	 bankaccount:<br>
			  <input type="text" name="bankaccount">
			  <br><br>
			  <input type="submit" value="Submit" name="signin_submit">
		</form>
	</div>
</body>
</html>

<?php 
	include 'user_service.php'; 
?>