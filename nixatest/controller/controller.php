<?php
require('model\customerManager.php');



function showdb(){

	try 
			{
				$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
				die ('Erreur :'.$e->getMessage());
			}

	require('view\view.php');
}

function delete_customer_view($id)
{
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
			die ('Erreur :'.$e->getMessage());
		}
	$manager = new CustomerManager($bdd);
	$manager->delete($id);
	require('view\delete_customer.php');

}
	
function update_customer_view($id)
{
	require('view\update.php');
}
	

			




?>


