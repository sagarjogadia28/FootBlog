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
							<th>Permission</th>
						</tr>
					</thead>
					<tbody>
						<?php

						require '../PHP/connect.php';
						$mysql_table = "blogger_info";


						$select_query = "SELECT blogger_id ,blogger_username,blogger_is_active FROM $mysql_table;";
						$result = mysqli_query($link , $select_query);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)){

							// $user = $row['blogger_id'];
							// $count_query = "SELECT blog_id FROM blog_master WHERE blogger_id='$user';";
							// $r = mysqli_query($link,$count_query);

							// if($row['blogger_is_active']){
								?>
								<tr>
									<td><?php echo $row['blogger_id']?></td>
									<td><?php echo $row['blogger_username']?></td>
									<td>	
										<input type="radio" name="<?php echo $row['blogger_id']; ?>" value="Active" <?php if($row['blogger_is_active']) echo 'checked'; ?>
										onclick="changed( <?php echo $row['blogger_id']; ?> ,1)"
										>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="<?php echo $row['blogger_id']; ?>" value="Inactive" <?php if(!$row['blogger_is_active']) echo 'checked'; ?>
										onclick="changed(<?php echo $row['blogger_id']; ?>,0)"
										>Inactive
									</td>
									</tr>
									<?php 
								}
							}
							mysql_close($link);


							?>
						</tbody>
					</table>
					<script type="text/javascript">
						function changed(passedvalue , checked){
							var url = "../PHP/updatepermssion.php?id="+passedvalue+"&c="+checked;
							window.document.location.href = url;
						}

					</script>

					<!-- <button type="submit" class="btn btn-success done"><a href="../PHP/updatepermssion.php">Done</a></button> -->
				</div>

			</div>
		</body>
		</html>