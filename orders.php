<?php
	session_start();

	if(!isset($_SESSION['username'])){
		exit(header('Location: index.php'));
	}else if($_SESSION['role'] != 1){
		exit(header('Location: index.php'));
	}

?>
<!DOCTYPE html>
<html>
	<?php 
		include 'header.php';
		$db = new database('root','root','unsafedb');
	?>
<body>
	<div class="container">
		
		<?php include 'nav.php'; ?>

		<div class="content">
			<?php include 'order_content.php'; ?>
		</div>
	</div>
</body>
</html>