<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}

$today = date("F j, Y, g:i a");
$user = $_SESSION['username'];

include "include/connect.php";
include "include/gensettings.php";
include "user.php";
$sname = $_POST['sname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$author = $fname . '  ' . $mname{0} . '.' . ' ' . $sname;
$_SESSION[author] = $author;
$title = $_POST['title'];
$access_num = $_POST['access_num'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$status = $_POST['status'];

//if form submit
if ($_POST['submit']) {
    $front = $_SESSION["front"];
    $pdf = $_SESSION["pdf"];
    $help = $_SESSION["help"];
    $pdb = $_SESSION["pdb"];
    session_unregister("front");
    session_unregister("pdf");
    session_unregister("help");
    session_unregister("pdb");
    $school_code = $_POST['school_code'];
    $location = $_POST['location'];
    $access_num = $_POST['access_no'];
    $call_num = $_POST['call_num'];
    $author = $_POST['author'];
//    $_SESSION[author] =$_POST['author'];

    $other_author1_sname = $_POST['other_author1_sname'];
    $other_author1_fname = $_POST['other_author1_fname'];
    $other_author1_mname = $_POST['other_author1_mname'];

    $other_author1 = $other_author1_sname . ' ' . $other_author1_fname . ' ' . $other_author1_mname;

    $other_author2_sname = $_POST['other_author2_sname'];
    $other_author2_fname = $_POST['other_author2_fname'];
    $other_author2_mname = $_POST['other_author2_mname'];

    $other_author2 = $other_author2_sname . ' ' . $other_author2_fname . ' ' . $other_author2_mname;

    $other_author3_sname = $_POST['other_author3_sname'];
    $other_author3_fname = $_POST['other_author3_fname'];
    $other_author3_mname = $_POST['other_author3_mname'];

    $other_author3 = $other_author3_sname . ' ' . $other_author3_fname . ' ' . $other_author3_mname;

    $other_author4_sname = $_POST['other_author4_sname'];
    $other_author4_fname = $_POST['other_author4_fname'];
    $other_author4_mname = $_POST['other_author4_mname'];

    $other_author4 = $other_author4_sname . ' ' . $other_author4_fname . ' ' . $other_author4_mname;

    $other_author5_sname = $_POST['other_author5_sname'];
    $other_author5_fname = $_POST['other_author5_fname'];
    $other_author5_mname = $_POST['other_author5_mname'];

    $other_author5 = $other_author5_sname . ' ' . $other_author5_fname . ' ' . $other_author5_mname;

    $other_author6_sname = $_POST['other_author6_sname'];
    $other_author6_fname = $_POST['other_author6_fname'];
    $other_author6_mname = $_POST['other_author6_mname'];

    $other_author6 = $other_author6_sname . ' ' . $other_author6_fname . ' ' . $other_author6_mname;

    $other_author7_sname = $_POST['other_author7_sname'];
    $other_author7_fname = $_POST['other_author7_fname'];
    $other_author7_mname = $_POST['other_author7_mname'];

    $other_author7 = $other_author7_sname . ' ' . $other_author7_fname . ' ' . $other_author7_mname;

    $title = $_POST['title'];
    $parallel_title = $_POST['parallel_title'];
    $oti = $_POST['oti'];
    $uti = $_POST['uti'];
    $edition = $_POST['edition'];
    $gmd = $_POST['classification'];
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
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    $subject7 = $_POST['subject7'];
    $source_of_fund = $_POST['source_of_fund'];
    $mode_ac = $_POST['mode_ac'];
    $mode_of_ac = $_POST['mode_of_ac'];
    $date_ac = $_POST['date_ac'];
    $property_no = $_POST['property_no'];
    $are = $_POST['are'];
    $verified_by = $_POST['verified_by'];
    $status = "in";

    //if some field is blank
    if ($access_num == "") {
        $fielderror = "<strong><font color=red>Please fill the important fields!</font></strong>";
    } else {

        //add to card_catalog table
        $sql = "INSERT INTO card_cat
			(qty,school_code,location,access_no,call_num,author,
			other_author1,other_author2,other_author3,
			other_author4,other_author5,other_author6,
			other_author7,title,parallel_title,oti,uti,
			edition,gmd,classification,place_pub,
			publisher,date_pub,eoi,opd,size_dimension,
			series,accom_mat,notes,isbn,subject1,subject2,
			subject3,subject4,subject5,subject6,subject7,			source_of_fund,mode_of_ac,mode_ac,
			date_ac,property_no,are,encoded_by,date_encode,
			verified_by,date_verify,front,pdf,help,pdb,status1)

		    VALUES(
			1,'$school_code','$location','$access_no','$call_num','$author',
			'$other_author1','$other_author2','$other_author3',
			'$other_author4','$other_author5','$other_author6',
			'$other_author7','$title','$parallel_title','$oti','$uti',
			'$edition','$gmd','$classification','$place_pub',
			'$publisher','$date_pub','$eoi','$opd','$size_dimension',
			'$series','$accom_mat','$notes','$isbn','$subject1','$subject2',
			'$subject3','$subject4','$subject5','$subject6','$subject7',
			'$source_of_fund','$mode_of_ac','$mode_ac',
			'$date_ac','$property_no','$are','$user','$today',
			'$verified_by','$today','$front','$pdf','$help','$pdb','$status'
			)";

        $result = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
        $op = 1;

    }
}

//if submit2 button is ppressed
if ($_POST['submit2']) {
    $front = $_SESSION["front"];
    $pdf = $_SESSION["pdf"];
    $help = $_SESSION["help"];
    $pdb = $_SESSION["pdb"];
    session_unregister("front");
    session_unregister("pdf");
    session_unregister("help");
    session_unregister("pdb");
    $school_code = $_POST['school_code'];
    $location = $_POST['location'];
    $access_num = $_POST['access_no'];
    $call_num = $_POST['call_num'];
    $author = $_POST['author'];
//    $_SESSION[author] =$_POST['author'];

    $other_author1 = $_POST['other_author1'];
    $other_author2 = $_POST['other_author2'];
    $other_author3 = $_POST['other_author3'];
    $other_author4 = $_POST['other_author4'];
    $other_author5 = $_POST['other_author5'];
    $other_author6 = $_POST['other_author6'];
    $other_author7 = $_POST['other_author7'];
/*
$other_author2_sname = $_POST['other_author2_sname'];
$other_author2_fname = $_POST['other_author2_fname'];
$other_author2_mname = $_POST['other_author2_mname'];

$other_author2    = $other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname;

$other_author3_sname = $_POST['other_author3_sname'];
$other_author3_fname = $_POST['other_author3_fname'];
$other_author3_mname = $_POST['other_author3_mname'];

$other_author3    = $other_author3_sname.' '.$other_author3_fname.' '.$other_author3_mname;

$other_author4_sname = $_POST['other_author4_sname'];
$other_author4_fname = $_POST['other_author4_fname'];
$other_author4_mname = $_POST['other_author4_mname'];

$other_author4    = $other_author4_sname.' '.$other_author4_fname.' '.$other_author4_mname;

$other_author5_sname = $_POST['other_author5_sname'];
$other_author5_fname = $_POST['other_author5_fname'];
$other_author5_mname = $_POST['other_author5_mname'];

$other_author5    = $other_author5_sname.' '.$other_author5_fname.' '.$other_author5_mname;

$other_author6_sname = $_POST['other_author6_sname'];
$other_author6_fname = $_POST['other_author6_fname'];
$other_author6_mname = $_POST['other_author6_mname'];

$other_author6    = $other_author6_sname.' '.$other_author6_fname.' '.$other_author6_mname;

$other_author7_sname = $_POST['other_author7_sname'];
$other_author7_fname = $_POST['other_author7_fname'];
$other_author7_mname = $_POST['other_author7_mname'];

$other_author7    = $other_author7_sname.' '.$other_author7_fname.' '.$other_author7_mname;
 */
    $title = $_POST['title'];
    $parallel_title = $_POST['parallel_title'];
    $oti = $_POST['oti'];
    $uti = $_POST['uti'];
    $edition = $_POST['edition'];
    $gmd = $_POST['classification'];
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
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    $subject7 = $_POST['subject7'];
    $source_of_fund = $_POST['source_of_fund'];
    $mode_ac = $_POST['mode_ac'];
    $mode_of_ac = $_POST['mode_of_ac'];
    $date_ac = $_POST['date_ac'];
    $property_no = $_POST['property_no'];
    $are = $_POST['are'];
    $verified_by = $_POST['verified_by'];
    $status = "in";

    //if some field is blank
    if ($access_num == "") {
        $fielderror = "<strong><font color=red>Please fill the important fields!</font></strong>";
    } else {

        //add to card_catalog table
        $sql = "INSERT INTO card_cat
			(qty,school_code,location,access_no,call_num,author,
			other_author1,other_author2,other_author3,
			other_author4,other_author5,other_author6,
			other_author7,title,parallel_title,oti,uti,
			edition,gmd,classification,place_pub,
			publisher,date_pub,eoi,opd,size_dimension,
			series,accom_mat,notes,isbn,subject1,subject2,
			subject3,subject4,subject5,subject6,subject7,			source_of_fund,mode_of_ac,mode_ac,
			date_ac,property_no,are,encoded_by,date_encode,
			verified_by,date_verify,front,pdf,help,pdb,status1)

		    VALUES(
			1,'$school_code','$location','$access_no','$call_num','$author',
			'$other_author1','$other_author2','$other_author3',
			'$other_author4','$other_author5','$other_author6',
			'$other_author7','$title','$parallel_title','$oti','$uti',
			'$edition','$gmd','$classification','$place_pub',
			'$publisher','$date_pub','$eoi','$opd','$size_dimension',
			'$series','$accom_mat','$notes','$isbn','$subject1','$subject2',
			'$subject3','$subject4','$subject5','$subject6','$subject7',
			'$source_of_fund','$mode_of_ac','$mode_ac',
			'$date_ac','$property_no','$are','$user','$today',
			'$verified_by','$today','$front','$pdf','$help','$pdb','$status'
			)";

        $result = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
        $op = 1;

    }
}

//if add_copy button is clicked
if ($_POST['add_copy']) {
    $front = $_SESSION["front"];
    $pdf = $_SESSION["pdf"];
    $help = $_SESSION["help"];
    $pdb = $_SESSION["pdb"];
    session_unregister("front");
    session_unregister("pdf");
    session_unregister("help");
    session_unregister("pdb");
    $school_code = $_POST['school_code'];
    $location = $_POST['location'];
    $access_num = $_POST['access_no'];
    $call_num = $_POST['call_num'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $parallel_title = $_POST['parallel_title'];
    $oti = $_POST['oti'];
    $uti = $_POST['uti'];
    $edition = $_POST['edition'];
    $gmd = $_POST['classification'];
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
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    $subject7 = $_POST['subject7'];
    $source_of_fund = $_POST['source_of_fund'];
    $mode_ac = $_POST['mode_ac'];
    $mode_of_ac = $_POST['mode_of_ac'];
    $date_ac = $_POST['date_ac'];
    $property_no = $_POST['property_no'];
    $are = $_POST['are'];
    $verified_by = $_POST['verified_by'];
    $status = "in";

    //$other_author1_sname = $_POST['other_author1_sname'];
    //$other_author1_fname = $_POST['other_author1_fname'];
    //$other_author1_mname = $_POST['other_author1_mname'];

    //$other_author1    = $other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname;
    $other_author1 = $_POST['other_author1'];

//    $other_author2_sname = $_POST['other_author2_sname'];
    //$other_author2_fname = $_POST['other_author2_fname'];
    //$other_author2_mname = $_POST['other_author2_mname'];

    //$other_author2    = $other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname;

//    $other_author3_sname = $_POST['other_author3_sname'];
    //    $other_author3_fname = $_POST['other_author3_fname'];
    //    $other_author3_mname = $_POST['other_author3_mname'];

//    $other_author3    = $other_author3_sname.' '.$other_author3_fname.' '.$other_author3_mname;

    //$other_author4_sname = $_POST['other_author4_sname'];
    //$other_author4_fname = $_POST['other_author4_fname'];
    //$other_author4_mname = $_POST['other_author4_mname'];

//    $other_author4    = $other_author4_sname.' '.$other_author4_fname.' '.$other_author4_mname;

//    $other_author5_sname = $_POST['other_author5_sname'];
    //    $other_author5_fname = $_POST['other_author5_fname'];
    //    $other_author5_mname = $_POST['other_author5_mname'];

//    $other_author5    = $other_author5_sname.' '.$other_author5_fname.' '.$other_author5_mname;

//    $other_author6_sname = $_POST['other_author6_sname'];
    //    $other_author6_fname = $_POST['other_author6_fname'];
    //    $other_author6_mname = $_POST['other_author6_mname'];

/*    $other_author6    = $other_author6_sname.' '.$other_author6_fname.' '.$other_author6_mname;

$other_author7_sname = $_POST['other_author7_sname'];
$other_author7_fname = $_POST['other_author7_fname'];
$other_author7_mname = $_POST['other_author7_mname'];

$other_author7    = $other_author7_sname.' '.$other_author7_fname.' '.$other_author7_mname;
 */
    $op = 2;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>

<SCRIPT language=javascript>

function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>
<script>
  var numLinesAdded = 3;

  function focusNext(tBox){
    var name = tBox.name;
    var index = name.substring(name.indexOf('_')+1);
    var brother = eval("document.all.txt2_" + index);
    var l = tBox.value.length;
    if (l >= tBox.maxLength){
      brother.focus();
    }
  }

	function generateRow() {
	var d=document.getElementById("div");

		if(numLinesAdded<=7){
	d.innerHTML+="Author" +numLinesAdded+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname"+ "<input type='text' size='20' name='other_author" + numLinesAdded + "_sname"+"' onkeypress='focusNext(this)' class='dilaw'>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name"+ "<input type='text' size='20' name='other_author" + numLinesAdded + "_fname"+"' onkeypress='focusNext(this)' class='dilaw'>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name"+ "<input type='text' size='20' name='other_author" + numLinesAdded + "_mname"+"' onkeypress='focusNext(this)' class='dilaw'><br>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;

		}
	numLinesAdded++;
	}
</script>
<script>
  var numLinesAdd = 3;

  function focusNext(tBox){
    var name = tBox.name;
    var index = name.substring(name.indexOf('_')+1);
    var brother = eval("document.all.txt2_" + index);
    var l = tBox.value.length;
    if (l >= tBox.maxLength){
      brother.focus();
    }
  }

	function generateRow1() {
	var d=document.getElementById("div1");

		if(numLinesAdd<=7){
	d.innerHTML+="Sub"+ numLinesAdd +"<input type='text' size='20' name='subject" + numLinesAdd + "' onkeypress='focusNext(this)' class='dilaw'><BR>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
		}
	numLinesAdd++;
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
.style2 {
	font-size: small;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body >
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo; ?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div></div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="home.php" id="current" title="Home">Home</a></li>
<li><a href="admin.php" title="Search">Search</a></li>
<li><a href="admin_add_new.php" title="Add book">Add book</a></li>
<li><a href="barrower.php" title="Borrower">Borrower</a></li>
<li><a href="inventory.php" title="Inventory">Inventory</a></li>
<li><a href="settings.php" title="Settings">Settings</a></li>
<li><a href="help1.php" title="Help">Help</a></li>
<li><a href="logout.php" title="Logout">Logout</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2>Add book </h2>
	<?php if ($op == "") {?>
    <form id="form1" name="myform" method="post" action="book_profile.php">
      <table width="100%" border="0" cellpadding="0" cellspacing="3">
        <tr>
          <td height="30" align="right" class="style2">&nbsp;</td>
          <td width="22%"><input type="button" name="submit2" value="Attach File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
          <td width="1%">&nbsp;</td>
          <td colspan="2" align="right"><span class="logo"><?php echo $fielderror; ?></span></td>
          <td width="0%">&nbsp;</td>
          <td width="13%">&nbsp;</td>
          <td width="20%">&nbsp;</td>
        </tr>
        <tr>
          <td width="10%" height="30" align="right" class="style2">School Code:</td>
          <td><select name="school_code" id="school_code">
           <?php
$i = 0;
    $sql = "SELECT school_code from school";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $school_code = $row['school_code'];
        ?>
			<option><?php echo $school_code; ?></option>
<?php $i++;}?>
</select>  </td>
          <td>&nbsp;</td>
          <td width="14%" align="right"><span class="style2">Book Shelf/Storage Room :</span></td>
          <td width="20%"><input name="location" type="text" class="dilaw" id="location" size="30" value="<?php echo $location; ?>"/></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">*Mode of Acquisition:</td>
          <td><select name="mode_of_ac" id="mode_of_ac" >
            <option value="Purchase">Purchase</option>
            <option value="Donation">Donation</option>
            <option value="Exchange">Exchange</option>
          </select>
          <input name="mode_ac" type="text" class="dilaw" id="mode_ac" size="13" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2">Accession no. </td>
          <td><input   name="access_no" type="text" class="dilaw" id="access_no" size="30" value="<?php echo $access_num; ?>" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Publisher:</span></td>
          <td><input name="publisher" type="text" class="dilaw" id="publisher" size="30" value="<?php echo $publisher; ?>"/></td>
       <td></td>
	    <td width="13%" align="right"><span class="style2">Place of Publication:</span></td>
          <td width="20%"><input name="place_pub" type="text" class="dilaw" id="place_pub" size="30" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2">Call Number:</td>
          <td><input name="call_num" type="text" class="dilaw" id="call_num" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Year of Publication/Copyright date :</span></td>
          <td><input name="date_pub" class="dilaw" size="20" maxlength="5" id="date_pub" /></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">Date Acquired:</td>
          <td><input name="date_ac" type="text" class="dilaw" id="date_ac" size="30" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2">Main Author</td>
          <td><input name="author" type="text" class="dilaw" id="author" size="30" title='Name of the Author' value="<?php echo $author; ?>" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Extent of Item:</span></td>
          <td><input name="eoi" type="text" class="dilaw" id="eoi" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">Property No:</td>
          <td><input name="property_no" type="text" class="dilaw" id="property_no" size="30" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2">Author1 Surname:</td>
          <td><input name="other_author1_sname" type="text" class="dilaw" id="other_author1_sname" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Other Physical Details:</span></td>
          <td><input name="opd" type="text" class="dilaw" id="opd" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">Acknowledgement Receipt Expense (ARE) Date</td>
          <td><input name="are" type="text" class="dilaw" id="are" size="30" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2"> Author1 FirstName:</td>
          <td><input name="other_author1_fname" type="text" class="dilaw" id="other_author1_fname" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Size/Dimesion:</span></td>
          <td><input name="size_dimension" type="text" class="dilaw" id="size_dimension" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">Verified by:</td>
          <td><input name="verified_by" type="text" class="dilaw" id="verified_by" size="30" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2"> Author1 MiddleName</td>
          <td><input name="other_author1_mname" type="text" class="dilaw" id="other_author1_mname" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Series, Volume, No:</span></td>
          <td><input name="series" type="text" class="dilaw" id="series" size="30" /></td>
          <td>&nbsp;</td>
           <td align="right" class="style2">Source of Fund:</td>
          <td><input name="source_of_fund" type="text" class="dilaw" id="source_of_fund" size="30" /></td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2"> Author2 Surname</td>
          <td><input name="other_author2_sname" type="text" class="dilaw" id="other_author2_sname" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Accompanying Materials:</span></td>
          <td><input name="accom_mat" type="text" class="dilaw" id="accom_mat" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">&nbsp;</td>
          <td>if Donation put the donor.</td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2">Author2 First Name</td>
          <td><input name="other_author2_fname" type="text" class="dilaw" id="other_author2_fname" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">Notes:</span></td>
          <td><textarea name="notes"  class="dilaw" id="notes"  cols="22"></textarea></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">* in the Mode of Acquisition</td>
          <td>if Exchange put the changer.</td>
        </tr>
        <tr>
          <td height="30" align="right" class="style2">Author2 MiddleName</td>
          <td><input name="other_author2_mname" type="text" class="dilaw" id="other_author2_mname" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right"><span class="style2">ISBN/ISSN</span></td>
          <td><input name="isbn" type="text" class="dilaw" id="isbn" size="30" /></td>
          <td>&nbsp;</td>
          <td align="right" class="style2"></td>
          <td><span class="style2">if Purchase put the price</span></td>
        </tr>
        <tr>

           <td height="30" align="right" class="style2"><input name="button" type="button" onclick="generateRow()" value="Add author.." class="btn"/></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>
 <td>&nbsp;</td>
        </tr>
		 <tr>
          <td  align="left" colspan="8"><div id="div"></div></td>
        </tr>
		<tr>
         <td align="right"><input name="button2" type="button" class="btn" onclick="generateRow1()" value="Add subject.."/></td>
          <td align="left">Sub1
          <input name="subject1" type="text" class="dilaw" id="subject1" size="20"  value="<?php echo $subject1; ?>" /></td>

          <td>&nbsp;</td>
          <td height="30" align="right" class="style2">Title Proper:</td>
          <td><input name="title" type="text" class="dilaw" id="title" size="30" title='Title of the book' value="<?php echo $title; ?>"/></td>
          <td>&nbsp;</td>
         <td></td>
		 <td></td>
        </tr>

<tr>
          <td align="right">&nbsp;</td>
          <td align="left">Sub2
          <input name="subject2" type="text" class="dilaw" id="subject2" size="20" value="<?php echo $subject2; ?>"/></td>

          <td>&nbsp;</td>
          <td height="30" align="right" class="style2">Parallel Title: </td>
          <td><input name="parallel_title" type="text" class="dilaw" id="parallel_title" size="30" title='Title of the book'/></td>
		   <td>&nbsp;</td>
           <td></td>
          <td>&nbsp;</td>
        </tr>

        <tr>
         <td align="right"></td>
		  <td><div id="div1"></div></td>
		  <td></td>

         		  <td height="30" align="right" class="style2">  Other Title Information:<br>Uniform Title Information:<br>
	      Edition<BR>General Material Designation </td>
          <td><input name="oti" type="text" class="dilaw" id="oti" size="30" title='Title of the book'/><br><input name="uti" type="text" class="dilaw" id="uti" size="30" title='UniformTitle of the book'/><br><input name="edition" type="text" class="dilaw" id="edition" size="30" /><br>
            <select name="classification" id="classification">
           <?php
$i = 0;
    $sql = "SELECT mat_type from material_type";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $classification = $row['mat_type'];

        ?>
			<option><?php echo $classification; ?></option>
<?php $i++;}?>
</select>
          <td></td>
		  <td></td>
		  <td></td>
        </tr>
        <tr>
         		 <td height="30" align="left" class="style2"><input name="submit" type="submit" class="btn" id="submit" value="  Add  " /></td>
                 <td class="style2">
                                    </td>


          <td>&nbsp;</td>
           <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>

		 <td>&nbsp;</td>

          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

		<tr>
        <td></td>
		<td></td>
          <td>&nbsp;</td>
                  <td></td>
				  <td></td>
		  <td>&nbsp;</td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
           <td>&nbsp;</td>

		   <td>&nbsp;</td>
          <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <td>&nbsp;</td>
		<td>&nbsp;</td>


          <td>&nbsp;</td>
           <td>&nbsp;</td>
          <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td></td><td></td>

          <td>&nbsp;</td>
          <td align="right"></td>
          <td></td>
          <td>&nbsp;</td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30" align="right">&nbsp;</td>
          <td>&nbsp;</td>
		   <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><?php
if (($recordadded != "")) {
        echo '<img src="images/check1.png" width="50" height="45" />';
    } else {
        echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
    }
    ?>
              <?php echo $recordadded; ?></td>
          <td align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
        </tr>
      </table>
    </form>
	<?php }?>
	<?php if ($op == 1) {?>
	 <form id="form1" name="myform" method="post" action="book_profile.php">
	<table width="117%" border="0" cellpadding="0" cellspacing="3">
      <tr>
        <td height="30" align="right" class="style2"><a href="admin_add_new.php">back</a></td>
        <td width="19%">New Record added! </td>
        <td width="2%">&nbsp;</td>
        <td colspan="2" align="right">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="12%">&nbsp;</td>
        <td width="18%">&nbsp;</td>
      </tr>
      <tr>
        <td width="13%" height="30" align="right" class="style2">School Code:</td>
        <td><input type="text" name="school_code" value="<?php echo $school_code; ?>"/></td>
        <td>&nbsp;</td>
        <td width="14%" align="right"><span class="style2">Book Shelf/torage Room:</span></td>
        <td width="19%"><input type="text" name="location" value="<?php echo $location; ?>"/></td>
        <td>&nbsp;</td>
     <td align="right" class="style2">Mode of Acquisition:</td>
        <td><input type="text" name="mode_of_ac"  id="mode_of_ac" value="<?php echo $mode_of_ac; ?>" size="13"/>
		 <input name="mode_ac" type="text" class="dilaw" id="mode_ac" size="13" value="<?php echo $mode_ac; ?>"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Accession no. </td>
        <td><input type="text" name="access_no" value="<?php echo $access_num; ?>"/></strong></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Publisher:</span></td>
        <td><input type="text" name="publisher" value="<?php echo $publisher; ?>"/></td>
        <td>&nbsp;</td>

	    <td width="13%" align="right"><span class="style2">Place of Publication:</span></td>
          <td width="20%"><input name="place_pub" type="text" class="dilaw" id="place_pub" size="30"  value="<?php echo $place_pub; ?>"/></td>
	    </tr>
      <tr>
        <td height="30" align="right" class="style2">Call Number:</td>
        <td><input type="text" name="call_num"  id= "call_num" value="<?php echo $call_num; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Year of Publication/Copyright date :</span></td>
        <td><input type="text" name="date_pub" id="date_pub" value="<?php echo $date_pub; ?>" size="20"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Date Acquired:</td>
        <td><input type="text" name="date_ac" id="date_ac" value="<?php echo $date_ac; ?>"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Main Author</td>
        <td><input type="text" name="author" id="author" value="<?php echo $author; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Extent of Item:</span></td>
        <td><input type="text" name="eoi" value="<?php echo $eoi; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Property No:</td>
        <td><input type="text" name="property_no" value="<?php echo $property_no; ?>"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Other Author 1:</td>
        <td><input type="text" name="other_author1" value="<?php echo $other_author1; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Other Physical Details:</span></td>
        <td><input type="text" name="opd" value="<?php echo $opd; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Acknowledgement Receipt Expense (ARE) Date</td>
        <td><input type="text" name="are" value="<?php echo $are; ?>"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">2:</td>
        <td><input type="text" name="other_author2" value="<?php echo $other_author2; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Size/Dimesion:</span></td>
        <td><input type="text" name="size_dimension" value="<?php echo $size_dimension; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Verified by:</td>
        <td><input type="text" name="verified_by" value="<?php echo $verified_by; ?>"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">3:</td>
        <td><input type="text" name="other_author3" value="<?php echo $other_author3; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Series, Volume, No:</span></td>
        <td><input type="text" name="series" value="<?php echo $series; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Source of Fund:</td>
        <td><input type="text" name="source_of_fund" value="<?php echo $source_of_fund; ?>"/></td>

      </tr>
      <tr>
        <td height="30" align="right" class="style2">4:</td>
        <td><input type="text" name="other_author4" value="<?php echo $other_author4; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Accompanying Materials:</span></td>
        <td><input type="text" name="accom_mat" value="<?php echo $accom_mat; ?>"/></td>
        <td>&nbsp;</td>
       <td height="30" align="right" class="style2">Edition:</td>
        <td><input type="text" name="edition" value="<?php echo $edition; ?>"/></td>

      </tr>
      <tr>
        <td height="30" align="right" class="style2">5</td>
      <td><input type="text" name="other_author5" value="<?php echo $other_author5; ?>"/></td>
	   <td>&nbsp;</td>
        <td align="right"><span class="style2">Subject 1:</span></td>
        <td><input type="text" name="subject1" value="<?php echo $subject1; ?>"/></td>
         <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	   <tr>
        <td height="30" align="right" class="style2">6</td>
        <td><input type="text" name="other_author6" value="<?php echo $other_author6; ?>"/></td>
        <td>&nbsp;</td>
         <td align="right"><span class="style2">Subject 2:</span></td>
        <td><input type="text" name="subject2" value="<?php echo $subject2; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="30" align="right" class="style2">7</td>
        <td><input type="text" name="other_author7" value="<?php echo $other_author7; ?>"/></td>
        <td>&nbsp;</td>
 <td align="right"><span class="style2">Subject 3:</span></td>
        <td><input type="text" name="subject3" value="<?php echo $subject3; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="30" align="right" class="style2">Title Proper:</td>
        <td><input type="text" name="title" id="title" size="30"value="<?php echo $title; ?>"/></td>
        <td>&nbsp;</td>
       <td align="right">Subject 4:</td>
        <td><input type="text" name="subject4" value="<?php echo $subject4; ?>"/></td>

	    <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Parallel Title: </td>
        <td><input type="text" name="parallel_title" value="<?php echo $parallel_title; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right">Subject 5</td>
        <td><input type="text" name="subject5" value="<?php echo $subject5; ?>"/></td>

	    <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Other  Title Information: </td>
        <td><input type="text" name="oti" value="<?php echo $oti; ?>"/></td>
        <td>&nbsp;</td>
       <td align="right">Subject 6</td>
        <td><input type="text" name="subject6" value="<?php echo $subject6; ?>"/></td>

	   <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Uniform Title Information</td>
        <td><input type="text" name="uti" value="<?php echo $uti; ?>"/></td>
        <td>&nbsp;</td>
         <td align="right">Subject 7</td>
        <td><input type="text" name="subject7" value="<?php echo $subject7; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">General Material Designation:</td>
        <td><input type="text" name="gmd" value="<?php echo $gmd; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Notes:</span></td>
        <td><input type="text" name="notes" value="<?php echo $notes; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Material type:</td>
        <td><input type="text" name="classification" value="<?php echo $classification; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">ISBN/ISSN</span></td>
        <td><input type="text" name="isbn" value="<?php echo $isbn; ?>"/></td>
       <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="submit"  class="btn" name="add_copy" value="Add Copy" /></td>
        <td colspan="2"><input type="submit"  onClick="document.myform.action ='admin_add_new.php';"class="btn" name="add_new" value="Add New" /></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>
	<?php }?>

	<?php if ($op == 2) {?>
	 <form id="form1" name="myform" method="post" action="book_profile.php">
	<table width="117%" border="0" cellpadding="0" cellspacing="3">
      <tr>
        <td height="30" align="right" class="style2">&nbsp;</td>
        <td width="22%">Add New Record </td>
        <td width="4%">&nbsp;</td>
        <td colspan="2" align="right">&nbsp;</td>
        <td width="0%">&nbsp;</td>
        <td width="13%">&nbsp;</td>
        <td width="21%">&nbsp;</td>
      </tr>
      <tr>
        <td width="8%" height="30" align="right" class="style2">School Code:</td>
        <td><input type="text" name="school_code" value="<?php echo $school_code; ?>"/></td>
        <td>&nbsp;</td>
        <td width="15%" align="right"><span class="style2">Location:</span></td>
        <td width="17%"><input type="text" name="location" /></td>
        <td>&nbsp;</td>
     <td align="right" class="style2">Mode of Acquisition:</td>
        <td><select name="mode_of_ac" id="mode_of_ac" >
            <option value="Purchase"  >Purchase</option>
            <option value="Donation"  >Donation</option>
            <option value="Exchange"  >Exchange</option>
          </select>
		  <input type="text" name="mode_of_ac" value="<?php echo $mode_ac; ?>" size="13"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Accession no. </td>
        <td><input type="text" name="access_no"/></strong></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Publisher:</span></td>
        <td><input type="text" name="publisher" value="<?php echo $publisher; ?>"/></td>
        <td>&nbsp;</td>

	    <td width="13%" align="right"><span class="style2">Place of Publication:</span></td>
          <td width="21%"><input name="place_pub" type="text" class="dilaw" id="place_pub" size="30"  value="<?php echo $place_pub; ?>"/></td>
	    </tr>
      <tr>
        <td height="30" align="right" class="style2">Call Number:</td>
        <td><input type="text" name="call_num"  id= "call_num"  value="<?php echo $call_num; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Year of Publication/Copyright date :</span></td>
        <td><input type="text" name="date_pub" id="date_pub" value="<?php echo $date_pub; ?>" size="20"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Date Acquired:</td>
        <td><input type="text" name="date_ac" id="date_ac" /></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Main Author</td>
        <td><input type="text" name="author" id="author" value="<?php echo $author; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Extent of Item:</span></td>
        <td><input type="text" name="eoi" value="<?php echo $eoi; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Property No:</td>
        <td><input type="text" name="property_no"/></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Other Author 1:</td>
        <td><input type="text" name="other_author1" value="<?php echo $other_author1; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Other Physical Details:</span></td>
        <td><input type="text" name="opd" value="<?php echo $opd; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Acknowledgement Receipt Expense (ARE) Date</td>
        <td><input type="text" name="are" /></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">2:</td>
        <td><input type="text" name="other_author2" value="<?php echo $other_author2; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Size/Dimesion:</span></td>
        <td><input type="text" name="size_dimension" value="<?php echo $size_dimension; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Verified by:</td>
        <td><input type="text" name="verified_by" /></td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">3:</td>
        <td><input type="text" name="other_author3" value="<?php echo $other_author3; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Series, Volume, No:</span></td>
        <td><input type="text" name="series" value="<?php echo $series; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">Source of Fund:</td>
        <td><input type="text" name="source_of_fund" /></td>

      </tr>
      <tr>
        <td height="30" align="right" class="style2">4:</td>
        <td><input type="text" name="other_author4" value="<?php echo $other_author4; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Accompanying Materials:</span></td>
        <td><input type="text" name="accom_mat" value="<?php echo $accom_mat; ?>"/></td>
        <td>&nbsp;</td>
       <td height="30" align="right" class="style2">Edition:</td>
        <td><input type="text" name="edition" value="<?php echo $edition; ?>"/></td>

      </tr>
      <tr>
        <td height="30" align="right" class="style2">5</td>
      <td><input type="text" name="other_author5" value="<?php echo $other_author5; ?>"/></td>
	   <td>&nbsp;</td>
        <td align="right"><span class="style2">Subject 1:</span></td>
        <td><input type="text" name="subject1" value="<?php echo $subject1; ?>"/></td>
         <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	   <tr>
        <td height="30" align="right" class="style2">6</td>
        <td><input type="text" name="other_author6" value="<?php echo $other_author6; ?>"/></td>
        <td>&nbsp;</td>
         <td align="right"><span class="style2">Subject 2:</span></td>
        <td><input type="text" name="subject2" value="<?php echo $subject2; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="30" align="right" class="style2">7</td>
        <td><input type="text" name="other_author7" value="<?php echo $other_author7; ?>"/></td>
        <td>&nbsp;</td>
 <td align="right"><span class="style2">Subject 3:</span></td>
        <td><input type="text" name="subject3" value="<?php echo $subject3; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="30" align="right" class="style2">Title Proper:</td>
        <td><input type="text" name="title" id="title" size="30"value="<?php echo $title; ?>"/></td>
        <td>&nbsp;</td>
       <td align="right">Subject 4:</td>
        <td><input type="text" name="subject4" value="<?php echo $subject4; ?>"/></td>

	    <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Parallel Title: </td>
        <td><input type="text" name="parallel_title" value="<?php echo $parallel_title; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right">Subject 5</td>
        <td><input type="text" name="subject5" value="<?php echo $subject5; ?>"/></td>

	    <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Other  Title Information: </td>
        <td><input type="text" name="oti" value="<?php echo $oti; ?>"/></td>
        <td>&nbsp;</td>
       <td align="right">Subject 6</td>
        <td><input type="text" name="subject6" value="<?php echo $subject6; ?>"/></td>

	   <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Uniform Title Information</td>
        <td><input type="text" name="uti" value="<?php echo $uti; ?>"/></td>
        <td>&nbsp;</td>
         <td align="right">Subject 7</td>
        <td><input type="text" name="subject7" value="<?php echo $subject7; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">General Material Designation:</td>
        <td><input type="text" name="gmd" value="<?php echo $gmd; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">Notes:</span></td>
        <td><input type="text" name="notes" value="<?php echo $notes; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right" class="style2">Material type:</td>
        <td><input type="text" name="classification" value="<?php echo $classification; ?>"/></td>
        <td>&nbsp;</td>
        <td align="right"><span class="style2">ISBN/ISSN</span></td>
        <td><input type="text" name="isbn" value="<?php echo $isbn; ?>"/></td>
       <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" class="style2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="submit"  class="btn" name="submit2" value="Add" /></td>
        <td colspan="2"><input type="submit"  onClick="document.myform.action ='admin_add_new.php';"class="btn" name="add_new" value="Add New" /></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>
	<?php }?>
          <p><a href="index.php"></a></p>
      <hr />
    <p>&nbsp;</p>
			     <p>&nbsp;</p>
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
<?php echo $system_title; ?><br /><?php echo $footer; ?>
</div>
</body>
</html>