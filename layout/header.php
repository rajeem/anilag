<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <script type="text/JavaScript" src="js/function.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>
        <?php echo $system_title . "--" . $footer; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
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
                <li id="active"><a href="index.php" id="current" title="Search">Search</a></li>
                <li><a href="admin_login.php" title="Administrator">Administrator</a></li>
                <li><a href="help2.php" title="Help">Help</a></li>
            </ul>
        </div>
    </div>
    <div class="maincontent">