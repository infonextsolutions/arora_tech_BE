<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php
	// require_once('../lib/connections/db.php');
	// include('../lib/functions/functions.php');
	include_once "../../auth.php";
	include_once "../../include.php";
	include_once('../../model.php');
	include_once('../../include/header.php');
	include_once('../../include/head.php');
	include_once('../lib/functions/ps_pagination.php');
	include_once('../../footer.php');

	use \auth\lib\functions\PS_Pagination;

	checkLogin('1');

	$message = "";
	if (isset($_GET['message'])) {
		$message = strip_tags($_GET['message']);
	}

	$error = "";
	if (isset($_GET['error'])) {
		$error = strip_tags($_GET['error']);
	}

	$getuser = getUserRecords($_SESSION['user_id']);
	?>
	!DOCTYPE html>
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
	<div class="container">


		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />


		<!-- <link rel="stylesheet" type="text/css" href="../../media/css/demo_table.css" media="screen" /> -->

		<!-- <script type="text/javascript" language="javascript" src="../../media/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js"></script> -->

		<script type="text/javascript">
			$(document).ready(function() {
				$('#users').dataTable();
			});
		</script>

		</head>


		<!-- Begin Wrapper -->


		<!-- Begin Header -->
		<br>
		<br>
		<br>
		<?php


		//Select all users and display paginated results
		$sql = "SELECT * FROM users WHERE level_access != 1";
		$res = mysqli_query($db, $sql) or die(mysqli_error($db));
		$numRows = mysqli_num_rows($res);
		if ((mysqli_num_rows($res)) > 0) {

			//$pager = new PS_Pagination($db, $sql, 10, 5, "");

			?>
			<p>There are <?php echo $numRows; ?> users on this site.</p>
			<?php if (!empty($message)) {
				echo "<div class='message'>" . $message . "</div>";
			} ?>
			<?php if (!empty($error)) {
				echo "<div id='error'>" . $error . "</div>";
			} ?>
			<div class="my-5">
				<table class="table table-striped" id="users">
					<thead>
						<tr>
							<th>Username</th>
							<th>Names</th>
							<th>Email</th>

							<th>Registration Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$countLoop = 0;
						//   $rs = $pager->paginate();

						$rs = $res;

						if (!$rs) die(mysqli_error($db));
						while ($row = mysqli_fetch_array($rs)) {

							if ($row['active'] == 1) {
								$active = "<span style='color:#008040;'>Active</span>";
							}
							if ($row['active'] == 2) {
								$active = "<span style='color:#f40000;'>Suspended</span>";
							}
							?>
							<tr>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
								<td><?php echo $row['email']; ?></td>

								<td><?php echo $row['reg_date']; ?></td>
								<td><?php echo $active; ?></td>
								<td>

									<a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a> |
									<a href="admin_actions_submit.php?id=<?php echo $row['id']; ?>&action=delete">Delete</a> |
									<a href="change_user_pass.php?id=<?php echo $row['id']; ?>">Change Password</a> |
									<?php if ($row['active'] == 0) {

										echo "<a href='../confirm_user_reg.php?prsn=" . $row['username'] . "'>Activate</a>";
									} ?>|
									<?php if ($row['active'] == 1) {
										echo "<a href='admin_actions_submit.php?id=" . $row['id'] . "&action=suspend'>Suspend</a>";
									} ?>
									<?php if ($row['active'] == 2) {
										echo "<a href='admin_actions_submit.php?id=" . $row['id'] . "&action=unsuspend'>Unsuspend</a>";
									} ?></td>
							</tr>
							<?php $countLoop++;
						} ?>
					</tbody>
				</table>
			</div>

		<?php } else {
			echo "<fieldset><p>There are currently no registered users!</p></fieldset>";
		} ?>
	</div>
</body>

</html>