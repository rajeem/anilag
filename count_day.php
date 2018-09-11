<?php 
session_start();


function count_days($start, $end)
{
   if( $start != '0000-00-00' and $end != '0000-00-00' )
   {
       $timestamp_start = strtotime($start);
       $timestamp_end = strtotime($end);
       if( $timestamp_start >= $timestamp_end ) return 0;
       $start_year = date("Y",$timestamp_start);
       $end_year = date("Y", $timestamp_end);
       $num_days_start = date("z",strtotime($start));
       $num_days_end = date("z", strtotime($end));
       $num_days = 0;
       $i = 0;
      
	   if( $end_year > $start_year )
       {
          while( $i < ( $end_year - $start_year ) )
          {
             $num_days = $num_days + date("z", strtotime(($start_year + $i)."-12-31"));
             $i++;
          }
        }
        return ( $num_days_end + $num_days ) - $num_days_start;
   }
   else
   {
        return 0;
    }
}


function convertday($n){
switch ($n){
case "Mon": return "Monday";break;
case "Tue": return "Tuesday";break;
case "Wed": return "Wednesday";break;
case "Thu": return "Thursday";break;
case "Fri": return "Friday";break;
case "Sat": return "Saturday";break;
case "Sun": return "Sunday";break;
};
};
function curdate($x){
$ret=convertday(date("D",$x));
return $ret;
};
function dateadd($datestr, $num, $unit) {
       $units = array("Y","m","d","H","i","s");
       $unix = strtotime($datestr);
       while(list(,$u) = each($units)) $$u = date($u, $unix);
       $$unit += $num;
       return mktime($H, $i, $s, $m, $d, $Y);
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
