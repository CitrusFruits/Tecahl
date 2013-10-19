<?php
include('setup_mysql2.php');
include_once("header.php");

if(isset($_POST['form_submitted']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$host=$_POST['host'];
	$dbname=$_POST['dbname'];
	mysql_connect($host, $username, $password);
	mysql_select_db($dbname);

	if($username==NULL || $host==NULL || $dbname==NULL)
	{
		$error = "Be sure to fill out all the fields";
	}
	if(mysql_error())
	{
		$error = "Connect failed: ". mysql_error();
	}
	else
	{
		$error = setupConfig($username, $password, $host, $dbname);
		$continue='yeah';
	}
	if(!isset($error))
	{
		header('Location: setup_mysql3.php');
	}
}
?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
</head>

	<div id="box" style="width: 600px;height: 400px">
			<div class="column" style="width:80%">
				<div class="section" id="title">
				<h2>Setup MySQL</h2>
				</div>
	<br/>
		<div class="pane section" style="padding:0px 0px 20px 0px; height: 200px">
		<form action="setup_mysql1.php" method="post">
		<input type="hidden" name = "form_submitted"/>
		<div class="line" style="width:90%">
						<div class="label left">Database Name</div>
		<input type="text" name="dbname" class="input right"><br></div>
		<div class="line" style="width:90%">
		<div class="left">MySQL User Name</div>
		<input type="text" name="username" class="input right"><br></div>
		<div class="line" style="width:90%">
		<div class="left">Password</div>
		<input type="password" name="password" class="input right"><br></div>
		<div class="line" style="width:90%">
		<div class="left">Database Host</div>
		<input type="text" name="host" class="input right"><br></div>
		<button class="button right" style="position: relative;"value="Submit">Submit</button>
		</form>
		</div>
				<button class="button left" id='relativebutton'
				onClick="window.location.href='setup.html'">Go Back</button>

			</div>
			</div>
			</div>
		<?php if(isset($error))
		{
			echo("<div id='box' style='width: 600px;height: auto'>
				<div class='column' style='width: 80%; height:auto'><h2>Error.<br/></h2>
				<div class='pane' style='padding: 10px'>{$error}</div><br/></div>");
				if (isset($continue))
				{
					echo("<button class='button' onClick=\"window.location.href='setup_mysql3.php'\">Continue</button>");
				}
				echo("</div>");
		}
		?>
</html>
