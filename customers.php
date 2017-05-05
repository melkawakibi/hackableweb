<?php
include 'database.php';
include 'session.php';

	$db = new database('root','root','unsafedb');

	if(!isset($_SESSION['username'])){
		exit(header("Location: index.php"));
	}

?>

<!DOCTYPE html>
<html>
	<?php include 'header.php'; ?>
<body>
	<div class="container">
	
		<?php include 'nav.php'; ?>

		<div class="content">
			<?php
			if(empty($_GET['id'])){
				$customers = $db->run_query_find_all( 'SELECT * FROM customer');

				foreach($customers as $customer){ ?>
					<ul><?php echo '<a href="customers.php?id='. $customer[0] . '">' ?>
							<li><?php printf('name: %s', $customer[1]) ?></li>
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
