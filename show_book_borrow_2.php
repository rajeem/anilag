<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/gensettings.php");
include("include/function.php");
include("user.php");

//total due books
$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now())>date(deadline) order by hrs desc";  
$result2 = mysql_query($sql); 
$due_all = mysql_num_rows($result2);

//.........number of books in lib............................//

//due today
$sql2="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by hrs desc";  
$result2 = mysql_query($sql2); 

$due_today = mysql_num_rows($result2);



//due tomorrow

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));

$sql2="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by hrs desc";  
$result2 = mysql_query($sql2); 

$due_tom   = mysql_num_rows($result2);


//#################################################################################################


$window=1;


$_SESSION[borrow_type] = $_SESSION['borrow_type'];		//school_code
$_SESSION[start] = $_SESSION['start'];		//text
$_SESSION[ending] = $_SESSION['ending'];		//text
	
$type_code = $_SESSION['borrow_type'];		//school_code
$start = $_SESSION['start'];		//start
$end  = $_SESSION['ending'];		//end

$s = date($start);
$e = date($end);


if(($start!="")&&($end!="")){
if($type_code=="all"){

$sql="select * from history,barrower 
	where history.bar_id=barrower.bar_id && history.date_borrow  BETWEEN
	'$start' AND '$end' order by history.date_borrow,history.title";
}//end if type_code==all

else{
$sql="select * from history,barrower 
	where history.bar_id=barrower.bar_id  
 && history.school_code='$type_code' && history.date_borrow  BETWEEN
	'$start' AND '$end' order by history.date_borrow,history.title";
}//end else
$msg.='<img src="images/arrowr.gif" width="15" height="9" />Your search for  Borrowed books between &nbsp;
		<strong>'.$start.'</strong> &nbsp;to &nbsp;<strong>'.$end.'</strong>&nbsp; in &nbsp;<strong>'.$type_code.'</strong>&nbsp;school returns';

}// if dates are not empty

if(($start=="")&&($end=="")){
if($type_code=="all"){

$sql="select * from history,barrower 
	where history.bar_id=barrower.bar_id order by history.date_borrow,history.access_no";
}//end if type==all

else{
$sql="select * from history,barrower 
	where history.bar_id=barrower.bar_id && history.school_code='$type_code' order by history.date_borrow,history.access_no";
}//end else

$msg.='<img src="images/arrowr.gif" width="15" height="9" />Your search for  Borrowed books &nbsp; in &nbsp;<strong>'.$type_code.'</strong>&nbsp;school returns';
}// if dates are not empty


if(($start=="")&&($end!="")){
$window=3;
$message.="<strong>Please enter the start date</strong>";
}

if(($start!="")&&($end=="")){
$window=3;
$message.="<strong>Please enter the end date</strong>";
}

//############PAGINATION ################	
	/**Set current, 
  *prev and next page 
  */ 
$page = (!isset($_GET['page']))? 1 :$_GET['page']; 
$prev = ($page - 1); 
$next = ($page + 1); 

/**Max results 
  *per page 
  */ 
$max_results = $rec_per_page; 
/* Calculate the offset */ 
$from = (($page * $max_results) - $max_results); 

/**Query the db for total 
  *results. You need to edit
  *the sql to fit your needs 
  */   
$result2 = mysql_query($sql); 

$total_results  = mysql_num_rows($result2); 
$number			=$total_results;
$total_pages    = ceil($total_results / $max_results); 

$pagination = ''; 
	/* Create a PREV link if there is one */ 
	if($page > 1) 
	{ 
	//pass the values of the $txt variables
	$pagination .= '<a href="show_book_borrow_2.php?page='.$prev.'&sql='.$sql.' &type='.$type_code.'"
	title="Previous"> &lt;Previous</a> '; 
	}
	else{
		$pagination .= '<strong> &lt;Previous</strong>&nbsp;'; 
	} 
	// Loop through the total pages 
	for($i = 1; $i <= $total_pages; $i++) 
	{ 
		if(($page) == $i) { 
		$pagination .= $i; 
		} 
		else { 
		$pagination .= '&nbsp;<a href="show_book_borrow_2.php?page='.$i.'&sql='.$sql.' &type='.$type_code.'" title="page '.$i.'">' .$i. '</a>&nbsp;'; 
		} 
	} 


	/* Print NEXT link if there is one */ 
	if($page < $total_pages) 
	{ 
	$pagination .= '<a href="show_book_borrow_2.php?page='.$next.'&sql='.$sql.' &type='.$type_code.'"
	title="Next">Next &gt;</a>'; 

	} 
	else{
	$pagination .= '&nbsp;<strong>Next &gt;</strong>'; 
	} 



$sql.=" LIMIT $from, $max_results"; 
$result2=mysql_query($sql,$connect) or die("cant execute queryz!.....");
$number  = mysql_num_rows($result2); 
//echo $sql;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title."--".$footer;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
</head>
<body >
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;".$header_title;?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo;?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div>
</div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="home.php" id="current" title="Home">Home</a></li>
<li><a href="admin.php" title="Search">Search</a></li>
<li><a href="admin_add_new.php" title="Add book">Add book</a></li>
<li><a href="barrower.php" title="Borrower">Borrower</a></li>
<li><a href="inventory.php" title="Inventory">Inventory</a></li>
<li><a href="settings.php" title="Settings">Settings</a></li>
<li><a href="help1.php" title="Help">Help</a></li>
<li><a href="logout.php" title="Logout">Logout</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;Search For Borrowed Books</h2>
    <form id="form1" name="myform" method="post" action="show_book_borrow.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
		<td colspan="3"><strong>Enter the date:(yyyy-mm-dd) format </strong></td>
        
          <td width="11%">&nbsp;</td>
          <td width="9%">&nbsp;</td>
          <td width="23%"><?php echo "We have ".$due_today. "  books/items due today.";
		  ?></td>
        </tr>
        <tr>
          <td width="19%" valign="top"><strong>Start</strong> <input type="text" name="start" id="start"  size="10" value="<?php echo $start;?>"/></td>
          <td width="18%" valign="top"><strong>End</strong> <input type="text" name="ending" id="ending"  size="10" value="<?php echo $end;?>"/></td>
          <td width="20%" valign="top"><strong>School:</strong>            <select name="type" id="type">
           <?php 
			$i=0;
			$sqr="SELECT school_code from school order by school_code"; 
$res = mysql_query($sqr); 
while($row=mysql_fetch_array($res)){
$school_code = $row['school_code'];
?>
			<option  <?php  if ($type_code=="$school_code")echo "selected";?>><?php echo $school_code;?></option>
<?php $i++; }?><option value="all" <?php  if ($type_code=="all")echo "selected";?>>all</option>
</select> </td>
          <td valign="top">
            
            <input name="submit" type="submit" class="btn"  value="Search"/>
          </td><td><a href="show_book_borrow.php?show=do"></a></td>
          <td><?php echo "We have ".$due_tom. "  books/items due tomorrow.";
		  ?></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td><?php echo "We have ".$due_all. "  books/items due.";
		  ?></td>
        </tr>
      </table>
    </form>
	
    <?php 
	if ($window ==1){
	$msg =" $msg<strong>&nbsp;$total_results&nbsp;</strong>result(s)<br><br><hr/>";
	 echo $msg;

			 
				 if (strlen($pagination)<100){
					$pagination="";
				 } 
				  echo $pagination;
	//output if there is 
	if($number!=0){
	         
	     	?>
    <table width="100%" border="0">
                   <tr>
                     <td colspan="2"><h3><strong>BORROWED BOOK </strong></h3></td>
                     
                     <td width="24%">&nbsp;</td>
                     <td width="15%">&nbsp;</td>
                     <td width="13%">&nbsp;</td>
					<?php if ($type_code=="all") echo'<td width="9%">&nbsp;</td>';?>
                   </tr>
                   <tr>
                     <td width="13%"><strong>Access No. </strong></td>
                     <td width="26%"><strong>Book Title </strong></td>
                     <td><strong>Borrower</strong></td>
                     <td><strong>Date Borrowed </strong></td>
                     <td><strong>Due date</strong></td>
					 <?php if ($type_code=="all") echo"<td width='9%'><strong>School</strong></td>";?>
                   </tr>
				   <?php 				   
	  	$x=2;
		$y=1;
		$i=0;
	  while($row=mysql_fetch_array($result2)){
		
		$books  	 =$row['title'];
		$access_no	 =$row['access_no'];
		$author_sname		 =$row['author_sname'];
		$author_fname		 =$row['author_fname'];
		$author_mname		 =$row['author_mname'];
		$author_mname		 =ucfirst($author_mname);
		
		$author		 =$author_fname.' '.$author_mname{0}.' '.$author_sname;
		$bar_id		 =$row['bar_id'];
		$hrs		 =$row['hrs'];
		$wholename	 =$row['wholename'];
		$deadline	 =$row['deadline'];
		$ngayon		 =$row['ngayon'];
		$date_line	 =$row['date_line'];
		$date_borrow=$row['date_borrow'];
		$date_na = date($deadline);


		//get the name of the borrower
		
			//if deadlime is today, output today
		/*	if ($ngayon==$date_line) {
			   $deadline='Today';
			}
			*/
			$sqr ="SELECT * from history where access_no='$access_no'"; 
		 $rt = mysql_query($sqr); 
		 	 while($rowt=mysql_fetch_array($rt)){
			 $school_code  	 =$rowt['school_code'];
			 }
		 
			
		 $s="SELECT concat(first1,' ',last1) as bar_name from barrower where bar_id='$bar_id'"; 
		 $r = mysql_query($s); 
		 	 while($row1=mysql_fetch_array($r)){
			 $bar_name  	 =$row1['bar_name'];
			 }
		 
		
				if($x>$y){
				$y+=2;
				$bg="#ECE9D8";

				}
				else{
				$x+=2;
				$bg="#Ffffff";
				}
	  
	  ?>
				   
				   
				   
                   <tr >
                     <td bgcolor="<?php echo $bg;?>"><b><?php echo $access_no;?></b></td>
                     <td bgcolor="<?php echo $bg;?>"><?php echo $books;?></td>
                     <td bgcolor="<?php echo $bg;?>"><?php echo $bar_name;?></td>
                     <td bgcolor="<?php echo $bg;?>"><?php echo $date_borrow;?></td>
                     <td bgcolor="<?php echo $bg;?>"><?php echo $date_na;?></td>
					<?php if ($type_code=="all") echo"<td bgcolor='$bg'>$school_code</td>";?>
                   </tr>
				   <?php 
				   } 
				   ?>
				 <tr>
        <td><input type="button" name="submit2" value="Print..." class="btn" onclick="MM_openBrWindow1('report/index.php?sql=2&start=<?php echo $start;?>&end=<?php echo $end;?>&school=<?php echo $type_code;?>&from=<?php echo $from;?>&to=<?php echo $max_results;?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
       <?php if ($type_code=="all") echo'<td >&nbsp;</td>';?>
       
      </tr>   
    </table>
				 <?php 
				 }
				 
		
						 
				 ?>
				 
			     <p>
        <?php 
		display_pagination($pagination);
	   }?>
      <a href="show_book_borrow_2.php"></a></p>
	  <?php 
	  if ($window==3){
	  
	  echo $message;
	  }?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
  </div>
</div>
<div class="lowercontent"></div>
<div class="footer1">
<table align="center">
<tr>
<td><img src="logo/anilag systems logo 300x155 trnsparent.png" /></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><img src="images/isch.gif" width="200" height="70"/></td>
</tr>
</table></div>
<div class="footer">
<?php echo $system_title;?><br/><?php echo $footer;?>
</div>
</body>
</html>