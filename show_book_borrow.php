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

$window = 0;
//total due books
$sql = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where now()>deadline order by hrs desc";
$result2 = mysql_query($sql);
$due_all = mysql_num_rows($result2);

//.........number of books in lib............................//

//due today
$sql2 = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where date(now()) = date(deadline) order by hrs desc";
$result2 = mysql_query($sql2);

$due_today = mysql_num_rows($result2);

//due tomorrow

$current_date = date("Y-m-d");
$newday = date("Y-m-d", strtotime("$current_date + 1 days"));

$sql2 = "SELECT *,HOUR(TIMEDIFF(deadline,now())) as hrs,date(deadline) as date_line,date(now()) as ngayon from books_bar where '$newday'= date(deadline)order by hrs desc";
$result2 = mysql_query($sql2);

$due_tom = mysql_num_rows($result2);

//#################################################################################################

if ($_POST['op'] == 1) {
    $type_code = $_POST['type'];
    $start = $_POST['start'];
    $end = $_POST['ending'];

    $_SESSION['borrow_type'] = $_POST['type']; //school code
    $_SESSION['start'] = $_POST['start']; //start date
    $_SESSION['ending'] = $_POST['ending']; //end date

    $s = date($start);
    $e = date($end);

    header("Location: show_book_borrow_2.php");
    exit();} //end if all

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>

<script type="text/JavaScript">
<!--
function FormValidate(){

if (document.myform.start.value == ""){
alert("Enter the Start date!");
document.myform.start.focus();
return false;}

if (document.myform.ending.value == ""){
alert("Enter the End date!");
document.myform.ending.focus();
return false;}

if (document.myform.start.value > document.myform.ending.value ){
alert("Invalid Date Interval!");
document.myform.start.value="";
document.myform.ending.value="";
document.myform.start.focus();

return false;}

}
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
    <h2><a href="inventory.php">Inventory</a>&gt;&gt;Search For Borrowed Books</h2>
    <form id="form1" name="myform" method="post" action="show_book_borrow.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
		<td colspan="3"><strong>Enter the date:(yyyy-mm-dd) format </strong></td>

          <td width="11%">&nbsp;</td>
          <td width="9%">&nbsp;</td>
          <td width="23%"><?php echo "We have " . $due_today . "  books/items due today.";
?></td>
        </tr>
        <tr>
          <td width="19%" valign="top"><strong>Start</strong> <input type="text" name="start" id="start"  size="10" value="<?php echo $start; ?>"/></td>
          <td width="18%" valign="top"><strong>End</strong> <input type="text" name="ending" id="ending"  size="10" value="<?php echo $end; ?>"/></td>
          <td width="20%" valign="top"><strong>School:</strong>            <select name="type" id="type">
           <?php
$i = 0;
$sqr = "SELECT school_code from school order by school_code";
$res = mysql_query($sqr);
while ($row = mysql_fetch_array($res)) {
    $school_code = $row['school_code'];
    ?>
			<option  <?php if ($type == "$school_code") {
        echo "selected";
    }
    ?>><?php echo $school_code; ?></option>
<?php $i++;}?><option value="all" <?php if ($type == "all") {
    echo "selected";
}
?>>all</option>
</select> </td>
          <td valign="top">

            <input name="submit" type="submit" class="btn"  value="Search" onClick=" return FormValidate()"/>
          </td><td><a href="show_book_borrow.php?show=do"></a></td>
          <td><?php echo "We have " . $due_tom . "  books/items due tomorrow.";
?></td>
        </tr>
        <tr><td colspan="3"></td>

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
      <a href="show_book_borrow_2.php"></a></p>

    <?php
if ($window == 1) {
    //output if there is
    if ($number != 0) {
        echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for
		<strong>' . $search . '</strong> returned <strong>' . $number . '</strong> results<br><br><hr/>';

        ?>
    <table width="100%" border="0">
                   <tr>
                     <td width="16%"><h3><strong>BORROWED BOOK </strong></h3></td>
                     <td width="20%">&nbsp;</td>
                     <td width="15%">&nbsp;</td>
                     <td width="15%">&nbsp;</td>
                     <td width="14%">&nbsp;</td>
                   </tr>
                   <tr>
                     <td><strong>Access No. </strong></td>
                     <td><strong>Book Title </strong></td>
                     <td><strong>Borrower</strong></td>
                     <td><strong>Date Borrowed </strong></td>
                     <td><strong>Due date</strong></td>
					  <td><strong>School</strong></td>
                   </tr>
				   <?php
$x = 2;
        $y = 1;
        $i = 0;
        while ($row = mysql_fetch_array($result2)) {

            $books = $row['books'];
            $access_no = $row['access_no'];
            $author_sname = $row['author_sname'];
            $author_fname = $row['author_fname'];
            $author_mname = $row['author_mname'];
            $author_mname = ucfirst($author_mname);

            $author = $author_fname . ' ' . $author_mname{0} . ' ' . $author_sname;
            $bar_id = $row['bar_id'];
            $hrs = $row['hrs'];
            $wholename = $row['wholename'];
            $deadline = $row['deadline'];
            $ngayon = $row['ngayon'];
            $date_line = $row['date_line'];
            $date_borrow = $row['date_borrow'];
            $date_na = date($deadline);

            //get the name of the borrower

            //if deadlime is today, output today
            /*    if ($ngayon==$date_line) {
            $deadline='Today';
            }
             */
            $sqr = "SELECT * from books_bar where bar_id='$bar_id'";
            $rt = mysql_query($sqr);
            while ($rowt = mysql_fetch_array($rt)) {
                $school_code = $rowt['school_code'];
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



                   <tr >
                     <td ><b><?php echo $access_no; ?></b></td>
                     <td><?php echo $books; ?></td>
                     <td><a href="pay_fee.php?bar_id_from_home=<?php echo $bar_id; ?>"><?php echo $bar_name; ?></a></td>
                     <td><?php echo $date_borrow; ?></td>
                     <td><?php echo $date_na; ?></td>
					  <td><?php echo $school_code; ?></td>
                   </tr>
				   <?php
}
        ?>
    </table>
				 <?php
} else {
        echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for
		<strong>' . $search . '</strong> returned <strong>' . $number . '</strong> results<br><br><hr/>';

    }
}
?>

			     <p>
        <?php
display_pagination($pagination);
?>
      <a href="show_book_borrow_2.php"></a></p>
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