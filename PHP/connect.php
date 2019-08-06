<?php
error_reporting(0);
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "root";
$mysql_db = "blog";


$link = mysqli_connect($mysql_host ,$mysql_user , $mysql_password , $mysql_db ) or die("Connection Lost!");
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }


// $db = new mysqli($mysql_host ,$mysql_user , $mysql_password , $mysql_db );

// if($db -> connect_errno != 0 )
// 	echo "Cannot connect!!";
// else
// 	echo "Successfully Connected!!";
	


?>