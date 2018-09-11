<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}

include "include/connect.php";
include "include/gensettings.php";

$id = $_GET['id'];

$sql = "SELECT * from card_cat where id='$id'";
$result = mysql_query($sql, $connect) or die("cant execute query!z");
while ($row = mysql_fetch_array($result)) {

    $id = $row['id'];
    $access_no = $row['access_no'];
    $source_of_fund = $row['source_of_fund'];
    $mode_of_ac = $row['mode_of_ac'];
    $mode_ac = $row['mode_ac'];
    $date_ac = $row['date_ac'];
    $property_no = $row['property_no'];
    $are = $row['are'];
    $date_verify = $row['date_verify'];
    $date_encode = $row['date_encode'];
    $encoded_by = $row['encoded_by'];
    $verified_by = $row['verified_by'];

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
body {
	background-image: url();
}
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 104px;
	top: 224px;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script></head>
<body OnLoad="document.myform.search.focus();">
<form action="about.php" method="post">
<table width="100%" border="0">
  <tr>
    <td width="286" bgcolor="#CCCCCC"><strong><font color="#FF0000"><?php echo $access_no; ?></font></strong></td>
    <td width="471" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Source of Fund:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $source_of_fund; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Mode of Acquisition:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $mode_of_ac; ?>(<?php echo $mode_ac; ?>)</td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Date Acquired:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $date_ac; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Property No:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $property_no; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Acknowledgement Receipt Expense (ARE) Date:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $are; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Encoded/updated by:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $encoded_by; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Date encoded:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $date_encode; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Verified by:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $verified_by; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Date Verified:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $date_verify; ?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="button" type="button" onclick="javascript:window.close();" value="close" class="btn"/></td>
    </tr>
</table>
</form>
</body>
</html>