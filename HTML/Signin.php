<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../CSS/Signin.css">
  <title>FootBlog/SignIn</title>
</head>
<body>

  <!-- NAVIGATION BAR -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand FootBlog" href="#" onclick="javascript:window.location.href='Welcomepage.html'; return false;">FootBlog</a>
        <!-- <a class="navbar-brand ContactUs" href="#">Contact Us</a> -->
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right">
          <a href="ContactUs.php" class="navbar-brand contact">Contact Us</a>
          <a href="#" onclick="javascript:window.location.href='Signin.php'; return false;">
            <button type="submit" class="btn btn-success signIn">Sign in</button></a>
            &nbsp;
            <a href="#" onclick="javascript:window.location.href='Signup.php'; return false;">
              <button type="submit" class="btn btn-success">Sign Up</button></a>
              <!-- <button type="submit" class="btn btn-success" onclick="window.location.href='Signup.html';">Sign Up</button> -->
            </form>
          </div>
        </div>
      </nav>

      <!-- LOGIN PAGE -->
      <div class="login">
        <form class="form-signin" action = "Signin.php" method = "post">
          <h2 class="form-signin-heading">Welcome</h2>

          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" name = "username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required>

          <p id="Error" class="error">
           <?php
           require '../PHP/connect.php';
           if(isset($_POST['submit'])){
             $mysql_table = "blogger_info";
             $username = $_POST['username'];
             $password = $_POST['password'];

             if($username == 'admin' && $password == 'admin123')
              header("location: Admin.php");
            else
            {
              $select_query = "SELECT blogger_username,blogger_id,blogger_is_active FROM $mysql_table WHERE blogger_username='$username' and blogger_password = '$password';";
              $result = mysqli_query($link , $select_query);

              if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_row($result);
                if($row[2] == 0)
                 echo "Permission  Denied";
               else{
                session_start();
                $_SESSION["user"] = $row[0];
                $_SESSION["id"] = $row[1];
                header("location: NewBlog.php");
              }
            }
            else {
              echo "Invalid Username or Password!!";
            }
            mysqli_close($link);
          }
        }

        
        ?>
      </p>

      <button class="btn btn-lg btn-primary btn-block" name = "submit"type="submit">Sign in</button>
      <!-- <textarea cols="100" rows="50"></textarea> -->
    </form>
  </div>

</body>
</html>