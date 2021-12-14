<?php
// Keyword Input File & HTML Output
$content = file('industrial-keywords.txt');
$slink = '<a href="http://www.my-website-url.com/" />';
$elink = '</a>';
$br = '<br>';
// Spawn 25 Links
for ($i = 1; $i <= 25; $i++) {
    for ($spawn = 1; $spawn <= 1; $spawn++) {
    echo $slink,$content[array_rand($content)],$elink,$br;
    }
}
?>
