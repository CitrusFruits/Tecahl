<html>
<header>
	<link rel="stylesheet" type="text/css" href="theme.css" />
	<style type="text/css">
</style>
</header>
<body>	
</body>
</html>
<?php
phpinfo();
include("config.php");  
$mysqli = new mysqli(host, username, password, database);
if (mysqli_connect_error()) {
	echo("<br/>");
    die ("<div class='box_small center'> Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."</div>");
}
$mysqli->query("CREATE TABLE graphs (ID int(10) not null auto_increment primary key, Label VARCHAR(15), type VARCHAR(6), filter)");
if (mysqli_connect_error()) {
	echo("<br/>");
    die ("<div class='box_small center'> Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."</div>");
}
else if ($result = $mysqli->query("SELECT * FROM contacts LIMIT 10")) {
	echo("<div class=box_small>");
    printf("Select returned %d rows.<br/>", $result->num_rows);
    while ($row = mysqli_fetch_array($result)) {
	foreach ($row as $key => $val) {
		print ("$val ");
		}
	echo("<br/>");
	}
    echo("</div>");
}
echo("<div class='box_small center'> Hey </div>");
?>
