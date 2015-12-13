Gallery Download v.0.1 2015-12-13
<hr>
<form action="dl.php" method="post" target="_blank">
    Download a gallery of images, such as<br>
    http://site.com/img/0.jpg<br>
    http://site.com/img/1.jpg<br>
    http://site.com/img/2.jpg ...
    <hr>
    <table>
        <tr>
            <td>Base URL, e.g http://site.com/img/</td><td><input name="url" size="72"></td>
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
            <td>Local Prefix to Save as</td><td> <input name="saveas" value="/home/heitor/saved_galleries/"></td>
        </tr>
        <tr>
            <td>New local folder:</td><td><input name="newfolder" value="<?= date('YmdHi') ?>"></td>
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
