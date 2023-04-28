<?php
include_once"auth.php";

    // just so we know it is broken
    error_reporting(E_ALL);
    // some basic sanity checks
    if(isset($_GET['image_id']) && is_numeric($_GET['image_id'])) {
        //connect to the db
        $link = mysqli_connect("localhost", "username", "password") or die("Could not connect: " . mysqli_error($GLOBALS['db']));
 
        // select our database
        mysqli_select_db($GLOBALS['db'],"testblob") or die(mysqli_error($GLOBALS['db']));
 
        // get the image from the db
        $sql = "SELECT image FROM testblob WHERE image_id=0";
 
        // the result of the query
        $result = mysqli_query($GLOBALS['db'],"$sql") or die("Invalid query: " . mysqli_error($GLOBALS['db']));
 
        // set the header for the image
        header("Content-type: image/jpeg");
        echo mysqli_result($result, 0);
 
        // close the db link
        mysqli_close($link);
    }
    else {
        echo 'Please use a real id number';
    }
?>