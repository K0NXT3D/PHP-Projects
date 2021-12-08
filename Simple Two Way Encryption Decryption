<h1 class="sub_title">Simple PhP Encoder / Decoder</h1>
<?php
    /*
    //DarkMatter- PhP Encoder / Decoder
    // DarkMatter Web Utilities 1.0
    // Dark Matter Visitor Information Gathering Utilities
    // file: eznkrypt.php
    // /plugins/darkmatter/utlities/eznkrypt.php
    // Basic PhP Encoder & Decoder Form - R. Seaverns 2021
    // Available:
    // base64_encode , base64_decode , str_rot13
    // Updates Soon!
    */
if(isset($_POST["eznkrypt_submit"])){
echo htmlspecialchars($_POST["encryption"])($_POST["eznkrypt_input"])."<p>";
echo htmlspecialchars($_POST["encryption"])."</p>";
echo '<p style="padding-top:16px;"><button onClick="window.location.href=window.location.href">Encode - Decode</button></p>';
} else{ ?>

<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method ="post">
 <p>Input String: <input style="margin-left:5px;" size="100" type="text" name="eznkrypt_input"></p>
 <select name=encryption>
  <option value="base64_encode"> base64_encode </option>
  <option value="base64_decode"> base64_decode </option>
  <option value="str_rot13"> str_rot13 </option>
 </select>
 <p><button style="padding:8px;" type="submit"name="eznkrypt_submit">Encode - Decode</button></p>
</form>
 <?php } ?>
