<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?php echo $system_title . "--" . $footer; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
    <script type="text/JavaScript" src="js/function.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?>
        </div>
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
    <div id="maincontent">