<head>
<style>
body {
    font-family: 'Dosis', sans-serif;
    color: #fff;
}

.Curlcontainer {
    width: 99%;
}

.Curlbanner {
    margin: auto;
    width: 100%;
    height: 28px;
    background-color: #000;
    color: #fff;
    padding-top: 5px;
}

#Curlviewer {
    margin: auto;
    width: 100%;
    height: 800px;
    border: 0;
}
</style>
</head>
<div class="Curlcontainer" />
 <div class="Curlbanner" align="center" />  
   <form action="action.php" method="post" target="BrowserWindow" />
    <input type="text" name="geturl" size="50"></input>&nbsp;&nbsp;&nbsp;
     <button type="submit" name="fetch" />Fetch New URL</button>&nbsp;&nbsp;
     <button onClick="window.location.reload();">&nbsp;&nbsp;Reload URL&nbsp;&nbsp;</button>
    </form>
 </div>
 <div class="viewer" align="center" />
  <iframe id="Curlviewer" src="action.php" name="BrowserWindow" /></iframe>
 </div>
</div>
