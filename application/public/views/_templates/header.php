<?php

// This here blocks direct access to this file (so an attacker can't look into application/views/_templates/header.php).
// "$this" only exists if header.php is loaded from within the app, but not if THIS file here is called directly.
// If someone called header.php directly we completely stop everything via exit() and send a 403 server status code.
// Also make sure there are NO spaces etc. before "<!DOCTYPE" as this might break page rendering.
if (!$this) {
    exit(header('HTTP/1.0 403 Forbidden'));
}

?><!DOCTYPE html>
<html>
    <head>
        <title>WaffleFry API Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js"></script>
    </head>
    
