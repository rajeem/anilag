<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
$op = 1;
include("include/connect.php");
include("include/gensettings.php");
include("user.php");

if($_POST['add']){
$name =$_POST['name'];
    $id =$_POST['id'];
    $lname =$_POST['last'];
	$fname =$_POST['first'];
$mname =$_POST['middle'];
$password =$_POST['password'];
//$password = md5($password);
$usertype =$_POST['type'];

$sql = "select * from user where username = '$name' || password = '$password'";
$result = mysql_query($sql,$connect) or die("cant execute query!".mysql_error());
	if (mysql_num_rows($result) != 0){				// if already exists
$op= 2;
} 	else{
	
$sql="INSERT INTO user
			(username,password,first1,last1,middle1,type) values('$name','$password','$fname','$lname','$mname','$usertype')";
	$result=mysql_query($sql,$connect) or die("cant execute query!".mysql_error());
	$op=3;
	
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script type="text/JavaScript">
<!--
function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<script type="text/JavaScript">
<!--
function FormValidate(){

if (document.myform.name.value == ""){
alert("Enter the username!");
document.myform.name.focus();
return false;}

if (document.myform.first.value == ""){
alert("Enter the firstname!");
document.myform.first.focus();
return false;}

if (document.myform.last.value == ""){
alert("Enter the Last Name!");
document.myform.last.focus();
return false;}


if (document.myform.middle.value == ""){
alert("Enter the username!");
document.myform.middle.focus();
return false;}

if (document.myform.password.value == ""){
alert("Enter the user password!");
document.myform.password.focus();
return false;}

}

//-->
</script>

<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<title><?php echo $system_title."--".$footer;?></title>

<link rel="stylesheet" href="css/<?php echo $css;?>" type="text/css" />

<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
</head>

<body>

<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;".$header_title;?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo;?>" width="117" height="110" />
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
<!-- Start of New Item Description -->

<div id="new_item202">
 <fieldset><legend class="style1">Create Account</legend>
<?php if($op==1){?>
	  <form action="add_account.php" method="post" id="myform" name="myform">
		    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
                <td width="25%" align="right"><strong>Username:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
                <input name="name" type="text" id="name" /></td>
              </tr>
              <tr>
                <td align="right"><strong>Lastname:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><input name="last" type="text" id="last" /></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Firstname:</strong></td>
                <td>&nbsp;</td>
                <td><input name="first" type="text" id="first" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Middle Name:</strong></td>
                <td>&nbsp;</td>
                <td><input name="middle" type="text" id="middle"/></td>
                <td>&nbsp;</td>
              </tr>
			  
              <tr>
                <td align="right"><strong>User Type:</strong></td>
                <td>&nbsp;</td>
                <td><select name="type" id="type"> <?php 
			$i=0;
			$sql="SELECT type from usergroup order by type"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$usertype = $row['type'];
?>
			<option><?php echo $usertype;?></option>
<?php $i++; }?></select></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>password:</strong></td>
                <td>&nbsp;</td>
                <td><input name="password" type="password" id="password" /></td>
                <td>&nbsp;</td></tr>
			  <tr>
                <td align="right" class="style2"><input name="Reset" type="reset" value="Reset" class="btn"/></td>
                <td>&nbsp;</td>
                <td class="style2"><input type="submit" name="add" id="add" value="Add Account"  class="btn"  onClick=" return FormValidate()"/></td>
                <td>&nbsp;</td>
              </tr>
            </table>
	  </form><?php }?>
	  
	  <?php if($op==2){ echo " Username or password already taken!";?>
	  <form action="add_account.php" method="post" id="myform" name="myform">
		    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
                <td width="25%" align="right"><strong>Username:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
                <input name="name" type="text" id="name" /></td>
              </tr>
              <tr>
                <td align="right"><strong>Lastname:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><input name="last" type="text" id="last" /></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Firstname:</strong></td>
                <td>&nbsp;</td>
                <td><input name="first" type="text" id="first" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Middle Name:</strong></td>
                <td>&nbsp;</td>
                <td><input name="middle" type="text" id="middle"/></td>
                <td>&nbsp;</td>
              </tr>
			  
              <tr>
                <td align="right"><strong>User Type:</strong></td>
                <td>&nbsp;</td>
                <td><select name="type" id="type"> <?php 
			$i=0;
			$sql="SELECT type from usergroup"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$usertype = $row['type'];
?>
			<option><?php echo $usertype;?></option>
<?php $i++; }?></select></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>password:</strong></td>
                <td>&nbsp;</td>
                <td><input name="password" type="password" id="password" /></td>
                <td>&nbsp;</td></tr>
			  <tr>
                <td align="right" class="style2"><input name="Reset" type="reset" value="Reset" class="btn"/></td>
                <td>&nbsp;</td>
                <td class="style2"><input type="submit" name="add" id="add" value="Add Account"  class="btn"  onClick=" return FormValidate()"/></td>
                <td>&nbsp;</td>
              </tr>
            </table>
	  </form><?php }?>

	  <?php if ($op == 3){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully added!&nbsp;&nbsp;<a href="create_account.php" >Back to Account Page</a> </td>

        </tr>
			  <tr>
			  
                <td width="25%" align="right"><strong>Username:</strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2">
				<input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
				<?php echo $username;?></td>
              </tr>
              <tr>
                <td align="right"><strong>Lastname:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $lname;?></td>
                <td width="4%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Firstname:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $fname;?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><strong>Middle Name:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $mname;?></td>
                <td>&nbsp;</td>
              </tr>
			  
              <tr>
                <td align="right"><strong>User Type</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $usertype;?></td>
                <td>&nbsp;</td></tr>
              <tr>
                <td align="right"><strong>password:</strong></td>
                <td>&nbsp;</td>
                <td><?php echo $password;?></td>
                <td>&nbsp;</td></tr>
			 </table>
<?php }?>	  
    </fieldset>�</div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>
