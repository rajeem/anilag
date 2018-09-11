<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";
include "user.php";

$cancel_ok = 'Cancel';
$sql = "SELECT * from user WHERE username='$user'";
$result = mysql_query($sql) or die("cant execute query!");
while ($row = mysql_fetch_array($result)) {
    $id = $row['id'];
    $last = $row['last1'];
    $first = $row['first1'];
    $username = $row['username'];
    $password = $row['password'];
    $type = $row['type'];
    //$password=md5($password);
}

if ($_POST['op'] == 1) {

//$table_insert    = $_POST['table'];
    $id = $_POST['id'];
    $edit_last = $_POST['last'];
    $edit_first = $_POST['first'];
    $edit_username = $_POST['username'];
    $edit_password = $_POST['password'];
    $edit_repassword = $_POST['repassword'];
    $edit_cpassword = $_POST['cpassword'];

//encript
    //$edit_password=md5($edit_password);
    //$edit_cpassword=md5($edit_cpassword);
    //echo $edit_cpassword."<br>";

    //if the fields are complete
    if (($edit_last != "") && ($edit_first != "") && ($edit_username != "")
        && ($edit_password != "") && ($edit_repassword != "") && ($edit_cpassword != "")) {
        $error = "a";

        //if the current password are match
        if ($edit_cpassword == $password) {

            $error = "b";

            //if password enter and confirmation password are match
            if ($edit_password == $edit_repassword) {

                //$edit_password=md5($edit_password);
                $sql = "UPDATE user set last1='$edit_last',first1='$edit_first',username='$edit_username',password='$edit_password' WHERE id='$id'";
                mysql_query($sql) or die("cant execute query!");
                //header("location:done_my_account.php?username=$username");
                //exit;
                $error = "<strong><font color=red>Account successfully change!</font></strong>";
                $cancel_ok = 'Close';

            } else {
                $error = "<strong><font color=red>Password not match</font></strong>";
            }
        }

        //if the current password are not match
        else {

            $error = "<strong><font color=red>Your current password doesn't match</font></strong>";

        }

        //if fields not complete
    } else {
        $error = "<strong><font color=red>Please complete the fields</font></strong>";

    }

    $last = $edit_last;
    $first = $edit_first;
    $username = $edit_username;
    $password = "";
    $repassword = "";

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

<body Onload="disable_specify()">

<div id="container"><!-- End of Page Header -->


	<!-- Start of Page Menu -->
    <!-- End of Page Menu -->
    <!-- Start of Left Sidebar -->
    <!-- End of Left Sidebar -->
    <!-- Start of Main Content Area -->
<div id="main_content202">

		<!-- Start of New Item Description -->

<div id="new_item202">
 <fieldset><legend class="style1">User Account</legend>
	  <form action="user_account.php" method="post" id="myform" name="myform">
		    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
                <td width="25%" align="right">&nbsp;</td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><?php echo $error; ?><?php echo $ok; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Last name:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><input name="last" type="text" id="last" value="<?php echo $last; ?>" /></td>
                <td width="4%"><?php echo $error2; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>First name:</strong></td>
                <td>&nbsp;</td>
                <td><input name="first" type="text" id="first" value="<?php echo $first; ?>" /></td>
                <td><?php echo $error3; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>Username:</strong></td>
                <td>&nbsp;</td>
                <td><input name="username" type="text" id="username" value="<?php echo $username; ?>" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Current password</strong> </td>
                <td>&nbsp;</td>
                <td><input name="cpassword" type="password" id="cpassword" /></td>
                <td><?php echo $error5; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>password:</strong></td>
                <td>&nbsp;</td>
                <td><input name="password" type="password" id="password" /></td>
                <td><?php echo $error6; ?></td>
              </tr>
              <tr>
                <td align="right"><strong>retype password:</strong></td>
                <td>&nbsp;</td>
                <td><input name="repassword" type="password" id="repassword" /></td>
                <td><?php echo $error7; ?></td>
              </tr>
              <tr>
                <td align="right"><input name="button" type="button" onclick="javascript:window.close();" value="<?php echo $cancel_ok; ?>" class="btn"/></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="save" id="save" value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;" onclick="enable()" class="btn"/>
                <input name="op" type="hidden" id="op" value="1" /><?php
if ($type == 1) {
    ?>
                <input type="button" name="save2" id="save2" value="Create account..."  class="btn" onclick="MM_openBrWindow1('create_account.php','','scrollbars=yes,width=380,height=350')"/><?php }?>
                <input name="id" type="hidden" id="id" value="<?php echo $id; ?>" /></td>
                <td>&nbsp;</td>
              </tr>
            </table>
	  </form>
    </fieldset>�</div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>