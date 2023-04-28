<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
?>
<!DOCTYPE html>
<html>

<head>

	<div id="demoWrapper" class="container">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>

		<form id="demoForm" method="POST" action="fine.php" class="row">
			<div class="col-sm-6">
				<span class="highlighth1">Insert a Rented Owner's Record</span>



				<input type="hidden" name="table" id="name" value="rentedown" class="required" rel="0" />
				<div class="form-group">

					<label for="Locality">*Locality</label>


					<input class="form-control locality required" type="text" name="locality" id="locality" value="" />
					<INPUT TYPE="hidden" id="table" value="rentedloc" />

				</div>
				<div class="form-group">

					<label for="size">Tenant Name</label>


					<input class="form-control flat" type="text" name="tenant" value="-" />

				</div>
				<div class="form-group">

					<label for="size">*Area (A) </label>


					<input class="form-control area required" id="area" type="text" name="area" onchange="chg()" value="" />Sq Feet


				</div>
				<div class="form-group">

					<label for="size">*Rent/Sq Ft (B)</label>


					<input class="form-control rent required" type="text" id="rent" name="rent" value="" onchange="chg()" />

				</div>

				<div class="form-group">

					<label for="demand">*Return in %(D)</label>


					<input class="form-control return required" type="text" id="return" name="return" value="1" onchange="chg()" />

				</div>
				<div class="form-group">

					<label for="name">*Name</label>


					<input class="form-control firstname required" type="text" name="name" value="" id="firstname" />

				</div>
				<div class="form-group">

					<label for="contact">Contact</label>


					<input class="form-control " type="text" name="contact" value="" id="phoneNumber_fi" />

				</div>

				<div class="form-group">

					<label for="file">Interested</label>


					<input class="form-control" type="checkbox" name="interested" value="" />

				</div>

				<div class="form-group">



					<label for="remark">Remark</label>



					<textarea name="remarks" rows="0" cols="0" class="form-control"></textarea>

				</div>
				<div class="form-group">







					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />



				</div>
			</div>
			<div class="col-sm-6">
				<div style="border: 1px solid #dddddd; background-color: #fff;">
					<h2 style="margin:20px 30px;text-align:center;font-size:16px;border:1px solid #dddddd;width:80%;">Rental Value Calculations</h2>


					<div class="form-group">
						<th style="font-size: 12px;">Rent/month (C=A*B)</th>
						<input class="form-control" name="monthlyrent" type="text" id="output" value="" readonly="readonly" style="width:6.5em;background-color:#ebebeb;font-size: 12px;" /></td>
						<th style="font-size: 12px;">Value ((C*12)/D% )</th>
						<input class="form-control" type="text" id="outputval" name="demand" value="" readonly="readonly" style="width:6.5em;background-color:#ebebeb;font-size: 12px;" /></td>
					</div>

					<p id="data"></p>
				</div>
			</div>

		</form>


		<hr />

		<p id="data"></p>
	</div>

	</div>