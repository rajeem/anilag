<?php
include "include/connect.php";
include "include/gensettings.php";
include "user.php";
$id = $_GET['id'];
$op = 0;

if ($edit_borrower == "on") {
    $sql = "SELECT * from barrower where id='$id'";
    $result = mysql_query($sql, $connect) or die("cant execute query!z");
    while ($row = mysql_fetch_array($result)) {

        $id = $row['id'];
        $last = $row['last1'];
        $first = $row['first1'];
        $type = $row['type'];
        $school_code = $row['school_code'];
        $address = $row['address'];
        $ex_date = $row['ex_date'];
        $contact = $row['contact'];
        $email = $row['email'];
        $gender = $row['gender'];
        //    $active        =$row['active'];

    }

//if form submit
    if (isset($_POST['op'])) {

        $id = $_POST['id'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        $type = $_POST['type'];
        $school_code = $_POST['school_code'];
        $address = $_POST['address'];
        $ex_date = $_POST['ex_date'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "UPDATE barrower set last1='$last',first1='$first', school_code ='$school_code',
			type='$type',address='$address',ex_date='$ex_date',contact='$contact',
			email='$email',gender='$gender' where id='$id'";
        $result = mysql_query($sql, $connect) or die("cant execute query! #1");

    }
} else {
    echo "You are not allowed to access this page!";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/msgbox.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Document</title>
<link href="css/<?php echo $css; ?>" rel="stylesheet" type="text/css" />
</head>

<body onLoad="
if (document.all) { w = document.body.clientWidth; h = document.body.clientHeight; }
else if (document.layers) { w = window.innerWidth; h = window.innerHeight; }
if (window.moveTo) window.moveTo(w/2,h/1)"onLoad="
if (document.all) { w = document.body.clientWidth; h = document.body.clientHeight; }
else if (document.layers) { w = window.innerWidth; h = window.innerHeight; }
if (window.moveTo) window.moveTo(w/2,h/1)">
<form id="form1" name="form1" method="post" action="edit.php">
 <?php if ($op == 0) {?>
  <table width="100%" border="0">
    <tr>
      <td colspan="3"><strong>EDIT BORROWER ACCOUNT </strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><?php echo $ok; ?></td>
      <td width="16%">&nbsp;</td>
    </tr>


    <tr>
      <td align="right">Last name </td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input type="hidden"  id="id "name="id" value="<?php echo $id; ?>" /><input name="last" type="text" id="last" value="<?php echo $last; ?>" class="dilaw" /></td>
    </tr>
    <tr>
      <td align="right">First name </td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input name="first" type="text" id="first" value="<?php echo $first; ?>" class="dilaw"/></td>
    </tr>
	 <tr>
      <td align="right">Gender </td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input name="gender" type="text" id="gender" value="<?php echo $gender; ?>" class="dilaw"/></td>
    </tr>
    <tr>
      <td align="right">Type</td>
      <td>&nbsp;</td>
      <td><select name="type" id="type"> <?php
$i = 0;
    $sql = "SELECT type from usergroup";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $usertype = $row['type'];
        ?>
			<option <?php if ($usertype == $type) {
            echo "selected";
        }
        ?>><?php echo $usertype; ?></option>
<?php $i++;}?></select></td>
                <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Address</td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input name="address" type="text" id="address" value="<?php echo $address; ?>" class="dilaw"/></td>

    </tr>
    <tr>
      <td align="right">School</td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><select name="school_code" id="school_code"> <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $school = $row['school_code'];
        ?>
			<option <?php if ($school_code == $school) {
            echo "selected";
        }
        ?>><?php echo $school; ?></option>
<?php $i++;}?></select></td>

    </tr>


	<tr>
      <td align="right">Expiration Date </td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input name="ex_date" type="text" id="ex_date" value="<?php echo $ex_date; ?>" class="dilaw"/>
      <strong><font color="#FF0000">*(yyyy-mm-dd)</font></strong></td>
    </tr>
    <tr>
      <td align="right">Contact no.</td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input name="contact" type="text" id="contact" value="<?php echo $contact; ?>" class="dilaw"/></td>
    </tr>
    <tr>
      <td align="right">Email address </td>
      <td>&nbsp;</td>
      <td colspan="2" align="left"><input name="email" type="text" id="email" value="<?php echo $email; ?>" class="dilaw"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="63%"><strong>
        <input type="hidden" name="op" value="1" id="op"><input type="submit" name="button2" id="button" value="Update" class="btn" />
        <input name="button" type="button" onclick="javascript:window.opener.location.reload();javascript:window.close();"
			value="--Close--" class="btn"/>
      </strong></td>
      <td><strong>
        <input name="op" type="hidden" id="op" value="1" />

      </strong></td>
    </tr>
  </table><?php }?>
</form>
</body>
</html>