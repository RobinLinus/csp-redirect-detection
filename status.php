<?php
	session_start();
	$id = session_id()."";
	$state = apc_fetch($id);
	if( $state == "" ){
		header('Location: /');
		exit;
	}
	apc_delete($id);
	$state = ($state == "1") ? true : false;
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			margin-bottom: 48px;
		}

		a {
			color: white;
			text-decoration: none;
			font-size: 17px;
		}
		a:hover{
			text-decoration: underline;
		}

		footer{
			position: fixed;
			bottom: 16px;
		}
	</style>
</head>
<body>
<div>
You are currently <b><?php echo $state ? "signed in" : "signed out"?></b> on LinkedIn.
</div>
<ul>
<li><a href="https://www.linkedin.com/" target="linkedin"><b><?php echo $state ? "Sign out" : "Sign in"?></b> on LinkedIn</a></li>
<li><a href="https://www.eff.org/privacybadger" target="_blank"><b>Protect</b> yourself with Privacy Badger</a></li>
<li><a href="https://github.com/RobinLinus/csp-redirect-detection" target="_blank"><b>View</b> Source</a></li>

<!-- Restart detection after 20s -->
<meta http-equiv="refresh" content="20;URL='/'" />	
</ul>
</body>
</html>
