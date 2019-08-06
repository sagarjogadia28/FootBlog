<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../CSS/Signup.css">
  <script type="text/javascript" src="../JS/Signup.js"></script>
  <title>FootBlog/SignUp</title>
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
              <!-- <button type="submit" class="btn btn-success"><a href="Signup.html">Sign Up</a></button> -->
              <!-- <button type="submit" class="btn btn-success" onclick="window.location.href='http://google.com';" >Sign Up</button> -->
            </form>
          </div>
        </div>
      </nav>

      <!-- SIGNUP PAGE -->
      <div class="signup">
       <form class="form-signin" action = "Signup.php" method = "post" onsubmit="return check()" >
        <h2 class="form-signin-heading">Sign Up</h2>

        <label for="username" class="sr-only">Username</label>
        <input type="text" name = "username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>


        <label for="password" class="sr-only">Password</label>
        <input type="password" name = "password" id="inputPassword" class="form-control pass" placeholder="Password" required>

        <label for="retype" class="sr-only">Retype Password</label>
        <input type="password" name = "retype" id="inputRePassword" class="form-control" placeholder="Retype Password" required>

        <p id="Error" class="error">
          <?php
          require '../PHP/connect.php';
          $mysql_table = "blogger_info";
          if(isset($_POST['submit']))
          {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $search_query = "SELECT blogger_username FROM $mysql_table WHERE blogger_username='$username';";
            $r = mysqli_query($link , $search_query);

            if (mysqli_num_rows($r) == 1) {
              echo "Username already exists!!";
              mysqli_close($link);
            }
            else{
              $insert_query = "INSERT INTO $mysql_table ( blogger_username , blogger_password ) 
              VALUES ( '$username' , '$password')";
              $result = mysqli_query($link , $insert_query);

              if (!$result) {
               echo "Something went wrong";
             }

      // printf ("New Record has id %d.\n", mysqli_insert_id($link));
             header("location: Signin.php");

             /* close connection */
             mysqli_close($link);
      //printf("Affected rows (INSERT): %d\n", $mysqli->affected_rows);
           }
         }

         ?>


       </p>

       <button class="btn btn-lg btn-primary btn-block" name = "submit"type="submit">Submit</button>
     </form>
   </div>

 </body>
 </html>