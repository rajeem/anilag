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

$window = 1;
//total due books
$sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now())>date(deadline) order by hrs desc";
$result2 = mysql_query($sql);
$due_all = mysql_num_rows($result2);

//.........number of books in lib............................//

//due today
$sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by hrs desc";
$result2 = mysql_query($sql);

$due_today = mysql_num_rows($result2);

//due tomorrow

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));

$sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by hrs desc";
$result2 = mysql_query($sql);

$due_tom = mysql_num_rows($result2);

//#################################################################################################

$_SESSION['type'] = $_SESSION['type']; //school_code
$_SESSION['search'] = $_SESSION['search']; //text

$type_code = $_SESSION['type']; //school_code
$search = $_SESSION['search']; //text

if ($search == "all") {

    if ($type_code == "all") {

//overdue books
        $sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now())>date(deadline) order by deadline,books";

    } // end if all
    else {

        $sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) >date(deadline) && school_code='$type_code' order by deadline,books";

    } // end else

} //end if search== all

if ($search == "today") {

    if ($type_code == "all") {

//due today
        $sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by deadline,books";

    } // end if all
    else {
        $sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) && school_code='$type_code' order by deadline,books";

    } // end else

} //end if search== today

if ($search == "tomorrow") {

    if ($type_code == "all") {
        $current_date = date("Y-m-d");
        $newday = date("Y-m-d", strtotime("$current_date + 1 days"));

        $sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by deadline,books";

    } // end if all
    else {
        $current_date = date("Y-m-d");
        $newday = date("Y-m-d", strtotime("$current_date + 1 days"));

        $sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline) && school_code='$type_code' order by deadline,books";

    } // end else
} //end if tomorrow

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
$result2 = mysql_query($sql);

$total_results = mysql_num_rows($result2);
$number = $total_results;
$total_pages = ceil($total_results / $max_results);
//echo $total_results;
$pagination = '';
/* Create a PREV link if there is one */
if ($page > 1) {
    //pass the values of the $txt variables
    $pagination .= '<a href="show_overdue.php?page=' . $prev . '  &sql=' . $sql . '&search= ' . $search . ' &type=' . $type_code . '"
	title="Previous"> &lt;Previous</a> ';
} else {
    $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
}
// Loop through the total pages
for ($i = 1; $i <= $total_pages; $i++) {
    if (($page) == $i) {
        $pagination .= $i;
    } else {
        $pagination .= '&nbsp;<a href="show_overdue.php?page=' . $i . ' &sql=' . $sql . '&search= ' . $search . ' &type=' . $type_code . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
    }
}

/* Print NEXT link if there is one */
if ($page < $total_pages) {
    $pagination .= '<a href="show_overdue.php?page=' . $next . ' &sql=' . $sql . '&search= ' . $search . ' &type=' . $type_code . '"
	title="Next">Next &gt;</a>';

} else {
    $pagination .= '&nbsp;<strong>Next &gt;</strong>';
}

$sql .= " LIMIT $from, $max_results";
$result2 = mysql_query($sql, $connect) or die("cant execute query!.....");
$number = mysql_num_rows($result2);
//echo $number;
//echo $sql;
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
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;Search For Overdue books</h2>
    <form id="form1" name="myform" method="post" action="overdue.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
          <td width="22%">&nbsp;</td>
          <td width="26%">&nbsp;</td>
          <td width="19%">&nbsp;</td>
          <td width="10%" rowspan="2"><img src="images/lens.gif" /></td>
          <td width="23%"><?php echo "We have " . $due_today . "  books/items due today.";
?></td>
        </tr>
        <tr>
          <td valign="top"><strong>Date:</strong>            <select name="search" id="search"><option value="today" <?php if ($search == "today") {
    echo "selected";
}
?>>Today</option><option value="tomorrow" <?php if ($search == "tomorrow") {
    echo "selected";
}
?>>Tomorrow</option>
		  <option value="all" <?php if ($search == "all") {
    echo "selected";
}
?>>All</option></select></td>
          <td valign="top"><strong>School code:</strong>            <select name="type" id="type">
           <?php
$i = 0;
$sqr = "SELECT school_code from school order by school_code";
$res = mysql_query($sqr);
while ($row = mysql_fetch_array($res)) {
    $school_code = $row['school_code'];
    ?>
			<option  <?php if ($type_code == "$school_code") {
        echo "selected";
    }
    ?>><?php echo $school_code; ?></option>
<?php $i++;}?><option value="all" <?php if ($type_code == "all") {
    echo "selected";
}
?>>All</option>
</select> </td>
          <td>

            <input name="submit" type="submit" class="btn"  value="Search"/>
            <a href="overdue.php?show=do"></a></td>
          <td><?php echo "We have " . $due_tom . "  books/items due tomorrow.";
?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td><?php echo "We have " . $due_all . "  books/items due.";
?></td>
        </tr>
      </table>
    </form>
	<p>
	 <?php
display_pagination($pagination);
?>
      <a href="show_overdue.php"></a></p>
    <?php
//output if there is
if ($window == 1) {
    //output if there is
    if ($number != 0) {
        echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for
		<strong>' . $search . '</strong> Overdue Books in&nbsp;<strong>' . $type . '</strong>&nbsp;school returned <strong>' . $total_results . '</strong> results<br><br><hr/>';

        ?>
<table width="100%" border="0">
                   <tr>
                     <td  colspan="2"><h3><strong>OVERDUE BOOKS </strong></h3></td>
                     <td width="22%">&nbsp;</td>
                     <td width="19%">&nbsp;</td>
                     <td width="20%">&nbsp;</td>
                     <? if ($type_code=="all") echo" <td>&nbsp;</td>
 	 ";?>
                   </tr>
                   <tr>
                     <td><strong>Access No. </strong></td>
                     <td><strong>Book Title </strong></td>
                     <td><strong>Author</strong></td>
                     <td><strong>Borrower</strong></td>
                     <td><strong>Due date</strong></td>
                     <? if ($type_code=="all") echo" <td><strong>&nbsp;&nbsp;&nbsp;School</strong></td>
 	 ";?>
                   </tr>
				   <?php
$x = 2;
        $y = 1;
        $i = 0;

        while ($row = mysql_fetch_array($result2)) {

            $books = $row['books'];
            $access_no = $row['access_no'];
            //   $author_sname      =$row['author_sname'];
            //    $author_fname      =$row['author_fname'];
            //    $author_mname      =$row['author_mname'];
            //    $author_mname      =ucfirst($author_mname);
            //    $author      =$author_fname.' '.$author_mname{0}.'.'.$author_sname;
            $school_code = $row['school_code'];
            $author = $row['author'];
            $bar_id = $row['bar_id'];
            $hrs = $row['hrs'];
            $wholename = $row['wholename'];
            $deadline = $row['deadline'];
            $ngayon = $row['ngayon'];
            $date_line = $row['date_line'];
            $date_borrow = $row['date_borrow'];

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



                   <tr >
                     <td  bgcolor="<?php echo $bg; ?>"><b><?php echo $access_no; ?></b></td>
                     <td bgcolor="<?php echo $bg; ?>"><?php echo $books; ?></td>
                     <td bgcolor="<?php echo $bg; ?>"><?php echo $author; ?></td>
                     <td bgcolor="<?php echo $bg; ?>"><a href="pay_fee.php?bar_id_from_home=<?php echo $bar_id; ?>"><?php echo $bar_name; ?></a></td>
                     <td bgcolor="<?php echo $bg; ?>"><?php echo $deadline; ?></td>
                      <? if ($type_code=="all") echo" <td width='15%' bgcolor='$bg'>&nbsp;&nbsp;&nbsp;$school_code</td>
 	 ";?>
                   </tr>
				   <?php
}
        ?>
				    <tr>
        <td><input type="button" name="submit2" value="Print..." class="btn" onclick="MM_openBrWindow1('report/index.php?sql=3&search=<?php echo $search; ?>&school=<?php echo $type_code; ?>&from=<?php echo $from; ?>&to=<?php echo $max_results; ?>','','scrollbars=yes,width=1000,height=800')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

		 <? if ($type_code=="all") echo" <td>&nbsp;</td>
 	 ";?>
      </tr>
    </table>
				  <?php
} else {
        echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for
		<strong>' . $search . '</strong> Overdue Books in&nbsp;<strong>' . $type . '</strong>&nbsp;school returned <strong>' . $total_results . '</strong> results<br><br><hr/>';

    }
} //end window=1
?>

        <?php

if (strlen($pagination) < 100) {
    $pagination = "";
}
echo $pagination;?>

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