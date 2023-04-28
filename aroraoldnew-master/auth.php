<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once('auth/lib/connections/db.php');
include_once('auth/lib/functions/functions.php');

if (!$_SESSION['logged_in']) {
	header("Location: /auth/index.php");
} else {

	$sitesettings = getSiteSettings();
	$getuser = getUserRecords($_SESSION['user_id']);
}
