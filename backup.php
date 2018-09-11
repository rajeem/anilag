<?php
$file = 'backup_source/back_up.sql';
$newfile = 'backup/back_up.sql';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}

$filename = "backup/back_up.sql";
$ourFileHandle = fopen($filename, 'w') or die("can't open file");
fclose($ourFileHandle);

include "include/connect.php";

//$filename = 'backup.sql';

require "class_mysqldump.php";
$dump = new MySQLDump();
//$hello=$dump->dumpDatabase("card_cat");
//print $dump->dumpDatabase("ims");
//echo "ds";

$somecontent = $dump->dumpDatabase("elib");

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'a')) {
        echo "Cannot open file ($filename)";
        exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === false) {
        echo "Cannot write to file ($filename)";
        exit;
    }

    //echo "Success, wrote ($somecontent) to file ($filename)";

    fclose($handle);

} else {
    echo "The file $filename is not writable";
}
//echo "ok";
//header('location:force.php');
$file = 'backup/back_up.sql';
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=" . basename($file));

header("Content-Description: File Transfer");
readfile($file)
?>
