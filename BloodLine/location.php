<html>
<body>
<div id="wrapper">
<?php
$ip=$_SERVER['REMOTE_ADDR'];
	echo "<pre>";
echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip)));
?>
</div>
</body>
</html>