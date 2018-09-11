<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");

if($_POST['op']==1){
	$save_css		=$_POST['template'];
	$hour_allow		=$_POST['hour_allow'];
	$auto			=$_POST['auto'];
	$auto_deadline	=$_POST['auto1'];
	//$footer			=$_POST['footer'];
	$header			=$_POST['header'];
	$overdue_price	=$_POST['overdue_price'];
	$book_limit		=$_POST['book_limit'];
	$rec_per_page	=$_POST['rec_per_page'];

	$sql="UPDATE settings set css='$save_css',hour_allow='$hour_allow',auto_id='$auto',header_title='$header',auto_deadline='$auto_deadline',
			overdue_price='$overdue_price',book_limit='$book_limit',search_output=1,rec_per_page='$rec_per_page'";
	mysql_query($sql,$connect) or die("cant execute query!z");
	$alert='<strong><font color=red>The settings changed!</font></strong>';
	
	
	//script for file upload logo
	include("class.php");
	$send_now = new multiple_upload;				//create instance
	
	//set some values         This is the whole path to! the upload dir
	$send_now->uploaddir 	= "images/";	//set server upload dir
	$send_now->max_files 	= 10;            		//set max files to upload
	$send_now->max_size 	= 25000000;        		//set max file-size
	$send_now->permission 	= 0777;			 		//set wanted permission
	$send_now->notallowed 	= array("exe"."mp3");	//exclude some file-types
	$send_now->show			= TRUE;					//show errors
	$send_now->files 		= &$_FILES;				//get $_FILES global values
	$send_now->cid			= $cid;					//set the category id
	$send_now->domid		= $domid;				//set the domain id
	$send_now->sequel		= $sequel;
	$send_now->bilang		= $bilang;
	
	//validate on size and allowed files
	$ok = $send_now->validate();
	if ($ok) {
	
	$ok = $send_now->execute();
	
	}
	
	if (!$ok && $send_now->show) {
	//echo perhaps some errors
	$i_errors = count($send_now->errors);
	echo "Error report, sending files to server <br />";
	for ($i=0; $i<$i_errors;$i++) {
		echo $send_now->errors[0][$i] . " <br />";
		echo $send_now->errors[1][$i] . " <br />";
	}
	} else {
	
	
	}

}
//echo $_POST['op'];
include("include/gensettings.php");

//css	
if($css=="style.css"){
	$selected1='selected="selected"';
}

if($css=="style1.css"){
	$selected2='selected="selected"';
}
if($css=="style2.css"){
	$selected5='selected="selected"';
}


//auto id
if($auto_id==1){
	$selected3='checked="checked"';
}

if($auto_id==0){
	$selected4='checked="checked"';
}

//auto deadline
if($auto_deadline==1){
	$selected6='checked="checked"';
}

if($auto_deadline==0){
	$selected7='checked="checked"';
}


//search output style
if($search_output==1){
	$selected8='selected="selected"';
}

if($search_output==2){
	$selected9='selected="selected"';
}
//echo $auto_deadline;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title."--".$footer;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
</head>
<body OnLoad="document.myform.search.focus();">
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
    <h2>Settings</h2>
    <form action="settings.php" method="post"  name="supportform" enctype="multipart/form-data">
    <table width="100%" border="0">
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><?php echo $alert; ?></td>
      </tr>
      <tr>
        <td width="21%" align="right">Name/Header:</td>
        <td width="4%">&nbsp;</td>
        <td colspan="2"><input name="header" type="text" id="header" value="<?php echo $header_title;?>" size="40" class="dilaw"/></td>
        </tr>
      <tr>
        <td align="right">Logo:</td>
        <td>&nbsp;</td>
        <td width="36%" valign="middle"><img name="" src="images/<?php echo $logo;?>" width="40" height="40" alt="" />
          <input type="file" name="file[]" id="file[]" class="dilaw"/></td>
        <td width="39%">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Template:</td>
        <td>&nbsp;</td>
        <td><select name="template" id="template" >
          <option value="style.css" <?php echo $selected1; ?>>Default Green</option>
          <option value="style1.css" <?php echo $selected2; ?>>Blue</option>
          <option value="style2.css" <?php echo $selected5; ?>>Ubuntu</option>
        </select></td>
        <td></td>
      </tr>
    <!-- <tr>
        <td align="right">Footer:</td>
        <td>&nbsp;</td>
        <td><input name="footer" type="text" id="footer" value="<?php echo $footer;?>" size="40" class="dilaw"/></td>
        <td>&nbsp;</td>
      </tr>-->
      <tr>
        <td align="right">Hours allowed for borrowed books:</td>
        <td>&nbsp;</td>
        <td><input name="hour_allow" type="text" id="hour_allow" value="<?php echo $hour_allow;?>" size="5" class="dilaw"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Auto setting of borrowers ID</td>
        <td>&nbsp;</td>
        <td>
          <input type="radio" name="auto"   value="1" <?php echo $selected3; ?>/>
          ON
          <input type="radio" name="auto"  value="0" <?php echo $selected4; ?>/>
          OFF</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Auto deadline for books borrowed</td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="radio" name="auto1"   value="1" <?php echo $selected6; ?>/>
          ON
          <input type="radio" name="auto1"  value="0" <?php echo $selected7; ?>/>
          OFF&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td align="right">Fines per hour: </td>
        <td>&nbsp;</td>
        <td><label>
          <input name="overdue_price" type="text" class="dilaw" id="overdue_price" value="<?php echo $overdue_price;?>" size="5"/>
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Book limit per borrower: </td>
        <td>&nbsp;</td>
        <td><input name="book_limit" type="text" class="dilaw" id="book_limit" value="<?php echo $book_limit;?>" size="5"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Record per page:</td>
        <td>&nbsp;</td>
        <td><input name="rec_per_page" type="text" class="dilaw" id="rec_per_page" value="<?php echo $rec_per_page;?>" size="5"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Change all" class="btn"/></td>
        <td>
          <input name="op" type="hidden" id="op" value="1" />       </td>
      </tr>
    </table>
    </form>
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
<?php echo $system_title;?><br /><?php echo $footer;?>
</div>
</body>
</html>