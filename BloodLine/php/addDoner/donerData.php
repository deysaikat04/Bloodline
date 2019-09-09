<?php
if(isset($_POST['save']))
{
		//include("connection.php");
		$con=mysqli_connect("localhost","root","","db_donor");
		if($con)
		{
				$pname=$_POST["pname"];
				$mob=$_POST["mob"];
				$rmob=$_POST["rmob"];
				//$address=$_POST["address"];
				$mail=$_POST["mail"];
				$gender=$_POST["gender"];
				$bgrp=$_POST["bgrp"];
				$ldate=$_POST["lastDonatedate"];
				$dob=$_POST["dob"];
				$weight=$_POST["weight"];
				$name=$_POST["name"];
				$pass=$_POST["pass"];
				$status = 1;
				$imageSuc =1;
			$typ=$_FILES['file']['type'];
			$size = $_FILES['file']['size'];
			$max_allowed = $size / 1024; //KB
			$fp = fopen($_FILES['file']['tmp_name'], 'r');
			$db_img = fread($fp, filesize($_FILES['file']['tmp_name']));
			$db_img = chunk_split(base64_encode($db_img));
            if($max_allowed < 200){ //checks image size in KB
				//-------------inserting donor details ------------
               	$sql="INSERT into donor_detail(pname,name,contact,rContact,gender,bGroup,LDD,DOB,weight,status,DP_img,imgType) VALUES ('".$pname."','".$name."','".$mob."','".$rmob."','".$gender."','".$bgrp."','".$ldate."','".$dob."','".$weight."','$status','".$db_img."','".$typ."')";
					if ($con->query($sql) === TRUE) 
					{
						$last_id = $con->insert_id;						
						//-------------inserting donor as user ------------
                        $sql_user = "INSERT into user(name,upass,umob,umail,d_id) VALUES ('".$name."','".MD5($pass)."','".$mob."','".$mail."','".$last_id."')";
						if ($con->query($sql_user) === TRUE) 
						{
								$last_id = $con->insert_id;
								session_start();
								$_SESSION['message']="Your data is successfully saved.";
								header("Location: ../../doner_signup.php");
						} 
						else 
						{
								session_start();
								$_SESSION['message']="Error while saving the details!";
								header("Location: ../../doner_signup.php");
						}	
						// ------------ends----------------
					}
					else 
					{
								session_start();
								$_SESSION['message']="Error while saving the data!";
								header("Location: ../../doner_signup.php");
					}
				}
				else{
								session_start();
								$_SESSION['message']="Error while saving the Image!";
								header("Location: ../../doner_signup.php");
				}
			  // ------------ends----------------
		}
	else{
		session_start();
		$_SESSION['message']="Error while connecting the Database!";
		header("Location: ../../doner_signup.php");
	}
}
else{
	session_start();
	$_SESSION['message']="Please fill the Fields properly!!";
	header("Location: ../../doner_signup.php");
}
?>