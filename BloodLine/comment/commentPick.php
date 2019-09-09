<?php
	if(isset($_POST['commentSubmit'])){
        $con=mysqli_connect("localhost","root","","db_donor");
		if($con)
		{
			$name=$_POST['name'];
			$date=$_POST['date'];
			$message=$_POST['message'];
		//if($message!=null)
       // {
       //echo "alert($name,$date,$message)";
        $sqlcomment="INSERT INTO `comments`(`cid`, `name`, `message`, `date`) VALUES (`cid`,'".$name."','".$message."','".$date."')";
        //}
        if ($con->query($sqlcomment) === TRUE) 
						{
                           // $name=null;$date=null;$message=null;
                           // $last_id = $con->insert_id;
						//-------------inserting donor as user ------------
						
								//$last_id = $con->insert_id;
		
                            session_start();
								$_SESSION['message']="Your comment is successfully saved.";
                            	header("Location: ../doner_profile.php");
                        } 
						else 
						{
                           // $name=null;$date=null;$message=null;
                            session_start();
								$_SESSION['message']="Error while saving the details!";
								header("Location: ../doner_profile.php");				
						}
        }
	}
?>