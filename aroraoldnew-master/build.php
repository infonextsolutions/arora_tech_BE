<!DOCTYPE html>
<html>

<head>

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['header'])) {
        unset($_SESSION['header']);
    }
    $_SESSION['header'] = 'build';
    include_once "model.php";
    include('include/header.php');
    include_once('include/head.php');
    include_once "headeralt.php";


    ?>



    <br />
    <br />
    <h6 class="my-5 text-center">You are viewing built up properties</h6>


    <div id="form_container" class="container">
        <!-- <h1><a>Plot Search</a></h1> -->
        <table class="table">
            <form name="searchform" action="controllerbuild.php" method="get" class="appnitro">


                <div class="form-group ">

                    <b class="description">Built Up</b><br>

                    <label>Simplex</label>
                    <INPUT class="" TYPE="checkbox" NAME="buildup[]" VALUE="simplex"></>
                    <label>Duplex</label>
                    <INPUT class="" TYPE="checkbox" NAME="buildup[]" VALUE="duplex"></>
                    <label>Floorwise</label>
                    <INPUT TYPE="checkbox" NAME="buildup[]" VALUE="floorwise" />

                    <label>Floorwise with stilt</label>
                    <INPUT TYPE="checkbox" NAME="buildup[]" VALUE="floorwise-stilt" />
                    <label>Double story</label>
                    <INPUT TYPE="checkbox" NAME="buildup[]" VALUE="double-story" />

                </div>
                <div class="form-group ">

                    <b class="description">Select Price Range</b>
                    <div class="row">

                        <div class="col-sm-6"><INPUT TYPE="text" class="form-control" placeholder="Min" NAME="rangemin" VALUE="" /></div>

                        <div class="col-sm-6"> <INPUT TYPE="text" class="form-control" placeholder="Max" NAME="rangemax" VALUE="" /></div>
                    </div>


                </div>
                <div class="form-group ">

                    <b class="description">Basement</b>


                    <INPUT class="" TYPE="checkbox" NAME="basement" VALUE="Y" />


                </div>
                <hr>
                </br>
                <h6 class="text-center my-3"> Or </h6>

                </br>
                <div class="text-center">
                    <a href="#" class="btn btn-sm btn-outline-success " name="buildloc" onclick="JavaScript:newPopup('Addbuildloc.php');" value="Insert New Built-up Location Record">
                        <i class="fa fa-plus fa-lg"></i> New Builtup Location</a>
                </div>
                </hr>


                <div class="form-group ">


                    <input type="submit" name="submit" value="search" class="btn btn-outline-primary" />
                </div>
            </form>
        </table>
    </div>

    </body>

</html>