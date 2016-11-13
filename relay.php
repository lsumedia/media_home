<?php

header('Content-type: application/json');
//Disable caching
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require 'init.php';

/* Load API */
$api_root = $config['api_root'];
$api = new PamphletAPI($api_root);


$a = $_GET['a'];
//Output api response
echo json_encode($api->get($a));