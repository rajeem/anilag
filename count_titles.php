<?php

include "include/connect.php";
include "include/gensettings.php";
include "user.php";

echo "<table><tr>";
echo "<td>Title</td>" . "<td>Author Name</td>" . "<td>Total<td></tr>";

$sql_1 = "SELECT * from card_cat where flag='up'";
$result = mysql_query($sql_1, $connect) or die("cant execute query!z");
$lahatan = mysql_num_rows($result);

while ($row = mysql_fetch_array($result)) {
    $title = $row['title'];
    $author_sname = $row['author_sname'];
    $author_fname = $row['author_fname'];
    $author_mname = $row['author_mname'];

    $sql_2 = "SELECT * from card_cat where title = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname' && flag='up'";
    $result_2 = mysql_query($sql_2, $connect) or die("cant execute query!y");
    $lahatan_2 = mysql_num_rows($result_2);

    $sql_2b = "SELECT * from card_cat where title = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname' && qty=1";
    $result_2b = mysql_query($sql_2b, $connect) or die("cant execute query!y");
    $lahatan_2b = mysql_num_rows($result_2b); //available copies

    $sql_3 = "UPDATE card_cat set flag='down' where title = '$title' && author_sname='$author_sname'&& author_fname='$author_fname'&& author_mname='$author_mname'";
    $result_3 = mysql_query($sql_3, $connect) or die("cant execute query!x");

    if ($lahatan_2 == 0) {

    } else {
        echo "<tr><td>$title</td>" . "<td>$author_sname.$author_fname</td>" . "<td>$lahatan_2<td>" . "<td>$lahatan_2b<td>";

    }

}

echo "</tr></table>";
$sql_4 = "UPDATE card_cat set flag='up' ";
$result_4 = mysql_query($sql_4, $connect) or die("cant execute query!v");
