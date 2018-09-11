<?php
include ('class.ezpdf.php');
//echo $_GET['d'];
//exit;
//$connect=mysql_connect("localhost","root","") or die("couldnt connect to server");
//mysql_select_db("card_cat",$connect) or die ("could not select database0");
include('../include/connect.php');
$type= $_GET['d'];
//echo $type;
//exit;
$pdf =& new Cezpdf();
$pdf->selectFont('./fonts/Times-Roman.afm');
//$pdf->addText(10,820,20,"Borrowers ".$type,0,0);
//if the $type=1 show all borrowers 





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
 
//weekly
if($type==1){
$pdf->addText(10,820,20,"Borrowed books-- this week",0,0);

$sql = "SELECT * FROM history WHERE date_borrow BETWEEN
	DATE_SUB( CURDATE() ,INTERVAL (dayofweek(CURDATE())-2) DAY ) 
	AND (INTERVAL 1 DAY + CURDATE()) order by date_borrow";
	
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		
		$access_no	 =$row['access_no'];
		$call_num	 =$row['call_num'];
		$title		 =$row['title'];
		$borrower	 =$row['borrower'];
		$date_borrow =$row['date_borrow'];
		$author		 =$row['author'];
		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'AUTHOR'=>$author,'BORROWER\'S ID'=>$borrower,'DATE BORROW'=>$date_borrow));
	
		}	

$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','AUTHOR'=>'AUTHOR','BORROWER\'S ID'=>'BORROWER\'S ID','DATE BORROW'=>'DATE BORROW'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));
$pdf->ezText('<c:alink:http://www.lagunauniversity.ph/>Laguna University</c:alink> | <c:alink:http://www.laguna.com.ph/>laguna.com.ph</c:alink>');

$pdf->ezStream();
	
}


//monthly
if($type==2){

$pdf->addText(10,820,20,"Borrowed books2-- ".$current['month'].", ".$current['year'],0,0);
	$sql="SELECT  * from history order by date_borrow";
$result1 = mysql_query($sql,$connect); 
while($row=mysql_fetch_array($result1)){
$ang_date	=$row['date_borrow'];
	$taon =	substr($ang_date,0,4);
	$buwan	= substr($ang_date,5,2);
if (($buwan==$current['month']) && ($taon==$current['year'])){
$access_no = $row['access_no'];
$borrower = $row['borrower'];
$title = $row['title'];
$author = $row['author'];
$date_borrow = $row['date_borrow'];
}	
		else{
	}

$data=array();

	
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'AUTHOR'=>$author,'BORROWER\'S ID'=>$borrower,'DATE BORROW'=>$date_borrow));
	
		
		
		}
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','AUTHOR'=>'AUTHOR','BORROWER\'S ID'=>'BORROWER\'S ID','DATE BORROW'=>'DATE BORROW'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));
$pdf->ezText('<c:alink:http://www.lagunauniversity.ph/>Laguna University</c:alink> | <c:alink:http://www.laguna.com.ph/>laguna.com.ph</c:alink>');

$pdf->ezStream();
	
}


//yearly
if($type==3){

$pdf->addText(10,820,20,"Borrowed books2-- ".$current['year'],0,0);
	$sql="SELECT  * from history order by date_borrow";
$result1 = mysql_query($sql,$connect); 
while($row=mysql_fetch_array($result1)){
$ang_date	=$row['date_borrow'];
	$taon =	substr($ang_date,0,4);
	//$buwan	= substr($ang_date,5,2);
if  ($taon==$current['year']){
$access_no = $row['access_no'];
$borrower = $row['borrower'];
$title = $row['title'];
$author = $row['author'];
$date_borrow = $row['date_borrow'];
}	
		else{
	}

$data=array();

	
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'AUTHOR'=>$author,'BORROWER\'S ID'=>$borrower,'DATE BORROW'=>$date_borrow));
	
		
		
		}
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','AUTHOR'=>'AUTHOR','BORROWER\'S ID'=>'BORROWER\'S ID','DATE BORROW'=>'DATE BORROW'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));
$pdf->ezText('<c:alink:http://www.lagunauniversity.ph/>Laguna University</c:alink> | <c:alink:http://www.laguna.com.ph/>laguna.com.ph</c:alink>');

$pdf->ezStream();
	
}

?>
