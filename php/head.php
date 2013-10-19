<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<title>phaser - <?php echo $title?></title>
	<base href="/Tecahl/">
	<script src="js\phaser\build\phaser.js"></script>
	<?php
		//require('js.php');

		if (isset($mobile))
		{
	?>
    <meta name="viewport" content="initial-scale=1 maximum-scale=1 user-scalable=0" />
	<?php
		}
	?>
	<link rel="stylesheet" type="text/css" href="styles/game.css">
</head>
<body>
