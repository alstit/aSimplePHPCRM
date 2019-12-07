<?php



class Customer
{
	private $_id='';
	private $_name='';
	private $_firstname='';
	private $_phone='';
	
	
	public function __construct(array $data)
	{
		$this->hydrate($data);
	}
	
	public function setName($name)
	{
		$this->_name=$name;
	}
	
	public function setFirstname($firstname)
	{
		$this->_firstname=$firstname;
	}
	
	public function setPhone($phone)
	{
		$this->_phone=$phone;
	}
	
	public function setId($id)
	{
		$this->_id=$id;
	}
	
	
	
	public function hydrate(array $data)
	{
		if(isset($data['name']))
		{
			$this->setName($data['name']);
		}
		if(isset($data['firstname']))
		{
			$this->setFirstname($data['firstname']);
		}
		if(isset($data['phone']))
		{
			$this->setPhone($data['phone']);
		}
		if(isset($data['id']))
		{
			$this->setId($data['id']);
		}
	}
	
	public function getName()
	{
		return $this->_name;
	}	
	public function getFirstname()
	{
		return $this->_firstname;
	}		
	public function getPhone()
	{
		return $this->_phone;
	}	
	
	public function getId()
	{
		return $this->_id;
	}

	public function getAll()
	{
		$data['id'] = $this->getId();
		$data['name'] = $this->getName();
		$data['firstname'] = $this->getFirstname();
		$data['phone'] = $this->getPhone();
		
		return $data;
	}


	public function echoupdate()
	{
		echo($this->getName());
		echo("\t");
		echo($this->getFirstname());
		echo ("\t");
		echo($this->getPhone());
	}
	
	public function echo()
	{
		//echo ($this->getId());
		echo($this->getName());
		echo("\t");
		echo($this->getFirstname());
		echo ("\t");
		echo($this->getPhone());
		$htmlform = '<form form method = \'post\' action = \'index.php?delete=1&id='.$this->getId().'\'>';
		echo ($htmlform);
		//echo "<form form method = \"post\" action = \"index.php?id=".$this->getId()."><input type = \'submit\' name = \'delete\' value = \"delete customer\"> supprimer</form>";
		?>
		<input type = 'submit' name = 'delete' value = "deletecustomer"></form>
	<?php 
		$htmlform = '<form form method = \'post\' action = \'index.php?update=1&id='.$this->getId().'\'>';
		echo ($htmlform);
		//echo "<form form method = \"post\" action = \"index.php?id=".$this->getId()."><input type = \'submit\' name = \'delete\' value = \"delete customer\"> supprimer</form>";
		?>
		<input type = 'submit' name = 'update' value = "updatecustomer"></form>
	<?php }



	
}