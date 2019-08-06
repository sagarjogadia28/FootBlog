<?php
require 'connect.php';
$mysql_table = "blog_master";
if(isset($_POST['create']))
{
			session_start();
			$id = $_SESSION['id'];
			$author = $_SESSION['user'];
			$title = $_POST['title'];
			$cat = $_POST['category'];
			$desc = $_POST['description'];
		
			$insert_query = "INSERT INTO $mysql_table ( blogger_id , blog_title, blog_desc, blog_category, blog_author ) VALUES ( $id , '$title' , '$desc' , '$cat' , '$author');";
			$result = mysqli_query($link , $insert_query);
				
			if (!$result) {
				die("Nothing was inserted, something went wrong.");
			}

			// printf ("New Record has id %d.\n", mysqli_insert_id($link));
			header("location: ../HTML/Newblog.php");

			/* close connection */
			mysqli_close($link);
			//printf("Affected rows (INSERT): %d\n", $mysqli->affected_rows);
		}
		

?>