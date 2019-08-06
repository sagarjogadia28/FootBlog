<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/NewBlog.css">
	<link rel="stylesheet" type="text/css" href="../CSS/addinfo.css">
	<link rel="stylesheet" type="text/css" href="../CSS/viewinfo.css">

	<title>FootBlog/AddInfo</title>
</head>
<body>
	<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand FootBlog" href="#" onclick="javascript:window.location.href='Welcomepage.html'; return false;">FootBlog</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right">

					<a href="ContactUs.php" class="navbar-brand contact">Contact Us</a>
					<a href="#" onclick="javascript:window.location.href='Signin.php'; return false;">
						<button type="submit" class="btn btn-success signIn">Sign in</button></a>
						&nbsp;
						<a href="#" onclick="javascript:window.location.href='Signup.php'; return false;">
							<button type="submit" class="btn btn-success">Sign Up</button></a>
							<!-- <button type="submit" class="btn btn-success"><a href="Signup.html">Sign Up</a></button> -->
							<!-- <button type="submit" class="btn btn-success" onclick="window.location.href='http://google.com';" >Sign Up</button> -->
						</form>
					</div>
				</div>
			</nav>
			<div class="wrapper">

				<div class="left">
					<?php
					require '../PHP/connect.php';
					$id=$_GET['bloggerid'];
					$mysql_table = "personal_info";
					$select = "SELECT first_name,last_name,fav_club,about_me,profile_picture FROM $mysql_table WHERE blogger_id=$id;";
					$result = mysqli_query($link , $select);

					if (mysqli_num_rows($result) > 0) {
						$r = mysqli_fetch_assoc($result);
						echo "<img src='data:image;base64,".$r['profile_picture']."' class='img-circle' height='250px' width='220px'>";
						// echo "<h2>".$r['first_name']."<br>".$r['last_name']."<br>".$r['fav_club']."<br>".$r['about_me']."</h2>";

						?>
					</div>

					<div class="newblog">

						<h1>About Blogger</h1>
						<hr>
						<h2>Name :</h2>
						<?php   echo "<h3>".$r['first_name']." ";  echo $r['last_name']."</h3>";?><br>
						<h2>Favourite Club :</h2>
						<?php   echo "<h3>".$r['fav_club']."</h3>"; ?><br>
						<h2>About Me :</h2>
						<?php echo "<h3>".$r['about_me']."</h3>"; ?><br>
						<?php
					}
					else{
						echo "<img src='../Images/profile.jpg' class='img-circle' height='250px' width='220px'>";

						?>
					</div>
					<div class="newblog">

						<h1>About Blogger</h1>
						<hr>
						<h2>Name :</h2>
						<?php   echo "<h3>".$r['first_name']." ";  echo $r['last_name']."</h3>";?><br>
						<h2>Favourite Club :</h2>
						<?php   echo "<h3>".$r['fav_club']."</h3>"; ?><br>
						<h2>About Me :</h2>
						<?php echo "<h3>".$r['about_me']."</h3>"; ?><br>
						<?php

					}			mysqli_close($link);

					?>


				</div>
			</div>
		</body>
		</html>