<?php
include_once("auth.php");

function getCurrentUser()
{
	if (!isset($_SESSION['user_id']) && session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	return ($_SESSION['user_id']);
}
function getUserById($userid)
{
	if (isset($userid)) {
		$result = mysqli_query($GLOBALS['db'], "Select username from users where id='$userid'");
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			return $row['username'];
		}

		return false;
	}
}
function getAuthor($rid, $table, $flag = false)
{
	$result = mysqli_query($GLOBALS['db'], "select userid from recordowner where rid='$rid' and tablename='$table'");
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		if ($row) {
			if ($flag) {
				return $row['userid'];
			} else {
				return getUserById($row['userid']);
			}
		}
	}
	return false;
}
function isAdmin()
{
	if (getCurrentUser() == 2) {
		return true;
	}
	return false;
}
/**
 * getRecordDetails
 *
 * @param [type] $rid
 * @param [type] $table
 * @return void
 */
function getRecordDetails($rid, $table)
{
	if (isset($rid) && isset($table)) {
		$result = mysqli_query($GLOBALS['db'], "Select * from $table where rid='$rid'");
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			return $row;
		}

		return false;
	}
}
/**
 * canAccess : sugest who can access the table
 *
 * @param integet $rid
 * @param string $table
 * @return boolean
 */
function canAccess($rid, $table)
{
	//viewPendingRequests();
	$canGrantAccess = false;
	$author = getAuthor($rid, $table);

	if ($author) {

		//$row = mysqli_fetch_assoc($result);
		if ($author == getUserById((getCurrentUser())) || isAdmin()) {
			$canGrantAccess = true;
		}
	}

	$result = mysqli_query($GLOBALS['db'], "select userid from pendingrequests where rid='$rid' and status='approved' and tablename='$table'");
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		//	if($canGrantAccess || $row['userid']==getCurrentUser() || getAuthor($rid,$table)=='admin')
		if ($canGrantAccess || $row['userid'] == getCurrentUser() || $author == 'admin') {
			return true;
		}
	}
	return false;
}
function canGrantAccess($rid, $table)
{
	//$query = "select userid from recordowner where rid='$rid' and tablename='$table'";
	//$result = mysqli_query($GLOBALS['db'],"select userid from recordowner where rid='$rid' and tablename='$table'");
	$result = getAuthor($rid, $table, $flag = true);
	if ($result) {

		//$row = mysqli_fetch_assoc($result);
		if ($result == getCurrentUser() || isAdmin()) {
			return $result;
		}
	}
	return false;
}

function viewPendingRequests()
{
	$user = getCurrentUser();
	$result =  mysqli_query($GLOBALS['db'], "select pendingrequests.id, pendingrequests.userid , pendingrequests.tablename , pendingrequests.status , 
	pendingrequests.rid from pendingrequests
	INNER JOIN recordowner ON 
	pendingrequests.rid = recordowner.rid and
	pendingrequests.tablename = recordowner.tablename and
	pendingrequests.status = 'pending' and 
	(recordowner.userid ='$user' or recordowner.userid='2')
	");
	if ($result) {
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return ($rows);
	}
}
function viewApprovedRequests()
{
	$user = getCurrentUser();
	$result =  mysqli_query($GLOBALS['db'], "select pendingrequests.id, pendingrequests.userid , pendingrequests.tablename , pendingrequests.status , 
	pendingrequests.rid from pendingrequests
	INNER JOIN recordowner ON 
	pendingrequests.rid = recordowner.rid and
	pendingrequests.tablename = recordowner.tablename and
	pendingrequests.status = 'approved' and 
	(recordowner.userid ='$user' or recordowner.userid='2')
	");
	if ($result) {
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return ($rows);
	}
}
function viewMyRequests()
{
	$user = getCurrentUser();
	$result =  mysqli_query($GLOBALS['db'], "select pendingrequests.id, pendingrequests.userid , pendingrequests.tablename , pendingrequests.status , 
	pendingrequests.rid from pendingrequests
	where userid = $user");
	if ($result) {
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return ($rows);
	}
}
function tableMyRequest()
{
	$rows =  viewMyRequests();
	if (!empty($rows)) {
?>
		<table id="accessTable" class="table table-hover">
			<thead>
				<tr>

					<th scope="col">Description</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($rows as $row) {
					$plotno = null;
					$sectorno = null;
					$locality = null;

					$requestingUser = getUserById($row['userid']);
					$record = array();
					$record = getRecordDetails($row['rid'], $row['tablename']);

					if (isset($record['plotno']) && isset($record['sectorno'])) {
						$plotno =  $record['plotno'];
						$sectorno = $record['sectorno'];
					}
					if (isset($record['locality'])) {
						$locality = $record['locality'];
					}
					$name = $record['name'];
					$author = getAuthor($row['rid'], $row['tablename']);
					$keyword = $row['status'] == 'pending' ? ' with ' : ' by ';
					//for client ". ucwords($name)."
				?>


					<tr>
						<td>
							<?php if (isset($plotno)) {
								echo "My request for access for Plot: " . $plotno . " Sector: " . $sectorno . " is 
						" . $row['status'] . $keyword . $author;
							} elseif (isset($locality)) {
								echo "My request for access for locality: " . $locality . " of type: " . $row['tablename'] . " is 
							" . $row['status'] . $keyword . $author;
							} else {
								echo "My request for access of type: " . $row['tablename'] . " is 
							" . $row['status'] . $keyword . $author;
							} ?>
						</td>
						<td>

							<?php
							if ($row['status'] == 'pending') {
								echo "<span class='badge badge-warning'>Pending</span>";
							} elseif ($row['status'] == 'approved') {
								echo "<span class='badge badge-success'>Approved</span>";
							} elseif ($row['status'] == 'declined') {
								echo "<span class='badge badge-danger'>Declined</span>";
							}
							?>


						</td>
					</tr>


				<?php
				}
				?>

			</tbody>
		</table>

	<?php
	} else {
		echo "No records found";
	}
}
function tablePendingRequest()
{
	$rows =  viewPendingRequests();
	if (!empty($rows)) {
	?>
		<table id="accessTable" class="table table-hover">
			<thead>
				<tr>

					<th scope="col">Description</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($rows as $row) {

					$requestingUser = getUserById($row['userid']);
					$record = array();
					$record = getRecordDetails($row['rid'], $row['tablename']);
					$plotno =  $record['plotno'];
					$sectorno = $record['sectorno'];
					$name = $record['name'];

				?>


					<tr>
						<td><?php echo ucwords($requestingUser) . " is requesting access for Plot: " . $plotno . " Sector: " . $sectorno   ?></td>
						<td class="btn-group">

							<a href="#" id="approveRequest" class="btn btn-outline-primary btn-sm" data-operation="approveRequest" data-rid="<?php echo $row['id'] ?>">
								Approve
							</a>

							<a href="#" id="declineRequest" class="btn btn-outline-danger btn-sm" data-operation="declineRequest" data-rid="<?php echo $row['id'] ?>">
								Reject
							</a>

						</td>
					</tr>


				<?php
				}
				?>

			</tbody>
		</table>

	<?php
	} else {
		echo "No records found";
	}
}
function tableApprovedRequest()
{
	$rows =  viewApprovedRequests();
	if (!empty($rows)) {
	?>
		<table id="approvedTable" class="table table-hover">
			<thead>
				<tr>

					<th scope="col">Description</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($rows as $row) {

					$requestingUser = getUserById($row['userid']);
					$record = array();
					$record = getRecordDetails($row['rid'], $row['tablename']);
					$plotno =  $record['plotno'];
					$sectorno = $record['sectorno'];
					$name = $record['name'];

				?>


					<tr>
						<td><?php echo ucwords($requestingUser) . " has been granted access for Plot: " . $plotno . " Sector: " . $sectorno  ?></td>
						<td>

							<a href="#" id="declineRequest" class="btn btn-outline-danger btn-sm" data-operation="declineRequest" data-rid="<?php echo $row['id'] ?>">
								Revoke access
							</a>

						</td>
					</tr>


				<?php
				}
				?>

			</tbody>
		</table>

	<?php
	} else {
		echo "No records found";
	}
}
function requestAccess($rid, $table)
{
	$user = getCurrentUser();
	$result = mysqli_query($GLOBALS['db'],  "Insert into pendingrequests (rid,tablename,userid,status) values ('$rid','$table','$user','pending')");
	if ($result) {

		return true;
	}
	return false;
}
function getPendingRequestId($rid, $table, $userid)
{
	$result = mysqli_query($GLOBALS['db'],  "Select id from pendingrequests where (rid,tablename,userid,status) values ('$rid','$table','$userid','pending')");
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}
	return false;
}
function declineRequest($id)
{
	$result = mysqli_query($GLOBALS['db'],  "Update pendingrequests set status = 'declined' where id ='$id'");
	if ($result) {
		return true;
	}
	return false;
}
function approveRequest($id)
{
	$result = mysqli_query($GLOBALS['db'],  "Update pendingrequests set status = 'approved' where id ='$id'");
	if ($result) {
		return true;
	}
	return false;
}

// this function is to print the maplocation
function FormMaplocation($query)
{
	if ($query) {
		$result = mysqli_query($GLOBALS['db'], $query);
	}
	?>


	<div class="fg-buttonset fg-buttonset-single">

		<button class="fg-button  " onclick="fndelmap();" value="" id="btnDeleteRow3">delete</button>
		<!--     <button  class="fg-button ui-state-hover ui-priority-primary ui-corner-right" name="addmap" value="" onclick="window.location='AddmapData.php'" target="main">Add Map Location Record</button>		
	-->
	</div>
	<table id='map' class='stripe hover multiple-select-row data-table-export nowrap'>
		<caption>Results based on Map Location</caption>
		<thead>
			<tr>
				<th>Sector No</th>
				<th>Plot No</th>
				<th>Size</th>
				<th>Road</th>
				<th>Park</th>
				<th>Corner</th>
				<th>Direction</th>
				<th>Select</th>
			</tr>
		</thead>
		<tbody>

			<?php

			if ($result) {

				while ($row = mysqli_fetch_assoc($result)) {
			?>

					<tr id='<?php echo $row['RID'] ?>'>
						<td><?php echo $row["SECTORNO"] ?></td>
						<td><?php echo $row["PLOTNO"] ?></td>
						<td><?php echo $row["SIZE"] ?></td>
						<td><?php echo $row["ROADWID"] ?></td>
						<td><?php echo $row["PARKFACE"] ?></td>
						<td><?php echo $row["CORNERPLOT"] ?></td>
						<td><?php echo $row["DIRECTI"] ?></td>
						<td><input type='checkbox' name='row<?php echo $row['RID'] ?>' value='<?php echo $row['RID'] ?>' /></td>

					</tr>
			<?php }
			}
			?>

		</tbody>

	</table>
<?php
	//echo mysqli_error($GLOBALS['db']);
}

//To print the HUDALIST table based on the search done
function FormHudalist($query)
{
	if ($query) {
		$result = mysqli_query($GLOBALS['db'], $query);
	}
?>
	<div class="fg-buttonset fg-buttonset-single">
		<br />
		<input type="button" onclick="fndelhuda();" value="delete" id="btnDeleteRow4" style="position:relative;top:20px;" class="fg-button "></input>
		<!-- <input type="button"  name="addhuda" value="Add HUDA Record" onclick="window.location='AddhudaData.php'" 
 	target="main" class="fg-button ui-state-default ui-priority-primary ui-corner-right"/> -->
	</div>
	<table id='huda' class='stripe hover multiple-select-row data-table-export nowrap'>

		<caption>Results based on Actual Owner List</caption>

		<thead>
			<tr>
				<th>Sector No</th>
				<th>Plot No</th>
				<th>Size</th>
				<th>Name</th>
				<th><input type="checkbox" name="checkhuda" id="checkhuda" />Select</th>
			</tr>
		</thead>
		<tbody>
			<?php


			if ($result) {
				while ($row = mysqli_fetch_assoc($result)) {
			?>

					<tr id='<?php echo $row['RID'] ?>'>
						<td><?php echo $row["SECTORNO"] ?></td>
						<td><?php echo $row["PLOTNO"] ?></td>
						<td><?php echo $row["SIZE"] ?></td>
						<td><?php echo $row["NAME"] ?></td>
						<td><input type='checkbox' name='checkhuda' value='<?php echo $row['RID'] ?>' /></td>
					</tr>
			<?php


				}
			}
			?>

		</tbody>

	</table>
<?php
}

function FormImages($query = NULL)
{
	$result = mysqli_query($GLOBALS['db'], $query);

?>


	<div class="imageclass col-sm-12 col-md-6">
		<?php
		if ($result) {

			while ($row = mysqli_fetch_assoc($result)) {
		?>

				<!-- <td><img src="media/images/mapimg.png" /></td> -->
				<td><a href="image.php?sectorno=<?php echo $row['sectorno']; ?>&image_id=<?php echo $row['image_id']; ?>"><img src="media/images/mapimg.png" />Sector <?php echo $row['sectorno'] ?></a></td>
				<!--   <td>Sector No <?php //echo $row['name']
										?></td> -->

		<?php
			}
		}
		?>
	</div>
<?php
}



//To print the Resiplotdeal table based on the search done
function FormResiplotdeal($query = NULL)
{

	$result = mysqli_query($GLOBALS['db'], $query);


?>


	<br />

	<!-- <form id="dealform"> -->
	<div class="fg-buttonset fg-buttonset-single">
		<input type="button" onclick="fnShowHided(10);" value="Hide Remarks" id="dealbut" class="button" style="position:relative;top:40px;"></input>

		<input type="button" onclick="fndeldeal();" value="delete" id="btnDeleteRow" class="fg-button" style="position:relative;top:40px;"></input>

		<!--  <input type="button" name="adddeal" value="Add Dealer Record" onclick="window.location='AdddealData.php'" target="main" class="fg-button ui-state-default ui-priority-primary ui-corner-right">		
						 -->
	</div>




	<!-- </form> -->
<?php
}
//To print the Resiplotown table based on the search done 
function FormResiplotown($query)
{
	if ($query) {
		$result = mysqli_query($GLOBALS['db'], $query);
	}
?>


	<br />
	<div class="fg-buttonset fg-buttonset-single">
		<input type="button" onclick="fnShowHideo(10);" value="Hide Remarks" id="ownbut" class="button" style="position:relative;top:40px;"></input>

		<input type="button" onclick="fndelown();" value="delete" id="btnDeleteRow2" class="fg-button " style="position:relative;top:40px;"></input>

		<!-- input type="button" name="addowner" value="Add Owner Record" 
						onclick="window.location='AddownData.php'" target="main" class="fg-button ui-state-default ui-priority-primary ui-corner-right">		
						-->
	</div>





<?php
}

// this function will print the table selected for HUDA

function selecttab()
{
	//define variables here.
	$querystring1 = NULL;
	$querystring = NULL;
	global $queryown;
	global $querydeal;
	$querydel = NULL;
	$querydel1 = NULL;
	$valdl = FALSE;
	$valow = FALSE;
	$temp = FALSE;
	$sectorno = NULL;
	$plotno = NULL;
	$queryimg = NULL;
	//universal SQL queries
	$selectown = "RESIPLOTOWN.RID,RESIPLOTOWN.PLOTNO,RESIPLOTOWN.SECTORNO,RESIPLOTOWN.SIZE,RESIPLOTOWN.NAME,RESIPLOTOWN.CONTACT,
					RESIPLOTOWN.DEMAND,RESIPLOTOWN.OFFERED,RESIPLOTOWN.CHEQUE,RESIPLOTOWN.DATED,RESIPLOTOWN.REMARK,
					RESIPLOTOWN.INTERESTED FROM RESIPLOTOWN";

	$selectdeal = "RESIPLOTDEAL.RID,RESIPLOTDEAL.PLOTNO,RESIPLOTDEAL.SECTORNO,RESIPLOTDEAL.SIZE,RESIPLOTDEAL.NAME,
					RESIPLOTDEAL.CONTACT,RESIPLOTDEAL.DEMAND,RESIPLOTDEAL.OFFERED,RESIPLOTDEAL.CHEQUE,
					RESIPLOTDEAL.FILE,RESIPLOTDEAL.DATED,RESIPLOTDEAL.REMARK FROM RESIPLOTDEAL";

	$joindeal = "MAPLOCATION ON MAPLOCATION.PLOTNO=RESIPLOTDEAL.PLOTNO AND MAPLOCATION.SECTORNO=RESIPLOTDEAL.SECTORNO";

	$joinown = "MAPLOCATION ON MAPLOCATION.PLOTNO=RESIPLOTOWN.PLOTNO AND MAPLOCATION.SECTORNO=RESIPLOTOWN.SECTORNO";
	$orderbydeal = "RESIPLOTDEAL.DATED";
	$orderbyown = "RESIPLOTOWN.DATED";

	//searching the $_GET variable to add the tablename before '.'
	$sectorno = $_GET['sectornopr'];
	$plotno = $_GET['plotnopr'];

	foreach ($_GET as $key => $value) {


		if (!$value == NULL and $key != "submit") {


			if (substr($key, -2, 2) == 'pr') {
				$key = str_replace('pr', "", $key);
				if (strstr($value, ",")) {
					$querystring .= "(";
					$querydel .= "(";
					foreach (explode(',', $value) as $key1 => $val1) {
						$querystring .= "MAPLOCATION.$key ='$val1' OR ";
						$querydel .= "MAPLOCATION.$key ='$val1' OR ";
					}

					$querystring = preg_replace('/OR $/', '', $querystring);
					$querydel = preg_replace('/OR $/', '', $querydel);
					$querystring .= "),";
					$querydel .= "),";
				} else {
					$querystring .= "MAPLOCATION.$key ='$value',";
					$querydel .= "MAPLOCATION.$key ='$value',";
				}
			}
			if (substr($key, -2, 2) == "dl") {
				$key = str_replace('dl', "", $key);
				$querystring .= "RESIPLOTDEAL.$key ='$value',";
				$valdl = TRUE;
				//		$querydel=NULL;

			}
			if (substr($key, -2, 2) == "ow") {
				$key = str_replace('ow', "", $key);
				$querydel .= "RESIPLOTOWN.$key ='$value',";
				$valow = TRUE;
				//$querystring=NULL;
			}
			if (substr($key, 0, 6) == "cheque") {
				if ($temp) {
					$querystring .= "?RESIPLOTDEAL.CHEQUE ='$value'),";
					$querydel .= "?RESIPLOTOWN.CHEQUE ='$value'),";
					$querystring = str_replace(',?', ' OR ', $querystring);
					$querydel = str_replace(',?', ' OR ', $querydel);
					$querystring = str_replace('   ', '(', $querystring);
					$querydel = str_replace('   ', '(', $querydel);
				} else {
					$querystring .= "   RESIPLOTDEAL.CHEQUE ='$value',";
					$querydel .= "   RESIPLOTOWN.CHEQUE ='$value',";
				}
				$temp = TRUE;
			}

			// ignore this particular $_GET value
		}
	}

	if ($valow and !$valdl) {
		$querystring = NULL;
	}
	if ($valdl and !$valow) {
		$querydel = NULL;
	}
	//echo $querystring;
	//	echo "<br>";
	//	echo $querydel;

	//remove trailing semicolon
	$querystring = substr($querystring, 0, strlen($querystring) - 1);
	//explode to insert AND
	foreach (explode(',', $querystring) as $key => $value) {
		$querystring1 .= " $value AND ";
	}
	$querystring1 = preg_replace('/AND $/', '', $querystring1);

	//remove trailing semicolon
	$querydel = substr($querydel, 0, strlen($querydel) - 1);
	//explode to insert AND
	foreach (explode(',', $querydel) as $key => $value) {
		//$value = mysqli_real_escape_string($value);
		$querydel1 .= " $value AND ";
	}
	$querydel1 = preg_replace('/AND $/', '', $querydel1);
	//my sql query function on the $queryown and $querydeal

	$queryown = "Select $selectown inner join $joinown  where $querydel1";
	//echo $queryown;
	$querydeal = "Select $selectdeal inner join $joindeal  where $querystring1";
	if ($sectorno != "") {
		$queryimg = "Select image_id,name,image from IMAGES where name=$sectorno";
		FormImages($queryimg);
	}

	if ($sectorno != "" and $plotno != "") {

		$querymap = "Select *  from MAPLOCATION where sectorno=$sectorno and plotno=$plotno";
		$queryhuda = "Select * FROM Hudalist where sectorno=$sectorno and plotno=$plotno";
		FormMaplocation($querymap);
		FormHudalist($queryhuda);
	}

	//call print table

	//echo $queryown;
	//echo "<br>";
	//echo $querydeal;
	FormResiplotown($queryown);
	FormResiplotdeal($querydeal);
	mysqli_close($GLOBALS['db']);
}

function querybuild($tableown = NULL, $tabledeal = NULL)
{

	$where = FALSE;
	$que = NULL;
	$bet = NULL;
	$all = NULL;
	$array = NULL;
	$between = FALSE;
	$ar = NULL;
	$join = FALSE;
	$joiner = NULL;
	$both = FALSE;
	$bothones = NULL;


	//print_r($_REQUEST);
	foreach ($_REQUEST as $key => $value) {
		//print_r($value);


		if ($key != 'submit') {

			if ($value) {

				if (strstr($key, "range")) {
					if (strstr($key, "area")) {
						$both = TRUE;
						$bothones .= "$value AND ";
					} else {
						//echo $key;
						$between = TRUE;
						$bet .= "'$value' AND ";
					}
				}
				if (is_array($value)) {



					foreach ($value as $ky => $val) {
						if ($val) {
							$array = TRUE;
							//$val = preg_replace('/\s+/', '', $val);
							$ar .= "$key ='$val' OR ";
						}
					}
					$ar = preg_replace('/OR $/', '', $ar);
				}

				if (!is_array($value) and !strstr($key, "range")) {
					$where = TRUE;

					$que .= " $key= '$value' AND";
				}
			}
		}
	}

	//echo "between is".$between;
	if ($where) {

		//echo "where is ".$where;
		//echo "que is".$que;	
		//echo "<br />";
		$que = substr($que, 0, strlen($que) - 4);
	}
	if ($between) {
		$bet = substr($bet, 0, strlen($bet) - 4);
	}
	if ($both) {
		$bothones = substr($bothones, 0, strlen($bothones) - 4);
	}
	if (!$where and !$between and !$both and !$array) {
		$all = TRUE;
	}

	if ($all) {
		if (isset($_SESSION['form']) and $_SESSION['form'] == "HUDA") {
			$queryown = " Select * from  $tableown where sectorno REGEXP '^[0-9]' and ";
			$querydeal = "Select * from  $tabledeal where sectorno REGEXP '^[0-9]' and ";
		} else {

			$queryown = "Select * from  $tableown and ";
			$querydeal = "Select * from  $tabledeal and ";
		}
	} else {
		$queryown = "Select * from  $tableown where";
		$querydeal = "Select * from  $tabledeal where";
		if ($que) {
			//$que= str_replace(' ', '', $que);
			$queryown .= " ($que) and ";
			$querydeal .= " ($que) and ";
		}
		if ($array) {
			//$ar= str_replace(' ', '', $ar);
			$queryown .= "($ar) and ";
			$querydeal .= "($ar) and ";
		}

		if ($bet) {
			$bet = str_replace(' ', '', $bet);
			$queryown .= " demand between $bet and ";
			$querydeal .= " demand between $bet and ";
		}
		if ($both) {
			$bothones = str_replace(' ', '', $bothones);
			$queryown .= " area between $bothones and ";
			$querydeal .= " area between $bothones and ";
		}
	}
	$queryown = substr($queryown, 0, strlen($queryown) - 4);
	$queryown .= "order by rid  desc ";
	$querydeal = substr($querydeal, 0, strlen($querydeal) - 4);
	$querydeal .= "order by rid desc ";

	//	echo $queryown;

	return array($queryown, $querydeal);
}
function tablebuild($table, $query2)
{
	$header = NULL;
	$que = FALSE;
	$var = NULL;
	$var1 = FALSE;


	//$table='hudalist';
	$query = "DESCRIBE $table";
	//$query2 = "select * from $table";
	$result = mysqli_query($GLOBALS['db'], $query);
	$result2 = mysqli_query($GLOBALS['db'], $query2);
	$que = strstr($table, 'own');
	if ($que) {
		$header = "checkown";
		$tableid = "own";
		$caption = "Owner's";
		$rno = "Row2";
		$temp = "checkown";
	} elseif ($que = strstr($table, 'deal')) {
		$header = "checkdeal";
		$tableid = "deal";
		$temp = "checkdeal";
		$rno = "Row";
		$caption = "Dealer's";
	} elseif ($que = strstr($table, 'map')) {
		$caption = "Map's";
		$header = "checkmap";
		$tableid = "map";
		$rno = "Row3";
		$temp = "map";
	} elseif ($que = strstr($table, 'huda')) {
		$header = "checkhuda";
		$caption = "Huda";
		$tableid = "huda";
		$rno = "Row4";
		$temp = "huda";
	}



?>
	<br />
	<div class="special1">
		<input type="button" onclick="fndel<?php echo $tableid ?>();" value="delete" id="btnDelete<?php echo $rno ?>" class="special"></input>
	</div>
	<table id="<?php echo $tableid ?>" class='stripe hover multiple-select-row data-table-export nowrap'>

		<caption><?php echo "Results based on " . $caption . " Query" ?></caption>
		<thead>
			<tr>

				<?php
				if ($result) {

					while ($row = mysqli_fetch_assoc($result)) {
						if ($row['Field'] != 'rid' and $row['Field'] != 'RID') {
				?>
							<th class="table-plus">
								<?php
								echo $row['Field'] . " ";
								?>
							</th>
					<?php
						} else {
							$var = $row['Field'];
						}
					}
					?>
					<th><input type="checkbox" name='<?php echo $temp ?>' id='<?php echo $header ?>' /></th>
			</tr>
		</thead>



		<tbody>
			<?php
				}
				if ($result2) {
					while ($row2 = mysqli_fetch_assoc($result2)) {
						$add = 0;

			?> <tr id='<?php echo $row2[$var] ?>' class="highlight">

					<?php



						foreach ($row2 as $key => $value) {

							if ($key != 'rid' and $key != 'RID') {
					?>

							<td class="table-plus" id='<?php echo $add = $add + 1 ?>'>
								<?php

								if (strtoupper($key) == 'DATE' or strtoupper($key) == 'DATED') {
									$value = date("Y-m-d ", strtotime($value));
								}

								if ($value == '') {
									$value = '-';
								}

								if ((strtoupper($key) == 'INTERESTED' or strtoupper($key) == 'FILE') and strtoupper($value) == 'Y') {

									echo "Yes";
								} else {
									echo $value;
								}


								?>

							</td>

					<?php
							}
						}
					?>
					<td>
						<input type='checkbox' name='<?php echo $header ?>' value='<?php echo $row2[$var] ?>' onclick="highlight(this);" />
					</td>

				</tr>


		<?php
					}
				}
		?>
		</tbody>

	</table>
<?php

}

function filter()
{


	$q = $_SESSION['form'];



	$sql = "SELECT * FROM links WHERE name = '" . $q . "'";

	$result = mysqli_query($GLOBALS['db'], $sql);



	while ($row = mysqli_fetch_array($result)) {
		$filter = explode(",", $row['filter']);
	}


	foreach ($filter as $key => $value) {
		echo '<option value="' . $value . '">' . $value . '</option>';
	}
}

function sector()
{



	$q = $_SESSION['form'];

	//echo $q;

	$sql = "SELECT * FROM links WHERE name = '" . $q . "'";

	//echo $sql;
	$result = mysqli_query($GLOBALS['db'], $sql);

	//echo "<option value=''></option>";

	while ($row = mysqli_fetch_array($result)) {
		$sector = explode(",", $row['sector']);
	}

	//print_r ($sector);
	foreach ($sector as $key => $value) {
		echo '<option name="optionno" value="' . $value . '">' . $value . '</option>';
	}
}

function mapquery($tableown, $tabledeal)
{
	$where = FALSE;
	$que = NULL;
	$bet = NULL;
	$all = NULL;
	$array = NULL;
	$between = FALSE;
	$ar = NULL;
	$both = FALSE;
	foreach ($_REQUEST as $key => $value) {
		//print_r($value);


		if ($key != 'submit') {
			//echo" key".$key;
			//echo "value".$value;


			if ($value and $key == 'sectorno' or $key == 'plotno') {


				if (is_array($value)) {



					foreach ($value as $ky => $val) {
						if ($val) {
							$array = TRUE;
							$ar .= "$key ='$val' OR ";
						}
					}
					$ar = preg_replace('/OR $/', '', $ar);
				} {
					if (!is_array($value) and !strstr($key, "range")) {
						$where = TRUE;


						$que .= " $key='$value' AND ";
					}
				}
			}
		}
	}

	if ($where) {

		//echo "where is ".$where;
		//echo "que is".$que;	
		//echo "<br />";
		$que = substr($que, 0, strlen($que) - 4);
	}

	if (!$where and !$array) {
		$all = TRUE;
	}

	if ($all) {

		$queryown = "Select * from  $tableown and";
		$querydeal = "Select * from  $tabledeal and";
	} else {
		$queryown = "Select * from  $tableown where";
		$querydeal = "Select * from  $tabledeal where";
		if ($que) {

			$queryown .= " ($que) and";
			$querydeal .= " ($que)and";
		}
		if ($array) {

			$queryown .= "($ar) and";
			$querydeal .= "($ar) and";
		}
	}
	$queryown = substr($queryown, 0, strlen($queryown) - 3);
	//if($tableown!='malocation' and $tabledeal!='maplocation' AND $tableown!='hudalist' and $tabledeal!='hudalist' ) 
	//{
	//$queryown .="order by date DESC ";}
	$querydeal = substr($querydeal, 0, strlen($querydeal) - 3);
	//if($tableown!='malocation' and $tabledeal!='maplocation' AND $tableown!='hudalist' and $tabledeal!='hudalist' ) {
	//$querydeal .="order by date desc ";
	//}
	if ($tableown == 'images') {
		$ar = NULL;
		foreach ($_REQUEST as $key => $value) {
			//print_r($value);


			if ($key != 'submit') {
				//echo" key".$key;
				//echo "value".$value;


				if ($value and $key == 'sectorno') {

					if (is_array($value)) {



						foreach ($value as $ky => $val) {
							//echo $val;


							//echo $ky;
							//echo $val;
							if ($val) {
								$array = TRUE;
								$ar .= "$key ='$val' OR ";
							}
						}
						$ar = preg_replace('/OR $/', '', $ar);
					}
				}
			}
		}
		$queryown = "Select * from  $tableown where $ar";
		//echo $ar;
	}

	$queryown = strtolower($queryown);
	$querydeal = strtolower($querydeal);
	return array($queryown, $querydeal);
}

function queryjoin($tableown, $tabledeal)
{

	$ar = NULL;
	$arow = NULL;
	$arown = NULL;
	$ardeal = NULL;
	$ardl = FALSE;
	$joiner = NULL;
	$array = FALSE;
	$oldkey = 1;
	$newkey = NULL;
	$selectown = "RESIPLOTOWN.RID,RESIPLOTOWN.PLOTNO,RESIPLOTOWN.SECTORNO,RESIPLOTOWN.AREA,RESIPLOTOWN.DEMAND,RESIPLOTOWN.OFFERED,RESIPLOTOWN.CHEQUE,RESIPLOTOWN.REMARK,
	RESIPLOTOWN.BUILTUP,RESIPLOTOWN.NAME,RESIPLOTOWN.CONTACT,RESIPLOTOWN.INTERESTED,RESIPLOTOWN.CATEGORY,RESIPLOTOWN.DATE FROM RESIPLOTOWN";

	$selectdeal = "RESIPLOTDEAL.RID,RESIPLOTDEAL.PLOTNO,RESIPLOTDEAL.SECTORNO,RESIPLOTDEAL.AREA,RESIPLOTDEAL.DEMAND,RESIPLOTDEAL.OFFERED,
					RESIPLOTDEAL.CHEQUE,RESIPLOTDEAL.REMARK,RESIPLOTDEAL.BUILTUP,RESIPLOTDEAL.NAME,RESIPLOTDEAL.CONTACT,
					RESIPLOTDEAL.FILE,RESIPLOTDEAL.CATEGORY,RESIPLOTDEAL.DATE FROM RESIPLOTDEAL";

	$joindeal = "MAPLOCATION ON MAPLOCATION.PLOTNO=RESIPLOTDEAL.PLOTNO AND MAPLOCATION.SECTORNO=RESIPLOTDEAL.SECTORNO";

	$joinown = "MAPLOCATION ON MAPLOCATION.PLOTNO=RESIPLOTOWN.PLOTNO AND MAPLOCATION.SECTORNO=RESIPLOTOWN.SECTORNO";
	foreach ($_REQUEST as $key => $value) {
		//print_r($value);
		if ($key != 'submit' and $value) {

			if (is_array($value)) {
				$filteredArray = array_filter($value);
				$newkey = count($filteredArray);


				// if (count($value) > 1 && strtolower($key) == 'roadwid') {
				// 	$arown .= "(";
				// 	$ardeal .= "(";
				// }

				foreach ($filteredArray as $ky => $val) {


					if ($val) {
						$array = TRUE;

						if (strtolower($key) == 'roadwid') {
							if (count($filteredArray) > 1) {
								if ($ky === array_key_first($filteredArray)) {

									$arown .= "AND (";
									$ardeal .= " AND (";
								}
								if ($ky != array_key_last($filteredArray)) {
									$arown .= "maplocation.$key ='$val' OR ";
									$ardeal .= "maplocation.$key ='$val' OR ";
								} else {

									$arown .= "maplocation.$key ='$val' ) ";
									$ardeal .= "maplocation.$key ='$val' ) ";
								}
							} else {

								if ($ky === array_key_first($filteredArray)) {

									$arown .= "and (";
									$ardeal .= "and (";
								}

								if ($ky != array_key_last($filteredArray)) {

									$arown .= " maplocation.$key ='$val' AND";
									$ardeal .= "maplocation.$key ='$val' AND ";
								} else {

									$arown .= " maplocation.$key ='$val') ";
									$ardeal .= " maplocation.$key ='$val') ";
								}
							}
						} else {

							if ($newkey > 1) {

								if ($ky === array_key_first($filteredArray)) {

									$arown .= "(";
									$ardeal .= "(";
								}
								if ($ky != array_key_last($filteredArray)) {

									$arown .= "$tableown.$key ='$val' OR ";
									$ardeal .= "$tabledeal.$key ='$val' OR ";
								} else {

									$arown .= "$tableown.$key ='$val' ";
									$ardeal .= "$tabledeal.$key ='$val' ";
								}
								$newkey--;
							} else {
								if ($ky === array_key_first($filteredArray)) {

									$arown .= "(";
									$ardeal .= "(";
								}
								if ($ky != array_key_last($filteredArray)) {

									$arown .= "$tableown.$key ='$val' ) AND ";
									$ardeal .= "$tabledeal.$key ='$val' ) AND ";
								} else {

									$arown .= "$tableown.$key ='$val' ) ";
									$ardeal .= "$tabledeal.$key ='$val') ";
								}
							}
						}
						//echo "2nd".$arown."<br/>";
					}
					//$ar = preg_replace('/OR $/', '', $ar);

				}

				// if (count($value) > 1 && strtolower($key) == 'roadwid') {
				// 	$arown .= ")";
				// 	$ardeal .= ")";
				// }
			} else {

				if (strtolower($key) == 'parkface' or strtolower($key) == 'directi' or strtolower($key) == 'cornerplot') {
					if (strtolower($key) == 'directi') {
						$joiner .= "maplocation.$key LIKE'%$value%' AND ";
					} else {
						$joiner .= "maplocation.$key ='$value' AND ";
					}
				} else {

					$joiner .= "$key='$value' AND ";
				}
				$ardl = TRUE;
			}
			//			echo "It is join";
		}
	}

	//print_r($arown);

	$queryown = "Select $selectown  inner join $joinown where ";
	$querydeal = "Select $selectdeal  inner join $joindeal where ";

	if ($array) {
		// $arown = substr($arown, 0, strlen($arown) - 4);
		// $ardeal = substr($ardeal, 0, strlen($ardeal) - 4);

		$queryown .= "$arown and";
		$querydeal .= "$ardeal and";
	}
	if ($ardl) {
		$joiner = substr($joiner, 0, strlen($joiner) - 4);

		$queryown .= "($joiner) and";
		$querydeal .= "($joiner) and";
	}
	$queryown = substr($queryown, 0, strlen($queryown) - 3);
	$queryown .= "order by date DESC ";
	$querydeal = substr($querydeal, 0, strlen($querydeal) - 3);
	$querydeal .= "order by date desc ";

	$queryown = strtolower($queryown);
	$querydeal = strtolower($querydeal);



	return array($queryown, $querydeal);
}

function nextbu()
{

	$var = htmlentities($_SERVER['REQUEST_URI']);
	$exp = explode('&', $var);
	$sector = '';
	foreach ($exp as $key1 => $val1) {

		//echo " key=".$key1;
		if (strstr($val1, "sectorno") && $sector == '') {
			$temp = explode('=', $val1);
			$sector = $temp[1];
		}

		if (strstr($val1, "plotno")) {

			$finexp = explode('=', $val1);

			$plotno = urldecode($finexp[1]);
			if ($plotno) {

				//$finexp[1]=$finexp[1]+1;


				$query = "SELECT RID FROM maplocation WHERE SECTORNO = '$sector' and PLOTNO = '$plotno' ORDER BY PLOTNO LIMIT 1";

				$result = mysqli_query($GLOBALS['db'], $query);
				$row = mysqli_fetch_object($result);
				if (!empty($row)) {
					$rid = $row->RID;
					$rid++;
					$query = "SELECT PLOTNO FROM maplocation WHERE RID = '$rid' ORDER BY PLOTNO LIMIT 1";

					$result = mysqli_query($GLOBALS['db'], $query);
					$row = mysqli_fetch_object($result);


					$finexp[1] = $row->PLOTNO;
				}

				//			$next=$finexp[1]-1;
				//echo implode('=',$finexp);
			}
			$val1 = implode('=', $finexp);

			$exp[$key1] = $val1;
		}
		//echo implode('&',$exp);


	}
	$fin = implode('&', $exp);

	echo "<a href=" . $fin . " class='btn btn-link'>Next <i class='fa fa-arrow-circle-right' aria-hidden='true'></i></a>";
}


function prevbu()
{

	$var = htmlentities($_SERVER['REQUEST_URI']);
	$exp = explode('&', $var);
	$sector = '';
	foreach ($exp as $key1 => $val1) {

		//echo " key=".$key1;
		if (strstr($val1, "sectorno") && $sector == '') {
			$temp = explode('=', $val1);
			$sector = $temp[1];
		}

		if (strstr($val1, "plotno")) {

			$finexp = explode('=', $val1);

			$plotno = urldecode($finexp[1]);
			if ($plotno) {

				//$finexp[1]=$finexp[1]+1;


				$query = "SELECT RID FROM maplocation WHERE SECTORNO = '$sector' and PLOTNO = '$plotno' ORDER BY PLOTNO LIMIT 1";

				$result = mysqli_query($GLOBALS['db'], $query);
				$row = mysqli_fetch_object($result);

				if (!empty($row)) {
					$rid = $row->RID;
					$rid--;
					$query = "SELECT PLOTNO FROM maplocation WHERE RID = '$rid' ORDER BY PLOTNO LIMIT 1";

					$result = mysqli_query($GLOBALS['db'], $query);
					$row = mysqli_fetch_object($result);


					$finexp[1] = $row->PLOTNO;
				}
			}
			$val1 = implode('=', $finexp);

			$exp[$key1] = $val1;
		}
		//echo implode('&',$exp);


	}
	$fin = implode('&', $exp);

	echo "<a href=" . $fin . " class='btn btn-link'> <i class='fa fa-arrow-circle-left' aria-hidden='true'></i> Prev</a>";
}




function tablebuildalt($table, $query2)
{
	$header = NULL;
	$que = FALSE;
	$var = NULL;
	$var1 = FALSE;
	$newchar = substr($table, 0, 4);


	//$table='hudalist';
	$query = "DESCRIBE $table";
	//$query2 = "select * from $table";
	$result = mysqli_query($GLOBALS['db'], $query);
	$result2 = mysqli_query($GLOBALS['db'], $query2);

	$que = strstr($table, 'own');
	if ($que) {
		$header = "checkown";
		$tableid = "own";
		$caption = "Owner's";
		$rno = "Row2";
		$temp = "checkown";
	} elseif ($que = strstr($table, 'deal')) {
		$header = "checkdeal";
		$tableid = "deal";
		$temp = "checkdeal";
		$rno = "Row";
		$caption = "Dealer's";
	} elseif ($que = strstr($table, 'map')) {
		$caption = "Map's";
		$header = "checkmap";
		$tableid = "map";
		$rno = "Row3";
		$temp = "map";
	} elseif ($que = strstr($table, 'huda')) {
		$header = "checkhuda";
		$caption = "Huda";
		$tableid = "huda";
		$rno = "Row4";
		$temp = "huda";
	} else {
		$tableid = $table;
		$temp = $table;
		$caption = $table;
	}

?>
	<div class="row">

		<table id="<?php echo $tableid ?>" class='table stripe table-sm hover multiple-select-row data-table-export wrap'>

			<caption><?php echo "Results based on " . $caption . " Query" ?></caption>
			<thead class="thead-light ">
				<tr>

					<?php
					if ($result) {

						while ($row = mysqli_fetch_assoc($result)) {

					?>
							<th style="display:none">value</th>
							<?php
							if ($row['Field'] != 'rid' and $row['Field'] != 'RID') {
							?>
								<th class="table-plus datatable-nosort">
									<?php
									echo strtoupper($row['Field']) . " ";
									?>
								</th>
							<?php
							} else {
								$var = $row['Field'];
							}
						}
						if (!($tableid == "map") && !($tableid == "huda")) {
							?>
							<th>Created by</th>
						<?php
						}
						?>
						<th>Links</th>

				</tr>
			</thead>



			<tbody>
				<?php
					}
					if ($result2) {
						while ($row2 = mysqli_fetch_assoc($result2)) {

							$add = 0;
							$maskValue = false;
							$maskEdit = false;


							if (!($tableid == "map") && !($tableid == "huda")) {
								$author = strtolower(getAuthor($row2['rid'], $table));
								if ($author !== strtolower(getUserById(getCurrentUser()))) {
									$maskEdit = true;
								}
								if (!canAccess($row2['rid'], $table)) {
									$maskValue = true;
								}
							}
							if (((isset($row2['interested'])) && strtoupper($row2['interested']) == 'Y') || (isset($row2['file']) && strtoupper($row2['file']) == 'Y')) {
				?>

						<tr id='<?php echo $row2[$var] ?>' class="table-success">

						<?php
							} else {
						?>
						<tr id='<?php echo $row2[$var] ?>' class="">

						<?php
							}


							foreach ($row2 as $key => $value) {


						?>

							<td class="table-plus" style="display:none" id='13'><?php echo $row2[$var] . ":" . $table ?></td>


							<?php

								if (strtoupper($key) != 'RID') {




							?>

								<td class="table-plus" id='<?php echo $add = $add + 1 ?>'>
									<?php

									//hide the values if cannot access

									if (strtoupper($key) == 'CONTACT') {
										$value = $value . " <a target=_BLANK href=https://wa.me/+91$value?text=Hi><i class='fa fa-whatsapp'></i></a>";
									}

									if ($maskValue && strtoupper($key) == 'NAME') {
										$value = '<span class="fa fa-ban text-danger"></span>';
									}
									if ($maskValue && strtoupper($key) == 'CONTACT') {
										$value = '<span class="fa fa-ban text-danger"></span>';
									}
									if ($maskValue && (strtoupper($key) == 'REMARK' || strtoupper($key) == 'REMARKS')) {
										$value = '<span class="fa fa-ban text-danger"></span>';
									}

									if (strtoupper($key) == 'DATE' or strtoupper($key) == 'DATED') {
										$value = date("Y-m-d ", strtotime($value));
									}

									if ($value == '') {
										$value = '-';
									}

									if ((strtoupper($key) == 'INTERESTED' or strtoupper($key) == 'FILE') and strtoupper($value) == 'Y') {

										echo "Yes";
									} else {
										echo $value;
									}


									?>

								</td>

							<?php
								}
							}
							if (!($tableid == "map") && !($tableid == "huda")) {

							?>
							<td>
								<?php
								// echo getAuthor($row2['rid'],$table);
								// echo "AUTHOR";
								echo $author;
								?>
							</td>
						<?php } ?>
						<td>
							<?php
							if (!$maskValue) {
								if (!$maskEdit || isAdmin()) {
							?>
									<a href="JavaScript:newPopup('<?php echo $newchar . $tableid ?>.php?id=<?php echo $row2[$var] ?>');" id="edit">
										<!-- <img src="media/images/edit.png" onclick="changeMe(this);" > -->
										<span class="fa fa-pencil" id="changeMe"><span></a>

								<?php
								}
								?>
								<a href="JavaScript:newPopup('<?php echo $newchar . $tableid . "web" ?>.php?id=<?php echo $row2[$var] ?>');" id="edit">
									<!-- <img src="media/images/upload.png" onclick="changeMe(this);" > -->
									<span class="fa fa-upload" id="changeMe"><span>
								</a>

							<?php
							} else {
							?>
								<a href="#" id="requestAccess" data-operation="requestAccess" data-table="<?php echo $table ?>" data-rid="<?php echo $row2[$var] ?>">
									<span title="Request Access" class="fa fa-user-plus"></span>
								</a>
							<?php
							}
							?>
						</td>

						</tr>


				<?php
							//}
						}
					}
				?>
			</tbody>

		</table>
	</div>
<?php

}


?>