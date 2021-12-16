<?php
//  Traffic Observation On Localhost
#   R. Seaverns 2019
#   A standalone php application designed to track and assess incoming traffic
#   to and from my home network.
#   The main goal is part of an ongoing security project and of course to learn
#   and implement new ideas and techniques.


// Show ALL Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Settings / Variables
$S ="\r\n";
$visitor = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$port = $_SERVER['REMOTE_PORT'];
$ping = shell_exec("ping -c 1 $visitor");
$trace = shell_exec("traceroute $visitor");

// Create Core Directories and Files
$year = date("Y");
$month = date("m");
$day = date("d");
$directory = $year."_".$month."_".$day;
 if(!is_dir($directory)){
     mkdir($directory, 0755, true);
}

$ip_list = "core/traffic.txt";
 if(!is_dir("core")){
     mkdir("core", 0755, true);
}

$blacklist = "core/blacklist.php";
$logfile = "$directory/$visitor.txt";
$nmap_log = "$directory/$visitor.xml";
$archives = "archives";
$zipfile = "$archives/$directory.zip";
 if(!is_dir($archives)){
     mkdir($archives, 0755, true);
}

// Nmap Commands (User must have Nmap installed or comment out this feature)
$nmap = shell_exec("nmap -T4 -A -v --stylesheet ../nmap.xsl -sV --script=http-php-version -oX $nmap_log $visitor");

// Guess User OS Based On Browser (Pot Shotting)
function getOS() { 
    global $browser;
    $os_platform  = "Unknown OS Platform";
    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );
    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $browser))
            $os_platform = $value;
    return $os_platform;
}
$user_os = getOS();

// End Settings / Variables
#
// Create Log files
#
// Generate & sort all ip's to txt file
file_put_contents($ip_list, $visitor."\r\n", FILE_APPEND);
$cleanup = "sort -u -o $ip_list $ip_list";
echo exec($cleanup);

// Generate txt file containing ping, traceroute and browser/os information
file_put_contents($logfile,$visitor);
file_put_contents($logfile,$S, FILE_APPEND);
file_put_contents($logfile,$browser, FILE_APPEND);
file_put_contents($logfile,$S, FILE_APPEND);
file_put_contents($logfile,$user_os, FILE_APPEND);
file_put_contents($logfile,$S, FILE_APPEND);
file_put_contents($logfile,$port, FILE_APPEND);
file_put_contents($logfile,$S, FILE_APPEND);
file_put_contents($logfile,$ping, FILE_APPEND);
file_put_contents($logfile,$S, FILE_APPEND);
file_put_contents($logfile,$trace, FILE_APPEND);

// Zip the daily log files "live"
touch($zipfile);
$zip = new ZipArchive;
if ($zip->open($zipfile) === TRUE) {
    $zip->addFile("$directory/$visitor.txt", "$visitor.txt");
    $zip->addFile("$directory/$visitor.xml", "$visitor.xml");
    $zip->close();
}

// HTML of the page
// Block Any/All Incoming Traffic To Port 80 (Default Disabled)
// This will block all traffic - file: /core/traffic.txt
//require($blacklist);

echo '<!DOCTYPE HTML>'.$S.' <head>'.$S;
echo '  <link rel="stylesheet" href="style.css" media="all" type="text/css">'.$S;
echo ' </head>'.$S;
echo '<body>'.$S;
echo ' <div class="content_area">'.$S;
echo '  <div class="page_content">'.$S;
echo '   <h2 class="tagline">Incoming HTTP Traffic<em>"My Network"<em></h2>'.$S;
echo '   <em>Traffic Reconnaissance & Observation Network<em>'.$S;
echo '  <hr>'.$S;
echo '   <table>'.$S.'    <tr>'.$S.'     <th align="left">'.$S;
echo '     <font color="Lime"><b>IP Address: </b></font><font color="Gold">'.$visitor.'</b></font><br>'.$S;
echo '     <font color="Lime"><b>User Port: </b></font><font color="Gold">'.$port.'</font><br>'.$S;
echo '     <font color="Lime"><b>Browser: </b></font><font color="Gold">'.$browser.'</font><br>'.$S;
echo '     <font color="Lime"><b>Operating System: </b></font><font color="Gold">'.$user_os.'</font>'.$S;
echo '     </th>'.$S.'    </tr>'.$S.'    <tr>'.$S.'     <th align="left">'.$S;
echo '      <pre>'.$ping.'       </pre>'.$S;
echo '     </th>'.$S.'    </tr>'.$S.'    <tr>'.$S.'     <th align="left">'.$S;
echo '      <pre>'.$trace.'</pre>';
echo '     </th>'.$S.'    </tr>'.$S.'    <tr>'.$S.'     <th align="left">'.$S;
echo '      <pre>'.$nmap.'</pre>';
echo '     </th>'.$S.'    </tr>'.$S.'   </table>'.$S;
echo '  </div>'.$S;
echo ' </div>'.$S;
echo '</body>'.$S.'</html>';
