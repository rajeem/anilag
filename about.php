<?php
session_start();
if (!isset($_SESSION[$myusername])) {
    header("location:admin_login.php");
    exit;
}

include "include/connect.php";
include "include/gensettings.php";

$copy = '&copy; Copyleft 2007 by Provincial Government of Laguna & Laguna University. All rights reserved. <br />
      This software is legally free to copy, modify and redistribute.<br /><br /><br />';
$credit = '&nbsp;&nbsp;Credits&nbsp;&nbsp;&nbsp;';
$hidden = 1;

if ($_POST['copy'] == 1) {
    $copy = "Provincial Government of Laguna: Gov. Teresita 'Ning ning' Lazaro,Provincial Administrator Dennis Lazaro.
      MISO Management:Jaime Garcia, Charito Perez, Adrian Miras, Lee Samonte, Jill Sandoval.
	  Jason Jimenez, Analie Vergel,Julie Ann Delgado,Manolito Isles,Rodel Sulsona ";
    $credit = '&nbsp;&nbsp;&nbsp;About&nbsp;&nbsp;&nbsp;&nbsp;';
    $hidden = 2;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>About the system</title>
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
<p>&nbsp;</p><form action="about.php" method="post">
<table width="100%" border="0">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="93%"><strong>Anilag Library System <br />
    Version 0.90 </strong></td>
    <td width="5%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Developed by: <a href="about.php"  onclick="MM_openBrWindow1('http://www.lagunauniversity.ph','','toolbar=yes,location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes')">Laguna University </a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left"><?php echo $copy; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><div id="Layer1">
      <input name="button2" type="submit"  value="<?php echo $credit; ?>" class="btn"/>
      <input name="button" type="button" onclick="javascript:window.close();" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="btn"/>
    </div>      </td>
    <td><input name="copy" type="hidden" id="copy" value="<?php echo $hidden; ?>" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>