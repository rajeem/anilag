<?php
include ('class.ezpdf.php');

//$connect=mysql_connect("localhost","root","") or die("couldnt connect to server");
//mysql_select_db("card_cat",$connect) or die ("could not select database0");
include('../include/connect.php');

$type	= $_GET['sql'];
$from	= $_GET['from'];
$max	= $_GET['to'];
$school_code=$_GET['school'];
$search   =$_GET['search'];
$start = $_GET['start'];
$end = $_GET['end'];
//echo $from;
//echo $max;
//exit;

//remove '&' sign if not compatinle with the system
$pdf =& new Cezpdf();
$pdf->selectFont('./fonts/Times-Roman.afm');
//$pdf->addText(10,820,20,"Borrowers ".$type,0,0);
//if the $type=1 show all borrowers //=====================================================================================
if($type==1){//all borrowers
$pdf->addText(10,820,20,"List of Borrowers In All Schools",0,0);

$sql = "SELECT *,concat(first1,' ',last1)
	as wholename from barrower order by bar_id";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$bar_id		 =$row['bar_id'];
		$wholename	 =$row['wholename'];
		$clase		 =$row['type'];
		$address	 =$row['address'];
		$ex_date	 =$row['ex_date'];
		$contact	 =$row['contact'];
		$email		 =$row['email'];
		
		array_push($data, array('ID'=>'<i>'.$bar_id.'</i>','NAME'=>$wholename,'CARD EXPIRATION'=>$ex_date,'ADDRESS'=>$address,
						'TYPE'=>$clase,'CONTACT NO.'=>$contact,'EMAIL ADD'=>$email));
	
		}	
		
		
$pdf->ezTable($data,array('ID'=>'ID','NAME'=>'NAME','CARD EXPIRATION'=>'CARD EXPIRATION','ADDRESS'=>'ADDRESS','TYPE'=>'TYPE','CONTACT NO.'=>'CONTACT NO.','EMAIL ADD'=>'EMAIL ADD.'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
	
}

//=====================================================================================
if($type==5){ /*show borrower by school*/
$pdf->addText(10,820,20,"List of Borrowers In ".$school_code." School",0,0);

$sql = "SELECT *,concat(first1,' ',last1)
	as wholename from barrower where school_code='$school_code' order by bar_id";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$bar_id		 =$row['bar_id'];
		$wholename	 =$row['wholename'];
		$clase		 =$row['type'];
		$address	 =$row['address'];
		$ex_date	 =$row['ex_date'];
		$contact	 =$row['contact'];
		$email		 =$row['email'];
		
		array_push($data, array('ID'=>'<i>'.$bar_id.'</i>','NAME'=>$wholename,'CARD EXPIRATION'=>$ex_date,'ADDRESS'=>$address,
						'TYPE'=>$clase,'CONTACT NO.'=>$contact,'EMAIL ADD'=>$email));
	
		}	
		
		
$pdf->ezTable($data,array('ID'=>'ID','NAME'=>'NAME','CARD EXPIRATION'=>'CARD EXPIRATION','ADDRESS'=>'ADDRESS','TYPE'=>'TYPE','CONTACT NO.'=>'CONTACT NO.','EMAIL ADD'=>'EMAIL ADD.'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
		
	
}
//###########################################################################################

//if the $type=99 show all Collected Fee
if($type==99){

$start=$_GET['start'];
$end=$_GET['end'];
$total_income=$_GET['income'];
$income_msg=$_GET['income_msg'];
$pdf->addText(10,820,20,$income_msg." : P ".$total_income,0,0);



if(($start!="")&&($end!="")){
$sql = "select * from income  where pay_date BETWEEN
	'$start' AND '$end' order by pay_date DESC"; 
	}
	else{
	$sql = "select * from income order by pay_date DESC";
	}
//$sql = "SELECT * 
	//from income order by pay_date DESC";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$borrowers_id  	 =$row['bar_id'];
		$subtotal	 =$row['subtotal'];
		$deduct	 	 =$row['deduct'];
		$total		 =$row['total_amount'];
		$date		 =$row['pay_date'];
		//$author		 =$row['author'];
					
		
		array_push($data, array('BORROWERS_ID'=>$borrowers_id,'PAYABLE'=>$subtotal,'DEDUCTION'=>$deduct,
								'TOTAL'=>$total,'DATE'=>$date));
	
		}
		array_push($data, array('total_income'=>$total_income,'income_msg'=>$income_msg));
$pdf->ezTable($data,array('BORROWERS_ID'=>'BORROWERS ID','PAYABLE'=>'PAYABLE','DEDUCTION'=>'DEDUCTION','TOTAL'=>'TOTAL','DATE'=>'PAY DATE'),''

,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));



$pdf->ezStream();
			
	
}


//###########################################################################################

//Current Borrowed Books
if($type==100){
$full_name=$_GET['full_name'];
$bar_id=$_GET['bar_id'];
$pdf->addText(10,820,20,"Current Borrowed Book(s) of ".$full_name,0,0);


$sql = "SELECT * FROM books_bar WHERE bar_id='$bar_id'"; 
	

	//from income order by pay_date DESC";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$access_no  	 =$row['access_no'];
		$books	 =$row['books'];
		$author	 	 =$row['author'];
		$date_borrow	 =$row['date_borrow'];
		$deadline		 =$row['deadline'];
		//$date		 =$row['pay_date'];
		//$author		 =$row['author'];
					
		
		array_push($data, array('ACCESS_NO'=>$access_no,'BOOKS'=>$books,'AUTHOR'=>$author,
								'DATE_BORROW'=>$date_borrow,'DEADLINE'=>$deadline));
	
		}
$pdf->ezTable($data,array('ACCESS_NO'=>'ACCESS. NO','BOOKS'=>'BOOKS','AUTHOR'=>'AUTHOR','DATE_BORROW'=>'DATE BORROW','DEADLINE'=>'DATE DUE'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
			
	
}


//###########################################################################################
//###########################################################################################

//Current Borrowed Books
if($type==101){
$full_name=$_GET['full_name'];
$bar_id=$_GET['bar_id'];
$pdf->addText(10,820,20,"Borrowed Book(s) of ".$full_name,0,0);


$sql = "SELECT * FROM history WHERE bar_id='$bar_id'"; 
	

	//from income order by pay_date DESC";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$access_no  	 =$row['access_no'];
		$title	 =$row['title'];
		$author	 	 =$row['author'];
		$date_borrow	 =$row['date_borrow'];
		//$deadline		 =$row['deadline'];
		//$date		 =$row['pay_date'];
		//$author		 =$row['author'];
					
		
		array_push($data, array('ACCESS_NO'=>$access_no,'BOOKS'=>$title,'AUTHOR'=>$author,
								'DATE_BORROW'=>$date_borrow));
	
		}
$pdf->ezTable($data,array('ACCESS_NO'=>'ACCESS. NO','BOOKS'=>'TITLE','AUTHOR'=>'AUTHOR','DATE_BORROW'=>'DATE BORROW'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
			
	
}


//###########################################################################################

//if the $type=4 show all HISTORY
if($type==4){
$pdf->addText(10,820,20,"Books Usage",0,0);

$sql="SELECT *,count(access_no) as total FROM history group by title,author,access_no order by title,author,access_no";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['title'];
		$access_no	 =$row['access_no'];
		$call_num	 =$row['call_num'];
		$bar_id		 =$row['bar_id'];
		$total		 =$row['total'];
		$author		 =$row['author'];
					
		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'AUTHOR'=>$author,
								'no. of times borrowed'=>$total));
	
		}
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','AUTHOR'=>'AUTHOR','no. of times borrowed'=>'Usage'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
			
	
}


//##############################################################################################
//if the $type=2 BORROWED BOOKS 
if(($type==2)&& ($start!="")&&($end!="")) {
  if  ($school_code!="all"){
$pdf->addText(10,820,20,"Borrowed Books In ".$school_code." School from ".$start.' '."to ".$end,0,0);
	
$sql="select * from history 
	where school_code='$school_code' && date_borrow  BETWEEN
	'$start' AND '$end' order by date_borrow,title";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$title  	 =$row['title'];
		$call_num	 =$row['call_num'];
		$bar_id	 =$row['bar_id'];
		$access_no	 =$row['access_no'];
		
		$author	     =$row['author'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		
				$z="SELECT concat(first1,' ',last1) as name from barrower where bar_id='$bar_id'"; 
		 $y = mysql_query($z); 
		 	 while($row1=mysql_fetch_array($y)){
			 $bar_namez  	 =$row1['name'];
			 }

		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'BORROWER ID'=>$bar_id,'BORROWER NAME'=>$bar_namez,'DATE BORROW'=>$date_borrow));
	
		}
		
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','BORROWER ID'=>'BORROWER ID','BORROWER NAME'=>'BORROWER NAME','DATE BORROW'=>'DATE BORROW'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
			
	
}

else{
$pdf->addText(10,820,20,"Borrowed Books In ".$school_code." School from ".$start.' '."to ".$end,0,0);

$sql="select * from history,barrower 
	where history.bar_id=barrower.bar_id && history.date_borrow  BETWEEN
	'$start' AND '$end' order by history.date_borrow,history.title";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$title  	 =$row['title'];
		$call_num	 =$row['call_num'];
		$bar_id	 =$row['bar_id'];
		$access_no	 =$row['access_no'];
		
		$author	     =$row['author'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		$school = $row['school_code'];
			$zql="SELECT concat(first1,' ',last1) as name from barrower where bar_id='$bar_id'"; 
		 $xy = mysql_query($zql); 
		 	 while($rowz=mysql_fetch_array($xy)){
			 $bar_namey  	 =$rowz['name'];
			 }

		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'BORROWER ID'=>$bar_id,'BORROWER NAME'=>$bar_namey,'DATE BORROW'=>$date_borrow,'SCHOOL'=>$school));
	
		}
		
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER ID'=>'BORROWER ID','BORROWER NAME'=>'BORROWER NAME','DATE BORROW'=>'DATE BORROW','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
			

}

}
	



//###############################################################################################

//if the $type=3 show all OVERDUE
if(($type==3)&& ($search=="all") &&($school_code=="all")){
 //overdue books
$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) >date(deadline) order by deadline,books";
$result = mysql_query($sql,$connect); 
$pdf->addText(10,820,20," Overdue books In All Schools ",0,0);  

$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['books'];
		$access_no	 =$row['access_no'];
		$author  	 =$row['author'];
		$bar_id		 =$row['bar_id'];
		$school	     =$row['school_code'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		
		$s="SELECT concat(first1,' ',last1) as bar_name from barrower where bar_id='$bar_id'"; 
		 $r = mysql_query($s); 
		 	 while($row1=mysql_fetch_array($r)){
			 $bar_name4  	 =$row1['bar_name'];
			 }
		 
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'BORROWER ID'=>$bar_id	,'BORROWER NAME'=>$bar_name4,'DEADLINE'=>$deadline,'SCHOOL'=>$school));
	
		}	
	
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER ID'=>'BORROWER ID','BORROWER NAME'=>'BORROWER NAME','DEADLINE'=>'DEADLINE','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
	
}// end if all
if(($type==3)&& ($search=="all") &&($school_code!="all")){

$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) >date(deadline) && school_code='$school_code' order by deadline,books";
$result = mysql_query($sql,$connect); 
$pdf->addText(10,820,20," Overdue books In ".$school_code." School",0,0);  

$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['books'];
		$access_no	 =$row['access_no'];
		$author  	 =$row['author'];
		$bar_id		 =$row['bar_id'];
		$school	     =$row['school_code'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];

		$s="SELECT concat(first1,' ',last1) as bar_name from barrower where bar_id='$bar_id'"; 
		 $r = mysql_query($s); 
		 	 while($row1=mysql_fetch_array($r)){
			 $bar_name5  	 =$row1['bar_name'];
			 }

		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'BORROWER ID'=>$bar_id	,'BORROWER NAME'=>$bar_name5,'DATE BORROW'=>$date_borrow,'DEADLINE'=>$deadline));
	
		}	
	
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER ID'=>'BORROWER ID','BORROWER NAME'=>'BORROWER NAME','DATE BORROW'=>'DATE BORROW','DEADLINE'=>'DEADLINE'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
	


} // end else

  


if(($type==3)&& ($search=="today") &&($school_code=="all")){

//due today
$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by deadline,books";
$result = mysql_query($sql,$connect); 
$pdf->addText(10,820,20," Overdue books Today In All Schools ",0,0);

$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['books'];
		$access_no	 =$row['access_no'];
		$author  	 =$row['author'];
		$bar_id		 =$row['bar_id'];
		$school	     =$row['school_code'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'BORROWER ID'=>$bar_id	,'DATE BORROW'=>$date_borrow,'DEADLINE'=>$deadline,'SCHOOL'=>$school));
	
		}	
	
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER ID'=>'BORROWER ID','DATE BORROW'=>'DATE BORROW','DEADLINE'=>'DEADLINE','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
	

}// end if all

if(($type==3)&& ($search=="today") &&($school_code!="all")){

$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) && school_code='$school_code' order by deadline,books";
$result = mysql_query($sql,$connect); 
$pdf->addText(10,820,20," Overdue books Today In ".$school_code." School",0,0);  

$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['books'];
		$access_no	 =$row['access_no'];
		$author  	 =$row['author'];
		$bar_id		 =$row['bar_id'];
		$school	     =$row['school_code'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'BORROWER ID'=>$bar_id	,'DATE BORROW'=>$date_borrow,'DEADLINE'=>$deadline,'SCHOOL'=>$school));
	
		}	
	
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER ID'=>'BORROWER ID','DATE BORROW'=>'DATE BORROW','DEADLINE'=>'DEADLINE','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
	

} // end else

if(($type==3)&& ($search=="tomorrow") &&($school_code=="all")){

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));

$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by deadline,books";
$result = mysql_query($sql,$connect); 
$pdf->addText(10,820,20," Due Books Tomorrow In ".$school_code." School",0,0);  

$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['books'];
		$access_no	 =$row['access_no'];
		$author  	 =$row['author'];
		$bar_id		 =$row['bar_id'];
		$school	     =$row['school_code'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'BORROWER\'S ID'=>$bar_id	,'DATE BORROW'=>$date_borrow,'DEADLINE'=>$deadline,'SCHOOL'=>$school));
	
		}	
	
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER\'S ID'=>'BORROWER\'S ID','DATE BORROW'=>'DATE BORROW','DEADLINE'=>'DEADLINE','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
	
}// end if all

if(($type==3)&& ($search=="tomorrow") &&($school_code!="all")){

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));


$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline) && school_code='$school_code' order by deadline,books";
$result = mysql_query($sql,$connect); 
$pdf->addText(10,820,20," Due Books Tomorrow In ".$school_code." School",0,0);
$data=array();

	while($row=mysql_fetch_array($result)){
		$books  	 =$row['books'];
		$access_no	 =$row['access_no'];
		$author  	 =$row['author'];
		$bar_id		 =$row['bar_id'];
		$school	     =$row['school_code'];
		$deadline	 =$row['deadline'];
		$date_borrow =$row['date_borrow'];
		
		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$books,'BORROWER\'S ID'=>$bar_id	,'DATE BORROW'=>$date_borrow,'DEADLINE'=>$deadline,'SCHOOL'=>$school));
	
		}	
	
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS NO.','TITLE'=>'TITLE','BORROWER\'S ID'=>'BORROWER\'S ID','DATE BORROW'=>'DATE BORROW','DEADLINE'=>'DEADLINE','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
	
}  // end else

//###############################################################################################
//if the $type=6 Show Deleted Books 
if(($type==6)&& ($start!="")&&($end!="")) {
  if  ($school_code!="all"){
$pdf->addText(10,820,20,"Deleted In ".$school_code." School from ".$start.' '."to ".$end,0,0);
	
$sql="select * from recyclebin 
	where school_code='$school_code' && date_deleted  BETWEEN
	'$start' AND '$end' order by date_deleted,booktitle,accession_no";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$title  	    =$row['booktitle'];
		$date_deleted	 =$row['date_deleted'];
		$person_deleted	 =$row['person_deleted'];
		$access_no	     =$row['accession_no'];
		$author_sname   =$row['author_sname'];
		$author_fname   =$row['author_fname'];
		$author_mname   =$row['author_mname'];
		$type	        =$row['type'];
		$school          =$row['school_code'];
		
				

		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'DATE DELETED'=>$date_deleted,'PERSON INCHARGE'=>$person_deleted,'TYPE'=>$type));
	
		}
		
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','DATE DELETED'=>'DATE DELETED','PERSON INCHARGE'=>'PERSON INCHARGE','TYPE'=>'TYPE'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));

$pdf->ezStream();
			
	
}

else{
$pdf->addText(10,820,20,"Deleted Books In ".$school_code." School from ".$start.' '."to ".$end,0,0);

$sql="select * from recyclebin 
	where  date_deleted  BETWEEN
	'$start' AND '$end' order by date_deleted,booktitle,accession_no";
$result = mysql_query($sql,$connect); 
	
$data=array();

	while($row=mysql_fetch_array($result)){
		$title  	    =$row['booktitle'];
		$date_deleted	 =$row['date_deleted'];
		$person_deleted	 =$row['person_deleted'];
		$access_no	     =$row['accession_no'];
		$author_sname   =$row['author_sname'];
		$author_fname   =$row['author_fname'];
		$author_mname   =$row['author_mname'];
		$type	        =$row['type'];
		$school          =$row['school_code'];
		
				

		array_push($data, array('ACCESS. NO.'=>$access_no,'TITLE'=>$title,'DATE DELETED'=>$date_deleted,'PERSON INCHARGE'=>$person_deleted,'TYPE'=>$type,'SCHOOL'=>$school));
	
		}
		
$pdf->ezTable($data,array('ACCESS. NO.'=>'ACCESS. NO.','TITLE'=>'TITLE','DATE DELETED'=>'DATE DELETED','PERSON INCHARGE'=>'PERSON INCHARGE','TYPE'=>'TYPE','SCHOOL'=>'SCHOOL'),''
,array('showHeadings'=>1,'shaded'=>1,'xPos'=>'right'
,'xOrientation'=>'left','width'=>550));


$pdf->ezStream();
			
	
}

}
	



//#################################################################################################


?>