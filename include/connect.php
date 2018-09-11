<?php

	$connect=mysql_connect("localhost","root","") or die("couldnt connect to server");

	$db_list = mysql_list_dbs($connect);

	while ($row = mysql_fetch_object($db_list)) {
     //echo $row->Database . "\n";
	 
	 
		 if($row->Database=="elib"){
		 $meron=1;
		 }
	 
	 
	}

	if($meron==1){

	//$database=card_cat;
	mysql_select_db("elib",$connect) or die ("could not select database0");

	}else{
	mysql_select_db("information_schema",$connect) or die ("could not select database0aa");

	}
	
?>
