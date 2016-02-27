Gallery Download v.0.2 2015-12-14
<hr>

<a href="display.php" target="_blank">Display galleries</a>
<hr>

<form action="dl.php" method="post" target="_blank">
    Download a gallery of images, such as<br>
    http://site.com/img/0.jpg<br>
    http://site.com/img/1.jpg<br>
    http://site.com/img/2.jpg ...
    <hr>
    <input type="button" onclick="resetform();" value="Reset form">

    <table>
        <tr>
            <td>URL e.g http://site.com/img/0.jpg</td><td><input name="url" size="72"></td>
        </tr>
        <tr>
            <td>Image name prefix (leave blank if numbers only)</td><td><input name="prefix"></td>
        </tr>
        <tr>
            <td>Leading zeros (0 if first file is 0.jpg or 1.jpg)</td><td> <input name="leading" value="0"></td>
        </tr>
        <tr>
            <td>Beginning number</td><td><input name="begin"></td>
        </tr>
        
        <tr>
            <td>Ending number</td><td><input name="end"></td>
        </tr>

        <tr>
            <td>Image name postfix</td><td> <input name="postfix"></td>
        </tr>

        <tr>
            <td>Image type</td><td> <input name="imagetype" value=".jpg"></td>
        </tr>
        
        <tr>
            <td>Local Prefix to Save as</td><td> <input name="saveas" value="/home/heitor/saved_galleries/"></td>
        </tr>
        <tr>
            <td>New local folder:</td><td><input name="newfolder" value="<?= date('YmdHis') ?>"></td>
        </tr>
        <tr>
            <td>
                <input type="submit">
            </td>
            <td>
                WAIT after clicking submit
            </td>
        </tr>
    </table>
</form>


<script>
 function timestamp() {
   var now = new Date();
   var nowStr = now.toISOString();
   //return "" + now.getFullYear() + "_" + (1 + now.getMonth()) + "_" + now.getDate() + "_" + now.getHours() + "_" + now.getMinutes() + "_" + now.getSeconds();
   return nowStr.slice(0, 10).replace(/-/g, '') + nowStr.slice(11, 19).replace(/:/g, "");
 }
 
 function resetform() {
     console.log("resetting");
     document.forms[0].elements['url'].value = "";
     document.forms[0].elements['prefix'].value = "";
     document.forms[0].elements['postfix'].value = "";
     document.forms[0].elements['leading'].value = "0";
     document.forms[0].elements['begin'].value = "";
     document.forms[0].elements['end'].value = "";
     document.forms[0].elements['newfolder'].value = timestamp();
 }
</script>
