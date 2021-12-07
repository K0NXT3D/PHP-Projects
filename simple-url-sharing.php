<?php
 echo '<div class="darkmatter_page_url_link">';
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
 else 
    $link = "http";
    $link .= "://";
    $link .= $_SERVER['HTTP_HOST'];
    $link .= $_SERVER['REQUEST_URI'];
    $pagelink = '<p>Generic HyperText Link: <a href="'.$link.'" target="_blank">'.$link.'</a></p>';
    $mailto = '<p>Generic Mailto Link: <a href="mailto:?subject=your%20subject&amp;body=your%20body%20content">'.$link.'</p></a>';

    echo $pagelink.$mailto;

?>

 <p>Share On Facebook Link: 
  <a href="#" onclick="window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;">
  Share on Facebook!</a>
 </p>

</div>
