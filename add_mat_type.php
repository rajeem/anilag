<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
$op = 1;
include "include/connect.php";
include "include/gensettings.php";

if ($_POST['add']) {
    $mat_type = $_POST['type'];
    $desc = $_POST['desc'];

    $sql = "select * from material_type where mat_type = '$mat_type' || description = '$desc'";
    $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
    if (mysql_num_rows($result) != 0) { // if already exists
        $op = 2;
    } else {

        $sql = "INSERT INTO material_type
			(mat_type,description) values('$mat_type','$desc')";
        $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
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

<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
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
 <legend class="style1">Create Material Type </legend>
 <?php if ($op == 1) {?>
	  <form action="add_mat_type.php" method="post" id="myform" name="myform">
		    <table width="77%" border="0" cellpadding="5" cellspacing="5">
              <tr>
                <td width="24%" align="right"><strong>Material Type:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
                <input name="type" type="text" id="type"   size="40"/></td>
              </tr>
              <tr>
                <td align="right"><strong>Description :</strong></td>
                <td>&nbsp;</td>
                <td width="41%"><input name="desc" type="text" id="desc"  size="40"/></td>
                <td width="33%">&nbsp;</td>
              </tr>

			  <tr>
                <td align="right" class="style2"><input name="Reset" type="reset" value="Reset" class="btn"/></td>
                <td>&nbsp;</td>
                <td class="style2"><input type="submit" name="add" id="add" value="Add Type"  class="btn" onClick=" return FormValidate()"/></td>
                <td>&nbsp;</td>
              </tr>
        </table>
	  </form><?php }?>

	  <?php if ($op == 2) {echo " The material type already exists!!";?>
	  <form action="add_mat_type.php" method="post" id="myform" name="myform">
		     <table width="77%" border="0" cellpadding="5" cellspacing="5">
              <tr>
                <td width="24%" align="right"><strong>Material Type:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
                <input name="type" type="text" id="type" size="40" /></td>
              </tr>
              <tr>
                <td align="right"><strong>Description :</strong></td>
                <td>&nbsp;</td>
                <td width="41%"><input name="desc" type="text" id="desc"  size="40"/></td>
                <td width="33%">&nbsp;</td>
              </tr>

			  <tr>
                <td align="right" class="style2"><input name="Reset" type="reset" value="Reset" class="btn"/></td>
                <td>&nbsp;</td>
                <td class="style2"><input type="submit" name="add" id="add" value="Add Type"  class="btn" /></td>
                <td>&nbsp;</td>
              </tr>
        </table>
	  </form><?php }?>

	  <?php if ($op == 3) {?>
    <table width="73%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully added!&nbsp;&nbsp;<a href="material_type.php" >Back to Material Type Page</a> </td>

        </tr>
			  <tr>

                <td width="25%" align="right"><strong>Material Type :</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2">
				<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
				<?php echo $mat_type; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Description :</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $desc; ?></td>
                <td width="4%">&nbsp;</td>
              </tr>
  </table>
<?php }?>
  </fieldset>�</div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>
