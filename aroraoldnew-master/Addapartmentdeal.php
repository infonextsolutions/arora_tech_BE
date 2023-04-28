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
	<!-- <script type="text/javascript">
		$(document).ready(function() {
			$("#locality").autocomplete("autocomp.php?table=apartmentloc&fld=locality", {
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
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
			<div id="fieldWrapper">


				<span class="highlighth1">Insert Apartment Dealer's Record</span>


				<input type="hidden" name="table" id="name" value="apartmentdeal" class="required" rel="0" />
				<div class="form-group">

					<label for="Locality">*Locality</label>


					<input class="form-control locality required" type="text" name="locality" id="locality" value="" />
					<INPUT TYPE="hidden" id="table" value="apartmentloc" />

				</div>
				<div class="form-group">

					<label for="size">Floor eg 1st,2nd etc</label>


					<input class="form-control flat" type="text" name="floor" value="-" />

				</div>
				<div class="form-group">

					<label for="size">Area</label>


					<input class="form-control area" type="text" name="area" value="-" />
				</div>

				<div class="form-group">

					<label for="size">Accomodation</label>


					<input class="form-control accomodation" type="text" name="accomodation" value="-" />

				</div>
				<div class="form-group">

					<label for="name">*Name</label>


					<input class="form-control firstname required" type="text" name="name" value="" id="firstname" />

				</div>
				<div class="form-group">

					<label for="contact">*Contact</label>


					<input class="form-control required" type="text" name="contact" value="" id="phoneNumber_fi" />

				</div>
				<div class="form-group">

					<label for="demand">*Demand</label>


					<input class="form-control demand required" type="text" name="demand" value="" />

				</div>

				<div class="form-group">

					<label for="file">File</label>


					<input class="" type="checkbox" name="file" value="" />

				</div>
				<div class="form-group">
					<label for="check">Cheque</label>


					<div class="form-check">
						<input class="" type="radio" name="cheque" value="Circle" checked="yes">Circle</>
						<input class="" type="radio" name="cheque" value="Max">Max</>
						<input class="" type="radio" name="cheque" value="Flexible">Flexible</>

					</div>
				</div>
				<div class="form-group">



					<label for="remark">Remark</label>



					<textarea name="remarks" rows="0" cols="0" class="form-control"></textarea>


				</div>




				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />

				</div>

		</form>

		<hr />

		<p id="data"></p>
	</div>

	</div>
</body>

</html>