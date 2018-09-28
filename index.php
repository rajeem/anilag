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

if (isset($_POST['op']) && isset($_POST['op'])) {

    $search = $_POST['search'];
    $type = $_POST['type'];
    $school_code = $_POST['school_code'];
    $_SESSION['code'] = $_POST['school_code']; //school
    $_SESSION['type'] = $_POST['type']; //keyword
    $_SESSION['search'] = $_POST['search']; //text

    header("Location: regular_show_all_books.php");
    exit();
}
require_once("/layout/header.php");
?>

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
        <td width="27%">
          <?php echo "We have " . $pdf_books . " e-books in this server.";?>
        </td>
      </tr>
      <tr>
        <td><input name="search" type="text" class="dilaw" id="search" value="<?php echo trim($search); ?>" size="30" /></td>
        <td><select name="type" id="type">
            <option value="all">Keywords</option>
            <option value="author">Author</option>
            <option value="title">Title</option>
            <option value="subject">Subject</option>
          </select></td>
        <td width="14%">
          <select name="school_code" id="school_code">
            <?php
              $i = 0;
              $sq6 = "SELECT * from school order by school_code";
              $result6 = mysql_query($sq6);
              while ($row = mysql_fetch_array($result6)) {
                if ($dschool_code == $row['school_code']) { 
                  echo '<option selected="selected">' . $row['school_code'] . '</option>';
                } else {
                  echo '<option>' . $row['school_code'] . '</option>';
                }
              }
              echo '<option value="all"' . ($school_code == "all" ? ' selected="selected"' : '') . '>All</option>';
            ?>
          </select></td>
        <td>
          <input name="Submit" type="submit" class="btn" value="Search" />
          <a href="admin.php?show=do"></a></td>
        <td>
          <?php echo "As of the moment, we have " . $books . " books available in the library ."; ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="op" type="hidden" id="op" value="1" /></td>
        <td>
          <?php echo "There are " . "<a href=show_book_title.php>$all_title</a>" . " different books in the library."; ?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php require_once("/layout/footer.php"); ?>