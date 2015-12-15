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

foreach ($files as $file) {
    if (strpos($file, "jpg") !== FALSE) {
        echo("<img src='/saved_galleries/" . $_GET["basedir"] . "/" . $file . "'><br>");
        echo("\n");
    }

    if (is_dir($basedir . $file)) {
        echo("<a href='display.php?basedir=" . $file . "'>" . $file . "</a>");
        echo("<br>\n");
    }
}
?>
