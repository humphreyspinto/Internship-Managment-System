<?php
$dbhost = "localhost";
$dbuser = "internadmin";
$dbpass = "password123$$";
$dbname = "intern_sys";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysqli_select_db($conn, $dbname) or die('database selection problem');
?>
