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

//if delete has been clicked
if($_GET['access_no']){

//authorized
if($del_book=="on"){

$access_no	= $_GET['access_no'];


$s="DELETE FROM recyclebin WHERE accession_no='$access_no'";
mysql_query($s,$connect) or die("cant execute query!....2.");
$message="You have successfully deleted an item in the recyclebin!";

}




else{
$message="You are not allowed to delete an item in the recycle bin!";
}

}// if delete link is clicked
$window =1;
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

	if($type_code=="all"){

$sql = "select * from recyclebin where date_deleted  BETWEEN
	'$start' AND '$end' order by date_deleted,booktitle,person_deleted,school_code"; 
} //end if all

else{
$sql = "select * from recyclebin where school_code='$type_code' && date_deleted  BETWEEN
	'$start' AND '$end' order by date_deleted,booktitle,person_deleted,school_code"; 

}// end else

	
	
	
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
$result = mysql_query($sql) or die(mysql_error()); 

$total_results  = mysql_num_rows($result); 
$number			=$total_results;
$total_pages    = ceil($total_results / $max_results); 

$pagination = ''; 

	/* Create a PREV link if there is one */ 
	if($page > 1) 
	{ 
	//pass the values of the $txt variables
	$pagination .= '<a href="show_deleted_record_2.php?sql='.$sql.'&page='.$prev.'"
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
		$pagination .= '&nbsp;<a href="show_deleted_record_2.php?type='.$type.'&sql='.$sql.'&search='.$search.'&page='.$i.'" title="page '.$i.'">' .$i. '</a>&nbsp;'; 
		} 
	} 


	/* Print NEXT link if there is one */ 
	if($page < $total_pages) 
	{ 
	$pagination .= '<a href="show_deleted_record_2.php?type='.$type.'&sql='.$sql.'&search='.$search.'&page='.$next.'"
	title="Next">Next &gt;</a>'; 

	} 
	else{
	$pagination .= '&nbsp;<strong>Next &gt;</strong>'; 
	} 
	
	//############PAGINATION END################
//echo $from;
//echo $max_results;
//perform the query
$sql.=" LIMIT $from, $max_results"; 
$result2 = mysql_query($sql) or die(mysql_error()); 
$number = mysql_num_rows($result2);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>

<SCRIPT language=javascript>
	
	//-->
	function trash()
	{

    var answer = confirm("Are you sure you wish to delete this item?\n Click OK to proceed otherwise click Cancel.")
	if (!answer){
		
		return false;
	}

    document.supportform.action = "show_deleted_record_2.php"    
	document.supportform.method="post"        
    document.supportform.submit();         

    return true;
}
</SCRIPT>
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
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;Show Deleted Records</h2>
    <form id="form1" name="myform" method="post" action="show_deleted_record.php">
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
	
	<p>
	 <?php 
		display_pagination($pagination);
	   ?>
      <a href="show_deleted_record_2.php"></a></p>
    <?php 
	if ($window ==1){
	//output if there is 
	if(mysql_num_rows($result2)!=0){
	          echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for deleted records  in <strong>'.$type_code.'</strong> school returns <strong>'.$total_results.'</strong> result(s)<br><br><hr/>';

	     	?>
    <table width="100%" border="0">
                   <tr>
                     <td colspan="2"><h3><strong>DELETED RECORDS </strong></h3></td>
                     <td  colspan="3"><?php echo $message;?></td>
                     <td width="11%">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td width="11%"><div align="center"><strong>Access No. </strong></div></td>
                     <td width="22%"><div align="center"><strong>Title </strong></div></td>
                     <td width="18%"><div align="center"><strong>Author</strong></div></td>
					
                     <td width="13%"><div align="center"><strong>Date Deleted</strong></div></td>
                     <td width="18%"><div align="center"><strong>Incharge </strong></div></td>
                  <td width="11%"><div align="center"><strong>School</strong></div></td>
			         <td width="7%"><div align="center"><strong>Delete</strong></div></td>
                
				   </tr>
				   <?php 				   
	  	$x=2;
		$y=1;
		$i=0;
	  while($row=mysql_fetch_array($result2)){
		
		$title  	 =$row['booktitle'];
		$accession_no	 =$row['accession_no'];
		$author_sname		 =$row['author_sname'];
		$author_fname		 =$row['author_fname'];
		$author_mname		 =$row['author_mname'];
		$author		 =$author_fname.' '.$author_mname{0}.'.'.' '.$author_sname;
		$mat_type		 =$row['mat_type'];
		$date_deleted		 =$row['date_deleted'];
		$person_deleted	 =$row['person_deleted'];
		$type	 =$row['type'];
		$school_code		 =$row['school_code'];
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
                     <td bgcolor="<?php echo $bg;?>"><?php echo $accession_no;?></td>
                     <td bgcolor="<?php echo $bg;?>"><?php echo $title;?></td>
                     <td bgcolor="<?php echo $bg;?>"><?php echo $author;?></td>
                    
                     <td bgcolor="<?php echo $bg;?>"><div align="center"><?php echo $date_deleted;?></div></td>
                     <td bgcolor="<?php echo $bg;?>"><div align="center"><?php echo $person_deleted;?></div></td>
                  
                   
				   <td bgcolor="<?php echo $bg;?>"><div align="center"><?php echo $school_code;?></div></td><td bgcolor="<?php echo $bg;?>">
				     <div align="center"><a href="show_deleted_record_2.php?access_no=<?php echo $accession_no;?>"onclick="return trash();">delete</a> </div></td>
				   </tr>
				   <?php 
				   } 
				   ?>
				    <tr>
        <td><input type="button" name="submit2" value="Print..." class="btn" onclick="MM_openBrWindow1('report/index.php?sql=6&start=<?php echo $start;?>&end=<?php echo $end;?>&school=<?php echo $type_code;?>&from=<?php echo $from;?>&to=<?php echo $max_results;?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
       
       
      </tr>   
    </table>
				 <?php 
				 }else{
			 echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for deleted records  in <strong>'.$type_code.'</strong> school returns <strong>'.$total_results.'</strong> result(s)<br><br><hr/>';}
			
				 }
				
				 ?>
				 
			     <p>
        <?php 
		display_pagination($pagination);
	   ?>
      <a href="show_deletd_record_2.php"></a></p>
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