<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
include_once 'dbconnect.php';
include_once 'model.php';
include_once 'include/head.php';

?>

<body>



	<div id="output1" class=""></div>
	<hr />
	<h5 id="status"></h5>
	<h4 class="text-center">Insert an dealer's Record</h4>
	<div class="row">

		<div class="col-md-6 ml-4">
			<form id="demoForm" method="POST" action="fine.php" class="">
				<input type="hidden" name="table" id="name" value="resiplotdeal" class="required" rel="0" />
				<div class="form-group">
					<label class="description">Category</label>
					<select class="custom-select " required name="category" id="category">
						<option value=""></option>
						<option value="Plots">Plots</option>
						<!--<option value="SocietyFlats">Society Flats</option>-->
						<!--<option value="Apartments">Apartments</option>-->
						<!--<option value="Floors">Floors</option>-->
						<!--<option value="Builtup">Builtup</option>-->
						<option value="Industrial">Industrial</option>
						<!--<option value="Commercial">Commercial</option>-->
						<!--<option value="Institutional">Institutional</option>-->
						<!--<option value="Agricultural">Agricultural</option>-->
						<!--<option value="Rented">Rented</option>-->
					</select>
				</div>
				<div class="form-group">
					<label for="sectorno">*Sector No</label>
					<input class="  typeahead form-control" required type="text" id="sectorno" name="sectorno" value="" />
				</div>
				<div class="form-group">
					<label for="plotno">*Plot No</label>
					<input class="form-control plotno " required type="text" id="plotno" name="plotno" value="" />
				</div>
				<div class="form-group">
					<label for="name">*Name</label>
					<input class="form-control firstname " required onclick="showUser(plotno.value,sectorno.value)" type="text" name="name" value="" id="firstname" />
				</div>
				<div class="form-group">
					<label for="demand">*Demand</label>
					<input class="form-control " required type="text" name="demand" value="" />
				</div>
				<div class="form-group">
					<label for="offered">Offered</label>
					<input class="form-control" type="text" name="offered" value="0" />
				</div>
				<div class="form-group">
					<label for="file">File</label>

					<input class="" type="radio" name="file" value="Y">Yes</>
					<input class="" type="radio" name="file" value="N">No</>
					<input class="" type="radio" name="file" checked value="-">Dont know</>
				</div>


				<div class="form-group ">
					<label for="interested">Builtup</label>
					<input class="" type="radio" name="builtup" value="Y">Yes</>
					<input class="" type="radio" name="builtup" value="-" checked>Dont know</>
				</div>
				<div class="form-group ">
					<label for="check">Cheque</label>
					<input class="" type="radio" name="cheque" value="Circle" checked="yes">Circle</>
					<input class="" type="radio" name="cheque" value="Max">Max</>
					<input class="" type="radio" name="cheque" value="Low">Low</>
				</div>

				<div class="form-group">
					<label for="contact">Contact</label>
					<input class="form-control " type="text" name="contact" value="-" id="phoneNumber_fi" />
				</div>

				<div class="form-group">
					<label for="remark">Remark</label>
					<textarea name="remark" rows="0" cols="0" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input id="" value="Save" type="submit" class="btn btn-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-danger" />
				</div>
		</div>
		</form>
		<div class="col-md-5 my-4">
			<div id="road" class=""></div>
		</div>
	</div>







</body>

</html>