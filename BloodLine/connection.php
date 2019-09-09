<?php
$con=mysqli_connect("localhost","root","","db_donor");
if($con)
    echo ("connection created");
else
    echo ("connection not created");
?>