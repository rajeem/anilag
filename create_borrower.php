<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";
include "user.php";
$op = 0;

//authorized
if ($add_borrower == "on") {
    $sql = "SELECT max(id) as id from barrower";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....");
    while ($row = mysql_fetch_array($result)) {
        $barrower_id = $row['id'];
    }

    if ($auto_id == 1) {
        $barrower_id = $barrower_id + 1;

        if (mb_strlen($barrower_id) == 1) {$barrower_id = '0000' . $barrower_id;}
        if (mb_strlen($barrower_id) == 2) {$barrower_id = '000' . $barrower_id;}
        if (mb_strlen($barrower_id) == 3) {$barrower_id = '00' . $barrower_id;}
        if (mb_strlen($barrower_id) == 4) {$barrower_id = '0' . $barrower_id;}

        $readonly = "readonly";
        $config = "Auto borrower ID set to ON";
    } else {
        $barrower_id = "";

    }

    if ($_POST['op'] == 1) {

/*$target_path = "upload/";
$filename=basename($_FILES['photo']['name']);
list($photo, $ext) = split('[/.-]', $filename);
$ext = strtolower($ext);
$target_path = $target_path . basename( $_FILES['photo']['name']);
$_FILES['photo']['tmp_name'];

$target_path = "upload/";
$target_path = $target_path . basename( $_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
$photo= basename( $_FILES['photo']['name']);
 */

        //get the value from form submitted
        $bar_id = $_POST['bar_id'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        $usertype = $_POST['type'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $address = $_POST['address'];
        $adviser = $_POST['adviser'];
        $school_code = $_POST['school_code'];
        $ex_date = $_POST['ex_date'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $query = "SELECT * FROM barrower where bar_id = '$bar_id' ";
        $result = mysql_query($query, $connect) or die("cant execute query!.....");
        $newArray = mysql_fetch_array($result);

        if (mysql_num_rows($result) != 0) {
            $message = "<strong><font color=#339900>The Borrower's ID already exists!</font></strong>";
            $op = 3;} else {
            //put to database all final values
            $sql = "INSERT INTO barrower (bar_id, school_code,last1, first1,type, course, year1,
				address,adviser,ex_date,contact,email,active,gender)
				VALUES ( '$bar_id', '$school_code','$last', '$first','$usertype','$course', '$year',
				'$address','$adviser','$ex_date','$contact','$email',1,'$gender')";
            $result = mysql_query($sql, $connect) or die("cant execute query!.....");
            $message = "<strong><font color=#339900>Adding new borrower successful!</font></strong>";

            if ($userfile_size > 250000) {$msg = "Your uploaded file size is more than 250KB so please reduce the file size and then 			upload. Visit the help page to know how to reduce the file size.<BR>";
                $borrowers_pic = "false";
            }
            $add = "upload/$userfile_name"; // the path with the file name where the file will be stored, upload is the directory name.

            if (!($userfile_type == "image/pjpeg" or $userfile_type == "image/gif")) {$msg = $msg . "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
                $borrowers_pic = "false";
            }

            $query = "SELECT * FROM borrowers_pic where bar_id = '$bar_id' ";
            $result = mysql_query($query, $connect) or die("cant execute query!.....");
            $newArray = mysql_fetch_array($result);

            if (mysql_num_rows($result) != 0) {
                $msg = "A picture already exists...Please remove first the picture to inset new one";
            } else {

                if (move_uploaded_file($userfile, $add)) {
                    $query = "INSERT INTO borrowers_pic(bar_id,file_name,file_size,file_type) VALUES('$bar_id','$userfile_name', '$userfile_size', '$userfile_type')";
                    $result = mysql_query($query, $connect) or die("cant execute query!.....");
                    $file_id = mysql_insert_id();
                    $msg = "The file is already uploaded....";
                } //end if
            } // end else

            $query = "SELECT * FROM borrowers_pic where bar_id = '$bar_id' ";
            $result = mysql_query($query, $connect) or die("cant execute query!.....");
            $newArray = mysql_fetch_array($result);

            if (mysql_num_rows($result) != 0) {
                $file_name = $newArray['file_name'];
            }

            $op = 1;
        } // end else if the bar_id does not exist
    } // end op==1

} else {
    $msg_mo = "You are not allowed to add new borrower account!";
    $op = 2;}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<SCRIPT language=javascript>

function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>

<script type="text/JavaScript">
<!--
function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<script type="text/JavaScript">
<!--
function FormValidate(){

if (document.myform.bar_id.value == ""){
alert("Enter the Borrower's ID!");
document.myform.bar_id.focus();
return false;}

if(isNaN(document.myform.bar_id.value) == true){
alert("The Borrower's id must be numeric type!");
document.myform.bar_id.focus();
return false;}

if (document.myform.bar_id.value.length <= 4){
alert("The Borrower's id must be of length 5!");
document.myform.bar_id.focus();
return false;}


if (document.myform.last.value == ""){
alert("Enter the lastname!");
document.myform.last.focus();
return false;}

if (document.myform.first.value == ""){
alert("Enter the firstname!");
document.myform.first.focus();
return false;}

if (document.myform.course.value == ""){
alert("Enter the course!");
document.myform.course.focus();
return false;}


if (document.myform.year.value == ""){
alert("Enter the year!");
document.myform.year.focus();
return false;}

if (document.myform.address.value == ""){
alert("Enter the address!");
document.myform.address.focus();
return false;}
if (document.myform.adviser.value == ""){
alert("Enter the name of your adviser!");
document.myform.adviser.focus();
return false;}

if (document.myform.contact.value == ""){
alert("Enter the contact number!");
document.myform.contact.focus();
return false;}

if (document.myform.ex_date.value == ""){
alert("Enter the Card Expiration Date!");
document.myform.ex_date.focus();
return false;}


if (document.myform.email.value == ""){
alert("Enter the E-mail Address!");
document.myform.email.focus();
return false;}

}

//-->
</script>
</head>
<body>
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
    <h2><a href="barrower.php">Search borrower</a> | <?php if ($borrow_book == "on") {
    echo '<a href="bar_new.php">Borrow books </a>';
} else {
    echo "Borrow Book";
}
?> | <?php if ($add_borrower == "on") {
    echo '<a href="create_borrower.php">Add borrower</a>';
} else {
    echo "Add Borrower";
}
?> |<?php if ($show_borrower == "on") {
    echo '<a href="show_borrower.php">Show borrower</a>';
} else {
    echo "Show Borrower";
}
?>|<?php if (($upload_file == "on") || ($remove_file == "on")) {
    echo '<a href="load_file.php">Update borrower photo</a>';
} else {
    echo "Update borrower photo";
}
?>|<?php if ($uri == "admin") {
    echo '<a href="pay_fee.php">Return books</a>';
} else {
    echo "Return books";
}
?></h2>
	<?php if ($op == 0) {?>
<form action="create_borrower.php" method="post" name="myform" enctype="multipart/form-data">
          <table width="100%" border="0" cellpadding="5" cellspacing="5">
 			     <tr>
 			       <td width="140" align="right">&nbsp;</td>
 			       <td  align="center" <?php echo $bgcolor; ?>><?php echo $error; ?><?php echo $message; ?></td>
 			       <td align="center">&nbsp;</td>
 			       <td align="center">&nbsp;</td>

	        </tr>
 			     <tr>
 			       <td align="right">Borrowers' id:</td>
 			       <td align="left"><strong>
 			         <input name="bar_id" type="text" class="dilaw" id="bar_id" value="<?php echo $barrower_id; ?>" size="30" <?php echo $readonly; ?> />
 			       </strong></td>
 			       <td align="left" colspan="2"><?php echo '<strong><font color=red>' . $config . '</font></strong>'; ?></td>

	        </tr>
 			     <tr>
 			       <td align="right">Last name: </td>
 			       <td width="269" align="left"><strong>
 			         <input name="last" type="text" class="dilaw" id="last" value="<?php echo $last; ?>" size="30" />
 			       </strong></td>
 			       <td width="78" align="center" rowspan="3">&nbsp;</td>
 			       <td align="center">&nbsp;</td>

	        </tr>
 			     <tr>
 			       <td align="right">First name: </td>
 			       <td align="left"><strong>
 			         <input name="first" type="text" class="dilaw" id="first" value="<?php echo $first; ?>" size="30" />
 			       </strong></td>

 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>
			  <tr>
 			       <td align="right">Gender: </td>
 			       <td align="left"><strong>
 			         <input name="gender" type="text" class="dilaw" id="gender" value="<?php echo $gender; ?>" size="30" />
 			       </strong></td>

 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>

 			     <tr>

 			       <td align="right">Type</td>
 			       <td align="left"><strong>
 			         <select name="type" id="type" > <?php
$i = 0;
    $sql = "SELECT type from usergroup order by type";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $usertype = $row['type'];
        ?>
			<option><?php echo $usertype; ?></option>
<?php $i++;}?></select>
 			       </strong></td>
 			     <td align="right" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>

 			     <tr>

 			       <td align="right">Course:</td>
 			       <td align="left"><strong>
 			         <input name="course" type="text" class="dilaw" id="course" value="<?php echo $course; ?>" size="30" />
 			       </strong></td>
 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>
			<?php if ($upload_file=="on") echo"<tr>

 			       <td align='right'>Photo</td>
 			       <td align='left'><strong>  <input name='userfile' type='file'  size='15' class='dilaw' />
 			       </strong></td>
 			       <td align='center' bgcolor='#FFFFFF'></td>
 			       <td align='center' bgcolor='#FFFFFF'></td>
 			     </tr>";?>
				 <tr>
				   <td align="right">Year:</td>
				   <td align="left"><strong>
				     <input name="year" type="text" class="dilaw" id="year" value="<?php echo $year; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
				 <tr>
				   <td align="right">Address:</td>
				   <td align="left"><strong>
				     <input name="address" type="text" class="dilaw" id="address" value="<?php echo $address; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
				 <tr>
				   <td align="right">Adviser:</td>
				   <td align="left"><strong>
				     <input name="adviser" type="text" class="dilaw" id="adviser" value="<?php echo $adviser; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>

				  <tr>
				   <td align="right">School code:</td>
				   <td align="left"><strong>
				    <select name="school_code" id="school_code">
           <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $school_code = $row['school_code'];
        ?>
			<option><?php echo $school_code; ?></option>
<?php $i++;}?>
</select>
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
				 <tr>
				   <td align="right">Contact no.: </td>
				   <td align="left"><strong>
				     <input name="contact" type="text" class="dilaw" id="contact" value="<?php echo $contact; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
			 <tr>
				   <td align="right">Expiration Date:</td>
				   <td align="left"><strong>
				     <input name="ex_date" type="text" class="dilaw" id="ex_date" value="<?php echo $ex_date; ?>" size="30" />
				   </strong></td>
				   <td align="left" bgcolor="#FFFFFF" colspan="2"><strong><font color="#FF0000">*date format(yyyy-mm-dd) e.g. 2008-1-31</font></strong></td>
		    </tr>

				 <tr>
				   <td align="right">Email address: </td>
				   <td align="left"><strong>
				     <input name="email" type="text" class="dilaw" id="email" value="<?php echo $email; ?>" size="30" />
				   </strong></td>
				   <td align="left" bgcolor="#FFFFFF"><!-- <input type="button" name="submit2" value="Picture..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>--></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
			    <tr>
				   <td align="left" bgcolor="#FFFFFF"><input name="op" type="hidden" id="op" value="1" />
			       <input name="deadline1" type="hidden" id="deadline1" value="<?php echo $deadline1; ?>" /></td>
				   <td  valign="middle" bgcolor="#FFFFFF"><input name="Reset" type="reset" class="btn"  value="Cancel"/>
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit" type="submit" class="btn" value="Create" onClick=" return FormValidate()"/></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
			    </tr>
	</table>
	</form>
	<?php }?>
	<?php if ($op == 1) {
    ?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td width="144" align="right"><a href="create_borrower.php">back</a></td>
        <td colspan="2" align="left">New borrower added! &nbsp;</td>
        <td align="center">&nbsp;</td>

      </tr>
      <tr>
        <td align="right">Borrowers id:</td>
        <td align="left"><?php echo $bar_id; ?></td>
        <td width="144" align="center" rowspan="3"> <input type="image" name="imageField"  src="upload/<?php echo $file_name; ?>" height="100" width="100"  disabled="disabled"></td>
 			        <td width="115" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Last name: </td>
        <td width="266" align="left"><?php echo $last; ?></td>
        <td width="115" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">First name: </td>
        <td align="left"><?php echo $first; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Type:</td>
        <td align="left"><?php echo $usertype; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Course:</td>
        <td align="left"><?php echo $course; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Year:</td>
        <td align="left"><?php echo $year; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Address:</td>
        <td align="left"><?php echo $address; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Adviser:</td>
        <td align="left"><?php echo $adviser; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">School code:</td>
        <td align="left"><?php echo $school_code; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Expiration Date:</td>
        <td align="left"><?php echo $ex_date; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Contact no.: </td>
        <td align="left"><?php echo $contact; ?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Email address: </td>
        <td align="left"><?php echo $email; ?></td>
        <td align="left" bgcolor="#FFFFFF"><!-- <input type="button" name="submit2" value="Picture..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>--></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
	<?php }?>

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

<?php if ($op == 3) { // if the bar_id already exists?>
<form action="create_borrower.php" method="post" name="myform" enctype="multipart/form-data">
          <table width="100%" border="0" cellpadding="5" cellspacing="5">
 			     <tr>
 			       <td width="140" align="right">&nbsp;</td>
 			       <td  align="center" <?php echo $bgcolor; ?>><?php echo $message; ?></td>
 			       <td align="center">&nbsp;</td>
 			       <td align="center"><?php echo $msg; ?></td>

	        </tr>
 			     <tr>
 			       <td align="right">Borrowers' id:</td>
 			       <td align="left"><strong>
 			         <input name="bar_id" type="text" class="dilaw" id="bar_id"  size="30" />
 			       </strong></td>
 			       <td align="left" colspan="2"><?php echo '<strong><font color=red>' . $config . '</font></strong>'; ?></td>

	        </tr>
 			     <tr>
 			       <td align="right">Last name: </td>
 			       <td width="269" align="left"><strong>
 			         <input name="last" type="text" class="dilaw" id="last" value="<?php echo $last; ?>" size="30" />
 			       </strong></td>
 			       <td width="78" align="center" rowspan="3">&nbsp;</td>
 			       <td align="center">&nbsp;</td>

	        </tr>
 			     <tr>
 			       <td align="right">First name: </td>
 			       <td align="left"><strong>
 			         <input name="first" type="text" class="dilaw" id="first" value="<?php echo $first; ?>" size="30" />
 			       </strong></td>

 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>

 			     <tr>

 			       <td align="right">Type</td>
 			       <td align="left"><strong>
 			         <select name="type" id="type" > <?php
$i = 0;
    $sql = "SELECT type from usergroup order by type";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $type = $row['type'];
        ?>
			<option <?php if ($usertype=="$type") echo selected;?>><?php echo $type; ?></option>
<?php $i++;}?></select>
 			       </strong></td>
 			     <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>

 			     <tr>

 			       <td align="right">Course:</td>
 			       <td align="left"><strong>
 			         <input name="course" type="text" class="dilaw" id="course" value="<?php echo $course; ?>" size="30" />
 			       </strong></td>
 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
 			       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

	        </tr>
<?php if ($upload_file=="on") echo"<tr>

 			       <td align='right'>Photo</td>
 			       <td align='left'><strong>  <input name='userfile' type='file'  size='15' class='dilaw' />
 			       </strong></td>
 			       <td align='center' bgcolor='#FFFFFF'></td>
 			       <td align='center' bgcolor='#FFFFFF'></td>
 			     </tr>";?>

				 <tr>
				   <td align="right">Year:</td>
				   <td align="left"><strong>
				     <input name="year" type="text" class="dilaw" id="year" value="<?php echo $year; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
				 <tr>
				   <td align="right">Address:</td>
				   <td align="left"><strong>
				     <input name="address" type="text" class="dilaw" id="address" value="<?php echo $address; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
				 <tr>
				   <td align="right">Adviser:</td>
				   <td align="left"><strong>
				     <input name="adviser" type="text" class="dilaw" id="adviser" value="<?php echo $adviser; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>

				  <tr>
				   <td align="right">School code:</td>
				   <td align="left"><strong>
				    <select name="school_code" id="school_code">
           <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
			<option <?php if ($school_code=="$code") echo selected;?>><?php echo $code; ?></option>
<?php $i++;}?>
</select>
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
				 <tr>
				   <td align="right">Contact no.: </td>
				   <td align="left"><strong>
				     <input name="contact" type="text" class="dilaw" id="contact" value="<?php echo $contact; ?>" size="30" />
				   </strong></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
			 <tr>
				   <td align="right">Expiration Date:</td>
				   <td align="left"><strong>
				     <input name="ex_date" type="text" class="dilaw" id="ex_date" value="<?php echo $ex_date; ?>" size="30" />
				   </strong></td>
				   <td align="left" bgcolor="#FFFFFF" colspan="2"><strong><font color="#FF0000">*date format(yyyy-mm-dd)</font></strong></td>
		    </tr>

				 <tr>
				   <td align="right">Email address: </td>
				   <td align="left"><strong>
				     <input name="email" type="text" class="dilaw" id="email" value="<?php echo $email; ?>" size="30" />
				   </strong></td>
				   <td align="left" bgcolor="#FFFFFF"><!-- <input type="button" name="submit2" value="Picture..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>--></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
			    <tr>
				   <td align="left" bgcolor="#FFFFFF"><input name="op" type="hidden" id="op" value="1" />
			       <input name="deadline1" type="hidden" id="deadline1" value="<?php echo $deadline1; ?>" /></td>
				   <td  valign="middle" bgcolor="#FFFFFF"><input name="Reset" type="reset" class="btn"  value="Cancel"/>
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit" type="submit" class="btn" value="Create" onClick=" return FormValidate()"/></td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
			    </tr>
	</table>
	</form>
	<?php }?>
<hr />
			     <p>
    </p>
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