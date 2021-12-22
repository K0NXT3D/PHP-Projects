<head>
 <title>Simple Page Spoofing</title>
</head>
<body>
 <div>
  <a>Simple Page Spoofer</a>
   <p><form name="target" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    URL To Spoof:
     <input type="text" id="target" name="target" value=""> &nbsp;&nbsp;
    <input type="submit" value="Submit">
   </form></p>
<?php
// Uncomment for use with proxychains
$proxy = shell_exec('proxychains');
$target = $_POST["target"];
$curl = curl_init($target);
curl_setopt($curl, CURLOPT_FAILONERROR, true); 
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT,'(<*>||<*>)');
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   
$result = curl_exec($curl);
// Uncomment for use with proxychains
echo $proxy.$result;
//echo $result;
?>
</div>
</body>
