<?php

include "include/connect.php";
include "include/oras.php";
include "include/gensettings.php";
include "user.php";
include "include/function.php";

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
} // if

$query_count = "SELECT * from card_cat";
$result_count = mysql_query($query_count);
$totalrows = mysql_num_rows($result_count);

$limit = 20;
$lastpage = ceil($totalrows / $limit);

if (empty($page)) {
    $page = 1;
}

$pageno = (int) $pageno;
if ($pageno < 1) {
    $pageno = 1;
} elseif ($pageno > $lastpage) {
    $pageno = $lastpage;
} // if

$limitvalue = $page * $limit - ($limit);
$query = "SELECT * FROM card_cat LIMIT $limitvalue,  $limit";
$result = mysql_query($query) or die("Error: " . mysql_error());

if (mysql_num_rows($result) == 0) {
    echo ("Nothing to Display!");
}

$bgcolor = "#E0E0E0"; // light gray=20

echo ("<table>");

while ($row = mysql_fetch_array($result)) {
    if ($bgcolor == "#E0E0E0") {
        $bgcolor = "#FFFFFF";
    } else {
        $bgcolor = "#E0E0E0";
    }

    echo ("<tr bgcolor=" . $bgcolor . ">n<td>");
    echo ($row["call_num"]);
    echo ("</td>n<td>");
    echo ($row["call_num"]);
    echo ("</td>n</tr>");
}

echo ("</table>");

if ($page != 1) {
    $pageprev = $page--;

    echo ("<a href=\"$PHP_SELF&page=$pageprev\">PREV" . $limit . "</a> ");
} else {
    echo ("PREV" . $limit . " ");
}

$numofpages = $totalrows / $limit;

for ($i = 1; $i <= $numofpages; $i++) {
    if ($i == $page) {
        echo ($i . " ");
    } else {
        echo ("<a href=\"$PHP_SELF?page=$i\">$i</a>");
    }
}

if (($totalrows % $limit) != 0) {
    if ($i == $page) {
        echo ($i . " ");
    } else {
        echo ("<a href=\"$PHP_SELF?page=$i\">$i</a>");
    }
}

if (($totalrows - ($limit * $page)) > 0) {
    $pagenext = $page++;

    echo ("<a href=\"$PHP_SELF?page=$pagenext\">NEXT" . $limit . "</a>");
} else {
    echo ("NEXT" . $limit);
}

mysql_free_result($result);
