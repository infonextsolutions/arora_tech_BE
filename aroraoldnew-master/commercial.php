<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<html>
<?php
include_once "model.php";
include('include/header.php');
include_once('include/head.php');
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['header'])) {
	unset($_SESSION['header']);
}
$_SESSION['header'] = 'commercial';
include_once "headeralt.php";
if (isset($_SESSION['comm'])) {
	unset($_SESSION['comm']);
}
?>


<body>

	<div class="container">

		<h6 class="text-center my-5 py-5">You are viewing the commercial properties</h6>




		<div class="row ">

			<div class="col-sm-5 card text-center">
				<a href="controllercommercial.php?category=sco"><img src="media/images/office.png" HEIGHT="100" WIDTH="100" alt="" /></a>
				<b>Sco</b></div>


			<div class="card col-sm-5 text-center"><a href="controllercommercial.php?category=booth"><img src="media/images/booth.png" HEIGHT="100" WIDTH="100" alt="" /></a>
				<b>Booth</b>
			</div>
		</div>

		<div class="row">
			<div class="card col-sm-5 text-center"><a href="controllercommercial.php?category=shop"><img src="media/images/shop.png" HEIGHT="100" WIDTH="100" alt="" /></a>
				<b>Shop</b></div>

			<div class="card col-sm-5 text-center"><a href="controllercommercial.php?category=other"><img src="media/images/other.png" HEIGHT="100" WIDTH="100" alt="" /></a>
				<b>Others</b></div>

		</div>
		<hr>
		</br>
		<h6 class="text-center my-3"> Or </h6>

		</br>
		<div class="text-center">
			<a href="#" class="btn btn-sm btn-outline-success " name="commercialloc" onclick="JavaScript:newPopup('Addcommercialloc.php');" value="Insert New commercial Location Record">
				<i class="fa fa-plus fa-lg"></i> New commercial Location</a>
		</div>
		</hr>





	</div>


</body>

</html>