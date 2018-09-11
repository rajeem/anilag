<?php
session_start();
include "include/connect.php";

//target path
$target_path = "backup/";

/**
 * Add the original
 * filename to our target path.
 */
$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
$_FILES['uploadedfile']['tmp_name'];
//destinaton of file that the user attach
//$target_path = "pdf/";
$filename = $target_path;

//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

if (!basename($_FILES['uploadedfile']['name'])) {
    $error = "<strong><font color=red>Please select file!</font></strong>";
    session_register("error");
    header("location:upload.php");
    exit;
}

if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    $attachment_of_user = basename($_FILES['uploadedfile']['name']);

    //script to restore here
    $filename = "backup/$attachment_of_user";
    // Temporary variable, used to store current query
    $templine = '';
    // Read in entire file
    $lines = file($filename);
    // Loop through each line
    foreach ($lines as $line_num => $line) {
        // Only continue if it's not a comment
        if (substr($line, 0, 2) != '--' && $line != '') {
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                mysql_query($templine); // or print('Error performing query \'<b>' . $templine . '</b>\': ' .             mysql_error() . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }
    }

    echo 'Database restoration successful!<br>
		<center><input  type="button"  onclick="javascript:window.close();" value="OK" /></center>';

    //delete the file
    if (file_exists($filename)) {
        unlink($filename);
    }

} else {
    echo "
		     There was an error adding the file,
			 please" . "<a href=\"upload.php\">
			 try again!</a>";
}
