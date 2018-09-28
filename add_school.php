<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}
$op = 1;
include "include/connect.php";
include "include/gensettings.php";

if ($_POST['add']) {
    $school_name = $_POST['name'];
    $school_code = $_POST['code'];

    $sql = "select * from school where school_name = '$school_name' || school_code = '$school_code'";
    $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
    if (mysql_num_rows($result) != 0) { // if already exists
        $op = 2;
    } else {

        $sql = "INSERT INTO school
			(school_name,school_code) values('$school_name','$school_code')";
        $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
        $op = 3;

    }
}
require_once("/layout/header_admin.php");
?>
<div id="new_item202">
  <fieldset>
    <legend class="style1">Create School </legend>
    <?php if ($op == 1) {?>
    <form action="add_school.php" method="post" id="myform" name="myform">
      <table width="73%" border="0" cellpadding="5" cellspacing="5">
        <tr>
          <td width="24%" align="right"><strong>School name:</strong></td>
          <td width="2%">&nbsp;</td>
          <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
            <input name="name" type="text" id="name" size="40" /></td>
        </tr>
        <tr>
          <td align="right"><strong>School Code :</strong></td>
          <td>&nbsp;</td>
          <td width="41%"><input name="code" type="text" id="code" size="40" /></td>
          <td width="33%">&nbsp;</td>
        </tr>

        <tr>
          <td align="right" class="style2"><input name="Reset" type="reset" value="Reset" class="btn" /></td>
          <td>&nbsp;</td>
          <td class="style2"><input type="submit" name="add" id="add" value="Add School" class="btn" onClick=" return FormValidate()" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
    <?php }?>

    <?php if ($op == 2) {echo " School name or School code already exists!";?>
    <form action="add_school.php" method="post" id="myform" name="myform">
      <table width="73%" border="0" cellpadding="5" cellspacing="5">
        <tr>
          <td width="24%" align="right"><strong>School name:</strong></td>
          <td width="2%">&nbsp;</td>
          <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
            <input name="name" type="text" id="name" size="40" /></td>
        </tr>
        <tr>
          <td align="right"><strong>School Code :</strong></td>
          <td>&nbsp;</td>
          <td width="41%"><input name="code" type="text" id="code" size="40" /></td>
          <td width="33%">&nbsp;</td>
        </tr>

        <tr>
          <td align="right" class="style2"><input name="Reset" type="reset" value="Reset" class="btn" /></td>
          <td>&nbsp;</td>
          <td class="style2"><input type="submit" name="add" id="add" value="Add School" class="btn" onClick=" return FormValidate()" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
    <?php }?>

    <?php if ($op == 3) {?>
    <table width="73%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td colspan="4" class="style2">The Record is successfully added!&nbsp;&nbsp;<a href="school.php">Back to
            Schools Page</a> </td>

      </tr>
      <tr>

        <td width="25%" align="right"><strong>School name:</strong></td>
        <td width="2%">&nbsp;</td>
        <td colspan="2">
          <input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
          <?php echo $school_name; ?>
        </td>
      </tr>
      <tr>
        <td align="right"><strong>School code :</strong></td>
        <td>&nbsp;</td>
        <td width="67%">
          <?php echo $school_code; ?>
        </td>
        <td width="4%">&nbsp;</td>
      </tr>
    </table>
    <?php }?>
  </fieldset>
</div>
<script type="text/JavaScript">
  function FormValidate() {

    if (document.myform.name.value == "") {
      alert("Enter the School Name!");
      document.myform.name.focus();
      return false;
    }

    if (document.myform.code.value == "") {
      alert("Enter the School Code!");
      document.myform.code.focus();
      return false;
    }
  }
</script>
<?php require_once("layout/footer.php"); ?>