<?php

// Display Errors ON
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["geturl"])){

// Configuration
$url = htmlspecialchars($_POST["geturl"]);
$botconfig = "bot.config";

// Setup A Loop If We Want To Uncomment The Head Tag.
// Will also give any visuals of running code for later.
if (ob_get_level() == 0) ob_start();
$count = 1;
    do {

// Generate Random Hostname
$randohost = file('random-domains.txt');
$hostnameA = $randohost[array_rand($randohost)];
$hostnameB = str_replace (".", "-", $hostnameA);

// Select User Agents file and toss it into an Array.
$agents = file("user-agents.txt");
$useragent = $agents[array_rand($agents)];

// Write bot.config (temp file)
file_put_contents($botconfig, 'url = '.$url."\n", FILE_APPEND | LOCK_EX);
file_put_contents($botconfig, 'user-agent = '.$useragent, FILE_APPEND | LOCK_EX);
file_put_contents($botconfig, 'referer = '.$hostnameA, FILE_APPEND | LOCK_EX);
file_put_contents($botconfig, 'host = '.$hostnameA, FILE_APPEND | LOCK_EX);

// Curl the URL using the generated data from our local tor port.
$go = shell_exec("curl -K $botconfig -x socks4://localhost");
echo $go;

// Remove this bot.config now to refresh future data.
unlink($botconfig);

// End Of The Loop.
  $count++;
        ob_flush();
        flush();
        sleep(1);
}
// Hit The Url One Time - You "Can" Change This.
 while ($count <= 1);

ob_end_flush();

} else { ?>

 <p align="center">No URL Selected.</p>

 <?php } ?>
