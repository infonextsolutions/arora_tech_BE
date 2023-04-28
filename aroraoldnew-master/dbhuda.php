<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include_once"auth.php";
include_once "config.php";
include_once "dbconnect.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<link rel="stylesheet" type="text/css" href="media/css/template.css" /> 
<link rel="stylesheet" type="text/css" href="media/css/view.css" /> 
<link rel="stylesheet" type="text/css" href="media/css/demo_table.css" media="screen" />
 <?php
 
$count=NULL;
$rej=NULL;
$update=NULL;
function remove_non_numeric($string) {
 	$string=strtoupper($string);
 	$pattern[0] = '/P/';
 	$pattern[1] = '/SP/';
   $pattern[2] = '/-/';
 	$replacement[0] ='';
 	$replacement[1] ='';
	$replacement[0] ='';

return preg_replace($pattern,$replacement, $string);
}
function delete_huda($part1,$part2)
{
	
	$part1=trim($part1);
	$part2=trim($part2);
	$query ="delete from hudalist where sectorno='$part1' and plotno='$part2'";
	//echo $query;
	$size = mysqli_query($GLOBALS['db'],$query);
	$rowcnt=mysqli_fetch_array(mysqli_query($GLOBALS['db'],"select row_count()"));
	//echo $rowcnt['row_count()'];
	
	//echo "value".$size."\n";
	if($rowcnt['row_count()']) {
		return 1;
	}
	
	}
function insert_huda($part1,$part2,$part3)
{
	
	$part1=trim($part1);
	$part2=trim($part2);
	$query ="select size from maplocation where sectorno='$part1' and plotno='$part2'";
	$size = mysqli_query($GLOBALS['db'],$query);
	if($size!=NULL) {
   $row = mysqli_fetch_array($size);
   $siz=$row['size'];
//	print_r ($row);
	
	
   $query =mysqli_query($GLOBALS['db'],"Insert into hudalist (sectorno,plotno,area,name) values ('$part1','$part2','$siz','$part3')");
	return 1;
	}
	else {
		
	echo "Sector no".$part1." Plot No ".$part2." Address ".$part3."  Doesnt Exist in the Master Database.";
		
	}
	
	
	}
	?>
<body id="main_body" >
<!-- Begin Wrapper -->
<div id="wrapper">
   
         <!-- Begin Header -->
<div id="header">
		 
 <a href="index.php"><h3>Arora RealTech </h3><h4>Property Management System</h4></a>	
  
 <p class="signature" >User: <?php if(empty($getuser[0]['first_name']) || empty($getuser[0]['last_name']))
	{echo $getuser[0]['username'];} else {echo $getuser[0]['first_name']." ".$getuser[0]['last_name'];} ?> 
	</p>
	<a href="index.php" >Home</a><hr />		   
  </div>
<?php
if (isset($_POST['submit'])) {
	//print_r($_FILES['filename']['tmp_name']);
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<br /><h2>" . "File ". $_FILES['filename']['name'] ." uploaded successfully.Import will now Start" . "</h2><hr />";
		
		
	}


$file_handle = fopen($_FILES['filename']['tmp_name'], "rb");
?>
<h2 align="center">  Rejected Records </h2>
<table align="center" class="sortable" border="1">
<tr>
<th>sectorno</th><th>Plotno</th> <th>Address</th> 
</tr>
<?php 
while (!feof($file_handle) ) {
	
$line_of_text = fgets($file_handle);
if(!$line_of_text=="") {
$parts = explode('$$', $line_of_text);
if ((preg_match('|^\s*\z|', $parts[0])) OR(preg_match('|^\s*\z|', $parts[1])) ){
$rej=$rej+1;	
?>
<tr>
<td><?php print $parts[0]; ?></td>

<td><?php 

$str=$parts[1];

print $str;?></td>
<td><?php print $parts[2];?></td>
</tr>

<?php
}
else {
	
	
	$str=remove_non_numeric($parts[1]);
	$update=delete_huda($parts[0],$str)+$update;
	$count=insert_huda($parts[0],$str,$parts[2])+$count;
	}
}
	}
?>
</table>

<?php
echo"<br /><br /><table border='1' class='sortable' align='center' cellpadding='3'>
<tr><th>REPORT FOR THE INSERTS</th><th>Totals</th></tr>";

echo "<tr><td>Total Inserted</td><td>".($count - $update)."</td></tr>";
echo "<tr><td>Total Rejected</td><td>".$rej."</td></tr>";
echo "<tr><td>Total Updated</td><td>".$update."</td></tr></table>";
fclose($file_handle);

}else {
 
	
	 print "<br /><h2>Populate Huda list by browsing to file and clicking on Upload</h2><hr />\n";
 
	print "<form enctype='multipart/form-data' action='dbhuda.php' method='post'>";
 
 print"<div id='form_container'>";
	print "<h2>File name to import:<br />\n";
 
	print "<input size='50'  type='file' name='filename'><br />\n";
 
	print "<input type='submit' class='btn btn-outline-primary' name='submit' value='Upload'></form>";
	print"</div>";
 
}


?>
</div>
</body>