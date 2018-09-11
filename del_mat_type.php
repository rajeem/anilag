<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
$id=$_GET['id'];
$mat_type=$_GET['mat_type'];
$op=0;
include("include/connect.php");
include("include/gensettings.php");

$sql = "SELECT * FROM card_cat where gmd='$mat_type'";
		$result	=mysql_query($sql,$connect) or die("cant execute query!.....2");
		$row2 = mysql_num_rows($result); 
		if ($row2!=0){
		$message="<h2>You cannot erase this material type. There are $row2 items of type $mat_type!</h2> <Br>";
		$op=2;}
else{

$sql="SELECT * from material_type where id = $id"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$mat_type = $row['mat_type'];
$desc = $row['description'];

}
}

if($_POST['delete']){
$id=$_POST['id'];
$mat_type =$_POST['type'];
    $desc =$_POST['desc'];

$sql="SELECT * from material_type where id = $id"; 
$result = mysql_query($sql); 
$row=mysql_fetch_array($result);
$mat_type = $row['mat_type'];
$desc = $row['description'];

$sql="DELETE from material_type WHERE id='$id'"; 
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
 <legend class="style1">Delete Material Type</legend>
 <?php if($op==0){?>
	  <form action="del_mat_type.php" method="post" id="myform" name="myform">
		    <table width="73%" border="0" cellpadding="5" cellspacing="5">
             
			  <tr>
			  
                <td width="25%" align="right"><strong>Material Type: </strong></td>
               
                <td colspan="3"><input name="id" type="hidden" id="id" value="<?php echo $id;?>" /><input name="type" type="text" id="type"   size="40" value="<?php echo $mat_type;?>"/></td>
              </tr>
              <tr>
                <td align="right"><strong>Description: </strong></td>
                <td  colspan="3"><input name="desc" type="text" id="desc"   size="40" value="<?php echo $desc;?>"/></td>
              
              </tr>
				<tr>
                <td align="right"><input name="Submit" type="submit" onClick="document.myform.action ='material_type.php';" value="Cancel" class="btn"/></td>
                
                <td colspan="3"><input type="submit" name="delete" id="delete" value="Delete"class="btn"/></td>
                
              </tr>
	    </table>
	  </form><?php }?>
	  <?php if ($op == 1){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2">The Record is successfully deleted! &nbsp;<a href="material_type.php" >Back to List Material Type Page </a> </td>

        </tr>
			  <tr>
			  
                <td width="25%" align="right"><strong>Material Type: </strong></td>
                <td width="2%">&nbsp;</td>
                <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
				<?php echo $mat_type;?></td>
              </tr>
              <tr>
                <td align="right"><strong>Description:</strong></td>
                <td>&nbsp;</td>
                <td width="67%"><?php echo $desc;?></td>
                <td width="4%">&nbsp;</td>
              </tr>
             
				 </table>
<?php }?>	


 <?php if ($op == 2){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>
        <td  colspan="4"  class="style2"><?php echo $message;?> &nbsp;&nbsp;<a href="material_type.php" >Back to Material Type Page</a></td>

        </tr>
			 </table>
<?php }?>	  
  
    </fieldset>�</div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>