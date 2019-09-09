<?php
if(isset($_POST['save']))
{
		if(!empty($_POST['name']) && !empty($_POST['pass']))
		{
				$con=mysqli_connect("localhost","root","","db_donor");//database connection
				//mysqli_select_db("shop");

				$name=$_POST['name'];
				$pass=$_POST['pass'];

				$sql="SELECT * FROM user WHERE name ='$name' and upass='".MD5($pass)."'";
				//echo $sql;
				//exit;
				$result=mysqli_query($con,$sql);
				$count=mysqli_num_rows($result);

				if($count==1)
				{
					session_start();
					$_SESSION['currentuser']=$name;
					header("Location: ../../doner_profile.php");
				}
				else 
				{
					session_start();
					$_SESSION['message']="Wrong userid or password.";
					header("location:../../donorLogin.php");

				}
		}
		else
		{
			session_start();
				$_SESSION['message']="Please enter userid and password.";
				header("location:../../donorLogin.php");
		}
}
?>