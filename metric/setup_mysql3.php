<html>
<header>
<link rel="stylesheet" type="text/css" href="setup_mysql1.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
	<?php include("functions.php");?>
<?php getHeader();?>
</header>
<body>	
<?php
include("config.php");  
mysql_connect(host, username, password);
mysql_select_db(database);
$result = mysql_query("CREATE TABLE graphs (priority INT(10), 
	graph_label VARCHAR(50), j_label VARCHAR(50), table_name VARCHAR(15), graph_type VARCHAR(10), series_label VARCHAR(50),
	x_label VARCHAR(50), y_label VARCHAR(50), x_data VARCHAR(40), y_data VARCHAR(40));");
if (!$result) {
	echo("<div id='box' style='height: 125px'>
			<div class='column'>
				<div class='section' id='title'>
				<h2>Table Creation Error</h2>
				</div><br/>");
    echo ("(" . mysql_error() . ")");
    echo("<br/>If you are seeing this error make sure you have done all theses things, then try refreshing the page");
    //echo("<ul><li>Stuff</li></ul>");
    echo("</div>");
}
header('Location: charts.php');
/*INSERT INTO graphs (priority, graph_label, j_label, table_name, graph_type, series_label, x_label, y_label, x_data, y_data) 
VALUES(1, 'Stuff', 'stuff', 'employees', 'line', 'employees and things', 'xish', 'y...kinda', 'employeeNumber', 'reportsTo');
* INSERT INTO graphs (priority, graph_label, j_label, table_name, graph_type, series_label, x_label, y_label, x_data, y_data) 
VALUES(2, 'sdds', 'stwefweuff', 'customers', 'line', 'employees and things', 'xish', 'y...kinda', 'customerNumber', 'salesRepEmployeeNumber');
* INSERT INTO graphs (priority, graph_label, j_label, table_name, graph_type, series_label, x_label, y_label, x_data, y_data) 
VALUES(0, 'Number of Employees', 'num_E', 'employees', 'digit', null, null, null, null, null);
* INSERT INTO graphs (priority, graph_label, j_label, table_name, graph_type, series_label, x_label, y_label, x_data, y_data) 
VALUES(1, 'Stuff', 'stuff', 'employees', 'line', 'employees and things', 'xish', 'y...kinda', 'employeeNumber', 'reportsTo');
* INSERT INTO graphs (priority, graph_label, j_label, table_name, graph_type, series_label, x_label, y_label, x_data, y_data) 
VALUES(3, 'Pie', 'pietest', 'products', 'pie', 'things', 'xish', 'y...kinda', 'buyPrice', 'MSRP');*/
?>
