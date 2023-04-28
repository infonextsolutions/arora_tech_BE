<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<body>
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
    $_SESSION['header'] = 'institutional';
    include_once "headeralt.php";
    ?>
    <br />
    <br />
    <h6 class="my-5 text-center">You are viewing Institutional properties</h6>
    <div class=" container">




        <div class="row">
            <div class="col-sm-4 card text-center">

                <a href="controllerinstitutional.php?category=hospital"><img src="media/images/hospital.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                Hospital
            </div>



            <div class="col-sm-4 card text-center">
                <a href="controllerinstitutional.php?category=school"><img src="media/images/school.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                School
            </div>

            <div class="col-sm-4 card  text-center">
                <a href="controllerinstitutional.php?category=hotel"><img src="media/images/hotel.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                Hotel
            </div>
        </div>



        <div class="row ">
            <div class="col-sm-4 card text-center">
                <a href="controllerinstitutional.php?category=nursinghome"><img src="media/images/nursinghome.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                Nursing Home

            </div>
            <div class="col-sm-4 card text-center">
                <a href="controllerinstitutional.php?category=other"><img src="media/images/other.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                Others
            </div>

            <div class="col-sm-4 card text-center">
                <a href="controllerinstitutional.php?category=plots"><img src="media/images/restaurant.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                Institutional Plots


            </div>

        </div>
        <hr>
        </br>
        <h6 class="text-center my-3"> Or </h6>

        </br>
        <div class="text-center">
            <a href="#" class="btn btn-sm btn-outline-success " name="institutionalloc" onclick="JavaScript:newPopup('Addinstitutionalloc.php');" value="Insert New Institutional Location Record">
                <i class="fa fa-plus fa-lg"></i> New Institutional Location</a>
        </div>
        </hr>
    </div>



</body>

</html>