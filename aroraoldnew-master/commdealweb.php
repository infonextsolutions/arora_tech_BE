<?php
include_once 'dbconnect.php';
$id = $_GET['id'];
$table = "commercialdeal";
$file = NULL;
$var = Null;
$result = mysqli_query($GLOBALS['db'], "Select * from commercialdeal where RID='$id'") or die(mysqli_error($GLOBALS['db']));
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html>

<head>
    <form id="demoForm1" method="POST" action="uploadweb_alt.php" enctype="multipart/form-data" class="col-sm-6">


        <table class="table">
            <input type="hidden" name="field_tags" value="Commercial" />



            <?php

            include_once 'commonweb.php';
            ?>



        </table>

    </form>