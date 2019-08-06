<?php
require '../PHP/connect.php';
$mysql_table = "blog_master";
session_start();
$id = $_SESSION['id'];
$select_query = "SELECT blog_desc FROM $mysql_table WHERE blogger_id=$id;";
$result = mysqli_query($link , $select_query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		// echo "Description : ".$row['blog_desc'],"<br>";
		echo substr("Description : ".$row['blog_desc']."<br>", 0 , 200);
	}
}
mysqli_close($link);
?>