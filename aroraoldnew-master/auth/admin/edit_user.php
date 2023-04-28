<?php
include_once "../../auth.php";
include_once "../../include.php";
include_once('../../model.php');
include_once('../../include/header.php');
include_once('../../include/head.php');
include_once('../lib/functions/ps_pagination.php');
include_once('../../footer.php');

checkLogin('1');
$id = 0;
if (isset($_GET['id'])) {
	if (is_numeric($_GET['id'])) {
		$id = strip_tags($_GET['id']);
	}
}

$getuser = getUserRecords($id);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Edit <?php echo $getuser[0]['username']; ?>'s Profile.</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />


	<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#edituserForm').submit(function(e) {
				edituser();
				e.preventDefault();
			});
		});
	</script>
</head>





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
	<br>
	<br>
	<!-- Begin Wrapper -->
	<div id="wrapper" class="container my-5">


		<div class="done">
			<p>Profile updated successfully.</p>
			<p><a href="manage_users.php">Click here</a> to continue managing users.</p>
		</div>
		<!--close done-->
		<div id="form_container">
			<div class="form">

				<form id="edituserForm" action="edit_user_submit.php" method="post">
					<h2>Edit <?php if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {
									echo $getuser[0]['username'];
								} else {
									echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
								} ?>'s profile.</h2>

					<input type="hidden" name="id" value="<?php $id; ?>" />
					<table class="table">
						<tr>
							<td><label for="first_name">First Name:</label></td>
							<td><input type="text" name="first_name" value="<?php if (isset($getuser[0]['first_name'])) {
																				echo $getuser[0]['first_name'];
																			} ?>" /></td>
						</tr>
						<tr>
							<td><label for="last_name"><label>Last Name:</label></td>
							<td><input type="text" name="last_name" value="<?php if (isset($getuser[0]['last_name'])) {
																				echo $getuser[0]['last_name'];
																			} ?>" /></td>
						</tr>
						<tr>
							<td><label for="email"><label>Email:</label></td>
							<td><input type="text" name="email" value="" />
								Current: <?php echo $getuser[0]['email']; ?></td>
						</tr>
						<select name="dialing_code" hidden>
							<option selected="91">91</option>
						</select>
						<tr>
							<td><label for="phone"><label>Phone:</label></td>
							<td><input type="text" name="phone" value="<?php if (isset($getuser[0]['phone'])) {
																			echo $getuser[0]['phone'];
																		} ?>" /></td>
						</tr>
						<tr>
							<td><label for="city"><label>City/Town:</label></td>
							<td><input type="text" name="city" value="<?php if (isset($getuser[0]['city'])) {
																			echo $getuser[0]['city'];
																		} ?>" /></td>
						</tr>
						<select name="country" hidden>
							<option selected="India">India</option>
						</select>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" class="btn btn-outline-primary" name="editprofile" value="Update" /><img id="loading" src="../images/loading.gif" alt="Updating.." /></td>
						</tr>
						<tr>
							<td colspan="2">
								<div id="error">&nbsp;</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<!--close form-->
		</div>
	</div>
</body>

</html>