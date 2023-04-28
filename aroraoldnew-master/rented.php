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
$_SESSION['header'] = 'rented';


include_once "headeralt.php";

?>


<script type="text/javascript">
        // $(document).ready(function() {
        //         $("#locality").autocomplete({
        //                 source: "autocomp.php?table=rentedloc&fld=locality",
        //                 width: 260,
        //                 matchContains: true,
        //                 mustMatch: true,
        //                 //minChars: 0,
        //                 //multiple: true,
        //                 //highlight: false,
        //                 //multipleSeparator: ",",
        //                 selectFirst: false
        //         });
        // });
</script>

<br />

<br />

<div id="form-container" class="container">


        <h6 class="text-center my-5">You are viewing the rented properties</h6>
        <form name="searchform" action="controllerrented.php" method="get" class="appnitro">

                <div class="form-group">

                        <label class="description">Locality</label>


                        <input class="form-control" TYPE="text" name="locality" id="locality" value="" />
                        <INPUT TYPE="hidden" id="table" value="rentedloc" />

                        </br>
                        <h6 class="text-center my-3"> Or </h6>

                        </br>
                        <div class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-success " name="rentedloc" onclick="JavaScript:newPopup('Addrentedloc.php');" value="Insert New rented Location Record">
                                        <i class="fa fa-plus fa-lg"></i> New Rented Location</a>
                        </div>
                </div>
                <p>Select Estimated Value Range</p>
                <div class="form-group">
                        <div class="row">


                                <div class="col-sm-6">
                                        <label class="description">Min demand</label>
                                        <input class="form-control" TYPE="text" class="small" NAME="rangemin" VALUE="" />
                                </div>
                                <div class="col-sm-6">

                                        <label class="description">Max demand</label>
                                        <input class="form-control" TYPE="text" class="small" NAME="rangemax" VALUE="" />

                                </div>
                        </div>
                </div>
                <div class="form-group">


                        <input class="btn btn-lg btn-outline-primary" type="submit" name="submit" value="search" />
                </div>
        </form>

</div>

</body>

</html>