<?php 
session_start();
if(!isset($_SESSION["username"])){
header("location:admin_login.php");
exit;
}
include("include/connect.php");
include("include/gensettings.php");

  //############PAGINATION ################	
	/**Set current, 
  *prev and next page 
  */ 
$page = (!isset($_GET['page']))? 1 :$_GET['page']; 
$prev = ($page - 1); 
$next = ($page + 1); 

/**Max results 
  *per page 
  */ 
$max_results = $rec_per_page; 
/* Calculate the offset */ 
$from = (($page * $max_results) - $max_results); 
/**Query the db for total 
  *results. You need to edit
  *the sql to fit your needs 
  */ 
$sql="SELECT * from school order by school_name"; 
$result = mysql_query($sql); 

$total_results  = mysql_num_rows($result); 
$number			=$total_results;
$total_pages    = ceil($total_results / $max_results); 
//echo $total_results;
$pagination = ''; 

	/* Create a PREV link if there is one */ 
	if($page > 1) 
	{ 
	//pass the values of the $txt variables
	$pagination .= '<a href="school.php?page='.$prev.'"
	title="Previous"> &lt;Previous</a> '; 
	}
	else{
		$pagination .= '<strong> &lt;Previous</strong>&nbsp;'; 
	} 
	// Loop through the total pages 
	for($i = 1; $i <= $total_pages; $i++) 
	{ 
		if(($page) == $i) { 
		$pagination .= $i; 
		} 
		else { 
		$pagination .= '&nbsp;<a href="school.php?page='.$i.'" title="page '.$i.'">' .$i. '</a>&nbsp;'; 
		} 
	} 


	/* Print NEXT link if there is one */ 
	if($page < $total_pages) 
	{ 
	$pagination .= '<a href="school.php?page='.$next.'"
	title="Next">Next &gt;</a>'; 

	} 
	else{
	$pagination .= '&nbsp;<strong>Next &gt;</strong>'; 
	} 



$sql.=" LIMIT $from, $max_results"; 
$result	=mysql_query($sql,$connect) or die("cant execute query!.....");
$mga_resulta  = mysql_num_rows($result); 
//echo $mga_resulta;
//echo $sql;

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

<body >
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
	<!-- Start of Page Menu -->
    <!-- End of Page Menu -->
    <!-- Start of Left Sidebar -->
    <!-- End of Left Sidebar -->
    <!-- Start of Main Content Area -->
<div id="main_content202">

		<!-- Start of New Item Description -->

<div id="new_item202">
 <fieldset>
 <legend class="style1">List of School(s)</legend>
	  <form action="create_school.php" method="post" id="myform" name="myform">
	    <table width="83%" border="0" cellpadding="5" cellspacing="5">
		 <tr>
          <td colspan="11"><?php
				 
				 if (strlen($pagination)<100){
					$pagination="";
				 } 
				  echo $pagination;?></td>
          
        </tr>
		<?php if($total_resuts!=0){ echo '<strong><img src="images/arrowr.gif" width="15" height="9" /> We have  </strong>
		<strong>'.$total_results.' participating school(s)</strong><br><br><hr/>';}?>
		
                
          <tr>
            <td height="30" class="style2" colspan="4" align="left"><a href="add_school.php">Add New School </a></td>
          </tr>
          <tr align="center">
            <td colspan="2"><strong>Function</strong></td>
            <td width="44%"><strong>School Name </strong></td>
            <td width="35%"><strong>School Code </strong></td>
            
          </tr>
          <?php 
				$x=2;
		$y=1;	
			
while($row=mysql_fetch_array($result)){
$id = $row['id'];
$school_name = $row['school_name'];
$school_code = $row['school_code'];

if($x>$y){
				$y+=2;
				$bg="#ECE9D8";

				}
				else{
				$x+=2;
				$bg="#Ffffff";
				}
?>
          <tr>
            <td width="9%" bgcolor="<?php echo $bg;?>" align="right"><div align="center"><strong> <a href="edit_school.php?id=<?php echo $id;?>">Edit</a></strong></div></td>
            <td width="12%" bgcolor="<?php echo $bg;?>"><div align="center"><strong><a href="del_school.php?id=<?php echo $id;?>&amp;school_code=<?php echo $school_code;?>">Delete</a></strong></div></td>
            <td bgcolor="<?php echo $bg;?>"><div align="center"><?php echo $school_name;?></div></td>
            <td bgcolor="<?php echo $bg;?>"><div align="center"><?php echo $school_code;?></div></td>
            
          </tr>
          <?php  }?>
		  <tr>
          <td colspan="4"><?php
				 
				 if (strlen($pagination)<100){
					$pagination="";
				 } 
				  echo $pagination;?></td>
          
        </tr>
		<?php if($total_resuts==0){ echo '<strong><img src="images/arrowr.gif" width="15" height="9" /> We have  </strong>
		<strong>'.$total_results.'  participating school(s)</strong><br><br><hr/>';}?>
		
                 
        </table>
	  </form>
    </fieldset>�</div></div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>