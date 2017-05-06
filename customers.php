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
			<?php

			if(empty($_GET['id'])){
				
				$customers = $db->run_query_find_all( 'SELECT * FROM customer');
				
				while ($customer = $customers->fetch_assoc()) {
			?>
					<ul><?php echo '<a href="customers.php?id='. $customer['id'] . '">' ?>
							<li><?php printf('name: %s', $customer['name']) ?></li>
						</a>
						<hr>
					</ul>
			<?php
				}

			}
				include 'customer_detail.php';

			?>
		</div>
	</div>
</body>
</html>
