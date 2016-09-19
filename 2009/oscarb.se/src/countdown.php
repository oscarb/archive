<?php
// TIME

$time = "2013-01-24 00:00:00";
$secsleft = strtotime($time) - time();

$val = abs($secsleft) % 43200/43200 * 255;
$rgb = (abs($secsleft) % 86400 < 43200) ? $val : 255 - $val;
$color = array_fill(0, 3, round($rgb));


if(time() >= strtotime($time) ) {
	header("Location: /9");
	exit;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://www.w3.org/2005/10/profile">

<title>oscarb.se - Personal portfolio for Oscar B, aka paq</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href="images/favicon.gif" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script type="text/javascript" language="JavaScript" src="includes/countdown.js"></script>
<style type="text/css">
html, body {
	background: rgb(<?=implode(", ", $color)?>);
}

h1 {
	color: #fff;
	display: block;
}

</style>
</head>

<body onload="ActivateCountDown('CountDownPanel', <?php echo $secsleft; ?>);">

<div id="pagediv">

<?php
if ($secsleft < 0) {
	if (abs(strtotime($time) - time()) < 60*60*24)
		echo "<h1 id=\"CountDownPanel\">/* no comment */</h1>";
	else
		echo "<h1 id=\"CountDownPanel\">/* no comment */</h1>";
} else {
	echo "<h1 id=\"CountDownPanel\" title=\"oscarb.se launches $time \"></h1>";
}
?>
</div>

<?php
include('includes/analytics.php');
?>
</body>
</html>
