<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from hudalist where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);


?>

<head>
	<style type="text/css">
		#popupwindow {
			position: absolute;
			top: 490px;
			left: 10px;

		}
	</style>
</head>

<body>
	<div id="demoWrapper">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" action="Updateflooralt.php" class="col-sm-6">
			<div id="fieldWrapper">
				<span class="step" id="first">




					<div id="road" style="padding-left:100px;"> </div>
					<table class="table">
						<tr>
							<th>
								<?php

								if ($_SESSION['form'] == 'HUDA') {
									?>
									<label for="sectorno">*Sector No</label>
								</th>
								<td>
									<input class="required  form-control  " type="text" name="sectorno" id="sectorno" value="<?php echo $row['sectorno'] ?>" />
								</td>

							<?php
							} else {

								?>

								<label for="sectorno">*Phase</label>
								</th>
								<td>
									<select name="sectorno" id="sector">
										<?php

										sector();
										?>
									</select>
								</td>

							<?php

							}

							?>

						</tr>
						<input type="hidden" name="table" id="name" value="hudalist" class="required" rel="0" />
						<input type="hidden" name="id" id="name" value="<?php echo $id ?>" class="required" rel="0" />
						<tr>
							<th>
								<label for="plotno">*Plotno</label>
							</th>
							<td>
								<input class="form-control   plotno required" type="text" name="plotno" id="plotno" value="<?php echo $row['plotno'] ?>" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="name">*Name</label>
							</th>
							<td>
								<input class="form-control   name required" type="text" id="firstname" value="<?php echo $row['name'] ?>" onclick="showUser(plotno.value,sectorno.value)" name="name" />
							</td>
							<td>
								<a style="color:white;padding:7px 4px;border:none;" class="btn btn-outline-primary" onclick="showUser(plotno.value,sectorno.value)">More Details </a>
							</td>
						</tr>




						<tr>
							<th>
							</th>
							<th>

				</span>

				<div id="demoNavigation">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Undo All" type="reset" class="btn btn-outline-danger" />


				</div>
				</th>
				</tr>
				</table>
		</form>


	</div>

	</div>

</body>

</html>