<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['header'])) {
    unset($_SESSION['header']);
}
$_SESSION['header'] = 'floor';
include_once "model.php";
include('include/header.php');
include_once('include/head.php');
include_once "headeralt.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head></head>

<body>
    <br />
    <br />


    <div id="form_container" class="container">
        <h6 class="my-5 text-center">You are viewing the Floor properties</h6>

        <form name="searchform" action="controllerfloor.php" method="get" class="appnitro">
            <div class="form-group">

                <b class="description">Floor Preference</b>
                <hr>

                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Basement" />Basement
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Ground" />Ground
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Basement+Ground" />Basement + Ground
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="First" />First
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Second" />Second
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="First-stilt" />First with stilt
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Second-stilt" />Second with stilt
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Third-stilt" />Third with stilt
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Fourth-stilt" />Fourth with stilt
                <INPUT class="" TYPE="checkbox" NAME="floor[]" VALUE="Basement+Ground-stilt" />Basement + Ground with stilt

            </div>
            </br>
            <h6 class="text-center my-3"> Or </h6>

            </br>
            <hr>
            <div class="text-center">
                <a href="#" class="btn btn-sm btn-outline-success " name="floorloc" onclick="JavaScript:newPopup('Addfloorloc.php');" value="Insert New Floor Location Record">
                    <i class="fa fa-plus fa-lg"></i> New Floor Location</a>
            </div>
            <hr>
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