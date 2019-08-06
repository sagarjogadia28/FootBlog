<?php
require 'connect.php';
session_start();
$blogger_id=$_SESSION['id'];
$mysql_table = "personal_info";
$id=$_GET['id'];
if(isset($_POST['send'])){


	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$favclub = $_POST['favclub'];
	$aboutme = $_POST['aboutme'];
	$image= addslashes($_FILES['image']['tmp_name']);
	$image= file_get_contents($image);
	$image= base64_encode($image);

	// echo $id."<br>".$firstname."<br>".$lastname."<br>".$favclub."<br>".$aboutme."<br>".$image."<br>".$blogger_id;
	// echo "<h1>".$image."</h1>";
	// echo "<h1>".$name."</h1>";

	$update_query = "UPDATE $mysql_table SET blogger_id=$blogger_id,first_name='$firstname',last_name='$lastname',fav_club='$favclub',about_me='$aboutme',profile_picture='$image' WHERE id=$id;";
	$myresult = mysqli_query($link , $update_query);


	if (!$myresult) {
		echo $id."<br>".$firstname."<br>".$lastname."<br>".$favclub."<br>".$aboutme;
		echo "Your Information was not Updated!!";
	}
	else
		// echo "Your Information has been Updated!!";
		header("location: ../HTML/Newblog.php");


	mysqli_close($link);
}
?>