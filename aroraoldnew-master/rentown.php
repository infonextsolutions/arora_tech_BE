<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from rentedown where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>


	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
			<div id="fieldWrapper"><span class="step" id="first">

					<table class="table">

						<input type="hidden" name="table" id="name" value="rentedown" class="required" rel="0" />
						<input type="hidden" name="id" id="name" value="<?php echo $id ?>" class="required" rel="0" />
						<tr>
							<th><label for="Locality">*Locality</label></th>
							<td><input class="form-control   locality required" type="text" name="locality" id="locality" value="<?php echo $row['locality'] ?>" /></td>
							<INPUT TYPE="hidden" id="table" value="rentedloc" />
						</tr>
						<tr>
							<th><label for="size">Tenant Name</label></th>
							<td><input class="form-control   flat" type="text" name="tenant" value="<?php echo $row['tenant'] ?>" /></td>
						</tr>
						<tr>
							<th><label for="size">*Area (A) </label></th>
							<td><input class="form-control   area required" id="area" type="text" name="area" onchange="chg()" value="<?php echo $row['area'] ?>" />Sq Feet</td>
						</tr>
						<tr>
							<th><label for="size">*Rent/Sq Ft (B)</label></th>
							<td><input class="form-control   rent required" type="text" id="rent" name="rent" value="<?php echo $row['rent'] ?>" onchange="chg()" /></td>
						</tr>

						<tr>
							<th><label for="demand">*Return in %(D)</label></th>
							<td><input class="form-control   return required" type="text" id="return" name="return" value="<?php echo $row['return'] ?>" onchange="chg()" /></td>
						</tr>
						<tr>
							<th><label for="name">*Name</label></th>
							<td><input class="form-control   firstname required" type="text" name="name" value="<?php echo $row['name'] ?>" id="firstname" /></td>
						</tr>
						<tr>
							<th><label for="contact">*Contact</label></th>
							<td><input class="form-control   required" type="text" name="contact" value="<?php echo $row['contact'] ?>" id="phoneNumber_fi" /></td>
						</tr>

						<tr>
							<th><label for="Interested">Interested</label>
							</th>
							<td>
								<div class="highlight"><input class="input_field_25em" type="radio" name="interested" value="Y" <?php if ($row['interested'] == 'Y') echo 'checked'; ?>>Yes</>
									<input class="input_field_25em" type="radio" name="interested" value="-" <?php if ($row['interested'] == '-') echo 'checked'; ?>>Cannot Say </>
							</td>
			</div>
			</tr>

			<tr>
				<th><label for="remark">Remark</label></th>
				<td>

					<textarea name="remarks" rows="0" cols="0" class="form-control  " value=""><?php echo $row['remarks'] ?></textarea>
				</td>
			</tr>
			<tr>
				<th></th>
				<th></span>

					<div id="demoNavigation"><input id="next" value="Save" type="submit" class="btn btn-outline-primary" /> <input id="back" value="Reset" type="reset" class="btn btn-outline-primary" /></div>
				</th>
			</tr>
			</table>
			<div style="position: absolute; left: 50px; margin-top: 35px; border: 1px solid #dddddd; background: #f2f5f7; color: #362b36;">
				<h2 style="margin: 20px 30px; font-size:16px;text-align: center; border: 1px solid #dddddd; width: 80%;">Rental
					Value Calculations</h2>

				<table class="table">
					<tr>
						<th style="font-size: 12px;">Rent/month (C=A*B)</th>
						<td><input class="form-control  " name="monthlyrent" type="text" id="output" value="<?php echo $row['monthlyrent'] ?>" readonly="readonly" style="width: 6.5em; background-color: #ebebeb; font-size: 12px;" /></td>
						<th style="font-size: 12px;">Value ((C*12)/D% )</th>
						<td><input class="form-control  " type="text" id="outputval" name="demand" value="<?php echo $row['demand'] ?>" readonly="readonly" style="width: 6.5em; background-color: #ebebeb; font-size: 12px;" /></td>
					</tr>
				</table>
				<p id="data"></p>
			</div>
		</form>

		<hr />

		<p id="data"></p>
	</div>

	</div>