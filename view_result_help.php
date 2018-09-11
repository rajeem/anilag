<?php 
include("include/include.php");
$id=$_GET['id'];
$sql="SELECT * from card_cat WHERE id='$id'";
$result=mysql_query($sql,$connect) or die("cant execute query!.....");
while($row=mysql_fetch_array($result)){
$help=$row['help'];
}
header("location:pdf/$help");
?>
