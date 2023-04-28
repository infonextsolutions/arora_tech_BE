<?php
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#locality").autocomplete("autocomp.php?table=industrialloc&fld=locality", {
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



					<span class="highlighth1">Insert an Industrial Owner's Record</span>
					<table class="table">

						<input type="hidden" name="table" id="name" value="industrialown" class="required" rel="0" />
						<tr>
							<th>
								<label for="Locality">*Locality</label>
							</th>
							<td>
								<input class="form-control   locality required" type="text" name="locality" id="locality" value="" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="size">Property Address</label>
							</th>
							<td>
								<input class="form-control   flat" type="text" name="address" value="-" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="size">*Area </label>
							</th>
							<td>
								<input class="form-control   area required" type="text" name="area" value="-" />Sq Feet

							</td>
						</tr>
						<tr>
							<th>
								<label for="size">Built-up Area</label>
							</th>
							<td>
								<input class="form-control   built" type="text" name="builtuparea" value="-" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="name">*Name</label>
							</th>
							<td>
								<input class="form-control   firstname required" type="text" name="name" value="" id="firstname" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="contact">*Contact</label>
							</th>
							<td>
								<input class="form-control   required" type="text" name="contact" value="" id="phoneNumber_fi" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="demand">*Demand</label>
							</th>
							<td>
								<input class="form-control   demand required" type="text" name="demand" value="" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="offer">Offer</label>
							</th>
							<td>
								<input class="form-control   offer" type="text" name="offer" value="" />
							</td>
						</tr>

						<tr>
							<th>


								<label for="remark">Remark</label>
							</th>
							<td>

								<textarea name="remarks" rows="0" cols="0" class="form-control  "></textarea>
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
		</form>

		<hr />

		<p id="data"></p>
	</div>

	</div>