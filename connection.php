<?php
####### Connection to DataBase
$host = "localhost";
$user = "root";
$passwd = "";
$db = "content_ms";

// Create connection
$con = mysqli_connect($host, $user, $passwd, $db);

// Check connection
if (!$con) {
    die("<b style=\"color:red;\">Error: DB Connect failed: " . mysqli_connect_error() . "</b>");
}

// Check if database selection is successful (this is unnecessary as mysqli_connect includes db selection)
if (!mysqli_select_db($con, $db)) {
    die("<b style=\"color:red;\">Error: Db Select Error</b>");
}
?>
