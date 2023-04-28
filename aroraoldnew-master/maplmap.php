<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from maplocation where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);
$row = array_change_key_case($row, CASE_LOWER);

?>

<head>

</head>

<body>

	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
			<div id="fieldWrapper">
				<span class="step" id="first">



					<input type="hidden" name="table" id="name" value="maplocation" class="required" rel="0" />
					<input type="hidden" name="id" id="name" value="<?php echo $id ?>" class="required" rel="0" />
					<div id="road" style="padding-left:100px;"> </div>
					<table class="table">
						<tr>
							<th>

								<label>*Sector No</label>
							</th>
							<td>
								<input class="required  form-control  " type="text" name="sectorno" value="<?php echo $row['sectorno'] ?>" />
							</td>


						</tr>

						<tr>
							<th><label>*Plot No</label>
							</th>
							<td><input class="required form-control  " type="text" name="plotno" value="<?php echo $row['plotno'] ?>" />
							</td>
						</tr>
						<tr>
							<th>
								<label>Size</label>
							</th>
							<td><input class="required form-control  " type="text" name="size" value="<?php echo $row['size'] ?>" />

						</tr>
						<tr>
							<th>
								<label>Road Width</label>
							</th>
							<td><select name="roadwid" class="input_field_3.5em">
									<option VALUE="10m" <?php if ($row['roadwid'] == '10m') echo 'selected'; ?> />10M</option>
									<option VALUE="12m" <?php if ($row['roadwid'] == '12m') echo 'selected'; ?> />12M</option>
									<option VALUE="18m" <?php if ($row['roadwid'] == '18m') echo 'selected'; ?> />18M</option>
									<option VALUE="30m" <?php if ($row['roadwid'] == '30m') echo 'selected'; ?> />30M</option>
									<option VALUE="60m" <?php if ($row['roadwid'] == '60m') echo 'selected'; ?> />60M</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label>Park Facing</label>
							</th>
							<td>

								<select name="parkface">

									<option value="Y" <?php if (strtolower($row['parkface']) == 'y') echo 'selected'; ?>>Yes</option>
									<option value="N" <?php if (strtolower($row['parkface']) === 'n') echo 'selected'; ?>>No</option>
								</select>
							</td>
						</tr>
						<tr>
							<th><label>Corner Plot</label>
							</th>
							<td>
								<select name="cornerplot">
									<option value="Y" <?php if (strtolower($row['cornerplot']) == 'y') echo 'selected'; ?>>Yes</option>
									<option value="N" <?php if (strtolower($row['cornerplot']) == 'n') echo 'selected'; ?>>No</option>
								</select>

							</td>
						</tr>
						<tr>
							<th><label>Direction</label>
							</th>
							<td><select name="directi">
									<option value="NORTH" <?php if (strtoupper($row['directi']) == 'NORTH') echo 'selected'; ?>>North</option>
									<option value="SOUTH" <?php if (strtoupper($row['directi']) == 'SOUTH') echo 'selected'; ?>>South</option>
									<option value="EAST" <?php if (strtoupper($row['directi']) == 'EAST') echo 'selected'; ?>>East</option>
									<option value="WEST" <?php if (strtoupper($row['directi']) == 'WEST') echo 'selected'; ?>>West</option>
									<option value="NORTHEAST" <?php if (strtoupper($row['directi']) == 'NORTHEAST') echo 'selected'; ?>>North East</option>
									<option value="SOUTHEAST" <?php if (strtoupper($row['directi']) == 'SOUTHEAST') echo 'selected'; ?>>South East</option>
									<option value="NORTHWEST" <?php if (strtoupper($row['directi']) == 'NORTHWEST') echo 'selected'; ?>>North West</option>
									<option value="SOUTHWEST" <?php if (strtoupper($row['directi']) == 'SOUTHWEST') echo 'selected'; ?>>South West</option>
								</select>
							</td>
						</tr>
						<tr>
							<th></th>
							<td>

								<div id="demoNavigation">
									<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
									<input id="back" value="Undo All" type="reset" class="btn btn-outline-danger" />


								</div>
							</td>
						</tr>
					</table>
		</form>


	</div>


</body>

</html>