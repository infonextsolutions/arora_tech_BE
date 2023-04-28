<?php
include_once 'dbconnect.php';
include_once "model.php";
include_once "include/head.php";
?>
<!DOCTYPE html>
<html>

<head>

	<div id="demoWrapper" class="container ">

		<ul>

			<div id="output1" class="info"></div>
		</ul>
		<hr />
		<h5 id="status"></h5>
		<form id="demoForm" method="POST" class="col-sm-6" action="fine.php">


			<div class="highlighth1">Insert a Commercial Owner's Record</div>

			<input type="hidden" name="table" id="name" value="commercialown" class="required" rel="0" />
			<div class="form-group">

				<label for="Locality">*Locality</label>


				<input class="form-control locality required" type="text" name="locality" id="locality" value="" />
				<INPUT TYPE="hidden" id="table" value="commercialloc" />

			</div>
			<div class="form-group">
				<label for="category">Category</label>


				<span><?php
						if (isset($_SESSION['comm'])) {
							echo "<input  name='category' id='category' class='impor form-control' readonly='true' value=" . $_SESSION['comm'] . " />";
						} else {
							?></span>
					<select name="category" class="form-control">
						<option value="sco">SCO</>
						<option value="booth">Booth</>
						<option value="shop">Shop</>
						<option value="other">Others</>
					</select>
				<?php
				} ?>

			</div>
			<div class="form-group">

				<label for="size">Property Address</label>


				<input class="form-control flat" type="text" name="address" value="-" />

			</div>
			<div class="form-group">

				<label for="size">Area </label>


				<input class="form-control area required" type="text" name="area" value="-" />


			</div>
			<div class="form-group">

				<label for="size">Built-up Area</label>


				<input class="form-control built" type="text" name="builtuparea" value="-" />

			</div>
			<div class="form-group">

				<label for="name">Name</label>


				<input class="form-control firstname required" type="text" name="name" value="" id="firstname" />

			</div>
			<div class="form-group">

				<label for="contact">Contact</label>


				<input class="form-control" type="text" name="contact" value="" id="phoneNumber_fi" />

			</div>
			<div class="form-group">

				<label for="demand">Demand</label>


				<input class="form-control demand" type="text" name="demand" value="" />

			</div>
			<div class="form-group">

				<label for="offer">Offer</label>


				<input class="form-control offer" type="text" name="offer" value="" />

			</div>
			<div class="form-group">
				<label for="interested">Interested</label>

				<input class="" type="checkbox" name="interested" value="Y" />

			</div>
			<div class="form-group">
				<label for="check">Cheque</label>


				<div class="form-check">
					<input class="" type="radio" name="cheque" value="Circle" checked="yes">Circle</>
					<input class="" type="radio" name="cheque" value="Max">Max</>
					<input class="" type="radio" name="cheque" value="Flexible">Flexible</>

				</div>
			</div>
			<div class="form-group">



				<label for="remark">Remark</label>



				<textarea name="remarks" class="form-control"></textarea>

			</div>
			<div class="form-group">



				<div id="demoNavigation" class="">
					<input id="next" value="Save" type="submit" class="btn btn-outline-primary" />
					<input id="back" value="Reset" type="reset" class="btn btn-outline-danger" />

				</div>

			</div>

		</form>

		<hr />

		<p id="data"></p>
	</div>



</html>