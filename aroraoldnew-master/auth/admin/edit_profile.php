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

					$('#editprofileForm').submit(function(e) {
						editprofile();
						e.preventDefault();
					});
				});
			</script>
		</head>

		<body id="main_body" class="my-5">
			<!-- Begin Wrapper -->
			<div id="wrapper">

				<!-- Begin Header -->

				</td>
				<br />
				<br />
				<p align="center" class="done">Profile updated successfully.</p>
				<!--close done-->
				<div class="form" id="form_container">
					<h2>Edit Profile</h2>
					<hr />
					<form id="editprofileForm" action="edit_profile_submit.php" method="post" class="col-sm-6">

						<div class="form-group">
							<label for="first_name">First Name:</label>
							<input class="form-control" type="text" name="first_name" value="<?php if (isset($getuser[0]['first_name'])) {
																									echo $getuser[0]['first_name'];
																								} ?>" />
						</div>
						<div class="form-group">
							<label for="last_name">Last Name:</label><input class="form-control" type="text" name="last_name" value="<?php if (isset($getuser[0]['last_name'])) {
																																			echo $getuser[0]['last_name'];
																																		} ?>" />
						</div>
						<div class="form-group">
							<label for="email">Email:</label><input class="form-control" type="text" name="email" value="" />

						</div>
						<div class="form-group">
							<label for="currentmail">Current Email:</label>
							<span class="label"> <?php echo $getuser[0]['email']; ?></span>
						</div>



						<select name="dialing_code" hidden>
							<option selected="91">91</option>
						</select>

						<?php //get_dialing_code($_SESSION['user_id']); 
						?>

						<div class="form-group">
							<label for="phone">Phone:</label><input class="form-control" type="text" name="phone" value="<?php if (isset($getuser[0]['phone'])) {
																																echo $getuser[0]['phone'];
																															} ?>" />
						</div>
						<div class="form-group">
							<label for="city">City/Town:</label><input class="form-control" type="text" name="city" value="<?php if (isset($getuser[0]['city'])) {
																																echo $getuser[0]['city'];
																															} ?>" />
						</div>


						<select name="country" hidden>
							<option selected="India">India</option>
						</select>

						<?php //get_select_countries($_SESSION['user_id']); 
						?>

						<div class="form-group">
							<input type="submit" name="editprofile" value="Update" class="btn btn-outline-primary" /><img id="loading" src="../images/loading.gif" alt="Updating.." />
						</div>
						<div class="form-group">
							<td colspan="2">
								<div id="error"></div>
						</div>

					</form>
				</div>
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