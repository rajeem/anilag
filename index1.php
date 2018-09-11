<?php
include "include/connect.php";

if (file_exists('backup/back_up.sql')) {

    include "dump.php";

    if (file_exists('backup/back_up.sql')) {
        unlink('backup/back_up.sql');
    }

}
include "include/gensettings.php";

//set folder and files permission
chmod("images/", 0777);
chmod("pdf/", 0777);
chmod("backup/", 0777);
chmod("backup_source/back_up.sql", 0777);

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
$sql = "SELECT sum(qty) from card_cat WHERE status1='in'";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    $final_count_in = $row['sum(qty)'];
}

//if the form has been submit or paging is click

if (($_POST['op'] == 1) || ($_GET['search']) || ($_GET['show'] == "do")) {
    $search = $_POST['search'];
    $list = $_POST['list'];
    $type = $_POST['type'];

/**if the $_GET['txt'] is not blank,
 *use the variable below instead the
 *session variables
 */

    if ($_GET['search']) {
        $search = $_GET['search'];
        $sql = $_GET['sql'];
        $txt = $_GET['txt'];
        $type = $_GET['type'];

    }

    //if show all link has been clicked
    if ($_GET['show'] == "do") {
        $list = 1;
    }

/**replace the backslashes in the variable
 *$sql to blank
 *variable
 */
    $back = "\\";
    $sql = str_replace($back, "", $sql);

    $search = str_replace("|", "", $search);

/**add character to $search variable so that
 *the search variable can read as 2 words
 **/
    $search .= "  |||";

//count words
    $count = count(explode(" ", $search));

//============================if the search field is not blank
    if (($search != "") && ($count >= 2)) {

        $sql = "SELECT * from card_cat where match(title,author,call_num,coauthor,corp_author,
			subject,isbn,edition,place_pub,publisher,date_pub,language,deped_subject)
			against ('$search')";
        $txt = "<strong>All books</strong>";
    }

    //if the search key contains asterisk(*)########################################

    $findme = '*';

    $mystring2 = $search;

    //$pos1 = stripos($mystring1, $findme);
    $pos2 = stripos($mystring2, $findme);

    if ($pos2 !== false && $type != 'all') {

        //echo "asterisk";
        $search1 = str_replace('*', '%', $search);
        $search1 = str_replace('|', '', $search1);
        $search1 = str_replace(' ', '', $search1);

        $sql = "SELECT * from card_cat where $type like '$search1'";
        $txt = "<strong>All books</strong>";

    }
//============================if the search field is not blank ====end

    if ($list == 1) {
        $sql = "SELECT * from card_cat";
        $txt = "<strong>All books</strong>";
    }

    if ($_GET['search']) {
        $sql = $_GET['sql'];
        $back = "\\";
        $sql = str_replace($back, "", $sql);

        $txt = "<strong>All books</strong>";
    }

    $search = str_replace("|", "", $search);

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
        $pagination .= '<a href="index.php?type=' . $type . '&txt=' . $txt . '&sql=' . $sql . '&search=' . $search . '&page=' . $prev . '"
	title="Previous"> &lt;Previous</a> ';
    } else {
        $pagination .= '<strong> &lt;Previous</strong>&nbsp;';
    }
    // Loop through the total pages
    for ($i = 1; $i <= $total_pages; $i++) {
        if (($page) == $i) {
            $pagination .= $i;
        } else {
            $pagination .= '&nbsp;<a href="index.php?type=' . $type . '&txt=' . $txt . '&sql=' . $sql . '&search=' . $search . '&page=' . $i . '" title="page ' . $i . '">' . $i . '</a>&nbsp;';
        }
    }

    /* Print NEXT link if there is one */
    if ($page < $total_pages) {
        $pagination .= '<a href="index.php?type=' . $type . '&txt=' . $txt . '&sql=' . $sql . '&search=' . $search . '&page=' . $next . '"
	title="Next">Next &gt;</a>';

    } else {
        $pagination .= '&nbsp;<strong>Next &gt;</strong>';
    }

    //############PAGINATION END################

}
/**replace the '|' so that the sign will
 *never appear in the message and textbox
 **/
$search = str_replace("|", "", $search);

//funtion to change the drop down list after the form has been submitted

if ($type == "all") {
    $selected1 = 'selected="selected"';
}

if ($type == "author") {
    $selected2 = 'selected="selected"';
}

if ($type == "title") {
    $selected3 = 'selected="selected"';
}

if ($type == "subject") {
    $selected4 = 'selected="selected"';
}
if ($type == "text") {
    $selected5 = 'selected="selected"';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
.style3 {color: #FFFFFF; font-weight: bold; }
#Layer3 {
	position:absolute;
	width:200px;
	height:246px;
	z-index:1;
	left: 468px;
	top: 135px;
}
-->
</style>
</head>
<body OnLoad="document.myform.search.focus();">
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
          <td width="29%"><strong>Search For:</strong></td>
          <td width="6%">&nbsp;</td>
          <td width="42%" rowspan="3">
          <label></label>
          <div id="Layer3"><img src="logo/anilag systems copy1 copy.gif" width="200" height="237" /></div></td>
          <td width="7%" rowspan="2"><img src="images/lens.gif" /></td>
          <td width="16%"><?php echo "We have " . $pdf_books . " e books in this computer.";
?></td>
        </tr>
        <tr>
          <td><input name="search" type="text" class="dilaw" id="search" value="<?php echo $search; ?>" size="40" /></td>
          <td>&nbsp;</td>
          <td><?php echo "We have " . $books . " books in the library."; ?></td>
        </tr>
        <tr>
          <td colspan="2"><strong>Appearing in:
            <select name="type" id="type">
              <option value="all">Keywords</option>
              <option value="author" <?php echo $selected2; ?>>Author</option>
              <option value="title" <?php echo $selected3; ?>>Title</option>
              <option value="subject" <?php echo $selected4; ?>>Subject</option>
            </select>
            <input name="Submit" type="submit" class="btn" onclick="heckForm()" value="Search"/>
            <a href="index.php?show=do">show all</a></strong></td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td><?php echo $final_count_in . " books available in the library."; ?></td>
        </tr>
      </table>
    </form>
      <p>
        <?php
//dont display paginanation if ressult is less than 10
if (strlen($pagination) < 100) {
    $pagination = "";
}

echo $pagination;?>
      <a href="index.php"></a></p>
  <?php

/**perform the query
 *with limit assigned
 */
//output error msg if there is
echo $er;
if (($_POST['op'] == 1) || ($_GET['search']) || ($_GET['show'] == "do")) {
    $sql .= " ORDER BY title LIMIT $from, $max_results";

    $result = mysql_query($sql, $connect) or die("cant execute query!.....1");
    $rows = mysql_num_rows($result);
    if ($search != "") {
        if ($rows == 0) {
            echo "<strong><font color=red>Your search return zero result</font>
			 in category " . $type . "</strong>";
        }
    }
    if ($rows > 0) {
        $search = str_replace("|", "", $search);
        echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for
		<strong>' . $search . '</strong> returned <strong>' . $number . '</strong> results<br><br><hr/>';

        if ($search_output == 2) {
            ?>
				<table width="100%" border="0">
 				 <tr>
 				   <td width="5%" bgcolor="#000000">&nbsp;</td>
    				<td width="6%" bgcolor="#000000">&nbsp;</td>
    				<td width="11%" bgcolor="#000000"><span class="style3">Call Number </span></td>
  					  <td width="38%" bgcolor="#000000"><span class="style3">Title</span></td>
  					  <td width="13%" bgcolor="#000000"><span class="style3">Author</span></td>
   					  <td width="12%" bgcolor="#000000"><span class="style3">Subject</span></td>
   					  <td width="15%" bgcolor="#000000"><span class="style3">Number of books </span></td>
 				 </tr>
				<?php
}

        $count = 1;
        if ($_GET['type'] != "") {
            $type = $_GET['type'];
        }
        $x = 2;
        $y = 1;
        while ($row = mysql_fetch_array($result)) {
            $id = $row['id'];
            $call_num = $row['call_num'];
            $call_num_br = $row['call_num_br'];
            $author = $row['author'];
            $coauthor = $row['coauthor'];
            $corp_author = $row['corp_author'];
            $title = $row['title'];
            $subject = $row['subject'];
            $isbn = $row['isbn'];
            $edition = $row['edition'];
            $place_pub = $row['place_pub'];
            $publisher = $row['publisher'];
            $location = $row['location'];
            $date_pub = $row['date_pub'];
            $collation = $row['collation'];
            $language = $row['language'];
            $pdf = $row['pdf'];
            $help = $row['help'];
            $front = $row['front'];
            $pdb = $row['pdb'];
            $qty = $row['qty'];
            $call_num_br = str_replace(" ", "<br>", $call_num);

            //data for second table
            $the_final_call_num = $call_num;
            $the_final_title = $title;
            $the_final_author = $author;
            $the_final_subject = $subject;

            if ($x > $y) {
                $y += 2;
                $bg = "#ECE9D8";

            } else {
                $x += 2;
                $bg = "#Ffffff";
            }

            if ($pdf != "") {
                $dest = "pdf";
                $doc = "(PDF)";
            }
            if ($help != "") {
                $dest = "help";
                $doc = "(compiled HTML)";
            }
            if ($pdb != "") {
                $dest = "pdb";
                $doc = "(PDB)";
            }
            if (($pdf != "") && ($help != "")) {
                $dest = "all";
            }
            if ($front == "") {
                $front = 'no_preview.gif';
            }

            if ($type == "all") {
                $top = "";
            }

            //---------------------------------------------- START AUTHOR---------------------------------------------
            if ($type == "author") {
                $input = $search;

                $words = $coauthor;
                $words = explode("/", $words);

                // no shortest distance found, yet
                $shortest = -1;

                // loop through words to find the closest
                foreach ($words as $word) {

                    // calculate the distance between the input word,
                    // and the current word
                    $lev = levenshtein($input, $word);

                    // check for an exact match
                    if ($lev == 0) {

                        // closest word is this one (exact match)
                        $closest = $word;
                        $shortest = 0;

                        // break out of the loop; we've found an exact match
                        break;
                    }

                    // if this distance is less than the next found shortest
                    // distance, OR if a next shortest word has not yet been found
                    if ($lev <= $shortest || $shortest < 0) {
                        // set the closest match, and shortest distance
                        $closest = $word;
                        $shortest = $lev;
                    }
                }

                if ($shortest == 0) {
                    echo "Exact match found: $closest\n";
                } else {

                    $top = "<strong>$closest</strong>";
                }

            }
            //-----------------------------------------------------------END AUTHOR------------------------------------------

            //---------------------------------------------------------START SUBJECT----------------------------------------

            if ($type == "subject") {

                $input = $search;

                $words = $subject;
                $words = explode("/", $words);

                // no shortest distance found, yet
                $shortest = -1;

                // loop through words to find the closest
                foreach ($words as $word) {

                    // calculate the distance between the input word,
                    // and the current word
                    $lev = levenshtein($input, $word);

                    // check for an exact match
                    if ($lev == 0) {

                        // closest word is this one (exact match)
                        $closest = $word;
                        $shortest = 0;

                        // break out of the loop; we've found an exact match
                        break;
                    }

                    // if this distance is less than the next found shortest
                    // distance, OR if a next shortest word has not yet been found
                    if ($lev <= $shortest || $shortest < 0) {
                        // set the closest match, and shortest distance
                        $closest = $word;
                        $shortest = $lev;
                    }
                }

                if ($shortest == 0) {
                    echo "Exact match found: $closest\n";
                } else {

                    $top = "<strong>$closest</strong>";
                }
                //all caps the results
                $top = strtoupper($closest);
                //$top="<strong>$closest</strong>";
            }
            //---------------------------------------------------------END SUBJECT----------------------------------------

            //---------------------------------------------------------START TITLE----------------------------------------

            if ($type == "title") {
                $top = $title;
            }
            //---------------------------------------------------------END TITLE----------------------------------------

            //initialize the value of roman numerals for co author output
            $roman = "";
            $num = "";

            //====================table 1===================================================
            if ($search_output == 1) {
                ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="55" rowspan="7" valign="top" bgcolor="#FFFFFF"><br /><?php echo $call_num_br; ?></td>
          <td bgcolor="#FFFFFF"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $top; ?>&nbsp;</td>
          <td bgcolor="#FFFFFF"></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td width="693" bgcolor="#FFFFFF"><?php
if (($pdf != "") || ($help != "") || ($pdb != "")) {
                    echo '<a href="view_result.php?dest=' . $dest . '&id=' . $id . '" target="_blank">' . $author . '</a><br>';
                } else {
                    echo "<strong>" . $author . "</strong>";
                }
                ?></td>
          <td width="168" bgcolor="#FFFFFF"><strong>No. of books :
            <?php
//view number of books of that  kind
                echo "<font color=red>$qty</font>";

                ?>
          </strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php
/**if author field is empty assign
                 *corp author to author
                 **/
                if ($author == "") {
                    $author = $corp_author;
                }

                //double_dash is empty
                $double_dash = "  ";

                /**if co author field is empty
                 *put the value of double dash(--) to variable
                 **/
                if ($coauthor == "") {
                    $double_dash = "--";
                }

                //put to an array the value of co author
                $array = explode("/", $coauthor);

                //get the last element of the array
                $last = end($array);

                /**if the last element of an array is equal to 'title'
                 *after coverting to lower case then remove that element
                 **/
                if (strtolower($last) == "title") {
                    $pop = array_pop($array);

                }
                //return the value of co author with slash(/) between each author
                $coauthor_d2 = implode("/", $array);

                //repalce slashes(/) with comma(,)
                $coauthor_d2 = str_replace("/", ",", $coauthor_d2);

                //make variable final null
                $final = "";

                //concatenate the value of author and coauthor
                $final .= $title . " / " . $author . $double_dash . $coauthor_d2;
                //echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title." / ".$author.".  --  ".$coauthor;

                //wordwrap the final value so that the final will not output as very long string
                $final = wordwrap($final, 60, "<br />\n");

                //output the value
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $final;

                //if variable edition is empty output blank
                if ($edition == "") {
                    echo "";

                    //if edition is not blank output its value with dot and slashes
                } else {
                    echo $edition . ".  --";
                }
                ?></td>
          <td bgcolor="#FFFFFF"><strong>
            <?php if ($qty == 0) {echo "book unavailable";}?>
</strong></td>
          <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php echo $place_pub . ":"; ?><?php echo $publisher . ", "; ?>
          <?php
if ($date_pub != "") {
                    echo $date_pub;
                }?></td>
          <td rowspan="8" bgcolor="#FFFFFF"><?php
if (($pdf == "") && ($help == "") && ($pdb == "")) {
                    echo '<img src="images/no_preview.gif"
					title="' . $title . ' by ' . $author . '"/>';
                } else {
                    echo '<a href="view_result.php?dest=' . $dest . '&id=' . $id . '" target="_blank">
					<img src="pdf/front/' . $front . '"
					title="' . $title . ' by ' . $author . '' . $doc . '"/>
					</a>';

                }
                ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $collation;
                if ($series == "") {
                    echo "";
                } else {
                    echo " series of " . $series . ".--";
                }
                ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td rowspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $notes; ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php
if ($isbn == "") {
                    echo "";
                } else {
                    echo "&nbsp;&nbsp;&nbsp&nbsp;&nbsp;ISBN:&nbsp;" . $isbn;
                }
                ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
		  <?php
//if subject and coauthor is blank leave the $m variable blank
                if (($subject == "") && ($coauthor == "")) {
                    $m = "";
                } else {
                    //set the value of subject output to blank
                    $sub = "";
                    //remove slashes and cut the string of variable $subject
                    $subject = explode("/", $subject);
                    //add number to the values
                    foreach ($subject as $word) {
                        $num += 1;
                        $sub .= $num . ". " . $word . " ";
                    }

                    $m = "";
                    //remove slashes and cut the string
                    $coauthor = explode("/", $coauthor);

                    //assign all formated text to variable $m
                    foreach ($coauthor as $word) {
                        $roman .= "I";
                        $m .= $roman . ". " . $word . " ";
                    }

                    //if coauthor char less than 4
                    if (strlen($m) <= 4) {
                        $m = "";
                    }

                    //concatenate the value of subject and coauthor
                    $m = $sub . $m;
                }

                //limit the text output
                $m = wordwrap($m, 50, "<br />\n");
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $m;

                ?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;<?php echo 'Location: ' . $location; ?></td>
          <td bgcolor="#FFFFFF"><input name="action" type="hidden" id="action" value="<?php echo $sql; ?>" /></td>
        </tr>
      </table>
<hr /><p><?php } //============end table 1=================================================
            else if ($search_output == 2) {
                ?>
 				 <tr>
    				<td width="5%" bgcolor="<?php echo $bg; ?>"><a href="#" onclick="MM_openBrWindow1('details.php?id=<?php echo $id; ?>','','scrollbars=yes,width=400,height=450')" title="Details"><img src="images/details_over.png" width="30" height="30" /></a></td>
    				<td width="6%" bgcolor="<?php echo $bg; ?>"><img src="images/pdf_2.png" width="39" height="30" /></td>
    				<td width="11%" bgcolor="<?php echo $bg; ?>"><?php echo $the_final_call_num; ?></td>
  					  <td width="38%" bgcolor="<?php echo $bg; ?>"><?php echo $the_final_title; ?></td>
  					  <td width="13%" bgcolor="<?php echo $bg; ?>"><?php echo $the_final_author; ?></td>
   					  <td width="12%" bgcolor="<?php echo $bg; ?>"><?php echo $the_final_subject; ?></td>
				     <td width="15%" bgcolor="<?php echo $bg; ?>">&nbsp;<?php
if ($qty == 0) {
                    echo "This book unavailable";
                }
                echo $qty;
                ?></td>
 				 </tr><?php

            }
            $count++;
        }

    }
}
?></table>

    </p>
	<p><?php echo $pagination;
?></p>
  </div>
</div>
<div class="lowercontent"></div>
<div class="footer1"><table>
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