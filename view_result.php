<?php
include "include/connect.php";
$id = $_GET['id'];
$dest = $_GET['dest'];
//echo $dest;
//exit;
$sql = "SELECT * from card_cat WHERE id='$id'";
$result = mysql_query($sql, $connect) or die("cant execute query!.....");
while ($row = mysql_fetch_array($result)) {
    $pdf = $row['pdf'];
    $help = $row['help'];
    $pdb = $row['pdb'];

}
if ($dest == "pdf") {
    header("location:pdf/pdf/$pdf");
} else if ($dest == "help") {
    header("location:pdf/help/$help");
} else if ($dest == "pdb") {
    header("location:pdf/pdb/$pdb");
}
//header("location:pdf/pdf/$pdf");
else {
    header("location:pdf/help/$help");
}
