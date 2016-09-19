<?php

// MUSIC
$domain = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/";


// FUNCTIONS

function format_size($size, $round = 0) {
    //Size must be bytes!
    $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    for ($i = 0; $size > 1024 && isset($sizes[$i + 1]); $i++)
    	$size /= 1024;
    return sprintf("%d %s", round($size, $round), $sizes[$i]);
}


/*
	MISSFÖRSTÅDD
					*/

$dir = "music/";

$albumDir = "msfrstd/";

$msfrstd = array();

$msfrstd[] = "Jag Har En Dröm";
$msfrstd[] = "Plågsamma Dagar";
$msfrstd[] = "Fear";
$msfrstd[] = "Utan Titel";
$msfrstd[] = "Hjärtats Slag";
$msfrstd[] = "Eyes (feat. Wille Alin)";
$msfrstd[] = "Detta Liv";
$msfrstd[] = "Space";
$msfrstd[] = "90-talet";
$msfrstd[] = "Kärlek (mellanspel)";
$msfrstd[] = "En Helt Ny Klass";
$msfrstd[] = "Pacman";
$msfrstd[] = "Refrigerator";
$msfrstd[] = "En Liten Paus";
$msfrstd[] = "Dies Irae";
$msfrstd[] = "Kom Tillbaka";
$msfrstd[] = "Sommarens Hetta";
$msfrstd[] = "Broken Wing (feat. Mirai)";
$msfrstd[] = "Sista Texten";
$msfrstd[] = "Öken (99 - 03)";


$msfrstdPreview = "";

foreach($msfrstd as $nr => $track) {
	$msfrstdPreview .= sprintf("%s%s%02d.mp3, ", $dir, $albumDir, ($nr + 1));
}

$msfrstdPreview = substr($msfrstdPreview, 0, -2);




$sql = "SELECT `ldate`, YEAR(`ldate`) AS `year`, `title`, `file`, `downloads`, `extra` FROM `music` WHERE hidden = 0 ORDER BY `ldate` DESC";
$res = mysql_query($sql) or die(mysql_error());

$musicdesc = array();

for($i = 0; $row = mysql_fetch_array($res); $i++) {
	$musicdesc[$i]["Title"] 	= $row['title'];
	$musicdesc[$i]["Extra"] 	= $row['extra'];
	$musicdesc[$i]["Year"] 		= $row['year'];
	$musicdesc[$i]["Ldate"]		= $row['ldate'];
	$musicdesc[$i]["File"] 		= $dir . rawurlencode(utf8_encode($row['file']));
	$musicdesc[$i]["Downloads"] = $row['downloads'];

	$musicdesc[$i]["Filetype"]	= substr(strtolower(strrchr($row['file'], ".")), 1);
	$musicdesc[$i]["Filesize"] 	= filesize($dir . $row['file']);


}


?>