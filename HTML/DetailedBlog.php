<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	<link rel="stylesheet" type="text/css" href="../CSS/NewBlog.css">
	<link rel="stylesheet" type="text/css" href="../CSS/detailedblog.css">
	<title>FootBlog/DetailedBlog</title>
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
			<?php
			require '../PHP/connect.php';
			session_start();
			$id = $_SESSION['id'];
			$table="personal_info";
			$select= "SELECT profile_picture FROM $table WHERE blogger_id=$id;";
			$result = mysqli_query($link , $select);

			if (mysqli_num_rows($result) > 0) {
				$r = mysqli_fetch_assoc($result);
				echo "<img src='data:image;base64,".$r['profile_picture']."' class='img-circle' height='250px' width='220px'>";
				
			}
			else{
				echo "<img src='../Images/profile.jpg' class='img-circle' height='250px' width='220px'>";
				
			}
			mysqli_close($link);
			?>

		</div>

		<!-- CREATE BLOG -->
		<div class="newblog ">
			
			<?php
			require '../PHP/connect.php';
			$mysql_table = "blog_master";
			session_start();
			$id = $_GET['id'];
			$select_query = "SELECT blog_title,blog_category,blog_author,creation_date,blog_desc FROM $mysql_table WHERE blog_id=$id;";
			$result = mysqli_query($link , $select_query);
			$row = mysqli_fetch_assoc($result);

			?>

			<h1><?php echo $row['blog_title'] ?></h1>
			<hr>
			<h2><?php echo $row['blog_desc'] ?></h2>
			<br>
			<footer><small>Posted by :				<span><?php echo $row['blog_author'] ?></span></small></footer>
			<footer><small>Posted on :				<span><?php echo $row['creation_date'] ?></span></small></footer>
			<footer><small>Category : 				<span><?php echo $row['blog_category'] ?></span></small></footer>

			<?php
			mysqli_close($link);
			?>
		</div>
	</div>
</body>
</html>