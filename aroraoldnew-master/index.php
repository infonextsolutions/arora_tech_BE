<!DOCTYPE html>

<?php
include_once "model.php";
include_once "sidebar.php";
include('include/header.php');
include_once('include/head.php');

if (isset($_REQUEST['q'])) {
  $_SESSION['form'] = $_REQUEST['q'];
}

?>

<head>

  <title>Residential</title>
</head>

<body>
  <script type="text/javascript">
    function check(input1, input2) {
      var checkbox2 = document.getElementById(input2);
      if (input1.checked == true)
        checkbox2.checked = false;
    }
  </script>



  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <!-- <div class="title">
								<h4><?php //echo "You have selected Residential Plots of " . $_SESSION['form']; 
                    ?></h4>
							</div>
							 -->
              <!-- <nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav> -->
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
          <!-- <div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Data Table with Export Buttons</h5>
						</div>
					</div> -->





          <div class="container" id="form_container">
            <!-- <h1><a>Plot Search</a></h1> -->
            <form name="searchform" id="searchform" action="controller.php" method="get" onsubmit="submitSearchForm()">


              <div class="form-group">
                <label class="description">Category</label>

                <select class="custom-select col-12" name="category">
                  <option value="Plots">Plots</option>
                  <!-- <option value="SocietyFlats">Society Flats</option>
                  <option value="Apartments">Apartments</option> -->
                  <!-- <option value="Floors">Floors</option>
                  <option value="Builtup">Builtup</option> -->
                  <option value="Industrial">Industrial</option>
                  <!-- <option value="Commercial">Commercial</option> -->
                  <!-- <option value="Institutional">Institutional</option> -->
                  <!-- <option value="Agricultural">Agricultural</option>
                  <option value="Rented">Rented</option> -->
                </select>
              </div>







              <?php
              // if($_SESSION['form']=="HUDA") {
              ?>
              <div class="form-group">
                <label class="description">Sector no</label>
                <div class="row">
                  <div class=" col-md-3 col-sm-12">
                    <input type="text" name="sectorno[]" id="sectorno" value="" class="typeahead form-control " />
                  </div>
                  <div class=" col-md-3 col-sm-12">
                    <input type="text" name="sectorno[]" value="" id="sectorno1" class="typeahead form-control " />
                  </div>
                  <div class=" col-md-3 col-sm-12">
                    <input type="text" name="sectorno[]" value="" id="sectorno2" class="typeahead form-control " />
                  </div>
                  <div class=" col-md-3 col-sm-12">
                    <input type="text" name="sectorno[]" value="" id="sectorno3" class="typeahead form-control " />
                  </div>
                </div>

              </div>
              <?php
              // }
              // else {
              ?>
              <!-- <div class="form-group">
                 <label class="description">Phase</label>
               
                 <select class="custom-select col-12" name="sectorno[]" >
                    <?php
                    // sector();

                    ?>
                </select>
            </div> -->
              <?php
              // }
              ?>
              <div class="form-group">
                <label class="description">Plot no</label>

                <input type="text" name="plotno" value="" size="5" class="form-control" />
              </div>
              <hr>

              <div class="form-group">
                <div class="custom-control custom-checkbox mb-5">

                  <INPUT class="custom-control-input" TYPE="checkbox" id="customCheck1" NAME="parkface" VALUE="Y" />
                  <label class="custom-control-label" for="customCheck1">Park Facing</label>
                </div>
                <div class="custom-control custom-checkbox mb-5">

                  <INPUT class="custom-control-input" TYPE="checkbox" id="customCheck2" NAME="cornerplot" VALUE="Y" />
                  <label class="custom-control-label" for="customCheck2">Corner</label>
                </div>
                <div class="custom-control custom-checkbox mb-5 ">
                  <INPUT class="custom-control-input" id="customChecka" TYPE="checkbox" NAME="builtup" VALUE="Y" />
                  <label class="custom-control-label" for="customChecka">Builtup</label>
                </div>
              </div>


              <hr>
              <label class="description">Road Width</label>

              <div class="row">


                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck3" TYPE="checkbox" NAME="roadwid[]" VALUE="7M" />
                      <label class="custom-control-label" for="customCheck3">7M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck7" TYPE="checkbox" NAME="roadwid[]" VALUE="7.5M" />
                      <label class="custom-control-label" for="customCheck7">7.5M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck4" TYPE="checkbox" NAME="roadwid[]" VALUE="8M" />
                      <label class="custom-control-label" for="customCheck4">8M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">

                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck5" TYPE="checkbox" NAME="roadwid[]" VALUE="9M" />
                      <label class="custom-control-label" for="customCheck5">9M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck6" TYPE="checkbox" NAME="roadwid[]" VALUE="10M" />
                      <label class="custom-control-label" for="customCheck6">10M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck13" TYPE="checkbox" NAME="roadwid[]" VALUE="11M" />
                      <label class="custom-control-label" for="customCheck13">11M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck17" TYPE="checkbox" NAME="roadwid[]" VALUE="12M" />
                      <label class="custom-control-label" for="customCheck17">12M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">

                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck14" TYPE="checkbox" NAME="roadwid[]" VALUE="13M" />
                      <label class="custom-control-label" for="customCheck14">13M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck15" TYPE="checkbox" NAME="roadwid[]" VALUE="14M" />
                      <label class="custom-control-label" for="customCheck15">14M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck16" TYPE="checkbox" NAME="roadwid[]" VALUE="15M" />
                      <label class="custom-control-label" for="customCheck16">15M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck21" TYPE="checkbox" NAME="roadwid[]" VALUE="16M" />
                      <label class="custom-control-label" for="customCheck21">16M</label>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">

                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck27" TYPE="checkbox" NAME="roadwid[]" VALUE="18M" />
                      <label class="custom-control-label" for="customCheck27">18M</label>
                    </div>
                  </div>
                </div>

                <div class="col-sm-1">
                  <div class="form-group ">



                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck24" TYPE="checkbox" NAME="roadwid[]" VALUE="20M" />
                      <label class="custom-control-label" for="customCheck24">20M</label>
                    </div>




                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck25" TYPE="checkbox" NAME="roadwid[]" VALUE="24M" />
                      <label class="custom-control-label" for="customCheck25">24M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck26" TYPE="checkbox" NAME="roadwid[]" VALUE="30M" />
                      <label class="custom-control-label" for="customCheck26">30M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck31" TYPE="checkbox" NAME="roadwid[]" VALUE="35M" />
                      <label class="custom-control-label" for="customCheck31">35M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck37" TYPE="checkbox" NAME="roadwid[]" VALUE="45M" />
                      <label class="custom-control-label" for="customCheck37">45M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck34" TYPE="checkbox" NAME="roadwid[]" VALUE="60M" />
                      <label class="custom-control-label" for="customCheck34">60M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck35" TYPE="checkbox" NAME="roadwid[]" VALUE="75M" />
                      <label class="custom-control-label" for="customCheck35">75M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck36" TYPE="checkbox" NAME="roadwid[]" VALUE="90M" />
                      <label class="custom-control-label" for="customCheck36">90M</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1">
                  <div class="form-group ">
                    <div class="custom-control custom-checkbox mb-5">
                      <INPUT class="custom-control-input" id="customCheck47" TYPE="checkbox" NAME="roadwid[]" VALUE="1K" />
                      <label class="custom-control-label" for="customCheck47">1K</label>
                    </div>
                  </div>
                </div>

              </div>
              <hr>
              <div class="form-group">
                <label class="description">Direction</label>

                <select class="custom-select col-6" name="directi">
                  <option value=""></option>
                  <option value="north">North</option>
                  <option value="south">South</option>
                  <option value="east">East</option>
                  <option value="west">West</option>
                  <option value="northeast">North East</option>
                  <option value="southeast">South East</option>
                  <option value="northwest">North West</option>
                  <option value="southwest">South West</option>
                </select>
              </div>


              <hr>
              <div class="form-group">
                <label class="description">Plot Size</label>


                <?php
                // if($_SESSION['form']=="HUDA") {
                ?>

                <select class="custom-select col-6" name="area" id="areaselect">
                  <option value="">Select Sector first to the options</option>
                  <!-- <option value="4m">4m</option>
                    <option value="6m">6m</option>
                    <option value="8m">8m</option>
                    <option value="10m">10m</option>
                    <option value="14m">14m</option>
                    <option value="1k">1k</option>
                    <option value="1.5k">1.5K</option>
                    <option value="2k">2k</option> -->
                </select>
                <input class="btn btn-sm btn-primary" type="button" id="areaselectbtn" value="Refresh sizes" />

              </div>


              <hr>
              <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                  <label class="description">Cheque</label>
                  <div class="custom-control custom-radio mb-5">
                    <INPUT id="customRadio1" class="custom-control-input" TYPE="radio" NAME="cheque" VALUE="CIRCLE" />
                    <label class="custom-control-label" for="customRadio1">Circle</label>
                  </div>
                  <div class="custom-control custom-radio mb-5">
                    <INPUT id="customRadio2" class="custom-control-input" TYPE="radio" NAME="cheque" VALUE="MAX" />
                    <label class="custom-control-label" for="customRadio2">Max</label>
                  </div>
                  <div class="custom-control custom-radio mb-5">
                    <INPUT TYPE="radio" class="custom-control-input" id="customRadio3" NAME="cheque" VALUE="LOW" />
                    <label class="custom-control-label" for="customRadio3">Low</label>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12">
                  <div class="custom-control custom-checkbox mb-5">
                    <INPUT TYPE="checkbox" class="custom-control-input" id="customCheck8" NAME="interested" VALUE="y" onclick="check(this, 'customCheck9');" />
                    <label class="custom-control-label" for="customCheck8">Owners Interested</label>
                    <i>(Only Owner's table)</i>
                  </div>
                  <!-- </div>
            <div class="form-group"> -->
                  <div class="custom-control custom-checkbox mb-5">
                    <INPUT TYPE="checkbox" class="custom-control-input" id="customCheck9" NAME="file" VALUE="y" onclick="check(this, 'customCheck8');" />
                    <label class="custom-control-label" for="customCheck9">Dealers File</label>
                    <i>(Only Dealer's table)</i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Search" class="btn btn-lg btn-outline-primary" />
                <button type="reset" value="Reset" class="btn btn-lg btn-outline-danger">Reset</button>
              </div>
          </div>

          </form>

        </div>

      </div>
      <!-- Export Datatable End -->
    </div>

  </div>
  </div>

</body>

</html>