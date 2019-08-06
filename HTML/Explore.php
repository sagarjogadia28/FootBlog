<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admindelete.css">
	<link rel="stylesheet" type="text/css" href="../CSS/explore.css">
	<title>FootBlog/NewBlog</title>
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
			<br><br><br><br><br>
			<div class="wrapper">

				<!-- CREATE BLOG -->
				<div class="newblog ">
					<?php
					require '../PHP/connect.php';
					$mysql_table = "blog_master";
					$select_query = "SELECT blog_title,blog_category,blog_author,creation_date,blog_id,blog_desc,blogger_id FROM $mysql_table;";
					$result = mysqli_query($link , $select_query);

					if (mysqli_num_rows($result) > 0) {

						while($row = mysqli_fetch_assoc($result)){
							echo "<div class='custom_row'>";
							echo "<div class='heading'>";
							echo "<header><h2 class='nameofperson'><a href='DetailedBlog.php?id=".$row['blog_id']."' class='Mya'>".$row['blog_title']."</a></h2></header>";
							echo "</div>";
							echo "<div class='mydesc'>";
							echo "<p class='mydesc'>".$row['blog_desc']."</p>";
							echo "</div>";
							echo "<div class='bottom'>";
							echo "<footer class='posted'>Posted by : <span class='s'><a class='author' href='ViewInfo.php?bloggerid=".$row['blogger_id']."'>".$row['blog_author']."</a></span></footer>";
							echo "<footer class='posted'>Posted on : <span class='s'>".$row['creation_date']."</span></footer>";
							echo "<footer class='posted'>Category  : <span class='s'>".$row['blog_category']."</span></footer>";
							echo "</div>";
							echo "</div>";
							echo "<br><br><br>";

						}
					}
					else {
				// echo "Failed";
					}
					mysqli_close($link);
					?>

				</div>
			</div>
		</body>
		</html>