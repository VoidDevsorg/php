<?php
define('DB_SERVER','localhost');
define('DB_USER','voiddevs_www');
define('DB_PASS' ,'Alone.2021');
define('DB_NAME', 'voiddevs_www');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

