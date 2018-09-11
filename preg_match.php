<?php
include "include/connect.php";
$sql1 = 'SELECT * from card_cat where author like "man%" ';
$result1 = mysql_query($sql1);
while ($row = mysql_fetch_array($result1)) {
    $books = $row['author'];
//echo $books;

}
//echo $books;
$findme = '*';
//$mystring1 = 'xyz';
$mystring2 = 'trrrrABC*';

//$pos1 = stripos($mystring1, $findme);
$pos2 = stripos($mystring2, $findme);

// Nope, 'a' is certainly not in 'xyz'
//if ($pos1 === false) {
//  echo "The string '$findme' was not found in the string '$mystring1'";
//}

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' is the 0th (first) character.
if ($pos2 !== false) {
    //echo "We found '$findme' in '$mystring2' at position $pos2";
}

chmod("../chmod/chmod/resume.doc", 0777) or die('cant');
