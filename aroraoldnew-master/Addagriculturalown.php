<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<script type="text/javascript">


	</script>

	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
			<div id="fieldWrapper">
				<span class="step" id="first">



					<div class="highlighth1">Insert an Agricultural owner's Record</div>
					<table class="table">

						<input type="hidden" name="table" id="name" value="agriculturalown" class="required" rel="0" />
						<div class="form-group">

							<label for="Locality">*Locality</label>


							<input class="form-control locality required" type="text" name="locality" id="locality" value="" />
							<INPUT TYPE="hidden" id="table" value="agriculturalloc" />

						</div>
						<div class="form-group">
							<label for="category">Category</label>


							<span><?php
									if (isset($_SESSION['agri'])) {
										echo "<input  name='category' id='category' class='impor form-control' readonly='true' value=" . $_SESSION['agri'] . " />";
									} else {
										?></span>
								<select name="category" class="form-control">
									<option value="raw" checked="yes">Raw</>
									<option value="farmhouse">Farmhouse</>
									<option value="commercialfsi">Commercial FSI</>
									<option value="residentialfsi">Residential FSI</>
								</select>
							<?php
							} ?>

						</div>
						<div class="form-group">

							<label for="size">Property Address</label>


							<input class="form-control flat" type="text" name="address" value="-" />

						</div>
						<div class="form-group">

							<label for="size">Area </label>


							<input class="form-control area required" type="text" name="area" value="-" />


						</div>
						<div class="form-group">

							<label for="name">Name</label>


							<input class="form-control firstname required" type="text" name="name" value="" id="firstname" />

						</div>
						<div class="form-group">

							<label for="contact">Contact</label>


							<input class="form-control" type="text" name="contact" value="" id="phoneNumber_fi" />

						</div>
						<div class="form-group">

							<label for="demand">Demand</label>


							<input class="form-control demand" type="text" name="demand" value="" />

						</div>
						<div class="form-group">

							<label for="offer">Offer</label>


							<input class="form-control offer" type="text" name="offer" value="" />

						</div>
						<div class="form-group">
							<label for="interested">Interested</label>

							<input class="form-control" type="checkbox" name="interested" value="Y" />

						</div>
						<div class="form-group">
							<label for="check">Cheque</label>


							<div class="highlight">
								<input class="input_field_25em" type="radio" name="cheque" value="Circle" checked="yes">Circle</>
								<input class="input_field_25em" type="radio" name="cheque" value="Max">Max</>
								<input class="input_field_25em" type="radio" name="cheque" value="Flexible">Flexible</>

							</div>
						</div>
						<div class="form-group">



							<label for="remark">Remark</label>



							<textarea name="remarks" rows="0" cols="0" class="form-control"></textarea>

						</div>
						<div class="form-group">




				</span>

				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />

				</div>

			</div>
			</table>
		</form>

		<hr />

		<p id="data"></p>
	</div>

	</div>