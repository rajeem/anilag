<?php
/*
$connect=mysql_connect("www.laguna.com.ph:3306","manny","pogiako") or die("couldnt connect to server");
mysql_select_db("card_cat",$connect) or die ("could not select database0");
$sql = "SELECT * from card_cat order by title";
$result = mysql_query($sql,$connect) or die('cant execute query');

while($row=mysql_fetch_array($result)){
$id             =$row['id'];
$title         =$row['title'];
echo $id.' '.$title.' <br>';
}

 */
//echo 'max_execution_time = ' . ini_get('max_execution_time') . "<br>";

ini_set('max_execution_time', 240);
ini_set('upload_max_filesize', '30MB');

echo 'upload_max_filesize = ' . ini_get('upload_max_filesize') . "<br>";
echo 'max_execution_time = ' . ini_get('max_execution_time') . "<br>";

$email = "someone@example.com";

if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
    echo "Valid email address.";
} else {
    echo "Invalid email address.";
}
