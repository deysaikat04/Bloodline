<?php 
	session_start();
	session_destroy();
    session_start();
    $_SESSION['message']="You have successfully log out.";
	header("location:page-login.php");
?>