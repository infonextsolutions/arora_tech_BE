<?php
//require_once('../lib/connections/db.php');
//include('../lib/functions/functions.php');
//include_once('../../footer.php');
include_once "../../auth.php";
include_once "../../include.php";
include_once('../../model.php');
include_once('../../include/header.php');
include_once('../../include/head.php');

checkLogin('2');

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
							<span class="fa fa-edit"></span><span class="mtext">Edit Profile</span>
						</a>


					</li>

					<li>
						<a href="change_pass.php" name="Home" value="Home" class="dropdown-toggle no-arrow">
							<span class="fa fa-cogs"></span><span class="mtext">Change password</span>
						</a>


					</li>


				</ul>



			</div>
		</div>
	</div>

	<div id="wrapper" class="container">



		<html xmlns="http://www.w3.org/1999/xhtml">

		<head>

			<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
			<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
			<!-- <link rel="stylesheet" type="text/css" href="../../media/css/view.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../../media/css/template.css" media="screen" /> -->

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

		<body id="main_body" class="my-5">
			<!-- Begin Wrapper -->
			<div id="wrapper">

				<!-- Begin Header -->


				<br />
				<br />
				<p class="done">Password successfully changed.</p>
				<!--close done-->
				<div class="form container" id="form_container">
					<h2>Change Password</h2>
					<hr />

					<form id="updatepassForm" class="col-sm-6" action="change_pass_submit.php" method="post">
						<div class="form-group">
							<label for="old password">Old Password:</label>
							<input class="form-control" name="oldpassword" type="password" />
						</div>
						<div class="form-group">
							<label for="new password">New Password:</label>
							<input class="form-control" name="newpassword" type="password" />
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-outline-primary" name="submit" value="Change Password" /><img id="loading" src="../images/loading.gif" alt="Updating.." />
						</div>
						<div class="form-group">

							<div id="error">&nbsp;</div>

						</div>
					</form>

				</div>
				<!--close form-->
				<!--close form-->
			</div>
		</body>

		</html>

		<?php //displayUserImg($getuser[0]['id']); 
		?>
	</div>
	</div>
	<?php
	if (isset($error)) {
		echo '<p align="center"><span style="color:#f40000; font-weight:bold;">' . $error . '</span></p>';
	}
	if (isset($message)) {
		echo '<p align="center"><span style="color:#008c00; font-weight:bold;">' . $message . '</span></p>';
	}
	?>

</body>

</html>