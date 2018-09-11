<?php 

include("include/connect.php");
include("include/gensettings.php");

$id= $_GET['id'];

$sql="SELECT * from card_cat where id='$id'";
$result=mysql_query($sql,$connect) or die("cant execute query!z");
while($row=mysql_fetch_array($result)) {
		
		$front			=$row["front"];
					$pdf			=$row["pdf"];
					$help			=$row["help"];
					$pdb			=$row["pdb"];
					$id        	    =$row['id'];
					$qty			=$row['qty'];
					$location		=$row['location'];
					$access_no		=$row['access_no'];
					$call_num		=$row['call_num'];
					$author			=$row['author'];
					$other_author1	=$row['other_author1'];
					$other_author2	=$row['other_author2'];
					$other_author3	=$row['other_author3'];
					$other_author4	=$row['other_author4'];
					$other_author5	=$row['other_author5'];
					$other_author6	=$row['other_author6'];
					$other_author7	=$row['other_author7'];
					$other_author8	=$row['other_author8'];
					$other_author9	=$row['other_author9'];
					$other_author10	=$row['other_author10'];
					$title			=$row['title'];
					$parallel_title	=$row['parallel_title'];
					$oti			=$row['oti'];
					$edition		=$row['edition'];
					$gmd			=$row['gmd'];
					$classification	=$row['classification'];
					$place_pub		=$row['place_pub'];
					$publisher		=$row['publisher'];
					$date_pub		=$row['date_pub'];
					$eoi			=$row['eoi'];
					$opd			=$row['opd'];
					$size_dimension	=$row['size_dimension'];
					$series			=$row['series'];
					$accom_mat		=$row['accom_mat'];
					$notes			=$row['notes'];
					$isbn			=$row['isbn'];
					$subject1		=$row['subject1'];
					$subject2		=$row['subject2'];
					$subject3		=$row['subject3'];
					$subject4		=$row['subject4'];
					$subject5		=$row['subject5'];
					$subject6		=$row['subject6'];
					$subject7		=$row['subject7'];
					$subject8		=$row['subject8'];
					$subject9		=$row['subject9'];
					$subject10		=$row['subject10'];
					$source_of_fund	=$row['source_of_fund'];
					$mode_of_ac		=$row['mode_of_ac'];
					$date_ac		=$row['date_ac'];
					$property_no	=$row['property_no'];
					$are			=$row['are'];
					$date_verify	=$row['date_verify'];
					$date_encode	=$row['date_encode'];
					$encoded_by		=$row['encoded_by'];
					$verified_by	=$row['verified_by'];
		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title."--".$footer;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
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
    <td width="286" bgcolor="#CCCCCC"><strong><font color="#FF0000"><?php echo $access_no;?></font></strong></td>
    <td width="471" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Source of Fund:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $source_of_fund;?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Mode of Acquisition:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $mode_of_ac;?>(<?php echo $mode_ac;?>)</td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Date Acquired:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $date_ac;?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Property No:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $property_no;?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Acknowledgement Receipt Expense (ARE) Date:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $are;?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Other Authors:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $other_author1;?>,<?php echo $other_author2;?>,<?php echo $other_author3;?>,<?php echo $other_author4;?><?php echo $other_author5;?>,<?php echo $other_author6;?>,<?php echo $other_author7;?>,<?php echo $other_author8;?>,<?php echo $other_author9;?>,<?php echo $other_author10;?></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Parallel Title:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $parallel_title;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Other Title Information:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $oti;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Edition:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $edition;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>General Material Designation:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $gmd;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Material type:</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $classification;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Place of Publication:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Publisher:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Year of Publication/Copyright Date:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Extent of Item:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Other Physical Details:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Size or Dimesion:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Series:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Accompanying Materials:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Notes:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>ISBN/ISSN:</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><strong>Subject(s)</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $subject1;?>,<?php echo $subject2;?>,<?php echo $subject3;?>,<?php echo $subject4;?><?php echo $subject5;?>,<?php echo $subject6;?>,<?php echo $subject7;?>,<?php echo $subject8;?>,<?php echo $subject9;?>,<?php echo $subject10;?></td>
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