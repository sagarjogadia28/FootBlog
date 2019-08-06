<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/NewBlog.css">
	<link rel="stylesheet" type="text/css" href="../CSS/addinfo.css">

	<title>FootBlog/AddInfo</title>
</head>
<body>
	<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand FootBlog" href="">FootBlog</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right">
					<button type="submit" class="btn btn-success"><a href="../PHP/logout.php">Log Out</a></button>
				</form>
			</div>
		</div>
	</nav>

	<div class="wrapper">

		<div class="left">
			<img src="../Images/profile.jpg" class="img-circle" height="250px">
		</div>
		<div class="newblog">

			<h2>Add Information</h2>
			<hr>
			<form class="form-signin" action="AddInfo.php" method="post"  enctype="multipart/form-data">

				<label class="sr-only">First Name</label>
				<input type="text" name = "firstname" id="firstname" class="form-control" placeholder="First Name" required>

				<label class="sr-only">Last Name</label>
				<input type="text" name = "lastname" id="lastname" class="form-control" placeholder="Last Name">

				<label class="sr-only">Favourite Club</label>
				<input type="text" name = "favclub" id="favclub" class="form-control" placeholder="Favourite Club">

				<label class="sr-only">About Me</label>
				<textarea class="form-control" rows="8" name = "aboutme" placeholder="About Me!!"></textarea>

				<p id="Error" class="error">
					<?php
					require '../PHP/connect.php';
					if(isset($_POST['send'])){
						session_start();
						$id=$_SESSION['id'];
						$mysql_table = "personal_info";
						$firstname = $_POST['firstname'];
						$lastname = $_POST['lastname'];
						$favclub = $_POST['favclub'];
						$aboutme = $_POST['aboutme'];

						$image= addslashes($_FILES['image']['tmp_name']);
						$image= file_get_contents($image);
						$image= base64_encode($image);
						$insert_query = "INSERT INTO $mysql_table ( blogger_id,first_name , last_name , fav_club,about_me,profile_picture ) 
						VALUES ( $id,'$firstname' , '$lastname', '$favclub','$aboutme','$image')";
						$result = mysqli_query($link , $insert_query);

						if (!$result) {
							echo "Your Information was not Added!!";
						}
						// echo "Your Information has been Updated!!";
						header("location: Newblog.php");


						mysqli_close($link);
					}
					?>
				</p>
				<div class="fileUpload btn btn-primary">
				<span>Browse</span>
				<input type="file" name="image" class="f" required />
				</div>
				<button class="btn btn-lg btn-primary btn-block send" name="send" type="submit">Add</button>

			</form>
		</div>
	</div>
</body>
</html>