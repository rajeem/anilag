<?php
include "include/connect.php";
include "include/gensettings.php";

$id = $_GET['id'];
$sql = "SELECT * from card_cat WHERE id='$id'";
$result = mysql_query($sql, $connect);

while ($row = mysql_fetch_array($result)) {
    $id = $row['id'];
    $call_num = $row['call_num'];
    $call_num_br = $row['call_num_br'];
    $author = $row['author'];
    $coauthor = $row['coauthor'];
    $corp_author = $row['corp_author'];
    $title = $row['title'];
    $subject = $row['subject'];
    $isbn = $row['isbn'];
    $edition = $row['edition'];
    $place_pub = $row['place_pub'];
    $publisher = $row['publisher'];
    $location = $row['location'];
    $date_pub = $row['date_pub'];
    $collation = $row['collation'];
    $language = $row['language'];
    $pdf = $row['pdf'];
    $help = $row['help'];
    $front = $row['front'];
    $pdb = $row['pdb'];
    $qty = $row['qty'];

}
//echo $id;
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
<title>Book Details</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style></head>
<body OnLoad="document.myform.search.focus();">
<table width="100%" border="0" cellpadding="5" cellspacing="5">
  <tr>
    <td colspan="4"><strong>BOOK DETAILS: </strong></td>
  </tr>
  <tr>
    <td width="22%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="67%">&nbsp;</td>
    <td width="8%">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Author</td>
    <td>&nbsp;</td>
    <td><?php echo $author; ?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Title:</td>
    <td>&nbsp;</td>
    <td><?php echo '<b>' . $title . '</b>'; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Subject</td>
    <td>&nbsp;</td>
    <td><?php echo $subject; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Place of Publication </td>
    <td>&nbsp;</td>
    <td><?php echo $place_pub; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Publisher</td>
    <td>&nbsp;</td>
    <td><?php echo $publisher; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Date of publication </td>
    <td>&nbsp;</td>
    <td><?php echo $date_pub; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Classification</td>
    <td>&nbsp;</td>
    <td><?php echo $classification; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Description</td>
    <td>&nbsp;</td>
    <td><?php echo $description; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Notes</td>
    <td>&nbsp;</td>
    <td><?php echo $notes; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Quantity</td>
    <td>&nbsp;</td>
    <td><?php echo $qty; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><input name="button" type="button" onclick="javascript:window.close();" value="&nbsp;OK&nbsp;&nbsp;" class="btn"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>