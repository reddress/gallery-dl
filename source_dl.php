<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Source DL Get</title>
    <body>
      
      <?php
      set_time_limit(600);
      
      // echo $_POST["links"];

      $raw_links = trim($_POST["links"]);
      // fake user agent
      // https://joshtronic.com/2013/06/04/specifying-a-user-agent-when-using-file_get_contents/

      $options  = array('http' => array('user_agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:45.0) Gecko/20100101 Firefox/45.0'));
      $context  = stream_context_create($options);
      $imagetype = ".jpg";

      $dest_folder = $_POST['saveas'] . $_POST['newfolder'];

      if (!file_exists($dest_folder)) {
        mkdir($dest_folder, 0777, true);
      }
      
      $cur_num = 1;

      foreach(explode("\n", $raw_links) as $raw_link) {

        $save_to_filename = str_pad($cur_num, 3, "0", STR_PAD_LEFT) . $imagetype;
          
        $source = trim($raw_link);

        // $dest = $dest_folder . "/" . $filename;
        $dest = $dest_folder . "/" . $save_to_filename;

        echo("file_put_contents(\"$dest\", file_get_contents(\"$source\")");
        echo("<br>");
        echo("<br>");
        ob_flush();
        flush();
        
        $cur_num++;
        
        file_put_contents($dest, file_get_contents($source, false, $context));
      }
      
      ?>
      <a href="display.php?basedir=<?= $_POST['newfolder'] ?>">View Gallery</a>
    </body>
</html>
