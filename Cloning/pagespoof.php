<head>
<style>
body {
    padding:10px;
    font-family: 'Roboto', sans-serif;
    font-weight:900;
    font-size:14px;
    color: Lime;
    background-image:linear-gradient(to right, #000,#990000);
}

input[type=text], label {
    border-radius:10px;
    padding:5px;
    background-color: #000;
    color: Lime;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 90%;
}

a {
    text-decoration: none;
}
.title {
    font-size:36px;
    font-weight:900;
    color:Gold;
    text-shadow:0px 0px 4px #000;
}

.results {
    margin: auto;
    padding:15px;
    width:80%;
    background-image:linear-gradient(to right,#990000,#000);
    border:2px solid #000;
    border-radius:10px;
    box-shadow:4px 4px 8px #000;
}
</style>
</head>
 <title>Simple Page Spoofing</title>
<body>
 <div class="results">
  <a class="title">Simple Page Spoofer</a>
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
