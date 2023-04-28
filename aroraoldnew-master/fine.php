<html>
<?php
$css = "N";
include_once "dbconnect.php";
$temp = null;
session_start();
function sanitise($str)
{
	$str = trim($str);
	$str = strtolower($str);
	$str = htmlspecialchars($str);


	return $str;
}

function saveAuthor($table, $rid)
{
	if (isset($_SESSION['user_id'])) {
		$user = $_SESSION['user_id'];
	}

	mysqli_query($GLOBALS['db'],  "Insert into recordowner (rid,tablename,userid,isauthor) values ('$rid','$table','$user','1')");
}



if (isset($_POST)) {

	if ($_POST['table'] == 'resiplotdeal') {

		$sectorno = sanitise($_POST['sectorno']);
		//$sectorno = preg_replace('/\s+/', '', $sectorno);
		$plotno = sanitise($_POST['plotno']);
		$name = sanitise($_POST['name']);
		$contact = sanitise($_POST['contact']);
		$demand = sanitise($_POST['demand']);
		$offered = sanitise($_POST['offered']);
		$remark = sanitise($_POST['remark']);
		$builtup = sanitise($_POST['builtup']);
		$category = sanitise($_POST['category']);
		if (!isset($_POST['file'])) {
			$_POST['file'] = '-';
		}
		$file = sanitise($_POST['file']);
		$cheque = sanitise($_POST['cheque']);
		$temp = mysqli_query($GLOBALS['db'], "Select size from maplocation where sectorno='$sectorno' and plotno='$plotno'");

		$temp = mysqli_fetch_assoc($temp);
		$size = $temp['size'];
		$query = "Insert into resiplotdeal (sectorno,plotno,area,name,contact,demand,offered,cheque,file,builtup,remark,category)
		values('$sectorno','$plotno','$size','$name','$contact','$demand','$offered','$cheque','$file','$builtup','$remark','$category')";
		$result = mysqli_query($GLOBALS['db'], $query);
		if ($result) {
			$last_id = mysqli_insert_id($GLOBALS['db']);
			saveAuthor($_POST['table'], $last_id);
			echo "<div class='alert alert-success'>The Dealer's record is inserted Successfully into database</div>";
		} else {
			echo "<div class='alert alert-danger'>Insert Failed due to " . mysqli_error($GLOBALS['db']) . " Please Try Again</div>";
		}
	}


	if ($_POST['table'] == 'resiplotown') {

		$sectorno = sanitise($_POST['sectorno']);
		//$sectorno = preg_replace('/\s+/', '', $sectorno);
		$plotno = sanitise($_POST['plotno']);
		$name = sanitise($_POST['name']);
		$contact = sanitise($_POST['contact']);
		$demand = sanitise($_POST['demand']);
		$offered = sanitise($_POST['offered']);
		$remark = sanitise($_POST['remark']);
		$category = sanitise($_POST['category']);
		$builtup = sanitise($_POST['builtup']);
		if (!isset($_POST['interested'])) {
			$_POST['interested'] = '-';
		}
		$interested = sanitise($_POST['interested']);
		$cheque = sanitise($_POST['cheque']);
		$temp = mysqli_query($GLOBALS['db'], "Select size from maplocation where sectorno='$sectorno' and plotno='$plotno'");
		//echo "sql query".$temp;

		$temp = mysqli_fetch_assoc($temp);


		$size = $temp['size'];
		//echo "the size is ".$size;
		$query = "Insert into resiplotown (sectorno,plotno,area,name,contact,demand,offered,cheque,interested,builtup,remark,category)
		values('$sectorno','$plotno','$size','$name','$contact','$demand','$offered','$cheque','$interested','$builtup','$remark','$category')";
		//echo $query;
		$result = mysqli_query($GLOBALS['db'], $query);
		if ($result) {
			$last_id = mysqli_insert_id($GLOBALS['db']);
			saveAuthor($_POST['table'], $last_id);
			echo "<div class='alert alert-success'>The Owner record is inserted Successfully into database</div>";
		} else {
			echo "<div class='alert alert-danger'>Insert Failed due to " . mysqli_error($GLOBALS['db']) . " Please Try Again</div>";
		}
	}

	if ($_POST['table'] == 'maplocation') {

		$sectorno = sanitise($_POST['sectorno']);
		$sectorno = strtoupper(preg_replace('/\s+/', '', $sectorno));
		$plotno = strtoupper(sanitise($_POST['plotno']));
		if ($sectorno != NULL and $plotno != NULL) {
			if (!isset($_POST['cornerplotpr'])) {
				$_POST['cornerplotpr'] = 'N';
			}
			$cornerplot = sanitise($_POST['cornerplotpr']);
			if (!isset($_POST['parkface'])) {
				$_POST['parkface'] = 'N';
			}
			$parkface = strtoupper(sanitise($_POST['parkface']));
			$directi = strtoupper(sanitise($_POST['directi']));
			$size = strtoupper(sanitise($_POST['size']));
			$roadwid = strtoupper(sanitise($_POST['roadwid']));

			$query = "Insert into maplocation (sectorno,plotno,size,parkface,directi,cornerplot,roadwid)
		values('$sectorno','$plotno','$size','$parkface','$directi','$cornerplot','$roadwid')";

			$result = mysqli_query($GLOBALS['db'], $query);
			if ($result) {
				echo "<div class='alert alert-success'>The Map record is inserted Successfully into database</div>";
			} else {
				echo "<div class='alert alert-danger'>Insert Failed due to " . mysqli_error($GLOBALS['db']) . " Please Try Again</div>";
			}
		} else {
			echo "Sector no and Plot no cannot be left blank";
		}
	}


	if ($_POST['table'] == 'hudalist') {

		$sectorno = sanitise($_POST['sectorno']);
		$sectorno = preg_replace('/\s+/', '', $sectorno);
		$plotno = sanitise($_POST['plotno']);
		//$sizeact=sanitise($_POST['size']);


		$name = sanitise($_POST['name']);
		$temp = mysqli_query($GLOBALS['db'], "Select size from maplocation where sectorno=$sectorno and plotno=$plotno");
		//echo "sql query".$temp;

		$temp = mysqli_fetch_assoc($temp);
		$size = $temp['size'];

		$query = "Insert into hudalist (sectorno,plotno,area,name)
						values('$sectorno','$plotno','$size','$name')";


		$result = mysqli_query($GLOBALS['db'], $query);
		if ($result) {
			echo " <div class='alert alert-success'>The huda record is inserted Successfully into database</div>";
		} else {
			echo "<div class='alert alert-danger'>Insert Failed due to " . mysqli_error($GLOBALS['db']) . " Please Try Again</div>";
		}
	} //close huda




	if ($_POST['table'] != 'resiplotdeal' and $_POST['table'] != 'resiplotown' and $_POST['table'] != 'maplocation' and $_POST['table'] != 'hudalist') {
		$array = NULL;
		$values = NULL;

		$table = sanitise($_POST['table']);
		//echo $table;
		foreach ($_POST as $key => $value) {
			if ($key != 'table') {
				$array .= "`$key`,";
				$values .= "'$value',";
			}
		}
		$array = substr($array, 0, strlen($array) - 1);
		$values = substr($values, 0, strlen($values) - 1);
		$query = "INSERT into $table (" . $array . ") values (" . $values . ")";


		//echo $query;		
		$result = mysqli_query($GLOBALS['db'], $query);

		if ($result) {
			$last_id = mysqli_insert_id($GLOBALS['db']);
			saveAuthor($_POST['table'], $last_id);
			echo "<div class='alert alert-success'>The Record is inserted Successfully into database</div>";
		} else {
			echo "<div class='alert alert-danger'>Insert Failed due to " . mysqli_error($GLOBALS['db']) . " Please Try Again</div>";
		}
	}
} // isset post	
else {

	echo "send to input field page";
}


?>


</html>