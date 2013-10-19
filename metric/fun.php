<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>FitText</title>

	<style type="text/css">
		body {
		  background: #233a40; 
		  color: #fff;
		  font: 16px/1.8 sans-serif;
		}
		.container {
			width: 84%;
			margin:0 auto;
			max-width:1140px;
		}
		header {
			width: 100%;
			margin:0px auto;
		}
		h1 {
			background: rgba(0,0,0,0.2);
			text-align: center;
			color:#fff;
			font: 95px/1 "Impact";
			text-transform: uppercase;
			display: block;
			text-shadow:#253e45 -1px 1px 0,
			#253e45 -2px 2px 0,
			#d45848 -3px 3px 0,
			#d45848 -4px 4px 0;
			margin: 5% auto 5%;
		}
	</style>

	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>

	<div class="container">
		<header>
		<h1 id="fittext1">Squeeze with FitText</h1>
		<h1 id="fittext2">Squeeze with FitText</h1>
		<h1 id="fittext3">Squeeze with FitText</h1>
		</header>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 	<script src="jquery.fittext.js"></script>
	<script type="text/javascript">
		$("#fittext1").fitText();
		$("#fittext2").fitText(1.2);
		$("#fittext3").fitText(1.1, { minFontSize: 50, maxFontSize: '75px' });
	</script>

</body>
</html>
