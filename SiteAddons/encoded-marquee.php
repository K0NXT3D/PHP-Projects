<?php
// Show ALL Errors (Just In Case We Edit This)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Binary Encoder Decoder Functions
// http://www.inanzzz.com/index.php/post/swf8/converting-string-to-binary-and-binary-to-string-with-php
function stringToBinary($string)
{
    $characters = str_split($string);
 
    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        $binary[] = base_convert($data[1], 16, 2);
    }
 
    return implode(' ', $binary);    
}
 
function binaryToString($binary)
{
    $binaries = explode(' ', $binary);
 
    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }
 
    return $string;    
}

// Set base_64 Encoded Message - 57-60 Characters is "safe" longer strings may break the base64_encoding.
$MyMessage = base64_encode('This Is My Message It Should Stay Around 57 Characters');
// Let's call those functions we sought long and far for through Hell and beyond, click after click..
$binaryencode = stringToBinary($MyMessage); // Lets encode the encoded string and then decode it, kinda...
$binarydecode = binaryToString($binaryencode); // and we have the base64_encoded string back,

// Display The Marquee
echo '<marquee direction="right" scrollamount="7" width="100%" vspace="3"><b>'.$MyMessage.'</b></marquee><br>';
echo '<marquee direction="left"  scrollamount="3" width="100%" vspace="3"><b>'.$binaryencode.'</b></marquee><br>';
echo '<marquee direction="left"  scrollamount="3" width="100%" vspace="3"><b>'.$binarydecode.'</b></marquee><br>';
echo '<marquee direction="right" scrollamount="7" width="100%" vspace="3"><b>'.$MyMessage.'</b></marquee><br>';
// That's All Folks...
?>
