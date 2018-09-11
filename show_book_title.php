<?php
session_start();

include "include/connect.php";
include "include/gensettings.php";
include "user.php";

//total due books
$sq = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where now()>deadline order by hrs desc";
$result2 = mysql_query($sq);
$due_all = mysql_num_rows($result2);

//.........number of books in lib............................//

//due today
$sq = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by hrs desc";
$result2 = mysql_query($sq);

$due_today = mysql_num_rows($result2);

//due tomorrow

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));

$sq = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by hrs desc";
$result2 = mysql_query($sq);

$due_tom = mysql_num_rows($result2);

$sql_1 = "SELECT * from card_cat where flag='up' order by title, author_sname, author_fname";
$result = mysql_query($sql_1, $connect) or die("cant execute query!z");
$lahatan = mysql_num_rows($result);

while ($row = mysql_fetch_array($result)) {
    $title = $row['title'];
    $author_sname = $row['author_sname'];
    $author_fname = $row['author_fname'];
    $author_mname = $row['author_mname'];

    $sql = "SELECT * from card_cat where title = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname' && flag='up'";
    $result_2 = mysql_query($sql, $connect) or die("cant execute query!y");
    $lahatan_2 = mysql_num_rows($result_2);

    $sql_2b = "SELECT * from card_cat where title = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname' && qty=1";
    $result_2b = mysql_query($sql_2b, $connect) or die("cant execute query!y");
    $lahatan_2b = mysql_num_rows($result_2b); //available copies

    $sql_3 = "UPDATE card_cat set flag='down' where title = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname'";
    $result_3 = mysql_query($sql_3, $connect) or die("cant execute query!x");

    if ($lahatan_2 == 0) {

    } else {

        if ($x > $y) {
            $y += 2;
            $bg = "#ECE9D8";

        } else {
            $x += 2;
            $bg = "#Ffffff";
        }

/*echo "<tr><td bgcolor='$bg'>$title</td>"."<td bgcolor='$bg'>$author_sname&nbsp;&nbsp;$author_fname&nbsp;".''.$author_mname{0}.'.'."</td>"."<td bgcolor='$bg'>$lahatan_2</td>"."<td bgcolor='$bg'>$lahatan_2b</td></tr>";
 */

        $sql_5 = "UPDATE titles set quantity='$lahatan_2', available='$lahatan_2b' where title_proper = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname'";
        $result_5 = mysql_query($sql_5, $connect) or die("cant execute query!x");

    }
}
$sql_4 = "UPDATE card_cat set flag='up' ";
$result_4 = mysql_query($sql_4, $connect) or die("cant execute query!v");

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

$sql = "SELECT * from titles  where quantity!=0 order by title_proper, author_sname, author_fname";
$result = mysql_query($sql, $connect) or die("cant execute query!z");

$total_results = mysql_num_rows($result);
$number = $total_results;
$total_pages = ceil($total_results / $max_results);
//echo $total_results;
$pagination = '';

/* Create a PREV link if there is one */
if ($page > 1) {
    //pass the values of the $txt variables
    $pagination .= '<a href="show_book_title.php?page=' . $prev . '"
	title="Previous"> &lt;Previous</a> ';
} else {
    $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
}
// Loop through the total pages
for ($i = 1; $i <= $total_pages; $i++) {
    if (($page) == $i) {
        $pagination .= $i;
    } else {
        $pagination .= '&nbsp;<a href="show_book_title.php?page=' . $i . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
    }
}

/* Print NEXT link if there is one */
if ($page < $total_pages) {
    $pagination .= '<a href="show_book_title.php?page=' . $next . '"
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<SCRIPT language=javascript>

	//-->
	function trash()
	{

    var answer = confirm("Are you sure you wish to delete this item?\n Click OK to proceed otherwise click Cancel.")
	if (!answer){

		return false;
	}

    document.supportform.action = "show_borrower.php"
	document.supportform.method="post"
    document.supportform.submit();

    return true;
}
</SCRIPT>
<SCRIPT language=javascript>
function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>
<script type="text/JavaScript" src="../library2/js/function.js">
</script>
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
<li id="active"><a href="index.php" id="current" title="Search">Search</a></li>
<li><a href="admin_login.php" title="Administrator">Administrator</a></li>
<li><a href="elib.rar" title="Help">Download demo version</a></li>
<li><a href="help2.php" title="Help">Help</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">


   <h2>Available Book Titles</h2> <?php

if (strlen($pagination) < 100) {
    $pagination = "";
}
echo $pagination;
?>
	<table width="74%" border="0">
	 <tr>

          <td width="37%"><strong>Book Title</strong></td>
          <td width="27%"><strong>Main Author </strong></td>
          <td width="13%"><strong>Quantity</strong></td>
          <td width="23%"><strong>Available Copies </strong></td>

      </tr>


<?php

$x = 2;
$y = 1;

while ($row = mysql_fetch_array($result)) {
    $title = $row['title_proper'];
    $author_sname = $row['author_sname'];
    $author_fname = $row['author_fname'];
    $author_mname = $row['author_mname'];
    $quantity = $row['quantity'];
    $available = $row['available'];

    if ($x > $y) {
        $y += 2;
        $bg = "#ECE9D8";

    } else {
        $x += 2;
        $bg = "#Ffffff";
    }

    echo "<tr><td bgcolor='$bg'>$title</td>" . "<td bgcolor='$bg'>$author_sname&nbsp;&nbsp;$author_fname&nbsp;" . '' . $author_mname{0} . '.' . "</td>" . "<td bgcolor='$bg'>$quantity</td>" . "<td bgcolor='$bg'>$available</td></tr>";
}
?>
	<tr><td>		<?	 if (strlen($pagination)<100){
					$pagination="";
				 }
				  echo $pagination;?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
</tr></table>
    <?php $sq2 = "DELETE from titles WHERE quantity=0";
mysql_query($sq2) or die("cant execute query");?>
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
