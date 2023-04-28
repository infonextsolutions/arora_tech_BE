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

	<div id="demoWrapper" class="container">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
			<div id="fieldWrapper">




				<h6>Insert a Built-up Owner's Record</h6>


				<div class="form-group">
					<input type="hidden" name="table" id="name" value="buildown" class="required" rel="0" />
					<label for="Locality">*Locality</label>
					<input class="form-control locality required" type="text" name="locality" id="locality" value="" />
					<INPUT TYPE="hidden" id="table" value="buildloc" />

				</div>
				<div class="form-group">
					<label for="size">Size</label>
					<input class="form-control size" type="text" name="size" value="0" />

				</div>



				<div class="form-group">

					<INPUT TYPE="radio" NAME="buildup" VALUE="Simplex" checked='checked' />Simplex
					<INPUT TYPE="radio" NAME="buildup" VALUE="Duplex" />Duplex
					<INPUT TYPE="radio" NAME="buildup" VALUE="Floorwise" />Floorwise
					<INPUT TYPE="radio" NAME="buildup" VALUE="Floorwise-stilt" />Floorwise-stilt
					<INPUT TYPE="radio" NAME="buildup" VALUE="Double-story" />Double-story

				</div>
				<div class="form-group">

					<label for="name">*Name</label>
					<input class="form-control firstname required" type="text" name="name" value="" id="firstname" />

				</div>
				<div class="form-group">
					<label for="Property Address">Property Address</label>
					<input class="form-control address" type="text" name="address" id="address" value="" />

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
					<label for="demand">Offer</label>

					<input class="form-control offer" type="text" name="offer" value="0" />

				</div>
				<div class="form-group">
					<label for="file">File</label>

					<input class="" type="checkbox" name="file" value="Y" />


				</div>
			</div>
			<div class="form-group">

				<label for="check">Cheque</label>


				<div class="highlight">
					<input class="" type="radio" name="cheque" value="Circle" checked="yes">Circle
					<input class="" type="radio" name="cheque" value="Max">Max
					<input class="" type="radio" name="cheque" value="Flexible">Flexible
				</div>

			</div>

			<div class="form-group">

				<label for="basement">Basement</label>
				<input class="" type="checkbox" name="basement" value="Y" />


			</div>
			<div class="form-group">
				<label for="remarks">Remark</label>
				<textarea name="remarks" rows="0" cols="0" class="form-control"></textarea>



			</div>


			<div id="demoNavigation" class="form-group">


				<input id="next" value="Save" type="submit" class="btn btn-primary" />
				<input id="back" value="Reset" type="reset" class="btn btn-danger" />
			</div>
		</form>
		<hr />

		<p id="data"></p>
	</div>

	</div>

</body>

</html>