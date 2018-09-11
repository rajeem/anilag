<?php
include("include/connect.php");
include("include/gensettings.php");
include("include/function.php");
include("user.php");

// get current date 
$current = getdate(); 
// format
if ($current["hours"] < 12) { 
$ampm = " AM"; 
}
elseif ($current["hours"] == 12) {
$ampm = " PM"; 
}
else { 
$current["hours"] = $current["hours"] - 12; 
$ampm = " PM"; 
} 
if ($current["hours"] < 10) { 
$current["hours"] = "0" . $current["hours"]; 
} 
if ($current["minutes"] < 10) { 
$current["minutes"] = "0" . $current["minutes"]; 
} 
if ($current["seconds"] < 10) { 
$current["seconds"] = "0" . $current["seconds"]; 
} 
if ($current["mday"] < 10) { 
$current["mday"] = "0" . $current["mday"]; 
} 
// turn it into strings 
$current_time = $current["hours"] . ":" . $current["minutes"] . ":" . $current ["seconds"] . $ampm; 
if ($current["month"] == "January") { 
$current["month"] = "01"; 
}
if ($current["month"] == "February") { 
$current["month"] = "02"; 
}
if ($current["month"] == "March") { 
$current["month"] = "03"; 
}
if ($current["month"] == "April") { 
$current["month"] = "04"; 
}
if ($current["month"] == "May") { 
$current["month"] = "05"; 
}
if ($current["month"] == "June") { 
$current["month"] = "06"; 
}
if ($current["month"] == "July") { 
$current["month"] = "07"; 
}
if ($current["month"] == "August") { 
$current["month"] = "08"; 
}
if ($current["month"] == "September") { 
$current["month"] = "09"; 
}

if ($current["month"] == "October") { 
$current["month"] = "10"; 
}
if ($current["month"] == "November") { 
$current["month"] = "11"; 
}
if ($current["month"] == "December") { 
$current["month"] = "12"; 
}
 
$current_date = $current["year"] . "-" . $current["month"] . "-"  . $current["mday"];
echo $current_date;
echo $current['month']."<br>";

$sql_2 = "DELETE * from history2";
$result_2 = mysql_query($sql_2,$connect); 

$sql="SELECT  * from history order by date_borrow";
$result1 = mysql_query($sql,$connect); 
while($row=mysql_fetch_array($result1)){
$ang_date	=$row['date_borrow'];
	$taon =	substr($ang_date,0,4);
	$buwan	= substr($ang_date,5,2);
if (($buwan==$current['month']) && ($taon==$current['year'])){
$access_no = $row['access_no'];

$sql = "select school_code from card_cat where access_no=$access_no";
$res = mysql_query($sql,$connect); 
while($rw=mysql_fetch_array($res)){
$school_code	=$rw['school_code'];
} 
$bar_id = $row['borrower'];
$title = $row['title'];
$author = $row['author'];
$date_borrow = $row['date_borrow'];
echo $access_no."<br>";
echo $title."<br>";
echo $author."<br>";
echo $bar_id."<br>";
echo $date_borrow."<br>";
echo $school_code."<br>";
}

	else{
	}
	//$buwan = month(date_borrow); 
  //  $buwan2 = month(curdate()); 
 
 $sql="INSERT INTO history2
			(access_no,borrower,title,author,date_borrow,school_code) values('$access_no','$bar_id','$title','$author','$date_borrow','$school_code')";
	$result=mysql_query($sql,$connect) or die("cant execute query!".mysql_error());    
}//echo $buwan2;

?>