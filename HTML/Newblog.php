<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="../JS/niceditor.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	<link rel="stylesheet" type="text/css" href="../CSS/NewBlog.css">
	<title>FootBlog/NewBlog</title>
</head>
<body>

	<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand FootBlog" href="">FootBlog</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right">
					<a href="AboutMe.php" class="navbar-brand contact">About Me</a>
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
			$select= "SELECT blogger_id,profile_picture FROM $table WHERE blogger_id=$id;";
			$result = mysqli_query($link , $select);

			if (mysqli_num_rows($result) > 0) {
				$r = mysqli_fetch_assoc($result);
				// echo "<img src='data:image;base64,".$r['profile_picture']."' class='img-circle' height='250px' width='250px'>";
				echo "<img src='data:image;base64,".$r['profile_picture']."' class='img-circle myimage'>";
				echo "<br>";
				echo "<a href='UpdateInfo.php' class='addinfo' >+Update Information</a>";
			}
			else{
				echo "<img src='../Images/profile.jpg' class='img-circle' height='250px' width='220px'>";
				echo "<br>";
				echo "<a href='AddInfo.php' class='addinfo' >+Add Information</a>";
			}
			?>

		</div>

		<!-- CREATE BLOG -->
		<div class="newblog ">

			<form class="form-signin" action = "../PHP/newblog.php" method = "post">
				<h2 class="form-signin-heading"><b>Create New Blog</b></h2><hr class="red">
				<label for="Title" class="sr-only">Title</label>
				<input type="text" name = "title" id="title" class="form-control" placeholder="Title" required><br>
				<div class="form-group">
					<label class="sr-only">Category</label>
					<select data-placeholder="Category" name="category" class="form-control chosen-select">
						<option>International Football</option>
						<option>UEFA Champions League</option>
						<option>Barclays Premier League</option>
						<option>La Liga</option>
						<option>Serie A</option>
						<option>Transfer News</option>
					</select>
				</div>
				<div class="editor">
					<textarea cols="132" rows="10" name="description"></textarea>
				</div>
				<button class="btn btn-lg btn-primary btn-block" name = "create" type="submit">Create</button>
			</form>
			<br><br>

			<?php

			$mysql_table = "blog_master";

			$select_query = "SELECT blog_title,blog_desc,blog_category,blog_author,creation_date,blog_id,blog_desc FROM $mysql_table WHERE blogger_id=$id;";
			$result = mysqli_query($link , $select_query);

			if (mysqli_num_rows($result) > 0) {

				while($row = mysqli_fetch_assoc($result)){
					echo "<div class='custom_row'>";
					// echo "<article>";
					echo "<div class='heading'>";
					echo "<header><h2><a href='DetailedBlog.php?id=".$row['blog_id']."' class='Mya'>".$row['blog_title']."</a></h2></header>";
					echo "</div>";
					if(strlen($row['blog_desc'] )> 200)
						echo "<h3>".substr($row['blog_desc'],0,200)."<a class='readmore' href='DetailedBlog.php?id=".$row['blog_id']."' >....Read More</a></h3>";
					// echo "<a href='DetailedBlog.php?id=".$row['blog_id']."' >Read More</a>";
					else
						echo "<h3>".substr($row['blog_desc'],0,200)."</h3>";


					echo "<footer class='posted'>Posted by : <span class='s'>".$row['blog_author']."</span></footer>";
					echo "<footer class='posted'>Posted on : <span class='s'>".$row['creation_date']."</span></footer>";
					echo "<footer class='posted'>Category  : <span class='s'>".$row['blog_category']."</span></footer>";

					// echo "</article>";
					echo "<div class='article-actions'>";
					echo "<a class='btn btn-xs btn-default edit' href='DetailedBlog.php?id=".$row['blog_id']."' role='button'>";
					echo "<span class='glyphicon glyphicon-folder-open' aria-hidden='true'>&nbsp;View</span>";
					echo "</a>";

					echo "<a class='btn btn-xs btn-default edit' href='EditBlog.php?id=".$row['blog_id']."' role='button'>";
					echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true'>&nbsp;Edit</span>";
					echo "</a>";

					echo "<a class='btn btn-xs btn-default edit' href='../PHP/deleteblog.php?id=".$row['blog_id']."' role='button'>";
					echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'>&nbsp;Delete</span>";
					echo "</a>";
					echo "</div>";
					// echo "<hr class='red'>";
					echo "</div>";
					echo "<br><br><br>";
				}
			}
			else {
				// echo "Failed";
			}
			mysqli_close($link);
			?>


			<!-- <article>
				<header><h2>Heading of the BLOG</h2></header>
				<footer><small>Posted by : NAME</small></footer>
				<footer><small>Posted on : DATE</small></footer>
				<div class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus reprehenderit, itaque eaque dicta minima!</div>
				<hr>
			</article>

			<article>
				<header><h2>Heading of the BLOG</h2></header>
				<footer><small>Posted by : NAME</small></footer>
				<footer><small>Posted on : DATE</small></footer>
				<div class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus reprehenderit, itaque eaque dicta minima!</div>
				<hr>
			</article> -->
		</div>
	</div>
</body>
</html>