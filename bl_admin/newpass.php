<?php
    $con = mysqli_connect("localhost","root","","db_donor");//database connection
    $pass = $_POST['pass'];
    $mail = $_POST['umail'];
  	$query = "UPDATE admin_user SET upass='".MD5($pass)."' WHERE umail='$mail'";     $result = mysqli_query($con,$query);
if($result)
{
    session_start();
    $_SESSION['message']="Password successfully changed";
    header("location:page-login.php");
}
?>