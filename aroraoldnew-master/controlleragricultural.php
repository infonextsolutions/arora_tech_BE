<?php
include_once "headeralt.php";
include_once "model.php";
include('include/header.php');
include_once('include/head.php');
if (isset($_REQUEST['category'])) {
	$_SESSION['agri'] = $_REQUEST['category'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<title>Property Management</title>
	<script src="src/scripts/controller.js"></script>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<?php

					list($bet, $que) = querybuild('agriculturalown', 'agriculturaldeal');
					tablebuildalt('agriculturalown', $bet);
					tablebuildalt('agriculturaldeal', $que);
					?>
				</div>
			</div>
		</div>
	</div>