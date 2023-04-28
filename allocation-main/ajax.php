<?php
include_once 'config.php';
include_once 'functions.php';
$function = $_REQUEST['function'];
$obj = new Ajax();
switch ($function) 
	{
		
		case "login":
			$obj->login();
			break;
		case "buy":
			$obj->buy();
			break;
		case "sell":
			$obj->sell();
			break;
		case "buy_sell":
			$obj->buy_sell();
			break;
		case "save_buy":
			$obj->save_buy();
			break;
		case "save_sell":
			$obj->save_sell();
			break;
		case "workflow_create":
			$obj->workflow_create();
			break;
		case "admin_create":
			$obj->admin_create();
			break;
		case "client_create":
			$obj->client_create();
			break;
		case "properties":
			$obj->properties();
			break;
		case "properties_admin_comments":
			$obj->properties_admin_comments();
			break;
		case "properties_clients_comments":
			$obj->properties_clients_comments();
			break;
		case "properties_workflows":
			$obj->properties_workflows();
			break;
		case "edit_user":
			$obj->edit_user();
			break;
		case "create_user":
			$obj->create_user();
			break;
		case "change_user":
			$obj->change_user();
			break;

		default:
		echo "no function";
		break;
	}
	
class Ajax {
	
	protected  $mysqli_connect;
	protected  $username;
	protected  $password;
	public function __construct()
		 {
			$this->mysqli_connect=new Connection();	 	
		
		}
		
	/**
	 * login function
	 * 
	 */
	public function login() {
		$this->username = $_REQUEST['username'] ;
		$this->password = md5($_REQUEST['password']);
		$query = "Select id,username,email_id,admin,firstname,contact_number, lastname from users where
					 username='".$this->username."' and password='".$this->password."'";
	
		
		$response= $this->mysqli_connect->mysqli->query($query);
		if ($response->num_rows>0) 
		{
			session_start();
			$_SESSION['user']=$response->fetch_assoc();
			$_SESSION['buy_sell']=1; //for displaying the filters
			
		}	
		else 
		{
			echo "Invalid username/password";
		}
		
	}
	/**
	 * buy filter
	 * 
	 */
	public function buy()
	{
		session_start();
		$_SESSION['buy_sell']=3;
		echo  "true";
	}
	/**
	 * Sell filter
	 */
	public function sell()
	{
		session_start();
		$_SESSION['buy_sell']=4;
		echo  "true";
	}
	public function buy_sell()
	{
		session_start();
		$_SESSION['buy_sell']=1;
		echo "true";
	}
	public function save_sell()
	{
		session_start();
	
		//$type,$description,$client_dealer,$client_dealer_info,$buy_sell,$created_by,$assigned_to=NULL
		$output=insertProperties($_REQUEST['property_type'],$_REQUEST['description'],$_REQUEST['client_dealer'],
				$_REQUEST['info'], $_REQUEST['buy_sell'],$_SESSION['user']['id'],$_REQUEST['handled_by'],$_REQUEST['rating']);
		if($output)
		{
			echo "The new entry has been created";
		}
		else
		{
			return false;
		}
	}
	public function save_buy()
	{
		session_start();
		
		//$type,$description,$client_dealer,$client_dealer_info,$buy_sell,$created_by,$assigned_to=NULL
		$output=insertProperties($_REQUEST['property_type'],$_REQUEST['description'],$_REQUEST['client_dealer'],
						$_REQUEST['info'], $_REQUEST['buy_sell'],$_SESSION['user']['id'],$_REQUEST['handled_by'],$_REQUEST['rating']);
		if($output)
		{
			echo "The new entry has been created";
		}
		else
		{
			return false;
		}
	}
	public function workflow_create()
	{
		
		$output= insertWorkflow($_REQUEST['description']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function admin_create()
	{
	
		$output= insertAdmin($_REQUEST['description']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function client_create()
	{
	
		$output= insertClient($_REQUEST['description']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function properties()
	{
		session_start();
		
		//$type,$description,$client_dealer,$client_dealer_info,$buy_sell,$created_by,$assigned_to=NULL
		$_REQUEST['description']=mysql_escape_string(rtrim($_REQUEST['description']));
		$_REQUEST['info']=mysql_escape_string(rtrim($_REQUEST['info']));
		$output=updateProperties($_REQUEST['id'],$_REQUEST['property_type'],$_REQUEST['description'],$_REQUEST['client_dealer'],
				$_REQUEST['info'], $_REQUEST['buy_sell'],$_SESSION['user']['id'],$_REQUEST['handled_by'],$_REQUEST['rating']);
		
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function properties_admin_comments()
	{
		$_REQUEST['description']=mysql_escape_string(rtrim($_REQUEST['description']));
		$output= updateAdmin($_REQUEST['description'],$_REQUEST['id']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
		
		
	}
	public function properties_clients_comments()
	{
		$_REQUEST['description']=mysql_escape_string(rtrim($_REQUEST['description']));
		$output= updateClient($_REQUEST['description'],$_REQUEST['id']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function properties_workflows()
	{
		$_REQUEST['description']=mysql_escape_string(rtrim($_REQUEST['description']));
		$output= updateWorkflows($_REQUEST['description'],$_REQUEST['id']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function edit_user()
	{
		
		$output= updateUsers($_REQUEST['id'],$_REQUEST['firstname'],$_REQUEST['lastname'],$_REQUEST['contact_number']
							,$_REQUEST['email_id'],$_REQUEST['username'],$_REQUEST['admin']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function change_user()
	{
	
		$output= changeUsers($_REQUEST['id'],$_REQUEST['firstname'],$_REQUEST['lastname'],$_REQUEST['contact_number']
				,$_REQUEST['email_id'],$_REQUEST['username'],$_REQUEST['password']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
	public function create_user()
	{
	
		$output= createUsers($_REQUEST['firstname'],$_REQUEST['lastname'],$_REQUEST['contact_number']
				,$_REQUEST['email_id'],$_REQUEST['username'],$_REQUEST['password'],$_REQUEST['admin']);
		if($output)
		{
			echo "true";
		}
		else
		{
			return false;
		}
	}
}	