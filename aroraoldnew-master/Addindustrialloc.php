<?php
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>

	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="fine.php" class="col-sm-6">
			<div id="fieldWrapper">
				<span class="step" id="first">



					<span class="highlighth1">Insert an Industrial Location Record</span>
					<table class="table">

						<input type="hidden" name="table" id="name" value="industrialloc" class="required" rel="0" />
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
								<label for="remark">Remark</label>
							</th>
							<td>
								<textarea name="remarks" rows="0" cols="0" class="form-control  "></textarea>
							</td>
						</tr>
					</table>

				</span>

				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />
				</div>
		</form>
		<hr />

		<p id="data"></p>
	</div>

	</div>