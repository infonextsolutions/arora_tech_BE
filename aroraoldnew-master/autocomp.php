<?php
$css = 'N';
include_once 'dbconnect.php';
$sector = NULL;
$q = strtolower($_REQUEST["q"]);
$table = $_REQUEST['table'];
$fld = $_REQUEST['fld'];
if (!$q) return;
$sql = "select distinct $fld from $table where $fld LIKE '%$q%'";
$rsd = mysqli_query($GLOBALS['db'], $sql);
while ($rs = mysqli_fetch_array($rsd)) {
    $cname[] = $rs["$fld"];
    //echo "$cname\n";
}
echo json_encode($cname);
