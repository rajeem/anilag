<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
//SELECT ADDDATE(CURDATE( ), 1);

//SELECT ADDTIME(NOW(),' 18:11:1') as deadline;
include "include/connect.php";
include "include/gensettings.php";
include "include/oras.php";
include "user.php";
//echo $uri;
$op = 0;
//authorized
if ($borrow_book == "on") {

//auto generate the title output
    $book_title = "auto generate.";

//set the deadline
    $sql = "SELECT ADDTIME(NOW(), '$hour_allow:0:0') as deadline,now() as ngaun";
    $result = mysql_query($sql, $connect) or die(mysql_error());

    while ($row = mysql_fetch_array($result)) {
        $input_deadline = $row['deadline'];
        $deadline = $row['deadline'];
        $ngaun = $row['ngaun'];

    }

//if auto deadline set to ON
    if ($auto_deadline == 0) {
        $input_deadline = '<input name="deadline" type="text"   id="deadline" class="dilaw"/>';

    }

    $op = 0;

//show borrower's detail
    if ($_POST['show']) {
//get the value from form submitted
        $search = $_POST['bar_id'];

        $sql = "SELECT * from barrower where bar_id ='$search'";
        $result = mysql_query($sql, $connect) or die("cant execute query!....3." . mysql_error());

        while ($row = mysql_fetch_array($result)) {
            $id = $row['id'];
            $bar_id = $row['bar_id'];
            $name = $row['name'];
            $last = $row['last1'];
            $first = $row['first1'];
            $usertype = $row['type'];
            $course = $row['course'];
            $taon = $row['year1'];
            $add = $row['address'];
            $number = $row['contact'];
            $mail = $row['email'];
            $ex_date = $row['ex_date'];
            $adviser = $row['adviser'];
        }

        $row = mysql_num_rows($result);
        $op = 2;
        $show = 1;
        if ($row == 0) {
            $message = "<strong>The borrower ID does not exists!</strong>";
            $bgcolor = 'bgcolor="#FFCC00"';
            $op = 0;}

    }

//show book detail
    if ($_POST['detail']) {
//get the value from form submitted

        $search = $_POST['bar_id'];

        $sql = "SELECT * from barrower where bar_id ='$search'";
        $result = mysql_query($sql, $connect) or die("cant execute query!....3." . mysql_error());

        while ($row = mysql_fetch_array($result)) {
            $id = $row['id'];
            $bar_id = $row['bar_id'];
            $name = $row['name'];
            $last = $row['last1'];
            $first = $row['first1'];
            $usertype = $row['type'];
            $course = $row['course'];
            $taon = $row['year1'];
            $add = $row['address'];
            $number = $row['contact'];
            $mail = $row['email'];
            $ex_date = $row['ex_date'];
            $adviser = $row['adviser'];
        }

        $row = mysql_num_rows($result);
        $op = 2;
        $show = 1;
        if ($row == 0) {
            $message = "<strong>The borrower ID does not exists!</strong>";
            $bgcolor = 'bgcolor="#FFCC00"';
            $op = 0;}

        $search = $_POST['access_no'];

        $sql = "SELECT * FROM card_cat WHERE access_no='$search'";
        $result = mysql_query($sql, $connect) or die("cant execute query!.....3");

        while ($row = mysql_fetch_array($result)) {
            $title = $row['title'];
            $author_sname = $row['author_sname'];
            $author_fname = $row['author_fname'];
            $author_mname = $row['author_mname'];
            $author = $author_fname . ' ' . $author_mname{0} . '.' . ' ' . $author_sname;

            $subject1 = $row['subject1'];
            $type = $row['gmd'];
            //$call_num = $row['call_num'];
            $classification_no = $row['classification_no'];
            $book_no = $row['book_no'];
            $access_no = $row['access_no'];
            $qty = $row['qty'];
        }

        $row = mysql_num_rows($result);
        $op = 2;
        $detail = 1;
        $show = 1;
        if ($row == 0) {
            $message = "<strong>The Access Number does not exists!</strong>";
            $bgcolor = 'bgcolor="#FFCC00"';
            $op = 3;
            $show = 1;}

    }

//if the borrow this book has been clicked

    if ($_GET['access_no_from']) {

        $access_no_from = $_GET['access_no_from'];
        $sql = "SELECT * from card_cat where access_no='$access_no_from'";
        $result = mysql_query($sql, $connect) or die(mysql_error());

        while ($row = mysql_fetch_array($result)) {

            $book_title = $row['title'];
            $book_author = $row['author'];

        }

    }

//if submit button has been clicked
    if ($_POST['submit']) {

        if ($_POST['deadline']) {
            $deadline = $_POST['deadline'];
        }

        if (($_POST['bar_id'] == "") || ($_POST['access_no'] == "")) {
            $error = "<strong>Please complete the fields!</strong>";
            $bgcolor = 'bgcolor="#FFCC00"';
            $access_no = $_POST['access_no'];

            $sql = "SELECT * from card_cat where access_no='$access_no'";
            $result = mysql_query($sql, $connect) or die(mysql_error());

            while ($row = mysql_fetch_array($result)) {

                $book_title = $row['title'];
                $book_author = $row['author'];

            }
        } else {

            //get the value from form submitted
            $bar_id = $_POST['bar_id'];
            $access_no = $_POST['access_no'];

            //search the borrower is in the table
            $sql_po = "SELECT * FROM barrower WHERE bar_id='$bar_id'";
            $result10 = mysql_query($sql_po, $connect) or die("cant execute query!.....1");
            $row11 = mysql_fetch_array($result10);
            $row10 = mysql_num_rows($result10);
            $school_code = $row11['school_code'];
            $act = $row11['active'];

            //search if the accession number is in the table
            $sql = "SELECT * FROM card_cat WHERE access_no='$access_no'&& qty=1";
            $result = mysql_query($sql, $connect) or die("cant execute query!.....2");
            $row1 = mysql_num_rows($result);

            //search if the borrower is in the table
            $sql = "SELECT * FROM books_bar where bar_id='$bar_id'";
            $result = mysql_query($sql, $connect) or die("cant execute query!.....2");
            $row2 = mysql_num_rows($result);

            //number of books borrowed by borrower
            $the_book_limit = $row2;

            //if first time borrower
            if ($the_book_limit == 0) {
                $row2 = 1;

            }

            //limit of books
            $sql = "SELECT * from usergroup WHERE type='$usertype'";
            $result = mysql_query($sql, $connect) or die("cant execute query!.....");
            $rows = mysql_num_rows($result);
            while ($ano = mysql_fetch_array($result)) {
                $add_book = $ano['add_book'];
                $edit_book = $ano['edit_book'];
                $del_book = $ano['del_book'];
                $borrow_book = $ano['borrow_book'];
                $add_borrower = $ano['add_borrower'];
                $edit_borrower = $ano['edit_borrower'];
                $del_borrower = $ano['del_borrower'];
                $show_borrower = $ano['show_borrower'];
                $upload_file = $ano['upload'];
                $remove_file = $ano['remove'];

                $max_no = $ano['max_no'];
            }
            //if the borrower does not exists;
            if ($row10 == 0) {
                $message = "<strong>The borrower ID does not exist!</strong>";
                $bgcolor = 'bgcolor="#FFCC00"';
                $op = 0;

            }
            if ($act == 0) {

                $message = "<strong>Borrowers Card has expired!</strong>";
                $bgcolor = 'bgcolor="#FFCC00"';
                $op = 0;
            } else {
                $act = 1;}

            //if the book unavailable
            if ($row1 == 0) {
                $message = "<strong>This book doesn't exists or unavailable!</strong>";
                $bgcolor = 'bgcolor="#FFCC00"';
                $op = 0;

            }
            //if borrower reach the limit of books
            if ($the_book_limit >= $max_no) {
                $message = "<strong>You reach the limit of books!</strong>";
                $bgcolor = 'bgcolor="#FFCC00"';
                $row2 = 0;
                $op = 0;

            }

            //if the borrower passed the valid requirements
            if (($row10 >= 1) && ($row1 >= 1) && ($row2 >= 1) && ($act == 1)) {
                /**create query to know the
                 *title of books by its
                 *accession number
                 **/
                $sql = "SELECT * FROM card_cat WHERE access_no='$access_no'";
                $result = mysql_query($sql, $connect) or die("cant execute query!.....3");

                while ($row = mysql_fetch_array($result)) {
                    $title = $row['title'];
                    $title2 = $row['title'];
                    $author_sname = $row['author_sname'];
                    $author_fname = $row['author_fname'];
                    $author_mname = $row['author_mname'];
                    $author = $author_fname . ' ' . $author_mname{0} . '.' . ' ' . $author_sname;

                    $qty1 = $row['qty'];
                    //$call_num_final=$row['call_num'];
                    $classification_no_final = $row['classfication_no'];
                    $book_no_final = $row['book_no'];
                    $call_num_to_table = $row['access_no'];
                }

                $title = str_replace("'", "", $title);

                $sql2 = "select * from titles where title_proper='$title2'";
                $result2 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());
                $row3 = mysql_fetch_array($result2);
                $quantity = $row3['quantity'];
                //echo $quantity;
                //set the quantity of the book to 0

                $sql3 = "UPDATE card_cat SET qty=0 WHERE access_no='$access_no'";
                $result = mysql_query($sql3, $connect) or die("cant execute query!.....4");

                //decrement 1 in  the quantity of the quanity field in the titles table
                $quan = $quantity - 1;

                $sql = "UPDATE titles SET quantity='$quan' WHERE title_proper='$title2'";
                $result = mysql_query($sql, $connect) or die("cant execute query!.....4");

                //put to database all final values
                $sql = "INSERT INTO books_bar (books, access_no, author,bar_id, qty, deadline,date_borrow,school_code) VALUES ( '$title', '$call_num_to_table', '$author','$bar_id','$qty','$deadline', '$ngaun','$school_code')";
                $result = mysql_query($sql, $connect) or die("cant execute query!....51." . mysql_error());

                //put to history table
                $sql = "INSERT INTO history (`title`, `access_no`,`classification_no`,`book_no`,`author`,  `bar_id`,`date_borrow`,`deadline`,`school_code`)
									VALUES ( '$title', '$access_no', '$classification_no_final','$book_no_final','$author','$bar_id','$ngaun','$deadline','$school_code')";
                mysql_query($sql, $connect) or die("cant execute query!....6.");

                //display success inserting to table
                $message = "<strong><font color=#339900>Successfully added to your account!
						  </font></strong>";
                $op = 1;
                //create query here to mark the books as out of lib.
                //or mark status as out or in
            } else {
                //$error= "<strong><font color=#339900>Please enter correct ID or call number!
                // </font></strong>";

            }

        }
    }

} // borrow_book is on
else {
    $msg_mo = "You are not allowed to borrow book/s!";
    $op = 4;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}

-->
</style>

<script type="text/JavaScript">
<!--
function FormValidate1(){

if (document.myform.bar_id.value == ""){
alert("Enter the Borrower's ID!");
document.myform.bar_id.focus();
return false;}


//if(isNaN(document.myform.bar_id.value) == true){
//alert("The Borrower's id must be numeric type!");
//document.myform.bar_id.focus();
//return false;}

if (document.myform.bar_id.value.length <= 4){
alert("The Borrower's id must be of length 5 or more!");
document.myform.bar_id.focus();
return false;}

}
</script>

<script type="text/JavaScript">
<!--
function FormValidate2(){

if (document.myform.bar_id.value == ""){
alert("Enter the Borrower's ID!");
document.myform.bar_id.focus();
return false;}


//if(isNaN(document.myform.bar_id.value) == true){
//alert("The Borrower's id must be numeric type!");
//document.myform.bar_id.focus();
//return false;}

if (document.myform.bar_id.value.length <= 4){
alert("The Borrower's id must be of length 5 or more!");
document.myform.bar_id.focus();
return false;}

if (document.myform.access_no.value == ""){
alert("Enter the Access Number!");
document.myform.access_no.focus();
return false;}


//if(isNaN(document.myform.access_no.value) == true){
//alert("The Access Number must be numeric type!");
//document.myform.access_no.focus();
//return false;}

}
</SCRIPT>


<SCRIPT language=javascript>

function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>
<script type="text/javascript" src="js/quickstart.js"></script>
<SCRIPT language=javascript>

function alert1(){

}
</SCRIPT>

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
    echo "Return Books";
}
?>
    </h2>
    <?php if ($op == 0) {?>
	<form action="bar_new.php" method="post" name="myform">
	  <table width="100%" border="0" cellpadding="5" cellspacing="5">
       <tr bgcolor="#339900">
          <td align="left" bgcolor="#000000" ><span class="style1">Borrower's ID </span></td>
          <td align="center" colspan="3" bgcolor="#000000" ><span class="style1">Borrower's Info  </span></td>
          <td align="center" bgcolor="#000000" class="style1" >&nbsp;</td>
        </tr>
		<tr>
          <td width="212" height="45"><strong>
                <input name="bar_id" type="text" class="dilaw" id="bar_id"  size="10"/>
                <input name="show"  id="show" type="submit" class="btn"  value="  Show" onclick="return FormValidate1()"/>
                <br/>
          </strong></td>
          <td colspan="3"  valign="top" <?php echo $bgcolor; ?>><?php echo $message; ?></td>
          <td width="254"  rowspan="2" align="center" ></td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
          <td colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr bgcolor="#339900">
          <td align="left" bgcolor="#000000" ><span class="style1">Accession number </span></td>
          <td align="center" colspan="3" bgcolor="#000000" ><span class="style1">Book/Material Information </span></td>
          <td align="center" bgcolor="#000000" class="style1" >Due date(yyyy-mm-dd hh:mm:ss)</td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#FFFFFF"><input name="access_no" type="text" class="dilaw" id="access_no" value="<?php echo $access_no_from; ?>"  size="10"/>
            &nbsp;
            <input name="detail"  id="detail" type="submit" class="btn"  value="  Detail" onclick="return FormValidate2()"/>
            <div id="div" /></td>
          <td align="center"  rowspan="3" colspan="2"bgcolor="#FFFFFF"><?php //echo $message;?></td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $input_deadline; ?></td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" class="btn" value="  Checkout  " onclick="return FormValidate2()"/></td>
          <td align="center" bgcolor="#FFFFFF"></td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
	</form>
	<?php }?>
    <?php if ($op == 2) {?>
	<form action="bar_new.php" method="post" name="myform">
          <table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr bgcolor="#339900">
          <td  align="left" bgcolor="#000000" ><span class="style1">Borrower's ID </span></td>
          <td align="center" colspan="3" bgcolor="#000000" ><span class="style1">Borrower's Info  </span></td>
          <td align="center" bgcolor="#000000" class="style1" >&nbsp;</td>
        </tr>
	   <tr>
 			       <td width="187" height="45"><strong>
		           <input name="bar_id" type="text" class="dilaw" id="bar_id"  size="15"  value="<?php echo $bar_id; ?>"/>
 			        <input name="show"  id="show" type="submit" class="btn"  value="  Show" onclick="return FormValidate1()"/> <br/>
          </strong></td>
 			       <td colspan="3"  valign="top" rowspan="2" ><?php if ($show == 1) {echo "<strong>Name:" . $last . ", " . $first . "&nbsp;&nbsp;&nbsp;<br>
  Type:&nbsp;" . $usertype . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
  Year:&nbsp;" . $taon . "<br />
  Contact Num:&nbsp;" . $number . "</strong>";}?></td>
 			       <td width="221"  rowspan="2"  valign="top"><?php if ($show == 1) {echo "<strong>Email:&nbsp;" . $mail . "&nbsp;&nbsp;&nbsp;<br>
 			         Address:&nbsp;" . $add . "<br />
  Expiration Date:&nbsp;" . $ex_date . "</strong>";}?></td>
	        </tr>
			<tr>
				   <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
 			     <tr bgcolor="#339900">
 			       <td  align="left" bgcolor="#000000" ><span class="style1">Accession number  </span></td>
 			       <td colspan="3" align="center" bgcolor="#000000" ><span class="style1">Book/Material Information </span></td>

 			       <td align="center" bgcolor="#000000" class="style1" >Due date(yyyy-mm-dd hh:mm:ss)</td>
	        </tr>
 			     <tr>
 			       <td  align="left" bgcolor="#FFFFFF"><input name="access_no" type="text" class="dilaw" id="access_no" value="<?php echo $access_no; ?>"  size="15"/>&nbsp;
				   <input name="detail"  id="detail" type="submit" class="btn"  value="  Detail" onclick="return FormValidate2()"/> <br/>

 			       <div id="divMessage" /></td>
 			       <td  valign="top" colspan="3" rowspan="3" bgcolor="#FFFFFF">
				   <?php if ($detail == 1) {echo "<strong>Book Title:" . $title . "<br>
  Main Author:" . $author . "<br>Subject:" . $subject1 . "<br>
 			      Classification No:" . $classification_no . "<br>
				  Book No:" . $book_no . "<br>
 			       Type:" . $type . "</strong>";}?></td>
 			              <td align="center" bgcolor="#FFFFFF"><?php echo $input_deadline; ?></td>
	        </tr>

				 <tr>
				   <td align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" class="btn" onclick="return FormValidate2()" value="  Checkout  "/></td>
				   <td align="center" bgcolor="#FFFFFF"><input name="show" type="hidden" id="show" value="1" /></td>
		    </tr>
			    <tr>
				   <td  align="left" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center"  bgcolor="#FFFFFF">&nbsp;</td>


			    </tr>
	</table>
	</form>
	<?php }?>

<?php if ($op == 3) {?>
	<form action="bar_new.php" method="post" name="myform">
          <table width="100%" border="0" cellpadding="5" cellspacing="5">
       <tr bgcolor="#339900">
          <td  align="left" bgcolor="#000000" ><span class="style1">Borrower's ID </span></td>
          <td align="center" colspan="3" bgcolor="#000000" ><span class="style1">Borrower's Info  </span></td>
          <td align="center" bgcolor="#000000" class="style1" >&nbsp;</td>
        </tr>
	   <tr>
 			       <td width="196" height="45"  valign="top"><strong>
 			         <input name="bar_id" type="text" class="dilaw" id="bar_id"  size="15"  value="<?php echo $bar_id; ?>"/>

 			         <input name="show"  id="show" type="submit" class="btn"  value="  Show" onclick="return FormValidate1()"/> <br/>
          </strong></td>
 			        <td colspan="3"  valign="top" rowspan="2" ><?php if ($show == 1) {echo "<strong>Name:" . $last . ", " . $first . "&nbsp;&nbsp;&nbsp;<br>
  Type:&nbsp;" . $usertype . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
  Year:&nbsp;" . $taon . "<br />
  Contact Num:&nbsp;" . $number . "</strong>";}?></td>
 			       <td width="221"  rowspan="2"  valign="top"><?php if ($show == 1) {echo "<strong>Email:&nbsp;" . $mail . "&nbsp;&nbsp;&nbsp;<br>
 			         Address:&nbsp;" . $add . "<br />
  Expiration Date:&nbsp;" . $ex_date . "</strong>";}?></td>
	        </tr>
			<tr>
				   <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
		    </tr>
 			     <tr bgcolor="#339900">
 			       <td  align="left" bgcolor="#000000" ><span class="style1">Accession number  </span></td>
 			       <td colspan="3" align="center" bgcolor="#000000" ><span class="style1">Book/Material Information </span></td>

 			       <td align="center" bgcolor="#000000" class="style1" >Due date(yyyy-mm-dd hh:mm:ss)</td>
	        </tr>
 			     <tr>
 			       <td  align="left" bgcolor="#FFFFFF"><input name="access_no" type="text" class="dilaw" id="myName" value="<?php echo $access_no; ?>"  size="15"/>&nbsp;
				   <input name="detail"  id="detail" type="submit" class="btn"  value="  Detail" onclick="return FormValidate2()"/> <br/>

 			       <div id="divMessage" /></td>
 			       <td  valign="top" colspan="3" rowspan="3" bgcolor="#FFFFFF">
				   <?php echo $message; ?></td>
 			              <td align="center" bgcolor="#FFFFFF"><?php echo $input_deadline; ?></td>
	        </tr>

				 <tr>
				   <td align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" class="btn" onclick="return FormValidate2()" value="  Checkout  "/></td>
				   <td align="center" bgcolor="#FFFFFF"><input name="show" type="hidden" id="show" value="1" /></td>
		    </tr>
			    <tr>
				   <td  align="left" bgcolor="#FFFFFF">&nbsp;</td>
				   <td align="center"  bgcolor="#FFFFFF">&nbsp;</td>
			    </tr>
	</table>
	</form>
	<?php }?>

	<?php if ($op == 1) {?>
	<table width="100%" border="0">
      <tr>
        <td colspan="4">New record added to  <?php
//output the name of the borrower
    $sql = "SELECT concat(first1,' ',last1 ) as name FROM barrower where bar_id='$bar_id' ";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....5");

    while ($row = mysql_fetch_array($result)) {
        $name = $row['name'];
    }
    echo $name;?> account. </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="22%"><a href="bar_new.php">back</a></td>
        <td width="3%">&nbsp;</td>
        <td width="23%">&nbsp;</td>
        <td width="19%">&nbsp;</td>
        <td width="33%">&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Borrower's ID:</strong></td>
        <td>&nbsp;</td>
        <td><?php echo $bar_id; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Accession no.: </strong></td>
        <td>&nbsp;</td>
        <td><?php echo $access_no; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Classification No. : </strong></td>
        <td>&nbsp;</td>
        <td><?php echo $classification_no_final; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td align="right"><strong>Book No.: </strong></td>
        <td>&nbsp;</td>
        <td><?php echo $book_no_final; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Title:</strong></td>
        <td>&nbsp;</td>
        <td><?php echo $title; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Author</strong></td>
        <td>&nbsp;</td>
        <td><?php echo $author; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Deadline:</strong></td>
        <td>&nbsp;</td>
        <td><?php echo $deadline; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	<?php }?>
	<?php if ($op == 4) {
    ?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td align="right"><a href="home.php">back to Home Page</a></td>
        <td colspan="2" align="left"><?php echo $msg_mo; ?></td>
        <td align="center">&nbsp;</td>

      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
	<?php }?>
	<hr />
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
