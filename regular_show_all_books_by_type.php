<?php 
session_start();

//connection to database and settings
include("include/connect.php");
include("include/gensettings.php");
include("include/function.php");
include("user.php");
$window =1;
//e-books count
$sql='SELECT * from card_cat WHERE (pdb!="" or pdf!="" or help!="")'; 
$result = mysql_query($sql); 
$pdf_books = mysql_num_rows($result);

//.........number of books in lib............................//

//books in
$sql1='SELECT sum(qty) from card_cat '; 
$result1 = mysql_query($sql1); 
while($row=mysql_fetch_array($result1)){
$books   =$row['sum(qty)'];
}

//books out
$sql="SELECT sum(qty) from books_bar"; 
$result = mysql_query($sql); 
while($row=mysql_fetch_array($result)){
$book=$row['sum(qty)'];
}
//add out and in
$books+=$book;

//books available
$sql="SELECT * from card_cat"; 
$result = mysql_query($sql); 
$final_count_in  = mysql_num_rows($result);

//number of book titles
$sql="SELECT * from titles"; 
$result = mysql_query($sql); 
$all_title  = mysql_num_rows($result);

$_SESSION[school_code] = $_SESSION['school_code'];		//school
$_SESSION[type] = $_SESSION['type'];		//keyword
$_SESSION[search] = $_SESSION['search'];		//text
	
$school_code = $_SESSION['school_code'];
//echo $school_code;		//school
$type = $_SESSION['type'];		//keyword
$search = $_SESSION['search'];		//text
//##################################################################################################################################################################################################
//echo $school_code."Hello";
//echo $type."type";



$back="\\";
$sql = str_replace ($back, "", $sql);

$search = str_replace ("|", "", $search);	

/**add character to $search variable so that
  *the search variable can read as 2 words
  **/
$search.="  |||";			

//count words
$count = count(explode(" ", $search));


//============================if the search field is not blank
	if(($search!="")&&($count>=2)){			
       
		if($school_code=="all"){
			$sql="SELECT * from card_cat where match(call_num,author_sname,author_fname,
			author_mname,title,subject1,subject2,subject3,location,place_pub,publisher,date_pub,classification)
			against ('$search')";
			$txt="<strong>All books</strong>";
	}// end if school_code==all
	else{// if school_code=="$school_code"
			$sql="SELECT * from card_cat where match(call_num,author_sname,author_fname,
			author_mname,title,subject1,subject2,subject3,location,place_pub,publisher,date_pub,classification)
			against ('$search') && school_code='$_SESSION[code]'";
			$txt="<strong>All books</strong>";
	
	}
	
	}
	//if the search key contains asterisk(*)########################################
	
	$findme    = '*';

	$mystring2 = $search;

	//$pos1 = stripos($mystring1, $findme);
	$pos2 = stripos($mystring2, $findme);

	if($pos2 !== false&&$type!='all'){
	
		//echo "asterisk";
		$search1=str_replace('*','%',$search);
		$search1=str_replace('|','',$search1);
		$search1=str_replace(' ','',$search1);


	
		$sql="SELECT * from card_cat where $type like '$search1'";
		$txt="<strong>All books</strong>";

	}
//============================if the search field is not blank ====end

/**replace the backslashes in the variable 
  *$sql to blank
  *variable
  */
$search = str_replace ("|", "", $search);	

//============================if the search field is not blank ====end



	
	//############PAGINATION ################	
	/**Set current, 
  *prev and next page 
  */ 
$page = (!isset($_GET['page']))? 1 :$_GET['page']; 
$prev = ($page - 1); 
$next = ($page + 1); 

/**Max results 
  *per page 
  */ 
$max_results = $rec_per_page; 
/* Calculate the offset */ 
$from = (($page * $max_results) - $max_results); 
/**Query the db for total 
  *results. You need to edit
  *the sql to fit your needs 
  */ 
$result = mysql_query($sql) or die(mysql_error()); 

$total_results  = mysql_num_rows($result); 
$number			=$total_results;
$total_pages    = ceil($total_results / $max_results); 

$pagination = ''; 

	/* Create a PREV link if there is one */ 
	if($page > 1) 
	{ 
	//pass the values of the $txt variables
	$pagination .= '<a href="regular_show_all_books_by_type.php?type='.$type.'&txt='.$txt.'&sql='.$sql.'&school_code='.$school_code.'&search='.$search.'&page='.$prev.'"
	title="Previous"> &lt;Previous</a> '; 
	}
	else{
		$pagination .= '<strong> &lt;Previous</strong>&nbsp;'; 
	} 
	// Loop through the total pages 
	for($i = 1; $i <= $total_pages; $i++) 
	{ 
		if(($page) == $i) { 
		$pagination .= $i; 
		} 
		else { 
		$pagination .= '&nbsp;<a href="regular_show_all_books_by_type.php?type='.$type.'&txt='.$txt.'&sql='.$sql.'&search='.$search.'&page='.$i.'&school_code='.$school_code.'" title="page '.$i.'">' .$i. '</a>&nbsp;'; 
		} 
	} 


	/* Print NEXT link if there is one */ 
	if($page < $total_pages) 
	{ 
	$pagination .= '<a href="regular_show_all_books_by_type.php?type='.$type.'&txt='.$txt.'&sql='.$sql.'&search='.$search.'&page='.$next.'&school_code='.$school_code.'"
	title="Next">Next &gt;</a>'; 

	} 
	else{
	$pagination .= '&nbsp;<strong>Next &gt;</strong>'; 
	} 
	
	//############PAGINATION END################
$sql.=" ORDER BY title LIMIT $from, $max_results";

$result=mysql_query($sql,$connect) or die("cant execute query!.....");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<SCRIPT language=javascript>
	
	//-->
	function trash()
	{

    var answer = confirm("Are you sure you wish to delete this item?\n Click OK to proceed otherwise click Cancel.")
	if (!answer){
		
		return false;
	}

    document.supportform.action = "admin_delete.php"    
	document.supportform.method="post"        
    document.supportform.submit();         

    return true;
}
</SCRIPT>
<script type="text/JavaScript" src="js/function.js">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $system_title."--".$footer;?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
<style type="text/css">
<!--
#Layer3 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 571px;
	top: 797px;
}
.style4 {
	font-size: larger;
	font-weight: bold;
}
.style5 {color: #FF0000}
.style6 {font-size: larger; font-weight: bold; color: #FF0000; }
.style7 {color: #FFFFFF}
.style9 {color: #FFFFFF; font-weight: bold; }

-->
</style>
</head>
<body>
<div class="header">
  <div class="logo"><?php echo "&nbsp;&nbsp;&nbsp;".$header_title;?> </div>
  <div id="Layer1"><img src="images/<?php echo $logo;?>" width="117" height="110" />
    <div id="Layer2"></div>
  </div>
</div>
<div class="navbg">
  <div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="index2.php" id="current" title="Search">Search</a></li>
<li><a href="admin_login.php" title="Administrator">Administrator</a></li>
<li><a href="elib.tar.gz" title="Help">Download demo version</a></li>
<li><a href="help2.php" title="Help">Help</a></li>
</ul>
</div>
</div>
<div class="maincontent">
  <div class="floatelft">
    <h2>Search</h2>
	
	<form id="form1" name="myform" method="post" action="index2.php">
      <table width="100%" cellpadding="5" cellspacing="5" class="bg">
        <tr>
          <td width="27%"><strong>Search For:</strong></td>
          <td width="15%"><strong>Appearing in:</strong></td>
          <td width="14%"><strong>School Code</strong></td>
		  <td width="13%">&nbsp;</td>
          <td width="4%" rowspan="2">&nbsp;</td>
          <td width="27%"><?php echo "We have ".$pdf_books. " e books in this server.";
		  ?></td>
        </tr>
		
       <tr>
          <td><input name="search" type="text" class="dilaw" id="search" value="<?php echo trim($search);?>" size="30" /></td>
          <td><select name="type" id="type">
            <option value="all">Keywords</option>
            <option value="author" <?php echo $selected2;?>>Author</option>
            <option value="title" <?php echo $selected3;?>>Title</option>
            <option value="subject" <?php echo $selected4;?>>Subject</option>
          </select></td>
          <td width="14%"> <select name="school_code" id="school_code">
                <?php 
			$i=0;
			$sq6="SELECT school_code from school order by school_code"; 
$result6 = mysql_query($sq6); 
while($row=mysql_fetch_array($result6)){
$code = $row['school_code'];
?>
                <option <? if ($school_code=="$code") echo selected;?>><?php echo $code;?></option>
          <?php $i++; }?><option  value="all"<? if ($school_code=="all") echo selected;?>>All</option></select></td>
		  <td>
            <input name="Submit" type="submit" class="btn" value="Search"/>
           </td>
          <td><?php echo "As of the moment, We have ".$books." books available in the library .";?></td>
        </tr>
		 <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
		   <td>&nbsp;</td>
          <td><input name="op" type="hidden" id="op" value="1" /></td>
          <td><?php echo "There are "."<a href=show_book_title.php>$all_title</a>" ."different books in the library";?></td>
        </tr>
      </table>
</form>
      <p>
        <?php 
		display_pagination($pagination);
	   ?>
      <a href="regular_show_all_books.php"></a></p>
  
  
  
  <?php 
if ($window ==1){
/**perform the query
  *with limit assigned 
  */
//output error msg if there is
$rows=mysql_num_rows($result);
	if($search!=""){
		if($rows==0){
		echo "<strong><font color=red>Your search return zero result</font>
			 in category ".$type."</strong>";
		}
	}
		if($rows>0){	
		$search = str_replace ("|", "", $search); 
         echo '<img src="images/arrowr.gif" width="15" height="9" />Your search for  
		<strong>'.$search.'</strong>in <strong>'.$school_code.'</strong> School returned <strong>'.$number.'</strong> results<br><br><hr/>';
	
		
			 if($search_output==2)
		  {
			?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="4%" bgcolor="#000000">&nbsp;</td>
		    <td width="11%" bgcolor="#000000">&nbsp;</td>
 		   <td width="9%" bgcolor="#000000">&nbsp;</td>
 		   <td width="23%" bgcolor="#000000"><strong class="style9">Book Title </strong></td>
 		   <td width="24%" bgcolor="#000000"><strong class="style9">Main Author</strong></td>
 		   <td width="14%" bgcolor="#000000"><span class="style7"><strong>Access No.</strong></span></td>
 	 	   <td width="15%" bgcolor="#000000"><span class="style9">Availability</span></td>
 	     <? if ($school_code=="all") echo" <td width='15%' bgcolor='#000000'><span class='style9'>School</span></td>
 	 ";?>
	 
	   <? if ($location2=="on") echo" <td width='15%' bgcolor='#000000'><span class='style9'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location</span></td>
 	 ";?></tr>
		
			<?php		
					
		  }
			
	
	
				$count=1;

				if($_GET['type']!=""){
				$type=$_GET['type'];
				}
				$x=2;
				$y=1;
		        while($row=mysql_fetch_array($result)){
				
				$front			=$row["front"];
				$pdf			=$row["pdf"];
				$help			=$row["help"];
				$pdb			=$row["pdb"];
				
				$id        	    =$row['id'];
				$qty			=$row['qty'];
				$location		=$row['location'];
				$code_mo        = $row['school_code'];
				$access_no		=$row['access_no'];
				$call_num		=$row['call_num'];
				$author_sname	=$row['author_sname'];
				$author_fname	=$row['author_fname'];
				$author_mname	=$row['author_mname'];
				$author_mname	=ucfirst($author_mname);				
				$author     	=$author_fname.' '.$author_mname{0}.'.'.$author_sname;
				$other_author1_sname	=$row['other_author1_sname'];
				$other_author2_sname	=$row['other_author2_sname'];
				$other_author3_sname	=$row['other_author3_sname'];
				$other_author4_sname	=$row['other_author4_sname'];
				$title			=$row['title'];
				$parallel_title	=$row['parallel_title'];
				$oti			=$row['oti'];
				$edition		=$row['edition'];
				$gmd			=$row['gmd'];
				$classification	=$row['classification'];
				$place_pub		=$row['place_pub'];
				$publisher		=$row['publisher'];
				$date_pub		=$row['date_pub'];
				$eoi			=$row['eoi'];
				$opd			=$row['opd'];
				$size_dimension	=$row['size_dimension'];
				$series			=$row['series'];
				$accom_mat		=$row['accom_mat'];
				$notes			=$row['notes'];
				$isbn			=$row['isbn'];
				$subject1		=$row['subject1'];
				$subject2		=$row['subject2'];
				$subject3		=$row['subject3'];
				$subject4		=$row['subject4'];
				$source_of_fund	=$row['source_of_fund'];
				$mode_of_ac		=$row['mode_of_ac'];
				$date_ac		=$row['date_ac'];
				$property_no	=$row['property_no'];
				$are			=$row['are'];
				$date_verify	=$row['date_verify'];
				$date_encode	=$row['date_encode'];
				$encoded_by		=$row['encoded_by'];
				$verified_by	=$row['verified_by'];
				
				
				//image to use according to classification
				if($classification=="book"){
				$class_image="book.gif";
				}
				
				if($classification=="mag"){
				$class_image="mag.gif";
				}
				
				if($classification=="tape"){
				$class_image="tape.gif";
				}
				
				if($classification=="cd"){
				$class_image="cd.gif";
				}
				
				if($classification=="case"){
				$class_image="case.gif";
				}
				
				if($classification=="map"){
				$class_image="map.gif";
				}
				
				if($classification=="camera"){
				$class_image="camera.gif";
				}
				
				//data for second table
				$the_final_call_num	=$call_num;
				$the_final_title	=$title;
				$the_final_author	=$author;
				$the_final_subject	=$subject;
				
				
				if($x>$y){
				$y+=2;
				$bg="#ECE9D8";
	
				}else{
				$x+=2;
				$bg="#Ffffff";
				}
			
					if($pdf!=""){
					$dest="pdf";
					$doc="(PDF)";
					//$front='pdf.jpeg';
					
					}
					if($help!=""){
					$dest="help";
					$doc="(compiled HTML)";
					//$front='manual.jpg';
					}
					if($pdb!=""){
					$dest="pdb";
					$doc="(PDB)";
					}
					if(($pdf!="")&&($help!="")){
					$dest="all";
					}
					if($front==""){
					$front='no_preview.gif';
					}
				
									
					if($type=="all"){
					$top="";
					}
				
				
				//---------------------------------------------- START AUTHOR---------------------------------------------
				if($type=="author"){
				$input		=$search;
				
				$words  = $coauthor;
				$words = explode("/", $words);
				
				// no shortest distance found, yet
				$shortest = -1;

					// loop through words to find the closest
					foreach ($words as $word) {

    				// calculate the distance between the input word,
   				    // and the current word
   					 $lev = levenshtein($input, $word);

  				    // check for an exact match
   						 if ($lev == 0) {

      					  // closest word is this one (exact match)
       					 $closest = $word;
       					 $shortest = 0;

       					 // break out of the loop; we've found an exact match
       					 break;
    					}

   						 // if this distance is less than the next found shortest
   						 // distance, OR if a next shortest word has not yet been found
    					if ($lev <= $shortest || $shortest < 0) {
       					 // set the closest match, and shortest distance
       					 $closest  = $word;
       					 $shortest = $lev;
   						 }
					}

						//echo "Input word: $input\n";
						if ($shortest == 0) {
    					echo "Exact match found: $closest\n";
						} else {
    					//echo "Did you mean: $closest?\n";
						$top="<strong>$closest</strong>";
						}

				
				
				}
			    //-----------------------------------------------------------END AUTHOR------------------------------------------

				//---------------------------------------------------------START SUBJECT----------------------------------------

				if($type=="subject"){
				
				$input		=$search;
				
				$words  = $subject;
				$words = explode("/", $words);
				
				// no shortest distance found, yet
				$shortest = -1;

					// loop through words to find the closest
					foreach ($words as $word) {

    				// calculate the distance between the input word,
   				    // and the current word
   					 $lev = levenshtein($input, $word);

  				    // check for an exact match
   						 if ($lev == 0) {

      					  // closest word is this one (exact match)
       					 $closest = $word;
       					 $shortest = 0;

       					 // break out of the loop; we've found an exact match
       					 break;
    					}

   						 // if this distance is less than the next found shortest
   						 // distance, OR if a next shortest word has not yet been found
    					if ($lev <= $shortest || $shortest < 0) {
       					 // set the closest match, and shortest distance
       					 $closest  = $word;
       					 $shortest = $lev;
   						 }
					}

						//echo "Input word: $input\n";
						if ($shortest == 0) {
    					echo "Exact match found: $closest\n";
						} else {
    					//echo "Did you mean: $closest?\n";
						$top="<strong>$closest</strong>";
						}
				//all caps the results
				$top = strtoupper($closest);
				//$top="<strong>$closest</strong>";
				}
				//---------------------------------------------------------END SUBJECT----------------------------------------

				//---------------------------------------------------------START TITLE----------------------------------------

				if($type=="title"){
				$top=$title;
				}
				//---------------------------------------------------------END TITLE----------------------------------------

				
				
				//initialize the value of roman numerals for co author output
				$roman="";
				$num="";
				
				
				//====================table 1===================================================
				if($search_output==1){
				//echo $classification;
				?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="23" align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
          <td width="211" align="right" valign="top" bgcolor="#CCCCCC"><br />          </td>
          <td width="13" bgcolor="#CCCCCC">&nbsp;</td>
          <td width="130" bgcolor="#CCCCCC"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$top; ?>&nbsp;</td>
          <td width="248" bgcolor="#CCCCCC">&nbsp;</td>
          <td width="12" bgcolor="#CCCCCC">&nbsp;</td>
          <td width="165" bgcolor="#CCCCCC">&nbsp;</td>
          <td width="16" bgcolor="#CCCCCC">&nbsp;</td>
          <td width="140" bgcolor="#CCCCCC">&nbsp;</td>
	    </tr>
        <tr>
          <td width="23" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="211" align="right" valign="top" bgcolor="#FFFFFF"><strong class="style6">Location:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $location;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Place of Publication:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $place_pub;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"></td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF"><img src="images/<?php echo $class_image;?>" width="20" height="20" /></td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong class="style4 style5">Accession no.:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><strong><?php echo $access_no;?></strong></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Publisher:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $publisher;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><strong>
            <?php if($qty==0){
					echo '<blink><strong class="style6">item unavailable!</strong></blink>';
				  }
				  else{
				  echo'<a href="bar_new.php?access_no_from='.$access_no.'">Borrow this item</a>';
				  }
			
			?>
          </strong></td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF"><?php echo '<a href="#"  onClick="MM_openBrWindow1(\'plus_info.php?id='.$id.'\',\'\',\'scrollbars=yes,width=600,height=400\')" style="cursor: pointer;">Card Catalog</a>';?></td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>Call no. </strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $call_num;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Year of Publication/Copyright Date:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $date_pub;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td rowspan="8" bgcolor="#FFFFFF"><?php 
				if(($pdf=="")&&($help=="")&&($pdb=="")){
				//	echo'<img src="no_preview.gif"
				//	title="'.$title.' by ' .$author.'"/>';
				}else{  	
				  		  
    			  	echo'<a href="view_result.php?dest='.$dest.'&id='.$id.'" target="_blank">
					<img src="pdf/front/'.$front.'" 
					title="'.$title.' by '.$author.''.$doc.'"/>
					</a>';}
					
				
				?></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><span class="style6">Author:</span></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><strong><?php echo $author;?></strong></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Extent of Item:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $eoi;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>Other Authors:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $other_author1;?>,<?php echo $other_author2;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Other Physical Details:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $opd;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF"></td>
          <td align="right" valign="top" bgcolor="#FFFFFF"></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $other_author3;?>,<?php echo $other_author4;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Size or Dimesion:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $size_dimension;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong class="style6">Title:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><strong><?php echo $title;?></strong></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Series:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $series;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>Parallel Title:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $parallel_title;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Accompanying Materials:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $accom_mat;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>Other Title Information:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $oti;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Notes:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $notes;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>Edition:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $edition;?></td>
          <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>General Material Designation:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $gmd;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>ISBN/ISSN:</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $isbn;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
	    </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF"><strong>Material type: </strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $classification;?></td>
          <td align="right" bgcolor="#FFFFFF"><strong>Subject(s)</strong></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $subject1;?>,<?php echo $subject2;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><a href="admin_edit.php?id=<?php echo $id;?>">edit</a> | <a href="admin_delete.php?id=<?php echo $id;?>" onclick="return trash();">delete</a>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" bgcolor="#FFFFFF"><input name="action" type="hidden" id="action" value="<?php echo $sql;?>" /></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"><?php echo $subject3;?>,<?php echo $subject4;?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
      <p><?php 

}
//list table
else{

?>


  <tr>
   
    <td bgcolor="<?php echo $bg;?>" colspan="2"><?php echo '<a href="#"  onClick="MM_openBrWindow1(\'plus_info.php?id='.$id.'\',\'\',\'scrollbars=yes,width=600,height=500\')" style="cursor: pointer;">Card Catalog</a>';?> </td>
    <td bgcolor="<?php echo $bg;?>">
      <?php 
				
				if(($pdf=="")&&($help=="")&&($pdb==""))
				{
					//echo'<img src="no_preview.gif"
				//title="'.$title.' by ' .$author.'"/>';
				}else{  			  
    			  	echo'&nbsp;&nbsp;<a href="view_result.php?dest='.$dest.'&id='.$id.'" target="_blank">
					ebook
					</a>';
					
			}
				?></td>
				    <td bgcolor="<?php echo $bg;?>"><?php echo $title;?></td>
     <td bgcolor="<?php echo $bg;?>"><?php echo $author;?></td>
    <td bgcolor="<?php echo $bg;?>"><?php echo $access_no;?></td>
	
    <td bgcolor="<?php echo $bg;?>"> <?php if($qty==0){
					echo '<blink><strong class="style6">item out!</strong></blink>';
				  }
				  else{
				echo '<blink><strong >item in</strong></blink>';
				  }
			
			?></td>
			 <? if ($school_code=="all") echo" <td width='15%' bgcolor='$bg'>$code_mo</td>
 	 ";?>
	   <? if ($location2=="on") echo" <td width='15%' bgcolor='$bg'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$location</td>
 	 ";?>
   
</tr>


<?php 
}	
//end list table
//============end table 1=================================================
				
				$count++;
		        }  
			
		}
	 if($search_output==2)
	  {
		
	?></table><?php
		
		
	  }		
}?>
    </p>
	<p>
	  <?php 
		display_pagination($pagination);
	   ?>
	</p>
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
<div class="footer"><?php echo $system_title;?><br />
<?php echo $footer;?></div>
</body>
</html>