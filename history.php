<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";
include "user.php";

$action = $_GET['action'];

if ($action == "history") {
    $sql = "SELECT *,count(access_no) as total FROM history group by title,author,access_no order by title,author,access_no";
}
//$result = mysql_query($sql) or die("cant exexcute query #1");

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
$result = mysql_query($sql);

$total_results = mysql_num_rows($result);
$number = $total_results;
$total_pages = ceil($total_results / $max_results);

$pagination = '';

/* Create a PREV link if there is one */
if ($page > 1) {
    //pass the values of the $txt variables
    $pagination .= '<a href="history.php?action=' . $action . '&page=' . $prev . '"
	title="Previous"> &lt;Previous</a> ';
} else {
    $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
}
// Loop through the total pages
for ($i = 1; $i <= $total_pages; $i++) {
    if (($page) == $i) {
        $pagination .= $i;
    } else {
        $pagination .= '&nbsp;<a href="history.php?action=' . $action . '&page=' . $i . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
    }
}

/* Print NEXT link if there is one */
if ($page < $total_pages) {
    $pagination .= '<a href="history.php?action=' . $action . '&page=' . $next . '"
	title="Next">Next &gt;</a>';

} else {
    $pagination .= '&nbsp;<strong>Next &gt;</strong>';
}

//############PAGINATION END################

$sql .= " LIMIT $from, $max_results";
$result = mysql_query($sql, $connect) or die("cant execute query!.....");

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
<body>
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
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;<?php echo $_GET['action']; ?></h2>
    <table width="100%" border="0">
      <tr>
        <td width="16%"><strong>Accession No. </strong></td>
        <td width="31%"><strong>Book Title</strong></td>
        <td width="28%"><strong>Main Author</strong></td>

        <td width="12%"><strong>Usage </strong></td>
      </tr><?php
$x = 2;
$y = 1;
while ($row = mysql_fetch_array($result)) {
    $books = $row['title'];
    $access_no = $row['access_no'];
    $call_num = $row['call_num'];
    $bar_id = $row['bar_id'];
    $total = $row['total'];
    $author = $row['author'];

    if ($x > $y) {
        $y += 2;
        $bg = "#ECE9D8";

    } else {
        $x += 2;
        $bg = "#Ffffff";
    }

    ?><tr>
        <td bgcolor="<?php echo $bg; ?>"><?php echo $access_no; ?>&nbsp;</td>
        <td bgcolor="<?php echo $bg; ?>"><?php echo $books; ?></td>
        <td bgcolor="<?php echo $bg; ?>"><?php echo $author; ?></td>
        <td bgcolor="<?php echo $bg; ?>"><?php echo $total; ?></td>
        </tr>
	  <?php

}

?>
      <tr>
        <td colspan="3"><?php

if (strlen($pagination) < 100) {
    $pagination = "";
}
echo $pagination;?></td>

		 <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="button" name="submit2" value="Print..." class="btn" onclick="MM_openBrWindow1('report/index.php?sql=4&from=<?php echo $from; ?>&to=<?php echo $max_results; ?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

		   <td>&nbsp;</td>
      </tr>
    </table>
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
<?php echo $system_title; ?><br /><?php echo $footer; ?>
</div>
</body>
</html>