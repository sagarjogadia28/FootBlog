<?php
require 'connect.php';
$mysql_table = "blogger_info";
$username = $_POST['username'];
$password = $_POST['password'];

$select_query = "SELECT blogger_username,blogger_id FROM $mysql_table WHERE blogger_username='$username' and blogger_password = '$password';";
$result = mysqli_query($link , $select_query);

// echo $username ;
// echo $password;

if (mysqli_num_rows($result) == 1) {

	$row = mysqli_fetch_row($result);
	session_start();
	$_SESSION["user"] = $row[0];
	$_SESSION["id"] = $row[1];
	header("location: ../HTML/NewBlog.php");
		}
} else {
	echo "Invalid Username or Password!!";
}
mysqli_close($link);
?>