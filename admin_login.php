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
if ((isset($usernameerror)) || (isset($errorup))) {
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
