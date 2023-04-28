<!DOCTYPE html>
<html>

<head>
	<?php include('model.php'); ?>
	<?php include('include/header.php'); ?>
	<?php include('include/head.php'); ?>
	<?php include('sidebar.php'); ?>



</head>

<body>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title my-4">
								<h6><span class="fa fa-exclamation-circle "></span><?php echo " You are viewing properties of category " . $_GET['category']; ?></h6>
							</div>
							<?php
							if ($_GET['category']) {
								$_SESSION['category'] = $_GET['category'];
							}

							?>


						</div>
						<!-- <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div> -->
					</div>
				</div>


				<!-- multiple select row Datatable End -->
				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<?php

					if ($_GET['sectorno'] != NULL) {
					?>

					<?php
						list($bet, $que) = mapquery('images', 'hudalist');
						FormImages($bet);
					}


					if ($_GET['sectorno'] != NULL and $_GET['plotno'] != NULL) {

						list($bet, $que) = mapquery('maplocation', 'hudalist');
					?>
						<div class="col-sm-12 text-right">
							<?php
							prevbu();
							nextbu();

							?>
						</div>

					<?php

						tablebuildalt('maplocation', $bet);

						tablebuildalt('hudalist', $que);
					}

					// echo "</div>";

					$join = FALSE;
					foreach ($_REQUEST as $key => $value) {
						if ((strtolower($key) == 'parkface' or strtolower($key) == 'directi' or strtolower($key) == 'cornerplot'
							or strtolower($key) == 'roadwid') and $value != NULL) {


							$join = TRUE;
						}
					}
					if (!$join) {
						list($bet, $que) = querybuild('resiplotown', 'resiplotdeal');
					} else {

						list($bet, $que) =	queryjoin('resiplotown', 'resiplotdeal');
					}

					tablebuildalt('resiplotown', $bet);

					tablebuildalt('resiplotdeal', $que);

					?>

				</div>
				<!-- Export Datatable End -->
			</div>

		</div>
	</div>

	<script src="src/scripts/controller.js"></script>
</body>

</html>