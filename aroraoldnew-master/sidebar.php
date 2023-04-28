<?php
include_once "dbconnect.php";
?>

<body>


	<div class="left-side-bar">
		<div class="brand-logo bg-primary">
			<a href="/index.php" class=""> Arorarealtech </a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">


					<!-- 
					<li>
						<a href="index.php" name="Search" value="Search" class="dropdown-toggle no-arrow">

							<span class="fa fa-calendar-o"></span><span class="mtext">Search</span>
						</a>
					</li> -->


					<!-- <li >
                    <a href="#" name="InsertMap" onclick="JavaScript:newPopup('AddmapData.php');" value="Insert Map Location Record" class="dropdown-toggle no-arrow">
                    <span class="fa fa-pencil"></span><span class="mtext">Insert Map record</span>
						</a>
						
                    </li>
                    <li >
                    <a href="#" name="InsertHuda" onclick="JavaScript:newPopup('AddhudaData.php');" value="Insert HUDA Owner Record" class="dropdown-toggle no-arrow">
                    <span class="fa fa-pencil"></span><span class="mtext">Insert Huda record</span>
						</a>
						
                    </li> -->

					<!-- <li >
                    <a href="Addlinks.php" name="Inserlink"  value="Insert New Sector Record" class="dropdown-toggle no-arrow">
                    <span class="fa fa-pencil"></span><span class="mtext">Insert new sector record</span>
						</a>
						
                    </li> -->
					<!-- <li >
                    <a href="upload.php" name="Insertimg" " value="Insert Sector Image" class="dropdown-toggle no-arrow">
                    <span class="fa fa-pencil"></span><span class="mtext">Insert sector image</span>
						</a>
						
                    </li> -->



					<li>
						<a href="index.php" name="Home" value="Home" class="dropdown-toggle no-arrow">
							<span class="fa fa-cogs"></span><span class="mtext">Plots</span>
						</a>


					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-industry"></span><span class="mtext"> Residential </span>
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
							<span class="fa fa-institution"></span><span class="mtext">Institutional</span>
						</a>


					</li>
					<hr>
					<li>
						<a href="#" name="InsertOwner" onclick="JavaScript:newPopup('AddownData.php');" value="Insert Owner Record" class="dropdown-toggle no-arrow">
							<span class="fa fa-table"></span><span class="mtext">Insert Owner record</span>
						</a>

					</li>


					<li>
						<a href="#" name="InsertDealer" onclick="JavaScript:newPopup('AdddealData.php');" value="Insert dealer Record" class="dropdown-toggle no-arrow">
							<span class="fa fa-pencil"></span><span class="mtext">Insert Dealer record</span>
						</a>

					</li>
					<li>
						<a href="#" name="Huda" onclick="JavaScript:newPopup('AddhudaData.php');" value="Insert Huda Record" class="dropdown-toggle no-arrow">
							<span class="fa fa-building"></span><span class="mtext">Insert Huda record</span>
						</a>

					</li>
					<li>
						<a href="#" name="Map" onclick="JavaScript:newPopup('AddmapData.php');" value="Insert Map Record" class="dropdown-toggle no-arrow">
							<span class="fa fa-map"></span><span class="mtext">Insert Map record</span>
						</a>

					</li>
					<li>
						<a href="#" name="Map" onclick="JavaScript:newPopup('upload.php');" value="Add image" class="dropdown-toggle no-arrow">
							<span class="fa fa-upload"></span><span class="mtext">Upload a map</span>
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