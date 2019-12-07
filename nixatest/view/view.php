
<h1> Search for a customer </h1>
<p>
use % as wildcare, 
click search to see every entries
<form method = "post" action = "index.php">
	<input type = 'text' name = 'name'> name </br></br>
	<input type = 'text' name = 'firstname'> firstname </br></br>
	<input type = 'text' name = 'phone'> phone number </br></br>
	<input type = 'submit' name = 'search' value = "search">
	<input type = 'submit' name = 'add' value = "add customer">
</form>
</p>



<?php

		
	$manager=new customerManager($bdd);
	
	
	
	if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['phone'])){
		$search['name'] = $_POST['name'];
		$search['firstname'] = $_POST['firstname'];
		$search['phone'] = $_POST['phone'];
	}
	else{
		$search = [];
	}

	if(isset($_POST['add']))
	{
		$customer = new Customer($search);
		$manager->create($customer);
	}
	
	
	

	$customerlist = $manager->read($search);
		
		foreach($customerlist as $customer)
		{
				$customer->echo();
				echo('</br>');
		}
	
?>