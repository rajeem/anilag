<?php
include "include/connect.php";
include "include/gensettings.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
</head>
<body>
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
    <h2>Help</h2>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td class="pageName"><table cellspacing="0" cellpadding="0" width="95%" align="center" border="0">
              <tbody>
                <tr>
                  <td
    background="Basic Search (Library of Congress Online Catalog)_files/tips-background.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td><table bordercolor="#cccc99" cellspacing="0" cellpadding="5" width="100%"
      border="1">
                      <tbody>
                        <tr bgcolor="#cccc99">
                          <th width="19%"><b><font face="Arial, Helvetica, sans-serif"
            size="-1">Search Type</font></b></th>
                          <th width="78%"><font face="Arial, Helvetica, sans-serif"
            size="-1">Brief Help </font></th>
                          <th width="3%"><a
            href="http://catalog.loc.gov/help/limits.htm"></a></th>
                        </tr>
                        <tr bgcolor="#ffffdd">
                          <td valign="top" align="middle" width="19%"><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1"><b>Title</b></font> </td>
                          <td width="78%"><p><font face="Arial, Helvetica, sans-serif" color="#000000" size="-1">-
                            Enter all or initial part of title, starting with the first word: <b>king and i </b><br />
                            - Drop initial articles (a, das, the) and
                            punctuation (&quot;, &iquest;, ! ) in any language.<br />
                                                <i>- Truncation is
                                                  automatic.</i></font></p></td>
                          <td width="3%">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#ffffdd">
                          <td valign="top" align="middle" width="19%"><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1"><b>Author/Creator </b></font></td>
                          <td width="78%"><p><font face="Arial, Helvetica, sans-serif" color="#000000" size="-1">- <U>For personal names</U>, enter surname first: <b>shakespeare
                            william</b><br />
                            - <U>For group names</U>, enter in direct order: <b>army war college</b><br />
                            <i>- Truncation is
                              automatic.</i></font></p></td>
                          <td width="3%">&nbsp;</td>
                        </tr>





                        <tr bgcolor="#ffffdd">
                          <td valign="top" align="middle" width="19%"><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1"><b>Subject</b></font></td>
                          <td width="78%"><p><font face="Arial, Helvetica, sans-serif" color="#000000" size="-1">-
                            Enter standard subject heading, name, or genre term: <b>solar energy </b><br />
                            - Start with the left-most word: <b>vietnamese conflict 1961
                              1975 </b><br />
                          - Omit most punctuation: <b>united states army history</b><b><br />
                                              </b><i>- Truncation is automatic.</i><b> </b></font></p></td>
                          <td width="3%">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#ffffdd">
                          <td valign="top" align="middle" width="19%"><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1"><b>Keywords </b></font> </td>
                          <td width="78%"><p><font face="Arial, Helvetica, sans-serif" color="#000000" size="-1">- </font><font face="Arial, Helvetica, sans-serif" color="#000000"><b>Enter 'bill' </b></font><font face="Arial, Helvetica, sans-serif" color="#000000"
            size="-1"> and will results --&gt; bill of rights, accessing bill, the bill of our native parents, bill gates <br />
                          </font></p>
                              </td>
                          <td width="3%">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#ffffdd">
                          <td valign="top" align="middle" width="19%"><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1"><b>Wild cards </b></font> </td>
                          <td width="78%"><p><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1">- </font><strong><font color="#000000" face="Arial, Helvetica, sans-serif">*</font></strong><font
            face="Arial, Helvetica, sans-serif" color="#000000" size="-1"> truncates: <b>entrepr*</b> --&gt; <i>finds</i> entrepreneur,
                                      entrepreneurial, etc.</font> <br />
                                      <strong><font color="#000000" size="-1" face="Arial, Helvetica, sans-serif">*ing --&gt; </font></strong><em><font color="#000000" size="-1" face="Arial, Helvetica, sans-serif">finds billing,engineering, etc</font></em> <br />
                          </p></td>
                          <td width="3%">&nbsp;</td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
              </tbody>
            </table>
              <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td><hr /></td>
        </tr>
      </table>
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
