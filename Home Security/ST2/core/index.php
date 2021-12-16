<?php

$S = "\r\n";

$ip = $_POST['target'];
$ip_list = fopen('traffic.txt', 'r');
$ip_scan = 'nmap.php';
$ip_ping = 'ping.php';
$ip_trace = 'trace.php';

echo '<!DOCTYPE HTML>'.$S.' <head>'.$S;
echo '  <link rel="stylesheet" href="admin.css" media="all" type="text/css">'.$S;
echo ' </head>'.$S;
echo '<body>'.$S;
echo '<div class="header">'.$S.' <h1>DS6X1 Admin Panel</h1>'.$S.'</div>'.$S;
echo '<div align="left" width="100%">'.$S;

echo ' <table width="100%" height="600px">'.$S;
echo '  <tr colspan="2">'.$S.'   <th width="20%">'.$S;
echo '    <form class="A_Module" action="nmap.php" method="post" target="results">'.$S;
echo '     <select class="A_Module_Select" name="target">'.$S;

if ($ip_list) {
    while (($target = fgets($ip_list)) !== false) {
        $target = str_replace(PHP_EOL, '', $target);
        echo "      <option value=\"$target\">$target</option>".$S;
    }

    fclose($ip_list);
} 
else {
    // error opening the file.
     echo 'Error Reading traffic.txt';
}
echo '     </select>'.$S.'    <input type="submit" class="options_button" value="NMap Scan">'.$S.'    </form>'.$S;
echo '   </th>'.$S.'   <th rowspan="30"><iframe src="traffic.txt" name="results" width="100%" height="100%"></iframe></th>'.$S;
echo '  </tr>'.$S;

// #########################################################

echo '  <tr>'.$S;
echo '   <th width="20%">'.$S.'    <form class="A_Module" action="ping.php" method="post" target="results">'.$S;
echo '     <select class="A_Module_Select" name="target">'.$S;

$ip_list = fopen('traffic.txt', 'r');
if ($ip_list) {
    while (($target = fgets($ip_list)) !== false) {
        $target = str_replace(PHP_EOL, '', $target);
        echo "      <option value=\"$target\">$target</option>".$S;
    }

    fclose($ip_list);
} 
else {
    // error opening the file.
     echo 'Error Reading traffic.txt';
}
echo '     </select>'.$S.'    <input type="submit" class="options_button" value="Ping Host">'.$S.'    </form>'.$S;
echo '   </th>';
echo '  </tr>'.$S;

//##########################################################

echo '  <tr>'.$S;
echo '   <th width="20%">'.$S.'    <form class="A_Module" action="whois.php" method="post" target="results">'.$S;
echo '     <select class="A_Module_Select" name="target">'.$S;

$ip_list = fopen('traffic.txt', 'r');
if ($ip_list) {
    while (($target = fgets($ip_list)) !== false) {
        $target = str_replace(PHP_EOL, '', $target);
        echo "      <option value=\"$target\">$target</option>".$S;
    }

    fclose($ip_list);
} 
else {
    // error opening the file.
     echo 'Error Reading traffic.txt';
}
echo '     </select>'.$S.'    <input type="submit" class="options_button" value="WhoIs Host">'.$S.'    </form>'.$S;
echo '   </th>';
echo '  </tr>'.$S;

//##########################################################
echo ' </table>'.$S;


echo '</div>'.$S;
?>
