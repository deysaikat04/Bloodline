<?php
    $con = mysqli_connect("localhost","root","","db_donor");//database connection
    $pass = $_POST['pass'];
    $name = $_POST['name'];
	$query = "UPDATE user SET upass='".MD5($pass)."' WHERE name='$name'";
    $result = mysqli_query($con,$query);
if($result)
{
	session_start();
	$_SESSION['message']="Password successfully changed";
	header("location:donorLogin.php");
}
else
    echo $result;
?>