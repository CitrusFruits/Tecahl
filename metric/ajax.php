<?php
include("config.php");
$functionName = $_POST["function"];
switch($functionName)
{
	case("updatePriority");
		updatePriority();
		break;
}
function updatePriority()
{
	mysql_connect(host, username, password);
	mysql_select_db(database);
	for($x = 0; $x < $_POST["size"]; $x++)
	{
		$jlabel = $_POST["$x"];
		mysql_query( "update graphs set priority = $x where j_label = '$jlabel'");
	}
}
?>
