<?php
include("include/connect.php");

/*
* Restore MySQL dump using PHP
* (c) 2006 Daniel15
* Last Update: 9th December 2006
* Version: 0.1
*
* Please feel free to use any part of this, but please give me some credit :-)
*/

// Name of the file
$filename = 'backup/back_up.sql';
 
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
      mysql_query($templine);// or print('Error performing query \'<b>' . $templine . '</b>\': ' . mysql_error() . '<br /><br />');
      // Reset temp variable to empty
      $templine = '';
    }
  }
}
 
?>