<?php 

	//e-books count
	$sql='SELECT * from card_cat WHERE (pdb!="" or pdf!="" or help!="")'; 
	$result = mysql_query($sql) or die(mysql_error()); 
	$pdf_books = mysql_num_rows($result);

	//.........number of books in lib............................//

	//books in
	$sql1='SELECT sum(qty) from card_cat '; 
	$result1 = mysql_query($sql1); 
	while($row=mysql_fetch_array($result1))
	{
		$books   =$row['sum(qty)'];
	}

	//books out
	$sql="SELECT sum(qty) from books_bar"; 
	$result = mysql_query($sql); 
	while($row=mysql_fetch_array($result))
	{
		$book=$row['sum(qty)'];
	}
	//add out and in
	$books+=$book;

	//books available
	$sql="SELECT sum(qty) from card_cat WHERE status1='in'"; 
	$result = mysql_query($sql); 
	while($row=mysql_fetch_array($result))
	{
	$final_count_in   =$row['sum(qty)'];
	}
	
	
	
//display pagination or not
function display_pagination($pagination)
{
	if(strlen($pagination)<100)
	{
		$pagination="";
	} 
			
	echo $pagination;
}



function pagination()
{


}




function classification($classification)
{

	if($classification=="book")
	{
		$class_image="book.gif";
	}
				
	if($classification=="mag")
	{
		$class_image="mag.gif";
	}
				
	if($classification=="tape")
	{
		$class_image="tape.gif";
	}
				
	if($classification=="cd")
	{
		$class_image="cd.gif";
	}
				
	if($classification=="case")
	{
		$class_image="case.gif";
	}
				
	if($classification=="map")
	{
		$class_image="map.gif";
	}
				
	if($classification=="camera")
	{
		$class_image="camera.gif";
	}
	return $class_image;

}


function output2rererer()
{


}

function oarray()
{


}

?>