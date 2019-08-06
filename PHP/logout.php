<?php
require '../PHP/connect.php';
$mysql_table = "blogger_info";
session_start();
$id = $_SESSION['id'];
$update_query = "UPDATE $mysql_table SET blogger_end_date=NOW() WHERE blogger_id=$id;";
$result = mysqli_query($link , $update_query);
if (!$result) {
	die("Nothing was Updated, something went wrong.");
}
session_unset();
session_destroy();
header("location: ../HTML/Welcomepage.html ");
mysqli_close($link);
?>