<?php
session_start();
$error = $_SESSION['error'];
unset($_SESSION['error']);

include "include/connect.php";
include "include/gensettings.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attach File</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
</head>
<body onLoad="
if (document.all) { w = document.body.clientWidth; h = document.body.clientHeight; }
else if (document.layers) { w = window.innerWidth; h = window.innerHeight; }
if (window.moveTo) window.moveTo(w/2,h/1)"onLoad="
if (document.all) { w = document.body.clientWidth; h = document.body.clientHeight; }
else if (document.layers) { w = window.innerWidth; h = window.innerHeight; }
if (window.moveTo) window.moveTo(w/2,h/1)">
<form enctype="multipart/form-data" action="uploader.php" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="5">
  <tr>
    <td width="408">&nbsp;</td>
    <td width="8">&nbsp;</td>
    <td width="306"><?php echo $error; ?></td>
  </tr>
  <tr>
    <td align="right">Choose file to attach: </td>
    <td align="right">&nbsp;</td>
    <td><input name="uploadedfile" type="file" class="style4" /></td>
  </tr>
  <tr>
    <td align="right"><span class="style1">Use file as</span>:</td>
    <td align="right">&nbsp;</td>
    <td><select name="type" id="type">
      <option value="pdf">PDF files</option>
      <option value="front">Book cover image</option>
      <option value="help">Compiled HTML</option>
      <option value="pdb">PDB</option>
    </select></td>
  </tr>
  <tr>
    <td align="right"><input name="submit" type="submit" onclick="javascript:showProgress();" value="Attach" class="btn"/>
      <input name="button" type="button" onclick="javascript:window.close();" value="Cancel" class="btn"/></td>
    <td>&nbsp;</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="10000000000"/>
      (
    max:8000 KB)</td>
  </tr>
</table>
</form>
</body>
</html>