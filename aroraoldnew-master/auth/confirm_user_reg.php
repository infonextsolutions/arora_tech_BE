<?php
DEFINE('INCLUDE_CHECK',1);
require_once('lib/connections/db.php');
include('lib/functions/functions.php');

$prsn = '';

if (isset($_GET['prsn'])){
	$prsn = secureInput($_GET['prsn']);
		}
			
	
	$res = confirm_user_reg($prsn);
		if ($res == 1){
			$error = "Failed to activate account. Please contact the site admin.";
			}
		if ($res == 2){
			$error = "Your account is already active!";
			}
		if ($res == 3){
			$error = "This user does not exist.";
			}
		if ($res == 99){
			$message = "Congratulations! Your account has been activated. You may now <a href='login.php'>login</a> and start using it.";
			}


$sitesettings = getSiteSettings();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>Registration Confirmation!</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	
	<script type="text/javascript" src="js/jquery-1.6.2.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
</head>
<body>
	<table align="center" width="100%" cellspacing="1" cellpadding="1" border="0">
	  
	</table>
	<hr/>
				<?php  if(isset($error))
					{
						echo '<div class="error">' . $error . '</div>' . "\n";
					}
					   else if(isset($message)) {
							echo '<div class="message">' . $message . '</div>' . "\n";
						} 
				?>
</body>
</html>
