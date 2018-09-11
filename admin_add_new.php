<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}

$today = date("F j, Y, g:i a");
//$user=$_SESSION['username'];
$op = 1;
include "include/connect.php";
include "include/gensettings.php";
include "user.php";
//authorized
if ($add_book == "on") {

    if ($_POST['add_new']) {
        $op = 1;
    }

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
        $author_no = $_POST['author_no'];
        $sname = $_POST['sname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
//    $author = $fname.'  '.$mname{0}.' '.$sname;
        $title = $_POST['title'];
        $subject_classification = $_POST['subject_classification'];
        $access_num = $_POST['access_no'];
        $subject1 = $_POST['subject1'];
        $subject2 = $_POST['subject2'];
        $subject3 = $_POST['subject3'];
        $subject4 = $_POST['subject4'];
        $subject5 = $_POST['subject5'];
        $subject6 = $_POST['subject6'];
        $subject7 = $_POST['subject7'];
        $status = "in";

        $op = 3;
    }

//if form submit
    if ($_POST['add']) {
        $front = $_SESSION["front"];
        $pdf = $_SESSION["pdf"];
        $help = $_SESSION["help"];
        $pdb = $_SESSION["pdb"];
        session_unregister("front");
        session_unregister("pdf");
        session_unregister("help");
        session_unregister("pdb");
        $school_code = $_POST['school_code'];
        $author_no = $_POST['author_no'];
        $sname = $_POST['sname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
//    $author = $fname.'  '.$mname{0}.' '.$sname;
        $title = $_POST['title'];
        $access_num = $_POST['access_no'];
        $subject_classification = $_POST['subject_classification'];
        $subject1 = $_POST['subject1'];
        $subject2 = $_POST['subject2'];
        $subject3 = $_POST['subject3'];
        $subject4 = $_POST['subject4'];
        $subject5 = $_POST['subject5'];
        $subject6 = $_POST['subject6'];
        $subject7 = $_POST['subject7'];
        $status = "in";
        $_SESSION[school_code] = $_POST['school_code'];
        $_SESSION[author_no] = $_POST['author_no'];
        $_SESSION[author_sname] = $_POST['sname'];
        $_SESSION[author_fname] = $_POST['fname'];
        $_SESSION[author_mname] = $_POST['mname'];
        $_SESSION[title] = $_POST['title'];
        $_SESSION[access_num] = $_POST['access_no'];
        $_SESSION[subject_classification] = $_POST['subject_classification'];
        $_SESSION[subject1] = $_POST['subject1'];
        $_SESSION[subject2] = $_POST['subject2'];
        $_SESSION[subject3] = $_POST['subject3'];
        $_SESSION[subject4] = $_POST['subject4'];
        $_SESSION[subject5] = $_POST['subject5'];
        $_SESSION[subject6] = $_POST['subject6'];
        $_SESSION[subject7] = $_POST['subject7'];
//    $_SESSION[status]             =$_POST['status'];

        //if access number already exists!
        $sql = "select * from card_cat where access_no='$access_num'";
        $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
        if (mysql_num_rows($result) != 0) { // if already exists
            $fielderror = "Accession number already exists!";
            $op = 4;
        } else {

            //add to card_catalog table
            $sql = "INSERT INTO card_cat
			(qty,access_no,school_code,author_no,author_sname,author_fname,author_mname,title,subject_classification,subject1,subject2,
			subject3,subject4,subject5,subject6,subject7,status1)

		    VALUES(
			1,'$access_num','$school_code','$auhor_no','$sname','$fname','$mname','$title','$subject_classification','$subject1','$subject2',
			'$subject3','$subject4','$subject5','$subject6','$subject7','$status')";

            $result1 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
            $op = 2;

            $sql2 = "select * from titles where title_proper='$title' && author_sname='$sname' && author_fname='$fname' && author_mname='$mname'";
            $result2 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());
            if (mysql_num_rows($result2) == 0) {

                $sql = "INSERT INTO titles
			(title_proper,quantity,author_sname,author_fname,author_mname)

		    VALUES('$title','1','$sname','$fname','$mname')";

                $result3 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
            }

            //if title already exists!
            $sql = "select * from card_cat where title='$title' && author_sname='$sname' && author_fname='$fname' && author_mname='$mname' ";
            $result4 = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
            $num = mysql_num_rows($result4); // count number of times the title is present and same main author is present

            if (mysql_num_rows($result4) != 0) {

//    $sql2 = "select * from titles where title_proper='$title'";
                //    $result2 = mysql_query($sql2,$connect) or die("cant execute query!".mysql_error());
                //    if (mysql_num_rows($result2) != 0){                // if already exists
                $quantity = $num;
                // echo $quantity;
                $sql = "UPDATE titles set quantity='$quantity' WHERE title_proper='$title' && author_sname='$sname' && author_fname='$fname' && author_mname='$mname' ";
                $result5 = mysql_query($sql, $connect) or die("cant execute query!!!");

            }
            if (mysql_num_rows($result4) == 0) {

                /*$sql2 = "select * from titles where title_proper='$title' && author_sname='$sname' && author_fname='$fname' && author_mname='$mname' ";
                $result6 = mysql_query($sql2,$connect) or die("cant execute query!".mysql_error());
                 */

                $sql = "UPDATE titles set quantity=1 WHERE title_proper='$title' && author_sname='$sname' && author_fname='$fname' && author_mname='$mname' ";
                $result7 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());

            } //  if title does not exists
        } // else if access number does not exists
    } // end Add button
} //end $Add_book = on
else {
    echo "You are not allowed to add a new record!";
    exit;} // exit
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
  var numLinesAdded = 5;

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
	d.innerHTML+=""+ numLinesAdded +"<input type='text' size='30' name='other_author" + numLinesAdded + "' onkeypress='focusNext(this)' class='dilaw'><br>";
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
  }w

	function generateRow1() {
	var d=document.getElementById("div1");

		if (numLinesAdd<=7){

	d.innerHTML+= "Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<input  type='text' size='74' name='subject" + numLinesAdd + "' onkeypress='focusNext(this)' ><BR>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
		}
	numLinesAdd++;
	}
</script>
<script type="text/JavaScript">
<!--
function FormValidate(){

if (document.myform.access_no.value == ""){
alert("Enter the Accession Number'!");
document.myform.access_no.focus();
return false;}

//if(isNaN(document.myform.access_no.value) == true){
//alert("The Accession Number must be numeric type!");
//document.myform.access_no.focus();
//return false;}

}

//-->
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
<body>
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
	<?php if ($op == 1) { // default or add new button is clicked?>
    <form id="myform" name="myform" method="post" action="admin_add_new.php">
      <table width="80%" border="0" cellpadding="0" cellspacing="3" >
        <tr>
          <td colspan="4"><?php echo $fielderror; ?></td>
        </tr>
        <tr>
		<tr>
          <td><div align="left"> School Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td width="56%"> <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <?php if ($dschool_code == "$code") {
            echo selected;
        }
        ?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select><br /><br /></td>
          <td width="9%"></td>
          <td width="16%"></td>
        </tr>
          <td></td>
          <td colspan="3">&nbsp;Author No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </td>
        </tr>
        <tr>
          <td width="19%"><div align="left"> Main Author:</div></td>
          <td colspan="3"><input name="author_no" type="text"  id="author_no" size="7" title='Author No.'/>
            &nbsp;
            <input name="sname" type="text"  id="sname" size="17" title='LastName of the Author'/>&nbsp;
            <input name="fname" type="text"  id="fname" size="17" title='FirstName of the Author'/>
            &nbsp;
            <input name="mname" type="text"  id="mname" size="15" title='MiddleName of the Author'/>
          </td>
        </tr>
        <tr>
          <td><div align="left"> Title Proper: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td width="56%"><input name="title" type="text"  id="title" size="74" /></td>
          <td width="9%"></td>
          <td width="16%"></td>
        </tr>
        <tr>
          <td><div align="left"> Accession No:&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td><input name="access_no" type="text"  id="access_no" size="74" /></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td width="19%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td><input name="subject1" type="text"  id="subject1" size="74" /></td>
          <td></td>
          <td></td>
        </tr>
         <tr>
          <td width="19%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td><input name="subject2" type="text"  id="subject2" size="74" /></td>
          <td></td>
          <td></td>
        </tr><tr>
          <td colspan="4"><div id="div1" align="left"></div></td>

        </tr>
        <tr>
          <center>
            <td></td>
          </center>
        </tr>
        <tr>
          <td></td>
          <td><input name="button" type="button" class="btn" onclick="generateRow1()" value="Add subject"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="add" class="btn" type="submit" value="Add Item" onclick=" return FormValidate()" />
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="profile"  class="btn" value="Book Profile" onclick="document.myform.action ='book_profile2.php';" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="left">
              <?php
if (($recordadded != "")) {
        echo '<img src="images/check1.png" width="50" height="45" />';
    } else {
        echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
    }
    ?>
              <?php echo $recordadded; ?></div></td>
        </tr>
      </table>
    </form>
	<?php }?>

	<?php if ($op == 2) {?>
	    <form id="myform"  name="myform" method="post" action="admin_add_new.php">

	<table width="80%" border="0" cellpadding="0" cellspacing="3">
     <tr>
        <td colspan="3"><div id="div" align="left"></div></td>
      </tr>
	 <tr><td>&nbsp;</td>
        <td colspan="2" height="30" align="left" class="style2"><input type="submit" name="add_copy"  value="Add Copy" class="btn" id="add_copy">&nbsp;&nbsp;
        <input type="submit" name="add_new"  value="Add New" class="btn" id="add_new"> </td>

      </tr>
	  <tr>
        <td height="30" align="right" class="style2"></td>
        <td width="62%">New Record has been added to the database! </td>
        <td width="18%"><a href="admin_add_new.php">back to add new book</a></td>
      </tr>
	  <tr>
          <td><div align="left"> School Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td width="56%"> <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <?php if ($school_code == "$code") {
            echo selected;
        }
        ?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select><br /><br /></td>
          <td width="9%"></td>
          <td width="16%"></td>
        </tr>
      <tr>
        <td></td>
        <td colspan="2">&nbsp;Author No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </td>
      </tr>
      <tr>
        <td width="20%"><div align="left"> Main Author:</div></td>
        <td colspan="2"><input name="author_no" type="text"  id="author_no" size="5" title='Author No.'  value="<?php echo $author_no; ?>"/>
          &nbsp;
		  <input name="sname" type="text"  id="sname" size="17" title='Last Name of the Author'  value="<?php echo $sname; ?>"/>
          &nbsp;
          <input name="fname" type="text"  id="fname" size="17" title='FirstName of the Author'
			value="<?php echo $fname; ?>"/>
          &nbsp;
          <input name="mname" type="text"  id="mname" size="15" title='MiddleName of the Author'
			value="<?php echo $mname; ?>"/>
        </td>
      </tr>
      <tr>
        <td><div align="left"> Title Proper: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td width="62%"><input name="title" type="text"  id="title" size="74" value="<?php echo $title; ?>" /></td>
        <td width="18%"></td>
      </tr>
      <tr>
        <td><div align="left"> Accession No:&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="access_no" type="text"  id="access_no" size="74"  value="<?php echo $access_no; ?>"/></td>
        <td></td>
      </tr>

      <tr>
        <td width="20%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="subject1" type="text"  id="subject1" size="74"  value="<?php echo $subject1; ?>"/></td>
        <td></td>
      </tr>
      <tr>
        <td width="20%"><div align="left"> Subject &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="subject2" type="text"  id="subject2" size="74"  value="<?php echo $subject2; ?>"/></td>
   <td></td></tr>
                <?php if ($subject3 != "") {
        echo "<tr><td>Subject</td><td><input type='text' name='subject3' size='74' value='$subject3'></td><tr>";}?>

		<?php if ($subject4 != "") {
        echo "<tr><td>Subject</td><td><input type='text' name='subject4' size='74' value='$subject4'></td><tr>";}?>
        <?php if ($subject5 != "") {
        echo "<tr><td>Subject</td><td><input type='text' name='subject5'  size='74' value='$subject5'></td><tr>";}?>
        <?php if ($subject6 != "") {
        echo "<tr><td>Subject</td><td><input type='text' name='subject6'  size='74' value='$subject6'></td><tr>";}?>
        <?php if ($subject7 != "") {
        echo "<tr><td>Subject</td><td><input type='text' name='subject7'  size='74' value='$subject7'></td><tr>";}?>



	  <tr>
        <td colspan="3"><div id="div" align="left"></div></td>
      </tr>
      <tr>
        <center>
          <td></td>
        </center>
      </tr>

      <tr>
        <td><div align="left">
            <?php
if (($recordadded != "")) {
        echo '<img src="images/check1.png" width="50" height="45" />';
    } else {
        echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
    }
    ?>
            <?php echo $recordadded; ?></div></td>
      </tr>
    </table>
</form>
	<?php }?>


<?php if ($op == 3) { //add _copy button is clicked?>
    <form id="myform" name="myform" method="post" action="admin_add_new.php">

	<table width="80%" border="0" cellpadding="0" cellspacing="3">


	  <tr>
        <td height="30" align="right" class="style2"></td>
        <td width="63%">&nbsp;</td>
        <td width="17%"></td>
      </tr>
	  <tr>
          <td><div align="left"> School Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td width="56%"> <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <?php if ($school_code == "$code") {
            echo selected;
        }
        ?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select><br /><br /></td>
          <td width="9%"></td>
          <td width="16%"></td>
        </tr>
      <tr>
        <td></td>
        <td colspan="2">&nbsp;Author No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </td>
      </tr>
      <tr>
        <td><div align="left"> Main Author:</div></td>
        <td colspan="2"><input name="author_no" type="text"  id="author_no" size="5" title='Author No.'  value="<?php echo $author_no; ?>"/>
          &nbsp;
          <input name="sname" type="text"  id="sname" size="17" title='Last Name of the Author'  value="<?php echo $sname; ?>"/>
          &nbsp;
          <input name="fname" type="text"  id="fname" size="17" title='FirstName of the Author'
			value="<?php echo $fname; ?>"/>
          &nbsp;
          <input name="mname" type="text"  id="mname" size="15" title='MiddleName of the Author'
			value="<?php echo $mname; ?>"/>
        </td>
      </tr>

      <tr>
        <td><div align="left"> Title Proper: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td width="63%"><input name="title" type="text"  id="title" size="74" value="<?php echo $title; ?>" /></td>
        <td width="17%"></td>
      </tr>
      <tr>
        <td><div align="left"> Accession No:&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="access_no" type="text"  id="access_no" size="74"  /></td>
        <td></td>
      </tr>

        <td width="20%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="subject1" type="text"  id="subject1" size="74"  value="<?php echo $subject1; ?>"/></td>
        <td></td>
      </tr>
      <tr>
        <td width="20%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="subject2" type="text"  id="subject2" size="74"  value="<?php echo $subject2; ?>"/></td>
        <td></td>
      </tr>
	  <?php if ($subject3 != "") {
        $sub = 3;
        echo "<tr><td>Subject</td><td><input type='text' name='subject3' size='74' value='$subject3'></td><tr>";}?>

		<?php if ($subject4 != "") {
        $sub = 4;
        echo "<tr><td>Subject</td><td><input type='text' name='subject4' size='74' value='$subject4'></td><tr>";}?>
        <?php if ($subject5 != "") {
        $sub = 5;
        echo "<tr><td>Subject</td><td><input type='text' name='subject5'  size='74' value='$subject5'></td><tr>";}?>
        <?php if ($subject6 != "") {
        $sub = 6;
        echo "<tr><td>Subject</td><td><input type='text' name='subject6'  size='74' value='$subject6'></td><tr>";}?>
        <?php if ($subject7 != "") {
        $sub = 7;
        echo "<tr><td>Subject</td><td><input type='text' name='subject7'  size='74' value='$subject7'></td><tr>";}?>

	  <tr>
        <td colspan="3"><input type="hidden" name="sub" value="<?php echo $sub; ?>" id="sub"><div id="div" align="left"></div></td>
      </tr>
      <tr>
        <center>
          <td></td>
        </center>
      </tr>
      <tr>
        <td></td>
        <td><input name="button" type="button" class="btn" onclick="generateRow1()" value="Add subject"/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="add" class="btn" type="submit" value="Add Item" onclick=" return FormValidate()" />
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="profile"  class="btn" value="Book Profile" onclick="document.myform.action ='book_profile2.php';" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">
            <?php
if (($recordadded != "")) {
        echo '<img src="images/check1.png" width="50" height="45" />';
    } else {
        echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
    }
    ?>
            <?php echo $recordadded; ?></div></td>
      </tr>
    </table>

	</form>
	<?php }?>

<?php if ($op == 4) { //if accession number already exists!?>
    <form id="myform" name="myform" method="post" action="admin_add_new.php">

	<table width="78%" border="0" cellpadding="0" cellspacing="3">


	  <tr>
        <td height="30" align="right" class="style2"></td>
        <td width="63%">&nbsp;</td>
        <td width="17%"></td>
      </tr>
	  <tr>
          <td colspan="4"><?php echo $fielderror; ?></td>
        </tr>
		<tr>
          <td><div align="left"> School Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td width="56%"> <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <?php if ($school_code == "$code") {
            echo selected;
        }
        ?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select><br /><br /></td>
          <td width="9%"></td>
          <td width="16%"></td>
        </tr>
      <tr>
        <td></td>
        <td colspan="2">&nbsp;Author No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </td>
        </tr>
      <tr>
        <td width="20%"><div align="left"> Main Author:</div></td>
        <td colspan="2"><input name="author_no" type="text"  id="author_no" size="5" title='Author No.'  value="<?php echo $author_no; ?>"/>
  &nbsp;
  <input name="sname" type="text"  id="sname" size="17" title='Last Name of the Author'  value="<?php echo $sname; ?>"/>
  &nbsp;
  <input name="fname" type="text"  id="fname" size="17" title='FirstName of the Author'
			value="<?php echo $fname; ?>"/>
  &nbsp;
  <input name="mname" type="text"  id="mname" size="15" title='MiddleName of the Author'
			value="<?php echo $mname; ?>"/>
        </td>
        </tr>
      <tr>
        <td><div align="left"> Title Proper: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td width="63%"><input name="title" type="text"  id="title" size="74" value="<?php echo $title; ?>" /></td>
        <td width="17%"></td>
      </tr>
      <tr>
        <td><div align="left"> Accession No:&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="access_no" type="text"  id="access_no" size="74"  /></td>
        <td></td>
      </tr>

      <tr>
        <td width="20%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="subject1" type="text"  id="subject1" size="74"  value="<?php echo $subject1; ?>"/></td>
        <td></td>
      </tr>
      <tr>
        <td width="20%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
        <td><input name="subject2" type="text"  id="subject2" size="74"  value="<?php echo $subject2; ?>"/></td>
        <td></td>
      </tr>


	  <tr>
        <td colspan="3"><div id="div1" align="left"></div></td>
      </tr>
      <tr>
        <center>
          <td></td>
        </center>
      </tr>
      <tr>
        <td></td>
        <td><input name="button" type="button" class="btn" onclick="generateRow1()" value="Add subject"/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="add" class="btn" type="submit" value="Add Item" onclick=" return FormValidate()" />
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="profile"  class="btn" value="Book Profile" onclick="document.myform.action ='book_profile2.php';" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="left">
            <?php
if (($recordadded != "")) {
        echo '<img src="images/check1.png" width="50" height="45" />';
    } else {
        echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
    }
    ?>
            <?php echo $recordadded; ?></div></td>
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
