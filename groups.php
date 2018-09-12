<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";

//############PAGINATION ################
/**Set current,
 *prev and next page
 */
$page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
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
$sql = "SELECT * from usergroup order by type";
$result = mysql_query($sql);

$total_results = mysql_num_rows($result);
$number = $total_results;
$total_pages = ceil($total_results / $max_results);
//echo $total_results;
$pagination = '';

/* Create a PREV link if there is one */
if ($page > 1) {
    //pass the values of the $txt variables
    $pagination .= '<a href="groups.php?page=' . $prev . '"
	title="Previous"> &lt;Previous</a> ';
} else {
    $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
}
// Loop through the total pages
for ($i = 1; $i <= $total_pages; $i++) {
    if (($page) == $i) {
        $pagination .= $i;
    } else {
        $pagination .= '&nbsp;<a href="groups.php?page=' . $i . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
    }
}

/* Print NEXT link if there is one */
if ($page < $total_pages) {
    $pagination .= '<a href="groups.php?page=' . $next . '"
	title="Next">Next &gt;</a>';

} else {
    $pagination .= '&nbsp;<strong>Next &gt;</strong>';
}

$sql .= " LIMIT $from, $max_results";
$result = mysql_query($sql, $connect) or die("cant execute query!.....");
$mga_resulta = mysql_num_rows($result);
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

<title><?php echo $system_title . "--" . $footer; ?></title>

<link rel="stylesheet" href="css/<?php echo $css; ?>" type="text/css" />
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
	<!-- Start of Page Menu -->
    <!-- End of Page Menu -->
    <!-- Start of Left Sidebar -->
    <!-- End of Left Sidebar -->
    <!-- Start of Main Content Area -->
<div id="main_content202">

		<!-- Start of New Item Description -->

<div id="new_item202">
 <fieldset>
 <legend class="style1">Groups</legend>
	  <form name="myform" method="post"  action="groups.php" id="myform">
	  <table width="99%" border="0" cellpadding="5" cellspacing="5">
	  <tr>
          <td colspan="13"><?php

if (strlen($pagination) < 100) {
    $pagination = "";
}
echo $pagination;?></td>

        </tr>
		<?php if ($total_resuts != 0) {echo '<strong><img src="images/arrowr.gif" width="15" height="9" /> We have  </strong>
		<strong>' . $total_results . ' User Group(s) in this system</strong><br><br><hr/>';}?>


        <tr>
          <td height="30" class="style2" colspan="13" align="left"><a href="add_group.php">Add New Group </a></td>
        </tr>
        <tr align="center">
          <td colspan="2"><strong>Function</strong></td>
          <td width="15%"><strong>User Group </strong></td>
          <td width="9%"><strong>Add Book </strong></td>
          <td width="14%"><strong>Edit Book </strong></td>
          <td width="14%"><strong>Delete Book </strong></td>
          <td width="11%"><strong>Borrow Book </strong></td>
          <td width="10%"><strong>Max No </strong></td>
          <td width="12%"><strong>Add Borrower </strong></td>
          <td width="13%"><strong>Edit Borrower </strong></td>
          <td width="13%"><strong>Delete Borrower </strong></td>
		   <td width="13%"><strong>Show Borrower </strong></td>
		    <td width="13%"><strong>Upload Photo </strong></td>
		    <td width="13%"><strong>Remove Photo </strong></td>
        </tr>
        <?php
$x = 2;
$y = 1;
while ($row = mysql_fetch_array($result)) {
    $id = $row['id'];
    $usertype = $row['type'];
    $add_book = $row['add_book'];
    $edit_book = $row['edit_book'];
    $del_book = $row['del_book'];
    $borrow_book = $row['borrow_book'];
    $max_no = $row['max_no'];
    $add_borrower = $row['add_borrower'];
    $edit_borrower = $row['edit_borrower'];
    $del_borrower = $row['del_borrower'];
    $show_borrower = $row['show_borrower'];
    $upload_file = $row['upload'];
    $remove_file = $row['remove'];

    if ($x > $y) {
        $y += 2;
        $bg = "#ECE9D8";

    } else {
        $x += 2;
        $bg = "#Ffffff";
    }

    ?>
        <tr>
          <td width="7%" bgcolor="<?php echo $bg; ?>" align="right"><div align="center"><strong> <a href="edit_group.php?id=<?php echo $id; ?>">Edit</a></strong></div></td>
          <td width="9%" bgcolor="<?php echo $bg; ?>"><div align="center"><strong> <a href="del_group.php?id=<?php echo $id; ?>&amp;type=<?php echo $usertype; ?>">Delete</a></strong></div></td>
          <td bgcolor="<?php echo $bg; ?>"><div align="center">
           <?php echo $usertype; ?>
          </div></td>
          <td bgcolor="<?php echo $bg; ?>"> <div align="center">
              <input name="add_book" id="add_book" type="checkbox" <?php if ($add_book == "on") {
        echo "checked";
    }
    ?> />
          </div></td>
          <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="edit_book" id="edit_book" type="checkbox"
		<?php if ($edit_book == "on") {
        echo "checked";
    }
    ?> />
          </div></td>
		  <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="del_book" id="del_book" type="checkbox"
		<?php if ($del_book == "on") {
        echo "checked";
    }
    ?> />
          </div></td>
          <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="borrow_book" id="borrow_book" type="checkbox"
			<?php if ($borrow_book == "on") {
        echo "checked";
    }
    ?>/>
          </div></td>
          <td bgcolor="<?php echo $bg; ?>" ><div align="center">
            <?php echo $max_no; ?>
          </div></td>
          <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="add_borrower" id="add_borrower" type="checkbox"
		<?php if ($add_borrower == "on") {
        echo "checked";
    }
    ?> />
          </div></td>
          <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="edit_borrower" id="edit_borrower" type="checkbox"
				<?php if ($edit_borrower == "on") {
        echo "checked";
    }
    ?>/>
          </div></td>
		   <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="del_borrower" id="del_borrower" type="checkbox"
				<?php if ($del_borrower == "on") {
        echo "checked";
    }
    ?>/>
          </div></td>
		  <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="show_borrower" id="show_borrower" type="checkbox"
				<?php if ($show_borrower == "on") {
        echo "checked";
    }
    ?>/>
          </div></td>
		  <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="upload_file" id="upload_file" type="checkbox"
				<?php if ($upload_file == "on") {
        echo "checked";
    }
    ?>/>
          </div></td>
		  <td bgcolor="<?php echo $bg; ?>"><div align="center">
            <input name="remove_file" id="remove_file" type="checkbox"
				<?php if ($remove_file == "on") {
        echo "checked";
    }
    ?>/>
          </div></td>
        </tr>
        <?php }?>
		<tr>
          <td colspan="13"><?php

if (strlen($pagination) < 100) {
    $pagination = "";
}
echo $pagination;?></td>

        </tr>
		<?php if ($total_resuts == 0) {echo '<strong><img src="images/arrowr.gif" width="15" height="9" /> We have  </strong>
		<strong>' . $total_results . '  User Group(s) in this system</strong><br><br><hr/>';}?>


      </table>
</form>
    </fieldset></div></div>

  <!-- End of New Item Description -->
  <!-- Start of Sub Item Descriptions -->
</body>
</html>