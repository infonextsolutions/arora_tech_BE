<?php
require_once('../lib/connections/db.php');
include('../lib/functions/functions.php');
include_once('../../footer.php');

checkLogin('2');

$getuser = getUserRecords($_SESSION['user_id']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Edit <?php $getuser[0]['username']; ?>'s Profile.</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../media/css/view.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../media/css/template.css" media="screen" />
	<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#editprofileForm').submit(function(e) {
				editprofile();
				e.preventDefault();
			});
		});
	</script>
</head>

<body id="main_body">
	<!-- Begin Wrapper -->
	<div id="wrapper">

		<!-- Begin Header -->
		<div id="header">

			<a href="index.php">
				<h3>Arora RealTech </h3>
				<h4>Property Management System</h4>
			</a>

			<p class="signature">User: <?php if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {
											echo $getuser[0]['username'];
										} else {
											echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
										} ?></p>


		</div>
		<div align="right"><a href="/index.php">Home</a> | <?php if (!empty($getuser[0]['thumb_path'])) {
																echo "<a href='index.php'>Manage My Photo</a> | ";
															} else {
																echo "<a href='upload_photo.php'>Upload Photo</a> | ";
															} ?><a href="change_pass.php">change password</a> | <a href="edit_profile.php">Edit Profile</a> | <a href="log_off.php?action=logoff">sign out</a></div>
		<br />
		<br />
		<p align="center" class="done">Profile updated successfully.</p>
		<!--close done-->
		<div class="form" id="form_container">
			<h2>Edit Profile</h2>
			<hr />
			<form id="editprofileForm" action="edit_profile_submit.php" method="post">

				<div class="form-group">
					<label for="first_name">First Name:</label><input class="form-control" type="text" name="first_name" value="<?php if (isset($getuser[0]['first_name'])) {
																																	echo $getuser[0]['first_name'];
																																} ?>" />
				</div>
				<div class="form-group">
					<label for="last_name"><label>Last Name:</label><input class="form-control" type="text" name="last_name" value="<?php if (isset($getuser[0]['last_name'])) {
																																		echo $getuser[0]['last_name'];
																																	} ?>" />
				</div>
				<div class="form-group">
					<label for="email"><label>Email:</label><input class="form-control" type="text" name="email" value="" />

				</div>
				<div class="form-group">
					<label for="currentmail"><label>Current Email:</label>
						<span class="label"> <?php echo $getuser[0]['email']; ?></span>
				</div>
				<div class="form-group">
					<label for="dialing_code"><label>Dialing Code:</label><?php get_dialing_code($_SESSION['user_id']); ?>
				</div>
				<div class="form-group">
					<label for="phone"><label>Phone:</label><input class="form-control" type="text" name="phone" value="<?php if (isset($getuser[0]['phone'])) {
																															echo $getuser[0]['phone'];
																														} ?>" />
				</div>
				<div class="form-group">
					<label for="city"><label>City/Town:</label><input class="form-control" type="text" name="city" value="<?php if (isset($getuser[0]['city'])) {
																																echo $getuser[0]['city'];
																															} ?>" />
				</div>
				<div class="form-group">
					<label for="country"><label>Country:</label><?php get_select_countries($_SESSION['user_id']); ?>
				</div>
				<div class="form-group">
					&nbsp;<input type="submit" name="editprofile" value="Update" class="btn btn-outline-primary" /><img id="loading" src="../images/loading.gif" alt="Updating.." />
				</div>
				<div class="form-group">
					<td colspan="2">
						<div id="error">&nbsp;</div>
				</div>

			</form>
		</div>
		<!--close form-->
	</div>
</body>

</html>