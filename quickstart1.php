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
echo $_GET['qty'];

echo ".";
echo "hello";
if($name!=""){
$sql="SELECT * from card_cat where call_num ='$name' and status1='in' and qty!=0";
$result=mysql_query($sql,$connect) or die("cant execute query!.....");

	if(mysql_num_rows($result)>=1){
	echo "";
	}

	else{
	echo "This book unavailable!";

	}
}
// generate output depending on the user name received from client
//$userNames = array('CRISTIAN', 'BOGDAN', 'FILIP', 'MIHAI', 'YODA','manny');
//if (in_array(($name), $userNames))
 // echo 'Hello, master ' . htmlentities($name) . '!';
//else if (trim($name) == '')
//  echo '.';
//else
//  echo htmlentities($name) . ', I don\'t know you!';
// close the <response> element
echo '</response>';
?>
