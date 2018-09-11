<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/gensettings.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript">
<!--

function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Credits</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style></head>
<body OnLoad="document.myform.search.focus();">
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td colspan="4">Provincial Government of Laguna: Teresita 'Ning ning' Lazaro,Dennis Lazaro.<br />
      MISO Management:Jaime Garcia, Charito Perez, Adrian Miras, Lee Samonte, Jill Sandoval. </td>
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
    <td width="4%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
    <td width="37%" align="right"><input name="button" type="button" onclick="javascript:window.close();" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></td>
    <td width="50%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>