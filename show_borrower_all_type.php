<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/oras.php");
include("include/gensettings.php");
include("user.php");
include("include/function.php");

//if delete has been clicked
if(($_GET['id'])||($_GET['bar_id'])){

//authorized
if($del_borrower=="on"){

$student_id	= $_GET['bar_id'];

$s = "SELECT * FROM books_bar where bar_id='$student_id'";
		$result	=mysql_query($s,$connect) or die("cant execute query!.....2");
		$row2 = mysql_num_rows($result); 
		if ($row2!=0){
		$message="<strong>You cannot erase this account. Clear first  any current transaction!</strong> <Br>";
		$window=2;}
else{
$s="DELETE FROM barrower WHERE bar_id='$student_id'";
mysql_query($s,$connect) or die("cant execute query!....2.");
}


}

else{
$msg_mo="<h2>You are not allowed to delete borrowers account!</h2>";
}
}
//total due books
$sq="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where now()>deadline order by hrs desc";  
$result2 = mysql_query($sq); 
$due_all = mysql_num_rows($result2);

//.........number of books in lib............................//

//due today
$sq="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by hrs desc";  
$result2 = mysql_query($sq); 

$due_today = mysql_num_rows($result2);



//due tomorrow

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));

$sq="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by hrs desc";  
$result2 = mysql_query($sq); 

$due_tom   = mysql_num_rows($result2);



$window=1;


	$_SESSION[type_hanap] = $_SESSION['type_hanap'];
$type_code = $_SESSION['type_hanap'];
//	echo $type;
$sql="SELECT *,concat(first1,' ',last1)
	as wholename from barrower  order by bar_id";  



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
  
$result = mysql_query($sql); 

$total_results  = mysql_num_rows($result); 
$number			=$total_results;
$total_pages    = ceil($total_results / $max_results); 
//echo $total_results;
$pagination = ''; 

	/* Create a PREV link if there is one */ 
	if($page > 1) 
	{ 
	//pass the values of the $txt variables
	$pagination .= '<a href="show_borrower_all_type.php?page='.$prev.'"
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
		$pagination .= '&nbsp;<a href="show_borrower_all_type.php?page='.$i.'" title="page '.$i.'">' .$i. '</a>&nbsp;'; 
		} 
	} 


	/* Print NEXT link if there is one */ 
	if($page < $total_pages) 
	{ 
	$pagination .= '<a href="show_borrower_all_type.php?page='.$next.'"
	title="Next">Next &gt;</a>'; 

	} 
	else{
	$pagination .= '&nbsp;<strong>Next &gt;</strong>'; 
	} 



$sql.=" LIMIT $from, $max_results"; 
$result	=mysql_query($sql,$connect) or die("cant execute query!.....");
$mga_resulta  = mysql_num_rows($result); 
if ($mga_resulta==0)
$window=2;
//echo $mga_resulta;
//echo $sql;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title."--".$footer;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
<SCRIPT language=javascript>
	
	//-->
	function trash()
	{

    var answer = confirm("Are you sure you wish to delete this item?\n Click OK to proceed otherwise click Cancel.")
	if (!answer){
		
		return false;
	}

    document.supportform.action = "show_borrower.php"    
	document.supportform.method="post"        
    document.supportform.submit();         

    return true;
}
</SCRIPT>
<SCRIPT language=javascript>
function numbersOnly(el){	
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>
<script type="text/JavaScript" src="js/function.js">
</script>
</head>
<body>
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
    <h2><a href="barrower.php">Search borrower</a> | <?php if ($borrow_book=="on")echo '<a href="bar_new.php">Borrow books </a>'; else echo "Borrow Book";?> | <?php if ($add_borrower=="on")echo '<a href="create_borrower.php">Add borrower</a>'; else echo "Add Borrower";?> |<?php if ($show_borrower=="on")echo '<a href="show_borrower.php">Show borrower</a>'; else echo "Show Borrower";?>|<?php if (($upload_file=="on") || ($remove_file=="on")) echo '<a href="load_file.php">Update borrower photo</a>'; else echo "Update borrower photo";?>|<?php if ($uri=="admin")echo '<a href="pay_fee.php">Return books</a>'; else echo "Return books";?></h2>
    
	<form id="form1" name="myform" method="post" action="show_borrower.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
		<td colspan="3"><?php echo $msg_mo;?><?php echo "<br>".$message;?></td>
        
          
          
          <td width="45%"><?php echo "We have ".$due_today. "  books/items due today.";
		  ?></td>
        </tr>
        <tr>
          
          <td width="20%" valign="top"><strong>School:</strong>            <select name="type" id="type">
           <?php 
			$i=0;
			$sqr="SELECT school_code from school order by school_code"; 
$res = mysql_query($sqr); 
while($row=mysql_fetch_array($res)){
$school_code = $row['school_code'];
?>
			<option <?php if ($type_code=="$school_code") echo "selected"; ?>><?php echo $school_code;?></option>
<?php $i++; }?><option value="all" <?php if ($type_code=="all") echo "selected"; ?>>All</option>
</select> </td>
          <td valign="top" colspan="2">
            
            <input name="submit" type="submit" class="btn"  value="Search"/>
          </td>
		
          <td><?php echo "We have ".$due_tom. "  books/items due tomorrow.";
		  ?></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2"><input name="op" type="hidden" id="op" value="1" /></td>
          
         
          <td><?php echo "We have ".$due_all. "  books/items due.";
		  ?></td>
        </tr>
      </table>
    </form>	
	<?php 
	if ($window ==1){
	if($mga_resulta!=0){
	echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for Borrowers in  
		<strong>'.$type_code.' school</strong>  returned <strong>'.$total_results.'</strong> results<br><br><hr/>';

	?><table width="100%" border="0">
	 <tr>
          <td colspan="3"><?php
				 
				 if (strlen($pagination)<100){
					$pagination="";
				 } 
				  echo $pagination;?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      <tr>
        <td width="10%"><strong>Borrower ID </strong></td>
        <td width="13%"><strong>Borrower name</strong></td>
        <td width="13%"><strong>Type</strong></td>
        <td width="16%"><strong>Address</strong></td>
        <td width="11%"><strong>Expiration</strong></td>
        <td width="12%"><strong>Contact no. </strong></td>
        <td width="14%"><strong>Email address</strong></td>
        <td width="11%"><strong>Active</strong></td>
      </tr>
      <?php 
	  	$x=2;
		$y=1;
		
	  while($row=mysql_fetch_array($result)){
		$id 		 =$row['id'];
		//$books  	 =$row['books'];
		//$call_num	 =$row['call_num'];
		$bar_id		 =$row['bar_id'];
		$wholename	 =$row['wholename'];
		$address	 =$row['address'];
		$ex_date	 =$row['ex_date'];
		$contact	 =$row['contact'];
		$email		 =$row['email'];
		$type		 =$row['type'];	
		$active		 =$row['active'];	
			
$tmp_year = substr($ex_date, 0, 4);
$tmp_month = substr($ex_date, 5, 2);
$tmp_day = substr($ex_date, 8, 2);

$year = intval($tmp_year);
$cyear = intval($current["year"]);
$month = intval($tmp_month);
$cmonth = intval($current["month"]);
$day = intval($tmp_day);
$cday = intval($current["mday"]);

if ($year<$cyear){
				
				$sql="UPDATE barrower set active=0 WHERE id='$id'";
	$result2=mysql_query($sql,$connect) or die("cant execute query!!!");
			while($row2=mysql_fetch_array($result2)){
			$active		 =$row2['active'];
			}
			}// end if different year

if ($year>$cyear){
				
				$sql="UPDATE barrower set active=1 WHERE id='$id'";
	$result2=mysql_query($sql,$connect) or die("cant execute query!!!");
			while($row2=mysql_fetch_array($result2)){
			$active		 =$row2['active'];
			}
			}// end if ex_date year is greater than current year
			
if ($year==$cyear){
			
			if($month<$cmonth){	
				$sql="UPDATE barrower set active=0 WHERE id='$id'";
	$result2=mysql_query($sql,$connect) or die("cant execute query!!!");
			while($row2=mysql_fetch_array($result2)){
			$active		 =$row2['active'];
			}
			}// if different month
		
			if($month>$cmonth){	
				$sql="UPDATE barrower set active=1 WHERE id='$id'";
	$result2=mysql_query($sql,$connect) or die("cant execute query!!!");
			while($row2=mysql_fetch_array($result2)){
			$active		 =$row2['active'];
			}
			}// if greater month than current month
		
			if($month==$cmonth){// same month
			
			if($day<$cday){	
				$sql="UPDATE barrower set active=0 WHERE id='$id'";
	$result2_p=mysql_query($sql,$connect) or die("cant execute query!!!");
			while($row2=mysql_fetch_array($result2_p)){
			$active		 =$row2['active'];
			}
			}// if different day
			
			
			if($day>=$cday){	
				$sql="UPDATE barrower set active=1 WHERE id='$id'";
	$result2_q=mysql_query($sql,$connect) or die("cant execute query!!!");
			while($row2=mysql_fetch_array($result2_q)){
			$active		 =$row2['active'];
			}
			}// greater day than or equal to current day
			
			}// else same month
			
			}// end if same year
			
						
				if($active==1){
				$checked='checked="checked"';
				}
				
				else{
				$checked='';
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
      <tr>
        <td bgcolor="<?php echo $bg;?>"><input type="hidden" name="id" value="<?php echo $id;?>"  /><input type="hidden" name="bar_id" value="<?php echo $bar_id;?>"/><?php echo $bar_id;?></td>
        <td bgcolor="<?php echo $bg;?>"><?php echo $wholename;?></td>
        <td bgcolor="<?php echo $bg;?>"><?php echo $type;?></td>
        <td bgcolor="<?php echo $bg;?>"><?php echo $address;?></td>
        <td bgcolor="<?php echo $bg;?>"><?php echo $ex_date;?></td>
        <td bgcolor="<?php echo $bg;?>"><?php echo $contact;?></td>
        <td bgcolor="<?php echo $bg;?>"><?php echo $email;?></td>
        <td bgcolor="<?php echo $bg;?>"><input name="active" type="checkbox" id="active" value="checkbox" <?php echo $checked;?> />
        <a href="show_borrower_all_type.php?id=<?php echo $id;?>&amp;bar_id=<?php echo $bar_id;?>"onclick="return trash();">delete</a>        <?php echo '<a href="show_borrower_all_type.php"  onClick="MM_openBrWindow1(\'edit.php?id='.$id.'\',\'\',\'scrollbars=yes,width=400,height=300\')" style="cursor: pointer;">Edit</a>';?></td>
      </tr>
        <?php 
	  
	  }
	  
	  
	  ?>
        <tr>
          <td colspan="3"><?php
				 
				 if (strlen($pagination)<100){
					$pagination="";
				 } 
				  echo $pagination;?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      <tr>
        <td><input type="button" name="submit2" value="Print..." class="btn" onclick="MM_openBrWindow1('report/index.php?sql=1&from=<?php echo $from;?>&to=<?php echo $max_results;?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table><?php 
	}else{
	echo "<strong><font color=red>Your search return zero result</font>
			 </strong>";

	}
	}
	?>
	
<hr/>
	<?php if ($window == 2){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2"><?php echo $message;?> &nbsp;&nbsp;<a href="show_borrower.php" >Back to Show Borrower Page</a></td>

        </tr>
			 </table>
<?php }?>		     <p>
    </p>
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
<?php echo $system_title;?><br /><?php echo $footer;?>
</div>
</body>
</html>
