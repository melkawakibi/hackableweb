<?php
	
	session_start();
?>
<div class="nav">
	<header>
		<?php
			if(isset($_SESSION['username']) && $_SESSION['role'] == 2){
			echo '<img class="shopcart" src="/img/shoppingcart.png"></img>';
		}
		?>
		<h1>HACKABLEWEB</h1>
	</header>
	
	<ul>
	<li><a href="index.php">Home</a></li>
		<?php
			if(isset($_SESSION['username'])){
				if($_SESSION['role'] == 1){
					echo '<li><a href="products.php">Products</a></li>';
					echo '<li><a href="orders.php">Orders</a></li>';
					echo '<li><a href="customers.php">Customers</a></li>';
					echo '<li>|| ADMIN PANEL</li>';
					echo '<li class="login"><a href="logout.php">logout</a></li>';
					echo '<li class="login">' . $_SESSION['username'] . '</li>';
				}else if($_SESSION['role'] == 2){
					echo '<li>|| CUSTOMER PANEL</li>';
					echo '<li class="login"><a href="logout.php">logout</a></li>';
					echo '<li class="login">' . $_SESSION['username'] . '</li>';
				}
			}else{
				echo '<li class="login"><a href="login.php">login</a></li>';
				echo '<li class="login"><a href="signin.php">sign in</a></li>';
			}
		?>
	</ul>
</div>