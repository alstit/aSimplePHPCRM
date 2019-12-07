<?php





try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die ('Erreur :'.$e->getMessage());
	}
		
//$customer= new Customer;
$manager = new CustomerManager($bdd);

if(isset($_POST['name']) || isset ($_POST['firstname']) || isset($_POST['phone']))
{

	
		if($_POST['name']!='' && isset($_POST['name'])){
			$updatedata['name'] = $_POST['name'];
		}
		
		if(isset($_POST['firstname'] ) ){
			$updatedata['firstname'] = $_POST['firstname'];
		}
		if(isset($POST['phone'])){
			$updatedata['phone'] = $_POST['phone'];
		}
	$manager->updatedata($customer,$updatedata);
	
	header('Location : index.php');
}


$customerlist = $manager->update($id);
$customer = $customerlist[0];
				$customer->echoupdate();

		

?>

<form method = "post" action = "view/update.php">
	<input type = 'text' name = 'name'> name 
	<input type = 'submit' name = 'nameupdate' value = "nameupdate"></br></br>
	<input type = 'text' name = 'firstname'> firstname 
	<input type = 'submit' name = 'firstnameupdate' value = "firstnameupdate"></br></br>
	<input type = 'text' name = 'phone'> phone number 
	<input type = 'submit' name = 'phoneupdate' value = "phoneupdate"></br></br>
</form>


