<?php
/*
* Traffic Handler Script
* R. Seaverns 2021
*
* NOTES:
* Trimmed up a pre-existing file to use as an far easier way to
* secure a home server or any pivate files without an .htaccess
* or .htpasswd file.
* Testing ::1 was all I needed to view the Good Traffic Page
* 127.0.0.1 was useless, localhost is not
* If you use WordPress for example, you'll want to cover
* all the options also if you're running custom host(s) files
*
* Change the Good and Bad Traffic links to suit.
* Default = Do Nothing if the IP is in the array and load the index.php
* You can custom redirect all traffic.
*/
$ip = $_SERVER['REMOTE_ADDR'];
$check =array(
    "::1",
    "localhost",
    "127.0.0.1", // As of php8 - trailing comma is okay.
);
$allowed_ips = [];
foreach($check as $user){
    if(!empty($user)){
        $check_array = explode(',', $user);
        $allowed_ips[] = trim(trim(strip_tags($check_array[0]), "\x00..\x1F"));
    }
}
// Traffic Routing Options
if(in_array($ip, $allowed_ips )) {
// Option 1 - Route Traffic To The Destination (Good Traffic) and Quit (die)
// header("Location: http://www.seaverns.com/"); // General HTTP Requests
    //die();
// However, we're going to default to index.php by doing nothing.

}
// Option 1 - Route Traffic To Another Destination ie.. Google, CIA, FBI.... (Bad Traffic)
 $bad_traffic = header("Location: https://www.google.com/"); echo $bad_traffic; // Other Request Methods.

// Option 2 - Route Traffic Back To The Visitors IP So They Can Slap Themselves
//$bad_traffic = header("Location: $ip"); echo $bad_traffic; // Other Request Methods.
?>
