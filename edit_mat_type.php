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

$sql = "SELECT * from material_type where id = $id";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    $mat_type = $row['mat_type'];
    $desc = $row['description'];
}

if ($_POST['update']) {
    $id = $_POST['id'];
    $mat_type = $_POST['type'];
    $desc = $_POST['desc'];

    $sql = "UPDATE material_type set mat_type='$mat_type',description='$desc' WHERE id='$id'";
    $result = mysql_query($sql, $connect) or die("cant execute query!!!");

    $sql = "SELECT * from material_type where id = $id";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $mat_type = $row['mat_type'];
    $desc = $row['description'];

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

<script type="text/JavaScript">
<!--
function FormValidate(){

if (document.myform.type.value == ""){
alert("Enter the material Type!");
document.myform.type.focus();
return false;}

if (document.myform.desc.value == ""){
alert("Enter the Description!");
document.myform.desc.focus();
return false;}

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
  <div id="Layer1">
    <img src="images/<?php echo $logo; ?>" width="117" height="110" />
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
 <legend class="style1">Edit Material Type </legend>

 <?php if ($op != 1) {?>
	  <form action="edit_mat_type.php" method="post" id="myform" name="myform">
	 <table width="70%" border="0" cellpadding="5" cellspacing="5">

			  <tr>

                <td width="25%" align="right"><strong>Material Type:  </strong></td>

                <td colspan="3"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" /><input name="type" type="text" id="type"   size="40" value="<?php echo $mat_type; ?>"/></td>
              </tr>
              <tr>
                <td align="right"><strong>Description: </strong></td>
                <td  colspan="3"><input name="desc" type="text" id="desc"   size="40" value="<?php echo $desc; ?>"/></td>

              </tr>
				<tr>
                <td align="right"><input name="Submit" type="submit" onClick="document.myform.action ='material_type.php';" value="Cancel" class="btn"/></td>

                <td colspan="3"><input type="submit" name="update" id="update" value="Update"class="btn" onClick=" return FormValidate()"/></td>

              </tr>
	    </table></form><?php }?>



 <?php if ($op == 1) {?>
	  <form action="edit_mat_type.php" method="post" id="myform" name="myform">
		<table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully modified &nbsp;&nbsp;<a href="material_type.php" >Back to Material TypePage</a> </td>

        </tr>
			  <tr>

                <td width="25%" align="right"><strong>Material Type  : </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
				<?php echo $mat_type; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Description  :</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $desc; ?></td>
                <td width="4%">&nbsp;</td>
              </tr>

				 </table></form><?php }?>
			 </fieldset></div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>
