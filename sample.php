<?php
// we connect to example.com and port 3307
$link = mysql_connect('www.laguna.com.ph', 'manny', 'pogiako');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';

mysql_select_db("card_cat",$link);
$sql="SELECT * from card_cat";
$result=mysql_query($sql,$link) or die("cant execute query!#1");
while($row=mysql_fetch_array($result)){
$id  				=$row['id'];
$title  				=$row['title'];
echo $id.$title.'<br>  ';		
}

mysql_close($link);
?> 
