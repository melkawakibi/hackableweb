<?php
	
	session_start();

	if(isset($_SESSION['username'])){
		$login = true;
	}else{
		$login = false;
	}

?>
<div class="nav">
	<header>
		<h1>HACKABLEWEB</h1>
	</header>
	
	<ul>
	<li><a href="index.php">Home</a></li>
		<?php
			if($login){
				echo '<li><a href="products.php">Products</a></li>';
				echo '<li><a href="orders.php">Orders</a></li>';
				echo '<li><a href="customers.php">Customers</a></li>';
				echo '<li>|| ADMIN PANEL</li>';
				echo '<li class="login"><a href="logout.php">logout</a></li>';
			}
			else{
				echo '<li class="login"><a href="login.php">login</a></li>';
			}
		?>
	</ul>
</div>