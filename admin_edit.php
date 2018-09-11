<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}

$today = date("F j, Y, g:i a");
$user = $_SESSION['username'];

$blank = 1;

include "include/connect.php";
include "include/gensettings.php";
include "user.php";

$op = 1;
$id = $_GET['id'];
//authorized
if ($edit_book == "on") {
    $sql = "SELECT * FROM card_cat WHERE id='$id'";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....");
    while ($row = mysql_fetch_array($result)) {
        $front = $row["front"];
        $pdf = $row["pdf"];
        $help = $row["help"];
        $pdb = $row["pdb"];

        $id = $row['id'];
        $qty = $row['qty'];
        $location = $row['location'];
        $access_no = $row['access_no'];
        $call_num = $row['call_num'];
        $author = $row['author'];
        $other_author1 = $row['other_author1'];
        $other_author2 = $row['other_author2'];
        $other_author3 = $row['other_author3'];
        $other_author4 = $row['other_author4'];
        $title = $row['title'];
        $parallel_title = $row['parallel_title'];
        $oti = $row['oti'];
        $edition = $row['edition'];
        $gmd = $row['gmd'];
        $classification = $row['classification'];
        $place_pub = $row['place_pub'];
        $publisher = $row['publisher'];
        $date_pub = $row['date_pub'];
        $eoi = $row['eoi'];
        $opd = $row['opd'];
        $size_dimension = $row['size_dimension'];
        $series = $row['series'];
        $accom_mat = $row['accom_mat'];
        $notes = $row['notes'];
        $isbn = $row['isbn'];
        $subject1 = $row['subject1'];
        $subject2 = $row['subject2'];
        $subject3 = $row['subject3'];
        $subject4 = $row['subject4'];
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

        if ($classification == "book") {
            $selected1 = 'selected="selected"';
        }

        if ($classification == "mag") {
            $selected2 = 'selected="selected"';
        }

        if ($classification == "tape") {
            $selected3 = 'selected="selected"';
        }

        if ($classification == "cd") {
            $selected4 = 'selected="selected"';
        }
        if ($classification == "case") {
            $selected5 = 'selected="selected"';
        }
        if ($classification == "map") {
            $selected6 = 'selected="selected"';
        }
        if ($classification == "camera") {
            $selected7 = 'selected="selected"';
        }
    }
    if ($_POST['submit']) {

        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $location = $_POST['location'];
        $access_no = $_POST['access_no'];
        $call_num = $_POST['call_num'];
        $author = $_POST['author'];
        $other_author1 = $_POST['other_author1'];
        $other_author2 = $_POST['other_author2'];
        $other_author3 = $_POST['other_author3'];
        $other_author4 = $_POST['other_author4'];
        $title = $_POST['title'];
        $parallel_title = $_POST['parallel_title'];
        $oti = $_POST['oti'];
        $edition = $_POST['edition'];
        $gmd = $_POST['gmd'];
        $classification = $_POST['classification'];
        $place_pub = $_POST['place_pub'];
        $publisher = $_POST['publisher'];
        $date_pub = $_POST['date_pub'];
        $eoi = $_POST['eoi'];
        $opd = $_POST['opd'];
        $size_dimension = $_POST['size_dimension'];
        $series = $_POST['series'];
        $accom_mat = $_POST['accom_mat'];
        $notes = $_POST['notes'];
        $isbn = $_POST['isbn'];
        $subject1 = $_POST['subject1'];
        $subject2 = $_POST['subject2'];
        $subject3 = $_POST['subject3'];
        $subject4 = $_POST['subject4'];
        $source_of_fund = $_POST['source_of_fund'];
        $mode_of_ac = $_POST['mode_of_ac'];
        $mode_ac = $_POST['mode_ac'];
        $date_ac = $_POST['date_ac'];
        $property_no = $_POST['property_no'];
        $are = $_POST['are'];
        $verified_by = $_POST['verified_by'];

        if ($_SESSION["front"]) {
            $front = $_SESSION["front"];
        }

        if ($_SESSION["pdf"]) {
            $pdf = $_SESSION["pdf"];
        }

        if ($_SESSION["help"]) {
            $help = $_SESSION["help"];
        }

        if ($_SESSION["pdb"]) {
            $pdb = $_SESSION["pdb"];
        }

        session_unregister("front");
        session_unregister("pdf");
        session_unregister("help");
        session_unregister("pdb");

        if (($title == "") || ($author == "")) {
            $fielderror = "<strong><font color=red>Please fill the important fields!</font></strong>";
            $blank = 1;
        } else {

            $sql = "UPDATE card_cat set qty='$qty',location='$location',access_no='$access_no',call_num='$call_num',author='$author',
			other_author1='$other_author1',other_author2='$other_author2',other_author3='$other_author3',
			other_author4='$other_author4',title='$title',parallel_title='$parallel_title',oti='$oti',
			edition='$edition',gmd='$gmd',classification='$classification',place_pub='$place_pub',
			publisher='$publisher',date_pub='$date_pub',eoi='$eoi',opd='$opd',size_dimension='$size_dimension',
			series='$series',accom_mat='$accom_mat',notes='$notes',isbn='$isbn',subject1='$subject1',subject2='$subject2',
			subject3='$subject3',subject4='$subject4',source_of_fund='$source_of_fund',mode_of_ac='$mode_of_ac',mode_ac='$mode_ac',
			date_ac='$date_ac',property_no='$property_no',are='$are',encoded_by='$user',date_encode='$today',
			verified_by='$verified_by',date_verify='$today',front='$front',pdf='$pdf',help='$help',pdb='$pdb' WHERE id='$id'";
            $result = mysql_query($sql, $connect) or die("cant execute query!!!");
            $recordedit = "<strong><font color=red>The record  " . $title . " succesfully edited</font></strong>";
            $blank = "";
        }
    }
} else {
    $msg_mo = "You are not allowed to edit a book record!";
    $op = 2;}
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
<SCRIPT language=javascript>

function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
.style2 {	font-size: small;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body OnLoad="document.myform.search.focus();">
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo; ?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div>
</div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="home.php" id="current" title="Home">Home</a></li>
<li><a href="admin.php" title="Search">Search</a></li>
<li><a href="admin_add_new.php" title="Administrator">Add book</a></li>
<li><a href="barrower.php" title="Barrower">Borrower</a></li>
<li><a href="inventory.php" title="Inventory">Inventory</a></li>
<li><a href="settings.php" title="Settings">Settings</a></li>
<li><a href="help1.php" title="Help">Help</a></li>
<li><a href="logout.php" title="Logout">Logout</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2>Edit</h2><?php if ($op == 1) {?>
    <form id="form1" name="myform" method="post" action="admin_edit.php">
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td>
            <?php
if (($recordedit != "")) {
    echo '<img src="images/check1.png" width="50" height="45" />';
} else {
    echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
}
    ?>
            <?php echo $recordedit; ?>         </td>
        </tr>
        <tr>
          <td><label></label>
              <?php
if ($blank == 1) {
        ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="3">
                <tr>
                  <td height="30" align="right" class="style2">&nbsp;</td>
                  <td width="19%"><input type="button" name="submit2" value="Change File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
                  <td width="2%">&nbsp;</td>
                  <td colspan="2" align="right"><span class="logo"><?php echo $fielderror; ?></span></td>
                  <td width="3%">&nbsp;</td>
                  <td width="12%">&nbsp;</td>
                  <td width="18%">&nbsp;</td>
                </tr>
                <tr>
                  <td width="13%" height="30" align="right" class="style2">Location:</td>
                  <td><input name="location" type="text" class="dilaw" id="location" value="<?php echo $location; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td width="14%" align="right"><span class="style2">Place of Publication:</span></td>
                  <td width="19%"><input name="place_pub" type="text" class="dilaw" id="place_pub" value="<?php echo $place_pub; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">Source of Fund:</td>
                  <td><input name="source_of_fund" type="text" class="dilaw" id="source_of_fund" value="<?php echo $source_of_fund; ?>" size="30" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Accession no. </td>
                  <td><input name="access_no" type="text" class="dilaw" id="access_no" value="<?php echo $access_no; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Publisher:</span></td>
                  <td><input name="publisher" type="text" class="dilaw" id="publisher" value="<?php echo $publisher; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">Mode of Acquisition:</td>
                  <td><select name="mode_of_ac" id="mode_of_ac">
                      <option value="Purchase">Purchase</option>
                      <option value="Donation">Donation</option>
                      <option value="Exchange">Exchange</option>
                  </select>
                  <input name="mode_ac" type="text" class="dilaw" id="mode_ac" value="<?php echo $mode_ac; ?>" size="13" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Call Number:</td>
                  <td><input name="call_num" type="text" class="dilaw" id="call_num" value="<?php echo $call_num; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Year of Publication/Copyright date :</span></td>
                  <td><input name="date_pub" class="dilaw" value="<?php echo $date_pub; ?>" size="15" maxlength="5" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">Date Acquired:</td>
                  <td><input name="date_ac" type="text" class="dilaw" id="date_ac" value="<?php echo $date_ac; ?>" size="30" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Author</td>
                  <td><input name="author" type="text" class="dilaw" id="author" title='Name of the Author' value="<?php echo $author; ?>" size="30"/></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Extent of Item:</span></td>
                  <td><input name="eoi" type="text" class="dilaw" id="eoi" value="<?php echo $eoi; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">Property No:</td>
                  <td><input name="property_no" type="text" class="dilaw" id="property_no" value="<?php echo $property_no; ?>" size="30" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Other Author 1:</td>
                  <td><input name="other_author1" type="text" class="dilaw" id="other_author1" value="<?php echo $other_author1; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Other Physical Details:</span></td>
                  <td><input name="opd" type="text" class="dilaw" id="opd" value="<?php echo $opd; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">Acknowledgement Receipt Expense (ARE) Date</td>
                  <td><input name="are" type="text" class="dilaw" id="are" value="<?php echo $are; ?>" size="30" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">2:</td>
                  <td><input name="other_author2" type="text" class="dilaw" id="other_author2" value="<?php echo $other_author2; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Size/Dimesion:</span></td>
                  <td><input name="size_dimension" type="text" class="dilaw" id="size_dimension" value="<?php echo $size_dimension; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">Verified by:</td>
                  <td><input name="verified_by" type="text" class="dilaw" id="verified_by" value="<?php echo $verified_by; ?>" size="30" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">3:</td>
                  <td><input name="other_author3" type="text" class="dilaw" id="other_author3" value="<?php echo $other_author3; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Series:</span></td>
                  <td><input name="series" type="text" class="dilaw" id="series" value="<?php echo $series; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td><input name="date_modify" type="hidden" id="date_modify" value="<?php echo $today; ?>" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">4:</td>
                  <td><input name="other_author4" type="text" class="dilaw" id="other_author4" value="<?php echo $other_author4; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Accompanying Materials:</span></td>
                  <td><input name="accom_mat" type="text" class="dilaw" id="accom_mat" value="<?php echo $accom_mat; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Title:</td>
                  <td><input name="title" type="text" class="dilaw" id="title" title='Title of the book' value="<?php echo $title; ?>" size="30"/></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Notes:</span></td>
                  <td><input name="notes" type="text" class="dilaw" id="notes" value="<?php echo $notes; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Parallel Title: </td>
                  <td><input name="parallel_title" type="text" class="dilaw" id="parallel_title" title='Title of the book' value="<?php echo $parallel_title; ?>" size="30"/></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">ISBN/ISSN</span></td>
                  <td><input name="isbn" type="text" class="dilaw" id="isbn" value="<?php echo $isbn; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Other  Title Information: </td>
                  <td><input name="oti" type="text" class="dilaw" id="oti" title='Title of the book' value="<?php echo $oti; ?>" size="30"/></td>
                  <td>&nbsp;</td>
                  <td align="right"><span class="style2">Subject 1:</span></td>
                  <td><input name="subject1" type="text" class="dilaw" id="subject1" value="<?php echo $subject1; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Edition:</td>
                  <td><input name="edition" type="text" class="dilaw" id="edition" value="<?php echo $edition; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right">2:</td>
                  <td><input name="subject2" type="text" class="dilaw" id="subject2" value="<?php echo $subject2; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">General Material Designation:</td>
                  <td><input name="gmd" type="text" class="dilaw" id="gmd" value="<?php echo $gmd; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right">3:</td>
                  <td><input name="subject3" type="text" class="dilaw" id="subject3" value="<?php echo $subject3; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right" class="style2">Material type:</td>
                  <td><select name="classification" id="classification">
                      <option value="book" <?php echo $selected1; ?>>Book</option>
                      <option value="mag" <?php echo $selected2; ?>>Magazine</option>
                      <option value="tape" <?php echo $selected3; ?>>Tape</option>
                      <option value="cd" <?php echo $selected4; ?>>CD</option>
                      <option value="case" <?php echo $selected5; ?>>Case</option>
                      <option value="map" <?php echo $selected6; ?>>Map</option>
                      <option value="camera" <?php echo $selected7; ?>>Camera</option>
                    </select>                  </td>
                  <td>&nbsp;</td>
                  <td align="right">4:</td>
                  <td><input name="subject4" type="text" class="dilaw" id="subject4" value="<?php echo $subject4; ?>" size="30" /></td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="right">&nbsp;</td>
                  <td><input name="submit" type="submit" class="btn" id="submit" value="Update" /></td>
                  <td>&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td align="right" class="style2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2"><span class="footer1">
                    <?php
if (($recordedit != "")) {
            echo '<img src="images/check1.png" width="50" height="45" />';
        } else {
            echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
        }
        ?>
                    <?php echo $recordedit; ?></span></td>
                  <td align="right">&nbsp;</td>
                  <td><input name="front" type="hidden" id="front"
			  value="<?php echo $front; ?>"/>
                    <input name="help" type="hidden" id="help"
			  value="<?php echo $help; ?>"/>
                    <input name="pdf" type="hidden" id="pdf"
			  value="<?php echo $pdf; ?>"/>
                    <input name="pdb" type="hidden" id="front2"
			  value="<?php echo $pdb; ?>"/>
                    <input name="id" type="hidden" id="id"
			  value="<?php echo $id; ?>"/>                 <input name="qty" type="hidden" id="front3"
			  value="<?php echo $qty; ?>"/></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <?php
}?>
          </td>
        </tr>
      </table>
    </form><?php }?>
	<?php if ($op == 2) {
    ?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td align="right"><a href="home.php">back to Home Page</a></td>
        <td colspan="2" align="left"><?php echo $msg_mo; ?></td>
        <td align="center">&nbsp;</td>

      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
	<?php }?>


  </div>
</div>
<div class="lowercontent"></div>
<div class="footer1">
<table align="center">
<tr>
<td><img src="logo/anilag systems logo 300x155 trnsparent.png" /></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><img src="images/isch.gif" width="200" height="70"/></td>
</tr>
</table></div>
<div class="footer">
<?php echo $system_title; ?><br />
<?php echo $footer; ?>
</div>
</body>
</html>