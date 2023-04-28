<?php
include_once"auth.php";
include_once "config.php";
include_once "dbconnect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<link rel="stylesheet" type="text/css" href="media/css/template.css" /> 
<link rel="stylesheet" type="text/css" href="media/css/view.css" /> 
<link rel="stylesheet" type="text/css" href="media/css/demo_table.css" media="screen" />
</head>


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
$update=Null;

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

//$deleterecords = "TRUNCATE TABLE tablename"; //empty the table of its current records
//mysqli_query($GLOBALS['db'],$deleterecords);
 
//Upload File
if (isset($_POST['submit'])) {
	//print_r($_FILES['filename']['tmp_name']);
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<br /><h2>" . "File ". $_FILES['filename']['name'] ." uploaded successfully.Import will now Start" . "</h2>";
		

		//echo "<h2>Displaying contents:</h2>";
		//readfile($_FILES['filename']['tmp_name']);
		
	}
 
	//Import uploaded file to Database
$handle = fopen($_FILES['filename']['tmp_name'], "r");

while (($data=fgetcsv($handle, 1000, ",")) !== FALSE) {

$strrem=remove_non_numeric($data[0]);	
	
$import="INSERT into maplocation(RID,PLOTNO,SECTORNO,SIZE,ROADWID,PARKFACE,CORNERPLOT,DIRECTI) 
		values('','$strrem','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
		
 
		
	if(!mysqli_query($GLOBALS['db'],$import)) {
		
		echo "<div id='error_message_desc'>";
		echo "<strong>The sector no ".$data[1]." Plot no ".$data[0]." is rejected due to ";
		echo mysqli_error($GLOBALS['db']);
		echo "\n";
		echo "</strong></div>";
		
	}
	else {
		$update=$update+1;
		}		
		
		
	}
 
	fclose($handle);
 
print "<h1>Import done</h1>";
echo"<br /><br /><table border='1' class='sortable' align='center' cellpadding='3'>
<tr><th>REPORT FOR THE INSERTS</th><th>Totals</th></tr>";

echo "<tr><td>Total Inserted</td><td>".$update."</td></tr></table>";

 
	//view upload form
}else {
 
	 print "<br /><h2>Populate maplocation using csv by browsing to file and clicking on Upload</h2><hr />\n";
 
	print "<div id='form_container'><form enctype='multipart/form-data' action='dbconvert.php' method='post'>";
 
	print "<h2>File name to import:<br />\n";
 
	print "<input size='50'  type='file' name='filename'><br />\n";
 
	print "<input type='submit' class='btn btn-outline-primary' name='submit' value='Upload'></form></div>";
?>

<br />
<table >
<tr >

<p style="font-size:14px">1. Populate the data in the  Excel, in the format as shown below.</p> 

</tr>

</table>
<table border="1" class="zebra"  cellpadding="3">
<tr style="background-color:#EBEBEB;">
<td>PLOTNO </td> <td>SECTORNO </td><td>SIZE </td><td>ROAD WIDTH </td><td>PARK FACING</td><td>CORNER PLOT</td><td>DIRECTION</td>

</tr>
<tr>
<td>1 </td> <td>23 </td><td>1K </td><td>20M </td><td>Y</td><td>N</td><td>North</td>

</tr>
<tr>
<td>2 </td> <td>23 </td><td>2K </td><td>20M </td><td>Y</td><td>N</td><td>Southeast</td>

</tr>

</table>
<table >
<tr >

<p style="font-size:14px">2. Using the save as option, select save as 'CSV'</p> 

</tr>

</table>

<?php 
}
 
?>


</body>
</html>
