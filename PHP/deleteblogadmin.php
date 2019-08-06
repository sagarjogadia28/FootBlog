<?php
require 'connect.php';
$mysql_table = "blog_master";
$id = $_GET['blogid'];
$bloggerid=$_GET['bloggerid'];
// echo $bloggerid;
$delete_query = "DELETE FROM $mysql_table WHERE blog_id=$id;";
$result = mysqli_query($link , $delete_query);
			// echo "ID : ".$id;
if ($result) {
	// echo "Deleted!!";
	header("location: ../HTML/AdminDelete.php?id=".$bloggerid);
}
else {
	echo "Failed";
}
mysqli_close($link);
?>

