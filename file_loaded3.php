<?php // include your database configuration & connection 
session_start();
include("include/connect.php");
include("include/gensettings.php");
include("user.php");

$bar_id = $_POST['bar_id'];
echo $bar_id;

if ($userfile_size >250000){$msg=$msg."Your uploaded file size is more than 250KB so please reduce the file size and then 			upload. Visit the help page to know how to reduce the file size.<BR>";
$borrowers_pic="false";
echo"$msg";
include('load_file.php');
exit();}

$add="upload/$userfile_name"; // the path with the file name where the file will be stored, upload is the directory name. 

if (!($userfile_type =="image/pjpeg" OR $userfile_type=="image/gif")){$msg=$msg."Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
$borrowers_pic="false";
echo"Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
include('load_file.php');
exit();}

$query="SELECT * FROM borrowers_pic where bar_id = '$bar_id' ";
$result = mysql_query($query,$connect)  or die("cant execute query!.....");
$newArray = mysql_fetch_array($result);

if (mysql_num_rows($result) != 0){
echo "A picture already exists...Please remove first the picture to inset new one";
include ('load_file.php');
exit();
} 


if(move_uploaded_file ($userfile, $add)){
$query = "INSERT INTO borrowers_pic(bar_id,file_name,file_size,file_type) VALUES('$bar_id','$userfile_name', '$userfile_size', '$userfile_type')";
$result	=mysql_query($query,$connect) or die("cant execute query!.....");
$file_id = mysql_insert_id();


echo"The file is already uploaded...."; 
include ('load_file.php');

}//end if


?>
<html><head><title>Load Picture</title></head><body></body>
</html>
