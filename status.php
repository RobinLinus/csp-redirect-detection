<?php
	session_start();
	$state = apc_fetch(session_id()."") == "1" ? true : false;
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSP Redirect Detection</title>
	<style>
		body{
			padding: 12%;
			color:white;
			font-family: 'Helvetica', sans-serif;
			font-size: 23px;
			text-rendering: optimizeLegibility;
			background: <?php echo $state ? "teal" : "tomato"?>;
		}
		div{
			margin-bottom: 32px;
		}
		a {
			color: white;
			text-decoration: none;
			font-size: 17px;
		}
		a:hover{
			text-decoration: underline;
		}
	</style>
</head>
<body>
<div>
LinkedIn status: <?php echo $state ? "logged in" : "not logged in"?>
</div>
<a href="/">Click here to try again.</a>
</body>
</html>