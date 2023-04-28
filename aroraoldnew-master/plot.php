    <?php
include_once"config.php";
include_once"dbconnect.php";
$queryown=null;


//print_r ($_SESSION);

    $query="Select filter  from links where name='HUDA' ";
    //echo $query;
    $result= mysqli_query($GLOBALS['db'],$query);
        while ($row = mysqli_fetch_assoc($result)) {
        	$array=explode(",",$row['filter']);
        	print json_encode($array);
   
    
    }
   
   
    
       ?>
