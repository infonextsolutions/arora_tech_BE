<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<?php
include_once "../../auth.php";
include_once "../../include.php";
include_once('../../model.php');
include_once('../../include/header.php');
include_once('../../include/head.php');
include('../lib/functions/ps_pagination.php');


checkLogin('1');

$getuser = getUserRecords($_SESSION['user_id']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Change Password</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />






	<script type="text/javascript">
		$(document).ready(function() {

			$('#regForm').submit(function(e) {
				register();
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
	<div id="wrapper" class=" container my-5">



		<h3>Register</h3>
		<p>Use the form below to register.</p>


		<div class="done">
			<p>Registration successful! <a href="login.php">Click here</a> to login.</p>
		</div>
		<!--close done-->
		<div id="form_container" class="">
			<div class="form">
				<form id="regForm" action="reg_submit.php" method="post">
					<table align="center" class="table  searchForm">
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td>
								<label for="username">Username:</label>
							</td>
							<td>
								<input onclick="this.value='';" name="username" type="text" size="25" maxlength="8" value="<?php if (isset($_POST['username'])) {
																																echo $_POST['username'];
																															} ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<label for="password">Password:</label>
							</td>
							<td>
								<input name="password" type="password" size="25" maxlength="15" />
							</td>
						</tr>
						<tr>
							<td>
								<label for="email">Email:</label>
							</td>
							<td>
								<input onclick="this.value='';" name="email" type="text" size="25" maxlength="50" value="<?php if (isset($_POST['email'])) {
																																echo $_POST['email'];
																															} ?>" />
							</td>
						</tr>
						<tr>

							<td>
								<input type="submit" name="register" class="btn btn-outline-primary" value="Register" /><img id="loading" src="images/loading.gif" alt="working.." />
							</td>
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
</body>

</html>