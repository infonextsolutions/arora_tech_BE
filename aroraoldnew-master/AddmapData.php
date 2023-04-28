<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";

?>


<div id="demoWrapper">


	<div id="output1" class="info"></div>

	<hr />
	<h5 id="status"></h5>
	<div class="row">
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
			<div id="fieldWrapper">




				<h4>Insert a Map Location Record </h4>
				<input type="hidden" name="table" id="name" value="maplocation" class="required" />
				<table class="table">

					<tr>
						<th>

							<label>*Sector No</label>
						</th>
						<td>
							<input class="form-control   required" type="text" id="sectorno" name="sectorno" value="" />
						</td>


					</tr>
					<tr>
						<th><label>*Plot No</label>
						</th>
						<td> <input class="form-control   required" type="text" id="plotno" name="plotno" value="" />
						</td>
					</tr>
					<tr>
						<th>
							<label>Size</label>
						</th>

						<td>
							<input type="text" name="size" class="form-control" onclick="showUser(plotno.value,sectorno.value)" />
						</td>


					</tr>
					<tr>
						<th>
							<label>Road Width</label>
						</th>
						<td><input type="text" name="roadwid" class="form-control" />
						</td>
					</tr>
					<tr>
						<th>
							<label>Park Facing</label>
						</th>
						<td><INPUT TYPE="checkbox" NAME="parkface" VALUE="Y" />
						</td>
					</tr>
					<tr>
						<th><label>Corner Plot</label>
						</th>
						<td><INPUT TYPE="checkbox" NAME="cornerplotpr" VALUE="Y"></INPUT>
						</td>
					</tr>
					<tr>
						<th><label>Direction</label>
						</th>
						<td><select name="directi">
								<option value="NORTH">North</option>
								<option value="SOUTH">South</option>
								<option value="EAST">East</option>
								<option value="WEST">West</option>
								<option value="NORTHEAST">North East</option>
								<option value="SOUTHEAST">South East</option>
								<option value="NORTHWEST">North West</option>
								<option value="SOUTHWEST">South West</option>
							</select>
						</td>
					</tr>
				</table>







				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />
				</div>
			</div>
		</form>
		<div id="road" class="col-sm-6"></div>
		<div>
			<hr />

			<p id="data"></p>
		</div>

</html>