<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "card_cat";
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$call_num = $_GET['call_num'];
$sex = $_GET['sex'];
$wpm = $_GET['wpm'];
	// Escape User Input to help prevent SQL Injection
$call_num = mysql_real_escape_string($call_num);
$sex = mysql_real_escape_string($sex);
$wpm = mysql_real_escape_string($wpm);
	//build query
/*	
$query = "SELECT * FROM ajax_example WHERE ae_sex = '$sex'";
if(is_numeric($age))
	$query .= " AND ae_age <= $age";
if(is_numeric($wpm))
	$query .= " AND ae_wpm <= $wpm";
	*/
	
$query = "SELECT * FROM card_cat WHERE call_num = '$call_num'";	
//$query = "SELECT * FROM card_cat";	

	//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

	/*Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Age</th>";
$display_string .= "<th>Sex</th>";
$display_string .= "<th>WPM</th>";
$display_string .= "</tr>";
*/
$rows=mysql_num_rows($qry_result);

	// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[author]</td>";
	$display_string .= "<td>$row[title]</td>";
	$display_string .= "<td>$row[qty]</td>";
	$display_string .= "<td>$row[call_num]</td>";
	$display_string .= "</tr>";
	$display_string=$row['call_num'];
}
//$display_string .= "</table><img src=\"a.gif\">";
if($rows==0){
echo "No record found!";
exit;}
echo $display_string;
echo "$age";
?>
