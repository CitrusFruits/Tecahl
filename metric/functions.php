<?php

//Array for rows and columns
$tableArray=Array();
require_once("config.php");

//prints arrays
function print_debug($debug_string){
		echo "<pre>";
		print_r($debug_string);
		echo"</pre>";
	}
	
//insert config file and connect to it, create arrays
function connectMySql(){
			
	$mysql=mysql_connect(host, username, password);
	mysql_select_db(database, $mysql);
	$requestTable = mysql_query('show tables');

	
    while ($row = mysql_fetch_row($requestTable)) {
        $result = mysql_query("show columns FROM $row[0]");
        while ($field = mysql_fetch_array($result)) {
        	$tableArray[$row[0]][]=$field[0];
        }
    }
    
    return json_encode($tableArray);
}

function setConfigFile($config){
	include("$config");
}

function fetchArray(){
	return $tableArray;
}

function fetchJsArray(){
	return json_encode($tableArray);
}

function getHeader(){
	include_once("header.php");
}

function append($str1, $str2){
	$str1="$str1"."$str2";
}

function postMySql(){

	$mysql=mysql_connect(host, username, password);
	mysql_select_db(database, $mysql);
	
	$result = mysql_query("SELECT * FROM graphs");
	$num_rows = mysql_num_rows($result);
	
	mysql_query("insert into graphs values (0,'".
	getGraphName()."','".
	"graph"."$num_rows"."','".
	$_POST['DataComboBox']."','".
	$_POST['selected_graph']."','".
	"Series_1"."','".
	$_POST['MeasureComboBox']."','".
	$_POST['DimensionComboBox']."','".
	$_POST['MeasureComboBox']."','".
	$_POST['DimensionComboBox']."'".
	")");
}


function getGraphName(){
	$gname=$_POST['MeasureComboBox']." vs ".$_POST['DimensionComboBox'];
	#$gname="test";
	return $gname;
}

//retrieve data on post
if($_POST['MeasureComboBox']){
	
	/*$filename = "graphs.php"; #Must CHMOD to 666
	$text = "<?php \n".
	"Define('Data_type','".$_POST['DataComboBox']."');\n".
	"Define('Measure','".$_POST['MeasureComboBox']."');\n".
	"Define('Dimension','".$_POST['DimensionComboBox']."');\n".
	"Define('Favorite','".$_POST['FavoriteBox']."');\n".
	"Define('Graph_type','".$_POST['selected_graph']."');\n".
	"?>";
	#$text = 'Define(\'Measure\',\''.$_POST['MeasureComboBox'].'\');'
	$fp = fopen($filename, "w"); # w = write to the file only, create file if it does not exist, discard existing 
	if ($fp) {
		fwrite ($fp, $text);
		fclose ($fp);
	}*/
	postMySql();
}
		


?>
