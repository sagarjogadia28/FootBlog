<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/navigation.css">
	<link rel="stylesheet" type="text/css" href="../CSS/ContactUs.css">
	<title>FootBlog/Contact Us</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand FootBlog" href="#" onclick="javascript:window.location.href='Welcomepage.html'; return false;">FootBlog</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right">
					<a href="#" onclick="javascript:window.location.href='Signin.php'; return false;">
						<button type="submit" class="btn btn-success signIn">Sign in</button></a>
						&nbsp;
						<a href="#" onclick="javascript:window.location.href='Signup.php'; return false;">
							<button type="submit" class="btn btn-success">Sign Up</button></a>
						</form>
					</div>
				</div>
			</nav>
			<div class="contact">

				<h2> Contact Me</h2>
				<hr>
				<form class="form-signin" action="ContactUs.php" method="post" >

					<label class="sr-only">First Name</label>
					<input type="text" name = "firstname" id="firstname" class="form-control" placeholder="First Name" required>

					<label class="sr-only">Last Name</label>
					<input type="text" name = "lastname" id="lastname" class="form-control" placeholder="Last Name" required>

					<label class="sr-only">Message</label>
					<textarea class="form-control" rows="8" name = "message" placeholder="Type here!!" required></textarea>

					<p id="Error" class="error">
						<?php
						require '../PHP/connect.php';
						if(isset($_POST['send'])){
							$mysql_table = "contact_me";
							$firstname = $_POST['firstname'];
							$lastname = $_POST['lastname'];
							$message = $_POST['message'];

							$insert_query = "INSERT INTO $mysql_table ( first_name , last_name , message ) 
							VALUES ( '$firstname' , '$lastname', '$message')";
							$result = mysqli_query($link , $insert_query);

							if (!$result) {
								echo "Your Message was not Sent!!";
							}
							echo "Your Message has been Sent!!";

							mysqli_close($link);
						}

						?>
					</p>
					<button class="btn btn-lg btn-primary btn-block send" name="send" type="submit">Send</button>

				</form>
			</div>
		</body>
		</html>