<?php
session_start();
include "include/connect.php";
include "include/gensettings.php";
//include("include/function.php");
include "user.php";
$amount = 0;
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

$sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now())>date(deadline) order by deadline,books";
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
$number = mysql_num_rows($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <script type="text/JavaScript" src="js/function.js">
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>
        <?php echo $system_title . "--" . $footer; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
</head>

<body>
    <div class="header">
        <div class="logo">
            <?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?>
        </div>
        <div id="Layer1"><img src="images/<?php echo $logo; ?>" width="110" height="110" />
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
            <h2>Home</h2>
            <table width="100%" border="0">
                <tr>
                    <td width="11%" align="center"><a href="admin.php" title="search for books,authors and more."><img
                                src="images/lens.jpg" width="72" height="61" /><br />
                            Search</a></td>
                    <td width="11%" align="center">
                        <?php if ($add_book == "on") {
    echo '<a href="admin_add_new.php" title="Add new books."><img src="images/add.jpg" width="72" height="61" /><br />
        Add Book</a>';
} else {
    echo '<img src="images/add.jpg" width="72" height="61" /><br />
        Add Book';
}
?>
                    </td>
                    <td width="11%" align="center"><a href="barrower.php" title="borrowers' information,add new borrower.">
                            <img src="images/borrower2.jpg" width="72" height="61" /><br />
                            Borrower</a></td>
                    <td width="11%" align="center">&nbsp;</td>
                    <td colspan="2" rowspan="2" align="center">&nbsp;</td>
                    <td width="22%"></td>
                </tr>
                <tr>
                    <td align="center">
                        <?php if ($uri == "admin") {
    echo '<a href="inventory.php">
        <img src="images/inventory.jpg" width="72" height="64" /><br />
        Inventory</a>';
} else {
    echo ' <img src="images/inventory.jpg" width="72" height="64" /><br />
        Inventory';
}
?>
                    </td>
                    <td align="center">
                        <?php if ($uri == "admin") {
    echo '<a href="settings.php">
        <img src="images/settings.jpg" width="72" height="61" /><br />
        Settings</a>';
} else {
    echo '<img src="images/settings.jpg" width="72" height="61" /><br />
        Settings';
}
?>
                    </td>
                    <td align="center">
                        <?php if ($uri == "admin") {
    echo '<a href="#" onclick=MM_openBrWindow1("restore_backup.php","","scrollbars=yes,width=500,height=370")>
        <img src="images/thumb.png" width="72" height="61" /><br/>
        Backup/Restore</a>';
} else {
    echo '<img src="images/thumb.png" width="72" height="61" /><br/>
        Backup/Restore';
}
?>
                    </td>
                    <td>&nbsp;</td>
                    <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/books.jpg',1)"></a></td>
                </tr>
                <tr>
                    <td align="center"><a href="#" onclick="MM_openBrWindow1('user_account.php','','scrollbars=yes,width=380,height=350')">
                            <img src="images/computer_user.jpg" width="72" height="61" /><br />
                            User account</a>
                    </td>
                    <td align="center"><a href="logout.php">
                            <img src="images/logout.gif" width="72" height="61" /><br />
                            Logout</a>&nbsp;</td>
                    <td align="center"><a href="#" onclick="MM_openBrWindow1('about.php','','scrollbars=yes,width=400,height=350')">
                            <img src="images/question.jpg" width="72" height="61" /><br />
                            About</a></td>
                    <td>&nbsp;</td>
                    <td width="14%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
                    <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/clock_book.jpg',1)"></a></td>
                </tr>
            </table>
            <hr />
            <?php
//output if there is
if ($number != 0) {
    echo '<strong><img src="images/arrowr.gif" width="15" height="9" /> We have  </strong>
		<strong>' . $total_results . ' Book(s) Over due</strong><br><br><hr/>';
    ?>

            <p>
                <?php

    if (strlen($pagination) < 100) {
        $pagination = "";
    }
    echo $pagination;?>&nbsp;</p>
            <table width="100%" border="0">
                <tr>
                    <td colspan="2">
                        <h3><strong>OVERDUE BOOKS </strong></h3>
                    </td>
                    <td width="22%">&nbsp;</td>
                    <td width="19%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>

                </tr>
                <tr>
                    <td width="14%"><strong>Access No. </strong></td>
                    <td width="25%"><strong>Book Title </strong></td>
                    <td><strong>Author</strong></td>
                    <td><strong>Borrower</strong></td>
                    <td><strong>Due date</strong></td>

                </tr>
                <?php
$x = 2;
    $y = 1;
    //set total books to 0
    $total = 0;
    $amount = 0;
    while ($row = mysql_fetch_array($result)) {
        $id = $row['id'];
        $books = $row['books'];
        $access_no = $row['access_no'];
        //$author_sname      =$row['author_sname'];
        //$author_fname      =$row['author_fname'];
        //$author_mname      =$row['author_mname'];
        //$author_mname      =ucfirst($author_mname);
        //$author      =$author_fname.' '.$author_mname{0}.'.'.$author_sname;
        $author = $row['author'];

        $bar_id = $row['bar_id'];
        $qty = $row['qty'];
        $deadline = $row['deadline'];

        $sql2 = "SELECT * from barrower where bar_id='$bar_id'";
        $result2 = mysql_query($sql2);
        $row2 = mysql_fetch_array($result2);
        $last = $row2['last1'];
        $first = $row2['first1'];
        $bar_name = $first . ' ' . $last;
        //grid alternate colors
        if ($x > $y) {
            $y += 2;
            $bg = "#ECE9D8";

        } else {
            $x += 2;
            $bg = "#Ffffff";
        }

/*                       //per day
if ($rate==1){
if (($sat=="on")&&($sun=="on")) //including sat and sun
{

$now  = date("Y-m-d");
$ngaun = strtotime($now);
$exp_date = strtotime($deadline);
$arawan = count_days(date($deadline),$now);
$araw2 = curdate($exp_date);
echo $arawan."Hello";
$check_all =1;

} //end including sat-sun

if(($sat=="")&&($sun=="")) // not incluiding sat-sun
{
$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
TIMEDIFF('$deadline',now()) as m";
$result1    =mysql_query($sql1,$connect) or die(mysql_error());

$now  = date("Y-m-d");
$ngaun = strtotime($now);
$exp_date = strtotime($deadline);
$arawan = count_days(date($deadline),$now);
$araw2 = curdate($exp_date);

//=====================SWITCH Statement==================
if ($arawan<=7){
switch ($araw2) {
case 'Monday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 4;
if($arawan==7) $cnt = 5;
break;
case 'Tuesday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 3;
if($arawan==6) $cnt = 4;
if($arawan==7) $cnt = 5;
break;
case 'Wednesday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 2;
if($arawan==5) $cnt = 3;
if($arawan==6) $cnt = 4;
if($arawan==7) $cnt = 5;
break;
case 'Thursday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 1;
if($arawan==3) $cnt = 1;
if($arawan==4) $cnt = 2;
if($arawan==5) $cnt = 3;
if($arawan==6) $cnt = 4;
if($arawan==7) $cnt = 5;
break;
case 'Friday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 0;
if($arawan==2) $cnt = 0;
if($arawan==3) $cnt = 1;
if($arawan==4) $cnt = 2;
if($arawan==5) $cnt = 3;
if($arawan==6) $cnt = 4;
if($arawan==7) $cnt = 5;
break;
case 'Saturday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 0;
if($arawan==2) $cnt = 1;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 5;
break;
case 'Sunday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 5;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 5;
break;

default:
echo 'No day!';
break;
}// end switch

}//end if arawan <=7

//=====================SWITCH Statement==================
if($arawan>=8){
switch ($araw2) {
case 'Monday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 1;
if($rem==2) $day = 2;
if($rem==3) $day = 3;
if($rem==4) $day = 4;
if($rem==5) $day = 4;
if($rem==6) $day = 4;
$cnt = ($wk * 5) + $day;
break;
case 'Tuesday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 1;
if($rem==2) $day = 2;
if($rem==3) $day = 3;
if($rem==4) $day = 3;
if($rem==5) $day = 3;
if($rem==6) $day = 4;
$cnt = ($wk*5) + $day;
break;
case 'Wednesday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 1;
if($rem==2) $day = 2;
if($rem==3) $day = 2;
if($rem==4) $day = 2;
if($rem==5) $day = 3;
if($rem==6) $day = 4;
$cnt = ($wk*5) + $day;
break;
case 'Thursday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 1;
if($rem==2) $day = 1;
if($rem==3) $day = 1;
if($rem==4) $day = 2;
if($rem==5) $day = 3;
if($rem==6) $day = 4;

$cnt = ($wk*5) + $day;
break;
case 'Friday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 0;
if($rem==2) $day = 0;
if($rem==3) $day = 1;
if($rem==4) $day = 2;
if($rem==5) $day = 3;
if($rem==6) $day = 4;
$cnt = ($wk*5) + $day;
break;
case 'Saturday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 0;
if($rem==2) $day = 1;
if($rem==3) $day = 2;
if($rem==4) $day = 3;
if($rem==5) $day = 4;
if($rem==6) $day = 5;
$cnt = ($wk*5) + $day;
break;
case 'Sunday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = 0;
if($rem==1) $day = 1;
if($rem==2) $day = 2;
if($rem==3) $day = 3;
if($rem==4) $day = 4;
if($rem==5) $day = 5;
if($rem==6) $day = 5;
$cnt = ($wk*5) + $day;
break;

default:
echo 'No day!';
break;
}// end switch
} // end if >8

}// end not including sat-sun

if(($sat=="on")&&($sun=="")) // including sat only
{
$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
TIMEDIFF('$deadline',now()) as m";
$result1    =mysql_query($sql1,$connect) or die(mysql_error());

$now  = date("Y-m-d");
$ngaun = strtotime($now);
$exp_date = strtotime($deadline);
$arawan = count_days(date($deadline),$now);
$araw2 = curdate($exp_date);

//=====================SWITCH Statement==================
if ($arawan<=7){
switch ($araw2) {
case 'Monday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 5;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Tuesday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Wednesday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Thursday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Friday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 1;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Saturday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 0;
if($arawan==2) $cnt = 1;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Sunday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 5;
if($arawan==6) $cnt = 6;
if($arawan==7) $cnt = 6;
break;

default:
echo 'No day!';
break;
}// end switch

}//end if arawan <=7

//=====================SWITCH Statement==================
if($arawan>=8){
switch ($araw2) {
case 'Monday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 4;
if($rem==5) $day = $wk + 5;
if($rem==6) $day = $wk + 5;
$cnt = ($wk * 5) + $day;
break;
case 'Tuesday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 4;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Wednesday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Thursday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 2;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;

$cnt = ($wk*5) + $day;
break;
case 'Friday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 1;
if($rem==3) $day = $wk + 2;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Saturday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 0;
if($rem==2) $day = $wk + 1;
if($rem==3) $day = $wk + 2;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Sunday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 4;
if($rem==5) $day = $wk + 5;
if($rem==6) $day = $wk + 6;
$cnt = ($wk*5) + $day;
break;

default:
echo 'No day!';
break;
}// end switch
}// end if >8
}// end including sat

if(($sat=="")&&($sun=="on")) // including sun only
{
$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
TIMEDIFF('$deadline',now()) as m";
$result1    =mysql_query($sql1,$connect) or die(mysql_error());

$now  = date("Y-m-d");
$ngaun = strtotime($now);
$exp_date = strtotime($deadline);
$arawan = count_days(date($deadline),$now);
$araw2 = curdate($exp_date);

//=====================SWITCH Statement==================
if ($arawan<=7){
switch ($araw2) {
case 'Monday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Tuesday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Wednesday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Thursday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 1;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Friday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 0;
if($arawan==2) $cnt = 1;
if($arawan==3) $cnt = 2;
if($arawan==4) $cnt = 3;
if($arawan==5) $cnt = 4;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;
case 'Saturday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 5;
if($arawan==6) $cnt = 6;
if($arawan==7) $cnt = 6;
break;
case 'Sunday':
if($arawan==0) $cnt = 0;
if($arawan==1) $cnt = 1;
if($arawan==2) $cnt = 2;
if($arawan==3) $cnt = 3;
if($arawan==4) $cnt = 4;
if($arawan==5) $cnt = 5;
if($arawan==6) $cnt = 5;
if($arawan==7) $cnt = 6;
break;

default:
echo 'No day!';
break;
}// end switch

}//end if arawan <=7

//=====================SWITCH Statement==================
if($arawan>=8){
switch ($araw2) {
case 'Monday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 4;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk * 5) + $day;
break;
case 'Tuesday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Wednesday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 2;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Thursday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 1;
if($rem==3) $day = $wk + 2;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;

$cnt = ($wk*5) + $day;
break;
case 'Friday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 0;
if($rem==2) $day = $wk + 1;
if($rem==3) $day = $wk + 2;
if($rem==4) $day = $wk + 3;
if($rem==5) $day = $wk + 4;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;
case 'Saturday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 4;
if($rem==5) $day = $wk + 5;
if($rem==6) $day = $wk + 6;
$cnt = ($wk*5) + $day;
break;
case 'Sunday':
$wk = (int)($arawan / 7);
$rem = $arawan % 7;
if($rem==0) $day = $wk;
if($rem==1) $day = $wk + 1;
if($rem==2) $day = $wk + 2;
if($rem==3) $day = $wk + 3;
if($rem==4) $day = $wk + 4;
if($rem==5) $day = $wk + 5;
if($rem==6) $day = $wk + 5;
$cnt = ($wk*5) + $day;
break;

default:
echo 'No day!';
break;
}// end switch

}// end if >8
} //end including sun only

if ($check_all==1)
{
$final_overdue_price=0;
$status="<strong><font color=red>Over due!</font></strong>($arawan days)";
$final_overdue_price=$overdue_price*$arawan;
$peso="P ";
}

else{
if ($cnt > 0){
$final_overdue_price=0;
$status="<strong><font color=red>Over due!</font></strong>($cnt days)";
$final_overdue_price=$overdue_price*$cnt;

$peso="P ";
}

else{
$status="";
$final_overdue_price="";
$peso="";
}

}
}
if($rate==0){ //rate==0 //per hour

$sql1 = "SELECT HOUR(TIMEDIFF('$deadline',now())) as hrs,
TIMEDIFF('$deadline',now()) as m";
$result1    =mysql_query($sql1,$connect) or die(mysql_error());

while($row=mysql_fetch_array($result1)){
$hrs   =$row['hrs'];
$m     =$row['m'];
$hours_day = ($hrs/ 24);
$per_day=round($hours_day,2);
}

$m= substr($m, 0, 1);
//echo $j;
//echo $m;
if($m=="-"){
$final_overdue_price=0;
$status="<strong><font color=red>Over due!</font></strong>($per_day day)";
$final_overdue_price=$overdue_price*$per_day*8;
$final_overdue_price = round($final_overdue_price,2);
$peso="P ";
}

else{
$status="";
$final_overdue_price="";
$peso="";
}

} //end per hour
//get total books barrowed

$total=$total+$qty;
 */
        ?>



                <tr bgcolor="<?php echo $bg; ?>">
                    <td align="left" bgcolor="<?php echo $bg; ?>"><strong>
                            <?php echo $access_no; ?></strong></td>
                    <td align="left" bgcolor="<?php echo $bg; ?>"><strong>
                            <?php echo $books; ?></strong></td>
                    <td align="left" bgcolor="<?php echo $bg; ?>"><strong>
                            <?php echo $author; ?></strong></td>
                    <td><a href="pay_fee.php?bar_id_from_home=<?php echo $bar_id; ?>">
                            <?php echo $bar_name; ?></a></td>
                    <td align="center" bgcolor="<?php echo $bg; ?>"><strong>
                            <?php echo $deadline; ?></strong></td>



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

            <p>
                <?php

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
                <td><img src="images/isch.gif" width="200" height="70" /></td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <?php echo $system_title; ?><br />
        <?php echo $footer; ?>
    </div>
</body>

</html>