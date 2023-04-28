<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from floordeal where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<script type="text/javascript">
	// $(document).ready(function() {
	//         $("#locality").autocomplete("autocomp.php?table=floorloc&fld=locality", {
	//                 width: 260,
	//                 matchContains: true,
	//                 mustMatch: true,
	//                  //minChars: 0,
	//                 //multiple: true,
	//                 //highlight: false,
	//                 //multipleSeparator: ",",
	//                 selectFirst: false
	//         });
	// });
</script>
<div id="demoWrapper" class='container'>

	<ul>

		<div id="output1" class="info"></div>
	</ul>
	<hr />
	<h5 id="status"></h5>
	<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
		<div id="fieldWrapper"><span class="step" id="first">


				<table class="table">

					<input type="hidden" name="table" id="name" value="floordeal" class="required" rel="0" />
					<input type="hidden" name="id" id="name" value="<?php echo $row['rid'] ?>" class="required" rel="0" />

					<tr>
						<th>
							<label for="Locality">*Locality</label>
						</th>
						<td>
							<input class="form-control   locality required" type="text" name="locality" id="locality" value="<?php echo $row['locality'] ?>" />
							<INPUT TYPE="hidden" id="table" value="floorloc" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="size">Size </label>
						</th>
						<td>
							<input class="form-control   area required" type="text" name="size" value="<?php echo $row['size'] ?>" />

						</td>
					</tr>
					<tr>
						<th>
							<label for="floor">*Floor</label>
						</th>
						<td>
							<select name="floor" class="form-control   floor required">
								<option value="ground" <?php if ($row['floor'] == 'ground') echo 'selected'; ?>></option>
								<option value="basement" <?php if ($row['floor'] == 'basement') echo 'selected'; ?>>Basement</option>
								<option value="ground" <?php if ($row['floor'] == 'ground') echo 'selected'; ?>>Ground</option>
								<option value="first" <?php if ($row['floor'] == 'first') echo 'selected'; ?>>First</option>
								<option value="second" <?php if ($row['floor'] == 'second') echo 'selected'; ?>>Second</option>
								<option value="basement+ground" <?php if ($row['floor'] == 'basement+ground') echo 'selected'; ?>>Basement+ground</option>
								<option value="first-stilt" <?php if ($row['floor'] == 'first-stilt') echo 'selected'; ?>>First-stilt</option>
								<option value="second-stilt" <?php if ($row['floor'] == 'second-stilt') echo 'selected'; ?>>Second-stilt</option>
								<option value="third-stilt" <?php if ($row['floor'] == 'third-stilt') echo 'selected'; ?>>Third-stilt</option>
								<option value="fourth-stilt" <?php if ($row['floor'] == 'fourth-stilt') echo 'selected'; ?>>Fourth-stilt</option>
								<option value="basement+grnd-stilt" <?php if ($row['floor'] == 'basement+grnd-stilt') echo 'selected'; ?>>Basement+ground with stilt</option>
								<option value="others" <?php if ($row['floor'] == 'others') echo 'selected'; ?>>Others</option>
							</select>
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
						<th><label for="file">File</label>
						</th>
						<td>
							<div class="highlight"><input class="input_field_25em" type="radio" name="file" value="Y" <?php if ($row['file'] == 'Y') echo 'checked'; ?>>Yes</>
								<input class="input_field_25em" type="radio" name="file" value="N" <?php if ($row['file'] == 'N') echo 'checked'; ?>>No </>
						</td>
		</div>
		</tr>
		<tr>
			<th><label for="check">Cheque</label>
			</th>
			<td>
				<div class="highlight">
					<input class="input_field_25em" type="radio" name="cheque" value="Circle" <?php if (strtolower($row['cheque']) == 'circle') echo 'checked'; ?>>Circle</>
					<input class="input_field_25em" type="radio" name="cheque" value="Max" <?php if (strtolower($row['cheque']) == 'max') echo 'checked'; ?>>Max</>
					<input class="input_field_25em" type="radio" name="cheque" value="Flexible" <?php if (strtolower($row['cheque']) == 'flexible') echo 'checked'; ?>>Flexible</>
			</td>
</div>
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
		<label for="size">Property Address</label>
	</th>
	<td>
		<input class="form-control   flat" type="text" name="address" value="<?php echo $row['address'] ?>" />
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
	<th><label for="remark">Remark</label></th>
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
			<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />

		</div>
	</th>
</tr>
</table>
<p id="data"></p>
</div>
</form>

<hr />
</div>

</div>