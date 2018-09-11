<?php
if(file_exists('../configuration.php')){ 
include('../configuration.php');
}
if(file_exists('../configuration.php-dist')){ 
include('../configuration.php-dist');
}
$connect=mysql_connect($mosConfig_host,$mosConfig_user,$mosConfig_password) or die("couldnt connect to server");
mysql_select_db("information_schema",$connect) or die ("could not select database0aa");


$sql="CREATE USER 'ubuntu' IDENTIFIED BY 'a'";
$result = mysql_query($sql) or die(mysql_error()); 
$sql="SET PASSWORD FOR 'ubuntu' = ''";
$result = mysql_query($sql) or die(mysql_error()); 
$sql="GRANT ALL PRIVILEGES ON * . * TO 'ubuntu' IDENTIFIED BY '' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ";
$result = mysql_query($sql) or die(mysql_error()); 

?>