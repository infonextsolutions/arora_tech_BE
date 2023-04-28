<?php
define ("_0","");
define ("_1","Client");
define ("_2","Dealer");
define ("_3","Buy");
define ("_4","Sell");
define ("_5","Urgent");
define ("_6","Very Urgent");
define ("_7","Work Done");

class Connection {
	private $host= "localhost";
	private $database="amitallocation";
	private $username="root";
	private $password="mx0V7PsS9XkLRct";
	public  $mysqli=NULL;
	
	public function __construct() {
		
		
		$this->mysqli= new mysqli($this->host,$this->username,$this->password,$this->database);
		if($this->mysqli->errno)
		{
			echo "Failed to connect to the database".$this->mysqli->connect_errorno."error".$this->mysqli->connect_error;
				
		}
		else 
		{	
			
			return $this->mysqli;
		}
		
		
	}
}


?>
