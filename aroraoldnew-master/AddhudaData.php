<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";

?>

<head>


	<div id="demoWrapper" class="container">



		<div id="output1" class="info"></div>

		<hr />
		<h5 id="status"></h5>
		<h4>Insert HUDA Owner Record</h4>
		<div class="row mt-4">

			<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">





				<input type="hidden" name="table" id="name" value="hudalist" class="required" rel="0" />
				<table class="table">
					<tr>
						<th>

							<label for="sectorno">*Sector No</label>
						</th>
						<td>
							<input class="form-control   required" type="text" id="sectorno" name="sectorno" value="" />
						</td>



					</tr>
					<tr>
						<th>

							<label for="plotno">*Plot No</label>
						</th>
						<td>
							<input class="form-control   required" type="text" id="plotno" name="plotno" value="" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="name">*Name</label>
						</th>
						<td>
							<input class="required form-control  " type="text" name="name" value="" onclick="showUser(plotno.value,sectorno.value)" />
						</td>
					</tr>
				</table>


				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />
				</div>
			</form>
			<div id="road" class="col-sm-6"></div>
		</div>
		<hr />

		<p id="data"></p>
	</div>