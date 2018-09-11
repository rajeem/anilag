<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";
include "user.php";

$op = 1;
//authorized
if ($del_book == "on") {

//check who delete...

    $sql = "select * from user WHERE username='$user'";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
    $row = mysql_fetch_array($result);
    $name = $row[first1] . ' ' . $row[middle1]{0} . '.' . ' ' . $row[last1];
    $type = $row[type];
//==============================
    $id = $_GET['id'];
    $date = date("Y-m-d");
    $sql = "select * from card_cat WHERE id='$id'";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
    while ($row = mysql_fetch_array($result)) {
        $access_no = $row['access_no'];
        $school_code = $row['school_code'];
        $author_sname = $row['author_sname'];
        $author_fname = $row['author_fname'];
        $author_mname = $row['author_mname'];
        $title = $row['title'];
        $gmd = $row['gmd'];
    }

    $sql = "INSERT INTO recyclebin
			(booktitle,author_sname,author_fname,author_mname,accession_no,mat_type,date_deleted,person_deleted,type,school_code) values('$title','$author_sname','$author_fname','$author_mname','$access_no','$gmd','$date','$name','$type','$school_code')";
    $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());

    $sql = "DELETE from card_cat WHERE id='$id'";
    mysql_query($sql) or die("cant execute query");

    //if title already exists!
    $sql_1 = "select * from card_cat where title='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
    $result4 = mysql_query($sql_1, $connect) or die("cant execute query!" . mysql_error());
    $num = mysql_num_rows($result4); // count number of times the title is present and same main author is present

    if (mysql_num_rows($result4) != 0) {

//    $sql2 = "select * from titles where title_proper='$title'";
        //    $result2 = mysql_query($sql2,$connect) or die("cant execute query!".mysql_error());
        //    if (mysql_num_rows($result2) != 0){                // if already exists
        $quantity = $num;
//      echo $quantity;
    } else {
        $quantity = 0;}
    $sql_2 = "UPDATE titles set quantity='$quantity' WHERE title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
    $result5 = mysql_query($sql_2, $connect) or die("cant execute query!!!");

    header("location:admin.php?show=do");

} else {
    $msg_mo = "You are not allowed to delete a book record!";
    $op = 2;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript">
<!--
function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<SCRIPT language=javascript>

function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>
<html><title>Elibrary System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
.style2 {	font-size: small;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>


<body>
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo; ?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div>
</div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="home.php" id="current" title="Home">Home</a></li>
<li><a href="admin.php" title="Search">Search</a></li>
<li><a href="admin_add_new.php" title="Administrator">Add book</a></li>
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

<?php if ($op == 2) {
    ?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td align="right"><a href="home.php">back to Home Page</a></td>
        <td colspan="2" align="left"><?php echo $msg_mo; ?></td>
        <td align="center">&nbsp;</td>

      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
	<?php }?>
</body></html>