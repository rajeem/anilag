<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
include "include/connect.php";
include "include/gensettings.php";
include "user.php";
include "include/function.php";
$window = 0;

//if delete has been clicked
if (($_GET['id']) || ($_GET['bar_id'])) {

//authorized
    if ($del_borrower == "on") {

        $student_id = $_GET['bar_id'];

        $s = "SELECT * FROM books_bar where bar_id='$student_id'";
        $result = mysql_query($s, $connect) or die("cant execute query!.....2");
        $row2 = mysql_num_rows($result);
        if ($row2 != 0) {
            $message = "<h2>You cannot erase this account. Clear first  any current transaction!</h2> <Br>";
            $window = 2;} else {
            $s = "DELETE FROM barrower WHERE bar_id='$student_id'";
            mysql_query($s, $connect) or die("cant execute query!....2.");
        }

    } else {
        $msg_mo = "<h2>You are not allowed to delete borrowers account!</h2>";
    }
}
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

//#################################################################################################
//$type=$_GET['type1'];
if ((isset($_POST['op'])) || ($_POST['submit']) || ($_GET['show'] == "do")) {
    $type = $_POST['type'];
    $_SESSION['type_hanap'] = $_POST['type']; //username

    if ($type == "all") {

        header("Location: show_borrower_all_type.php");
        exit();} //end if all

    else {
        header("Location: show_borrower_by_type.php");

//#include('show_borrower_by_type.php');// end else
        exit();}
} //end submit

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
<script type="text/JavaScript" src="js/function.js">
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
    <h2><a href="barrower.php">Search borrower</a> | <?php if ($borrow_book == "on") {
    echo '<a href="bar_new.php">Borrow books </a>';
} else {
    echo "Borrow Book";
}
?> | <?php if ($add_borrower == "on") {
    echo '<a href="create_borrower.php">Add borrower</a>';
} else {
    echo "Add Borrower";
}
?> |<?php if ($show_borrower == "on") {
    echo '<a href="show_borrower.php">Show borrower</a>';
} else {
    echo "Show Borrower";
}
?>|<?php if (($upload_file == "on") || ($remove_file == "on")) {
    echo '<a href="load_file.php">Update borrower photo</a>';
} else {
    echo "Update borrower photo";
}
?>|<?php if ($uri == "admin") {
    echo '<a href="pay_fee.php">Return books</a>';
} else {
    echo "Return books";
}
?></h2>
    	<?php if ($window == 0) {?>
	<form id="form1" name="myform" method="post" action="show_borrower.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
		<td colspan="3"><?php echo $msg_mo; ?></td>



          <td width="45%"><?php echo "We have " . $due_today . "  books/items due today.";
    ?></td>
        </tr>
        <tr>

          <td width="20%" valign="top"><strong>School:</strong>
            <select name="type" id="type">
              <?php
$i = 0;
    $sq6 = "SELECT school_code from school order by school_code";
    $result6 = mysql_query($sq6);
    while ($row = mysql_fetch_array($result6)) {
        $code = $row['school_code'];
        ?>
              <option <?php if ($dschool_code=="$code") echo "selected";?>><?php echo $code; ?></option>
              <?php $i++;}?>
              <option  value="all"<?php if ($school_code=="all") echo "selected";?>>All</option>
          </select></td>
          <td valign="top" colspan="2">

            <input name="submit" type="submit" class="btn"  value="Search"/>
          </td>

          <td><?php echo "We have " . $due_tom . "  books/items due tomorrow.";
    ?></td>
        </tr>
        <tr><td>&nbsp;</td>
          <td colspan="2"><input name="op" type="hidden" id="op" value="1" /></td>


          <td><?php echo "We have " . $due_all . "  books/items due.";
    ?></td>
        </tr>
      </table>
    </form><?php }?>

<hr/>
	     <p>
    </p>
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