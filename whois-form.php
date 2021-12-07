<html>
 <head>
  <style>
    body {
    font-family: Roboto;
    color: Gold;
    background-image:linear-gradient(to bottom,#202020,#43456D,#000);
}
  </style>
 </head>
<body>
 <h1>WhoIs Utility</h1>
 <form action="whois.php" method="post" target="results">
  <b>URL:</b> <input type="text" name="url"> &nbsp;&nbsp;&nbsp;
  <input type="submit">
 </form>
  <iframe src="whois.txt" name="results" id="results" width="99%" height="800px" frameborder="0"></iframe>
<script>
var frame = document.getElementById('results');
    frame.onload = function () {
        var body = frame.contentWindow.document.querySelector('body');
        body.style.color = 'white';
        body.style.fontFamily = 'Roboto';
        body.style.fontSize = '12px';
        body.style.lineHeight = '12px';
    };
</script>
</body>
</html>
