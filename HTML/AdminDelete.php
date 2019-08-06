<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admin_messages.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admindelete.css">
	<title>FootBlog/Admin</title>
</head>
<body>
	<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container ">
			<div class="navbar-header">
				<a class="navbar-brand FootBlog" href="">FootBlog</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right">
					<button type="submit" class="btn btn-success"><a href="WelcomePage.html">Log Out</a></button>
				</form>
			</div>
		</div>
	</nav>
	
	<div class="dashboard" >
		<ul>
			<br><br><br>
			<li class="link">
				<a href="Admin.php">
					<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
					<span class="hidden-sm hidden-xs">Dashboard</span>
				</a>
			</li>

			<li class="link ">
				<a href="Admin_ListofBloggers.php">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<span class="hidden-sm hidden-xs">Bloggers</span>
					<span class="badge mybadge">
						<?php
						require '../PHP/connect.php';
						$mysql_blogger_table = "blogger_info";
						$select_blogger_query = "SELECT blogger_id from $mysql_blogger_table";
						$list = mysqli_query($link,$select_blogger_query);
						echo mysqli_num_rows($list);
						?>
					</span>
				</a>
			</li>

			<li class="link">
				<a href="Admin_Messages.php" data-toggle="collapse" aria-controls="collapse-comments">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					<span class="hidden-sm hidden-xs">Messages</span>
					<span class="badge mybadge">
						<?php
						$mysql_table = "contact_me";
						$select_query = "SELECT id from $mysql_table";
						$result = mysqli_query($link,$select_query);
						echo mysqli_num_rows($result);
						?>
					</span>
				</a>
			</li>
			<li class="link">
				<a href="SetPermission.php" data-toggle="collapse" aria-controls="collapse-post">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
					<span class="hidden-sm hidden-xs">Permissions</span>
					<span class="label label-success mylabel">Active 
						<?php
						$active_query = "SELECT blogger_id from $mysql_blogger_table WHERE blogger_is_active = 1";
						$active = mysqli_query($link,$active_query);
						echo mysqli_num_rows($active);
						?>
					</span><br>
					<span class="label label-danger mylabel">Inactive  
						<?php
						$Inactive_query = "SELECT blogger_id from $mysql_blogger_table WHERE blogger_is_active = 0";
						$inactive = mysqli_query($link,$Inactive_query);
						echo mysqli_num_rows($inactive);
						?></span>

					</a>
				</li>
			</ul>
		</div>
		<div class="mycontent">
			<div class="content-inner">
				<?php
				require '../PHP/connect.php';
				$mysql_table = "blog_master";
				$id = $_GET['id'];
				$select_query = "SELECT blog_title,blog_category,blog_author,creation_date,blog_id,blog_desc FROM $mysql_table WHERE blogger_id=$id;";
				$result = mysqli_query($link , $select_query);

				if (mysqli_num_rows($result) > 0) {

					while($row = mysqli_fetch_assoc($result)){

						echo "<div class='custom_row'>";
						echo "<div class='heading'>";
						echo "<header><h4 class='nameofperson' ><a href='DetailedBlog.php?id=".$row['blog_id']."' class='Mya'>".$row['blog_title']."</a></h4></header>";
						echo "</div>";
						echo "<div class='mydesc'>";
						echo "<p class='mydesc'>".$row['blog_desc']."</p>";
						echo "</div>";
						echo "<div class='bottom'>";
						echo "<footer class='posted'>Posted by : <span class='s'>".$row['blog_author']."</span></footer>";
						echo "<footer class='posted'>Posted on : <span class='s'>".$row['creation_date']."</span></footer>";
						echo "<footer class='posted'>Category  : <span class='s'>".$row['blog_category']."</span></footer>";
						echo "<div class='article-actions'>";


						echo "<a class='btn btn-xs btn-default edit' href='../PHP/deleteblogadmin.php?blogid=".$row['blog_id']."&bloggerid=".$id."' role='button'>";
					// echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'>&nbsp;Delete</span>";
						echo "<input type='submit' value='Delete' class='btn btn-success del'>";
						echo "</a>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
						echo "<br><br><br>";

					}
				}
				else {
					echo "<h1>Nothing to display</h1>";
				}
				mysqli_close($link);
				?>
			</div>

		</div>
	</body>
	</html>