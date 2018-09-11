<?php
session_start();

//set the settings of the php configuration needed in runtime

$type=$_POST['type'];
if($type=="front"){
$target_path  = "pdf/front/";
}
if($type=="pdf"){
$target_path  = "pdf/pdf/";
}
if($type=="help"){
$target_path  = "pdf/help/";
}
if($type=="pdb"){
$target_path  = "pdf/pdb/";
}

/**
  * Add the original
  * filename to our target path.  
  */
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
$_FILES['uploadedfile']['tmp_name'];  
//destinaton of file that the user attach
//$target_path = "pdf/";
$filename = $target_path;

//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(!basename( $_FILES['uploadedfile']['name'])){
$error="<strong><font color=red>Please select file!</font></strong>";
session_register("error");
header("location:upload_attachment.php");
exit;
}
/*$pdf = basename( $_FILES['uploadedfile']['name']); 
list($pdf, $ext) = split('[..-]', $pdf);

if($ext!="pdf"){
$error="<strong><font color=red>Please select pdf file only!</font></strong>";
session_register("error");
header("location:upload_attachment.php");
exit;
}*/
if (file_exists($filename)) {
$error="<strong><font color=red>Please rename the file! The file exists.</font></strong>";
session_register("error");
header("location:upload_attachment.php");
exit;
} else {
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        $attachment_of_user=basename( $_FILES['uploadedfile']['name']); 
		
					if($type=="front"){
					$front  = $attachment_of_user;
					session_unregister("front");
	    			session_register("front");
					}
					if($type=="pdf"){
					$pdf  = $attachment_of_user;
					session_unregister("pdf");
	    			session_register("pdf");
					}
					if($type=="help"){
					$help  = $attachment_of_user;
					session_unregister("help");
	    			session_register("help");
					}
					if($type=="pdb"){
					$pdb  = $attachment_of_user;
					session_unregister("pdb");
	    			session_register("pdb");
					}
			//session_unregister("attachment_of_user");
	    	//session_register("attachment_of_user");

   	    echo "<font color=\"#ffffff\" \"face=Arial, Helvetica, sans-serif\">
			<br>The file ".  basename( $_FILES['uploadedfile']['name']). 
    		" has been added. <br><br><center></font>
			<input name=\"button\" type=\"button\" onclick=\"javascript:window.close();\" 
			value=\"--Ok--\" /></center>";
			echo $filename;
        } else{
        	 echo "<br><br><br><br><br><br><font color=\"#ffffff\" 
		 	 \"face=Arial, Helvetica, sans-serif\">    
		     There was an error adding the file,
			 please"."<a href=\"upload_attachment.php\"> 
			 try again!</a></font></center>";
		}

}
?>
 <style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
style{
font:Arial, Helvetica, sans-serif;
font-size:12px;
font-color:#FFFFFF;
}
	
a:link {
	text-decoration: none;
	color: #ffffff;
}
</style>
	   <table width="100%" height="100%" border="0">
         <tr>
           <td width="13%">&nbsp;</td>
           <td width="78%"></td>
           <td width="9%">&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
       </table>
	   <p>&nbsp;</p>
	   <p>&nbsp;       </p>
	   