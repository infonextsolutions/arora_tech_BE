<?php
require_once('../lib/connections/db.php');
include('../lib/functions/functions.php');

checkLogin('2');

$id = '';
if (isset($_GET['id'])){
		if (is_numeric($_GET['id'])){
			$id = strip_tags($_GET['id']);}
		}
			
$message="";
if (isset($_GET['message'])){
	$message = strip_tags($_GET['message']);
	}
	
$error="";
if (isset($_GET['error'])){
	$error = strip_tags($_GET['error']);
	}
	
$getuser = getUserRecords($_SESSION['user_id']);
$uid = $getuser[0]['id'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Manage Photo</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

	<script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
	<div align="right"><a href="index.php">Home</a> | 
	<?php if (!empty($getuser[0]['thumb_path'])){echo "<a href='manage_photo.php'>Manage My Photo</a> | ";} 
	else {echo "<a href='upload_photo.php'>Upload Photo</a> | ";} ?><a href="change_pass.php">change password</a> | <a href="edit_profile.php">Edit Profile</a> | <a href="log_off.php?action=logoff">sign out</a></div></td>
	<p><?php if(empty($getuser[0]['first_name']) || empty($getuser[0]['last_name']))
	{echo $getuser[0]['username'];} else {echo $getuser[0]['first_name']." ".$getuser[0]['last_name'];} ?>,
	 manage your photo.</p>
		<?php 
			if ( isset( $error ) ) { echo '<p align="center"><span style="color:#f40000; font-weight:bold;">' . $error . '</span></p>';}
			if ( isset( $message ) ) { echo '<p align="center"><span style="color:#008c00; font-weight:bold;">' . $message . '</span></p>';}
		?>
			<?php 
			$query="SELECT id,thumb_path FROM users WHERE id='".$uid."'";
			$result=mysqli_query($GLOBALS['db'],$query) or die(mysqli_error($GLOBALS['db']));
				echo "<table width = '200' border = '0' cellspacing = '5' cellpadding = '3'>";
					echo "<tr>";
						while($row=mysqli_fetch_array($result)){
							if (!empty($row['thumb_path'])){
								echo "<td align='center'><img src='".$row['thumb_path']."' width='150' height='100' hspace='3' alt='' /><p>";
									echo "<a href='update_photo.php?id=".$row['id']."'>Change Photo</a> | ";
									echo "<a href='process_photo.php?id=".$row['id']."&action=delete'>Delete Photo</a></p>";
								echo "</td>";
								} else {echo"<td><img src='pics/no_image.gif' width='150' height='100' /></td>";}
							}	 
					echo "</tr>"; 
				echo "</table>";
			?>
</body>
</html>