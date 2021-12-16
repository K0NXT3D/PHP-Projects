<?php
// Show ALL Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$target = $_POST["target"];
$domain = shell_exec("nbtscan -s : -h -v $target");
$ping = shell_exec("ping -c 3 $target");

echo $target."\r\n";
echo '<pre>'.$domain.'</pre>'."\r\n";
echo '<pre>'.$ping.'</pre>';
