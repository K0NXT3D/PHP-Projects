<?php
// Show ALL Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ip = $_POST["target"];
//$hostname = gethostbyname($ip);
$hostname = shell_exec(getent hosts $ip >> tempy.txt);

echo $hostname;

