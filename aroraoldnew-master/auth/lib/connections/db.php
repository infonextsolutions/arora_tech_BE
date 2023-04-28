<?php
$localhost = 'localhost'; //name of server. Usually localhost
$database = 'arorarealtech'; //database name.
$username = 'root';//database username.
$password = ''; //database password.

// connect to db  
$db= mysqli_connect($localhost, $username, $password,$database) or die('Error connecting to mysql');   


?>
