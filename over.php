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
$sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where now()>deadline order by hrs desc";
$result = mysql_query($sql);

$total_results = mysql_num_rows($result);
$number = $total_results;
$total_pages = ceil($total_results / $max_results);

$pagination = '';

/* Create a PREV link if there is one */
if ($page > 1) {
    //pass the values of the $txt variables
    $pagination .= '<a href="home.php?page=' . $prev . '"
	title="Previous"> &lt;Previous</a> ';
} else {
    $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
}
// Loop through the total pages
for ($i = 1; $i <= $total_pages; $i++) {
    if (($page) == $i) {
        $pagination .= $i;
    } else {
        $pagination .= '&nbsp;<a href="home.php?page=' . $i . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
    }
}

/* Print NEXT link if there is one */
if ($page < $total_pages) {
    $pagination .= '<a href="home.php?page=' . $next . '"
	title="Next">Next &gt;</a>';

} else {
    $pagination .= '&nbsp;<strong>Next &gt;</strong>';
}

//############PAGINATION END################
//echo $from;
//echo $max_results;
//perform the query
$sql .= " LIMIT $from, $max_results";
$result = mysql_query($sql) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
</head>
<body OnLoad="document.myform.search.focus();MM_preloadImages('images/clock_book.jpg','images/books.jpg')">
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
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;Search</h2>
    <form id="form1" name="myform" method="post" action="overdue.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
          <td width="22%">&nbsp;</td>
          <td width="26%">&nbsp;</td>
          <td width="19%">&nbsp;</td>
          <td width="10%" rowspan="2"><img src="images/lens.gif" /></td>
          <td width="23%"><?php echo "We have " . $pdf_books . " e books in this computer.";
?></td>
        </tr>
        <tr>
          <td valign="top"><strong>Date:</strong>            <select name="search" id="search"><option value="today">Today</option><option value="tomorrow">Tomorrow</option></select></td>
          <td valign="top"><strong>School code:</strong>            <select name="type" id="type">
           <?php
$i = 0;
$sql = "SELECT school_code from school";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    $school_code = $row['school_code'];
    ?>
			<option value="<?php echo $school_code; ?>"><?php echo $school_code; ?></option>
<?php $i++;}?><option value="all">all</option>
</select> </td>
          <td>
            <label></label>
            <input name="search2" type="submit" class="btn" onclick="heckForm()" value="Search"/>
            <a href="overdue.php?show=do">show all</a></td>
          <td><?php echo "We have " . $books . " books in the library."; ?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td><?php echo $final_count_in . " books available in the library."; ?></td>
        </tr>
      </table>
    </form>
    <?php
//output if there is
if (mysql_num_rows($result) != 0) {
    ?>
    <table width="100%" border="0">
                   <tr>
                     <td width="14%"><h3><strong>OVERDUE BOOKS </strong></h3></td>
                     <td width="21%">&nbsp;</td>
                     <td width="21%">&nbsp;</td>
                     <td width="18%">&nbsp;</td>
                     <td width="19%">&nbsp;</td>
                     <td width="7%">&nbsp;</td>
                   </tr>
                   <tr>
                     <td><strong>Call Number</strong></td>
                     <td><strong>Book Title </strong></td>
                     <td><strong>Author</strong></td>
                     <td><strong>Borrower</strong></td>
                     <td><strong>Due date</strong></td>
                     <td><strong>fine</strong></td>
                   </tr>
				   <?php

    $x = 2;
    $y = 1;
    while ($row = mysql_fetch_array($result)) {
        $books = $row['books'];
        $access_no = $row['access_no'];
        $author = $row['author'];
        $bar_id = $row['bar_id'];
        $hrs = $row['hrs'];
        $wholename = $row['wholename'];
        $deadline = $row['deadline'];
        $ngayon = $row['ngayon'];
        $date_line = $row['date_line'];
        $date_borrow = $row['date_borrow'];

        //get the name of the borrower

        //if deadlime is today, output today
        if ($ngayon == $date_line) {
            $deadline = 'Today';
        }

        $s = "SELECT concat(first1,' ',last1) as bar_name from barrower where bar_id='$bar_id'";
        $r = mysql_query($s);
        while ($row1 = mysql_fetch_array($r)) {
            $bar_name = $row1['bar_name'];
        }

        if ($x > $y) {
            $y += 2;
            $bg = "#ECE9D8";

        } else {
            $x += 2;
            $bg = "#Ffffff";
        }

        ?>



                   <tr bgcolor="<?php echo $bg; ?>">
                     <td ><b><?php echo $access_no; ?></b></td>
                     <td><?php echo $books; ?></td>
                     <td><?php echo $author; ?></td>
                     <td><a href="barrower.php?bar_id_from_home=<?php echo $bar_id; ?>"><?php echo $bar_name; ?></a></td>
                     <td><?php echo $deadline; ?></td>
                     <td><?php echo 'P ' . $hrs; ?></td>
                   </tr>
				   <?php
}
    ?>
    </table>
				 <?php
} else {
    echo '<strong><font color=red>No over due books.</font></strong>';
}
?>

			     <p><?php

if (strlen($pagination) < 100) {
    $pagination = "";
}
echo $pagination;?>&nbsp;</p>
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
<?php echo $system_title; ?><br /><?php echo $footer; ?>
</div>
</body>
</html>