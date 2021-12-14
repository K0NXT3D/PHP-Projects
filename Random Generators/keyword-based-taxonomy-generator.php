<style>
body {
    /* max-width:1000px; */
    margin:20px;
    padding:20px;
    border:4px solid #000;
    border-radius:20px;
    font-family:Roboto;
    /* text-transform: uppercase; */
    color:#000;
}

a {
    text-decoration:none;
    font-weight: 700;
}

a.TagWord {
    display: inline-block;
}

a.TagWord:first-letter {
    text-transform: uppercase;
}
</style>
<?php
$taxonomies = file('industrial-keywords.txt');
$tags = file_get_contents('industrial-keywords.txt');
$keywords =  str_replace(array("\n",'-'),' ',$tags);
foreach ($taxonomies as $keyword) 
    {
    $title =  str_replace(array("\n",'-')," ",$keyword);
    $link = str_replace("\n", "", $keyword); // Creates keyword-page.php No Spaces
    echo '<h1>'."\r\n".' <a class="TagWord">'.$title.'</a>'."\r\n".'</h1>'."\r\n";
    echo ' <p>Tag: <a class="TagWord" href="http://'.$_SERVER['SERVER_NAME'].'/'.$link.'.php" target="_blank">'.$title.'</a>'."\r\n".'  <br>'."\r\n".'   <cite>'.$keywords."\r\n".'  </cite>'."\r\n".' </p>'."\r\n";
    }
