<?php
// Show ALL Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Nmap Commands (User must have Nmap installed or comment out this feature)
$target = $_POST["target"];
$nmap_log = 'test.txt';
$nmap = shell_exec("nmap $target -T4 -A -v --stylesheet ../nmap.xsl -sV --script=http-php-version -oX $nmap_log");

echo $target."\r\n";
echo '<pre>'.$nmap.'</pre>';



