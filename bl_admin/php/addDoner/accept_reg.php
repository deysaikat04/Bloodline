<?php

//include("connection.php");
if(!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['mail']))
{
$con=mysqli_connect("localhost","root","","db_donor");
if($con)
{
    $uname = $_POST["name"];
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

    $sql="INSERT into admin_user(uname,upass,umail) VALUES ('".$uname."','".MD5($pass)."','".$mail."')";
        
    $result = mysqli_query($con,$sql);
    
    if($result)
    //echo ("data inserted into database");
        header("Location: ../../page-login.php");
    else
        header("Location: ../../page-register.php");
    //echo ("fail");
}
else{
    echo "Error";
}
}

?>
    