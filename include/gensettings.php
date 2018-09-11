<?php 
include("include/connect.php");
$sql="SELECT * from settings";
$result=mysql_query($sql,$connect) or die("cant execute query!#123");
while($row=mysql_fetch_array($result))
{
	$css   				=$row['css'];
	$logo  				=$row['logo'];
	$footer 			=$row['footer'];
	$bg  				=$row['bg'];
	$expiration_date 	=$row['expiration_date'];
	$header_title		=$row['header_title'];
	$hour_allow			=$row['hour_allow'];
	$auto_id			=$row['auto_id'];
	$auto_deadline		=$row['auto_deadline'];
	$rate = $row['rate'];
	$sat= $row['sat'];
	$sun= $row['sun'];
   // $location1= $row['location1'];
	$location2= $row['location2'];
$author_card= $row['author_card'];
$title_card= $row['title_card'];

	$overdue_price		=$row['overdue_price'];
	//$book_limit			=$row['book_limit'];	
	$search_output		=$row['search_output'];			
	$rec_per_page		=$row['rec_per_page'];			
	$system_title		=$row['system_title'];			
	$dschool_code		=$row['default_school'];
	$book_preview		=$row['book_preview'];
}
?>