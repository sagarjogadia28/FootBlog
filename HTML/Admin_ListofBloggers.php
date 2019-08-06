<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admin_listofbloggers.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
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
				<table class="table">
					<thead>
						<tr>
							<th>Blogger_id</th>
							<th>Username</th>
							<th>Total Blogs</th>
							<th>Status</th>
							<th class="hidden-xs">Created</th>
						</tr>
					</thead>
					<tbody>
						<?php

						require '../PHP/connect.php';
						$mysql_table = "blogger_info";


						$select_query = "SELECT blogger_id ,blogger_username,blogger_creation_date,blogger_is_active FROM $mysql_table;";
						$result = mysqli_query($link , $select_query);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)){

								$user = $row['blogger_id'];
								$count_query = "SELECT blog_id FROM blog_master WHERE blogger_id='$user';";
								$r = mysqli_query($link,$count_query);

								echo "<tr>";
								echo "<td>".$row['blogger_id']."</td>";
								echo "<td><a href='AdminDelete.php?id=".$row['blogger_id']."'>".$row['blogger_username']."</a></td>";
								echo "<td>".mysqli_num_rows($r)."</td>";
								if($row['blogger_is_active'] == 1)
									echo "<td><span class='label label-success'>Active</span></td>";
								else
									echo "<td><span class='label label-danger'>Inactive</span></td>";
								echo "<td class='hidden-xs'>".$row['blogger_creation_date']."</td>";
								echo "</tr>";
							}
						}


						?>
					</tbody>
				</table>
			</div>

		</div>
	</body>
	</html>