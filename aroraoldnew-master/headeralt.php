<!DOCTYPE html>
<?php
require_once "dbconnect.php";

?>




<body id="main_body">




	<!-- Begin Navigation -->
	<div id="leftcolumn">



		<div id="cssmenu">
			<!-- This is the Navigation		 
			   -->


			<ul>

				<li>
					Dealer Record</a>
				</li>

				<?php
				if (
					$_SESSION['header'] == 'industrial' || $_SESSION['header'] == 'rented'
					|| $_SESSION['header'] == 'build' || $_SESSION['header'] == 'society'
					|| $_SESSION['header'] == 'apartment' || $_SESSION['header'] == 'floor'
				) {
					?>
					<li>
						<a href="#" name="<?php echo $_SESSION['header'] ?>loc" onclick="JavaScript:newPopup('Add<?php echo $_SESSION['header'] ?>loc.php');" value="Insert New <?php echo $_SESSION['header'] ?> Location Record">
							<?php
							echo ucfirst($_SESSION['header']) ?> Location</a>
					</li>
				<?php
				}
				?>


			</ul>


			<!-- End Navigation -->
			<!-- </div>
</div> -->
			<!-- </body>
</html> -->
			<div class="left-side-bar">
				<div class="brand-logo bg-primary">
					<a href="/index.php" class=""> Arorarealtech </a>
				</div>
				<div class="menu-block customscroll">
					<div class="sidebar-menu">
						<ul id="accordion-menu">

							<!-- <li>
								<a href="index.php" name="Home" value="Home" class="dropdown-toggle no-arrow">
									<span class="fa fa-home"></span><span class="mtext">Home</span>
								</a>

							</li> -->


							<li>
								<a href="index.php" name="Home" value="Home" class="dropdown-toggle no-arrow">
									<span class="fa fa-home"></span><span class="mtext">Plots</span>
								</a>


							</li>

							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="fa fa-desktop"></span><span class="mtext"> Residential </span>
								</a>
								<ul class="submenu">

									<li><a href="society.php">Society</a></li>
									<li><a href="apartment.php">Apartments</a></li>
									<li><a href="floor.php">Floors</a></li>
									<li><a href="build.php">Built-up</a></li>
								</ul>
							</li>
							<li>
								<a href="rented.php" name="Rented" value="Rented" class="dropdown-toggle no-arrow">
									<span class="fa fa-truck"></span><span class="mtext">Rented</span>
								</a>


							</li>
							<li>
								<a href="agricultural.php" name="Agricultural" value="Agricultural" class="dropdown-toggle no-arrow">
									<span class="fa fa-tree"></span><span class="mtext">Agricultural</span>
								</a>


							</li>
							<li>
								<a href="commercial.php" name="Commercial" value="Commercial" class="dropdown-toggle no-arrow">
									<span class="fa fa-building"></span><span class="mtext">Commercial</span>
								</a>


							</li>
							<li>
								<a href="institutional.php" name="Institutional" value="Institutional" class="dropdown-toggle no-arrow">
									<span class="fa fa-building"></span><span class="mtext">Institutional</span>
								</a>


							</li>
							<hr>
							<li>
								<a href="<?php echo $_SESSION['header'] ?>.php" class="dropdown-toggle no-arrow" name="Search" value="Search">

									<span class="fa fa-calendar-o"></span><span class="mtext">Search <?php echo ucwords($_SESSION['header']) ?></span>
								</a>
							</li>

							<li>
								<a href="#" name="<?php echo $_SESSION['header'] ?>own" class="dropdown-toggle no-arrow" onclick="JavaScript:newPopup('Add<?php echo $_SESSION['header'] ?>own.php');" value="Insert Owner Record">
									<span class="fa fa-table"></span><span class="mtext">Insert Owner record</span>
								</a>

							</li>


							<li>
								<a href="#" name="<?php echo $_SESSION['header'] ?>deal" class="dropdown-toggle no-arrow" onclick="JavaScript:newPopup('Add<?php echo $_SESSION['header'] ?>deal.php');" value="Insert dealer Record">
									<span class="fa fa-pencil"></span><span class="mtext">Insert Dealer record</span>
								</a>

							</li>
							<hr>
							<li>
								<div class="input-group px-4 my-3">
									<input type="text" class="form-control" id="find_id_input" placeholder="Search Property id" name="search" />
									<div class="input-group-append">
										<a href="#output_find" rel="leanModal" name="output_find" id="find_id_submit" class="btn btn-info btn-sm">
											<span class="fa fa-search"></span>
										</a>
									</div>
								</div>



							</li>
							<hr>
						</ul>

						<div class="modal fade bs-example-modal-lg" id="prop-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myLargeModalLabel">Result</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<div class="modal-body">
										<div id="output_find">
											<p>Please input the Property Id in the search Box to search</p>
										</div>
									</div>
									<!-- <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


</body>

</html>