<?php
	
	session_start();
?>

<div class="nav">
	<header>
		<?php
			if(isset($_SESSION['username']) && $_SESSION['role'] == 2){

				$db = new database('root','root','unsafedb');

				$customer = $db->run_query_find_one( "SELECT * FROM customer where userid=" . $_SESSION['id'] );

				$cart_count = $db->run_query_num_row("SELECT * FROM shoppingcart WHERE customerid='$customer->id'");

				echo '<a href="shopping.php"><img class="shopcart" src="/img/shoppingcart.png"></img></a>';

				if($cart_count >= 1){
					echo '<div class="circle"><div id="cart_countid" class="cart_count">' . $cart_count . '</div></div>';
				}
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
					echo '<li><a href="my_orders.php">My Orders</a></li>';
					echo '<li>|| CUSTOMER PANEL</li>';
					echo '<li class="login"><a href="logout.php">logout</a></li>';
					echo '<li class="login">' . $_SESSION['username'] . '</li>';
				}
			}else{
				echo '<li class="login"><a href="login.php">login</a></li>';
				echo '<li class="login"><a href="signin.php">sign up</a></li>';
			}

			echo '<br><br><div class="search">
						<form action="search.php" method="post"> 
	      					<label>search products</label> 
	      					<input name="search" type="text" size="10"> 
	     					<input name="goButton" type="submit" value="go"> 
	   					</form>
   		 		 </div>';
		?>
	</ul>
</div>