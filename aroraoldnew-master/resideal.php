<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from resiplotdeal where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);


?>

<head>
	<style type="text/css">
		#popupwindow {
			position: absolute;
			top: 5%;
			right: 5%;

		}
	</style>
</head>

<body>
	<div id="demoWrapper" class="container">

		<ul>

			<div id="output1" class="text-info font-weight-bold"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="Updateflooralt.php" class="">
			<div id="fieldWrapper">
				<span class="step" id="first">




					<div id="road"> </div>
					<table class="table table-responsive">



						<tr>
							<th><label for="sectorno">*Sectorno</label></th>
							<td><input class="required  form-control  " type="text" name="sectorno" id="sectorno" value="<?php echo $row['sectorno'] ?>" /></td>

						</tr>
						<input type="hidden" name="table" id="name" value="resiplotdeal" class="required" rel="0" />
						<input type="hidden" name="id" id="name" value="<?php echo $id ?>" class="required" rel="0" />
						<tr>
							<th>
								<label for="plotno">*Plotno</label>
							</th>
							<td>
								<input class="form-control   plotno required" type="text" name="plotno" id="plotno" value="<?php echo $row['plotno'] ?>" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="name">*Name</label>
							</th>
							<td>
								<input class="form-control   name required" type="text" id="firstname" value="<?php echo $row['name'] ?>" onclick="showUser(plotno.value,sectorno.value)" name="name" />
							</td>
							<td>
								<a class="btn btn-outline-primary" onclick="showUser(plotno.value,sectorno.value)">More Details </a>
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
								<label for="demand">Demand</label>
							</th>
							<td>
								<input class="form-control   demand" type="text" name="demand" value="<?php echo $row['demand'] ?>" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="offer">Offered</label>
							</th>
							<td>
								<input class="form-control   offered" type="text" name="offered" value="<?php echo $row['offered'] ?>" />
							</td>
						</tr>

						<tr>
							<th><label for="File">File</label>
							</th>
							<td>
								<div class="highlight">
									<input class="input_field_25em" type="radio" name="file" value="Y" <?php if (strtolower($row['file']) == 'y') echo 'checked'; ?>>Yes</>
									<input class="input_field_25em" type="radio" name="file" value="N" <?php if (strtolower($row['file']) == 'n') echo 'checked'; ?>>No </>
									<input class="input_field_25em" type="radio" name="file" value="N" <?php if (strtolower($row['file']) == '-') echo 'checked'; ?>>Dont know </>
							</td>
						</tr>
						<tr>
							<th><label for="File">Builtup</label>
							</th>
							<td>

								<div class="highlight"><input class="input_field_25em" type="radio" name="builtup" value="Y" <?php if (strtolower($row['builtup']) == 'y') echo 'checked'; ?>>Yes</>
									<input class="input_field_25em" type="radio" name="builtup" value="-" <?php if (strtolower($row['builtup']) == 'n' || strtolower($row['builtup']) == '-') echo 'checked'; ?>>Dont know </>
							</td>
						</tr>
						<tr>
							<th><label for="check">Cheque</label>
							</th>
							<td>
								<div class="highlight">
									<input class="input_field_25em" type="radio" name="cheque" value="Circle" <?php if (strtolower($row['cheque']) == 'circle') echo 'checked'; ?>>Circle</>
									<input class="input_field_25em" type="radio" name="cheque" value="Max" <?php if (strtolower($row['cheque']) == 'max') echo 'checked'; ?>>Max</>
									<input class="input_field_25em" type="radio" name="cheque" value="Flexible" <?php if (strtolower($row['cheque']) == 'low') echo 'checked'; ?>>Low</>
							</td>
			</div>
			</tr>
			<tr>
				<th>


					<label for="remark">Remark</label>
				</th>
				<td>

					<textarea name="remark" rows="0" cols="0" class="form-control  " value=""><?php echo $row['remark'] ?></textarea>
				</td>
			</tr>
			<tr>
				<th>
				</th>
				<th>



					<div id="demoNavigation">
						<input id="next" value="Save" type="submit" class="btn btn-primary" />
						<input id="back" value="Undo All" type="reset" class="btn btn-danger" />


					</div>
				</th>
			</tr>
			</table>
		</form>


	</div>

	</div>

</body>

</html>