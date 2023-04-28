<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
?>
<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<body>
	<script>
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


	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">

			<span class="step" id="first">



				<span class="highlighth1">Insert a Floor Owner's Record</span>
				<input type="hidden" name="table" id="name" value="floorown" class="required" rel="0" />

				<div class="form-group">

					<label for="Locality">*Locality</label>


					<input class="form-control locality required" type="text" name="locality" id="locality" value="" />
					<INPUT TYPE="hidden" id="table" value="floorloc" />

				</div>
				<div class="form-group">

					<label for="size">Size</label>


					<input class="form-control size" type="text" name="size" value="-" />

				</div>
				<div class="form-group">

					<label for="name">*Name</label>

					<input class="form-control firstname required" type="text" name="name" value="" id="firstname" />

				</div>
				<div class="form-group">

					<label for="name">Address</label>

					<input class="form-control address " type="text" name="address" value="" id="address" />

				</div>
				<div class="form-group">
					<label for="contact">*Contact</label>

					<input class="form-control required" type="text" name="contact" value="" id="phoneNumber_fi" />

				</div>
				<div class="form-group">
					<label for="demand">Demand</label>

					<input class="form-control demand " type="text" name="demand" value="0" />

				</div>
				<div class="form-group">
					<label for="offer">Offer</label>

					<input class="form-control" type="text" name="offer" value="-" />

				</div>
				<div class="form-group">
					<label for="interested">Interested</label>

					<input class="" type="checkbox" name="interested" value="Y" />

				</div>
				<div class="form-group">

					<label for="check">Cheque</label>


					<div class="highlight">
						<input class="" type="radio" name="cheque" value="Circle" checked="yes">Circle
						<input class="" type="radio" name="cheque" value="Max">Max
						<input class="" type="radio" name="cheque" value="Low">Low
					</div>

				</div>
				<div class="form-group">


					<label for="floor">*Floor</label>

					<select name="floor" class="form-control required">
						<option value="ground"></option>
						<option value="basement">Basement</option>
						<option value="ground">Ground</option>
						<option value="basement+ground">Basement+ground</option>
						<option value="first">First</option>
						<option value="second">Second</option>
						<option value="first-stilt">First-stilt</option>
						<option value="second-stilt">Second-stilt</option>
						<option value="third-stilt">Third-stilt</option>
						<option value="fourth-stilt">Fourth-stilt</option>
						<option value="basement+grnd-stilt">Basement + Ground with stilt</option>

						<option value="others">Others</option>
					</select>

				</div>
				<div class="form-group">
					<label for="remarks">Remark</label>

					<textarea name="remarks" rows="0" cols="0" class="form-control"></textarea>

				</div>


			</span>

			<div id="demoNavigation">


				<input id="next" value="Save" type="submit" class="btn btn-primary" />
				<input id="back" value="Reset" type="reset" class="btn btn-danger" />
			</div>
		</form>
		<hr />

		<p id="data"></p>
	</div>

</body>

</html>