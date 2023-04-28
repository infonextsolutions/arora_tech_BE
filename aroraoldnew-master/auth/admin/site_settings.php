<?php
require_once('../lib/connections/db.php');
include('../lib/functions/functions.php');
include_once ('../../footer.php');
checkLogin('1');

$getuser = getUserRecords($_SESSION['user_id']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Manage Site Settings</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../media/css/template.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../../media/css/view.css" media="screen" />

	<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
	
			$('#sitesetForm').submit(function(e) {
				editsiteset();
				e.preventDefault();	
			});	
		});

	</script>
</head>

<body id="main_body" >
<!-- Begin Wrapper -->
<div id="wrapper">
   
         <!-- Begin Header -->
<div id="header">
		 
 <a href="index.php"><h3>Arora RealTech </h3><h4>Property Management System</h4></a>	
  
 <p class="signature" >User: <?php if(empty($getuser[0]['first_name']) || empty($getuser[0]['last_name']))
	{echo $getuser[0]['username'];} else {echo $getuser[0]['first_name']." ".$getuser[0]['last_name'];} ?></p>

		   
  </div>
	<div align="right"><a href="/index.php">Home</a> | <a href="change_pass.php">change password</a> | <a href="edit_profile.php">Edit Profile</a> | <a href="manage_users.php">Manage Users</a> | <a href="site_settings.php">Manage Site Settings</a> | <a href="log_off.php?action=logoff">sign out</a></div>
		<div class="done"><p>Site settings successfully edited.</p><p><a href="site_settings.php">Click here</a> to continue editing site settings.</p></div><!--close done-->
			<div class="form">
			<h2>Edit Site Settings</h2>
			<hr/>
			<div id="form_container">
				<table border="0" cellspacing="2" cellpadding="2" align="center">
					<form id="sitesetForm" action="edit_siteset_submit.php" method="post">
						<tr>
							<td><label for="site url">Site URL:</label></td><td><input type="text" name="site_url" value="<?php if(isset($sitesettings[0]['site_url'])){echo $sitesettings[0]['site_url'];}?>"/></td>
						</tr>
						<tr>
							<td><label for="site url">Site Email:</label></td><td><input type="text" name="site_email" value="<?php if(isset($sitesettings[0]['site_email'])){echo $sitesettings[0]['site_email'];}?>"/></td>
						</tr>
						<tr>
							<td colspan="2"><hr/></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" class="btn btn-outline-primary" name="submit" value="Edit Site Settings" /><img id="loading" src="../images/loading.gif" alt="Updating.." /></td>
						</tr>
						<tr>
							<td colspan="2"><div id="error">&nbsp;</div></td>
						</tr>
					</form>
				</table>
				</div>
			</div><!--close form-->
			</div>
</body>
</html>