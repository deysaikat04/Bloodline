<?php

//require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysqli_connect ("localhost","root","","db_donor");
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
/*
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}*/

// Select all the rows in the markers table

$query = "SELECT m.id,m.name,d.pname,m.address,m.lat,m.lng ,( 3959 * acos( cos( radians(22.607672) ) * cos( radians( m.lat ) ) * cos( radians( m.lng) - radians(88.394493) ) + sin( radians(22.607672) ) * sin( radians( m.lat ) ) ) ) AS distance FROM  markers m,donor_detail d where m.name=d.name HAVING distance < 10 ORDER BY distance LIMIT 0 , 20";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){ 
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['m.id']);
  $newnode->setAttribute("name",$row['d.pname']);
  $newnode->setAttribute("address", $row['m.address']);
  $newnode->setAttribute("lat", $row['m.lat']);
  $newnode->setAttribute("lng", $row['m.lng']);
  $newnode->setAttribute("type", $row['m.type']);
}

echo $dom->saveXML();

?>