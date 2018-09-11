<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/gensettings.php");
include("user.php");

$task = $_POST['task'];
$bar_id = $_POST['bar_id'];
if($_POST['submit']){


$query="SELECT * FROM barrower where bar_id = '$bar_id' ";
$result = mysql_query($query,$connect)  or die("cant execute query!.....");
$newArray = mysql_fetch_array($result);

	if (mysql_num_rows($result) == 0){
		$msg="The Borrower's ID does not exists!...";
         $task ="none";}
		 
if($task=="up"){

if ($upload_file=="on"){

if ($userfile_size >250000){$msg="Your uploaded file size is more than 250KB so please reduce the file size and then 			upload. Visit the help page to know how to reduce the file size.<BR>";
$borrowers_pic="false";
}
$add="upload/$userfile_name"; // the path with the file name where the file will be stored, upload is the directory name. 

if (!($userfile_type =="image/pjpeg" OR $userfile_type=="image/gif")){$msg=$msg."Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
$borrowers_pic="false";
}

$query="SELECT * FROM borrowers_pic where bar_id = '$bar_id' ";
$result = mysql_query($query,$connect)  or die("cant execute query!.....");
$newArray = mysql_fetch_array($result);

if (mysql_num_rows($result) != 0){
$msg ="A picture already exists...Please remove first the picture to inset new one";
} else{


if(move_uploaded_file ($userfile, $add)){
$query = "INSERT INTO borrowers_pic(bar_id,file_name,file_size,file_type) VALUES('$bar_id','$userfile_name', '$userfile_size', '$userfile_type')";
$result	=mysql_query($query,$connect) or die("cant execute query!.....");
$file_id = mysql_insert_id();
$msg = "The file is already uploaded...."; 
}//end if
} 
}// end if $upload_file is set on

else {
$msg = "You are not allowed to upload picture file!";
}

}// end if $task=upload

if ($task=="rem"){

if ($remove_file=="on"){
$query="SELECT * FROM borrowers_pic where bar_id = '$bar_id' ";
$result = mysql_query($query,$connect)  or die("cant execute query!.....");
$newArray = mysql_fetch_array($result);

	if (mysql_num_rows($result) == 0){
		$msg="No picture associated to the user is found...";
		}  else
        {
        $query = "delete from borrowers_pic where bar_id = '$bar_id'";
		$result = mysql_query($query,$connect)  or die("cant execute query!.....");
      	$msg="Picture was successfully deleted...";
	  	}
} // end if $remove_file is on

else {
$msg = "You are not allowed to delete a picture!";
}

}//end if $task==rem


}//end if submit
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title."--".$footer;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
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
function FormEval(){

if (document.myform.bar_id.value == ""){
alert("Please enter the Borrower's ID!");
document.myform.bar_id.focus();

return false;
}
}//-->
</script>

<script>
<!--
function hanap(){
if (document.myform.task.value == "up"){
document.myform.userfile.disabled = false;
document.myform.userfile.focus();
document.myform.bar_id.disabled = false;
}
if (document.myform.task.value == "rem"){
document.myform.userfile.disabled = true;
document.myform.bar_id.disabled = false;
document.myform.bar_id.focus();
}
}
//-->
</script>

</head>
<body >
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;".$header_title;?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo;?>" width="117" height="110" />
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
    <h2><a href="barrower.php">Search borrower</a> | <?php if ($borrow_book=="on")echo '<a href="bar_new.php">Borrow books </a>'; else echo "Borrow Book";?> | <?php if ($add_borrower=="on")echo '<a href="create_borrower.php">Add borrower</a>'; else echo "Add Borrower";?> |<?php if ($show_borrower=="on")echo '<a href="show_borrower.php">Show borrower</a>'; else echo "Show Borrower";?>|<?php if (($upload_file=="on") || ($remove_file=="on")) echo '<a href="load_file.php">Update borrower photo</a>'; else echo "Update borrower photo";?>|<?php if ($uri=="admin")echo '<a href="pay_fee.php">Return books</a>'; else echo "Return books";?></h2>
	
<form enctype="multipart/form-data" name="myform"  id="myform"action="load_file.php" method="post">
    <?php echo $msg;?><p><strong>What to do:
      <select name="task"  id="task"   onchange="hanap()" >
         <option value="up">Upload Picture</option>
        <option value="rem">Remove Picture</option>
        </select><br />
      Enter the locaton of the picture you wish to upload...<br>
      Upload this file:
      <input name="userfile" type="file" />
      <br />
      Borrower's ID:
      <input type="text" name="bar_id"  id="bar_id"size="20"  />
      <input name="submit" id="submit" type="submit" value="Send File" class="btn"  onclick="return FormEval()"/>
    </strong></p>
  </form>
	
	
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
<?php echo $system_title;?><br /><?php echo $footer;?>
</div>
</body>
</html>