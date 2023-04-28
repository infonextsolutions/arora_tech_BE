<?php
$css = 'N';
include_once 'dbconnect.php';
$sectorno = null;
if ($_REQUEST['sector']) {
    $sector = $_REQUEST['sector'];
}
$sectors = explode(",", $sector);
if (count($sectors) > 0) {
    foreach ($sectors as $key => $value) {
        $sectorno .= "SECTORNO = '$value'" . " OR ";
    }
}
//echo $sectorno;
$sectorno = substr($sectorno, 0, -3);
$sql = "select distinct SIZE from maplocation where  $sectorno ORDER BY SIZE";
//echo $sql;
$rsd = mysqli_query($GLOBALS['db'], $sql);
echo '<select class="custom-select col-6" name="area" id="area">';
while ($rs = mysqli_fetch_assoc($rsd)) {



    ?>
    <option value="<?php echo $rs['SIZE']; ?>"><?php echo $rs['SIZE']; ?></option>

<?php



    //     if(is_numeric(substr($cname, 0, 1)))
    //    {echo json_encode($cname);
    //     }
    //     else {

    //     echo "";

    // 	}   
}

echo ' </select>';

?>