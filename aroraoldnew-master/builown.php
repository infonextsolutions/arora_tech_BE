<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from buildown where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<!-- <script type="text/javascript">
	$(document).ready(function() {
		$("#locality").autocomplete("autocomp.php?table=buildloc&fld=locality", {
			width: 260,
			matchContains: true,
			mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
		});
	});
</script> -->
<div id="demoWrapper">

	<ul>

		<div id="output1" class="info"></div>
	</ul>
	<hr />
	<h5 id="status"></h5>
	<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
		<div id="fieldWrapper"><span class="step" id="first">


				<table class="table">

					<input type="hidden" name="table" id="name" value="buildown" class="required" rel="0" />
					<input type="hidden" name="id" id="name" value="<?php echo $row['rid'] ?>" class="required" rel="0" />

					<tr>
						<th>
							<label for="Locality">*Locality</label>
						</th>
						<td>
							<input class="form-control   locality required" type="text" name="locality" id="locality" value="<?php echo $row['locality'] ?>" />
							<INPUT TYPE="hidden" id="table" value="buildloc" />
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
						<th><label for="build">Built Up</label><br /></th>
						<td>
							<INPUT TYPE="radio" NAME="buildup" VALUE="simplex" <?php if (strtolower($row['buildup']) == 'Simplex') echo 'checked'; ?>>Simplex<br />
							<INPUT TYPE="radio" NAME="buildup" VALUE="Duplex" <?php if (strtolower($row['buildup']) == 'duplex') echo 'checked'; ?> />Duplex<br />
							<INPUT TYPE="radio" NAME="buildup" VALUE="Floorwise" <?php if (strtolower($row['buildup']) == 'floorwise') echo 'checked'; ?> />Floorwise<br />
							<INPUT TYPE="radio" NAME="buildup" VALUE="floorwise-stilt" <?php if (strtolower($row['buildup']) == 'floorwise-stilt') echo 'checked'; ?> />Floorwise with stilt<br />
							<INPUT TYPE="radio" NAME="buildup" VALUE="double-story" <?php if (strtolower($row['buildup']) == 'double-story') echo 'checked'; ?> />Double story<br />
						</td>
					</tr>
					<tr>
					<tr>
						<th>
							<label for="size">Property Address</label>
						</th>
						<td>
							<input class="form-control   flat" type="text" name="address" value="<?php echo $row['address'] ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="Basement">Basement</label>
						</th>
						<td>
							<div class="highlight"><input class="input_field_25em" type="radio" name="basement" value="Y" <?php if ($row['basement'] == 'Y') echo 'checked'; ?>>Yes</>
								<input class="input_field_25em" type="radio" name="basement" value="N" <?php if ($row['basement'] == 'N') echo 'checked'; ?>>No </>
						</td>
		</div>
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
			<th><label for="interested">Interested</label>
			</th>
			<td>
				<div class="highlight"><input class="input_field_25em" type="radio" name="interested" value="Y" <?php if ($row['interested'] == 'Y') echo 'checked'; ?>>Yes</>
					<input class="input_field_25em" type="radio" name="interested" value="N" <?php if ($row['interested'] == 'N' || $row['interested'] == '-') echo 'checked'; ?>>No </>
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