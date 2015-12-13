<?php

header( 'Content-type: text/html; charset=utf-8' );

$start_index = (int) $_POST['begin'];
$end_index = (int) $_POST['end'];

for ($cur_num = $start_index; $cur_num <= $end_index; $cur_num++) {
    $base = $_POST['url'];
    if (substr($base, -1) != "/") {
        $base .= "/";
    }

    $filename = $_POST['prefix'] . str_pad($cur_num, ((int) $_POST['leading']) + 1, "0", STR_PAD_LEFT) . ".jpg";

    $source = $base . $filename;
    $dest_folder = $_POST['saveas'] . $_POST['newfolder'];

    if (!file_exists($dest_folder)) {
        mkdir($dest_folder, 0777, true);
    }

    $dest = $dest_folder . "/" . $filename;

    echo("file_put_contents(\"$dest\", file_get_contents(\"$source\")");
    echo("<br>");
    flush();
    ob_flush();

    file_put_contents($dest, file_get_contents($source));
}

?>
