<?php
require 'connect.php';
$mysql_table = "blogger_info";
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$search_query = "SELECT blogger_username FROM $mysql_table WHERE blogger_username='$username';";
	$r = mysqli_query($link , $search_query);

// echo $username ;
// echo $password;

	if (mysqli_num_rows($r) == 1) {
		echo "Username already exists";
		mysqli_close($link);
	}
	else{
		$insert_query = "INSERT INTO $mysql_table ( blogger_username , blogger_password ) 
		VALUES ( '$username' , '$password')";
		$result = mysqli_query($link , $insert_query);

		if (!$result) {
			die("Nothing was inserted, something went wrong.");
		}

			// printf ("New Record has id %d.\n", mysqli_insert_id($link));
		header("location: ../HTML/Signin.php");

		/* close connection */
		mysqli_close($link);
			//printf("Affected rows (INSERT): %d\n", $mysqli->affected_rows);
	}
}

?>