<?php
// we'll generate XML output
header('Content-Type: text/xml');
// generate XML header
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
// create the <response> element
echo '<response>';
 
include("include/connect.php");
 
// retrieve the user name
$name = $_GET['name'];

echo ".";
if($name!=""){
$sql="SELECT * from card_cat where access_no ='$name' and qty!=0";
$result=mysql_query($sql,$connect) or die("cant execute query!.....");

	if(mysql_num_rows($result)>=1){
	echo "";
	}

	else{
	echo "This book doesn't exists or unavailable!";

	}
}
echo '</response>';
?>