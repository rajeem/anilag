<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
$id = $_GET['id'];
include "include/connect.php";
include "include/gensettings.php";

$sql = "select * from usergroup WHERE id='$id'";
$result = mysql_query($sql, $connect) or die("cant execute query!!!");
while ($row == mysql_fetch_array($result)) {
    $usertype = $row['type'];}

//$max_no = $_POST['max_no'];
//$Geek_World_Online_Magazine = !isset($_POST["Geek_World_Online_Magazine"]? NULL: //$_POST["Geek_World_Online_Magazine"]);
/*
$add_book = !isset($_POST['add_book']? NULL : $_POST['add_book']);
$edit_del_book = !isset($_POST['edit_del_book']? NULL: $_POST['edit_del_book']);
$borrower = !isset($_POST['borrower']? NULL: $_POST['borrower']);
$add_borrower = !isset($_POST['add_borrower']? NULL: $_POST['add_borrower']);
$edit_del_borrower = !isset($_POST['edit_del_borrower']? NULL: $_POST['edit_del_borrower']);

$sql="UPDATE usergroup set add_book='$add_book',edit_del_book = '$edit_del_book',borrow_book = '$borrow_book',add_borrower = '$add_borrower',edit_del_borrower = '$edit_del_borrower' WHERE id='$id'";
$result=mysql_query($sql,$connect) or die("cant execute query!!!");
 */
echo $usertype;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script type="text/JavaScript">
<!--
function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<title><?php echo $system_title . "--" . $footer; ?></title>

<link rel="stylesheet" href="css/<?php echo $css; ?>" type="text/css" />
</head>

<body>

<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo; ?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div></div>
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
<!-- Start of New Item Description -->

<div id="new_item202">
 <fieldset><legend class="style1">Edit Group</legend>

	 <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully modified &nbsp;&nbsp;<a href="groups.php" >Back to List Group Page</a> </td>

        </tr>
			  <tr>

                <td width="25%" align="right"><strong>User Group: </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td align="right"><strong>Add Book :</strong></td>
                <td>&nbsp;</td>
                <td width="67%">&nbsp;</td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Edit/Delete Book:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $edit_del_book; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Borrow Book :</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $borrow_book; ?></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td align="right"><strong>Max No: </strong></td>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>Add Borrower: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $add_borrower; ?></td>
                <td>&nbsp;</td></tr>
				  <tr>
                <td align="right"><strong>Edit/Delete Borrower: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $edit_del_borrower; ?></td>
                <td>&nbsp;</td></tr>
			 </table>
    </fieldset></div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>