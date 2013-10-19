<?php
function setupConfig($name, $pwd, $hst, $db)
{
	$fileName = "config.php";
	$lassie; //lassie goes home
	define('DIR', getcwd().'/');
	if(!is_writable(DIR."$fileName"))
	{
		$lassie="File Write Not Succesful<br/>
			Sorry, but I can't write to  the <code>config.php</code> file.
			You can edit the <code>config.php</code> manually and paste the following text into it:<br/><br/>
			<code>&#60;?php <br/>
			DEFINE('username', '$name');<br/>
			DEFINE('password', '$pwd');<br/>
			DEFINE('host', '$hst');<br/>
			DEFINE('database', '$db');
			?></code>";
	}
	else
	{
		$fp=fopen($fileName, "w");
		fwrite($fp, "<?php 
			DEFINE('username', '$name');
			DEFINE('password', '$pwd');
			DEFINE('host', '$hst');
			DEFINE('database', '$db');
			?>");
		fclose($fp);
		mysql_close();
	}
	return $lassie;
}
?>
