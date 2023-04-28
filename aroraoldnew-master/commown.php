<!DOCTYPE html>
<html>

<body>
	<div id="demoWrapper">



		<div id="output1" class="info"></div>

		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
			<div id="fieldWrapper">
				<span class="step" id="first">
					<?php
					include_once 'dbconnect.php';
					include_once "model.php";
					include_once "include/head.php";
					$id = $_GET['id'];
					$result = mysqli_query($GLOBALS['db'], "Select * from commercialown where RID='$id'") or die(mysqli_error($GLOBALS['db']));
					$row = mysqli_fetch_assoc($result);
					?>

					<table class="table">

						<input type="hidden" name="table" id="name" value="commercialown" class="required" rel="0" />
						<input type="hidden" name="id" id="name" value="<?php echo $row['rid'] ?>" class="required" rel="0" />

						<tr>
							<th>
								<label for="Locality">*Locality</label>
							</th>
							<td>
								<input class="form-control   locality required" type="text" name="locality" id="locality" value="<?php echo $row['locality'] ?>" />
								<INPUT TYPE="hidden" id="table" value="commercialloc" />
							</td>
						</tr>
						<tr>
							<th><label for="category">Category</label>
							</th>
							<td>
								<select name="category" class="form-control  ">
									<option value="sco" <?php if ($row['category'] == 'sco') echo 'selected'; ?>>Sco</option>
									<option value="shop" <?php if ($row['category'] == 'shop') echo 'selected'; ?>>Shop</option>
									<option value="booth" <?php if ($row['category'] == 'booth') echo 'selected'; ?>>Booth</option>
									<option value="other" <?php if ($row['category'] == 'other') echo 'selected'; ?>>Others</option>
								</select>
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
								<label for="check">Cheque</label>
							</th>
							<td>
								<div class="highlight">
									<input class="input_field_25em" type="radio" name="cheque" value="Circle" <?php if (strtolower($row['cheque']) == 'circle') echo 'checked'; ?>>Circle
									<input class="input_field_25em" type="radio" name="cheque" value="Max" <?php if (strtolower($row['cheque']) == 'max') echo 'checked'; ?>>Max
									<input class="input_field_25em" type="radio" name="cheque" value="Flexible" <?php if (strtolower($row['cheque']) == 'flexible') echo 'checked'; ?>>Flexible
							</td>
			</div>
			</tr>
			<tr>
				<th><label for="interested">Interested</label>
				</th>
				<td>
					<div class="highlight"><input class="input_field_25em" type="radio" name="interested" value="Y" <?php if ($row['interested'] == 'Y') echo 'checked'; ?>>Yes</>
						<input class="input_field_25em" type="radio" name="interested" value="-" <?php if ($row['interested'] == '-') echo 'checked'; ?>>Cannot Say </>
				</td>
	</div>
	</tr>
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

</body>

</html>