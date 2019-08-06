<?php
require 'connect.php';
$mysql_table = "blog_master";
session_start();
$id = $_GET['id'];
$delete_query = "DELETE FROM $mysql_table WHERE blog_id=$id;";
$result = mysqli_query($link , $delete_query);
			// echo "ID : ".$id;
if ($result) {
	// echo "Deleted!!";
	header("location: ../HTML/NewBlog.php ");
}
else {
	echo "Failed";
}
mysqli_close($link);
?>
