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
$_SESSION['header'] = 'agricultural';

include_once "headeralt.php";

if (isset($_SESSION['agri'])) {
    unset($_SESSION['agri']);
}
?>

<!DOCTYPE html>
<html>

<head>


</head>

<body>




    <div class="container">

        <h6 class="text-center my-5 py-5">You are viewing the agricultural properties</h6>




        <div class="row ">

            <div class="col-sm-5 text-center card">

                <a href="controlleragricultural.php?category=raw"><img src="media/images/raw.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                <b>Raw Land</b></div>

            <div class="card col-sm-5 text-center">

                <a href="controlleragricultural.php?category=farmhouse"><img src="media/images/farmhouse.png" HEIGHT="100" WIDTH="100" alt="" /></a>

                <b>Farmhouse</b>

            </div>
        </div>

        <div class="row">
            <div class="card col-sm-5 text-center">

                <a href="controlleragricultural.php?category=commercialfsi"><img src="media/images/commfsi.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                <b>Commercial FSI</b></div>

            <div class="card col-sm-5 text-center">

                <a href="controlleragricultural.php?category=residentialfsi"><img src="media/images/resifsi.png" HEIGHT="100" WIDTH="100" alt="" /></a>
                <b>Residential FSI</b></div>

        </div>




    </div>


</body>

</html>