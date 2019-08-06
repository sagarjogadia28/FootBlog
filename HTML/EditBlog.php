<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	<link rel="stylesheet" type="text/css" href="../CSS/NewBlog.css">
	<title>FootBlog/EditBlog</title>
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
				echo "<img src='data:image;base64,".$r['profile_picture']."' class='img-circle myimage'>";
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
			$var = $_GET['id'];
			// echo "<br>".$var."<br>";
		?>
			
			<form class="form-signin" action = "../PHP/editblog.php?blogid=<?php echo $_GET['id']; ?>" method = "post">
				<h2 class="form-signin-heading"><b>Edit Blog</b></h2><hr class="red">
				<?php
					require '../PHP/connect.php';
					$mysql_table = "blog_master";
					$id = $_GET['id'];
					$select_query = "SELECT blog_title,blog_category,blog_desc FROM $mysql_table WHERE blog_id=$id;";
					$result = mysqli_query($link , $select_query);
					// echo "ID : ".$id;
					if (mysqli_num_rows($result) == 1) {

						$row = mysqli_fetch_assoc($result);
						// echo $row['blog_title'];
						// echo "<article>";
						// echo "<header><h2>".$row['blog_title']."</h2></header>";
						// echo "<footer><small>Posted by : ".$row['blog_author']."</small></footer>";
						// echo "<footer><small>Posted on : ".$row['creation_date']."</small></footer>";
						// echo "<footer><small>Category : ".$row['blog_category']."</small></footer>";
						// echo "<p>".$row['blog_desc']."</p>";
						// echo "</article>";
					?>
				<label for="Title" class="sr-only">Title</label>
				<input type="text" name = "title" id="title"
				 value="<?php $title = $row['blog_title']; echo $title;?>"
				 class="form-control" placeholder="Title" required>
				<br>
				<div class="form-group">
					<label class="sr-only">Category</label>
					<select data-placeholder="Category" name="category" class="form-control chosen-select">
						<option><?php $category = $row['blog_category']; echo $category;?></option>
						<option>UEFA Champions League</option>
						<option>Barclays Premier League</option>
						<option>La Liga</option>
						<option>Serie A</option>
						<option>Transfer News</option>
					</select>
				</div>
				<div class="editor">
				<textarea cols="132" rows="10" name="description"><?php $desc = $row['blog_desc']; echo $desc;?></textarea>
				</div>
				<?php
					}
						// else {
						// 	echo "Failed";
					mysqli_close($link);
				?>
				<button class="btn btn-lg btn-primary btn-block" name = "create" type="submit">Done</button>
			</form>
			<br><br>
		</div>
	</div>
</body>
</html>