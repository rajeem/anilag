<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
$id = $_GET['id'];
$op = 0;
include "include/connect.php";
include "include/gensettings.php";

$sql = "SELECT * from usergroup where id = $id";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    $usertype = $row['type'];
    $add_book = $row['add_book'];
    $edit_book = $row['edit_book'];
    $del_book = $row['del_book'];
    $borrow_book = $row['borrow_book'];
    $add_borrower = $row['add_borrower'];
    $edit_borrower = $row['edit_borrower'];
    $del_borrower = $row['del_borrower'];
    $show_borrower = $row['show_borrower'];
    $upload_file = $row['upload'];
    $remove_file = $row['remove'];
    $max_no = $row['max_no'];
}

if ($_POST['update']) {
    $id = $_POST['id'];
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

    $sql = "UPDATE usergroup set add_book='$add_book',edit_book='$edit_book',del_book='$del_book',borrow_book = '$borrow_book',max_no = '$max_no' ,add_borrower = '$add_borrower', edit_borrower = '$edit_borrower', del_borrower = '$del_borrower', show_borrower = '$show_borrower', upload = '$upload_file', remove = '$remove_file' WHERE id='$id'";
    $result = mysql_query($sql, $connect) or die("cant execute query!!!");

    $sql = "SELECT type from usergroup where id = $id";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $usertype = $row['type'];

    $op = 1;
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
 <fieldset><legend class="style1">Edit Group</legend>

 <?php if ($op != 1) {?>
	  <form action="edit_group.php" method="post" id="myform" name="myform">
	 <table width="100%" border="0" cellpadding="5" cellspacing="5">

			  <tr>

                <td width="25%" align="right"><strong>User Group: </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" /><?php echo $usertype; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Add Book :</strong></td>
                <td>&nbsp;</td>
                <td width="67%">On<input type="radio" value="on" name="add_book" <?php if ($add_book == "on") {
    echo "checked";
}
    ?>   />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="add_book"  <?php if ($add_book == "off") {
        echo "checked";
    }
    ?>/></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Edit Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="edit_book" <?php if ($edit_book == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="edit_book"  <?php if ($edit_book == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td align="right"><strong>Delete Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="del_book" <?php if ($del_book == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="del_book"  <?php if ($del_book == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Borrow Book:</strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="borrow_book" <?php if ($borrow_book == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="borrow_book"  <?php if ($borrow_book == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td>
              </tr>

			   <tr>
                <td align="right"><strong>Max No: </strong></td>
                <td>&nbsp;</td>
                <td><input type="text" name="max_no" value="<?php echo $max_no; ?>"  size="5"/></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>Add Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="add_borrower" <?php if ($add_borrower == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="add_borrower"  <?php if ($add_borrower == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td></tr>
				   <tr>
                <td align="right"><strong>Edit Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="edit_borrower" <?php if ($edit_borrower == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="edit_borrower"  <?php if ($edit_borrower == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td></tr>
<tr>
                <td align="right"><strong>Delete Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="del_borrower" <?php if ($del_borrower == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="del_borrower"  <?php if ($del_borrower == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td></tr>

<tr>
                <td align="right"><strong>Show Borrower: </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="show_borrower" <?php if ($show_borrower == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="show_borrower"  <?php if ($show_borrower == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><strong>Upload Photo : </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="upload_file" <?php if ($upload_file == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="upload_file"  <?php if ($upload_file == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><strong>Remove Photo : </strong></td>
                <td>&nbsp;</td>
                <td>On<input type="radio" value="on" name="remove_file" <?php if ($remove_file == "on") {
        echo "checked";
    }
    ?>  />&nbsp;&nbsp;&nbsp;Off<input type="radio" value="off" name="remove_file"  <?php if ($remove_file == "off") {
        echo "checked";
    }
    ?>/></td>
                <td>&nbsp;</td></tr>
				<tr>
                <td align="right"><input name="Submit" type="submit" onClick="document.myform.action ='groups.php';" value="Cancel" class="btn"/></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="update" id="update" value="Update"class="btn"/></td>
                <td>&nbsp;</td>
              </tr>
			 </table></form><?php }?>



 <?php if ($op == 1) {?>
	  <form action="edit_group.php" method="post" id="myform" name="myform">
		<table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully modified &nbsp;&nbsp;<a href="groups.php" >Back to List Group Page</a> </td>

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
                <td><?php echo $borrow_book; ?></td>
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