<?php
if(isset($_POST['save']))
{
		//include("connection.php");
		$con=mysqli_connect("localhost","root","","db_donor");
		if($con)
		{
				$name=$_POST["name"];
            $id=$_POST["id"];
				
				$mob=$_POST["mob"];
				$rmob=$_POST["rmob"];			
				$gender=$_POST["gender"];
			
				$ldate=$_POST["lastDonatedate"];
				$weight=$_POST["weight"];
                $msg=$_POST["msg"];
                $date = date("Y-m-d H:i:s");
				$sql = "UPDATE donor_detail SET 				
				contact='".$mob."',
				rContact='".$rmob."',			
				LDD='".$ldate."',				
				weight='".$weight."' WHERE name = '$name'";
				//echo $sql; exit;
                if ($con->query($sql) == TRUE) 
                {
                    $last_id = $con->insert_id;
                    //-------------inserting donor as user ------------
                    if($msg)
                    {
                       $sql_comment = "INSERT into comments (d_id,name,message,date) values('$id','".$name."','$msg',
                       '$date')";
                        $result_cmnt = mysqli_query($con,$sql_comment);	
                        if($result_cmnt){
                            session_start();
                            $_SESSION['message']="Your data is successfully saved.";
                            header("Location: ../../doner_profile.php");
                        }
                        else{
                            session_start();
                            $_SESSION['message']="Error while saving the data!";
                            header("Location: ../../doner_profile.php");
                        }                        
                    }  // comments r saved   
                    session_start();
                    $_SESSION['message']="Your data is successfully saved.";
                    header("Location: ../../doner_profile.php");                           
                    // ------------ends----------------
                }
                else 
                {
                            session_start();
                            $_SESSION['message']="Error while saving the data!";
                            header("Location: ../../doner_profile.php");
                }
        }
	else{
		session_start();
		$_SESSION['message']="Error while connecting the Database!";
		header("Location: ../../doner_profile.php");
	}
}
else{
	session_start();
	$_SESSION['message']="Please fill the Fields properly!!";
	header("Location: ../../doner_profile.php");
}
?>