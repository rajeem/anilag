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


//month and year
$sql="select monthname(curdate()) as month_name,year(curdate()) as year_name";
$result = mysql_query($sql,$connect); 
	while($row=mysql_fetch_array($result)){
		$month_name	=$row['month_name'];
		$year_name	=$row['year_name'];
	}

//weekly
if($type==1){
$pdf->addText(10,820,20,"Borrowers ".$type,0,0);

$sql = "SELECT *,concat(first1,' ',last1)
	as wholename from barrower";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$bar_id		 =$row['bar_id'];
		$wholename	 =$row['wholename'];
		$address	 =$row['address'];
		$adviser	 =$row['adviser'];
		$contact	 =$row['contact'];
		$email		 =$row['email'];
		
		array_push($data, array('BORROWER\'S ID'=>$bar_id,'NAME'=>$wholename,'ADDRESS'=>$address,
						'ADVISER'=>$adviser,'CONTACT NO.'=>$contact,'EMAIL ADDRESS'=>$email));
	
		}	
	
}


$pdf->ezTable($data);
$pdf->ezStream();

//echo $result;
?>