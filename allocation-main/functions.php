<?php
function auth() 
{
		if(session_id() == '') {
		    session_start();
		}
	
	if (!isset($_SESSION['user'])) {
		return false;
	}	
	else 
	{
		return true;
	}
}
function getAll($field="*",$table)
{
	include_once 'config.php';
	$connection=new Connection();
	
	$query = "Select ".$field." from ".$table;
	$response = $connection->mysqli->query($query);
	
	if($response->num_rows>0)
	{
		while($row=$response->fetch_assoc())
		{
			$content[]=$row;
		}
		return $content;
	}
}
function getAllWhere($field="*",$table,$where)
{
	include_once 'config.php';
	$connection=new Connection();

	$query = "Select ".$field." from ".$table." where ".$where;
	//var_dump($query);
	$response = $connection->mysqli->query($query);

	if(is_object($response) && $response->num_rows>0)
	{
		while($row=$response->fetch_assoc())
		{
			$content[]=$row;
		}
		return $content;
	}
}
function getAllWhereJoin($field="*",$table, $join,$where)
{
	include_once 'config.php';
	$connection=new Connection();

	$query = "Select ".$field." from ".$table." ".$join." where ".$where;
	//var_dump($query);
	$response = $connection->mysqli->query($query);

	if($response->num_rows>0)
	{
		while($row=$response->fetch_assoc())
		{
			$content[]=$row;
		}
		return $content;
	}
}
function getAllJoin($field="*",$table,$join)
{
	include_once 'config.php';
	$connection=new Connection();

	$query = "Select ".$field." from ".$table." ".$join;
	//var_dump($query);
	$response = $connection->mysqli->query($query);

	if($response->num_rows>0)
	{
		while($row=$response->fetch_assoc())
		{
			$content[]=$row;
		}
		return $content;
	}
}
function insertProperties($type,$description,$client_dealer,$client_dealer_info,$buy_sell,$created_by,$assigned_to=NULL,$rating)
{
	include_once 'config.php';
	$connection = new Connection();
	$query = "INSERT into properties (type,description,client_or_dealer,client_or_dealer_info,buy_sell,created_on)
			  VALUES ('".$type."','".$description."','".$client_dealer."','".$client_dealer_info."','".
					$buy_sell."',NOW())";
	
	

	if($connection->mysqli->query($query))
	{
		$insert_id = $connection->mysqli->insert_id;
		
		$query = "INSERT into properties_postings (properties_id,created_user_id,assigned_user_id,rating)
					values(".$insert_id.",".$created_by.",".$assigned_to.",".$rating.")";
		
		
		if($connection->mysqli->query($query))
		{
			return true;
		}
		else {
			return false;
		}
		
		
	}
	else 
	{
		return false;
	}
							
}
function getProperty($property_id)
{

	return(getAllWhere($field="*",'properties',"id=".$property_id));
	
	
	
}
function getCreatedUserId($property_id)
{
	return (getAllWhere($field="created_user_id",'properties_postings',"properties_id=".$property_id));
}
function getAssignedUserId($property_id)
{
	return (getAllWhere($field="assigned_user_id",'properties_postings',"properties_id=".$property_id));
	}
function getAdminComments($property_id)
{
	return (getAllWhere($field="*",'properties_admin_comments',"property_id=".$property_id));
	
}
function getClientComments($property_id)
{
	return(getAllWhere($field="*",'properties_clients_comments',"property_id=".$property_id));

}
function getPropertiesWorkflows($property_id)
{

	return(getAllWhere($field="*",'properties_workflows',"property_id=".$property_id));
}
function getUserFromId($user_id)
{
	return (getAllWhere($field="*",'users', "id=".$user_id));
}
function getEditButtons($property_type,$property_id=NULL)
{
	
	
	if ( isAdmin() || isCreatedByMe($property_id,$property_type))
	{
		echo "<a href='#' id='form-".$property_type."-".($property_id)."'><i class='pull-right glyphicon glyphicon-pencil'></i></a>";
	}
}
function sanitize($str)
{
	//remove whitespace
	$str=preg_replace('/\s+/', '', $str);
	//lowercase all
	$str = strtolower($str);
	return $str;
}
function insertWorkflow()
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "INSERT into properties_workflows (property_id,description,posted_user_id,created_on
				) value (".$_SESSION['property_id'].",'".$_REQUEST['description']."',".$_SESSION['user']['id'].",NOW())";
	

				
	if($connection->mysqli->query($query))
	{
		return true;
	}
	else 
		return false;
	
}
function insertAdmin()
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "INSERT into properties_admin_comments (property_id,description,posted_user_id,created_on
				) value (".$_SESSION['property_id'].",'".$_REQUEST['description']."',".$_SESSION['user']['id'].",NOW())";



	if($connection->mysqli->query($query))
	{
		return true;
	}
	else
		return false;

}
function insertClient()
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "INSERT into properties_clients_comments (property_id,description,posted_user_id,created_on
				) value (".$_SESSION['property_id'].",'".$_REQUEST['description']."',".$_SESSION['user']['id'].",NOW())";



	if($connection->mysqli->query($query))
	{
		return true;
	}
	else
		return false;

}
function updateProperties($id,$type,$description,$client_dealer,$client_dealer_info,$buy_sell,$created_by,$assigned_to,$rating)
{
	include_once 'config.php';
	$connection = new Connection();
	$query = "UPDATE properties SET type= '".$type."',description='".$description."',client_or_dealer='".$client_dealer."'
				,client_or_dealer_info='".$client_dealer_info."',buy_sell='".$buy_sell."',created_on=NOW() 
				WHERE id=$id";
	if($connection->mysqli->query($query))
	{
		
		$query = "UPDATE properties_postings SET created_user_id='".$created_by."',rating='".$rating."',
					assigned_user_id='".$assigned_to."' WHERE properties_id = '".$id."'";
		if($connection->mysqli->query($query))
		{
			return true;
		}
		else {
			return false;
		}
		
	}
	else
	{
		return false;
	}
			
}
function updateClient($description,$id)
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "UPDATE properties_clients_comments SET description ='". $description."',
				posted_user_id ='". $_SESSION['user']['id']."' ,created_on = NOW()
				WHERE property_id ='". $_SESSION['property_id']."'
				AND id='".$id."'";


	if($connection->mysqli->query($query))
	{
		return true;
	}
	else
		return false;

}
function updateAdmin($description,$id)
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "UPDATE properties_admin_comments SET description ='". $description."',
				posted_user_id ='". $_SESSION['user']['id']."' ,created_on = NOW()
				WHERE property_id ='". $_SESSION['property_id']."'
						AND id='".$id."'";


	if($connection->mysqli->query($query))
	{
		return true;
	}
	else
		return false;

}
function updateWorkflows($description,$id)
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "UPDATE properties_workflows SET description ='". $description."',
				posted_user_id ='". $_SESSION['user']['id']."' ,created_on = NOW()
				WHERE property_id ='". $_SESSION['property_id']."'
						AND id='".$id."'";


	if($connection->mysqli->query($query))
	{
		return true;
	}
	else
		return false;

}
function updateUsers($id,$firstname,$lastname,$contact_number,$email_id,$username,$admin)
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "UPDATE users SET firstname ='".$firstname."',lastname ='".$lastname."',	contact_number ='".$contact_number."',
							email_id ='".$email_id."',
									username ='".$username."',
											admin ='".$admin."'
					WHERE id ='".$id."'";


	
	if($connection->mysqli->query($query))
	{
		return true;
	}
	else{
		return false;
		}
		

}
/**
 * @return boolean
 */
function isAdmin()
{
	
	$id=  $_SESSION['user']['admin'];
	if($id==1)
	{
		return true;
	}
	else 
	{
		return false;
	}
	
}
/**
 * @param unknown $contenttype
 * @param unknown $contentid
 * @return boolean
 */
function isCreatedByMe($contentid,$contenttype)
{
	
	$id=  getUserFromId($_SESSION['user']['id']);
	if ($contenttype=='admin')
	{
		$userid= (getAllWhere($field="*",'properties_admin_comments',"id=".$contentid));
	}
	elseif ($contenttype =='client')
	{
		$userid= (getAllWhere($field="*",'properties_clients_comments',"id=".$contentid));
	}
	elseif ($contenttype == 'workflow')
	{
		$userid= (getAllWhere($field="*",'properties_workflows',"id=".$contentid));
	}
	elseif ($contenttype == 'property')
	{
		if (isAdmin())
		{
		return  true;
		}
		else return false;
	}
	
	//print_r($userid);
	
	if ($userid[0]['posted_user_id'] == $id[0]['id'])
	{
		return true;
	}
	else {return false;}
}
function createUsers($firstname,$lastname,$contact_number,$email_id,$username,$password,$admin)
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	$query = "INSERT into users (firstname,lastname,email_id, contact_number,username,password,admin)
	
	VALUES ('".$firstname."','".$lastname."','".$email_id."','".$contact_number."','".$username."','".md5($password)."','".$admin."')";



	if($connection->mysqli->query($query))
	{
		return true;
	}
	else{
		return false;
	}
}
function getUpdateDate($property_id)
{

	//finc the latest update date
	$admin_comments =getAdminComments($property_id);
	$client_comments = getClientComments($property_id);
	$workflows =getPropertiesWorkflows($property_id);
	$mostRecentAdmin=0;
	$mostRecentClient=0;
	$mostRecentWorkflow=0;
	$now=time();
	//max admin date
	if(isset($admin_comments))
	{
		foreach ($admin_comments as $admin)
		{
			
				$curDate = strtotime($admin['created_on']);
			  if ($curDate > $mostRecentAdmin ) {
			     $mostRecentAdmin = $curDate;
			    
			     
			  }
		}
	}
	//max client
	if(isset($client_comments))
	{
		foreach ($client_comments as $client)
		{
			$curDate = strtotime($client['created_on']);
			if ($curDate > $mostRecentClient) {
				$mostRecentClient = $curDate;
			}
		}
	}	
	//max workflow
	if(isset($workflows))
	{
		foreach ($workflows as $workflow)
		{
						
			$curDate = strtotime($workflow['created_on']);
			
			if ($curDate > $mostRecentWorkflow ) {
				$mostRecentWorkflow = $curDate;
			
			}
		}
	}	
	
	
	/* /* /* echo date('d-m-Y h:m:s',$mostRecentClient);
	echo date('d-m-Y h:m:s',$mostRecentWorkflow);*/
	
	return  max($mostRecentAdmin,$mostRecentClient,$mostRecentWorkflow); 
	
	
}
function getAdminCommentsTotal($property_id)
{
	
}
function getClientCommentsTotal($property_id)
{
	
}
function getWorkflowTotal($property_id)
{
	
}
function changeUsers($id,$firstname,$lastname,$contact_number,$email_id,$username,$password=NULL)
{
	include_once 'config.php';
	session_start();
	$connection = new Connection();
	if($password!=NULL)
	{
	$query = "UPDATE users SET firstname ='".$firstname."',lastname ='".$lastname."',	contact_number ='".$contact_number."',
							email_id ='".$email_id."',
									username ='".$username."'   ,
											password ='".md5($password)."'
					WHERE id ='".$id."'";
	}
	else {
	
	$query = "UPDATE users SET firstname ='".$firstname."',lastname ='".$lastname."',	contact_number ='".$contact_number."',
							email_id ='".$email_id."',
									username ='".$username."' 
					WHERE id ='".$id."'";

	}

	echo $query;
	if($connection->mysqli->query($query))
	{
		return true;
	}
	else{
		return false;
	}

}
function getRating($property_id)
{
	$rating = getAllWhere($field="rating",'properties_postings','properties_id='.$property_id);
	
		return $rating[0]['rating'];
	
}
function displayRating($property_id)
{
	$rating = getAllWhere($field="rating",'properties_postings','properties_id='.$property_id);
	
	if ($rating[0]['rating']==5)
	{
		return ("<span class='label label-warning'><i class='fa fa-exclamation-circle'></i> ".constant('_'.$rating[0]['rating'])."</span>");
	}
	else if($rating[0]['rating']==6)
		return ("<span class='label label-danger'><i class='fa fa-fire'></i> ".constant('_'.$rating[0]['rating'])."</span>");
	else if($rating[0]['rating']==7)
		return ("<span class='label label-success'><i class='fa fa-check-circle'></i> ".constant('_'.$rating[0]['rating'])."</span>");
	else
	{
		return constant('_'.$rating[0]['rating']);
	}
}
function removeWhite($str)
{
	return preg_replace('/\s+/', '', $str);
}

