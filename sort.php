<?php

$basedir = "/home/heitor/saved_galleries/cohf_sara";

$files = scandir($basedir);

print_r($files);

$dict = [];

foreach ($files as $file) {
    // check length, if it is 5 characters long, it is likely ?.jpg
    if (strlen($file) === 5) {
        print($file . " is 5 characters long");
        $digit = $file[0];
        $dict['0' . $digit] = $file;
    } else {
        $dict[$file] = $file;
    }
}


print_r($dict);
ksort($dict);

foreach ($dict as $file) {
    if (strpos($file, "jpg") !== FALSE) {
        echo("<img src='/saved_galleries/" . $_GET["basedir"] . "/" . $file . "'><br>");
        echo("\n");
    }

    if (is_dir($basedir . $file)) {
        echo("<a href='display.php?basedir=" . $file . "'>" . $file . "</a>");
        echo("<br>\n");
    }
}

    
