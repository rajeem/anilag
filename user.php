<?php
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];

    $sql = "SELECT * from user WHERE username='$user'";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....");
    $rows = mysql_num_rows($result);
    while ($ano = mysql_fetch_array($result)) {
        $uri = $ano['type'];
    }

    $sql = "SELECT * from usergroup WHERE type='$uri'";
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
}
