<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
$op = 0;
$id = $_GET['id'];
$bar_id = $_GET['bar_id'];

include "include/connect.php";
include "include/gensettings.php";
include "user.php";

$sql = "SELECT * FROM books_bar where bar_id='$bar_id'";
$result = mysql_query($sql, $connect) or die("cant execute query!.....2");
$row2 = mysql_num_rows($result);
if ($row2 != 0) {
    $message = "<h2>You cannot erase this account. Clear first  any current transaction!</h2> <Br>";
    $op = 2;} else {
    $op = 0;
    $sql = "SELECT * from user where id = $id";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $name = $row['username'];
        $password = $row['password'];
        $fname = $row['first1'];
        $mname = $row['middle1'];
        $lname = $row['last1'];
        $usertype = $row['type'];
        $id = $row['id'];
    }
}
if ($_POST['delete']) {
//$id=$_GET['id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lname = $_POST['last'];
    $fname = $_POST['first'];
    $mname = $_POST['middle'];
    $password = $_POST['password'];
    $usertype = $_POST['type'];

    $sql = "DELETE from user WHERE id='$id'";
    mysql_query($sql) or die("cant execute query");
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
 <fieldset><legend class="style1">Delete Account</legend>
<?php if ($op == 0) {?>
	  <form action="del_account.php" method="post" id="myform" name="myform">
		    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
                <td width="25%" align="right"><strong>Username:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
                <input name="name" type="text" id="name" value="<?php echo $name; ?>" /></td>
              </tr>
              <tr>
                <td align="right"><strong>Lastname:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><input name="last" type="text" id="last" value="<?php echo $lname; ?>" /></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Firstname:</strong></td>
                <td>&nbsp;</td>
                <td><input name="first" type="text" id="first" value="<?php echo $fname; ?>" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Middle Name:</strong></td>
                <td>&nbsp;</td>
                <td><input name="middle" type="text" id="middle" value="<?php echo $mname; ?>" /></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td align="right"><strong>User Type:</strong></td>
                <td>&nbsp;</td>
                <td><input name="type" type="text" id="type" value="<?php echo $usertype; ?>" /></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>password:</strong></td>
                <td>&nbsp;</td>
                <td><input name="password" type="text" id="password" value="<?php echo $password; ?>" /></td>
                <td>&nbsp;</td></tr>
			  <tr>
                <td align="right"><strong>Confirm Delete</strong></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="delete" id="delete" value="Delete" onclick="enable()" class="btn"/> &nbsp;&nbsp;&nbsp;&nbsp;<input name="Submit" type="submit" onClick="document.myform.action ='create_account.php';" value="Cancel" class="btn"/></td>
                <td>&nbsp;</td>
              </tr>
            </table>
	  </form><?php }?>
	  <?php if ($op == 1) {?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully deleted! &nbsp;&nbsp;<a href="create_account.php" >Back to Account Page</a></td>

        </tr>
			  <tr>

                <td width="25%" align="right"><strong>Username:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2">
				<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
				<?php echo $name; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Lastname:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $lname; ?></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Firstname:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $fname; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Middle Name:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $mname; ?></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td align="right"><strong>User Type</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $usertype; ?></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>password:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $password; ?></td>
                <td>&nbsp;</td></tr>
			 </table>
<?php }?>
<?php if ($op == 2) {?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2"><?php echo $message; ?> &nbsp;&nbsp;<a href="create_account.php" >Back to Account Page</a></td>

        </tr>
			 </table>
<?php }?>
    </fieldset></div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>
