<h2>X13 - traffic_handler.php</h2>
<p>X13 is the short and sweet version, traffic_handler is notated.<br>
A simple way to add trusted IP addresses and block all other http traffic.<br>
If you're using a CMS like WordPress:</p>
<b>Edit index.php and it should be the First Thing index.php processes.</b>


/**<br>
 * Front to the WordPress application. This file doesn't do anything, but loads<br>
 * wp-blog-header.php which does and tells WordPress to load the theme.<br>
 *<br>
 * @package WordPress<br>
 */<br>
require('traffic_handler.php');<br>
/**<br>
 * Tells WordPress to load the WordPress theme and output it.<br>
 *<br>
 * @var bool<br>
 */<br>
define( 'WP_USE_THEMES', true );<br>
<br>
/** Loads the WordPress Environment and Template */<br>
require __DIR__ . '/wp-blog-header.php';<br>
<br><br><br>
<p> Otherwise, you can use it to redirect to another page<br>
by uncommenting:<br>
if(in_array($ip, $allowed_ips )) {<br>
// Option 1 - Route Traffic To The Destination (Good Traffic) and Quit (die)<br>
// header("Location: https://www.destination.com/destination.php"); // General HTTP Requests<br>
    //die();<br>
// However, we're going to default to index.php by doing nothing.<br>
<br>
}<br>
  </p>
  <p> which is also line 12 of X13.php<br><br>
if(in_array($ip, $allowed_ips )) {} <br><br>
  <b>to:</b> if(in_array($ip, $allowed_ips )) {"https://www.destination.com/destination.php"}<br><br>
If you leave it empty it will go on to the default document (index.php / index.html) in the .htaccess file and you<br>
won't have to edit any htaccess files or waf files.</p>
