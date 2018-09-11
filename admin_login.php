<?php
//session_destroy();
session_start();
include "include/connect.php";
include "include/gensettings.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = addslashes($username);
    $password = addslashes($password);

    $_SESSION['username'] = $_POST['username']; //username

    if (($username == "") || ($password == "")) {
        $errorup = "<strong><font color=red>Please complete the fields!</font></strong>";
    } else {
        //$password=md5($password);
        $sql = "SELECT * from user WHERE username='$username' and password='$password'";
        $result = mysql_query($sql, $connect) or die("cant execute query!.....");
        $rows = mysql_num_rows($result);

        while ($ano = mysql_fetch_array($result)) {
            $uri = $ano['type'];
        }

        $_SESSION['type_in'] = $uri;

        if ($rows >= 1) {
            $_SESSION['username'] = $username;
            header("location:home.php");
        } else {
            $usernameerror = "<strong><font color=red>Invalid username or password!</font></strong>";
        }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
</head>
<body OnLoad="document.myform.username.focus();">
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
<li><a href="elib.rar" title="Download Demo Version">Download demo version</a></li>
<li><a href="help2.php" title="Help">Help</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2>Administrator Login</h2>
    <form id="form1" name="myform" method="post" action="admin_login.php">
      <table width="335" border="0" bordercolor="#000000">
        <tr>
          <td bgcolor="#000000"><table width="327" height="170" border="0" cellpadding="5" cellspacing="5" class="bg_login">
            <tr>
              <td><?php
if (($usernameerror != "") || ($errorup != "")) {
    echo '<img src="images/warningnew.gif" width="50" height="45" />';
} else {
    echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
}
?></td>
              <td colspan="3" valign="middle"><?php echo $usernameerror . $errorup; ?></td>
            </tr>
            <tr>
              <td width="11%">Username:</td>
              <td width="36%"><input name="username" type="text" class="dilaw" id="username" value="admin" /></td>
              <td colspan="2" rowspan="3"><img src="images/lock1.gif" /></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input name="password" type="password" class="dilaw" id="password" value="anilag" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input name="submit" type="submit" class="btn" id="submit" value="Login" />&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="btn" id="reset" value="Reset" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>
      <p><?php echo $pagination; ?><a href="index.php"></a></p>
      <?php

/**perform the query
 *with limit assigned
 */

echo $er;
if (($_POST['op'] != 1) && ($txt != "")) {
    $sql .= " LIMIT $from, $max_results ";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....");
    $rows = mysql_num_rows($result);
    if ($search != "") {
        if ($rows == 0) {
            echo "<strong><font color=red>Your search return zero result(s)</font>
			 in category " . $type . "</strong>";
        }
    }
    if ($rows > 0) {
        echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for
		<strong>' . $search . '</strong> returned <strong>' . $number . '</strong> results<br><br><hr/>';

        $count = 1;
        while ($row = mysql_fetch_array($result)) {
            $id = $row['id'];
            $call_num = $row['call_num'];
            $author = $row['author'];
            $corp_author = $row['corp_author'];
            $title = $row['title'];
            $subject = $row['subject'];
            $isbn = $row['isbn'];
            $edition = $row['edition'];
            $place_pub = $row['place_pub'];
            $publisher = $row['publisher'];
            $date_pub = $row['date_pub'];
            $collation = $row['collation'];
            $language = $row['language'];
            $pdf = $row['pdf'];
            $help = $row['help'];
            $front = $row['front'];
            $pdb = $row['pdb'];

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
            ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="77" rowspan="3"><?php
if (($pdf == "") && ($help == "") && ($pdb == "")) {
                echo '<img src="images/no_preview.gif"
					title="' . $title . ' by ' . $author . '"/>';
            } else {
                echo '<a href="view_result.php?dest=' . $dest . '&id=' . $id . '">
					<img src="images/front/' . $front . '"
					title="' . $title . ' by ' . $author . '' . $doc . '"/>
					</a>';
            }
            ?>
              <br />
              <br /></td>
          <td width="277" bgcolor="#FFFFFF"><strong></strong><strong>Author(s):</strong>
              <?php
if (($pdf != "") || ($help != "") || ($pdb != "")) {
                echo '<a href="view_result.php?dest=' . $dest . '&id=' . $id . '">' . $author . '</a><br>';
            } else {
                echo "<strong>" . $author . "</strong>";
            }
            ?></td>
          <td width="207" bgcolor="#FFFFFF"><strong>Subject:</strong> <?php echo $subject; ?></td>
        </tr>
        <tr>
          <td><strong>Title:</strong><?php echo $title; ?></td>
          <td><strong>Language:</strong><?php echo $language; ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><strong>Date of Publication</strong>: <?php echo $date_pub; ?></td>
          <td bgcolor="#FFFFFF"><strong>Collation</strong>:<?php echo $collation; ?></td>
        </tr>
        <tr>
          <td><a href="admin_edit.php?id=<?php echo $id; ?>"></a> <a href="admin_delete.php"></a></td>
          <td><strong>Publisher:</strong><?php echo $publisher; ?></td>
          <td><strong>Edition</strong>:<?php echo $edition; ?></td>
        </tr>
        <tr>
          <td><strong>Call Number</strong><?php echo $call_num; ?></td>
          <td bgcolor="#FFFFFF"><strong>Place of Publication</strong>: <?php echo $place_pub; ?></td>
          <td bgcolor="#FFFFFF"><strong>ISBN</strong>:<?php echo $isbn; ?></td>
        </tr>
      </table>
      <hr />
			     <p>
			       <?php
$count++;
        }

    }
}
?>
    </p>
			     <p><?php echo $pagination;
?> </p>
  </div>
</div>
<div class="lowercontent"></div>
<div class="footer1"><table align="center">
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
