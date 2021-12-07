<?php
// For Redirection - This Can Deter Web Crawlers!
// The Output Page Will Link To The Original Website
// You can change the UserAgent to a Specific String ie..
// My Pretty Pony/1.0 (compatible; MSIE 8.0; Windows 3.1 6.6.6)
// and then track the number of redirects etc..

// Display Errors ON
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// For More Options See Here - http://php.net/manual/en/function.curl-setopt.php
// Set Curl Options
function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

// Clone The URL You Want To Display.
$clonedurl = get_data('http://www.your-URL-here.com');
echo $clonedurl;
?>
