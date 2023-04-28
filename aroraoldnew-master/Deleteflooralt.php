<?php
$css = 'N';
include_once 'dbconnect.php';
include_once 'model.php';
$result = null;
$querydel = NULL;
foreach ($_REQUEST['value'] as $key => $value) {
	$querydel .= "RID = " . $value . " OR ";
}
$querydel = preg_replace('/OR $/', '', $querydel);
$query = "DELETE FROM " . $_REQUEST['table'] . " where $querydel ";
$queryOwner = "DELETE FROM recordowner where $querydel";
//echo $query;
//echo canGrantAccess($value, $_REQUEST['table']);
if (canGrantAccess($value, $_REQUEST['table']) && $_REQUEST['table'] != 'maplocation' && $_REQUEST['table'] != 'hudalist') {
	$result = mysqli_query($GLOBALS['db'], $query);
	if (!mysqli_error($GLOBALS['db'])) {
		$result = mysqli_query($GLOBALS['db'], $queryOwner);
		echo "true";
	} else {
		echo "false";
	}
} else {
	echo "false";
}
mysqli_close($GLOBALS['db']);
