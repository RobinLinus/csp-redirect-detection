<?php 
// The browser's Content Security Policy reports to this endpoint when ever
// a request to any other domain than https://fr.linkedin.com occures.

$id = $_GET["id"];		// user's session id
apc_store($id,"1");		// is logged in. (bc redirect occured and report-uri was called)
?>