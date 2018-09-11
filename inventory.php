<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/gensettings.php");
include("user.php");
//include("dump.php");

//e-books count
$sql='SELECT * from card_cat WHERE (pdb!="" or pdf!="" or help!="")'; 
$result = mysql_query($sql); 
$pdf_books = mysql_num_rows($result);

//.........number of books in lib............................//

//books in
$sql1='SELECT sum(qty) from card_cat '; 
$result1 = mysql_query($sql1); 
while($row=mysql_fetch_array($result1)){
$books   =$row['sum(qty)'];
}

//books out
$sql="SELECT sum(qty) from books_bar"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$book=$row['sum(qty)'];
}
//add out and in
$books+=$book;

//books available
$sql="SELECT sum(qty) from card_cat WHERE status1='in'"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$final_count_in   =$row['sum(qty)'];
}


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
    <h2>Inventory</h2>
   <?php if($uri=="admin"){?>
    <table width="100%" border="0">
      <tr>
        <td width="16%" align="center"><?php if ($uri=="admin")echo '<a href="show_book_borrow.php?action=borrowed">
        <img src="images/books.jpg" width="107" height="111" /><br />
        Books borrowed</a>'; else echo '      <img src="images/books.jpg" width="107" height="111" /><br />
        Books borrowed';?> </td>
        <td width="16%" align="center"><?php if ($uri=="admin")echo '<a href="overdue.php?action=overdue"><img src="images/clock_book.jpg" width="107" height="111" /><br />
        Overdue books</a>'; else echo '<img src="images/clock_book.jpg" width="107" height="111" /><br />
        Overdue books';?></td>
        <td width="18%" align="center"><?php if ($uri=="admin")echo '<a href="show_deleted_record.php?action=Deleted Records"><img src="images/overdue_books.jpg" width="107" height="111" /><br />
        Deleted Records </a>'; else echo '<img src="images/overdue_books.jpg" width="107" height="111" /><br />
        Deleted Records';?></td>
		<td width="18%" align="center"><?php if ($uri=="admin")echo '<a href="show_collection.php"><img src="images/overdue_books.jpg" width="107" height="111" /><br />
        Collected Fees</a>'; else echo '<img src="images/overdue_books.jpg" width="107" height="111" /><br/>
        Collected Fees';?></td>
		 <td width="50%" ><?php if ($uri=="admin")echo '<a href="history.php?action=history"><img src="images/overdue_books.jpg" width="107" height="111" /><br />
         Library Resources</a>'; else echo '<img src="images/overdue_books.jpg" width="107" height="111" /><br />
         Library Resources';?></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
      
    </table><?php } else echo "You are not allowed to access this page!";?>
     <hr />
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
<?php echo $system_title;?><br /><?php echo $footer;?>
</div>
</body>
</html>

