<?php
$css=TRUE;
include_once 'dbconnect.php';
include_once 'model.php';

if(isset($_POST['rid']))
{
    $rid = $_POST['rid'];
    if(isset ($_POST['table'])){ $table = $_POST['table'];}
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'requestAccess':   
             if(requestAccess($rid,$table))
             {
                 echo "Your request has been successfully sent to author";
             }
             else{
                 return false;
             }
            break;
        case 'approveRequest':   
           if(approveRequest($rid))
           {
               echo "The changes have now been applied";
           }
           else{
              return false;
           }
            break;
        case 'declineRequest':   
           if(declineRequest($rid))
           {
            echo "The changes have now been applied";
            }
            else{
            return false;
            }
            break;
      
        
        default:
            # code...
            break;
    }
// $id=$_POST['id'];


// $table=$_POST['table'];
// $query="Select * from `$table` where RID='$id'";
// $result = mysqli_query($GLOBALS['db'],"Select * from `$table` where RID='$id'") or die(mysqli_error($GLOBALS['db']));
// $row = mysqli_fetch_assoc($result);
// if(mysqli_num_rows($result)>0)
// {
// return tablebuildalt($table,$query);
// }
// else 
// {
// 	echo "Oh! cannot find this field in Search";
// }
// }
// else 
// {
	//echo " Invalid Property Id number, please check again. A valid number should be like xxxxxx:xx";
	
}
//print_r($row);
?>