<html>
  <head>
    <style>
     img {
         width: 150px;
         max-height: 200px;
     }

     .preview {
         display: inline-block;
         float: left;
         border: 1px solid #CCC;
         height: 220px;
         margin: 10px;
         text-align: center;
         vertical-align: middle;
     }
     
    </style>
  </head>
  <body>
    <?php

    $basedir = "/home/heitor/saved_galleries/";

    if (isset($_GET['basedir'])) {
      if (strpos($_GET['basedir'], ".") !== FALSE) {
        echo("Base folder");
      } else {
        $basedir .= $_GET['basedir'] . "/";        
      }
      
    }


    $files = scandir($basedir);
    
    $dict = [];

    // reassign dictionary key, will only work with series 0.jpg, 1.jpg ... 10.jpg
    // because the test only checks for filename length, rather than if the
    // characters are actually digits.
    foreach ($files as $file) {
      // check length, if it is 5 characters long, it is likely ?.jpg
      if (strlen($file) === 5 && strtolower(substr($file, -3)) === "jpg") {
        $digit = $file[0];
        $dict['0' . $digit] = $file;
      } else {
        $dict[$file] = $file;
      }
    }

    ksort($dict);

    foreach ($dict as $file) {
      if (strpos($file, "jpg") !== FALSE) {
        
        echo("<img src='/saved_galleries/" . $_GET["basedir"] . "/" . $file . "'><br>");
        echo("\n");
      }

      if (is_dir($basedir . $file) && $file[0] != '.') {
        $pics = scandir($basedir . $file);
        ksort($pics);
        $first_pic = $pics[2];

        echo("<div class='preview'>");

        $thumb = "<img src='/saved_galleries/$file/$first_pic' width='150'>";

        echo("<a href='display.php?basedir=" . $file . "' target='_blank'>" . $thumb . "</a>");

        echo("<br>\n");
        echo $file;

        echo "</div>";

      }
    }
    ?>
  </body>
</html>
