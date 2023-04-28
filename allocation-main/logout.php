<?php
include_once 'functions.php';
if (auth()) {
	session_destroy();
	header('location:index.php');
}
else 
{
	header('location:index.php');
}


