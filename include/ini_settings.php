<?php 
$sql='UPDATE visitor set counter=counter+1'; 
mysql_query($sql) or die(mysql_error()); 
?>