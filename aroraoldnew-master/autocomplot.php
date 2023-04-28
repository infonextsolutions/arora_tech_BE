<?php
$css = 'N';
include_once 'dbconnect.php';
$sector = NULL;
$q = strtolower($_REQUEST["q"]);
$q = str_replace(' ', '', $q);

$table = $_REQUEST['table'];


if (!$q) return;
if (array_key_exists('sectorno', $_REQUEST) and !array_key_exists('plotno', $_REQUEST)) {
	$fld = 'sectorno';
	// if(!is_numeric(substr($q, 0, 1))) {
	// echo "";

	// }

	// else {

	$sql = "select distinct  $fld from $table where $fld LIKE '%$q%'";
	$rsd = mysqli_query($GLOBALS['db'], $sql);
	//echo $sql;
	while ($rs = mysqli_fetch_array($rsd)) {



		$cname[] = $rs["$fld"];

		//     if(is_numeric(substr($cname, 0, 1)))
		//    {echo json_encode($cname);
		//     }
		//     else {

		//     echo "";

		// 	}   
	}
	if ($cname) {
		echo json_encode($cname);
	} else {
		echo "";
	}
}

if (array_key_exists('plotno', $_REQUEST)) {
	$fld = 'plotno';
	$sec = $_REQUEST['sectorno'];
	$sec = strtolower($sec);
	//$sec = str_replace(' ', '', $sec);
	$sql = "select distinct  $fld from $table where sectorno LIKE '$sec' and $fld LIKE '%$q%'";
	//echo $sql;
	$rsd = mysqli_query($GLOBALS['db'], $sql);

	while ($rs = mysqli_fetch_array($rsd)) {
		$cname1[] = $rs["$fld"];
	}
	if ($cname1) {
		echo json_encode($cname1);
	} else {
		echo "";
	}
}

if (array_key_exists('finplotno', $_REQUEST) and array_key_exists('finsectorno', $_REQUEST)) {


	$plt = $_REQUEST['finplotno'];
	$sec = $_REQUEST['finsectorno'];
	//$sec = str_replace(' ', '', $sec);
	$table = $_REQUEST['table'];
	$sql = "select roadwid,parkface,cornerplot,directi,size from $table where sectorno='$sec' and plotno='$plt'";

	//print_r($_REQUEST);

	$rsd = mysqli_query($GLOBALS['db'], $sql);
	if (mysqli_num_rows($rsd) > 0) {
		while ($rs = mysqli_fetch_array($rsd)) {
			?>
			<div id="popupwindow">
				<table class="table table-bordered  table-hover">
					<tr>
						<th>Road</th>
						<td>
							<p><?php echo $rs['roadwid'] ?></p>
						</td>
					</tr>
					<tr>
						<th>
							Park Facing
						</th>
						<td>
							<p><?php echo $rs['parkface'] ?></p>
						</td>
					</tr>
					<tr>
						<th>
							Corner Plot
						</th>
						<td>
							<p>
								<?php echo $rs['cornerplot'] ?>
							</p>
						</td>
					</tr>
					<tr>
						<th>
							Direction
						</th>
						<td>
							<p>
								<?php echo $rs['directi'] ?>
							</p>
						</td>
					</tr>
					<tr>
						<th>
							Size
						</th>
						<td>
							<p>
								<?php echo $rs['size'] ?>
							</p>
						</td>
					</tr>
				</table>
			</div>
		<?php


				}
			} else {

				?>
		<div id="popupwindow">
			No details Exist for this entry

		</div>


<?php
	}
}




?>