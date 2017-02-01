<?php 
// The browser's Content Security Policy reports to this endpoint when ever
// a request to any other domain than https://fr.linkedin.com occures.
 
apc_store($_GET["id"],"1");
?>