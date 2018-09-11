<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";

$sql = "SELECT * from settings";

$result = mysql_query($sql, $connect) or die("cant execute query!z");

while ($row = mysql_fetch_array($result)) {
    $footer_in_table = $row['footer'];
}

if ($_POST['op'] == 1) {

    $report_type = $_POST['report_type'];
//echo $header;
    if ($report_type == "") {
        $ok = "Please enter footer name!";

    } else {

        header('location:report/index1.php?d=1');
        echo 'wah';
        //$sql="UPDATE settings set footer='$footer'";
        //$result=mysql_query($sql,$connect) or die("cant execute query! #1");
        //$ok="$footer_in_table change to $footer!";
        //$header_title="";

    }

}
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
<script src="js/msgbox.js"></script>
<script type="text/javascript">
function disable_false(){
document.form1.create.disable=true

}
</script>

<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
a:link {
	color: #FFCC00;
}
a:visited {
	color: #FF9900;
}
a:hover {
	color: #FFFF00;
}
a:active {
	color: #FFFF00;
}
#Layer2 {position:absolute;
	width:200px;
	height:115px;
	z-index:2;
	left: 315px;
	top: 114px;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create report</title>
<link href="css/<?php echo $css; ?>" rel="stylesheet" type="text/css" />
</head>

<body onLoad="
if (document.all) { w = document.body.clientWidth; h = document.body.clientHeight; }
else if (document.layers) { w = window.innerWidth; h = window.innerHeight; }
if (window.moveTo) window.moveTo(w/2,h/1)"onLoad="
if (document.all) { w = document.body.clientWidth; h = document.body.clientHeight; }
else if (document.layers) { w = window.innerWidth; h = window.innerHeight; }
if (window.moveTo) window.moveTo(w/2,h/1)">
<form id="form1" name="form1" method="post" action="create_report.php">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><?php echo $ok; ?></td>
      <td width="6%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><strong>Reports of books borrowed </strong>
      <hr /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td width="92%" align="center">
        <input name="op2" type="hidden" id="op2" value="1" />
        <input type="button" name="Button" value="Weekly" onclick="MM_openBrWindow1('report/index1.php?d=1','','scrollbars=yes,width=1000,height=800')" class="btn"/>
        <input type="button" name="Button3" value="Monthly" onclick="MM_openBrWindow1('report/index1.php?d=2','','scrollbars=yes,width=1000,height=800')" class="btn"/>
        <input type="button" name="Submit2" value="Yearly" onclick="MM_openBrWindow1('report/index1.php?d=3','','scrollbars=yes,width=1000,height=800')" class="btn"/>
      <input name="button2" type="submit" id="button" value="Cancel" onclick="javascript:window.close();" class="btn"/>      </td>
      <td>
        <input name="op" type="hidden" id="op" value="1" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>