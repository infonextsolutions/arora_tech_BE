<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from industrialdeal where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<script type="text/javascript">


</script>
<div id="demoWrapper">

	<ul>

		<div id="output1" class="info"></div>
	</ul>
	<hr />
	<h5 id="status"></h5>
	<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
		<div id="fieldWrapper">
			<span class="step" id="first">



				<table class="table">

					<input type="hidden" name="table" id="name" value="industrialdeal" class="required" rel="0" />
					<input type="hidden" name="id" id="name" value="<?php echo $id ?>" class="required" rel="0" />
					<tr>
						<th>
							<label for="Locality">*Locality</label>
						</th>
						<td>
							<input class="form-control   locality required" type="text" name="locality" id="locality" value="<?php echo $row['locality'] ?>" />
							<INPUT TYPE="hidden" id="table" value="industrialloc" />
						</td>
					</tr>

					<tr>
						<th>
							<label for="size">Property Address</label>
						</th>
						<td>
							<input class="form-control   flat" type="text" name="address" value="<?php echo $row['address'] ?>" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="size">Area </label>
						</th>
						<td>
							<input class="form-control   area required" type="text" name="area" value="<?php echo $row['area'] ?>" />

						</td>
					</tr>
					<tr>
						<th>
							<label for="size">Built-up Area</label>
						</th>
						<td>
							<input class="form-control   built" type="text" name="builtuparea" value="<?php echo $row['builtuparea'] ?>" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="demand">Demand</label>
						</th>
						<td>
							<input class="form-control   demand" type="text" name="demand" value="<?php echo $row['demand'] ?>" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="offer">Offer</label>
						</th>
						<td>
							<input class="form-control   offer" type="text" name="offer" value="<?php echo $row['offer'] ?>" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="name">Name</label>
						</th>
						<td>
							<input class="form-control   firstname required" type="text" name="name" value="<?php echo $row['name'] ?>" id="firstname" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="contact">Contact</label>
						</th>
						<td>
							<input class="form-control  " type="text" name="contact" value="<?php echo $row['contact'] ?>" id="phoneNumber_fi" />
						</td>
					</tr>


					<tr>
						<th>


							<label for="remark">Remark</label>
						</th>
						<td>

							<textarea name="remarks" rows="0" cols="0" class="form-control  " value=""><?php echo $row['remarks'] ?></textarea>
						</td>
					</tr>
					<tr>
						<th>
						</th>
						<th>

			</span>

			<div id="demoNavigation">
				<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
				<input id="back" value="Undo All" type="reset" class="btn btn-outline-danger" />


			</div>
			</th>
			</tr>
			</table>
	</form>

	<hr />

	<p id="data"></p>
</div>

</div>