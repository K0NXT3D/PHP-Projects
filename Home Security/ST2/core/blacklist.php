<?php
/*
* IP Blocking Script
* R. Seaverns 2019
*
* NOTES:
* Change the Good and Bad Traffic links to suit.
* traffic.txt contains well known "bad traffic"
* popular Tor nodes and Botnets for instance.
* You can edit the file to suit your needs.
*/
$ip = $_SERVER['REMOTE_ADDR'];
$ip_list = "core/traffic.txt"; // Default Document
$lines = file($ip_list);
$banned_ips = [];
foreach($lines as $line){
    if(!empty($line)){
        $line_array = explode(',', $line);
        $banned_ips[] = trim(trim(strip_tags($line_array[0]), "\x00..\x1F"));
    }
}
// Traffic Routing Options
if(in_array($ip, $banned_ips )) {

// Option 1 - Route Traffic To Known Destination ie.. Google, CIA, FBI....
 header("Location: https://www.google.com/"); // General HTTP Requests

// Option 2 - Route Traffic Back To The Visitors IP
//header("Location: $ip"); // General HTTP Requests

// Quit!
    die();
}
// Option 1 - Route Traffic To Known Destination ie.. Google, CIA, FBI....
 $stealth_traffic = header("Location: https://www.google.com/"); echo $stealth_traffic; // Other Request Methods.

// Option 2 - Route Traffic Back To The Visitors IP
// $stealth_traffic = header("Location: $ip"); echo $stealth_traffic; // Other Request Methods.
?>
