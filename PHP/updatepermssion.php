<?php
require 'connect.php';
$mysql_table = "blogger_info";
$id = $_GET['id'];
$c = $_GET['c'];
// echo $c;
$update_query = "UPDATE $mysql_table SET blogger_is_active = '$c' WHERE blogger_id=$id;";
$result = mysqli_query($link , $update_query);

if (!$result) {
	die("Nothing was Updated, something went wrong.");
}

header("location: ../HTML/SetPermission.php");

/* close connection */
mysqli_close($link);

?>