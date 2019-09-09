<?php
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
$connection=mysqli_connect ("localhost","root","","db_donor");
if (!$connection) {
  die("Not connected : " . mysql_error());
}
$query = sprintf("SELECT m.id,m.name,d.pname,m.address,m.lat,m.lng ,( 3959 * acos( cos( radians('%s') ) * cos( radians( m.lat ) ) * cos( radians( m.lng) - radians('%s') ) + sin( radians('%s') ) * sin( radians( m.lat ) ) ) ) AS distance FROM  markers m,donor_detail d where m.name=d.name HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$center_lng),
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$radius));
$result = mysqli_query($connection,$query);
if (!$result) {
  die("Invalid query: " . mysql_error());
}
header("Content-type: text/xml");
while ($row = @mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['id']);
  $newnode->setAttribute("name", $row['pname']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();
?>