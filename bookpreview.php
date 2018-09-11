<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/gensettings.php");
$userfile_name=$_GET['id'];
//echo $userfile_name;
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
<title>Book Preview</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style></head>
<body>
<div align="center">
  <input type="image" name="imageField"  src="upload/<?php echo $userfile_name;?>" height="500" width="400"  disabled="disabled"><br /><br /><br /><input name="button2" type="button" onclick="javascript:window.close();" value=" close " class="btn"/>
</div>
</body>
</html>