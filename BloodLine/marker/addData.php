<?php
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];
// Opens a connection to a MySQL server.
$connection = mysqli_connect ("localhost","root","","db_donor");
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}
$query = sprintf("INSERT INTO markers " .
         " (id, name, address, lat, lng, type ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s');",
         mysqli_real_escape_string($connection,$name),
         mysqli_real_escape_string($connection,$address),
         mysqli_real_escape_string($connection,$lat),
         mysqli_real_escape_string($connection,$lng),
         mysqli_real_escape_string($connection,$type));
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
?>  