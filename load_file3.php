<?php
session_start();
$_SESSION['admin_num2'] = $_SESSION['admin_num2'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:34px;
	top:76px;
	width:101px;
	height:106px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:163px;
	top:111px;
	width:367px;
	height:70px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:33px;
	top:10px;
	width:244px;
	height:42px;
	z-index:3;
}
-->
</style>
</head>

<body background="../true_files/bg.jpg">
<div id="Layer1">
  <input type="image" name="imageField" src="">
</div>
<div id="Layer2">
  <form enctype="multipart/form-data" action="../true_files/file_loaded3.php" method="post">
    <p>&lt;Enter the locaton of the picture you wish to upload...<br>
      Upload this file:
      <input name="userfile" type="file" />
      <br />
      Admin ID Number:
      <input type="text" name="admin_num" size="10"  value="<?php echo $_SESSION['admin_num2'] ?>" disabled="disabled"/>
&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="submit" type="submit" value="Send File" />
    </p>
  </form>
</div>
<div id="Layer3">
<h1>My Picture:</h1> </div>
</body>
</html>
