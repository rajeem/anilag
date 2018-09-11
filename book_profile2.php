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
if ($_POST['profile']) {
    $dschool_code = $_POST['school_code'];
}
$sub = $_POST['sub'];
$hanap_code = $_POST['school_code'];
$author_no = $_POST['author_no'];
$author_sname = $_POST['sname'];
$author_fname = $_POST['fname'];
$author_mname = $_POST['mname'];
$author = $fname . '  ' . $mname{0} . '.' . ' ' . $sname;
$_SESSION[author] = $author;
$title = $_POST['title'];
$access_num = $_POST['access_no'];
$subject_classification = $_POST['subject_classification'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];
$subject6 = $_POST['subject6'];
$subject7 = $_POST['subject7'];

//    $status        = $_POST['status'];

if ($add_book == "on") {
//if form submit ===add button is clicked
    if ($_POST['submit']) {
        $front = $_SESSION["front"];
        $pdf = $_SESSION["pdf"];
        $help = $_SESSION["help"];
        $pdb = $_SESSION["pdb"];
        session_unregister("front");
        session_unregister("pdf");
        session_unregister("help");
        session_unregister("pdb");
        //$hanap_code            =$_POST['school_code'];
        $school_code = $_POST['school_code'];
        $location = $_POST['location'];
        $access_num = $_POST['access_no'];
        //$call_num        =$_POST['call_num'];
        $classification_no = $_POST['classification_no'];
        $book_no = $_POST['book_no'];
        $author_no = $_POST['author_no'];
        $author_sname = $_POST['author_sname'];
        $author_fname = $_POST['author_fname'];
        $author_mname = $_POST['author_mname'];

//    $_SESSION[author] =$_POST['author'];
        $other_author1_no = $_POST['other_author1_no'];
        $other_author1_sname = $_POST['other_author1_sname'];
        $other_author1_fname = $_POST['other_author1_fname'];
        $other_author1_mname = $_POST['other_author1_mname'];

        $other_author1 = $other_author1_sname . ' ' . $other_author1_fname . ' ' . $other_author1_mname;

        $other_author2_no = $_POST['other_author2_no'];
        $other_author2_sname = $_POST['other_author2_sname'];
        $other_author2_fname = $_POST['other_author2_fname'];
        $other_author2_mname = $_POST['other_author2_mname'];

        $other_author2 = $other_author2_sname . ' ' . $other_author2_fname . ' ' . $other_author2_mname;

        $other_author3_no = $_POST['other_author3_no'];
        $other_author3_sname = $_POST['other_author3_sname'];
        $other_author3_fname = $_POST['other_author3_fname'];
        $other_author3_mname = $_POST['other_author3_mname'];

        $other_author3 = $other_author3_sname . ' ' . $other_author3_fname . ' ' . $other_author3_mname;

        $other_author4_no = $_POST['other_author4_no'];
        $other_author4_sname = $_POST['other_author4_sname'];
        $other_author4_fname = $_POST['other_author4_fname'];
        $other_author4_mname = $_POST['other_author4_mname'];

        $other_author4 = $other_author4_sname . ' ' . $other_author4_fname . ' ' . $other_author4_mname;

        $other_author5_no = $_POST['other_author5_no'];
        $other_author5_sname = $_POST['other_author5_sname'];
        $other_author5_fname = $_POST['other_author5_fname'];
        $other_author5_mname = $_POST['other_author5_mname'];

        $other_author5 = $other_author5_sname . ' ' . $other_author5_fname . ' ' . $other_author5_mname;

        $other_author6_no = $_POST['other_author6_no'];
        $other_author6_sname = $_POST['other_author6_sname'];
        $other_author6_fname = $_POST['other_author6_fname'];
        $other_author6_mname = $_POST['other_author6_mname'];

        $other_author6 = $other_author6_sname . ' ' . $other_author6_fname . ' ' . $other_author6_mname;

        $other_author7_no = $_POST['other_author7_no'];
        $other_author7_sname = $_POST['other_author7_sname'];
        $other_author7_fname = $_POST['other_author7_fname'];
        $other_author7_mname = $_POST['other_author7_mname'];

        $other_author7 = $other_author7_sname . ' ' . $other_author7_fname . ' ' . $other_author7_mname;

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

        if ($userfile_size > 250000) {$msg = "Your uploaded file size is more than 250KB so please reduce the file size and then 			upload. Visit the help page to know how to reduce the file size.<BR>";
            $book_pic = "false";
        }
        $add = "upload/$userfile_name"; // the path with the file name where the file will be stored, upload is the directory name.

        if (!($userfile_type == "image/pjpeg" or $userfile_type == "image/gif")) {$msg = $msg . "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
            $book_pic = "false";
        }

//if(move_uploaded_file ($userfile, $add)){
        //$query = "INSERT INTO borrowers_pic(bar_id,file_name,file_size,file_type) VALUES('$bar_id','$userfile_name', '$userfile_size', '$userfile_type')";
        //$result    =mysql_query($query,$connect) or die("cant execute query!.....");
        //$file_id = mysql_insert_id();
        //$msg = "The file is already uploaded....";

        $status = "in";

        //if some field is blank
        if ($access_num == "") {
            $fielderror = "<strong><font color=red>Enter Accession Number!</font></strong>";
            $op = 0;} else {
            //if access number already exists!
            $sql = "select * from card_cat where access_no='$access_num'";
            $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
            if (mysql_num_rows($result) != 0) { // if already exists
                $fielderror = "Accession number already exists!";
                $op = 4;
            } else {
                //add to card_catalog table
                if (move_uploaded_file($userfile, $add)) {
                    $sql = "INSERT INTO card_cat
			(qty,school_code,location,access_no,classification_no,book_no,author_no,author_sname,author_fname,author_mname
			,other_author1_no,other_author1_sname,other_author1_fname,other_author1_mname,
other_author2_no,
other_author2_sname,other_author2_fname,other_author2_mname,
other_author3_no,
other_author3_sname,other_author3_fname,other_author3_mname,
other_author4_no,
other_author4_sname,other_author4_fname,other_author4_mname,
other_author5_no,
other_author5_sname,other_author5_fname,other_author5_mname,
other_author6_no,
other_author6_sname,other_author6_fname,other_author6_mname,
other_author7_no,
other_author7_sname,other_author7_fname,other_author7_mname,
title,parallel_title,oti,uti,edition,gmd,classification,place_pub,
			publisher,date_pub,eoi,opd,size_dimension,
			series,accom_mat,notes,isbn,subject_classification,subject1,subject2,
			subject3,subject4,subject5,subject6,subject7,			source_of_fund,mode_of_ac,mode_ac,
			date_ac,property_no,are,encoded_by,date_encode,
			verified_by,date_verify,front,pdf,help,pdb,status1,editors,illustrator,author_relatingto_edition,preliminary,no_of_pages,file_name,file_size,file_type)

		    VALUES(
			1,'$school_code','$location','$access_num','$classification_no','$book_no','$author_no','$author_sname',
			'$author_fname','$author_mname',
'$other_author1_no','$other_author1_sname','$other_author1_fname','$other_author1_mname',
'$other_author2_no','$other_author2_sname','$other_author2_fname','$other_author2_mname',
'$other_author3_no','$other_author3_sname','$other_author3_fname','$other_author3_mname',
'$other_author4_no','$other_author4_sname','$other_author4_fname','$other_author4_mname',
'$other_author5_no','$other_author5_sname','$other_author5_fname','$other_author5_mname',
'$other_author6_no','$other_author6_sname','$other_author6_fname','$other_author6_mname',
'$other_author7_no','$other_author7_sname','$other_author7_fname','$other_author7_mname',
'$title','$parallel_title','$oti','$uti',
			'$edition','$gmd','$classification','$place_pub',
			'$publisher','$date_pub','$eoi','$opd','$size_dimension',
			'$series','$accom_mat','$notes','$isbn','$subject_classification','$subject1','$subject2',
			'$subject3','$subject4','$subject5','$subject6','$subject7',
			'$source_of_fund','$mode_of_ac','$mode_ac',
			'$date_ac','$property_no','$are','$user','$today',
			'$verified_by','$today','$front','$pdf','$help','$pdb','$status','$editors','$illustrator','$author_relatingto_edition'
			,'$preliminary','$no_of_pages','$userfile_name', '$userfile_size', '$userfile_type')";
                } else {
                    $sql = "INSERT INTO card_cat
			(qty,school_code,location,access_no,classification_no,book_no,author_no,author_sname,author_fname,author_mname
			,other_author1_no,other_author1_sname,other_author1_fname,other_author1_mname,
other_author2_no,
other_author2_sname,other_author2_fname,other_author2_mname,
other_author3_no,
other_author3_sname,other_author3_fname,other_author3_mname,
other_author4_no,
other_author4_sname,other_author4_fname,other_author4_mname,
other_author5_no,
other_author5_sname,other_author5_fname,other_author5_mname,
other_author6_no,
other_author6_sname,other_author6_fname,other_author6_mname,
other_author7_no,
other_author7_sname,other_author7_fname,other_author7_mname,
title,parallel_title,oti,uti,edition,gmd,classification,place_pub,
			publisher,date_pub,eoi,opd,size_dimension,
			series,accom_mat,notes,isbn,subject_classification,subject1,subject2,
			subject3,subject4,subject5,subject6,subject7,			source_of_fund,mode_of_ac,mode_ac,
			date_ac,property_no,are,encoded_by,date_encode,
			verified_by,date_verify,front,pdf,help,pdb,status1,editors,illustrator,author_relatingto_edition,preliminary,no_of_pages,file_name,file_size,file_type)

		    VALUES(
			1,'$school_code','$location','$access_num','$classification_no','$book_no','$author_no','$author_sname',
			'$author_fname','$author_mname',
'$other_author1_no','$other_author1_sname','$other_author1_fname','$other_author1_mname',
'$other_author2_no','$other_author2_sname','$other_author2_fname','$other_author2_mname',
'$other_author3_no','$other_author3_sname','$other_author3_fname','$other_author3_mname',
'$other_author4_no','$other_author4_sname','$other_author4_fname','$other_author4_mname',
'$other_author5_no','$other_author5_sname','$other_author5_fname','$other_author5_mname',
'$other_author6_no','$other_author6_sname','$other_author6_fname','$other_author6_mname',
'$other_author7_no','$other_author7_sname','$other_author7_fname','$other_author7_mname',
'$title','$parallel_title','$oti','$uti',
			'$edition','$gmd','$classification','$place_pub',
			'$publisher','$date_pub','$eoi','$opd','$size_dimension',
			'$series','$accom_mat','$notes','$isbn','$subject_classification','$subject1','$subject2',
			'$subject3','$subject4','$subject5','$subject6','$subject7',
			'$source_of_fund','$mode_of_ac','$mode_ac',
			'$date_ac','$property_no','$are','$user','$today',
			'$verified_by','$today','$front','$pdf','$help','$pdb','$status','$editors','$illustrator','$author_relatingto_edition'
			,'$preliminary','$no_of_pages','$userfile_name', '$userfile_size', '$userfile_type')";
                }
                $result = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
                $op = 1;

                $sql2 = "select * from titles where title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname'";
                $result2 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());
                if (mysql_num_rows($result2) == 0) {

                    $sql = "INSERT INTO titles
			(title_proper,quantity,author_sname,author_fname,author_mname)

		    VALUES('$title','1','$author_sname','$author_fname','$author_mname')";

                    $result3 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
                }

                //if title already exists!
                $sql = "select * from card_cat where title='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
                $result4 = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
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

                    $sql2 = "select * from titles where title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
                    $result6 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());

                    $sql = "UPDATE titles set quantity=1 WHERE title_proper='$title' && author_sname='$author_sname' && author_fname='$author_fname' && author_mname='$author_mname' ";
                    $result7 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());

                } //  if title does not exists  - result4
            } // else
        } //else

    } // if Add button is clicked

//}// end if for picture

//if submit2 button is pressed
    if ($_POST['submit2']) {
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
        $location = $_POST['location'];
        $access_num = $_POST['access_no'];
        //$call_num        =$_POST['call_num'];
        $classification_no = $_POST['classification_no'];
        $book_no = $_POST['book_no'];
        $author_no = $_POST['author_no'];
        $author_sname = $_POST['author_sname'];
        $author_fname = $_POST['author_fname'];
        $author_mname = $_POST['author_mname'];

//    $_SESSION[author] =$_POST['author'];

/*    $other_author1    = $_POST['other_author1'];
$other_author2    = $_POST['other_author2'];
$other_author3    = $_POST['other_author3'];
$other_author4    = $_POST['other_author4'];
$other_author5    = $_POST['other_author5'];
$other_author6    = $_POST['other_author6'];
$other_author7    = $_POST['other_author7'];
 */
        $other_author1_no = $_POST['other_author1_no'];
        $other_author1_sname = $_POST['other_author1_sname'];
        $other_author1_fname = $_POST['other_author1_fname'];
        $other_author1_mname = $_POST['other_author1_mname'];

        $other_author1 = $other_author1_sname . ' ' . $other_author1_fname . ' ' . $other_author1_mname;

        $other_author2_no = $_POST['other_author2_no'];
        $other_author2_sname = $_POST['other_author2_sname'];
        $other_author2_fname = $_POST['other_author2_fname'];
        $other_author2_mname = $_POST['other_author2_mname'];

        $other_author2 = $other_author2_sname . ' ' . $other_author2_fname . ' ' . $other_author2_mname;

        $other_author3_no = $_POST['other_author3_no'];
        $other_author3_sname = $_POST['other_author3_sname'];
        $other_author3_fname = $_POST['other_author3_fname'];
        $other_author3_mname = $_POST['other_author3_mname'];

        $other_author3 = $other_author3_sname . ' ' . $other_author3_fname . ' ' . $other_author3_mname;

        $other_author4_no = $_POST['other_author4_no'];
        $other_author4_sname = $_POST['other_author4_sname'];
        $other_author4_fname = $_POST['other_author4_fname'];
        $other_author4_mname = $_POST['other_author4_mname'];

        $other_author4 = $other_author4_sname . ' ' . $other_author4_fname . ' ' . $other_author4_mname;

        $other_author5_no = $_POST['other_author5_no'];
        $other_author5_sname = $_POST['other_author5_sname'];
        $other_author5_fname = $_POST['other_author5_fname'];
        $other_author5_mname = $_POST['other_author5_mname'];

        $other_author5 = $other_author5_sname . ' ' . $other_author5_fname . ' ' . $other_author5_mname;

        $other_author6_no = $_POST['other_author6_no'];
        $other_author6_sname = $_POST['other_author6_sname'];
        $other_author6_fname = $_POST['other_author6_fname'];
        $other_author6_mname = $_POST['other_author6_mname'];

        $other_author6 = $other_author6_sname . ' ' . $other_author6_fname . ' ' . $other_author6_mname;

        $other_author7_no = $_POST['other_author7_no'];
        $other_author7_sname = $_POST['other_author7_sname'];
        $other_author7_fname = $_POST['other_author7_fname'];
        $other_author7_mname = $_POST['other_author7_mname'];

        $other_author7 = $other_author7_sname . ' ' . $other_author7_fname . ' ' . $other_author7_mname;

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

        if ($access_num == "") {
            $fielderror = "<strong><font color=red>Enter Accession Number!</font></strong>";
            $op = 4;} else {

            //if access number already exists!
            $sql = "select * from card_cat where access_no='$access_num'";
            $result = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
            if (mysql_num_rows($result) != 0) { // if already exists
                $fielderror = "Accession number already exists!";
                $op = 4;
            } else {

                //add to card_catalog table
                $sql = "INSERT INTO card_cat
			(qty,school_code,location,access_no,classification_no,book_no,author_no,author_sname,author_fname,author_mname
			,other_author1_no,other_author1_sname,other_author1_fname,other_author1_mname,
other_author2_no,other_author2_sname,other_author2_fname,other_author2_mname,
other_author3_no,other_author3_sname,other_author3_fname,other_author3_mname,
other_author4_no,other_author4_sname,other_author4_fname,other_author4_mname,
other_author5_no,other_author5_sname,other_author5_fname,other_author5_mname,
other_author6_no,other_author6_sname,other_author6_fname,other_author6_mname,
other_author7_no,other_author7_sname,other_author7_fname,other_author7_mname,
title,parallel_title,oti,uti,edition,gmd,classification,place_pub,
			publisher,date_pub,eoi,opd,size_dimension,
			series,accom_mat,notes,isbn,subject_classification,subject1,subject2,
			subject3,subject4,subject5,subject6,subject7,			source_of_fund,mode_of_ac,mode_ac,
			date_ac,property_no,are,encoded_by,date_encode,
			verified_by,date_verify,front,pdf,help,pdb,status1,editors,illustrator,author_relatingto_edition,preliminary,no_of_pages,file_name,file_size,file_type)

		    VALUES(
			1,'$school_code','$location','$access_num','$classification_no','$book_no','$author_no','$author_sname',
			'$author_fname','$author_mname',
'$other_author1_no','$other_author1_sname','$other_author1_fname','$other_author1_mname',
'$other_author2_no','$other_author2_sname','$other_author2_fname','$other_author2_mname',
'$other_author3_no','$other_author3_sname','$other_author3_fname','$other_author3_mname',
'$other_author4_no','$other_author4_sname','$other_author4_fname','$other_author4_mname',
'$other_author5_no','$other_author5_sname','$other_author5_fname','$other_author5_mname',
'$other_author6_no','$other_author6_sname','$other_author6_fname','$other_author6_mname',
'$other_author7_no','$other_author7_sname','$other_author7_fname','$other_author7_mname',
'$title','$parallel_title','$oti','$uti',
			'$edition','$gmd','$classification','$place_pub',
			'$publisher','$date_pub','$eoi','$opd','$size_dimension',
			'$series','$accom_mat','$notes','$isbn','$subject_classification','$subject1','$subject2',
			'$subject3','$subject4','$subject5','$subject6','$subject7',
			'$source_of_fund','$mode_of_ac','$mode_ac',
			'$date_ac','$property_no','$are','$user','$today',
			'$verified_by','$today','$front','$pdf','$help','$pdb','$status','$editors','$illustrator','$author_relatingto_edition','$preliminary','$no_of_pages','$userfile_name','$userfile_size','$userfile_type'
			)";

                $result = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
                $op = 1;

                $sql2 = "select * from titles where title_proper='$title'";
                $result2 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());
                if (mysql_num_rows($result2) == 0) {

                    $sql = "INSERT INTO titles
			(title_proper,quantity)

		    VALUES('$title','0')";

                    $result3 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());
                }

                //if title already exists!
                $sql = "select * from card_cat where title='$title'";
                $result4 = mysql_query($sql, $connect) or die("cant execute query!" . mysql_error());
                $num = mysql_num_rows($result4); // count number of times the title is present

                if (mysql_num_rows($result4) != 0) {

//    $sql2 = "select * from titles where title_proper='$title'";
                    //    $result2 = mysql_query($sql2,$connect) or die("cant execute query!".mysql_error());
                    //    if (mysql_num_rows($result2) != 0){                // if already exists
                    $quantity = $num;

                    $sql = "UPDATE titles set quantity='$quantity' WHERE title_proper='$title'";
                    $result5 = mysql_query($sql, $connect) or die("cant execute query!!!");

                }

                if (mysql_num_rows($result4) == 0) {

                    $sql2 = "select * from titles where title_proper='$title'";
                    $result6 = mysql_query($sql2, $connect) or die("cant execute query!" . mysql_error());

                    $sql = "UPDATE titles set quantity=1 WHERE title_proper='$title'";
                    $result7 = mysql_query($sql, $connect) or die("cant execute query!.....23" . mysql_error());

                } //  if title does not exists  - result4
            }
        } // end else if access number does not exists
    }

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
        $access_num = $_POST['access_no'];
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

        //$other_author7    = $other_author7_sname.' '.$other_author7_fname.' '.$other_author7_mname;

        $op = 2;
    }

    if ($_POST['add_new']) {
        $op = 3;}

} else {
    echo "You are not allowed to add a new record!";
    exit;} // exit

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/JavaScript" src="js/function.js">
</script>

<SCRIPT language=javascript>

//function numbersOnly(el){
//el.value = el.value.replace(/[^0-9]/g, "");
//}
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
	d.innerHTML+="Joint Author" +numLinesAdded+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;&nbsp;"+ "<input type='text' size='5' name='other_author" + numLinesAdded + "_no"+"' onkeypress='focusNext(this)' >";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;"+ "<input type='text' size='12' name='other_author" + numLinesAdded + "_sname"+"' onkeypress='focusNext(this)' >";
	//d.innerHTML+="<input type='text' name='txt2_" + numLinesAdded + "'><br>" ;
	d.innerHTML+="&nbsp;&nbsp;&nbsp;"+ "<input type='text' size='12' name='other_author" + numLinesAdded + "_fname"+"' onkeypress='focusNext(this)' >";
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

	d.innerHTML+= "Subject&nbsp;&nbsp;"+numLinesAdd +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<input  type='text' size='49'  name='subject" + numLinesAdd + "' onkeypress='focusNext(this)' ><BR>";
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
    <h2>Book Profile</h2>
	<?php if ($op == 0) {?>
    <form id="form1" name="myform" method="post" action="book_profile2.php" enctype="multipart/form-data">
      <table width="87%" border="0" cellpadding="0" cellspacing="3">
        <tr>
          <td height="30" align="right" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Add  " />
          </div></td>
          <td width="33%" ><input type="button" name="submit2" value="Attach File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>&nbsp;&nbsp;<?php echo $fielderror; ?></td>
          <td width="3%">&nbsp;</td>
          <td  align="left"></td>
        </tr>
        <tr>
          <td width="18%" height="30" align="right" class="style2"><div align="left">School Code:</div></td>
          <td><div align="left">
            <select name="school_code" id="school_code">
              <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
              <option <?php if ($dschool_code == "$code") {
            echo selected;
        }
        ?>><?php echo $code; ?></option>
              <?php $i++;}?>
            </select>
          </div></td>
          <td><div align="left"></div></td>
          <td width="46%" align="left"><div align="left"></div></td>
        </tr>
        <tr>
        <td><div align="left" class="style2">Location : </div></td>
          <td width="33%" align="left"><div align="left">
              <input name="location" type="text"  id="location" size="49" value="<?php echo $location; ?>"/>
          </div></td>

          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Classification No.:</div></td>
          <td><div align="left">
            <input name="classification_no" type="text"  id="classification_no" size="49" value="<?php echo $classification_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Book No.:</div></td>
          <td><div align="left">
            <input name="book_no" type="text"  id="book_no" size="49" value="<?php echo $book_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Accession No. </div></td>
          <td><div align="left">
              <input   name="access_no" type="text"  id="access_no" size="49" value="<?php echo $access_num; ?>" />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Source of Fund: </div></td>
          <td><div align="left">
              <input   name="source_of_fund" type="text"  id="source_of_fund" size="49" />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right" class="style2"><div align="left">Property No:</div></td>
          <td><div align="left">
              <input name="property_no" type="text"  id="property_no" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		  <tr>
          <td align="right" class="style2"><div align="left">*Mode of Acquisition:</div><br /></td>
          <td><div align="left">
              <select name="mode_of_ac" id="mode_of_ac" >
                <option value="Donation">Donation</option>
                <option value="Exchange">Exchange</option>
             <option value="Purchase">Purchase</option>
                 </select>
              <input name="mode_ac" type="text"  id="mode_ac" size="33" />
          </div><br /></td>

          <td width="3%" align="right"><div align="left"></div><br /></td>
          <td width="46%"><div align="left"></div><br /></td>
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
            &nbsp;<input name="author_sname" type="text"   id="author_sname" size="12" title='Name of the Author' value="<?php echo $author_sname; ?>"/>
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
          <td width="18%"><div align="left">Joint Author1</div></td>
          <td colspan="3"><div align="left"><input name="other_author1_no" type="text" id="other_author1_no" size="5" title="Author No." />&nbsp;
              <input name="other_author1_sname" type="text"  id="other_author1_sname" size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author1_fname" type="text"  id="other_author1_fname" size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author1_mname" type="text"  id="other_author1_mname" size="12"  title='Name of the Author'/>

          </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author2 </div></td>
          <td colspan="3"><div align="left"><input name="other_author2_no" type="text" id="other_author2_no" size="5" title="Author No." />&nbsp;
              <input name="other_author2_sname" type="text"  id="other_author2_sname"  size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author2_fname" type="text"  id="other_author2_fname"   size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author2_mname" type="text"  id="other_author2_mname"   size="12" title='Name of the Author'/>
          </div></td>
        </tr>
       <tr>
          <td  align="left" colspan="4"><div id="div"></div></td>
        </tr>
	    <tr>
          <td height="30" align="right" class="style2"><div align="left">
              <input name="button" type="button" onclick="generateRow()" value="Add author.." class="btn"/>
          </div><br /><br /></td>
          <td align="right" class="style2"><div align="left"></div><br /><br /></td>
          <td><div align="left"></div><br /><br /></td>
          <td><div align="left"></div><br /><br /></td>
        </tr>
		<tr>
           <td align="right" class="style2"><div align="left">Date Acquired:</div></td>
          <td><div align="left">
              <input name="date_ac" type="text"  id="date_ac" size="49" />
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
           <td height="30" align="right" class="style2"><div align="left">Parallel Title :</div></td>
          <td><input name="parallel_title" type="text" id="parallel_title" size="49" title='Title of the book'/>           </td>
          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
      <td height="30" align="right" class="style2"><div align="left">Other Title Information: </div></td>
          <td><input name="oti" type="text"  id="oti" size="49" title='Title of the book'/></td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left"> Uniform Title :<br />
          </div></td>
		  <td><input name="uti" type="text"  id="uti" size="49" title='UniformTitle of the book'/>          </td>
		  <td height="30" align="right" class="style2">&nbsp;</td>
		  <td>&nbsp;</td>
	    </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left"> Editor(s) :<br />
          </div></td>
		  <td><input name="editors" type="text"  id="editors" size="49"/>          </td>
		  <td height="30" align="right" class="style2">&nbsp;</td>
		  <td>&nbsp;</td>
	    </tr>

   <tr>
           <td height="30" align="right" class="style2"><div align="left">

            Illustrator :<br />

         </div></td>
          <td>
              <input name="illustrator" type="text"  id="editors" size="49"/>          </td>

          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
   </tr>
   <tr>
     <td><div align="left">Edition</div></td>
     <td align="right"><div align="left">
       <input name="edition" type="text"  id="edition" size="49" />
     </div></td>
     <td height="30" align="right" class="style2"><div align="left"><br />

             <br />
     </div></td>
     <td></td>
   </tr>
   <tr>
     <td height="30" align="right"><div align="left"> General Material Designation:</div></td>
     <td><select name="classification" id="classification">
         <?php
$i = 0;
    $sql = "SELECT mat_type from material_type order by mat_type";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $classification = $row['mat_type'];

        ?>
         <option><?php echo $classification; ?></option>
         <?php $i++;}?>
       </select>     </td>
     <td><div align="left"></div></td>
     <td align="right"><div align="left"></div></td>
   </tr>
   <tr>
     <td><div align="left" class="style2">Author (relating to edition)  :</div></td>
     <td align="right"><div align="left">
         <input name="author_relatingto_edition" type="text"  id="author_relatingto_edition" size="49" />
     </div></td>
     <td height="30" align="right" class="style2"><div align="left"> <br />
     </div></td>
     <td></td>
   </tr>
   <tr>
     <td align="right"><div align="left"><span class="style2">Place of Publication:</span></div></td>
     <td><div align="left">
         <input name="place_pub" type="text"  id="place_pub" size="49" />
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
              <input name="date_pub"  size="49" maxlength="30" id="date_pub" />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>
        <tr>
          <td><div align="left" class="style2">Extent of Item:</div></td>
          <td align="left"><div align="left">
              <input name="eoi" type="text"  id="eoi" size="49" />
          </div></td>

          <td width="3%" align="right"><div align="left"></div></td>
          <td width="46%"><div align="left"></div></td>
        </tr>
		   <tr>
          <td align="right"><div align="left"><span class="style2">Book Preview:</span></div></td>
          <td><div align="left">
              <input name="userfile" type="file"  id="preview" size="37" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Other Physical Details:</span></div></td>
          <td><div align="left">
              <input name="opd" type="text"  id="opd" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">Preliminary Pages :</span></div></td>
          <td><div align="left">
              <input name="preliminary" type="text"  id="preliminary" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">No. of Pages :</span></div></td>
          <td><div align="left">
              <input name="no_of_pages" type="text"  id="opd" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Size/Dimesion:</span></div></td>
          <td><div align="left">
              <input name="size_dimension" type="text" id="size_dimension" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Accompanying Materials:</span></div></td>
          <td><div align="left">
              <input name="accom_mat" type="text"  id="accom_mat" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Series Title, Vol. and No:</span></div></td>
          <td><div align="left">
              <input name="series" type="text"  id="series" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>






        <tr>
          <td align="right" class="style2"><div align="left">Acknowledgement Receipt Expense (ARE) Date</div></td>
          <td><div align="left">
              <input name="are" type="text" id="are" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Notes:</span></div></td>
          <td><div align="left" >
            <textarea name="notes"    id="notes"   rows="7"cols="37"></textarea>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">ISBN:</span></div></td>
          <td><div align="left">
              <input name="isbn" type="text"  id="isbn" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>


		<tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject1" type="text"   id="subject1" size="49"  value="<?php echo $subject1; ?>"/></td>
        </tr>
		<tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject2" type="text" id="subject2" size="49"  value="<?php echo $subject2; ?>"/></td>
        </tr>

	  <?php if ($subject3 != "") {
        $sub = 3;
        echo "<tr><td>Subject </td><td><input type='text' name='subject3' size='49' value='$subject3'></td><tr>";}?>

		<?php if ($subject4 != "") {
        $sub = 4;
        echo "<tr><td>Subject </td><td><input type='text' name='subject4' size='49' value='$subject4'></td><tr>";}?>
        <?php if ($subject5 != "") {
        $sub = 5;
        echo "<tr><td>Subject </td><td><input type='text' name='subject5'  size='49' value='$subject5'></td><tr>";}?>
        <?php if ($subject6 != "") {
        $sub = 6;
        echo "<tr><td>Subject </td><td><input type='text' name='subject6'  size='49' value='$subject6'></td><tr>";}?>
        <?php if ($subject7 != "") {
        $sub = 7;
        echo "<tr><td>Subject </td><td><input type='text' name='subject7'  size='49' value='$subject7'></td><tr>";}?>

<tr>
          <td align="right" class="style2"><div align="left">Verified by:</div></td>
          <td><div align="left">
              <input name="verified_by" type="text"  id="verified_by" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>

        <tr>
          <td align="right"></td>
          <td align="left"></td>
          <td height="30" align="right" class="style2"></td>
          <td></td>
        </tr>

        <tr>
          <td height="30" align="left" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Add  " />
          </div></td>
          <td class="style2"><div align="left"><input type="submit"  class="btn" name="add_new" value="Add New" /></div></td>
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

	<?php if ($op == 1) {?>
    <form id="form1" name="myform" method="post" action="book_profile2.php" enctype="multipart/form-data">
      <table width="87%" border="0" cellpadding="0" cellspacing="3">
        <tr>
        <td height="30" align="right" class="style2"><a href="admin_add_new.php">back</a></td>
        <td width="33%">New Record added! </td>
        <td width="3%">&nbsp;</td>
        <td colspan="2" align="right">&nbsp;</td>
        </tr>
        <tr>
        <td><input type="submit"  class="btn" name="add_copy" value="Add Copy" /></td>
        <td colspan="2"><input type="submit" class="btn" name="add_new" value="Add New" /></td>
        <td align="right">&nbsp;</td>
      </tr>
        <tr>
          <td width="18%" height="30" align="right" class="style2"><div align="left">School Code:</div></td>
          <td><div align="left">
                  <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <? if ($school_code==$code) echo selected;?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select>
          </div></td>
          <td><div align="left"></div></td>
          <td width="46%" align="left"><div align="left" class="style2">
            <div align="center">Book Preview </div>
          </div></td>
        </tr>
        <tr>
        <td><div align="left"><span class="style2">Location :</span></div></td>
          <td width="33%" align="left"><div align="left">
              <input name="location" type="text"  id="location" size="49" value="<?php echo $location; ?>"/>
          </div></td>

          <td><div align="left"></div></td>
          <td rowspan="6" align="left"><div align="center">
            <input type="image" name="imageField"  src="upload/<?php echo $userfile_name; ?>" height="170" width="120"  disabled="disabled">
            <input type="hidden" name="userfile_name" value="<?php echo $userfile_name; ?>"/><input name="userfile_size" type="hidden" value="<?php echo $userfile_size; ?>" /><input name="userfile_type" type="hidden" value="<?php echo $userfile_type; ?>" />
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
		<td height="30" align="right" class="style2"><div align="left">Book No.:</div></td>
          <td><div align="left">
            <input name="book_no" type="text"  id="book_no" size="49" value="<?php echo $book_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Accession No. </div></td>
          <td><div align="left">
              <input   name="access_no" type="text"  id="access_no" size="49" value="<?php echo $access_num; ?>" />
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
          <td width="46%"><div align="left"></div></td>
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
          <td width="18%"><div align="left">Joint Author1</div></td>
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
			  <?php if (($other_author3_mname != "") && ($other_author3_fname != "") && ($other_author3_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other Author3</div></td>
          <td colspan='3'><div align='left'><input name='other_author3_no' type='text'  id='other_author3_no' size='5' title='Author No.'  value='$other_author3_no'/>
            &nbsp;
              <input name='other_author3_sname' type='text'  id='other_author1_sname' size='12' title='Name of the Author'  value='$other_author1_sname'/>
            &nbsp;
            <input name='other_author1_fname' type='text'  id='other_author1_fname' size='12' title='Name of the Author'  value='$other_author1_fname'/>
            &nbsp;
            <input name='other_author1_mname' type='text'  id='other_author1_mname' size='12'  title='Name of the Author'  value='$other_author1_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author4_mname != "") && ($other_author4_fname != "") && ($other_author4_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author4</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author4_no' type='text'  id='other_author4_no' size='5' title='Author No.'  value='$other_author4_no'/>
            &nbsp;
              <input name='other_author4_sname' type='text'  id='other_author4_sname' size='12' title='Name of the Author'  value='$other_author4_sname'/>
            &nbsp;
            <input name='other_author4_fname' type='text'  id='other_author4_fname' size='12' title='Name of the Author'  value='$other_author4_fname'/>
            &nbsp;
            <input name='other_author4_mname' type='text'  id='other_author4_mname' size='12'  title='Name of the Author'  value='$other_author4_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author5_mname != "") && ($other_author5_fname != "") && ($other_author5_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author5</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author5_no' type='text'  id='other_author5_no' size='5' title='Author No.'  value='$other_author5_no'/>
            &nbsp;
              <input name='other_author5_sname' type='text'  id='other_author5_sname' size='12' title='Name of the Author'  value='$other_author5_sname'/>
            &nbsp;
            <input name='other_author5_fname' type='text'  id='other_author5_fname' size='12' title='Name of the Author'  value='$other_author5_fname'/>
            &nbsp;
            <input name='other_author5_mname' type='text'  id='other_author5_mname' size='12'  title='Name of the Author'  value='$other_author5_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author6_mname != "") && ($other_author6_fname != "") && ($other_author6_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author6</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author6_no' type='text'  id='other_author6_no' size='5' title='Author No.'  value='$other_author6_no'/>
            &nbsp;
              <input name='other_author6_sname' type='text'  id='other_author6_sname' size='12' title='Name of the Author'  value='$other_author6_sname'/>
            &nbsp;
            <input name='other_author6_fname' type='text'  id='other_author6_fname' size='12' title='Name of the Author'  value='$other_author6_fname'/>
            &nbsp;
            <input name='other_author6_mname' type='text'  id='other_author6_mname' size='12'  title='Name of the Author'  value='$other_author6_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author7_mname != "") && ($other_author7_fname != "") && ($other_author7_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author7</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author7_no' type='text'  id='other_author7_no' size='5' title='Author No.'  value='$other_author7_no'/>
            &nbsp;
              <input name='other_author7_sname' type='text'  id='other_author7_sname' size='12' title='Name of the Author'  value='$other_author7_sname'/>
            &nbsp;
            <input name='other_author7_fname' type='text'  id='other_author7_fname' size='12' title='Name of the Author'  value='$other_author7_fname'/>
            &nbsp;
            <input name='other_author7_mname' type='text'  id='other_author7_mname' size='12'  title='Name of the Author'  value='$other_author7_mname'/>
          </div></td>
        </tr>
";}?>
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
          <td height="30" align="right" class="style2"><div align="left"><br />
            <br />
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
            Uniform Title :<br />
            <br />
         </div></td>
          <td>
              <input name="uti" type="text"  id="uti" size="49" title='UniformTitle of the book' value="<?php echo $uti; ?>"/>          </td>

          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
   </tr>
   <tr>
           <td align="right" class="style2"><div align="left">Editor(s):</div></td>
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
         <td><div align="left">Edition</div></td>
    <td align="right"><div align="left"><input name="edition" type="text"  id="edition" size="49"  value="<?php echo $edition; ?>"/></div></td>
          <td height="30" align="right" class="style2"><div align="left"><br />

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
                <option <?php if ($classification == $classific) {
            echo selected;
        }
        ?>><?php echo $classific; ?></option>
                <?php $i++;}?>
              </select>          </td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
  <tr>
     <td><div align="left" class="style2">Author (relating to edition)  :</div></td>
     <td align="right"><div align="left">
         <input name="author_relatingto_edition" type="text"  id="author_relatingto_edition" size="49" value="<?php echo $author_relatingto_edition; ?>"/>
     </div></td>
     <td height="30" align="right" class="style2"><div align="left"> <br />
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
		<tr>
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
            <textarea name="notes"    id="notes"   rows="7"cols="37"  ><?php echo $notes; ?></textarea>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">ISBN</span></div></td>
          <td><div align="left">
              <input name="isbn" type="text"  id="isbn" size="49" value="<?php echo $isbn; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>


       <tr>
          <td  align="left" colspan="4"><div id="div"></div></td>
        </tr>


		<tr>
          <td width="18%"><div align="left"> Subject  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject1" type="text"   id="subject1" size="49"  value="<?php echo $subject1; ?>"/></td>
        </tr>
		<tr>
          <td width="18%"><div align="left"> Subject  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject2" type="text" id="subject2" size="49"  value="<?php echo $subject2; ?>"/></td>
        </tr>

	  <?php if ($subject3 != "") {
        $sub = 3;
        echo "<tr><td>Subject </td><td><input type='text' name='subject3' size='49' value='$subject3'></td><tr>";}?>

		<?php if ($subject4 != "") {
        $sub = 4;
        echo "<tr><td>Subject </td><td><input type='text' name='subject4' size='49' value='$subject4'></td><tr>";}?>
        <?php if ($subject5 != "") {
        $sub = 5;
        echo "<tr><td>Subject </td><td><input type='text' name='subject5'  size='49' value='$subject5'></td><tr>";}?>
        <?php if ($subject6 != "") {
        $sub = 6;
        echo "<tr><td>Subject </td><td><input type='text' name='subject6'  size='49' value='$subject6'></td><tr>";}?>
        <?php if ($subject7 != "") {
        $sub = 7;
        echo "<tr><td>Subject </td><td><input type='text' name='subject7'  size='49' value='$subject7'></td><tr>";}?>

<tr>
          <td align="right" class="style2"><div align="left">Verified by:</div></td>
          <td><div align="left">
              <input name="verified_by" type="text"  id="verified_by" size="49" value="<?php echo $verified_by; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>

        <tr>
          <td align="right"></td>
          <td align="left"></td>
          <td height="30" align="right" class="style2"></td>
          <td></td>
        </tr>








         <tr>
        <td><input type="submit"  class="btn" name="add_copy" value="Add Copy" /></td>
        <td colspan="2"><input type="submit" class="btn" name="add_new" value="Add New" /></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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


	<?php if ($op == 2) {?>
    <form id="form1" name="myform" method="post" action="book_profile2.php" enctype="multipart/form-data">
      <table width="87%" border="0" cellpadding="0" cellspacing="3">
        <tr>
        <td><input type="submit"  class="btn" name="submit2" value="Add" /></td>
        <td colspan="2"><input type="submit" class="btn" name="add_new" value="Add New" /> &nbsp;&nbsp;<?php echo $fielderror; ?></td>
        <td align="left"></td>
      </tr>
        <tr>
          <td width="18%" height="30" align="right" class="style2"><div align="left">School Code:</div></td>
          <td><div align="left">
               <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <? if ($school_code==$code) echo selected;?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select>
          </div></td>
          <td><div align="left"></div></td>
          <td width="46%" align="left"><div align="center">Book Preview </div></td>
        </tr>
        <tr>
        <td><div align="left"><span class="style2">Location :</span></div></td>
          <td width="33%" align="left"><div align="left">
              <input name="location" type="text"  id="location" size="49" value="<?php echo $location; ?>"/>
          </div></td>

          <td><div align="left"></div></td>
          <td width="46%" rowspan="6" align="left">
            <div align="center">
              <input type="image" name="imageField2"  src="upload/<?php echo $userfile_name; ?>" height="170" width="120"  disabled="disabled" />
              <input type="hidden" name="userfile_name" value="<?php echo $userfile_name; ?>"/>
              <input name="userfile_size" type="hidden" value="<?php echo $userfile_size; ?>" />
              <input name="userfile_type" type="hidden" value="<?php echo $userfile_type; ?>" />
            </div>
          <div align="left"></div>            <div align="left"></div>            <div align="left"></div>            <div align="left"></div>            <div align="left"></div></td>
        </tr>
		  <tr>
		<td height="30" align="right" class="style2"><div align="left">Classification No.:</div></td>
          <td><div align="left">
            <input name="classification_no" type="text"  id="classification_no" size="49" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
		<td height="30" align="right" class="style2"><div align="left">Book No.:</div></td>
          <td><div align="left">
            <input name="book_no" type="text"  id="book_no" size="49" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Accession No. : </div></td>
          <td><div align="left">
              <input   name="access_no" type="text"  id="access_no" size="49"  />
          </div></td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td align="right" class="style2"><div align="left">Source of Fund:</div></td>
          <td><div align="left">
              <input name="source_of_fund" type="text" id="source_of_fund" size="49"  value="<?php echo $source_of_fund; ?>"/>
          </div></td>
          <td>&nbsp;</td>
        </tr>
		 <tr>
          <td align="right" class="style2"><div align="left">Property No:</div></td>
          <td><div align="left">
              <input name="property_no" type="text"  id="property_no" size="49" />
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
              <input name="mode_ac" type="text"  id="mode_ac" size="33" value="<?php echo $mode_ac; ?>"/>
          </div></td>

          <td width="3%" align="right"><div align="left"></div></td>
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
          <td width="18%"><div align="left">Joint Author1</div></td>
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
			  <?php if (($other_author3_mname != "") && ($other_author3_fname != "") && ($other_author3_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other Author3</div></td>
          <td colspan='3'><div align='left'><input name='other_author3_no' type='text'  id='other_author3_no' size='5' title='Author No.'  value='$other_author3_no'/>
            &nbsp;
              <input name='other_author3_sname' type='text'  id='other_author1_sname' size='12' title='Name of the Author'  value='$other_author1_sname'/>
            &nbsp;
            <input name='other_author1_fname' type='text'  id='other_author1_fname' size='12' title='Name of the Author'  value='$other_author1_fname'/>
            &nbsp;
            <input name='other_author1_mname' type='text'  id='other_author1_mname' size='12'  title='Name of the Author'  value='$other_author1_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author4_mname != "") && ($other_author4_fname != "") && ($other_author4_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author4</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author4_no' type='text'  id='other_author4_no' size='5' title='Author No.'  value='$other_author4_no'/>
            &nbsp;
              <input name='other_author4_sname' type='text'  id='other_author4_sname' size='12' title='Name of the Author'  value='$other_author4_sname'/>
            &nbsp;
            <input name='other_author4_fname' type='text'  id='other_author4_fname' size='12' title='Name of the Author'  value='$other_author4_fname'/>
            &nbsp;
            <input name='other_author4_mname' type='text'  id='other_author4_mname' size='12'  title='Name of the Author'  value='$other_author4_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author5_mname != "") && ($other_author5_fname != "") && ($other_author5_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author5</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author5_no' type='text'  id='other_author5_no' size='5' title='Author No.'  value='$other_author5_no'/>
            &nbsp;
              <input name='other_author5_sname' type='text'  id='other_author5_sname' size='12' title='Name of the Author'  value='$other_author5_sname'/>
            &nbsp;
            <input name='other_author5_fname' type='text'  id='other_author5_fname' size='12' title='Name of the Author'  value='$other_author5_fname'/>
            &nbsp;
            <input name='other_author5_mname' type='text'  id='other_author5_mname' size='12'  title='Name of the Author'  value='$other_author5_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author6_mname != "") && ($other_author6_fname != "") && ($other_author6_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author6</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author6_no' type='text'  id='other_author6_no' size='5' title='Author No.'  value='$other_author6_no'/>
            &nbsp;
              <input name='other_author6_sname' type='text'  id='other_author6_sname' size='12' title='Name of the Author'  value='$other_author6_sname'/>
            &nbsp;
            <input name='other_author6_fname' type='text'  id='other_author6_fname' size='12' title='Name of the Author'  value='$other_author6_fname'/>
            &nbsp;
            <input name='other_author6_mname' type='text'  id='other_author6_mname' size='12'  title='Name of the Author'  value='$other_author6_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author7_mname != "") && ($other_author7_fname != "") && ($other_author7_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author7</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author7_no' type='text'  id='other_author7_no' size='5' title='Author No.'  value='$other_author7_no'/>
            &nbsp;
              <input name='other_author7_sname' type='text'  id='other_author7_sname' size='12' title='Name of the Author'  value='$other_author7_sname'/>
            &nbsp;
            <input name='other_author7_fname' type='text'  id='other_author7_fname' size='12' title='Name of the Author'  value='$other_author7_fname'/>
            &nbsp;
            <input name='other_author7_mname' type='text'  id='other_author7_mname' size='12'  title='Name of the Author'  value='$other_author7_mname'/>
          </div></td>
        </tr>
";}?>
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
          <td height="30" align="right" class="style2"><div align="left">Editor(s) :</div></td>
          <td><div align="left">
              <input name="editors" type="text"  id="editors" size="49" value="<?php echo $editors; ?>"  />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
     <tr>
          <td height="30" align="right" class="style2"><div align="left">Illustrator:</div></td>
          <td><div align="left">
              <input name="illustrator" type="text"  id="illustrator" size="49"  value="<?php echo $illustrator; ?>"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
         <td><div align="left">Edition</div></td>
    <td align="right"><div align="left"><input name="edition" type="text"  id="edition" size="49" value="<?php echo $edition; ?>"/></div></td>
          <td height="30" align="right" class="style2"><div align="left">
         </div></td>
          <td>&nbsp;</td>
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
                <option <?php if ($classification == $classific) {
            echo selected;
        }
        ?>><?php echo $classific; ?></option>
                <?php $i++;}?>
              </select>          </td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
    <tr>
          <td height="30" align="right" class="style2"><div align="left">Author (relating to edition) :</div></td>
          <td><div align="left">
              <input name="author_relatingto_edition" type="text"  id="author_relatingto_edition" size="49"  value="<?php echo $author_relatingto_edition; ?>"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
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
		<tr>
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
              <input name="are" type="text" id="are" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">Notes:</span></div></td>
          <td><div align="left" >
            <textarea name="notes"    id="notes"   rows="7"cols="37"  ><?php echo $notes; ?></textarea>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">ISBN : </span></div></td>
          <td><div align="left">
              <input name="isbn" type="text"  id="isbn" size="49" value="<?php //echo $isbn;?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>


       <tr>
          <td  align="left" colspan="4"><div id="div"></div></td>
        </tr>


		<tr>
          <td width="18%"><div align="left"> Subject &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject1" type="text"   id="subject1" size="49"  value="<?php echo $subject1; ?>"/></td>
        </tr>
		<tr>
          <td width="18%"><div align="left"> Subject &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject2" type="text" id="subject2" size="49"  value="<?php echo $subject2; ?>"/></td>
        </tr>

	  <?php if ($subject3 != "") {
        $sub = 3;
        echo "<tr><td>Subject </td><td><input type='text' name='subject3' size='49' value='$subject3'></td><tr>";}?>

		<?php if ($subject4 != "") {
        $sub = 4;
        echo "<tr><td>Subject </td><td><input type='text' name='subject4' size='49' value='$subject4'></td><tr>";}?>
        <?php if ($subject5 != "") {
        $sub = 5;
        echo "<tr><td>Subject </td><td><input type='text' name='subject5'  size='49' value='$subject5'></td><tr>";}?>
        <?php if ($subject6 != "") {
        $sub = 6;
        echo "<tr><td>Subject </td><td><input type='text' name='subject6'  size='49' value='$subject6'></td><tr>";}?>
        <?php if ($subject7 != "") {
        $sub = 7;
        echo "<tr><td>Subject </td><td><input type='text' name='subject7'  size='49' value='$subject7'></td><tr>";}?>

<tr>
          <td align="right" class="style2"><div align="left">Verified by:</div></td>
          <td><div align="left">
              <input name="verified_by" type="text"  id="verified_by" size="49" value="<?php echo $verified_by; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>


        <tr>
          <td align="right"></td>
          <td align="left"></td>
          <td height="30" align="right" class="style2"></td>
          <td></td>
        </tr>







         <tr>
        <td><input type="submit"  class="btn" name="submit2" value="Add" /></td>
        <td colspan="2"><input type="submit"  class="btn" name="add_new" value="Add New" /></td>
        <td align="right">&nbsp;</td>
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

<?php if ($op == 3) {?>
    <form id="form1" name="myform" method="post" action="book_profile2.php" enctype="multipart/form-data">
      <table width="87%" border="0" cellpadding="0" cellspacing="3">
        <tr>
          <td height="30" align="right" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Add  " />
          </div></td>
          <td width="33%"  ><input type="button" name="submit2" value="Attach File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>&nbsp;&nbsp;<?php echo $fielderror; ?></td>
          <td width="3%" colspan="2" align="left"></td>
       </tr>
        <tr>
          <td width="18%" height="30" align="right" class="style2"><div align="left">School Code:</div></td>
          <td><div align="left">
               <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $code = $row['school_code'];
        ?>
                <option <? if ($dschool_code==$code) echo selected;?>><?php echo $code; ?></option>
                <?php $i++;}?>
              </select>
          </div></td>
          <td><div align="left"></div></td>
          <td width="46%" align="left"><div align="left"></div></td>
        </tr>
        <tr>
        <td><div align="left"><span class="style2">Location :</span></div></td>
          <td width="33%" align="left"><div align="left">
              <input name="location" type="text"  id="location" size="49" />
          </div></td>

          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Classification No.:</div></td>
          <td><div align="left">
            <input name="classification_no" type="text"  id="classification_no" size="49" />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Book No.:</div></td>
          <td><div align="left">
            <input name="book_no" type="text"  id="book_no" size="49" />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Accession No. </div></td>
          <td><div align="left">
              <input   name="access_no" type="text"  id="access_no" size="49"  />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right" class="style2"><div align="left">Source of Fund:</div></td>
          <td><div align="left">
              <input name="source_of_fund" type="text" id="source_of_fund" size="49" />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right" class="style2"><div align="left">Property No:</div></td>
          <td><div align="left">
              <input name="property_no" type="text"  id="property_no" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		  <tr>
          <td align="right" class="style2"><div align="left">*Mode of Acquisition:</div></td>
          <td><div align="left">
              <select name="mode_of_ac" id="mode_of_ac" >
                <option value="Donation">Donation</option>
                <option value="Exchange">Exchange</option>
             <option value="Purchase">Purchase</option>
                 </select>
              <input name="mode_ac" type="text"  id="mode_ac" size="33" />
          </div></td>

          <td width="3%" align="right"><div align="left"></div></td>
          <td width="46%"><div align="left"></div></td>
        </tr>
		<tr>
          <td><div align="left"></div><br /></td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div align="left">Author No.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div>
              <br /></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Main Author</div></td>
          <td colspan="3"><div align="left">
            <input name="author_no" type="text"   id="author_no" size="5" title='Author No.'/>
&nbsp;
<input name="author_sname" type="text"   id="author_sname" size="12" title='Name of the Author'/>
&nbsp;
<input name="author_fname" type="text"  id="author_fname"  size="12" title='Name of the Author'/>
&nbsp;
<input name="author_mname" type="text"  id="author_mname" size="12"   title='Name of the Author'/>
</div></td>
        </tr>
        <tr>
          <td><div align="left"></div></td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div align="left">Author No.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author1</div></td>
          <td colspan="3"><div align="left"><input name="other_author1_no" type="text"   id="other_author1_no" size="5" title='Author No.'/>
&nbsp;

              <input name="other_author1_sname" type="text"  id="other_author1_sname" size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author1_fname" type="text"  id="other_author1_fname" size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author1_mname" type="text"  id="other_author1_mname" size="12"  title='Name of the Author'/>
          </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author2 </div></td>
          <td colspan="3"><div align="left"><input name="other_author2_no" type="text"   id="other_author2_no" size="5" title='Author No.'/>&nbsp;&nbsp;
              <input name="other_author2_sname" type="text"  id="other_author2_sname"  size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author2_fname" type="text"  id="other_author2_fname"   size="12" title='Name of the Author'/>
            &nbsp;
            <input name="other_author2_mname" type="text"  id="other_author2_mname"   size="12" title='Name of the Author'/>
          </div></td>
        </tr>
       <tr>
          <td  align="left" colspan="4"><div id="div"></div></td>
        </tr>
	    <tr>
          <td height="30" align="right" class="style2"><div align="left">
              <input name="button" type="button" onclick="generateRow()" value="Add author.." class="btn"/>
          </div><br /></td>
          <td align="right" class="style2"><div align="left"></div><br /></td>
          <td><div align="left"></div><br /></td>
          <td><div align="left"></div><br /></td>
        </tr>
		<tr>
           <td align="right" class="style2"><div align="left">Date Acquired:</div></td>
          <td><div align="left">
              <input name="date_ac" type="text"  id="date_ac" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
           <td height="30" align="right" class="style2"><div align="left">Title Proper:</div></td>
          <td><input name="title" type="text" id="title" size="49" title='Title of the book' /></td>
          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
         <td  align="right" class="style2"><div align="left">Parallel Title: </div></td>
          <td><input name="parallel_title" type="text" id="parallel_title" size="49" title='Title of the book'/></td>
          <td height="30" align="right" class="style2"><div align="left">
         </div></td>
          <td></td>
        </tr>
		<tr>
      <td height="30" align="right" class="style2"><div align="left">Other Title Information: </div></td>
          <td><input name="oti" type="text"  id="oti" size="49" title='Title of the book'/></td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
   <tr>
           <td height="30" align="right" class="style2"><div align="left">
            Uniform Title :<br />
            <br />
         </div></td>
          <td>
              <input name="uti" type="text"  id="uti" size="49" title='UniformTitle of the book'/>          </td>

          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
   </tr>
    <tr>
          <td height="30" align="right" class="style2"><div align="left">Editor(s) :</div></td>
          <td><div align="left">
              <input name="editors" type="text"  id="editors" size="49"  />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
     <tr>
          <td height="30" align="right" class="style2"><div align="left">Illustrator:</div></td>
          <td><div align="left">
              <input name="illustrator" type="text"  id="illustrator" size="49"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		 <tr>
         <td><div align="left">Edition</div></td>
    <td align="right"><div align="left"><input name="edition" type="text"  id="edition" size="49" /></div></td>
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
        $classification = $row['mat_type'];

        ?>
                <option><?php echo $classification; ?></option>
                <?php $i++;}?>
              </select>          </td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
   <tr>
          <td height="30" align="right" class="style2"><div align="left">Author (relating to edition) :</div></td>
          <td><div align="left">
              <input name="author_relatingto_edition" type="text"  id="author_relatingto_edition" size="49"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		 <tr>
            <td width="18%" align="right"><div align="left"><span class="style2">Place of Publication:</span></div></td>
          <td width="33%"><div align="left">
              <input name="place_pub" type="text"  id="place_pub" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td><div align="left">Publisher:</div></td>
          <td align="left"><div align="left">
              <input name="publisher" type="text"  id="publisher" size="49" />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
        <tr>
         <td><div align="left">Date of Publication/Copyright Date: </div></td>
          <td align="left"><div align="left">
              <input name="date_pub"  size="49" maxlength="30" id="date_pub" />
          </div></td>
          <td>&nbsp;</td>
          <td align="left"><div align="left"></div></td>
        </tr>
        <tr>
          <td><div align="left">Extent of Item:</div></td>
          <td align="left"><div align="left">
              <input name="eoi" type="text"  id="eoi" size="49" />
          </div></td>

          <td width="3%" align="right"><div align="left"></div></td>
          <td width="46%"><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">Book Preview:</span></div></td>
          <td><div align="left">
              <input name="userfile" type="file"  id="userfile" size="37" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">Other Physical Details:</span></div></td>
          <td><div align="left">
              <input name="opd" type="text"  id="opd" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
          <td align="right"><div align="left"><span class="style2">Size/Dimesion:</span></div></td>
          <td><div align="left">
              <input name="size_dimension" type="text" id="size_dimension" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">Preliminary Pages :</span></div></td>
          <td><div align="left">
              <input name="preliminary" type="text"  id="preliminary" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		<tr>
          <td align="right"><div align="left"><span class="style2">No. of Pages :</span></div></td>
          <td><div align="left">
              <input name="no_of_pages" type="text"  id="opd" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td align="right"><div align="left"><span class="style2">Accompanying Materials:</span></div></td>
          <td><div align="left">
              <input name="accom_mat" type="text"  id="accom_mat" size="49" />
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td align="right"><div align="left"><span class="style2">Series Title, Vol. and No. :</span></div></td>
          <td><div align="left">
              <input name="series" type="text"  id="series" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>







        <tr>
          <td align="right" class="style2"><div align="left">Acknowledgement Receipt Expense (ARE) Date</div></td>
          <td><div align="left">
              <input name="are" type="text" id="are" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>
        <tr>




        <tr>
          <td align="right"><div align="left"><span class="style2">Notes:</span></div></td>
          <td><div align="left" >
            <textarea name="notes"    id="notes"   rows="7"cols="37"></textarea>
          </div></td>
          <td align="right" class="style2"><div align="left"></div></td>
          <td><div align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><span class="style2">ISBN : </span></div></td>
          <td><div align="left">
              <input name="isbn" type="text"  id="isbn" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>


		<tr>
          <td width="18%"><div align="left"> Subject &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject1" type="text"   id="subject1" size="49"  /></td>
        </tr>
		<tr>
          <td width="18%"><div align="left"> Subject &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject2" type="text" id="subject2" size="49"  /></td>
        </tr>
		 <tr>
          <td align="right" class="style2"><div align="left">Verified by:</div></td>
          <td><div align="left">
              <input name="verified_by" type="text"  id="verified_by" size="49" />
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>

<tr>
          <td colspan="4"><div id="div1" align="left"></div></td>
        </tr>
        <tr>
          <td align="right"><div align="left">
              <input name="button" type="button" class="btn" onclick="generateRow1()" value="Add subject.."/>
          </div></td>
          <td align="left"></td>
          <td height="30" align="right" class="style2"></td>
          <td></td>
        </tr>

        <tr>
          <td align="right"></td>
          <td align="left"></td>
          <td height="30" align="right" class="style2"></td>
          <td></td>
        </tr>








        <tr>
          <td height="30" align="left" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Add  " />
          </div></td>
          <td class="style2"><div align="left"><input type="submit"  class="btn" name="add_new" value="Add New" /></div></td>
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


	<?php if ($op == 4) {?>
    <form id="form1" name="myform" method="post" action="book_profile2.php" enctype="multipart/form-data">
      <table width="87%" border="0" cellpadding="0" cellspacing="3">
       <tr>
          <td height="30" align="right" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Add  " />
          </div></td>
          <td width="33%" colspan="2"><input type="button" name="submit2" value="Attach File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>&nbsp;&nbsp;<?php echo $fielderror; ?></td>
          <td width="46%">&nbsp;</td>
        </tr>
        <tr>
          <td width="18%" height="30" align="right" class="style2"><div align="left">School Code:</div></td>
          <td><div align="left">
            <select name="school_code" id="school_code">
                <?php
$i = 0;
    $sql = "SELECT school_code from school order by school_code";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $school_code = $row['school_code'];
        ?>
                <option><?php echo $school_code; ?></option>
                <?php $i++;}?>
              </select>
          </div></td>
          <td><div align="left"></div></td>
          <td width="46%" align="left"><div align="center" class="style2">Book Preview </div></td>
        </tr>
        <tr>
        <td><div align="left"><span class="style2">Book Shelf</span></div></td>
          <td width="33%" align="left"><div align="left">
              <input name="location" type="text"  id="location" size="49" value="<?php echo $location; ?>"/>
          </div></td>

          <td><div align="left"></div></td>
          <td width="46%" rowspan="6" align="left">
            <div align="center">
              <input type="image" name="imageField22"  src="upload/<?php echo $userfile_name; ?>" height="170" width="120"  disabled="disabled" />
              <input type="hidden" name="userfile_name" value="<?php echo $userfile_name; ?>"/>
              <input name="userfile_size" type="hidden" value="<?php echo $userfile_size; ?>" />
              <input name="userfile_type" type="hidden" value="<?php echo $userfile_type; ?>" />
            </div>
          <div align="left"></div>            <div align="left"></div>            <div align="left"></div>            <div align="left"></div>            <div align="left"></div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Classification No. :</div></td>
          <td><div align="left">
              <input name="classification_no" type="text"  id="classification_no" size="49" value="<?php echo $classification_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Book No.:</div></td>
          <td><div align="left">
              <input name="book_no" type="text"  id="book_no" size="49" value="<?php echo $book_no; ?>" />
          </div></td>
          <td><div align="left"></div></td>
        </tr>
		 <tr>
          <td height="30" align="right" class="style2"><div align="left">Accession no. </div></td>
          <td><div align="left">
              <input   name="access_no" type="text"  id="access_no" size="49" />
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

          <td width="33%" align="right"><div align="left"></div></td>
        </tr>
		 <tr>
          <td><div align="left"></div></td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div align="left">Author No.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div></td>
        </tr>
		<tr>
          <td height="30" align="right" class="style2"><div align="left">Main Author</div></td>
          <td colspan="3"><div align="left">
            <input name="author_no2" type="text"   id="author_no2" size="5" title='Author No.' value="<?php echo $author_no; ?>"/>
&nbsp;
<input name="author_sname2" type="text"   id="author_sname2" size="12" title='Name of the Author' value="<?php echo $author_sname; ?>"/>
&nbsp;
<input name="author_fname2" type="text"  id="author_fname2"  size="12" title='Name of the Author' value="<?php echo $author_fname; ?>"/>
&nbsp;
<input name="author_mname2" type="text"  id="author_mname2" size="12"   title='Name of the Author' value="<?php echo $author_mname; ?>"/>
</div></td>
        </tr>
        <tr>
          <td><div align="left"></div></td>
          <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div align="left">Author No.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name </div></td>
        </tr>
        <tr>
          <td width="18%"><div align="left">Joint Author1</div></td>
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
			  <?php if (($other_author3_mname != "") && ($other_author3_fname != "") && ($other_author3_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other Author3</div></td>
          <td colspan='3'><div align='left'><input name='other_author3_no' type='text'  id='other_author3_no' size='5' title='Author No.'  value='$other_author3_no'/>
            &nbsp;
              <input name='other_author3_sname' type='text'  id='other_author1_sname' size='12' title='Name of the Author'  value='$other_author1_sname'/>
            &nbsp;
            <input name='other_author1_fname' type='text'  id='other_author1_fname' size='12' title='Name of the Author'  value='$other_author1_fname'/>
            &nbsp;
            <input name='other_author1_mname' type='text'  id='other_author1_mname' size='12'  title='Name of the Author'  value='$other_author1_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author4_mname != "") && ($other_author4_fname != "") && ($other_author4_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author4</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author4_no' type='text'  id='other_author4_no' size='5' title='Author No.'  value='$other_author4_no'/>
            &nbsp;
              <input name='other_author4_sname' type='text'  id='other_author4_sname' size='12' title='Name of the Author'  value='$other_author4_sname'/>
            &nbsp;
            <input name='other_author4_fname' type='text'  id='other_author4_fname' size='12' title='Name of the Author'  value='$other_author4_fname'/>
            &nbsp;
            <input name='other_author4_mname' type='text'  id='other_author4_mname' size='12'  title='Name of the Author'  value='$other_author4_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author5_mname != "") && ($other_author5_fname != "") && ($other_author5_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author5</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author5_no' type='text'  id='other_author5_no' size='5' title='Author No.'  value='$other_author5_no'/>
            &nbsp;
              <input name='other_author5_sname' type='text'  id='other_author5_sname' size='12' title='Name of the Author'  value='$other_author5_sname'/>
            &nbsp;
            <input name='other_author5_fname' type='text'  id='other_author5_fname' size='12' title='Name of the Author'  value='$other_author5_fname'/>
            &nbsp;
            <input name='other_author5_mname' type='text'  id='other_author5_mname' size='12'  title='Name of the Author'  value='$other_author5_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author6_mname != "") && ($other_author6_fname != "") && ($other_author6_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author6</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author6_no' type='text'  id='other_author6_no' size='5' title='Author No.'  value='$other_author6_no'/>
            &nbsp;
              <input name='other_author6_sname' type='text'  id='other_author6_sname' size='12' title='Name of the Author'  value='$other_author6_sname'/>
            &nbsp;
            <input name='other_author6_fname' type='text'  id='other_author6_fname' size='12' title='Name of the Author'  value='$other_author6_fname'/>
            &nbsp;
            <input name='other_author6_mname' type='text'  id='other_author6_mname' size='12'  title='Name of the Author'  value='$other_author6_mname'/>
          </div></td>
        </tr>
";}?>
		  <?php if (($other_author7_mname != "") && ($other_author7_fname != "") && ($other_author7_mname != "")) {

        echo "<tr>
          <td width='18%'><div align='left'>Other_Author7</div></td>
          <td colspan='3'><div align='left'>
		  <input name='other_author7_no' type='text'  id='other_author7_no' size='5' title='Author No.'  value='$other_author7_no'/>
            &nbsp;
              <input name='other_author7_sname' type='text'  id='other_author7_sname' size='12' title='Name of the Author'  value='$other_author7_sname'/>
            &nbsp;
            <input name='other_author7_fname' type='text'  id='other_author7_fname' size='12' title='Name of the Author'  value='$other_author7_fname'/>
            &nbsp;
            <input name='other_author7_mname' type='text'  id='other_author7_mname' size='12'  title='Name of the Author'  value='$other_author7_mname'/>
          </div></td>
        </tr>
";}?>
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
            <br />
         </div></td>
          <td>
              <input name="uti" type="text"  id="uti" size="49" title='UniformTitle of the book' value="<?php echo $uti; ?>"/>          </td>

          <td height="30" align="right" class="style2">&nbsp;</td>
          <td>&nbsp;</td>
   </tr>
    <tr>
          <td height="30" align="right" class="style2"><div align="left">Editor(s) :</div></td>
          <td><div align="left">
              <input name="editors" type="text"  id="editors" size="49" value="<?php echo $editors; ?>"  />
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
     <tr>
          <td height="30" align="right" class="style2"><div align="left">Illustrator:</div></td>
          <td><div align="left">
              <input name="illustrator" type="text"  id="illustrator" size="49"  value="<?php echo $illustrator; ?>"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
        </tr>
		  <tr>
         <td><div align="left">Edition</div></td>
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
                <option <?php if ($classification == $classific) {
            echo selected;
        }
        ?>><?php echo $classific; ?></option>
                <?php $i++;}?>
              </select>          </td>

    <td><div align="left"></div></td>
    <td align="right"><div align="left"></div></td>
  </tr>
  <tr>
          <td height="30" align="right" class="style2"><div align="left">Author (relating to edition) :</div></td>
          <td><div align="left">
              <input name="author_relatingto_edition" type="text"  id="author_relatingto_edition" size="49"  value="<?php echo $author_relatingto_edition; ?>"/>
          </div></td>
          <td><div align="left"></div></td>
          <td align="left"><div align="left"></div></td>
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

          <td width="33%" align="right"><div align="left"></div></td>
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
          <td align="right"><div align="left"><span class="style2">Series, Volume, No:</span></div></td>
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
            <textarea name="notes"    id="notes"   rows="7"cols="37" ><?php echo $notes; ?></textarea>
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
          <td  align="left" colspan="4"><div id="div"></div></td>
        </tr>


		<tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject1" type="text"   id="subject1" size="49"  value="<?php echo $subject1; ?>"/></td>
        </tr>
		<tr>
          <td width="18%"><div align="left"> Subject   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></td>
          <td colspan="3"><input name="subject2" type="text" id="subject2" size="49"  value="<?php echo $subject2; ?>"/></td>
        </tr>

	  <?php if ($subject3 != "") {
        $sub = 3;
        echo "<tr><td>Subject </td><td><input type='text' name='subject3' size='49' value='$subject3'></td><tr>";}?>

		<?php if ($subject4 != "") {
        $sub = 4;
        echo "<tr><td>Subject </td><td><input type='text' name='subject4' size='49' value='$subject4'></td><tr>";}?>
        <?php if ($subject5 != "") {
        $sub = 5;
        echo "<tr><td>Subject </td><td><input type='text' name='subject5'  size='49' value='$subject5'></td><tr>";}?>
        <?php if ($subject6 != "") {
        $sub = 6;
        echo "<tr><td>Subject </td><td><input type='text' name='subject6'  size='49' value='$subject6'></td><tr>";}?>
        <?php if ($subject7 != "") {
        $sub = 7;
        echo "<tr><td>Subject </td><td><input type='text' name='subject7'  size='49' value='$subject7'></td><tr>";}?>
	<tr>
          <td align="right" class="style2"><div align="left">Verified by:</div></td>
          <td><div align="left">
              <input name="verified_by" type="text"  id="verified_by" size="49" value="<?php echo $verified_by; ?>"/>
          </div></td>
          <td align="right" class="style2">&nbsp;</td>
          <td><div align="left"></div></td>
        </tr>


        <tr>
          <td align="right"></td>
          <td align="left"></td>
          <td height="30" align="right" class="style2"></td>
          <td></td>
        </tr>








       <tr>
          <td height="30" align="right" class="style2"><div align="left">
              <input name="submit" type="submit" class="btn" id="submit" value="  Add  " />
          </div></td>
          <td width="33%"><input type="button" name="submit2" value="Attach File..." class="btn" onclick="MM_openBrWindow1('upload_attachment.php','','scrollbars=yes,width=500,height=300')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/></td>
          <td width="33%">&nbsp;</td>
          <td  align="right">&nbsp;</td>
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
