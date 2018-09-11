<?php 

include("include/connect.php");
include("include/gensettings.php");
include("user.php");

$id= $_GET['id'];



$sql="SELECT * from card_cat where id='$id'";
$result=mysql_query($sql,$connect) or die("cant execute query!z");
while($row=mysql_fetch_array($result)) {
		
		$front			=$row["front"];
					$pdf			=$row["pdf"];
					$help			=$row["help"];
					$pdb			=$row["pdb"];
					$id        	    =$row['id'];
					$qty			=$row['qty'];
					$location		=$row['location'];
					$access_no		=$row['access_no'];
					//$call_num		=$row['call_num'];
					$classification_no=$row['classification_no'];
					$book_no		=$row['book_no'];
					$author_no		=$row['author_no'];
					$author_sname			=$row['author_sname'];
					$author_fname			=$row['author_fname'];
					$author_mname			=$row['author_mname'];
					
					///if($author_mname==""){
						//	$author_mname	=ucfirst($author_mname);
						//	$author_mname	=$author_mname.'.';
						//	echo $author_mname;
						//	}

				$other_author1_sname	=$row['other_author1_sname'];
				$other_author1_fname	=$row['other_author1_fname'];
				$other_author1_mname	=$row['other_author1_mname'];
				$other_author2_sname	=$row['other_author2_sname'];
				$other_author2_fname	=$row['other_author2_fname'];
				$other_author2_mname	=$row['other_author2_mname'];
				$other_author3_sname	=$row['other_author3_sname'];
				$other_author3_fname	=$row['other_author3_fname'];
				$other_author3_mname	=$row['other_author3_mname'];
				$other_author4_sname	=$row['other_author4_sname'];
				$other_author4_fname	=$row['other_author4_fname'];
				$other_author4_mname	=$row['other_author4_mname'];
				$other_author5_sname	=$row['other_author5_sname'];
				$other_author5_fname	=$row['other_author5_fname'];
				$other_author5_mname	=$row['other_author5_mname'];
				$other_author6_sname	=$row['other_author6_sname'];
				$other_author6_fname	=$row['other_author6_fname'];
				$other_author6_mname	=$row['other_author6_mname'];
				$other_author7_sname	=$row['other_author7_sname'];
				$other_author7_fname	=$row['other_author7_fname'];
				$other_author7_mname	=$row['other_author7_mname'];
				$title			=$row['title'];
					$parallel_title	=$row['parallel_title'];
					$oti			=$row['oti'];
					$uti			=$row['uti'];
					$edition		=$row['edition'];
					$gmd			=$row['gmd'];
					$classification	=$row['classification'];
					$place_pub		=$row['place_pub'];
					$publisher		=$row['publisher'];
					$date_pub		=$row['date_pub'];
					
					$date_year= substr($date_pub,0,4);// year of publication
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
					$subject5		=$row['subject5'];
					$subject6		=$row['subject6'];
					$subject7		=$row['subject7'];
					$subject8		=$row['subject8'];
					$subject9		=$row['subject9'];
					$subject10		=$row['subject10'];
					$source_of_fund	=$row['source_of_fund'];
					$mode_of_ac		=$row['mode_of_ac'];
					$date_ac		=$row['date_ac'];
					$property_no	=$row['property_no'];
					$are			=$row['are'];
					$date_verify	=$row['date_verify'];
					$date_encode	=$row['date_encode'];
					$encoded_by		=$row['encoded_by'];
					$verified_by	=$row['verified_by'];
					$preliminary	=$row['preliminary'];
					$no_of_pages	=$row['no_of_pages'];
		
                     $letter ='LB';   //wala sa database
					 $letter2='A23';  // wala sa database
					 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Card Catalog</title>
<link rel="stylesheet" type="text/css" href="css/<?php echo $css;?>" />
<style type="text/css">
<!--
body {
	background-image: url();
}
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 104px;
	top: 224px;
}
.style1 {font-family: "Courier New", Courier, monospace}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow1(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script></head>
<body>

<form action="about.php" method="post">
<?php if ($author_card=="on"){ //author card?>
<center><h2>Author Card</h2></center>
<table width="66%" border="0" align="center">
  <tr>
    <td width="10%" align="left" bgcolor="#FFFFFF"><span class="style1"><?php echo $classification_no.'<br>'.$book_no.'<br>'.$date_year;?></span></td>
    <td width="49%" bgcolor="#FFFFFF" valign="top"><span class="style1">
      
	  <?php 
	  //author with mname
	  if (($author_sname!="")&&($author_fname!="")&&($author_mname!="")) echo $author_sname.', '.$author_fname.' '.$author_mname{0}.'.<br>';
	?>
	
	<?php 
	//author w/o mname
	if (($author_sname!="")&&($author_fname!="")&&($author_mname=="")) echo $author_sname.', '.$author_fname{0}.'<br>';
	?>
	
	  <?php 
	  //title and author w/ mname
	  if (($title!="")&&($author_mname!="")) echo '&nbsp;&nbsp;&nbsp;'.$title.' '."/".' '.$author_fname.' '.$author_mname{0}.'.'.' '.$author_sname; 
	  ?>
	  
	  <?php 
	   //title and author w/o mname
	  if (($title!="")&&($author_mname=="")) echo '&nbsp;&nbsp;&nbsp;'.$title.' '."/".' '.$author_fname.' '.$author_sname; 
	  ?>
	  
	  <?php 
	  //other authors w/ mname
	  if (($other_author1_sname!="")&&($other_author1_sname!="")&&($other_author1_sname!="")) echo ' , '.$other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname.'.';
	  ?>
	  
	    <?php 
	  //other authors w/o mname
	  if (($other_author1_sname!="")&&($other_author1_sname!="")&&($other_author1_sname!="")) echo ' , '.$other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname{0};
	  ?>
	
	    <?php if (($other_author2_sname!="")&&($other_author2_sname!="")&&($other_author2_sname!="")) echo ', '.$other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname{0};?>
        <?php if (($other_author3_sname!="")&&($other_author3_sname!="")&&($other_author3_sname!="")) echo ', '.$other_author3_sname.' '.$other_author3_fname.' '.$other_author3_mname{0};?>
        <?php if (($other_author4_sname!="")&&($other_author4_sname!="")&&($other_author4_sname!="")) echo ', '.$other_author4_sname.' '.$other_author4_fname.' '.$other_author4_mname{0};?>
        <?php if (($other_author5_sname!="")&&($other_author5_sname!="")&&($other_author5_sname!="")) echo ', '.$other_author5_sname.' '.$other_author5_fname.' '.$other_author5_mname{0};?>
        <?php if (($other_author6_sname!="")&&($other_author6_sname!="")&&($other_author6_sname!="")) echo ', '.$other_author6_sname.' '.$other_author6_fname.' '.$other_author6_mname{0};?>
        <?php if (($other_author7_sname!="")&&($other_author7_sname!="")&&($other_author7_sname!="")) echo ', '.$other_author7_sname.' '.$other_author7_fname.' '.$other_author7_mname{0};
	?>  
	 <?php if (($place_pub!="")&&($publisher!="")&&($date_pub!="")){ ?>
      <?php echo '&nbsp;--'.' '.$place_pub.':'.' '.$publisher.', '.'c'.$date_pub; ?>
	  <?php } ?>
     </span></td>
  </tr>
  <!--<tr>
    <td height="27" align="left"  bgcolor="#FFFFFF">&nbsp;</td>
   <?php if (($place_pub!="")&&($publisher!="")&&($date_pub!="")) echo '<td bgcolor="#FFFFFF">'. $place_pub.'  '.$publisher.'  '.'c '.$date_pub.'</td>'; else echo "<td bgcolor='#FFFFFF'>&nbsp;</td>";?>
  
  </tr>
  -->
  <tr>
    <td align="left" bgcolor="#FFFFFF"><span class="style1"></span></td>
      <td align="left" bgcolor="#FFFFFF">
	    <span class="style1"><?php if(($preliminary!="")&&($no_of_pages!="")&&($size_dimension!=="")){?>
	    <?php echo "&nbsp;&nbsp;&nbsp;".$preliminary;?>, <?php echo $no_of_pages; ?>p.&nbsp;:&nbsp;ill. ; <?php echo $size_dimension; ?>
	    <?php //if ($isbn!="") echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;ISBN:".'  '.$isbn;?>
        </span><?php } ?></td>
  </tr>
  <tr>
  <td align="left" bgcolor="#FFFFFF"><br /></td><td align="left" bgcolor="#FFFFFF"><br /></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><span class="style1"></span></td>
    <td bgcolor="#FFFFFF"><span class="style1"><?php if($isbn!=""){ ?>&nbsp;&nbsp;&nbsp;ISBN&nbsp;<?php echo $isbn;  ?><?php } ?>
      <?php // if($subject1!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;".$subject1; ?>
		<?php //if($subject2!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;".$subject2; ?>
	    <?php //if($subject3!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;".$subject3; ?>
	    <?php //if($subject4!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;".$subject4; ?>
	    <?php //if($subject5!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.&nbsp;".$subject5; ?>
	    <?php //if($subject6!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.&nbsp;".$subject6; ?>
	    <?php //if($subject7!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.&nbsp;".$subject7; ?>

    </span></td>
  </tr>
   <tr>
  <td align="left" bgcolor="#FFFFFF"><br /></td><td align="left" bgcolor="#FFFFFF"><br /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><span class="style1"></span></td>
	<td bgcolor="#FFFFFF">
      <span class="style1">&nbsp;&nbsp;<?php //if (($other_author1_sname!="")&&($other_author1_sname!="")&&($other_author1_sname!="")) echo 'I.'.$other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname{0}.'.';?>
    
	 <?php //if (($other_author2_sname!="")&&($other_author2_sname!="")&&($other_author2_sname!="")){ echo '    II.'.$other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname{0}.'.';
	
	 //if($title!="") echo "<br>III.".$title; else if($parallel_title!="") echo "<br>III.".$parallel_title; else if($oti!="") echo "<br>III.".$oti;  else if($uti!="") echo "<br>III.".$uti; }
	 //else{
	 	 //if($title!="") echo "<br>II.".$title; else if($parallel_title!="") echo "<br>II.".$parallel_title; else if($oti!="") echo "<br>II.".$oti;  else if($uti!="") echo "<br>II.".$uti;}?>
		 <?php if($subject1!="") echo "1.&nbsp;".$subject1.". "; ?>
		<?php if($subject2!="") echo "2.&nbsp;".$subject2.". "; ?>
	    <?php if($subject3!="") echo "3.&nbsp;".$subject3.". "; ?>
	    <?php if($subject4!="") echo "4.&nbsp;".$subject4.". "; ?>
	    <?php if($subject5!="") echo "5.&nbsp;".$subject5.". "; ?>
	    <?php if($subject6!="") echo "6.&nbsp;".$subject6.". "; ?>
	    <?php if($subject7!="") echo "7.&nbsp;".$subject7.". "; ?>
      </span></tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"></td>
    <td bgcolor="#FFFFFF"></td>
  </tr>
 
  <tr>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="style1">I. Title</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input name="button2" type="button" onclick="javascript:window.close();" value=" close " class="btn"/></td>
  </tr>
</table>
<?php }?>
<br>
<br>
<br>
<?php if (($title_card=="on")&&($author_sname!="")&&($author_fname!="")&&($author_mname!="")){ // title card?>
<center><h2>Title Card</h2></center>
<table width="66%" border="0" align="center">
  <tr>
    <td width="10%" align="left" bgcolor="#FFFFFF"><span class="style1"><?php //echo $letter.'<br>'.$access_no.'<br>'.$call_num.'<br>'.$date_year;?>
      <?php echo $classification_no.'<br>'.$book_no.'<br>'.$date_year;?></span></td>
    <td width="49%" bgcolor="#FFFFFF" valign="top"><span class="style1"><?php echo"&nbsp;&nbsp;&nbsp;";?>
        <?php if($title!="") echo $title."<br>"; else if($parallel_title!="") echo $parallel_title."<br>"; else if($oti!="") echo  $oti."<br>";  else if($uti!="") echo $uti."<br>"; ?>
        <?php if (($author_sname!="")&&($author_fname!="")&&($author_mname!="")) echo $author_sname.' '.$author_fname.' '.$author_mname{0}.'<br>';
		
	?>
	    <?php if ($title!="") echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$title.' '."/".' '.$author_fname.' '.$author_mname{0}.'.'.' '.$author_sname; ?>  
	    <?php if (($other_author1_sname!="")&&($other_author1_sname!="")&&($other_author1_sname!="")) echo ', '.$other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname{0};?>
	
	    <?php if (($other_author2_sname!="")&&($other_author2_sname!="")&&($other_author2_sname!="")) echo ', '.$other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname{0};?>
        <?php if (($other_author3_sname!="")&&($other_author3_sname!="")&&($other_author3_sname!="")) echo ', '.$other_author3_sname.' '.$other_author3_fname.' '.$other_author3_mname{0};?>
        <?php if (($other_author4_sname!="")&&($other_author4_sname!="")&&($other_author4_sname!="")) echo ', '.$other_author4_sname.' '.$other_author4_fname.' '.$other_author4_mname{0};?>
        <?php if (($other_author5_sname!="")&&($other_author5_sname!="")&&($other_author5_sname!="")) echo ', '.$other_author5_sname.' '.$other_author5_fname.' '.$other_author5_mname{0};?>
        <?php if (($other_author6_sname!="")&&($other_author6_sname!="")&&($other_author6_sname!="")) echo ', '.$other_author6_sname.' '.$other_author6_fname.' '.$other_author6_mname{0};?>
        <?php if (($other_author7_sname!="")&&($other_author7_sname!="")&&($other_author7_sname!="")) echo ', '.$other_author7_sname.' '.$other_author7_fname.' '.$other_author7_mname{0};?><?php if(($place_pub!="")&&($publisher!="")&&($date_pub!="")){ ?><?php echo '&nbsp;--'.' '.$place_pub.':'.' '.$publisher.', '.'c'.$date_pub; ?><?php } ?>
     </span></td>
  </tr>
 <tr>
    <td align="left" bgcolor="#FFFFFF"><span class="style1"></span></td>
      <td align="left" bgcolor="#FFFFFF">
	    <span class="style1"><?php if(($preliminary!="")&&($no_of_pages!="")&&($size_dimension!=="")){?>
	    <?php echo "&nbsp;&nbsp;&nbsp;".$preliminary;?>, <?php echo $no_of_pages; ?>p.&nbsp;:&nbsp;ill. ; <?php echo $size_dimension; ?>
	    <?php //if ($isbn!="") echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;ISBN:".'  '.$isbn;?>
        </span><?php } ?></td>
  </tr>
  <tr>
  <td align="left" bgcolor="#FFFFFF"><br /></td><td align="left" bgcolor="#FFFFFF"><br /></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><span class="style1"></span></td>
    <td bgcolor="#FFFFFF"><span class="style1"><?php if($isbn!=""){ ?>&nbsp;&nbsp;&nbsp;ISBN&nbsp;<?php echo $isbn;  ?><?php } ?>
      <?php // if($subject1!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;".$subject1; ?>
		<?php //if($subject2!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;".$subject2; ?>
	    <?php //if($subject3!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;".$subject3; ?>
	    <?php //if($subject4!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;".$subject4; ?>
	    <?php //if($subject5!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.&nbsp;".$subject5; ?>
	    <?php //if($subject6!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.&nbsp;".$subject6; ?>
	    <?php //if($subject7!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.&nbsp;".$subject7; ?>

    </span></td>
  </tr>
   <tr>
  <td align="left" bgcolor="#FFFFFF"><br /></td><td align="left" bgcolor="#FFFFFF"><br /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><span class="style1"></span></td>
	<td bgcolor="#FFFFFF">
      <span class="style1">&nbsp;&nbsp;
	 <?php //if (($other_author1_sname!="")&&($other_author1_sname!="")&&($other_author1_sname!="")) echo 'I.'.$other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname{0}.'.';?>
    
	 <?php //if (($other_author2_sname!="")&&($other_author2_sname!="")&&($other_author2_sname!="")){ echo '    II.'.$other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname{0}.'.';
	
	 //if($title!="") echo "<br>III.".$title; else if($parallel_title!="") echo "<br>III.".$parallel_title; else if($oti!="") echo "<br>III.".$oti;  else if($uti!="") echo "<br>III.".$uti; }
	 //else{
	 	 //if($title!="") echo "<br>II.".$title; else if($parallel_title!="") echo "<br>II.".$parallel_title; else if($oti!="") echo "<br>II.".$oti;  else if($uti!="") echo "<br>II.".$uti;}?>
		 <?php if($subject1!="") echo "1.&nbsp;".$subject1.". "; ?>
		<?php if($subject2!="") echo "2.&nbsp;".$subject2.". "; ?>
	    <?php if($subject3!="") echo "3.&nbsp;".$subject3.". "; ?>
	    <?php if($subject4!="") echo "4.&nbsp;".$subject4.". "; ?>
	    <?php if($subject5!="") echo "5.&nbsp;".$subject5.". "; ?>
	    <?php if($subject6!="") echo "6.&nbsp;".$subject6.". "; ?>
	    <?php if($subject7!="") echo "7.&nbsp;".$subject7.". "; ?>
      </span></tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"></td>
    <td bgcolor="#FFFFFF"></td>
  </tr>
 
  <tr>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="style1">I. Title</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input name="button2" type="button" onclick="javascript:window.close();" value=" close " class="btn"/></td>
  </tr>
</table>
<p>
  <?php }?>
</p>
  <?php if (($title_card=="on")&&($author_sname=="")&&($author_fname=="")&&($author_mname=="")){ // title card?>
<center>
  <h2>Title Card</h2>
</center>
<table width="66%" border="0" align="center">
  <tr>
    <td width="10%" align="left" bgcolor="#FFFFFF"><span class="style1"><?php //echo $letter.'<br>'.$access_no.'<br>'.$call_num.'<br>'.$date_year;?>
      <?php echo $classification_no.'<br>'.$book_no.'<br>'.$date_year;?></span></td>
    <td width="49%" bgcolor="#FFFFFF" valign="top"><span class="style1"><?php if($title!="") echo $title."<br>"; else if($parallel_title!="") echo $parallel_title."<br>"; else if($oti!="") echo  $oti."<br>";  else if($uti!="") echo $uti."<br>"; ?><?php if(($place_pub!="")&&($publisher!="")&&($date_pub!="")){ ?>. -- <?php echo $place_pub; ?>: <?php echo $publisher; ?>, c<?php echo $date_pub; ?><?php } ?></span></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><span class="style1"></span></td>
      <td align="left" bgcolor="#FFFFFF">
	    <span class="style1"><?php if(($preliminary!="")&&($no_of_pages!="")&&($size_dimension!=="")){?>
	    <?php echo "&nbsp;&nbsp;&nbsp;".$preliminary;?>, <?php echo $no_of_pages; ?>p.&nbsp;:&nbsp;ill. ; <?php echo $size_dimension; ?>
	    <?php //if ($isbn!="") echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;ISBN:".'  '.$isbn;?>
        </span><?php } ?></td>
  </tr>
  <tr>
  <td align="left" bgcolor="#FFFFFF"><br /></td><td align="left" bgcolor="#FFFFFF"><br /></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><span class="style1"></span></td>
    <td bgcolor="#FFFFFF"><span class="style1"><?php if($isbn!=""){ ?>&nbsp;&nbsp;&nbsp;ISBN&nbsp;<?php echo $isbn;  ?><?php } ?>
      <?php // if($subject1!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;".$subject1; ?>
		<?php //if($subject2!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;".$subject2; ?>
	    <?php //if($subject3!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;".$subject3; ?>
	    <?php //if($subject4!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;".$subject4; ?>
	    <?php //if($subject5!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.&nbsp;".$subject5; ?>
	    <?php //if($subject6!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.&nbsp;".$subject6; ?>
	    <?php //if($subject7!="") echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.&nbsp;".$subject7; ?>

    </span></td>
  </tr>
   <tr>
  <td align="left" bgcolor="#FFFFFF"><br /></td><td align="left" bgcolor="#FFFFFF"><br /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><span class="style1"></span></td>
	<td bgcolor="#FFFFFF">
      <span class="style1">&nbsp;&nbsp;
	 <?php //if (($other_author1_sname!="")&&($other_author1_sname!="")&&($other_author1_sname!="")) echo 'I.'.$other_author1_sname.' '.$other_author1_fname.' '.$other_author1_mname{0}.'.';?>
    
	 <?php //if (($other_author2_sname!="")&&($other_author2_sname!="")&&($other_author2_sname!="")){ echo '    II.'.$other_author2_sname.' '.$other_author2_fname.' '.$other_author2_mname{0}.'.';
	
	 //if($title!="") echo "<br>III.".$title; else if($parallel_title!="") echo "<br>III.".$parallel_title; else if($oti!="") echo "<br>III.".$oti;  else if($uti!="") echo "<br>III.".$uti; }
	 //else{
	 	 //if($title!="") echo "<br>II.".$title; else if($parallel_title!="") echo "<br>II.".$parallel_title; else if($oti!="") echo "<br>II.".$oti;  else if($uti!="") echo "<br>II.".$uti;}?>
		 <?php if($subject1!="") echo "1.&nbsp;".$subject1.". "; ?>
		<?php if($subject2!="") echo "2.&nbsp;".$subject2.". "; ?>
	    <?php if($subject3!="") echo "3.&nbsp;".$subject3.". "; ?>
	    <?php if($subject4!="") echo "4.&nbsp;".$subject4.". "; ?>
	    <?php if($subject5!="") echo "5.&nbsp;".$subject5.". "; ?>
	    <?php if($subject6!="") echo "6.&nbsp;".$subject6.". "; ?>
	    <?php if($subject7!="") echo "7.&nbsp;".$subject7.". "; ?>
      </span></tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"></td>
    <td bgcolor="#FFFFFF"></td>
  </tr>
 
  <tr>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input name="button22" type="button" onclick="javascript:window.close();" value=" close " class="btn"/></td>
  </tr>
</table>
<?php }?>
</form>
</body>
</html>