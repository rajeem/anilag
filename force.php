<?php
session_start();

$file='backup/back_up.sql';
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header('Content-Type: application/octet-stream');
header( "Content-Disposition: attachment; filename=".basename($file));

header( "Content-Description: File Transfer");
readfile($file);

?>

