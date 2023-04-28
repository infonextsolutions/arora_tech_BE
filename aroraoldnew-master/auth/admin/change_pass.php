<?php
//require_once('../lib/connections/db.php');
//include('../lib/functions/functions.php');
//include_once('../../footer.php');
include_once "../../auth.php";
include_once "../../include.php";
include_once('../../model.php');
include_once('../../include/header.php');
include_once('../../include/head.php');

checkLogin('1');

$getuser = getUserRecords($_SESSION['user_id']);

$id = '';
if (isset($_GET['id'])) {
	if (is_numeric($_GET['id'])) {
		$id = strip_tags($_GET['id']);
	}
}

$message = "";
if (isset($_GET['message'])) {
	$message = strip_tags($_GET['message']);
}

$error = "";
if (isset($_GET['error'])) {
	$error = strip_tags($_GET['error']);
}

$getuser = getUserRecords($_SESSION['user_id']);
$uid = $getuser[0]['id'];
?>


<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<html>



<body id="main_body">
	<!-- Begin Wrapper -->


	<div class="left-side-bar">
		<div class="brand-logo bg-primary">
			<a href="/index.php" class=""> Arorarealtech </a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">


					<li>
						<a href="index.php" name="Home" value="Home" class="dropdown-toggle no-arrow">
							<span class="fa fa-cogs"></span><span class="mtext">Edit Profile</span>
						</a>


					</li>


					<li>
						<a href="/auth/admin/change_pass.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-lock" aria-hidden="true"></span><span class="mtext"> Change Password</span>
						</a> </li>
					<li>
						<a href="/auth/admin/manage_users.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-users" aria-hidden="true"></span><span class="mtext">Manage Users</span>
						</a>
					</li>
					<li> <a href="/auth/admin/register.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-user-plus" aria-hidden="true"></span><span class="mtext">Register Users</span>
						</a>
					</li>



				</ul>



			</div>
		</div>
	</div>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Change Password</title>

		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />


		<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				$('#updatepassForm').submit(function(e) {
					updatepass();
					e.preventDefault();
				});
			});
		</script>
	</head>
	<br />
	<br />

	<body id="main_body">
		<!-- Begin Wrapper -->
		<div id="wrapper" class="container my-5">




			<p class="done">Password successfully changed.</p>
			<!--close done-->
			<div id="form_container">

				<h2>Change Password</h2>
				<hr>
				<table class="searchForm" border="0" align="center">
					<form id="updatepassForm" action="change_pass_submit.php" method="post">
						<tr>

							<td><label for="old password">Old Password:</label></td>
							<td><input name="oldpassword" type="password" /></td>
						</tr>
						<tr>
							<td></td>
						</tr>

						<tr>
							<td><label for="new password">New Password:</label></td>
							<td><input name="newpassword" type="password" /></td>
						</tr>
						<tr>
							<td><br /></td>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="submit" value="Change Password" class="btn btn-outline-primary" /><img id="loading" src="../images/loading.gif" alt="Updating.." /></td>
						</tr>
						<tr>
							<td colspan="2">
								<div id="error">&nbsp;</div>
							</td>
						</tr>
					</form>
				</table>
			</div>
			<!--close form-->


	</body>

	</html>