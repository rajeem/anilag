<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
$id=$_GET['id'];
$school_code=$_GET['school_code'];


$op=0;
include("include/connect.php");
include("include/gensettings.php");

$sql = "SELECT * FROM barrower where school_code='$school_code'";
		$result	=mysql_query($sql,$connect) or die("cant execute query!.....2");
		$row2 = mysql_num_rows($result); 
		if ($row2!=0){
		$message="<h2>You cannot erase this account. There are $row2 person(s) enrolled at $school_code school !</h2> <Br>";
		$op=2;}
else{

$sql="SELECT * from school where id = $id"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$school_name = $row['school_name'];
$school_code = $row['school_code'];
}
}
if($_POST['delete']){
$id=$_POST['id'];
$school_name =$_POST['name'];
    $school_code =$_POST['code'];
	
$sql="SELECT * from school where id = $id"; 
$result = mysql_query($sql); 
$row=mysql_fetch_array($result);
$school_name = $row['school_name'];
$school_code = $row['school_code'];

$sql="DELETE from school WHERE id='$id'"; 
mysql_query($sql) or die("cant execute query"); 
	$op = 1;
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
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<title><?php echo $system_title."--".$footer;?></title>

<link rel="stylesheet" href="css/<?php echo $css;?>" type="text/css" />

<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
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
 <fieldset>
 <legend class="style1">Delete School </legend>
 <?php if($op==0){?>
	  <form action="del_school.php" method="post" id="myform" name="myform">
		    <table width="63%" border="0" cellpadding="5" cellspacing="5">
             
			  <tr>
			  
                <td width="25%" align="right"><strong>School name </strong></td>
               
                <td colspan="3"><input name="id" type="hidden" id="id" value="<?php echo $id;?>" /><input name="name" type="text" id="name"   size="40" value="<?php echo $school_name;?>"/></td>
              </tr>
              <tr>
                <td align="right"><strong>School code </strong></td>
                <td  colspan="3"><input name="school_code" type="hidden" id="id" value="<?php echo $school_code;?>" /><input name="code" type="text" id="code"   size="40" value="<?php echo $school_code;?>"/></td>
              
              </tr>
				<tr>
                <td align="right"><input name="Submit" type="submit" onClick="document.myform.action ='school.php';" value="Cancel" class="btn"/></td>
                
                <td colspan="3"><input type="submit" name="delete" id="delete" value="Delete"class="btn"/></td>
                
              </tr>
	    </table>
	  </form><?php }?>
	  <?php if ($op == 1){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully deleted! &nbsp;<a href="school.php" >Back to List School Page</a> </td>

        </tr>
			  <tr>
			  
                <td width="25%" align="right"><strong>School name : </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
				<?php echo $school_name;?></td>
              </tr>
              <tr>
                <td align="right"><strong>School code  :</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $school_code;?></td>
                <td width="4%">&nbsp;</td>
              </tr>
             
				 </table>
<?php }?>	

 <?php if ($op == 2){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2"><?php echo $message;?> &nbsp;&nbsp;<a href="school.php" >Back to School Page</a></td>

        </tr>
			 </table>
<?php }?>	  
  
    </fieldset>�</div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>