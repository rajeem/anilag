<?php

session_start();
//connection to database and settings
include "include/connect.php";
include "include/gensettings.php";
include "include/function.php";
include "user.php";

//e-books count
$sql = 'SELECT * from card_cat WHERE (pdb!="" or pdf!="" or help!="")';
$result = mysql_query($sql);
$pdf_books = mysql_num_rows($result);

//.........number of books in lib............................//

//books in
$sql1 = 'SELECT sum(qty) from card_cat ';
$result1 = mysql_query($sql1);
while ($row = mysql_fetch_array($result1)) {
    $books = $row['sum(qty)'];
}

//books out
$sql = "SELECT sum(qty) from books_bar";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    $book = $row['sum(qty)'];
}
//add out and in
$books += $book;

//books available
$sql = "SELECT * from card_cat";
$result = mysql_query($sql);
$final_count_in = mysql_num_rows($result);

//number of book titles
$sql = "SELECT * from titles";
$result = mysql_query($sql);
$all_title = mysql_num_rows($result);

$search = isset($_POST['search']) ? $_POST['search'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$school_code = isset($_POST['school_code']) ? $_POST['school_code'] : '';

if (isset($_POST['op']) && $_POST['op'] == 1) {

    $search = $_POST['search'];
    $type = $_POST['type'];
    $school_code = $_POST['school_code'];
    $_SESSION['code'] = $_POST['school_code']; //school
    $_SESSION['type'] = $_POST['type']; //keyword
    $_SESSION['search'] = $_POST['search']; //text

    header("Location: regular_show_all_books.php");
    exit();} //end if all

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<SCRIPT language=javascript>

	//-->
	function trash()
	{

    var answer = confirm("Are you sure you wish to delete this item?\n Click OK to proceed otherwise click Cancel.")
	if (!answer){

		return false;
	}

    document.supportform.action = "admin_delete.php"
	document.supportform.method="post"
    document.supportform.submit();

    return true;
}
</SCRIPT>
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
  </div></div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="index.php" id="current" title="Search">Search</a></li>
<li><a href="admin_login.php" title="Administrator">Administrator</a></li>
<li><a href="help2.php" title="Help">Help</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2>Search</h2>
    <form id="form1" name="myform" method="post" action="index.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
          <td width="27%"><strong>Search For:</strong></td>
          <td width="15%"><strong>Appearing in:</strong></td>
          <td width="14%"><strong>School Code</strong></td>
		  <td width="13%">&nbsp;</td>
          <td width="4%" rowspan="2">&nbsp;</td>
          <td width="27%"><?php echo "We have " . $pdf_books . " e-books in this server.";
?></td>
        </tr>

       <tr>
          <td><input name="search" type="text" class="dilaw" id="search" value="<?php echo trim($search); ?>" size="30" /></td>
          <td><select name="type" id="type">
            <option value="all">Keywords</option>
            <option value="author" <?php echo $selected2; ?>>Author</option>
            <option value="title" <?php echo $selected3; ?>>Title</option>
            <option value="subject" <?php echo $selected4; ?>>Subject</option>
          </select></td>
          <td width="14%">
            <select name="school_code" id="school_code">
            <?php
              $i = 0;
              $sq6 = "SELECT * from school order by school_code";
              $result6 = mysql_query($sq6);
              while ($row = mysql_fetch_array($result6)) {
                if ($dschool_code == $code) { 
                  echo '<option selected="selected">' . $row['school_code'] . '</option>';
                } else {
                  echo '<option>' . $row['school_code'] . '</option>';
                }
                echo '<option value="all"' . ($school_code == "all" ? ' selected="selected"' : '') . '>All</option>';
              }
            ?>
          </select></td>
		  <td>
            <input name="Submit" type="submit" class="btn"  value="Search"/>
            <a href="admin.php?show=do"></a></td>
          <td><?php echo "As of the moment, we have " . $books . " books available in the library ."; ?></td>
        </tr>
		 <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
		   <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td><?php echo "There are " . "<a href=show_book_title.php>$all_title</a>" . " different books in the library."; ?></td>
        </tr>
      </table>
    </form>

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
</table>
</div>
<div class="footer"><?php echo $system_title; ?><br />
<?php echo $footer; ?></div>
</body>
</html>
