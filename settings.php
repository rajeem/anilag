<?php 
  session_start();
  if(!isset($_SESSION["username"])){
    header("location:admin_login.php");
    exit;
  }
  include("include/connect.php");
  include("user.php");
  include("include/gensettings.php");
  $op=0;
  $selected3 = "";
  $selected7 = "";
  $selected99 = "";
  $selected9 = "";
  $selected11 = "";
  $selected15 = "";

  //authorized
  if($uri=="admin"){
    if($_POST['op']==1){
      $save_css		=$_POST['template'];
      $hour_allow		=$_POST['hour_allow'];
      $rate = $_POST['rate'];
      $sat = isset($_POST['sat']);
      $sun = isset($_POST['sun']);
      $auto			=$_POST['auto'];
      $auto_deadline	=$_POST['auto1'];
      $header			=$_POST['header'];
      $overdue_price	=$_POST['overdue_price'];
      $search_output	=$_POST['search_output'];
      $location2	=$_POST['location2'];
      $author_card	=$_POST['author_card'];
      $title_card	=$_POST['title_card'];
      $rec_per_page	=$_POST['rec_per_page'];
      $default_school=$_POST['school_code'];
      $book_preview	=$_POST['bp'];
      
      $sql="UPDATE settings set css='$save_css',hour_allow='$hour_allow',auto_id='$auto',header_title='$header',auto_deadline='$auto_deadline',rate='$rate',sat='$sat',sun='$sun',location2='$location2',author_card='$author_card',title_card='$title_card',
          overdue_price='$overdue_price',search_output='$search_output',rec_per_page='$rec_per_page',default_school='$default_school',book_preview='$book_preview'";
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
    //for getting default school
      $sql2="SELECT * FROM settings";
      $nyoy=mysql_query($sql2,$connect)or die("cant execute query for default school");
      $row=mysql_fetch_array($nyoy);
      $dschool_code=$row['default_school'];
      //$book_preview=$row['book_preview'];
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


    //Fine Rate
    if($rate==1){
      $selected8='checked="checked"';
    }

    if($rate==0){
      $selected9='checked="checked"';
    }

    //araw inclusion
    if($sat=="on"){
      $selected10='checked="checked"';
    }

    if($sun=="on"){
      $selected11='checked="checked"';
    }

    //search output style
    if($search_output==1){
      $selected12='selected="selected"';
    }

    if($search_output==2){
      $selected13='selected="selected"';
    }

    //book preview
    if($book_preview=="on"){
      $selected98='checked="checked"';
    }

    if($book_preview=="off"){
      $selected99='checked="checked"';
    }
    //echo $auto_deadline;


    //detail location
    if($location2=="on"){
      $selected15='checked="checked"';
    }
    if($author_card=="on"){
      $selected16='checked="checked"';
    }
    if($title_card=="on"){
      $selected17='checked="checked"';
    }
  }
  else {
    $msg_mo ="You are not allowed to access this page!";
    $op=2;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $header_title;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
</head>
<body>
<div class="header">
  <div class="logo">
    <div id="Layer1"><img src="images/<?php echo $logo;?>" /></div>
  <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$header_title;?></div>
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
    
	  <h2>Settings&nbsp;&nbsp;&nbsp;<?php if ($uri=="admin")echo '<a href="create_account.php">Accounts</a>'; else echo "Accounts";?> |<?php if ($uri=="admin")echo '<a href="groups.php">User Groups</a>'; else echo "User";?>|<?php if ($uri=="admin")echo '<a href="school.php">Participating School(s) </a>'; else echo "Participating School(s)";?> |<?php if ($uri=="admin")echo '<a href="material_type.php">Material Type</a>'; else echo "Material Type";?> </h2>
  <?php if($op==0){?>
    <form action="settings.php" method="post"  name="supportform" enctype="multipart/form-data">
    <table width="100%" border="0">
      <tr>
        <td width="20%">&nbsp;</td>
		<td width="2%" align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><?php echo $alert; ?></td>
      </tr>
      <tr>
       
		<td width="20%" align="right">Name/Header:</td>
        <td width="2%">&nbsp;</td>
        <td colspan="2"><input name="header" type="text" id="header" value="<?php echo $header_title;?>" size="40" class="dilaw"/></td>
        </tr>
      <tr>
        <td align="right">Logo:</td>
        <td>&nbsp;</td>
        <td width="58%" valign="middle"><img name="" src="images/<?php echo $logo;?>" width="40" height="40" alt="" />
          <input type="file" name="file[]" id="file[]" class="dilaw"/></td>
        <td width="20%">&nbsp;</td>
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
        <td align="right">Book Preview</td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="radio" name="bp"   value="on" <?php echo $selected98; ?>/>
          ON
          <input type="radio" name="bp"  value="off" <?php echo $selected99; ?>/>
          OFF&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Default School for Search</td>
        <td>&nbsp;</td>
        <td colspan="2"><select name="school_code" id="school_code">
              <?php 
			$i=0;
			$sql="SELECT school_code from school order by school_code"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$code = $row['school_code'];
?>
              <option <?php if ($dschool_code=="$code") echo selected;?>><?php echo $code;?></option>
              <?php $i++; }?>
            </select></td>
        </tr>
		 <tr>
        <td align="right">Fines Rate </td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="radio" name="rate" value="1" <?php echo $selected8;?>/>Per Day
		<input type="radio" name="rate" value="0" <?php echo $selected9;?>/>
		Per Hour </td>
        </tr>
		 <tr>
        <td align="right">Cost</td>
        <td>&nbsp;</td>
        <td colspan="2"><input name="overdue_price" type="text" class="dilaw" id="overdue_price" value="<?php echo $overdue_price;?>" size="5"/></td>
        </tr>
		 <tr>
        <td align="right">Days Inclusion </td>
        <td>&nbsp;</td>
        <td colspan="2">
          <input type="checkbox" name="sat" value="on" <?php echo $selected10;?>>Including Saturday
          <input type="checkbox" name="sun" value="on" <?php echo $selected11;?>>Including Sunday
        </td>
      </tr>
		
      <tr>
        <td align="right">Search output style: </td>
        <td>&nbsp;</td>
        <td><select name="search_output" id="search_output" >
          <option value="1" <?php echo $selected12; ?>>Complete</option>
          <option value="2" <?php echo $selected13; ?>>List</option>
                        </select></td>
        <td>&nbsp;</td>
		 <tr>
        <td align="right">Location Detail</td>
        <td>&nbsp;</td>
        <td colspan="2"> <input type="checkbox" name="location2" value="on" <?php echo $selected15;?>/>
		Location </td>
        </tr>
 <tr>
        <td align="right">Card Catalog  </td>
        <td>&nbsp;</td>
        <td colspan="2"> <input type="checkbox" name="author_card" value="on" <?php echo $selected16;?>>
        Author Card
          <input type="checkbox" name="title_card" value="on" <?php echo $selected17;?>/>
		Title Card </td>
        </tr>
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
    </form><?php }?>
    <p><a href="index.php"></a></p>
    <?php if($op==2){
	?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td align="right"><a href="home.php">back to Home Page</a></td>
        <td colspan="2" align="left"><?php echo $msg_mo;?></td>
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

	<hr />
			     <p>&nbsp;</p>
	<p>&nbsp;</p>
  </div>
</div>
<div class="lowercontent"></div>
<div class="footer">
  <p><?php echo $footer;?></p>
</div>
</body>
</html>