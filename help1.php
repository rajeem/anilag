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
<body OnLoad="document.myform.search.focus();">
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?> <a name="top" id="top"></a></div>
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
<div class="maincontent">
  <div class="floatelft">
    <h2>Help</h2>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td class="pageName"><table cellspacing="0" cellpadding="0" width="95%" align="center" border="0">
              <tbody>
                <tr>
                  <td width="58%"
    background="Basic Search (Library of Congress Online Catalog)_files/tips-background.gif">&nbsp;</td>
                  <td width="42%"
    background="Basic Search (Library of Congress Online Catalog)_files/tips-background.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td height="270"><p><strong>1. The Logon page</strong><br />
                        <br />
                        <a href="#a1">1.1 Logging On the  System</a><br />
                        <a href="#a1">1.2 Logging Out of  the System</a><br />
                      <a href="#a3">1.3 Glossary</a></p>
                    <p><strong>Browsing Around the  System</strong><br />
                        <strong>The Home Page</strong></p>
                    <p><a href="#a1">1.1 Glossary</a></p>
                    <p><strong>2. The Search Page<br />
                      </strong><br />
                      <a href="#a5">2.1 Searching for a  Particular Book</a><br />
                      <a href="#a6">2.2 Glossary</a></p>
                    <p><strong>3. The Add Book Page </strong></p>
                    <p><a href="#a7">3.1 Adding a Book </a><br />
                      <a href="#a8">3.2 Entering a Text </a><br />
                      <a href="#a9">3.3 Deleting a  Particular Information or Text </a><br />
                      <a href="#a10">3.4 Attaching a File</a><br />
                      <a href="#a11">3.5 Glossary</a></p>
                    <p><strong>4. The Borrower's  Page</strong></p>
                    <p><a href="#a12">4.1 Searching for a  Borrower </a><br />
                      <a href="#a13">4.2 Borrowing a Book </a><br />
                      <a href="#a14">4.3 Adding a Borrower </a><br />
                      <a href="#a15">4.4 Displaying the  List of Borrowers </a><br />
                      <a href="#a16">4.5 Printing the List  of Borrowers </a><br />
                      <a href="#a17">4.6 Glossary </a></p>
                  <p><strong>5. The Inventory Page</strong> </p>
                  <p><a href="#a18">5.1 Lists of Borrowed  Books </a><br />
                      <a href="#a19">5.2 Creating Report  on Book Borrowed</a><br />
                      <a href="#a20">5.3 Displaying the  List of Overdue Books</a><br />
                      <a href="#a21">5.4 Displaying the List of Books most  Frequently Borrowed</a><br />
                    <a href="#a22">5.5 Glossary </a></p>
                  <p><strong>6. The Settings Page</strong></p>
                  <a href="#a23">6.1 Accessing the  Settings Page </a>
                  <p><strong>7. Backup and Restore  Page</strong></p>
                  <p><a href="#a24">7.1 Database Back-up</a><br />
                    7.2 Restoring  Database<br />
                    7.3 Glossary </p>
                  <p><strong>8. User Account Page</strong></p>
                  <p>8.1 Changing the  Default User</p></td>
                  <td><p>&nbsp;</p></td>
                </tr>
                <tr>
                  <td colspan="2"><p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <hr />
                    <p><strong>1.1 Logging On the  System</strong><a name="a1" id="a1"></a><a href="#top"></a></p>
                    <p>To logon the system</p>
                    <ol start="1" type="1">
                    <li>You must       type your username and password on the text boxes provided</li>
                    <li>Then click       on the enter button.</li>
                    </ol>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The  username and password must be secured from the System Administrator.<br />
                      <img src="screenshots/login page.png" width="445" height="333" /><a href="#top"></a><br />
                      <a href="#top">top</a></p>
                    <hr />
                    <p><strong>1.2 Logging Out of  the System</strong><a name="a2" id="a2"></a></p>
                    <p>To LogOut</p>
                    <p>Click the LogOut button to exit the system and  you will be redirected to the LogOn Screen.</p>
                    <hr />
                  <p><strong>1.3 Glossary</strong><a name="a3" id="a3"></a></p>
                  <p>
                    <ul>
                      <li>Button - a small outlined area in a dialog box  that you can select an option.</li>
                      <li>Click - to press the left button once.</li>
                      <li>Dialog Box - a special window, used in user  interfaces to display information to the user, or to get response if needed.</li>
                      <li>Library&nbsp; -  A collection of information, sources, resources and services organized for use  and maintained by a public body an institution or a private individual.</li>
                      <li>Log On (Or Log In) - the Process of gaining  access, or signing in, to a system.</li>
                      <li>Log Out - to close off one's access to a  computer system after previously Logging in..</li>
                      <li>Password - a secret series of characters that  enables a user to access a file, computer or a program.</li>
                      <li>System - a set of entities, real or abstract,  comprising a whole where each component interacts with or is related to at  least one other component and they all serve a common objective.&nbsp; </li>
                      <li>System Administrator - a person employed to  maintain and operate a computer system or network. </li>
                      <li>Textbox -is an input box that lets user enter  text.</li>
                      <li>Username - a name used to gain access to a  computer system.</li>
                    </ul>
                      <hr />
                      <p>&nbsp;</p>

                    <strong>Browsing Around the  System</strong><br />
                    <strong>The Home Page</strong></p>
                  <p><strong>1.1 Glossary</strong><a name="a4" id="a4"></a></p>
                  <p><img src="screenshots/home.png" width="445" height="333" />
                    <br />
                    <a href="#top">top</a>
                  <ul>
                    <ul>
                      <li>Hyperlink&nbsp;&nbsp;  (often referred to simply as a link) a reference or navigation element  in a document to another section of the same document, another document, or a  specified section of another document, that automatically brings the referred  information to the user when the navigation element is selected by the user.</li>
                      <li>Menu - a list of commands or options from which  you can choose.</li>
                    </ul>
                  </p>
                  <hr />
                  <p><strong>2. The Search Page</strong></p>
                  <p>The search tool filters the list  of books for a particular set of documents depending on a search criteria. the  search criteria available are author, title, subject, and text contained.</p>
                  <strong>2.1 Searching for a  Particular Book<a name="a5" id="a5"></a> </strong>
                  <p>To search for a particular book</p>
                  <ol start="1" type="1">
                    <li>Type in the search pattern on the &ldquo;Search For&rdquo; box.</li>
                    <li>Choose a criteria on the provided drop-down list.</li>
                    <li>Click the Search button </li>
                    </ol>
                    <p><img src="screenshots/borrower.png" width="445" height="333" /><br />
                      <a href="#top">top</a></p>
                    <p><strong>2.2 Glossary</strong><a name="a6" id="a6"></a></p>
                    <p>
                    <ul>
                        <li>Drop-down list (Or Pull down list) - a graphical  user interface component that allows user to choose one (or sometimes more than  one) item from a list.</li>
                        <li>Search - the act or process to find something  thoroughly. </li>
                    </ul>
                    </p>
                    <hr />
                    <p><strong>3. The Add Book Page </strong></p>
                    <p>Adding a book is same as filing up any form-based interface.  A form uses field, drop downs and push buttons. These are called controls.</p>
                    <p><strong>3.1 Adding a Book </strong><strong><a name="a7" id="a7"></a></strong></p>
                    <p>To add a book</p>
                    <ol start="1" type="1">
                      <li>Click the       &ldquo;Add Book&rdquo; link from either the Quicklink Menus or the Home Page Menus.</li>
                      <li>Use the mouse or tab key to select and move or  switch between control.</li>
                    </ol>
                    <p><img src="screenshots/add book.png" width="445" height="333" /><br />
                      <a href="#top">top</a></p>
                    <p>.<strong>3.2 Entering a Text </strong><strong><a name="a8" id="a8"></a></strong></p>
                  <p>To enter any text</p>
                  <ul>

                    <li>Click on the field and type.</li>
                  </ul>
                  <p><strong>3.3 Deleting a  Particular Information or Text </strong><strong><a name="a9" id="a9"></a></strong></p>
                  <p>To delete a particular information or text</p>
                  <ul>
                    <li>Use the backspace key or the delete key.</li>
                    </ul>
                  <p><strong>3.4 Attaching a File</strong><strong><a name="a10" id="a10"></a></strong></p>
                  <p>To attach File</p>
                  <ol>
                    <ol>
                      <li>Click on the &ldquo;Attach File&rdquo; button, a pop-up menu  window will appear. </li>
                      <li>Click on &ldquo;Browse&rdquo; to select the file that you  need to attach.</li>
                      <li>After selecting the file, click on the &ldquo;Use File  as&rdquo; drop down list to select and</li>
                      <li>Click the &ldquo;Attach&rdquo; button to upload the file </li>
                    </ol>
                  </ol>
                  <p>OR</p>
                  <ul>
                    <li>&nbsp;Click the  &ldquo;Cancel&rdquo; button if you don't want to attach the file.</li>
                    <li>After attaching the file click on &ldquo;Add&rdquo;.</li>
                    </ul>
                  <p><img src="screenshots/attach file.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>3.5 Glossary<a name="a11" id="a11"></a></strong></p>
                  <ul>
                    <li>Fields - are line areas&nbsp; or textboxes that allow the user to input  text.</li>
                    <li>File - a collection of data or information that  has a name.</li>

                  <li>Menu - a list of commands or options from which  you can choose.</li> </ul>
                  <hr />                  <p><strong>4. The Borrower's  Page</strong></p>
                  <p><strong>4.1 Searching for a  Borrower </strong><strong><a name="a12" id="a12"></a></strong></p>
                  <p>To search for a borrower&nbsp; </p>
                  <ol start="1" type="1">
                    <li>Click on       the &ldquo;Search Borrower&rdquo; button<br />
                    </li>
                    <li>Type in       your Borrower's ID on the Enter Borrower's ID field and,</li>
                    <li>Click the       &ldquo;Search&rdquo; button.</li>
                  </ol>
                  <p><img src="screenshots/borrower.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>4.2 Borrowing a Book </strong><strong><a name="a13" id="a13"></a></strong></p>
                  <p>To borrow a book</p>
                  <ol>
                    <li>Type your Borrower's ID on the Borrowers ID  field.<br />
                    </li>
                    <li>Enter the       call number or book to be borrowed on the Call Number or Record ID box</li>
                    <li>Click the       &ldquo;Add&rdquo; button.</li>
                  </ol>
                  <p><img src="screenshots/borrow book.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>4.3 Adding a Borrower </strong><strong><a name="a14" id="a14"></a></strong></p>
                  <p>To add a borrower</p>
                  <ol>
                    <li>Fill-up the       form for adding a borrower. <br />
                    </li>
                    <li>Click on       the &ldquo;Create&rdquo; Button to add the borrower on the system</li>
                  </ol>
                  <p><img src="screenshots/add borrower.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>4.4 Displaying the  List of Borrowers </strong><strong><a name="a15" id="a15"></a></strong></p>
                  <p>To display the list of borrowers</p>
                  <p>Click on the &ldquo;Show Borrower&rdquo; link. A tabular  list of borrower's would be displayed</p>
                  <p><img src="screenshots/show borrower.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>4.5 Printing the List  of Borrowers</strong> <strong><a name="a16" id="a16"></a></strong></p>
                  <p>To print the list of borrowers</p>
                  <ol start="1" type="1">
                    <li>Click on       the &ldquo;Show Borrowers&rdquo; Link and</li>
                    <li>Click the       &ldquo;Print...&rdquo; button. A pop-up window containing a PDF file will appear.</li>
                    <li>On the PDF       window, click File then choose Print.</li>
                  </ol>
                  <p><strong>4.6 Glossary </strong><strong><a name="a17" id="a17"></a></strong></p>
                  <p><ul>
                      <li>List - any ordered set of data. </li>
                      <li>Pop-up window&nbsp;  - a window that suddenly appears (pops up) when you select an option  with a mouse or press a special function key.</li>
                      <li>Portable Document Format (PDF)&nbsp; - is the file format created by Adobe Systems  in 1993 for document exchange.<br clear="all" />
                      </li>
                      </ul>
                  </p>
                  <hr />                  <p><strong>5. The Inventory Page</strong></p>
                  <p><strong>5.1 Lists of Borrowed  Books</strong><strong><a name="a18" id="a18"></a></strong></p>
                  <p>To display the list of borrowed books</p>
                  <ol>
                    <li>Click on       the Books borrowed icon.</li>
                    <li>Click Print       to print a copy of the list of Books Borrowed.</li>
                  </ol>
                  <p><img src="screenshots/inventory.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>5.2 Creating Report  on Book Borrowed</strong><strong><a name="a19" id="a19"></a></strong></p>
                  <p>To create report on books borrowed</p>
                  <ol start="1" type="1">
                    <li>Click on       the &ldquo;Create Report&rdquo; button just below the Book Borrowed icon. A pop-up       window will appear .</li>
                    <li>Choose       whether it is a &ldquo;weekly&rdquo;, &ldquo;monthly&rdquo; or &ldquo;yearly&rdquo; report.</li>
                    <li>To close       the pop-up window, click the &ldquo;cancel&rdquo; button.</li>
                  </ol>
                  <p><img src="screenshots/report book borrowed.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>5.3 Displaying the  List of Overdue Books<a name="a20" id="a20"></a></strong></p>
                  <p>To display the list of overdue books </p>
                  <ol>
                    <li>Click on the Overdue Books icon. A tabular list  of overdue books will be displayed</li>
<li>Click the                 Print button to print a copy of the Overdue Books list</li>
                  </ol>
                  <p><img src="screenshots/overdue books.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>5.4 Displaying the List of Books most  Frequently Borrowed</strong><strong><a name="a21" id="a21"></a></strong></p>
                  <p>To display the list of books most frequently borrowed</p>
                  <ol>
                    <li>Click on       the Book History Icon. The list of Books frequently borrowed will be       displayed.</li>
                    <li>Click the &ldquo;Print&rdquo; button to print a copy of the  Book History list</li>
                  </ol>
                  <p><img src="screenshots/history.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>5.5 Glossary </strong><strong><a name="a22" id="a22"></a></strong></p>
                  <ul>
                    <li>Icon - a small picture that represents an object  or program.</li>
                    <li>Reports - a formatted and organized presentation  of data.</li>
                    <li>Submenu - a menu that is contained within  another menu.</li>
                    </ul>
                  <hr />                  <p><strong>6. The Settings Page</strong></p>
                  <p><strong>6.1 Accessing the  Settings Page </strong><strong><a name="a23" id="a23"></a></strong></p>
                  <p>To access the settings page</p>
                  <ol>
                    <li>At your       Home Page, click on the Settings icon or Use the Quicklinks.</li>
                    <li>Click the       field for any entry that you wish to change type in the changes.</li>
                    <li>Click Change All button to save the changes you  made</li>
                  </ol>
                  <p><img src="screenshots/settings.png" width="445" height="333" /><br />
                    <a href="#top">top</a></p>
                  <p><strong>7. Backup and Restore  Page</strong></p>
                  <p><strong>7.1 Database Back-up<a name="a24" id="a24"></a></strong></p></td>
                </tr>
              </tbody>
            </table>
          </td>
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