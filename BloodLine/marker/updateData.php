<?php
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];
$connection = mysqli_connect ("localhost","root","","db_donor");
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}
$query = "UPDATE markers SET address = '".$address."', lat = '".$lat."', lng='".$lng."' , type='".$type."' WHERE name = '".$name."' ";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
?>  