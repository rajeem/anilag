
<?php 
// get current date 
$current = getdate(); 
// format
if ($current["hours"] < 12) { 
$ampm = " AM"; 
}
elseif ($current["hours"] == 12) {
$ampm = " PM"; 
}
else { 
$current["hours"] = $current["hours"] - 12; 
$ampm = " PM"; 
} 
if ($current["hours"] < 10) { 
$current["hours"] = "0" . $current["hours"]; 
} 
if ($current["minutes"] < 10) { 
$current["minutes"] = "0" . $current["minutes"]; 
} 
if ($current["seconds"] < 10) { 
$current["seconds"] = "0" . $current["seconds"]; 
} 
if ($current["mday"] < 10) { 
$current["mday"] = "0" . $current["mday"]; 
} 
// turn it into strings 
$current_time = $current["hours"] . ":" . $current["minutes"] . ":" . $current ["seconds"] . $ampm; 
if ($current["month"] == "January") { 
$current["month"] = "01"; 
}
if ($current["month"] == "February") { 
$current["month"] = "02"; 
}
if ($current["month"] == "March") { 
$current["month"] = "03"; 
}
if ($current["month"] == "April") { 
$current["month"] = "04"; 
}
if ($current["month"] == "May") { 
$current["month"] = "05"; 
}
if ($current["month"] == "June") { 
$current["month"] = "06"; 
}
if ($current["month"] == "July") { 
$current["month"] = "07"; 
}
if ($current["month"] == "August") { 
$current["month"] = "08"; 
}
if ($current["month"] == "September") { 
$current["month"] = "09"; 
}

if ($current["month"] == "October") { 
$current["month"] = "10"; 
}
if ($current["month"] == "November") { 
$current["month"] = "11"; 
}
if ($current["month"] == "December") { 
$current["month"] = "12"; 
}
 
$current_date = $current["year"] . "-" . $current["month"] . "-" . " " . $current["mday"];
$ngaun = $current_date.''.$current_time;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
