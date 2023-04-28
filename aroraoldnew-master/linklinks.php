<!DOCTYPE html>
<html>
<?php
include_once 'dbconnect.php';
include_once "model.php";
$id = $_GET['id'];
$result = mysqli_query($GLOBALS['db'], "Select * from links where RID='$id'") or die(mysqli_error($GLOBALS['db']));
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
						<input type="hidden" name="table" id="name" value="links" class="required" rel="0" />
						<input type="hidden" name="id" id="name" value="<?php echo $id ?>" class="required" rel="0" />
						<tr>
							<th>
								<label for="sector">*Sector</label>
							</th>
							<td>
								<input class="form-control   sector required" type="text" name="sector" id="filter_sector" value="<?php echo $row['sector'] ?>" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="name">*Name</label>
							</th>
							<td>
								<input class="form-control   name required" type="text" id="firstname" value="<?php echo $row['name'] ?>" name="name" />
							</td>

						</tr>

						<tr>
							<th>
								<label for="filter">*Filter</label>
							</th>
							<td>
								<input class="form-control   filter required" type="text" id="filter" value="<?php echo $row['filter'] ?>" name="filter" />
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

	<script type="text/javascript">
		$(document).ready(function() {


			$("input#next").click(function() {

				if (!isNaN($("#filter_sector").val())) {
					alert('The Sector field cannot be pure number, like 24 please make it sector24 or phase24');
					$("#filter_sector").val('');
					$("#filter_sector").focus();
					return false;
				} else {
					return true;
				}

			});


		});
	</script>

</body>

</html>