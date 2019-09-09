<?php
if(isset($_POST['save']))
{
		if(!empty($_POST['name']) && !empty($_POST['pass']))
		{
            $con=mysqli_connect("localhost","root","","db_donor");
            if($con){

            $name=$_POST["name"];
            $pass=$_POST["pass"];

            $sql="select * from admin_user where uname='$name' and upass='".MD5($pass)."'";
            $result=mysqli_query($con,$sql);
            $count=mysqli_num_rows($result);
                
            /*if(empty($n))
                header('location:login.html');
            else
            {
                $_SESSION["uid"]=$uid;
                //echo "login Done";
               header('location:index');
            }
    



if(isset($_POST['save']))
{
		if(!empty($_POST['uname']) && !empty($_POST['pass']))
		{
				$con=mysqli_connect("localhost","root","","db_donor");//database connection
	
				$uname=$_POST['uname'];
				$pass=$_POST['pass'];

				$sql="SELECT * FROM user WHERE uname ='$uname' and upass='".$pass."'";
				//echo $sql;
				//exit;
				$result=mysqli_query($con,$sql);
				$count=mysqli_num_rows($result);*/


				if($count==1)
				{
					session_start();
					$_SESSION['currentuser']=$uname;
					header("Location: ../../index.php");
				}
				else 
				{
					session_start();
					$_SESSION['message']="Wrong userid or password.";
					header("location:../../page-login.php");

				}
		}
		else
		{
			session_start();
				$_SESSION['message']="Please enter userid and password.";
				header("location:../../page-login.php");
		}
}
}
?>