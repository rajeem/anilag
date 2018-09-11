<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:admin_login.php");
    exit;
}

$today = date("F j, Y, g:i a");
$user = $_SESSION['username'];

include "include/connect.php";
include "include/gensettings.php";
include "user.php";

$op = 1;
$id = $_GET['id'];

//authorized
if ($edit_book == "on") {

    $sql = "SELECT * FROM card_cat WHERE id='$id'";
    $result = mysql_query($sql, $connect) or die("cant execute query!.....");
    while ($row = mysql_fetch_array($result)) {
        $front = $row["front"];
        $pdf = $row["pdf"];
        session_register("pdf");
        $help = $row["help"];
        $pdb = $row["pdb"];
        session_register("pdb");
        $id = $row['id'];
        $qty = $row['qty'];
        $location = $row['location'];
        //$hanap_code        =$row['school_code'];
        $access_num = $row['access_no'];
        //$call_num        =$row['call_num'];
        $classification_no = $row['classification_no'];
        $book_no = $row['book_no'];
        $author_no = $row['author_no'];
        $author_sname = $row['author_sname'];
        $author_fname = $row['author_fname'];
        $author_mname = $row['author_mname'];
        $other_author1_no = $row['other_author1_no'];
        $other_author1_sname = $row['other_author1_sname'];
        $other_author1_fname = $row['other_author1_fname'];
        $other_author1_mname = $row['other_author1_mname'];
        $other_author2_no = $row['other_author2_no'];
        $other_author2_sname = $row['other_author2_sname'];
        $other_author2_fname = $row['other_author2_fname'];
        $other_author2_mname = $row['other_author2_mname'];
        $other_author3_no = $row['other_author3_no'];
        $other_author3_sname = $row['other_author3_sname'];
        $other_author3_fname = $row['other_author3_fname'];
        $other_author3_mname = $row['other_author3_mname'];
        $other_author4_no = $row['other_author4_no'];
        $other_author4_sname = $row['other_author4_sname'];
        $other_author4_fname = $row['other_author4_fname'];
        $other_author4_mname = $row['other_author4_mname'];
        $other_author5_no = $row['other_author5_no'];
        $other_author5_sname = $row['other_author5_sname'];
        $other_author5_fname = $row['other_author5_fname'];
        $other_author5_mname = $row['other_author5_mname'];
        $other_author6_no = $row['other_author6_no'];
        $other_author6_sname = $row['other_author6_sname'];
        $other_author6_fname = $row['other_author6_fname'];
        $other_author6_mname = $row['other_author6_mname'];
        $other_author7_no = $row['other_author7_no'];
        $other_author7_sname = $row['other_author7_sname'];
        $other_author7_fname = $row['other_author7_fname'];
        $other_author7_mname = $row['other_author7_mname'];

        $title = $row['title'];
        $parallel_title = $row['parallel_title'];
        $oti = $row['oti'];
        $uti = $row['uti'];
        $edition = $row['edition'];
        $gmd = $row['gmd'];
        //$classification    =$row['classification'];
        $place_pub = $row['place_pub'];
        $publisher = $row['publisher'];
        $date_pub = $row['date_pub'];
        $eoi = $row['eoi'];
        $opd = $row['opd'];
        $size_dimension = $row['size_dimension'];
        $series = $row['series'];
        $accom_mat = $row['accom_mat'];
        $notes = $row['notes'];
        $isbn = $row['isbn'];
        $subject_classification = $row['subject_classification'];
        $subject1 = $row['subject1'];
        $subject2 = $row['subject2'];
        $subject3 = $row['subject3'];
        $subject4 = $row['subject4'];
        $subject5 = $row['subject5'];
        $subject6 = $row['subject6'];
        $subject7 = $row['subject7'];

        $source_of_fund = $row['source_of_fund'];
        $mode_of_ac = $row['mode_of_ac'];
        $mode_ac = $row['mode_ac'];
        $date_ac = $row['date_ac'];
        $property_no = $row['property_no'];
        $are = $row['are'];
        $date_verify = $row['date_verify'];
        $date_encode = $row['date_encode'];
        $encoded_by = $row['encoded_by'];
        $verified_by = $row['verified_by'];
        $editors = $row['editors'];
        $illustrator = $row['illustrator'];
        $author_relatingto_edition = $row['author_relatingto_edition'];
        $preliminary = $row['preliminary'];
        $no_of_pages = $row['no_of_pages'];
        $userfile_name = $row['file_name'];
        $stat = "disabled=disabled";
    } // end while

//get school_code
    $sql = "SELECT * from card_cat where id='$id'";
    $res = mysql_query($sql);
    while ($row2 = mysql_fetch_array($res)) {
        $hanap_code = $row2['school_code'];
    }

//get class
    $sq2 = "SELECT * from card_cat where id='$id'";
    $res2 = mysql_query($sq2);
    while ($class = mysql_fetch_array($res2)) {
        $cla = $class['classification'];}

//if form submit
    if ($_POST['submit']) {
        $id = $_POST['id'];

        $front = $_SESSION["front"];
        $pdf = $_SESSION["pdf"];
        session_unregister("pdf");
        $help = $_SESSION["help"];
        $pdb = $_SESSION["pdb"];
        session_unregister("pdb");
        session_unregister("front");
        session_unregister("pdf");
        session_unregister("help");
        session_unregister("pdb");
        $school_code = $_POST['school_code'];
        $location = $_POST['location'];
        $access_num = $_POST['access_no'];
        $classification_no = $_POST['classification_no'];
        $book_no = $_POST['book_no'];
        //$call_num        =$_POST['call_num'];
        $author_no = $_POST['author_no'];
        $author_sname = $_POST['author_sname'];
        $author_fname = $_POST['author_fname'];
        $author_mname = $_POST['author_mname'];
//    $_SESSION[author] =$_POST['author'];

        $other_author1_no = $_POST['other_author1_no'];
        $other_author1_sname = $_POST['other_author1_sname'];
        $other_author1_fname = $_POST['other_author1_fname'];
        $other_author1_mname = $_POST['other_author1_mname'];

        $other_author2_no = $_POST['other_author2_no'];
        $other_author2_sname = $_POST['other_author2_sname'];
        $other_author2_fname = $_POST['other_author2_fname'];
        $other_author2_mname = $_POST['other_author2_mname'];

        $other_author3_no = $_POST['other_author3_no'];
        $other_author3_sname = $_POST['other_author3_sname'];
        $other_author3_fname = $_POST['other_author3_fname'];
        $other_author3_mname = $_POST['other_author3_mname'];

        $other_author4_no = $_POST['other_author4_no'];
        $other_author4_sname = $_POST['other_author4_sname'];
        $other_author4_fname = $_POST['other_author4_fname'];
        $other_author4_mname = $_POST['other_author4_mname'];

        $other_author5_no = $_POST['other_author5_no'];
        $other_author5_sname = $_POST['other_author5_sname'];
        $other_author5_fname = $_POST['other_author5_fname'];
        $other_author5_mname = $_POST['other_author5_mname'];

        $other_author6_no = $_POST['other_author6_no'];
        $other_author6_sname = $_POST['other_author6_sname'];
        $other_author6_fname = $_POST['other_author6_fname'];
        $other_author6_mname = $_POST['other_author6_mname'];

        $other_author7_no = $_POST['other_author7_no'];
        $other_author7_sname = $_POST['other_author7_sname'];
        $other_author7_fname = $_POST['other_author7_fname'];
        $other_author7_mname = $_POST['other_author7_mname'];

        $title = $_POST['title'];
        $parallel_title = $_POST['parallel_title'];
        $oti = $_POST['oti'];
        $uti = $_POST['uti'];
        $edition = $_POST['edition'];
        $gmd = $_POST['classification'];
        $classification = $_POST['classification'];
//    echo $id.$access_num.$classification;

        $place_pub = $_POST['place_pub'];
        $publisher = $_POST['publisher'];
        $date_pub = $_POST['date_pub'];
        $eoi = $_POST['eoi'];
        $opd = $_POST['opd'];
        $size_dimension = $_POST['size_dimension'];
        $series = $_POST['series'];
        $accom_mat = $_POST['accom_mat'];
        $notes = $_POST['notes'];
        $isbn = $_POST['isbn'];
        $subject_classification = $_POST['subject_classification'];
        $subject1 = $_POST['subject1'];
        $subject2 = $_POST['subject2'];
        $subject3 = $_POST['subject3'];
        $subject4 = $_POST['subject4'];
        $subject5 = $_POST['subject5'];
        $subject6 = $_POST['subject6'];
        $subject7 = $_POST['subject7'];
        $source_of_fund = $_POST['source_of_fund'];
        $mode_ac = $_POST['mode_ac'];
        $mode_of_ac = $_POST['mode_of_ac'];
        $date_ac = $_POST['date_ac'];
        $property_no = $_POST['property_no'];
        $are = $_POST['are'];
        $verified_by = $_POST['verified_by'];
        $editors = $_POST['editors'];
        $illustrator = $_POST['illustrator'];
        $author_relatingto_edition = $_POST['author_relatingto_edition'];
        $preliminary = $_POST['preliminary'];
        $no_of_pages = $_POST['no_of_pages'];

        if ($userfile_size > 250000) {$msg = "Your uploaded file size is more than 250KB so please reduce the file size and then 			upload. Visit the help page to know how to reduce the file size.<BR>";
            $book_pic = "false";
        }
        $add = "upload/$userfile_name"; // the path with the file name where the file will be stored, upload is the directory name.

        if (!($userfile_type == "image/pjpeg" or $userfile_type == "image/gif")) {$msg = $msg . "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
            $book_pic = "false";
        }

        $status = "in";

        //if some field is blank
        if ($access_num == "") {
            $fielderror = "<strong><font color=red>Please fill the important fields!</font></strong>";
        } else {

            //update
            if (move_uploaded_file($userfile, $add)) {
                $sql = "UPDATE card_cat set school_code='$school_code',location='$location',author_no='$author_no',
			author_sname='$author_sname',author_fname='$author_fname',author_mname='$author_mname',classification_no='$classification_no',book_no='$book_no',
				other_author1_no='$other_author1_no',other_author1_sname='$other_author1_sname',other_author1_fname='$other_author1_fname',other_author1_mname='$other_author1_mname',
				other_author2_no='$other_author2_no',other_author2_sname='$other_author2_sname',other_author2_fname='$other_author2_fname',other_author2_mname='$other_author2_mname',
other_author3_no='$other_author3_no',other_author3_sname='$other_author3_sname',other_author3_fname='$other_author3_fname',other_author3_mname='$other_author3_mname',
			other_author4_no='$other_author4_no',other_author4_sname='$other_author4_sname',other_author4_fname='$other_author4_fname',other_author4_mname='$other_author4_mname',
			other_author5_no='$other_author5_no',other_author5_sname='$other_author5_sname',other_author5_fname='$other_author5_fname',other_author5_mname='$other_author5_mname',
			other_author6_no='$other_author6_no',other_author6_sname='$other_author6_sname',other_author6_fname='$other_author6_fname',other_author6_mname='$other_author6_mname',
			other_author7_no='$other_author7_no',other_author7_sname='$other_author7_sname',other_author7_fname='$other_author7_fname',other_author7_mname='$other_author7_mname',title='$title',parallel_title='$parallel_title',oti='$oti',uti='$uti',
			edition='$edition',gmd='$classification',classification='$classification',place_pub='$place_pub',
			publisher='$publisher',date_pub='$date_pub',eoi='$eoi',opd='$opd',size_dimension='$size_dimension',
			series='$series',accom_mat='$accom_mat',notes='$notes',isbn='$isbn',subject_classification='$subject_classification',subject1='$subject1',subject2='$subject2',
			subject3='$subject3',subject4='$subject4',subject5='$subject5',subject6='$subject6',subject7='$subject7',			source_of_fund='$source_of_fund',mode_of_ac='$mode_of_ac',mode_ac='$mode_ac',
			date_ac='$date_ac',property_no='$property_no',are='$are',encoded_by='$user',	verified_by='$verified_by',date_verify='$today',front='$front',pdf='$pdf',help='$help',pdb='$pdb',status1='$status',editors='$editors',illustrator='$illustrator',author_relatingto_edition='$author_relatingto_edition',preliminary='$preliminary',no_of_pages='$no_of_pages',file_name='$userfile_name',file_size='$userfile_size',file_type='$userfile_type'
			 where id='$id' && access_no='$access_num' ";
            } else {
                $sql = "UPDATE card_cat set school_code='$school_code',location='$location',author_no='$author_no',
			author_sname='$author_sname',author_fname='$author_fname',author_mname='$author_mname',classification_no='$classification_no',book_no='$book_no',
				other_author1_no='$other_author1_no',other_author1_sname='$other_author1_sname',other_author1_fname='$other_author1_fname',other_author1_mname='$other_author1_mname',
				other_author2_no='$other_author2_no',other_author2_sname='$other_author2_sname',other_author2_fname='$other_author2_fname',other_author2_mname='$other_author2_mname',
other_author3_no='$other_author3_no',other_author3_sname='$other_author3_sname',other_author3_fname='$other_author3_fname',other_author3_mname='$other_author3_mname',
			other_author4_no='$other_author4_no',other_author4_sname='$other_author4_sname',other_author4_fname='$other_author4_fname',other_author4_mname='$other_author4_mname',
			other_author5_no='$other_author5_no',other_author5_sname='$other_author5_sname',other_author5_fname='$other_author5_fname',other_author5_mname='$other_author5_mname',
			other_author6_no='$other_author6_no',other_author6_sname='$other_author6_sname',other_author6_fname='$other_author6_fname',other_author6_mname='$other_author6_mname',
			other_author7_no='$other_author7_no',other_author7_sname='$other_author7_sname',other_author7_fname='$other_author7_fname',other_author7_mname='$other_author7_mname',title='$title',parallel_title='$parallel_title',oti='$oti',uti='$uti',
			edition='$edition',gmd='$classification',classification='$classification',place_pub='$place_pub',
			publisher='$publisher',date_pub='$date_pub',eoi='$eoi',opd='$opd',size_dimension='$size_dimension',
			series='$series',accom_mat='$accom_mat',notes='$notes',isbn='$isbn',subject_classification='$subject_classification',subject1='$subject1',subject2='$subject2',
			subject3='$subject3',subject4='$subject4',subject5='$subject5',subject6='$subject6',subject7='$subject7',			source_of_fund='$source_of_fund',mode_of_ac='$mode_of_ac',mode_ac='$mode_ac',
			date_ac='$date_ac',property_no='$property_no',are='$are',encoded_by='$user',	verified_by='$verified_by',date_verify='$today',front='$front',pdf='$pdf',help='$help',pdb='$pdb',status1='$status',editors='$editors',illustrator='$illustrator',author_relatingto_edition='$author_relatingto_edition',preliminary='$preliminary',no_of_pages='$no_of_pages'
			 where id='$id' && access_no='$access_num' ";
            }
            $result = mysql_query($sql, $connect) or die("cant execute query! #1");

            $sql2 = "select * from titles where title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname'";
            $result2 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());
            if (mysql_num_rows($result2) == 0) {

                $sql = "INSERT INTO titles
			(title_proper,quantity,author_sname,author_fname,author_mname)

		    VALUES('$title','1','$sname','$fname','$mname')";

                $result3 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
            }

            //if title already exists!
            $sql_4 = "select * from card_cat where title='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
            $result4 = mysql_query($sql_4, $connect) or die("cant execute query!" . mysql_error());
            $num = mysql_num_rows($result4); // count number of times the title is present

            if (mysql_num_rows($result4) != 0) {

//    $sql2 = "select * from titles where title_proper='$title'";
                //    $result2 = mysql_query($sql2,$connect) or die("cant execute query!".mysql_error());
                //    if (mysql_num_rows($result2) != 0){                // if already exists
                $quantity = $num;

                $sql = "UPDATE titles set quantity='$quantity' WHERE title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
                $result5 = mysql_query($sql, $connect) or die("cant execute query!!!");

            }

            if (mysql_num_rows($result4) == 0) {

/*    $sql2 = "select * from titles where title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
$result6 = mysql_query($sql2,$connect) or die("cant execute query!".mysql_error());
 */
                $sql = "INSERT INTO titles
			(title_proper,quantity,author_sname,author_fname,author_mname)

		    VALUES('$title','1','$sname','$fname','$mname')";

                $result7 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());

            } //  if title does not exists  - result4

            $op = 2;
            $success = "The record was successfully modified!";

        } // else
    } // ifUpdate button is clicked
    //}// end if for picture

} else {
    $msg_mo = "You are not allowed to edit a book record!";
    $op = 3;}
//if add_copy button is clicked
if ($_POST['add_copy']) {
    $front = $_SESSION["front"];
    $pdf = $_SESSION["pdf"];
    $help = $_SESSION["help"];
    $pdb = $_SESSION["pdb"];
    session_unregister("front");
    session_unregister("pdf");
    session_unregister("help");
    session_unregister("pdb");
    //$hanap_code        =$_POST['school_code'];
    $school_code = $_POST['school_code'];
    //if($school_code==""){
    //$school_code=$dschool_code;
    //}
    $location = $_POST['location'];
    //$access_num        =$_POST['access_no'];
    $classification_no = $_POST['classification_no'];
    $book_no = $_POST['book_no'];
    //$call_num        =$_POST['call_num'];
    $author_no = $_POST['author_no'];
    $author_mname = $_POST['author_mname'];
    $author_fname = $_POST['author_fname'];
    $author_sname = $_POST['author_sname'];
    $title = $_POST['title'];
    $parallel_title = $_POST['parallel_title'];
    $oti = $_POST['oti'];
    $uti = $_POST['uti'];
    $edition = $_POST['edition'];
    $gmd = $_POST['classification'];
    $classification = $_POST['classification'];
    $place_pub = $_POST['place_pub'];
    $publisher = $_POST['publisher'];
    $date_pub = $_POST['date_pub'];
    $eoi = $_POST['eoi'];
    $opd = $_POST['opd'];
    $size_dimension = $_POST['size_dimension'];
    $series = $_POST['series'];
    $accom_mat = $_POST['accom_mat'];
    $notes = $_POST['notes'];
    $isbn = $_POST['isbn'];
    $subject_classification = $_POST['subject_classification'];
    $subject1 = $_POST['subject1'];
    $subject2 = $_POST['subject2'];
    $subject3 = $_POST['subject3'];
    $subject4 = $_POST['subject4'];
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    $subject7 = $_POST['subject7'];
    $source_of_fund = $_POST['source_of_fund'];
    $mode_ac = $_POST['mode_ac'];
    $mode_of_ac = $_POST['mode_of_ac'];
    $date_ac = $_POST['date_ac'];
    $property_no = $_POST['property_no'];
    $are = $_POST['are'];
    $verified_by = $_POST['verified_by'];
    $editors = $_POST['editors'];
    $illustrator = $_POST['illustrator'];
    $author_relatingto_edition = $_POST['author_relatingto_edition'];
    $preliminary = $_POST['preliminary'];
    $no_of_pages = $_POST['no_of_pages'];
    $usefile_name = $_POST['userfile_name'];
    $usefile_size = $_POST['userfile_size'];
    $usefile_type = $_POST['userfile_type'];
    $status = "in";

    $other_author1_no = $_POST['other_author1_no'];
    $other_author1_sname = $_POST['other_author1_sname'];
    $other_author1_fname = $_POST['other_author1_fname'];
    $other_author1_mname = $_POST['other_author1_mname'];

    $other_author2_no = $_POST['other_author2_no'];
    $other_author2_sname = $_POST['other_author2_sname'];
    $other_author2_fname = $_POST['other_author2_fname'];
    $other_author2_mname = $_POST['other_author2_mname'];

    //$other_author2    = $other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname;

    $other_author3_no = $_POST['other_author3_no'];
    $other_author3_sname = $_POST['other_author3_sname'];
    $other_author3_fname = $_POST['other_author3_fname'];
    $other_author3_mname = $_POST['other_author3_mname'];

//    $other_author3    = $other_author3_sname.' '.$other_author3_fname.' '.$other_author3_mname;

    $other_author4_no = $_POST['other_author4_no'];
    $other_author4_sname = $_POST['other_author4_sname'];
    $other_author4_fname = $_POST['other_author4_fname'];
    $other_author4_mname = $_POST['other_author4_mname'];

    $other_author4 = $other_author4_sname . ' ' . $other_author4_fname . ' ' . $other_author4_mname;

    $other_author5_no = $_POST['other_author5_no'];
    $other_author5_sname = $_POST['other_author5_sname'];
    $other_author5_fname = $_POST['other_author5_fname'];
    $other_author5_mname = $_POST['other_author5_mname'];

//    $other_author5    = $other_author5_sname.' '.$other_author5_fname.' '.$other_author5_mname;

    $other_author6_no = $_POST['other_author6_no'];
    $other_author6_sname = $_POST['other_author6_sname'];
    $other_author6_fname = $_POST['other_author6_fname'];
    $other_author6_mname = $_POST['other_author6_mname'];

//    $other_author6    = $other_author6_sname.' '.$other_author6_fname.' '.$other_author6_mname;

    $other_author7_no = $_POST['other_author7_no'];
    $other_author7_sname = $_POST['other_author7_sname'];
    $other_author7_fname = $_POST['other_author7_fname'];
    $other_author7_mname = $_POST['other_author7_mname'];
    $stat = " ";
    //$other_author7    = $other_author7_sname.' '.$other_author7_fname.' '.$other_author7_mname;

    //$op=2;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>

<SCRIPT language=javascript>

function numbersOnly(el){
el.value = el.value.replace(/[^0-9]/g, "");
}
</SCRIPT>
<script>
  var numLinesAdded = 3;

  function focusNext(tBox){
    var name = tBox.name;
    var index = name.substring(name.indexOf('_')+1);
    var brother = eval("document.all.txt2_" + index);
    var l = tBox.value.length;
    if (l >= tBox.maxLength){
      brother.focus();
    }
  }

	function generateRow() {
	var d=document.getElementById("div");

		if(numLinesAdded<=7){
	d.innerHTML+="Other_Author" +numLinesAdded+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ "<input type='text' size='12' name='other_author" + numLinesAdded + "_sname"+"' onkeypress='focusNext(this)' >";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;&nbsp;&nbsp;"+ "<input type='text' size='12' name='other_author" + numLinesAdded + "_fname"+"' onkeypress='focusNext(this)' >";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;&nbsp;"+ "<input type='text' size='12' name='other_author" + numLinesAdded + "_mname"+"' onkeypress='focusNext(this)' ><br>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;

		}
	numLinesAdded++;
	}
</script>
<script>
  var numLinesAdd = 3;

  function focusNext(tBox){
    var name = tBox.name;
    var index = name.substring(name.indexOf('_')+1);
    var brother = eval("document.all.txt2_" + index);
    var l = tBox.value.length;
    if (l >= tBox.maxLength){
      brother.focus();
    }
  }

function generateRow1() {
	var d=document.getElementById("div1");

		if (numLinesAdd<=7){

	d.innerHTML+= "Subject&nbsp;&nbsp;"+numLinesAdd +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<input  type='text' size='49'  name='subject" + numLinesAdd + "' onkeypress='focusNext(this)' ><BR>";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
		}
	numLinesAdd++;
	}
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title . "--" . $footer; ?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>" />
<style type="text/css">
<!--
.style2 {
	font-size: small;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body >
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;" . $header_title; ?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo; ?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div></div>
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
    <h2>Edit book </h2>

	<?php if ($op == 1) {?>
    <form id="form1" name="myform" method="post" action="admin_edit2.php" enctype="multipart/form-data">
      <table width="87%" border="0" cellpadding="0" cellspacing="3">
      <tr>
          <td height="30" align="right" class="style2"><div align="left">
            <input type="submit"  class="btn" name="add_copy" value="Add Copy" />
          </div></td>
          <td width="33%"><input type="button" name="submit2" value="Attach File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
          <td colspan="2"><?php echo $fielderror; ?><?php echo $success; ?></span></td>
        </tr>
        <tr>
          <td width="18%" height="30" align="right" class="style2"><div align="left">School Code:</div></td>
          <td><input type="hidden" name="id" id="id" value="<?php echo $id; ?>"><div align="left">
              <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <?php if ($hanap_code == "$code") {
            echo selected;
        }
        ?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select>
          </div></td>
          <td><div align="left"></div></td>
          <td width="46%" align="left"><div align="center" class="style2">Book Preview </div></td>
        </tr>
        <tr>
        <td><div align="left"><span class="style2">Location :</span></div></td>
          <td width="33%" align="left"><div align="left">
              <input name="location" type="text"  id="location" size="49" value="<?php echo $location; ?>"/>
          </div></td>

          <td><div align="left"></div></td>
          <td width="46%" rowspan="5" align="left"><div align="center"><input type="image" name="imageField"  src="upload/<?php echo $userfile_name; ?>" height="170" width="120"  disabled="disabled" title="Book Preview"/>
            <input type="hidden" name="img_name" value="<?php echo $userfile_name; ?>"/>

          </div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Classification No.:</div></td>
          <td><div align="left">
              <input name="classification_no" type="text"  id="classification_no" size="49" value="<?php echo $classification_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Book Number:</div></td>
          <td><div align="left">
              <input name="book_no" type="text"  id="book_no" size="49" value="<?php echo $book_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Accession No. </div></td>
          <td><div align="left"><input type="hidden" name="access_no"  id="access_no" value="<?php echo $access_num; ?>">
              <input   name="access_no" type="text"  id="access_no" size="49"  value="<?php echo $access_num; ?>"  <?php echo $stat; ?>/>
          </div></td>
          <td>&nbsp;</td>
        </tr>
		  <tr>
          <td align="right" class="style2"><div align="left">Source of Fund:</div></td>
          <td><div align="left">
              <input name="source_of_fund" type="text" id="source_of_fund" size="49" value="<?php echo $source_of_fund; ?>" />
          </div></td>
          <td>&nbsp;</td>
        </tr>
		 <tr>
          <td align="right" class="style2"><div align="left">Property No:</div></td>
          <td><div align="left">
              <input name="property_no" type="text"  id="property_no" size="49" value="<?php echo $property_no; ?>"/>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
        </tr>
		 <tr>
          <td align="right" class="style2"><div align="left">*Mode of Acquisition:</div></td>
          <td><div align="left">
             <select name="mode_of_ac" id="mode_of_ac" >
                <option value="Donation" <? if($mode_of_ac=="Donation") echo selected;?>>Donation</option>
                <option value="Exchange" <? if($mode_of_ac=="Exchange") echo selected;?>>Exchange</option>
             <option value="Purchase" <? if($mode_of_ac=="Purchase") echo selected;?>>Purchase</option>
                 </select>
              <input name="mode_ac" type="text"  id="mode_ac" size="33" value="<?php echo $mode_ac; ?>" />
          </div></td>

          <td width="3%" align="right"><div align="left"></div></td>
		   <td width="46%" align="left"><div align="center"><span class="style2">Update Photo :
		     </span>
	          <input name="userfile" type="file"  id="userfile" size="10" />
	       </div></td>
        </tr>
		  <tr>
          <td><div align="left"></div></td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div align="left">Author No.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Main Author</div></td>
          <td colspan="3"><div align="left">
		   <input name="author_no" type="text"   id="author_no" size="5" title='Author No.' value="<?php echo $author_no; ?>"/>
            &nbsp;
              <input name="author_sname" type="text"   id="author_sname" size="12" title='Name of the Author' value="<?php echo $author_sname; ?>"/>
            &nbsp;
            <input name="author_fname" type="text"  id="author_fname"  size="12" title='Name of the Author' value="<?php echo $author_fname; ?>"/>
            &nbsp;
            <input name="author_mname" type="text"  id="author_mname" size="12"   title='Name of the Author' value="<?php echo $author_mname; ?>"/>
          </div></td>
        </tr>
        <tr>
          <td><div align="left"></div></td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div align="left">Author No.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div></td>
        </tr>
         <tr>
          <td width="18%"><div align="left">Joint Author1:</div></td>
          <td colspan="3"><div align="left">
              <input name="other_author1_no" type="text" id="other_author1_no" title="Author No." value="<?php echo $other_author1_no; ?>" size="5" />
            &nbsp;
            <input name="other_author1_sname" type="text"  id="other_author1_sname" title='Name of the Author' value="<?php echo $other_author1_sname; ?>" size="12"/>
            &nbsp;
            <input name="other_author1_fname" type="text"  id="other_author1_fname" title='Name of the Author' value="<?php echo $other_author1_fname; ?>" size="12"/>
            &nbsp;
            <input name="other_author1_mname" type="text"  id="other_author1_mname"  title='Name of the Author' value="<?php echo $other_author1_mname; ?>" size="12"/>
          </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author2 </div></td>
          <td colspan="3"><div align="left">
              <input name="other_author2_no" type="text" id="other_author2_no" title="Author No." value="<?php echo $other_author2_no; ?>" size="5" />
            &nbsp;
            <input name="other_author2_sname" type="text"  id="other_author2_sname" title='Name of the Author' value="<?php echo $other_author2_sname; ?>"  size="12"/>
            &nbsp;
            <input name="other_author2_fname" type="text"  id="other_author2_fname" title='Name of the Author' value="<?php echo $other_author2_fname; ?>"   size="12"/>
            &nbsp;
            <input name="other_author2_mname" type="text"  id="other_author2_mname" title='Name of the Author' value="<?php echo $other_author2_mname; ?>"   size="12"/>
          </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author3 </div></td>
          <td colspan="3"><div align="left">
              <input name="other_author3_no" type="text" id="other_author3_no" title="Author No." value="<?php echo $other_author3_no; ?>" size="5" />
            &nbsp;
            <input name="other_author3_sname" type="text"  id="other_author3_sname" title='Name of the Author' value="<?php echo $other_author3_sname; ?>" size="12"/>
            &nbsp;
            <input name="other_author3_fname" type="text"  id="other_author3_fname" title='Name of the Author' value="<?php echo $other_author3_fname; ?>" size="12"/>
            &nbsp;
            <input name="other_author3_mname" type="text"  id="other_author3_mname"  title='Name of the Author' value="<?php echo $other_author3_mname; ?>" size="12"/>
          </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author4 </div></td>
          <td colspan="3"><div align="left">
              <input name="other_author4_no" type="text" id="other_author4_no" title="Author No." value="<?php echo $other_author4_no; ?>" size="5" />
            &nbsp;
            <input name="other_author4_sname" type="text"  id="other_author4_sname" title='Name of the Author' value="<?php echo $other_author4_sname; ?>"  size="12"/>
            &nbsp;
            <input name="other_author4_fname" type="text"  id="other_author4_fname" title='Name of the Author' value="<?php echo $other_author4_fname; ?>"   size="12"/>
            &nbsp;
            <input name="other_author4_mname" type="text"  id="other_author4_mname" title='Name of the Author' value="<?php echo $other_author4_mname; ?>"   size="12"/>
          </div></td>
        </tr>

		<tr>
          <td width="18%"><div align="left">Joint Author5 </div></td>
          <td colspan="3"><div align="left">
              <input name="other_author5_no" type="text" id="other_author5_no" title="Author No." value="<?php echo $other_author5_no; ?>" size="5" />
            &nbsp;
            <input name="other_author5_sname" type="text"  id="other_author5_sname" title='Name of the Author' value="<?php echo $other_author5_sname; ?>" size="12"/>
            &nbsp;
            <input name="other_author5_fname" type="text"  id="other_author5_fname" title='Name of the Author' value="<?php echo $other_author5_fname; ?>" size="12"/>
            &nbsp;
            <input name="other_author5_mname" type="text"  id="other_author5_mname"  title='Name of the Author' value="<?php echo $other_author5_mname; ?>" size="12"/>
          </div></td>
		</tr>
        <tr>
          <td width="18%"><div align="left">Joint Author6 </div></td>
          <td colspan="3"><div align="left">
              <input name="other_author6_no" type="text" id="other_author6_no" title="Author No." value="<?php echo $other_author6_no; ?>" size="5" />
            &nbsp;
            <input name="other_author6_sname" type="text"  id="other_author6_sname" title='Name of the Author' value="<?php echo $other_author6_sname; ?>"  size="12"/>
            &nbsp;
            <input name="other_author6_fname" type="text"  id="other_author6_fname" title='Name of the Author' value="<?php echo $other_author6_fname; ?>"   size="12"/>
            &nbsp;
            <input name="other_author6_mname" type="text"  id="other_author6_mname" title='Name of the Author' value="<?php echo $other_author6_mname; ?>"   size="12"/>
          </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author7 </div></td>
          <td colspan="3"><div align="left">
            <input name="other_author7_no" type="text" id="other_author7_no" title="Author No." value="<?php echo $other_author7_no; ?>" size="5" />
&nbsp;
<input name="other_author2_sname2" type="text"  id="other_author2_sname2" title='Name of the Author' value="<?php echo $other_author2_sname; ?>"  size="12"/>
&nbsp;
<input name="other_author7_fname" type="text"  id="other_author7_fname" title='Name of the Author' value="<?php echo $other_author7_fname; ?>"   size="12"/>
&nbsp;
<input name="other_author7_mname" type="text"  id="other_author7_mname" title='Name of the Author' value="<?php echo $other_author7_mname; ?>"   size="12"/>
</div></td>
        </tr>

		<tr>
          <td  align="left" colspan="4"><div id="div"></div></td>
        </tr>
		<tr>
           <td align="right" class="style2"><div align="left">Date Acquired:</div></td>
          <td><div align="left">
              <input name="date_ac" type="text"  id="date_ac" size="49"  value="<?php echo $date_ac; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
           <td height="30" align="right" class="style2"><div align="left">Title Proper:</div></td>
          <td><input name="title" type="text" id="title" size="49" title='Title of the book' value="<?php echo $title; ?>"/></td>
          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		 <tr>
         <td  align="right" class="style2"><div align="left">Parallel Title: </div></td>
          <td><input name="parallel_title" type="text" id="parallel_title" size="49" title='Title of the book' value="<?php echo $parallel_title; ?>"/></td>
          <td height="30" align="right" class="style2"><div align="left">
         </div></td>
          <td></td>
        </tr>
		<tr>
      <td height="30" align="right" class="style2"><div align="left">Other Title Information: </div></td>
          <td><input name="oti" type="text"  id="oti" size="49" title='Title of the book' value="<?php echo $oti; ?>"/></td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
    <tr>
           <td height="30" align="right" class="style2"><div align="left">
            Uniform Title :
         </div></td>
          <td>
              <input name="uti" type="text"  id="uti" size="49" title='UniformTitle of the book' value="<?php echo $uti; ?>"/>          </td>

          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
   </tr>
   <tr>
           <td align="right" class="style2"><div align="left">Editors :</div></td>
          <td><div align="left">
              <input name="editors" type="text"  id="editors" size="49"  value="<?php echo $editors; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
           <td align="right" class="style2"><div align="left">Illustrator :</div></td>
          <td><div align="left">
              <input name="illustrator" type="text"  id="illustrator" size="49"  value="<?php echo $illustrator; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
         <td><div align="left" class="style2">Edition : </div></td>
    <td align="right"><div align="left"><input name="edition" type="text"  id="edition" size="49"  value="<?php echo $edition; ?>"/></div></td>
          <td height="30" align="right" class="style2"><div align="left">
         </div></td>
          <td></td>
        </tr>
		 <tr>
    <td height="30" align="right"><div align="left">    General Material Designation</div></td>
    <td>              <select name="classification" id="classification">
                <?php
$i = 0;
    $sql = "SELECT mat_type from material_type order by mat_type";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $classific = $row['mat_type'];

        ?>
                <option <?php if ($cla == "$classific") {
            echo selected;
        }
        ?>><?php echo $classific; ?></option>
                <?php $i++;}?>
              </select>          </td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
  <tr>
         <td><div align="left">Author (relating to edition) : </div></td>
    <td align="right"><div align="left"><input name="author_relatingto_edition" type="text"  id="author_relatingto_edition" size="49"  value="<?php echo $author_relatingto_edition; ?>"/></div></td>
          <td height="30" align="right" class="style2"><div align="left">
         </div></td>
          <td></td>
        </tr>
		<tr>
            <td width="18%" align="right"><div align="left"><span class="style2">Place of Publication:</span></div></td>
          <td width="33%"><div align="left">
              <input name="place_pub" type="text"  id="place_pub" size="49" value="<?php echo $place_pub; ?>"/>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td><div align="left">Publisher:</div></td>
          <td align="left"><div align="left">
              <input name="publisher" type="text"  id="publisher" size="49" value="<?php echo $publisher; ?>"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
        <tr>
         <td><div align="left">Date of Publication/Copyright Date: </div></td>
          <td align="left"><div align="left">
              <input name="date_pub"  size="49" maxlength="30" id="date_pub" value="<?php echo $date_pub; ?>" />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>

        <tr>
          <td><div align="left">Extent of Item:</div></td>
          <td align="left"><div align="left">
              <input name="eoi" type="text"  id="eoi" size="49" value="<?php echo $eoi; ?>" />
          </div></td>

          <td width="3%" align="right"><div align="left"></div></td>
          <td width="46%"><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Other Physical Details:</span></div></td>
          <td><div align="left">
              <input name="opd" type="text"  id="opd" size="49" value="<?php echo $opd; ?>"/>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
          <td align="right"><div align="left"><span class="style2">Size/Dimesion:</span></div></td>
          <td><div align="left">
              <input name="size_dimension" type="text" id="size_dimension" size="49" value="<?php echo $size_dimension; ?>"/>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">Preliminary Pages :</span></div></td>
          <td><div align="left">
              <input name="preliminary" type="text"  id="preliminary" value="<?php echo $preliminary; ?>" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">No. of Pages :</span></div></td>
          <td><div align="left">
              <input name="no_of_pages" type="text"  id="opd" value="<?php echo $no_of_pages; ?>" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td align="right"><div align="left"><span class="style2">Accompanying Materials:</span></div></td>
          <td><div align="left">
              <input name="accom_mat" type="text"  id="accom_mat" size="49" value="<?php echo $accom_mat; ?>"/>
          </div></td>

          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td align="right"><div align="left"><span class="style2">Series Title, Vol. and No:</span></div></td>
          <td><div align="left">
              <input name="series" type="text"  id="series" size="49" value="<?php echo $series; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>




        <tr>
          <td align="right" class="style2"><div align="left">Acknowledgement Receipt Expense (ARE) Date</div></td>
          <td><div align="left">
              <input name="are" type="text" id="are" size="49" value="<?php echo $are; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Notes:</span></div></td>
          <td><div align="left" >
            <textarea name="notes"    id="notes"   rows="7"cols="38" ><?php echo $notes; ?></textarea>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">ISBN : </span></div></td>
          <td><div align="left">
              <input name="isbn" type="text"  id="isbn" size="49" value="<?php echo $isbn; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td height="30" align="right" class="style2"><div align="left">

          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>

        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject1" type="text"  id="subject1" size="49"  value="<?php echo $subject1; ?>"/></td>
        </tr>
        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject2" type="text"   id="subject2" size="49"  value="<?php echo $subject2; ?>"/></td>
        </tr>
        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject3" type="text"  id="subject3" size="49"  value="<?php echo $subject3; ?>"/></td>
        </tr>
        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject4" type="text"   id="subject4" size="49"  value="<?php echo $subject4; ?>"/></td>
        </tr>
        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject5" type="text"   id="subject5" size="49"  value="<?php echo $subject5; ?>"/></td>
        </tr>
        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject6" type="text"   id="subject6" size="49"  value="<?php echo $subject6; ?>"/></td>
        </tr>
        <tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject7" type="text"   id="subject7" size="49"  value="<?php echo $subject7; ?>"/></td>
        </tr>
        <tr>
          <td align="right" class="style2"><div align="left">Verified by:</div></td>
          <td><div align="left">
              <input name="verified_by" type="text"  id="verified_by" size="49" value="<?php echo $verified_by; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
	    <tr>
          <td colspan="4"></td>
        </tr>









      <tr>
          <td height="30" align="left" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Update  " />
          </div></td>
          <td class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
          <td height="30" align="right" class="style2"><div align="left"></div></td>
        </tr>
  <tr>
    <td><div align="left"></div></td>
    <td colspan="2"><div align="left">
      <?php
if (($recordadded != "")) {
        echo '<img src="images/check1.png" width="50" height="45" />';
    } else {
        echo '<img src="images/mm_spacer.gif" width="50" height="45" />';
    }
    ?>
      <?php echo $recordadded; ?></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
      </table>
    </form>
	<?php }?>


	<?php if ($op == 2) {
    ?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td align="right"><a href="home.php">back to Home Page</a></td>
        <td colspan="2" align="left"><?php echo $success; ?></td>
        <td align="center">&nbsp;</td>

      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
	<?php }?>
	<?php if ($op == 3) {
    ?>
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td align="right"><a href="home.php">back to Home Page</a></td>
        <td colspan="2" align="left"><?php echo $msg_mo; ?></td>
        <td align="center">&nbsp;</td>

      </tr>
      <tr>
        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
	<?php }?>


          <p><a href="index.php"></a></p>
      <hr />
    <p>&nbsp;</p>
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