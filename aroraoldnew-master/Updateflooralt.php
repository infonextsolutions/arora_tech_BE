<?php
$css = 'N';
include_once 'dbconnect.php';
//$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to database');
//mysqli_select_db($dbname);
$query = NULL;
//$key=stripslashes($_REQUEST['columnName']);
//$key= str_replace (" ", "",$_REQUEST['columnName']);
//$key=trim($key);


//echo $key;
//$value= stripslashes($_REQUEST['value']);

foreach ($_REQUEST as $key => $value) {
	if ($key != 'id' and $key != 'table') {
		if ($value == '') {
			$value = "-";
		}
		$query .= "`$key`='$value',";
	}
}
$query = substr($query, 0, strlen($query) - 1);
//echo $query;
$where = $_REQUEST['id'];
$table = $_REQUEST['table'];
$querystring = "UPDATE $table SET $query WHERE RID = $where";
//echo $querystring;
$result = mysqli_query($GLOBALS['db'], $querystring);

//echo $query;
if ($result) {


	echo "<div class='alert alert-success'>The Following Record is Updated successful</div>";
} else {
	echo "<div class='alert alert-danger'>An Error has Occurred , please try again </div>";
}
