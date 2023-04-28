<?php
include_once "./dbconnect.php";
?>
<div class="pre-loader"></div>
<div class="header clearfix">
	<div class="header-right">
		<div class="brand-logo">

			<a href="/index.php" class=""> Arorarealtech </a>

		</div>
		<div class="menu-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>

		<div class="user-info-dropdown">

			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon"><i class="fa fa-user-o"></i></span>
					<span class="user-name"><?php
											if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {
												echo $getuser[0]['username'];
											} else {
												echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
											} ?>
					</span>


				</a>
				<div class="dropdown-menu dropdown-menu-right">

					<?php
					if (isAdmin()) {
						?>
						<a class="dropdown-item" href="/auth/admin/index.php"><i class="fa fa-user-md" aria-hidden="true"></i> My Profile</a>
						<a href="/auth/admin/change_pass.php" class="dropdown-item"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a>
						<a href="/auth/admin/manage_users.php" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i>Manage Users</a>
						<a href="/auth/admin/register.php" class="dropdown-item"><i class="fa fa-user-plus" aria-hidden="true"></i>Register Users </a>

					<?php
					} else {
						?>
						<a class="dropdown-item" href="/auth/users/index.php"><i class="fa fa-user-md" aria-hidden="true"></i> My Profile</a>
						<a href="/auth/users/change_pass.php" class="dropdown-item"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a>
					<?php
					}

					?>
					<!-- <a class="dropdown-item" href="profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
						<a class="dropdown-item" href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a> -->
					<a class="dropdown-item" href="/auth/admin/log_off.php?action=logoff"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				</div>
			</div>
		</div>
		<div class="user-notification">
			<div class="dropdown">
				<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
					<i class="fa fa-bell" aria-hidden="true"></i>
					<span class="badge notification-active"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="notification-list mx-h-350 customscroll">
						<ul>
							<li class="my-3">
								<?php echo "<h6 class='clearfix text-blue'> Access requests pending with me </h6>";
								tablePendingRequest();
								?>
							</li>
							<li class="my-3">
								<?php

								echo "<h6 class='text-blue'> Access requests that I have approved </h6>";
								tableApprovedRequest();

								?>
							</li>
							<li class="my-3">
								<?php
								echo "<h6 class='text-blue'> Access requests that I have sent </h6>";
								tableMyRequest();
								?>
							</li>
							<!-- <li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>