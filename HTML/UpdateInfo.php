<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/NewBlog.css">
	<link rel="stylesheet" type="text/css" href="../CSS/addinfo.css">

	<title>FootBlog/UpdateInfo</title>
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
	<?php
	require '../PHP/connect.php';
	session_start();
	$id=$_SESSION['id'];
	$mysql_table = "personal_info";
	$select = "SELECT first_name,last_name,fav_club,about_me,profile_picture,id FROM $mysql_table WHERE blogger_id=$id;";
	$result = mysqli_query($link , $select);
	$r = mysqli_fetch_assoc($result);
	?>
	<div class="wrapper">

		<div class="left">
			<?php
			echo "<img src='data:image;base64,".$r['profile_picture']."' class='img-circle myimage' >";
			?>
		</div>
		<div class="newblog">


			<h2>Update Information</h2>
			<hr>
			<form class="form-signin" action="../PHP/updateinfo.php?id=<?php echo $r['id']; ?>" method="post" enctype="multipart/form-data" >
				

				<label class="sr-only">First Name</label>
				<input type="text" name = "firstname" id="firstname" class="form-control"
				value="<?php   echo $r['first_name']; ?>" placeholder="First Name" required>
				

				<label class="sr-only">Last Name</label>
				<input type="text" name = "lastname" id="lastname" class="form-control" 
				value="<?php  echo $r['last_name']; ?>" placeholder="Last Name">
				

				<label class="sr-only">Favourite Club</label>
				<input type="text" name = "favclub" id="favclub" class="form-control" 
				value="<?php   echo $r['fav_club']; ?>" placeholder="Favourite Club">
				

				<label class="sr-only">About Me</label>
				<textarea class="form-control" rows="8" name = "aboutme" placeholder="About Me!!"><?php echo $r['about_me']; ?>
				</textarea>

			</p>
			<div class="fileUpload btn btn-primary">
				<span>Browse</span>
				<input type="file" name="image" class="f" required />
				</div>
			<button class="btn btn-lg btn-primary btn-block send" name="send" type="submit">Update</button>

		</form>
	</div>
</div>
</body>
</html>