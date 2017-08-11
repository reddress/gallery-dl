<?php
set_time_limit(600);


header( 'Content-type: text/html; charset=utf-8' );

// fake user agent
// https://joshtronic.com/2013/06/04/specifying-a-user-agent-when-using-file_get_contents/

$options  = array('http' => array('user_agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:45.0) Gecko/20100101 Firefox/45.0'));
$context  = stream_context_create($options);

// $response = file_get_contents('http://domain/path/to/uri', false, $context);

$start_index = (int) $_POST['begin'];
$end_index = (int) $_POST['end'];

for ($cur_num = $start_index; $cur_num <= $end_index; $cur_num++) {
    $base = dirname($_POST['url']);
    if (substr($base, -1) != "/") {
        $base .= "/";
    }

  $filename = $_POST['prefix'] . str_pad($cur_num, ((int) $_POST['leading']) + 1, "0", STR_PAD_LEFT) . $_POST['postfix'] . $_POST['imagetype'];
  
  $save_to_filename = str_pad($cur_num, ((int) $_POST['leading']) + 1, "0", STR_PAD_LEFT) . $_POST['postfix'] . $_POST['imagetype'];

    $source = $base . $filename;
    $dest_folder = $_POST['saveas'] . $_POST['newfolder'];

    if (!file_exists($dest_folder)) {
        mkdir($dest_folder, 0777, true);
    }

  // $dest = $dest_folder . "/" . $filename;
  $dest = $dest_folder . "/" . $save_to_filename;

    echo("file_put_contents(\"$dest\", file_get_contents(\"$source\")");
    echo("<br>");
    echo("<br>");
    ob_flush();
    flush();
    
    file_put_contents($dest, file_get_contents($source, false, $context));
}

echo("All done");
?>
