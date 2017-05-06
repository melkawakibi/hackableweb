<?php
if(!empty($_GET['id'])){
		$customer = $db->run_query_find_one( 'SELECT * FROM customer where id=' . $_GET['id']);
		$customers = $db->run_query_find_all( 'SELECT * FROM customer');
		?>
		<ul> 
			<li><?php printf('name: %s', $customer->name) ?></li>
			<li><?php printf('address: %s', $customer->address) ?></li>
			<li><?php printf('bank account: %s', $customer->bankaccount) ?></li>
			<hr>
		</ul>

		<div class="page_nav">
			<ul>
			<?php
				if($customer->id > 1){ 
					echo '<li class="prev"><a href="customers.php?id='. ($customer->id == 1 ? $customer->id :  $customer->id-1) . '"> prev</a></li>';
				}

				while($customers->fetch_assoc()){
					$count++;
				}

				if($count > $customer->id){
					echo '<li class="next"><a href="customers.php?id='. ($customer->id+1) . '"> next</a></li>';
				}
			?>
			</ul>
		</div>
	<?php
	}
?>