<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}

include("include/connect.php");
include("include/gensettings.php");
include("user.php");
include("count_day.php");
$search= isset($_POST['search']) ? $_POST['search'] : '';


if (isset($_GET['bar_id_from_home'])){
$search = $_GET['bar_id_from_home'];}


if (isset($_GET['bar_id'])){
$search = $_GET['bar_id'];}

$query="SELECT * FROM borrowers_pic where bar_id = '$search' ";
$result = mysql_query($query,$connect)  or die("cant execute query!.....");
$newArray = mysql_fetch_array($result);

if (mysql_num_rows($result) != 0){
$file_name = $newArray['file_name'];
}


$sql="SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar ";  
$result = mysql_query($query,$connect)  or die("cant execute query!.....");
$rowko = mysql_fetch_array($result);

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
<body>
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;".$header_title;?> </div>
  <div id="Layer1">
    <img src="images/<?php echo $logo;?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div>
</div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="home.php" id="current" title="Home">Home</a></li>
<li><a href="admin.php" title="Search">Search</a></li>
<li><a href="admin_add_new.php" title="Add book">Add book</a></li>
<li><a href="barrower.php" title="Barrower">Borrower</a></li>
<li><a href="inventory.php" title="Inventory">Inventory</a></li>
<li><a href="settings.php" title="Settings">Settings</a></li>
<li><a href="help1.php" title="Help">Help</a></li>
<li><a href="logout.php" title="Logout">Logout</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2><a href="barrower.php">Search borrower</a> | <?php if ($borrow_book=="on")echo '<a href="bar_new.php">Borrow books </a>'; else echo "Borrow Book";?> | <?php if ($add_borrower=="on")echo '<a href="create_borrower.php">Add borrower</a>'; else echo "Add Borrower";?> |<?php if ($show_borrower=="on")echo '<a href="show_borrower.php">Show borrower</a>'; else echo "Show Borrower";?>|<?php if (($upload_file=="on") || ($remove_file=="on")) echo '<a href="load_file.php">Update borrower photo</a>'; else echo "Update borrower photo";?>|<?php if ($uri=="admin")echo '<a href="pay_fee.php">Return books</a>'; else echo "Return Books";?></h2>
    <form id="myform" name="myform" method="post" action="barrower.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
          <td width="33%"><strong>Enter borrower's ID :</strong></td>
          <td width="21%">&nbsp;</td>
          <td width="8%" rowspan="2"><img src="images/lens.gif" /></td>
          <td width="38%">&nbsp;</td>
        </tr>
        <tr>
          <td><input name="search" type="text" class="dilaw" id="search" value="<?php echo $search;?>" size="30" /></td>
          <td><input name="Submit" type="submit" class="btn"  value="Search"/></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td>&nbsp;</td>
        </tr>
      </table></form>
<?php 
if (isset($_POST['op']) && (isset($_POST['search']) || isset($_GET['bar_id']) || isset($_GET['bar_id_from_home']))) {
	$search= $_POST['search'];


	if(isset($_GET['bar_id'])){
	$search=$_GET['bar_id'];
	
	
	$access_no	= $_GET['access_no'];
	$bar_id		= $_GET['bar_id'];

	$sql="SELECT * FROM books_bar WHERE bar_id='$bar_id' and access_no='$access_no'";
	$result=mysql_query($sql,$connect) or die("cant execute query!.....");
	while($row=mysql_fetch_array($result)){
	$qty1	  =$row['qty'];
	}


	/**
	  *update the quantity of that kind of book
 	 
 	 *amount of books in the library for that kind
 	 **/
	$sql = "UPDATE card_cat SET qty=1 WHERE access_no='$access_no'";
	mysql_query($sql,$connect) or die("cant execute query!.....");

	//delete from the account of the borrower
	$sql="DELETE from books_bar WHERE bar_id='$bar_id' and access_no='$access_no'";
	mysql_query($sql,$connect) or die("cant execute query!.....");
	$message="<strong><font color=#339900>The books".$title." returned!</font></strong>";
	
	}
	
	//if bar id is from home
	//bar id from home
	if(isset($_GET['bar_id_from_home'])){
	$search=$_GET['bar_id_from_home'];
	}
	
$sql="SELECT * from barrower where bar_id ='$search'";
$result=mysql_query($sql,$connect) or die("cant execute query!....3.".mysql_error());
while($row=mysql_fetch_array($result)){
				$id          =$row['id'];
				$bar_id   	 =$row['bar_id'];
				$name      	 =$row['name'];
				$last      	 =$row['last1'];
				$first       =$row['first1'];
				$usertype     =$row['type'];
				$course   	 =$row['course'];
				$taon      	 =$row['year1'];
				$add      	 =$row['address'];
				$number       =$row['contact'];
				$mail       =$row['email'];
				$ex_date     =$row['ex_date'];
				$adviser       =$row['adviser'];

}

$SQL="SELECT * from books_bar where bar_id ='$search' order by deadline,access_no";
$RESULT=mysql_query($SQL,$connect) or die("cant execute query!.....3.232");
$ROWS = mysql_num_rows($RESULT);

$rows=mysql_num_rows($result);
if(isset($search)){
		if($rows==0){
		echo "<strong><font color=red>Your search return zero result</font></strong>";
		}
}
		if($rows>0){	 
				
				?>
      <table width="101%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="146"  rowspan="5"> <input type="image" name="imageField"  src="upload/<?php echo $file_name;?>" height="100" width="100"  disabled="disabled"></td>
    <td width="205"><strong>Borrowers id: <?php echo $bar_id;?></strong></td>
    <td colspan="3" bgcolor="#FFFFFF"><strong>Name: <?php echo $last.", ".$first;?></strong></td>
   
    <td width="5" bgcolor="#FFFFFF"></td>
   
  </tr>
 <tr>
    
    <td width="205"><strong>User Type: <?php echo $usertype;?></strong></td>
    <td colspan="3" bgcolor="#FFFFFF"><strong>Address: <?php echo $add;?></strong></td>
    
    <td  bgcolor="#FFFFFF"></td>
    
  
  </tr>
 <tr>
    
    <td width="205"><strong>Course: <?php echo $course;?></strong></td>
    <td colspan="3" bgcolor="#FFFFFF"><strong>Contact No: <?php echo $number;?></strong></td>
  
    <td  bgcolor="#FFFFFF"></td>
  
    
  </tr>
 <tr>
   
    <td width="205"><strong>Year: <?php echo $taon;?></strong></td>
     <td colspan="3" bgcolor="#FFFFFF"><strong>Email Address: <?php echo $mail;?></strong></td>
    
    <td  bgcolor="#FFFFFF"></td>
    
  </tr>
  
  <tr>
   
    <td width="205"><strong>Adviser: <?php echo $adviser;?></strong></td>
    <td colspan="3" bgcolor="#FFFFFF"><strong>Card Expiration Date: <?php echo $ex_date;?></strong></td>
    <td  bgcolor="#FFFFFF"></td>
    
  </tr>
 
  <tr>
    <td colspan="8"><hr /></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#000000"><span class="style1">Accession no. </span></td>
    <td align="left" bgcolor="#000000"><span class="style1">Author</span></td>
    <td width="194" align="left" bgcolor="#000000"><span class="style1">Book Title</span></td>
    <td width="103" align="center" bgcolor="#000000"><span class="style1">Deadline</span></td>
    <td width="88" align="left" bgcolor="#000000"></td>
   
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"> <?php if ($ROWS==0){  echo "No Books/Material borrowed!";}?>
  </td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    
  </tr>
  <?php 
  				$x=2;
				$y=1;
				//set total books to 0
				$total=0;
				while($row=mysql_fetch_array($RESULT)){
				$id          =$row['id'];
				$books  	 =$row['books'];
				$access_no   =$row['access_no'];
				//$author_sname      =$row['author_sname'];
				//$author_fname      =$row['author_fname'];
				//$author_mname      =$row['author_mname'];
				//$author_mname      =ucfirst($author_mname);
				//$author      =$author_fname.' '.$author_mname{0}.'.'.$author_sname;
				$author     =$row['author'];
				$qty 		 =$row['qty'];
				$deadline    =$row['deadline'];
				
				//grid alternate colors
				if($x>$y){
				$y+=2;
				$bg="#ECE9D8";
	
				}else{
				$x+=2;
				$bg="#Ffffff";
				}
				        //per day
	                if ($rate==1){
					        if (($sat=="on")&&($sun=="on")) //including sat and sun
							{
						
                 $now  = date("Y-m-d");
                 $ngaun = strtotime($now);
				 $exp_date = strtotime($deadline);
		         $arawan = count_days(date($deadline),$now);
				 $araw2 = curdate($exp_date);
                  //echo $arawan;
				  $check_all =1;

							} //end including sat-sun
							
							if(($sat=="")&&($sun=="")) // not incluiding sat-sun
							{
				$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
				TIMEDIFF('$deadline',now()) as m";
				$result1	=mysql_query($sql1,$connect) or die(mysql_error());

                             
                 $now  = date("Y-m-d");
                 $ngaun = strtotime($now);
				 $exp_date = strtotime($deadline);
		         $arawan = count_days(date($deadline),$now);
				 $araw2 = curdate($exp_date);
                  
				  //=====================SWITCH Statement==================
				if ($arawan<=7){  
switch ($araw2) {
   case 'Monday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 4;
	   if($arawan==7) $cnt = 5;
      break;
   case 'Tuesday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 3;
	   if($arawan==6) $cnt = 4;
	   if($arawan==7) $cnt = 5;
       break;
   case 'Wednesday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 2;
	   if($arawan==5) $cnt = 3;
	   if($arawan==6) $cnt = 4;
	   if($arawan==7) $cnt = 5;
       break;
   case 'Thursday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 1;
	   if($arawan==3) $cnt = 1;
	   if($arawan==4) $cnt = 2;
	   if($arawan==5) $cnt = 3;
	   if($arawan==6) $cnt = 4;
	   if($arawan==7) $cnt = 5;
       break;
   case 'Friday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 0;
	   if($arawan==2) $cnt = 0;
	   if($arawan==3) $cnt = 1;
	   if($arawan==4) $cnt = 2;
	   if($arawan==5) $cnt = 3;
	   if($arawan==6) $cnt = 4;
	   if($arawan==7) $cnt = 5;
       break;
   case 'Saturday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 0;
	   if($arawan==2) $cnt = 1;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 5;
       break;
   case 'Sunday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 5;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 5;
       break;
   
   default:
       echo 'No day!';
       break;
}// end switch

}//end if arawan <=7

				  //=====================SWITCH Statement==================
				if($arawan>=8){  
switch ($araw2) {
   case 'Monday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 1;
	   if($rem==2) $day = 2;
	   if($rem==3) $day = 3;
	   if($rem==4) $day = 4;
	   if($rem==5) $day = 4;
	   if($rem==6) $day = 4;
	   $cnt = ($wk * 5) + $day;
      break;
   case 'Tuesday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 1;
	   if($rem==2) $day = 2;
	   if($rem==3) $day = 3;
	   if($rem==4) $day = 3;
	   if($rem==5) $day = 3;
	   if($rem==6) $day = 4;
	   $cnt = ($wk*5) + $day;
       break;
   case 'Wednesday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 1;
	   if($rem==2) $day = 2;
	   if($rem==3) $day = 2;
	   if($rem==4) $day = 2;
	   if($rem==5) $day = 3;
	   if($rem==6) $day = 4;
       $cnt = ($wk*5) + $day;
       break;
   case 'Thursday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 1;
	   if($rem==2) $day = 1;
	   if($rem==3) $day = 1;
	   if($rem==4) $day = 2;
	   if($rem==5) $day = 3;
	   if($rem==6) $day = 4;
       
	   $cnt = ($wk*5) + $day;
       break;
   case 'Friday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 0;
	   if($rem==2) $day = 0;
	   if($rem==3) $day = 1;
	   if($rem==4) $day = 2;
	   if($rem==5) $day = 3;
	   if($rem==6) $day = 4;
       $cnt = ($wk*5) + $day;
       break;
   case 'Saturday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 0;
	   if($rem==2) $day = 1;
	   if($rem==3) $day = 2;
	   if($rem==4) $day = 3;
	   if($rem==5) $day = 4;
	   if($rem==6) $day = 5;
	   $cnt = ($wk*5) + $day;
       break;
   case 'Sunday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = 0;
	   if($rem==1) $day = 1;
	   if($rem==2) $day = 2;
	   if($rem==3) $day = 3;
	   if($rem==4) $day = 4;
	   if($rem==5) $day = 5;
	   if($rem==6) $day = 5;
       $cnt = ($wk*5) + $day;
       break;
   
   default:
       echo 'No day!';
       break;
}// end switch
} // end if >8

}// end not including sat-sun
		
		if(($sat=="on")&&($sun=="")) // including sat only
							{
				$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
				TIMEDIFF('$deadline',now()) as m";
				$result1	=mysql_query($sql1,$connect) or die(mysql_error());

                             
                 $now  = date("Y-m-d");
                 $ngaun = strtotime($now);
				 $exp_date = strtotime($deadline);
		         $arawan = count_days(date($deadline),$now);
				 $araw2 = curdate($exp_date);
                  
				  //=====================SWITCH Statement==================
				if ($arawan<=7){  
switch ($araw2) {
   case 'Monday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 5;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
      break;
   case 'Tuesday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Wednesday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Thursday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Friday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 1;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Saturday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 0;
	   if($arawan==2) $cnt = 1;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Sunday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 5;
	   if($arawan==6) $cnt = 6;
	   if($arawan==7) $cnt = 6;
       break;
   
   default:
       echo 'No day!';
       break;
}// end switch

}//end if arawan <=7

				  //=====================SWITCH Statement==================
				if($arawan>=8){  
switch ($araw2) {
   case 'Monday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 4;
	   if($rem==5) $day = $wk + 5;
	   if($rem==6) $day = $wk + 5;
	   $cnt = ($wk * 5) + $day;
      break;
   case 'Tuesday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 4;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
	   $cnt = ($wk*5) + $day;
       break;
   case 'Wednesday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
       $cnt = ($wk*5) + $day;
       break;
   case 'Thursday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 2;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
       
	   $cnt = ($wk*5) + $day;
       break;
   case 'Friday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 1;
	   if($rem==3) $day = $wk + 2;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
       $cnt = ($wk*5) + $day;
       break;
   case 'Saturday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 0;
	   if($rem==2) $day = $wk + 1;
	   if($rem==3) $day = $wk + 2;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
	   $cnt = ($wk*5) + $day;
       break;
   case 'Sunday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 4;
	   if($rem==5) $day = $wk + 5;
	   if($rem==6) $day = $wk + 6;
       $cnt = ($wk*5) + $day;
       break;
   
   default:
       echo 'No day!';
       break;
}// end switch
}// end if >8
}// end including sat
		
		
		
		if(($sat=="")&&($sun=="on")) // including sun only
							{
				$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
				TIMEDIFF('$deadline',now()) as m";
				$result1	=mysql_query($sql1,$connect) or die(mysql_error());

                             
                 $now  = date("Y-m-d");
                 $ngaun = strtotime($now);
				 $exp_date = strtotime($deadline);
		         $arawan = count_days(date($deadline),$now);
				 $araw2 = curdate($exp_date);
                  
				  //=====================SWITCH Statement==================
				if ($arawan<=7){  
switch ($araw2) {
   case 'Monday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
      break;
   case 'Tuesday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Wednesday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Thursday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 1;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Friday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 0;
	   if($arawan==2) $cnt = 1;
	   if($arawan==3) $cnt = 2;
	   if($arawan==4) $cnt = 3;
	   if($arawan==5) $cnt = 4;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Saturday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 5;
	   if($arawan==6) $cnt = 6;
	   if($arawan==7) $cnt = 6;
       break;
   case 'Sunday':
       if($arawan==0) $cnt = 0;
	   if($arawan==1) $cnt = 1;
	   if($arawan==2) $cnt = 2;
	   if($arawan==3) $cnt = 3;
	   if($arawan==4) $cnt = 4;
	   if($arawan==5) $cnt = 5;
	   if($arawan==6) $cnt = 5;
	   if($arawan==7) $cnt = 6;
       break;
   
   default:
       echo 'No day!';
       break;
}// end switch

}//end if arawan <=7

				  //=====================SWITCH Statement==================
				if($arawan>=8){  
switch ($araw2) {
   case 'Monday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 4;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
	   $cnt = ($wk * 5) + $day;
      break;
   case 'Tuesday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
	   $cnt = ($wk*5) + $day;
       break;
   case 'Wednesday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 2;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
       $cnt = ($wk*5) + $day;
       break;
   case 'Thursday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 1;
	   if($rem==3) $day = $wk + 2;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
       
	   $cnt = ($wk*5) + $day;
       break;
   case 'Friday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 0;
	   if($rem==2) $day = $wk + 1;
	   if($rem==3) $day = $wk + 2;
	   if($rem==4) $day = $wk + 3;
	   if($rem==5) $day = $wk + 4;
	   if($rem==6) $day = $wk + 5;
       $cnt = ($wk*5) + $day;
       break;
   case 'Saturday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 4;
	   if($rem==5) $day = $wk + 5;
	   if($rem==6) $day = $wk + 6;
	   $cnt = ($wk*5) + $day;
       break;
   case 'Sunday':
       $wk = (int)($arawan / 7);
	   $rem = $arawan % 7;
       if($rem==0) $day = $wk;
	   if($rem==1) $day = $wk + 1;
	   if($rem==2) $day = $wk + 2;
	   if($rem==3) $day = $wk + 3;
	   if($rem==4) $day = $wk + 4;
	   if($rem==5) $day = $wk + 5;
	   if($rem==6) $day = $wk + 5;
       $cnt = ($wk*5) + $day;
       break;
   
   default:
       echo 'No day!';
       break;
}// end switch

}// end if >8
} //end including sun only

                   if ($check_all==1)
				   		{		  
					$final_overdue_price=0;

					$status="<strong><font color=red>Over due!</font></strong>($arawan days)";
					$final_overdue_price=$overdue_price*$arawan;
					$peso="P ";
					}
					
                   else{
				    if ($cnt > 0){
					$final_overdue_price=0;
					$status="<strong><font color=red>Over due!</font></strong>($cnt days)";
					$final_overdue_price=$overdue_price*$cnt;
										
					$peso="P ";
					}
					
					else{
					$status="";
					$final_overdue_price="";
					$peso="";
					}

             }				 		
		}
				if($rate==0){ //rate==0 //per hour
				
				$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
				TIMEDIFF('$deadline',now()) as m";
				$result1	=mysql_query($sql1,$connect) or die(mysql_error());

                while($row=mysql_fetch_array($result1)){
				$hrs   =$row['hrs'];
				$m	 =$row['m'];
				$hours_day = ($hrs/ 24);
				$per_day=round($hours_day,2);
				}

				$m= substr($m, 0, 1);  
				//echo $j;
				//echo $m;
	                 if($m=="-"){
					$final_overdue_price=0;
					$status="<strong><font color=red>Over due!</font></strong>($per_day day)";
					$final_overdue_price=$overdue_price*$per_day*8;
					$final_overdue_price = round($final_overdue_price,2);					
					$peso="P ";
					}
					
					else{
					$status="";
					$final_overdue_price="";
					$peso="";
					}

				
				} //end per hour
				//get total books barrowed
										

				$total=$total+$qty;
				?>
  <tr>
    <td align="left" bgcolor="<?php echo $bg;?>"><strong><?php echo $access_no;?></strong></td>
    <td align="left" bgcolor="<?php echo $bg;?>"><strong><?php echo $author;?></strong></td>
    <td align="left" bgcolor="<?php echo $bg;?>"><strong><?php echo $books;?></strong></td>
    <td align="left" bgcolor="<?php echo $bg;?>"><strong><?php echo $deadline;?></strong></td>
    <td align="left" bgcolor="<?php echo $bg;?>"></td></tr>
  <?php 
				  
				}
				?>
  <tr>
    <td><br /></td>
    <td><br /></td>
    <td><br /></td>
    <td><br /></td>
    <td><br /></td>
    
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    
  </tr>
  <tr>
    <?php if ($ROWS!=0){?><td><input type="button" name="submit2" value="Print Current Borrowed Book(s)" class="btn" onclick="MM_openBrWindow1('report/index.php?sql=100&amp;bar_id=<?php echo $bar_id; ?>&full_name=<?php echo $last.", ".$first;?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td><?php } ?>
    
	<?php
	$nyoy="SELECT * FROM history WHERE bar_id='$bar_id'";
	$nyoy2=mysql_query($nyoy,$connect)or die(mysql_error());
	$numrow=mysql_num_rows($nyoy2);
	if($numrow!=0){?>
	<td>
	<input type="button" name="submit2" value="Print All Borrowed Book(s)" class="btn" onclick="MM_openBrWindow1('report/index.php?sql=101&amp;bar_id=<?php echo $bar_id; ?>&full_name=<?php echo $last.", ".$first;?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
	<?php
	}
	?>
	
    <td align="right">&nbsp;</td>
    <td align="center"></td>
    <td></td>
   
  </tr>
</table>
<hr />
			     <p>
			       <?php
		       
			
		}
}		
?>
			     </p>
			     <p> </p>
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