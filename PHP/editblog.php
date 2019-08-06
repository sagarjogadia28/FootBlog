<?php
require 'connect.php';
$mysql_table = "blog_master";
if(isset($_POST['create']))
{
			$blogid = $_GET['blogid'];
			$title = $_POST['title'];
			$cat = $_POST['category'];
			$desc = $_POST['description'];

			// echo "<br>".$blogid."<br>";

			// echo $id."<br>".$author."<br>".$title."<br>".$cat."<br>".$desc."<br>";

			$update_query = "UPDATE $mysql_table SET blog_title='$title',blog_category='$cat',blog_desc='$desc',updated_date=NOW() WHERE blog_id=$blogid;";
		
			$result = mysqli_query($link , $update_query);
				
			if (!$result) {
				die("Nothing was Updated, something went wrong.");
			}

			// printf ("New Record has id %d.\n", mysqli_insert_id($link));
			header("location: ../HTML/Newblog.php");

			/* close connection */
			mysqli_close($link);
			//printf("Affected rows (INSERT): %d\n", $mysqli->affected_rows);
		}

?>