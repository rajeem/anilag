<?php
//echo md5('mast').'<Br>';
//echo md5("manny").'<Br>';
echo md5("alexstreet") . '<Br>';
echo md5("ferdzstreet") . '<Br>';
echo md5("mathraxstreet") . '<Br>';
echo md5("warrenstreet") . '<Br>';
echo md5("errolstreet") . '<Br>';
echo md5("dyowiestreet") . '<Br>';
echo md5("hayop") . '<Br>';
echo md5("hayopka") . '<Br>';
echo md5("mannystreet") . '<Br>';
echo md5("manny") . '<Br>';
echo md5("alvin") . '<Br>';
echo md5("password") . '<Br>';
?>
<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;
?>

<!-- put other code and html in here -->


<!-- put this code at the bottom of the page -->
<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "This page was created in " . $totaltime . " seconds";
?>