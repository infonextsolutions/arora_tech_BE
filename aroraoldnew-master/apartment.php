<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<html>
<?php
include_once "model.php";
include('include/header.php');
include_once('include/head.php');
if (!isset($_SESSION)) {
        session_start();
}
if (isset($_SESSION['header'])) {
        unset($_SESSION['header']);
}
$_SESSION['header'] = 'apartment';
include_once "headeralt.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<body>
        <!-- <script type="text/javascript">
                $(document).ready(function() {
                        $("#locality").autocomplete("autocomp.php?table=Apartmentloc&fld=locality", {
                                width: 260,
                                matchContains: true,
                                mustMatch: true,
                                //minChars: 0,
                                //multiple: true,
                                //highlight: false,
                                //multipleSeparator: ",",
                                selectFirst: false
                        });
                });
        </script> -->



        <br />
        <br />
        <h6 class="text-center my-5">You are viewing the Apartment plots</h2>


                <div id="form_container" class="container">
                        <!-- <h1><a>Plot Search</a></h1> -->
                        <table class="table">
                                <form name="searchform" action="controllerapartment.php" method="get">

                                        <div class="form-group">

                                                <label class="description">Apartment Name</label>


                                                <INPUT TYPE="text" class="form-control" name="locality" id="locality" value="" />
                                                <INPUT TYPE="hidden" id="table" value="apartmentloc" />
                                                </br>
                                                <h6 class="text-center my-3"> Or </h6>

                                                </br>
                                                <div class="text-center">
                                                        <a href="#" class="btn btn-sm btn-outline-success " name="apartmentloc" onclick="JavaScript:newPopup('Addapartmentloc.php');" value="Insert New Apartment Location Record">
                                                                <i class="fa fa-plus fa-lg"></i> New Apartment Location</a>
                                                </div>
                                        </div>
                                        <div class="form-group ">

                                                <b class="description">Select Price Range</b>
                                                <div class="row">

                                                        <div class="col-sm-6"><INPUT TYPE="text" class="form-control" placeholder="Min" NAME="rangemin" VALUE="" /></div>

                                                        <div class="col-sm-6"> <INPUT TYPE="text" class="form-control" placeholder="Max" NAME="rangemax" VALUE="" /></div>
                                                </div>


                                        </div>



                                        <div class="form-group">


                                                <input type="submit" name="submit" value="search" class="btn btn-outline-primary" />
                                        </div>
                                </form>
                        </table>
                </div>
</body>

</html>