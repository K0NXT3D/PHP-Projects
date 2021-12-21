<?php $ip = $_SERVER['REMOTE_ADDR'];
$check =array(
"::1",
"localhost",
"127.0.0.1",);
$allowed_ips = [];
foreach($check as $user){
if(!empty($user)){
$check_array = explode(',', $user);
$allowed_ips[] = trim(trim(strip_tags($check_array[0]), "\x00..\x1F"));
}}
if(in_array($ip, $allowed_ips )) {}
$bad_traffic = header("Location: https://www.google.com/"); echo $bad_traffic;?>
