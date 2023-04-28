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
		$id = secureInput($_GET['id']);
	}
}

$getuser = getUserRecords($id);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Change User Password</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />



	<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#updatepassForm').submit(function(e) {
				updateuserpass();
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
	<br>
	<!-- Begin Wrapper -->
	<div id="wrapper" class="my-5 container">

		<!-- Begin Header -->

		<h2>Change
			<?php if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {
				echo $getuser[0]['username'];
			} else {
				echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
			} ?>s'
			password.</h2>
		<div class="done">
			<p>Password successfully changed.
			</p>
			<p><a href="manage_users.php">Click here</a> to continue managing users.</p>
		</div>
		<!--close done-->
		<div class="form">

			<hr />
			<table class="table searchForm" border="0" align="center">
				<form id="updatepassForm" action="change_user_pass_submit.php" method="post">
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
					<tr>
						<td><label for="new password">New Password:</label></td>
						<td><input name="newpassword" type="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" class="btn btn-outline-primary" name="submit" value="Change Password" />
							<img id="loading" src="../images/loading.gif" alt="Updating.." /></td>
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