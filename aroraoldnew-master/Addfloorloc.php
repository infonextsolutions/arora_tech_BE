<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
?>

<div id="demoWrapper" class="container">

	<ul>

		<div id="output1" class="info"></div>
	</ul>
	<hr />
	<h5 id="status"></h5>
	<form class="col-sm-6" id="demoForm" method="POST" action="fine.php">

		<h6>Insert a floor Location Record</h6>


		<input type="hidden" name="table" id="name" value="floorloc" class="required" rel="0" />
		<INPUT TYPE="hidden" id="table" value="floorloc" />
		<div class="form-group">

			<label for="Locality">*Locality</label>


			<input class="form-control required" type="text" name="locality" id="locality" value="" />
			<INPUT TYPE="hidden" id="table" value="floorloc" />

		</div>
		<div class="form-group">

			<label for="remark">Remark</label>


			<textarea class="form-control" name="remarks"></textarea>

		</div>


		<div id="demoNavigation">
			<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
			<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />
		</div>
	</form>
	<hr />

	<p id="data"></p>
</div>