<?php 
	session_start();
	session_destroy();
	session_start();
	$_SESSION['message']="Logout successfully.";
	header("location:donorLogin.php");
?>