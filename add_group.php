<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
$id = $_GET['id'];
$op = 1;
include "include/connect.php";
include "include/gensettings.php";
include "user.php";

if ($_POST['add']) {
    $usertype = $_POST['type'];
    $add_book = $_POST['add_book'];
    $edit_book = $_POST['edit_book'];
    $del_book = $_POST['del_book'];
    $borrow_book = $_POST['borrow_book'];
    $add_borrower = $_POST['add_borrower'];
    $edit_borrower = $_POST['edit_borrower'];
    $del_borrower = $_POST['del_borrower'];
    $show_borrower = $_POST['show_borrower'];
    $upload_file = $_POST['upload_file'];
    $remove_file = $_POST['remove_file'];
    $max_no = $_POST['max_no'];

    if ($add_book == "on") {
        $selected1 = 'checked="checked"';
    }

    if ($add_book == "off") {
        $selected2 = 'checked="checked"';
    }

    if ($edit_book == "on") {
        $selected3 = 'checked="checked"';
    }

    if ($edit_book == "off") {
        $selected4 = 'checked="checked"';
    }

    if ($del_book == "on") {
        $selected5 = 'checked="checked"';
    }

    if ($del_book == "off") {
        $selected6 = 'checked="checked"';
    }

    if ($borrow_book == "on") {
        $selected7 = 'checked="checked"';
    }

    if ($borrow_book == "off") {
        $selected8 = 'checked="checked"';
    }

    if ($add_borrower == "on") {
        $selected9 = 'checked="checked"';
    }

    if ($add_borrower == "off") {
        $selected10 = 'checked="checked"';
    }

    if ($edit_borrower == "on") {
        $selected11 = 'checked="checked"';
    }

    if ($edit_borrower == "off") {
        $selected12 = 'checked="checked"';
    }

    if ($del_borrower == "on") {
        $selected13 = 'checked="checked"';
    }

    if ($del_borrower == "off") {
        $selected14 = 'checked="checked"';
    }

    if ($upload_file == "on") {
        $selected15 = 'checked="checked"';
    }
    if ($upload_file == "off") {
        $selected16 = 'checked="checked"';
    }

    if ($remove_file == "on") {
        $selected17 = 'checked="checked"';
    }

    if ($remove_file == "off") {
        $selected18 = 'checked="checked"';
    }

    if ($show_borrower == "on") {
        $selected19 = 'checked="checked"';
    }

    if ($show_borrower == "off") {
        $selected20 = 'checked="checked"';
    }

    $sql = "select * from usergroup where type = '$usertype'";
    $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
    if (mysql_num_rows($result) != 0) { // if already exists
        $op = 2;
    } else {

        $sql = "INSERT INTO usergroup

			(type,add_book,edit_book,del_book,borrow_book,max_no,add_borrower,edit_borrower,del_borrower,show_borrower,upload,remove) 	values('$usertype','$add_book','$edit_book','$del_book','$borrow_book','$max_no','$add_borrower','$edit_borrower','$del_borrower','$show_borrower','$upload_file','$remove_file')";
        $result = mysql_query($sql, $connect) or die("cant execute query23!" . mysql_error());
        $op = 3;
    }
}

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
 <fieldset>
 <legend class="style1">Add Group</legend>

 <?php if ($op == 1) {?>
	  <form action="add_group.php" method="post" id="myform" name="myform">
	 <table width="100%" border="0" cellpadding="5" cellspacing="5">

			  <tr>

                <td width="25%" align="right"><strong>User Group: </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input type="text" name="type" id="type" size="15" /></td>
              </tr>
              <tr>
                <td align="right"><strong>Add Book :</strong></td>
                <td>&nbsp;</td>
                <td width="67%">On<input type="radio" value="on" name="add_book" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="add_book"/></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Edit Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="edit_book"/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="edit_book"  /></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td align="right"><strong>Delete Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="del_book"/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="del_book"  /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Borrow Book :</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="borrow_book"  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="borrow_book" /></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td align="right"><strong>Max No: </strong></td>
                <td>&nbsp;</td>
                <td><input type="text" name="max_no" size="15"/></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>Add Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="add_borrower" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="add_borrower"  /></td>
                <td>&nbsp;</td></tr>
				  <tr>
                <td align="right"><strong>Edit Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="edit_borrower" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="edit_borrower"  /></td>
                <td>&nbsp;</td></tr>
				  <tr>
                <td align="right"><strong>Delete Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="del_borrower" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="del_borrower"  /></td>
                <td>&nbsp;</td></tr>
				 <tr>
                <td align="right"><strong>Show Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="show_borrower" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="show_borrower"  /></td>
                <td>&nbsp;</td></tr>
				 <tr>
                <td align="right"><strong>Upload Photo : </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="upload_file" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="upload_file"  /></td>
                <td>&nbsp;</td></tr>
				 <tr>
                <td align="right"><strong>Remove Photo : </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="remove_file" />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="remove_file"  /></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><input name="Submit" type="submit" onClick="document.myform.action ='groups.php';" value="Cancel" class="btn"/></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="add" id="add" value="Add Goup"class="btn"/></td>
                <td>&nbsp;</td>
              </tr>
			 </table></form><?php }?>

<?php if ($op == 2) {echo " Group name already exists!";?>
	  <form action="add_group.php" method="post" id="myform" name="myform">
	 <table width="100%" border="0" cellpadding="5" cellspacing="5">

			  <tr>

                <td width="25%" align="right"><strong>User Group: </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input type="text" name="type" id="type" size="15" /></td>
              </tr>
              <tr>
                <td align="right"><strong>Add Book :</strong></td>
                <td>&nbsp;</td>
                <td width="67%">On<input type="radio" value="on" name="add_book" <?php echo $selected1; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="add_book" <?php echo $selected2; ?>/></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Edit Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="edit_book" <?php echo $selected3; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="edit_book" <?php echo $selected4; ?> /></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td align="right"><strong>Delete Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="del_book" <?php echo $selected5; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="del_book"  <?php echo $selected6; ?>/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Borrow Book :</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="borrow_book"  <?php echo $selected7; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="borrow_book" <?php echo $selected8; ?>/></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td align="right"><strong>Max No: </strong></td>
                <td>&nbsp;</td>
                <td><input type="text" name="max_no" size="15" value="<?php echo $max_no; ?>"/></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>Add Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="add_borrower" <?php echo $selected9; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="add_borrower"  <?php echo $selected10; ?>/></td>
                <td>&nbsp;</td></tr>
				  <tr>
                <td align="right"><strong>Edit Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="edit_borrower" <?php echo $selected11; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="edit_borrower"  <?php echo $selected12; ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><strong>Delete Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="del_borrower" <?php echo $selected13; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="del_borrower"  <?php echo $selected14; ?>/></td>
                <td>&nbsp;</td></tr>

				<tr>
                <td align="right"><strong>Show Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="show_borrower" <?php echo $selected19; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="show_borrower"  <?php echo $selected20; ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><strong>Upload Photo : </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="upload_file" <?php echo $selected15; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="upload_file"  <?php echo $selected16; ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><strong>Remove Photo : </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="remove_file" <?php echo $selected17; ?>/>&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="remove_file"  <?php echo $selected18; ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><input name="Submit" type="submit" onClick="document.myform.action ='groups.php';" value="Cancel" class="btn"/></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="add" id="add" value="Add Group"class="btn"/></td>
                <td>&nbsp;</td>
              </tr>
			 </table></form><?php }?>


 <?php if ($op == 3) {?>
	  <form action="add_group.php" method="post" id="myform" name="myform">
		<table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully added &nbsp;<a href="groups.php" >Back to List Group Page</a> </td>

        </tr>
			  <tr>

                <td width="25%" align="right"><strong>User Group: </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><?php echo $usertype; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Add Book :</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $add_book; ?></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Edit Book:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $edit_book; ?></td>
                <td>&nbsp;</td>
              </tr>
			   <tr>
                <td align="right"><strong>Delete Book:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $del_book; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Borrow Book :</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $borrow_book ?></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td align="right"><strong>Max No: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $max_no; ?></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>Add Borrower: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $add_borrower; ?></td>
                <td>&nbsp;</td></tr>
				  <tr>
                <td align="right"><strong>Edit Borrower: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $edit_borrower; ?></td>
                <td>&nbsp;</td></tr>
				 <tr>
                <td align="right"><strong>Delete Borrower: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $del_borrower; ?></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><strong>Show Borrower: </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $show_borrower; ?></td>
                <td>&nbsp;</td></tr>

				 <tr>
                <td align="right"><strong>Upload Photo : </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $upload_file; ?></td>
                <td>&nbsp;</td></tr>
				 <tr>
                <td align="right"><strong>Remove Photo : </strong></td>
                <td>&nbsp;</td>
                <td><?php echo $remove_file; ?></td>
                <td>&nbsp;</td></tr>
			 </table></form><?php }?>
			 </fieldset></div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>