<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Source DL</title>
  </head>
  <body>
    Gallery Download (from Source) v.0.1.1 2016-05-08<hr>
    <a href="thumbs.php" target="_blank">Display galleries</a>
    <hr>

    <a href="seq_dl.php">Sequential Download</a>
    <hr>

    <form action="source_dl.php" method="POST" target="_blank">
      <input type="button" onclick="resetform();" value="Reset form">
      <br><br>

      Base URL (include http://) <br>
      <input type="button" value="Set text field to http://" onclick="document.getElementById('baseurl').value='http://'; document.getElementById('baseurl').focus()">
      <input type="text" id="baseurl"><br>
      Source code (must include enclosing element, such as div): <br>
      <textarea id="raw_source" rows="10" cols="60"></textarea>
      <br>
      <button type="button" id="extract">Extract links</button>
      Total Links: 
      <span id="totalLinks"></span>
      <br>
      <textarea id="links" name="links" rows="8" cols="100"></textarea>
      <br>

      Local Prefix to Save as: <input name="saveas" value="/home/heitor/saved_galleries/">
      <br>
      New local folder: <input name="newfolder" value="<?= date('YmdHis') ?>">
      <input type="submit">

    </form>
    <script src="jquery.js"></script>
    <script>
     var link_matches;
     $("#extract").click(function() {
       var totalLinks = 0;
       $("#links").val("");
       var baseurl = $("#baseurl").val();
       link_matches = $($("#raw_source").val()).find("a");
       $.each(link_matches, function(key, value) {
         var link_href = $(value).attr("href");
         var extension = link_href.substr(link_href.length - 3);
         console.log(link_href + " " + extension);
         if (extension === "jpg" || extension === "JPG") {
           $("#links").val($("#links").val() + baseurl + link_href + "\n");
           totalLinks++;
         }
       });
       $("#totalLinks").html(totalLinks);
     });

     function timestamp() {
       var now = new Date();
       var nowLocal = new Date(now.getTime() - (now.getTimezoneOffset() * 60000));
       var nowStr = nowLocal.toISOString();
       //return "" + now.getFullYear() + "_" + (1 + now.getMonth()) + "_" + now.getDate() + "_" + now.getHours() + "_" + now.getMinutes() + "_" + now.getSeconds();
       return nowStr.slice(0, 10).replace(/-/g, '') + nowStr.slice(11, 19).replace(/:/g, "");
     }
     
     function resetform() {
       console.log("resetting");
       document.forms[0].elements['baseurl'].value = "";
       $("#raw_source").val("");
       $("#links").val("");
       document.forms[0].elements['newfolder'].value = timestamp();
       $("#totalLinks").html("");
       totalLinks = 0;
     }

    </script>
  </body>
</html>
