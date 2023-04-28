<?php
include_once "headeralt.php";
include_once "model.php";
include('include/header.php');
include_once('include/head.php');

?>
<script src="src/scripts/controller.js"></script>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                <?php


                list($bet, $que) = querybuild('buildown', 'builddeal');
                tablebuildalt('buildown', $bet);

                tablebuildalt('builddeal', $que);



                ?>
            </div>
        </div>
    </div>
</div>