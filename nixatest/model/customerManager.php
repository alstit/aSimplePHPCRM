<?php
require('customer.php');

class CustomerManager
{
	private $_db;
	
	public function __construct($db)
	{
		$this->_db=$db;
	}
	
	public function create(Customer $customer)
	{
		$q = 'INSERT INTO customer (name, firstname, phone) VALUES (\''.$customer->getName().'\',\''.$customer->getFirstName().'\',\''.$customer->getPhone().'\')';

		$this->_db->query($q);
		echo ('nouveau client  créé ');
	}
	
	public function update($id)
	{
		$sqlQuery='SELECT * FROM customer WHERE id = '.$id;
		$q  = $this->_db->query($sqlQuery);
		
		while($data = $q->fetch(PDO::FETCH_ASSOC))
			{
				$customer[] = new Customer($data);
			}
		return $customer;
			
	}
	
	public function updatedata(Customer $customer, array $updatedata)
	{
		
		
		$temp='';
		$i=0;
		foreach($updatedata as $key => $value)
		{
			if($value!='')
			{
				if ($i>0)
				{
					$temp.=', '.$key.' = \''.$value.'\'';
				}
				else
				{
					$temp.=''.$key.' LIKE \''.$value.'\' 	';
				}
				$i++;
			}
		
		}
		$q = 'UPDATE customer SET '.$temp.' WHERE id='.$customer->getId();
		
	}
	
	public function read($data)
	{
		$sqlQuery='SELECT * FROM customer ';
		//$data = $customer->getAll();
		$customer = [];
		$temp='';
		$i=0;
		foreach($data as $key => $value)
		{
			if($value!='')
			{
				if ($i>0)
				{
					$temp.=' AND '.$key.' LIKE \''.$value.'\'';
				}
				else
				{
					$temp.='WHERE '.$key.' LIKE \''.$value.'\' 	';
				}
				$i++;
			}
		
		}
		$sqlQuery.=$temp;
		//echo $sqlQuery;
		
		$q = $this->_db->query($sqlQuery);
		//$q = $this->_db->query('SELECT * FROM customer WHERE firstname LIKE \'a%\'');
		//$test = 'SELECT * FROM customer WHERE name LIKE \'dupon%\' ';
		//$q = $this->_db->query($test);	
		
		while($data = $q->fetch(PDO::FETCH_ASSOC))
			{
				$customer[] = new Customer($data);
			}
		return $customer;		
		


	}
	
	public function delete( $id)
	{
		
		$this->_db->exec('DELETE FROM customer WHERE id='.$id);
	}
}