<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";
include "include/function.php";
include "user.php";

//if delete has been clicked
if ($_GET['id']) {

//authorized
    if ($del_book == "on") {

        $id = $_GET['id'];

        $s = "DELETE FROM income WHERE id='$id'";
        mysql_query($s, $connect) or die("cant execute query!....2.");
        $message = "You have successfully deleted an item in the income table!";
    } else {
        $message = "You are not allowed to delete an item in the Income table!";
    }

} // if delete link is clicked
$window = 1;
//#################################################################################################
//default income
$total_income = 0;

//collection with date range
if (isset($_POST['op'])) {
    $type_code = $_POST['type'];
    $start = $_POST['start'];
    $end = $_POST['ending'];

    $_SESSION['borrow_type'] = $_POST['type']; //school code
    $_SESSION['start'] = $_POST['start']; //start date
    $_SESSION['ending'] = $_POST['ending']; //end date

    $s = date($start);
    $e = date($end);

//if school code is equal to all
    if (($start != "") && ($end != "")) {
        $sql = "select * from income  where pay_date BETWEEN
	'$start' AND '$end' order by pay_date,id";
        $sql2 = "select * from income  where pay_date BETWEEN
	'$start' AND '$end' order by pay_date,id";
        $income_msg = "Total Income from " . $start . " to " . $end;

    } else {
        $sql = "select * from income order by pay_date,id";
        $sql2 = "select * from income order by pay_date,id";
        $income_msg = "Total Income";
    }
}
if ($_POST['op'] != 1) {
    $sql = "select * from income order by pay_date,id";
    $sql2 = "select * from income order by pay_date,id";
    $income_msg = "Total Income";
}

//compute total income
$nyoy = mysql_query($sql2, $connect) or die(mysql_error());

while ($rownyoy = mysql_fetch_array($nyoy)) {
    $total_amount = $rownyoy['total_amount'];
    $total_income = $total_income + $total_amount;
}

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
$result = mysql_query($sql) or die(mysql_error());

$total_results = mysql_num_rows($result);
$number = $total_results;
$total_pages = ceil($total_results / $max_results);

$pagination = '';

/* Create a PREV link if there is one */
if ($page > 1) {
    //pass the values of the $txt variables
    $pagination .= '<a href="show_collection.php?sql=' . $sql . '&page=' . $prev . '"
	title="Previous"> &lt;Previous</a> ';
} else {
    $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
}
// Loop through the total pages
for ($i = 1; $i <= $total_pages; $i++) {
    if (($page) == $i) {
        $pagination .= $i;
    } else {
        $pagination .= '&nbsp;<a href="show_collection.php?type=' . $type . '&sql=' . $sql . '&search=' . $search . '&page=' . $i . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
    }
}

/* Print NEXT link if there is one */
if ($page < $total_pages) {
    $pagination .= '<a href="show_collection.php?type=' . $type . '&sql=' . $sql . '&search=' . $search . '&page=' . $next . '"
	title="Next">Next &gt;</a>';

} else {
    $pagination .= '&nbsp;<strong>Next &gt;</strong>';
}

//############PAGINATION END################
//echo $from;
//echo $max_results;
//perform the query

$sql .= " LIMIT $from, $max_results";
$result2 = mysql_query($sql) or die(mysql_error());
$number = mysql_num_rows($result2);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>

<SCRIPT language=javascript>

	//-->
	function trash()
	{

    var answer = confirm("Are you sure you wish to delete this item?\n Click OK to proceed otherwise click Cancel.")
	if (!answer){

		return false;
	}

    document.supportform.action = "show_collection.php"
	document.supportform.method="post"
    document.supportform.submit();

    return true;
}
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
</head>
<body >
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
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;Income Collection </h2>
	<form id="form1" name="myform" method="post" action="show_collection.php">
     <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
		<td colspan="3"><strong>Enter the date:(yyyy-mm-dd) format </strong></td>

          <td width="11%">&nbsp;</td>
          <td width="9%">&nbsp;</td>
          <td width="23%">&nbsp;</td>
        </tr>
        <tr>
          <td width="19%" valign="top"><strong>Start</strong> <input type="text" name="start" id="start"  size="10" value="<?php echo $start; ?>"/></td>
          <td width="18%" valign="top"><strong>End</strong> <input type="text" name="ending" id="ending"  size="10" value="<?php echo $end; ?>"/></td>
          <td width="20%" valign="top"><input name="submit" type="submit" class="btn"  value="Search"/></td>
          <td valign="top">&nbsp;</td>
          <td><a href="show_book_borrow.php?show=do"></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
	<p>
	 <?php
display_pagination($pagination);
?>
      <a href="show_collection.php"></a></p>
    <?php
if ($window == 1) {
    //output if there is
    if (mysql_num_rows($result2) != 0) {
        echo '<img src="images/arrowr.gif" width="15" height="9" />You have  <strong>' . $total_results . '</strong> transactions made<br><br><hr/>';

        ?>
    <table width="100%" border="0">
                   <tr>
                     <td colspan="2"><h3><strong>INCOME RECORDS </strong></h3></td>
                     <td  colspan="3"><?php echo $message; ?></td>
                     <td width="7%">&nbsp;</td>
                     <td width="1%">&nbsp;</td>
                   </tr>
                   <tr>
                     <td width="16%"><div align="center"><strong>Borrower's ID</strong></div></td>
                     <td width="16%"><div align="center"><strong>Payable</strong></div></td>
                     <td width="18%"><div align="center"><strong>Deduction</strong></div></td>

                     <td width="13%"><div align="center"><strong>Amount Paid</strong></div></td>
                     <td width="29%"><div align="center"><strong>Pay Date</strong></div></td>
                  </tr>
				   <?php

        $x = 2;
        $y = 1;
        $i = 0;
        while ($row = mysql_fetch_array($result2)) {

            $id = $row['id'];
            $bar_id = $row['bar_id'];
            $subtotal = $row['subtotal'];
            $deduct = $row['deduct'];
            $total_amount = $row['total_amount'];
            $pay_date = $row['pay_date'];

            if ($x > $y) {
                $y += 2;
                $bg = "#ECE9D8";

            } else {
                $x += 2;
                $bg = "#Ffffff";
            }

            ?>



                   <tr >
                     <td bgcolor="<?php echo $bg; ?>"><div align="center"><b><?php echo $bar_id; ?> </b></div></td>
                     <td bgcolor="<?php echo $bg; ?>"><div align="center">P&nbsp;<?php echo $subtotal; ?></div></td>
                     <td bgcolor="<?php echo $bg; ?>"><div align="center">P&nbsp;<?php echo $deduct; ?></div></td>

                     <td bgcolor="<?php echo $bg; ?>"><div align="center">P&nbsp;<?php echo $total_amount; ?></div></td>
                     <td bgcolor="<?php echo $bg; ?>"><div align="center"><?php echo $pay_date; ?></div></td>
				   </tr>
				   <?php
}
        ?>

				   <tr >
                     <td bgcolor="<?php echo $bg; ?>"><div align="center"><br /></div></td>
                     <td bgcolor="<?php echo $bg; ?>"><div align="center"><br /></div></td>
                     <td colspan="2" bgcolor="<?php echo $bg; ?>"><div align="center"><br /></div>
                     <div align="right"><strong><?php echo $income_msg; ?> : </strong></div></td>

                     <td bgcolor="<?php echo $bg; ?>"><div align="center"><strong>P <?php echo $total_income; ?></strong></div></td>
				   </tr>
    </table>
				 <?php
} else {
        echo '<img src="images/arrowr.gif" width="15" height="9" />You have  <strong>' . $total_results . '</strong> transactions made<br><br><hr/>';}

}

?>

			   <p>
        <?php
display_pagination($pagination);
?><br />
	   <input type="button" name="submit2" value="Print..." class="btn" onclick="MM_openBrWindow1('report/index.php?sql=99&start=<?php echo $start; ?>&end=<?php echo $end; ?>&income=<?php echo $total_income; ?>&income_msg=<?php echo $income_msg; ?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>
      <a href="show_collection.php"></a></p>
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
<?php echo $system_title; ?><br/><?php echo $footer; ?>
</div>
</body>
</html>