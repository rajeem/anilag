<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>About the system</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style></head>
<body>
<table width="100%" height="150%" border="2" cellpadding="5" cellspacing="5">
  <tr>
    <td width="33%" height="29"><div align="center">To back up the E-Library system: </div></td>
    <td width="32%"><div align="center">To restore database: </div></td>
    <td width="35%" align="left"><div align="center">To restore the E-Library system </div></td>
  </tr>
  <tr>
    <td height="219">Copy the /home/public_html/ contents to any device that you want, paste it in a folder 'elib'. </td>
    <td><p>1.Go to http://localhost/phpmyadmin/.</p>
      <p>2.Select 'Import' from the list of tabs in the right-hand frame</p>
      <p>3.In the &quot;location of the text file&quot; section, click on the &quot;browse&quot; button to select the sql file to be imported..</p>
    <p>4.Click &quot;go&quot;.</p>
    <p>5.Go to http://localhost/elib/.</p></td>
    <td align="right"><div align="center">Follow the installation process. </div></td>
  </tr>
  <tr>
    <td height="34" align="right"><div align="center">
      <input name="button2" type="button"  value="Backup database" onclick="MM_openBrWindow1('backup.php','','scrollbars=yes,width=380,height=350')" class="btn"/>
    </div></td>
    <td align="left">

      <div align="center">
        <input name="button" type="button" onclick="javascript:window.close();" value="&nbsp;&nbsp;Cancel&nbsp;&nbsp;" class="btn"/>
      </div></td><td align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>