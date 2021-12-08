<?php
// This is not set to run as root.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST["target"])){
 $target = $_POST["target"];
 $output = shell_exec("nmap $target -T4 -A -v -sP");

    echo "<pre>$output</pre>";
    echo '<p><button onClick="window.location.href=window.location.href" type="submit"name="refresh">BACK</button></p>';

} else{ ?>


<form name="target" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  <label for="target">Scan URL:</label><br>
  <input type="text" id="target" name="target"> &nbsp;&nbsp;
  <input type="submit" value="Submit">
</form>

 <?php } ?>
