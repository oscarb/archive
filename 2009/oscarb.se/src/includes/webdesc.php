<?php

// FUNCTIONS

function cmpdater($a, $b) {
	return strtotime($b['ldate']) - strtotime($a['ldate']);
}



// WEB


$dir = 'web/';
$webFiles = Array();

if(is_dir($dir)){
	if ($handle = opendir($dir)) {

	    /* This is the correct way to loop over the directory. */
	   while (false !== ($file = readdir($handle))) {
	        if ($file != "." && $file != ".." && substr($file, 0, 1) != "_") {
	           	//echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
	            $webFiles[] = $file;
	        }
	    }

	    closedir($handle);
	}
}

sort($webFiles);


// DESCRIPTIONS FOR ART

$webdesc = array();

$i = 0;

// IF Södernissarna
$webdesc[$i]['title'] 	= 'IF Södernissarna';
$webdesc[$i]['href'] 	= 'http://www.sodernissarna.se';
$webdesc[$i]['row1'] 	= '&bull; 2007 &bull; Design &bull; XHTML, JavaScript, CSS, AJAX, PHP, MySQL, RSS, iCal';//'&bull; 2007-2008 &bull; Design &bull; <dfn title="XHTML, JavaScript, CSS, AJAX, PHP, MySQL, RSS, iCal">Code</dfn>';
$webdesc[$i]['row2'] 	= 'Official site for swedish floorball team IF Södernissarna.';
$webdesc[$i]['img'] 	= 'ifs';
$webdesc[$i]['ldate'] 	= '2007-09-11';
$i++;

// Arva Trading AB
$webdesc[$i]['title'] 	= 'Arva';
$webdesc[$i]['href'] 	= 'http://www.arva.se';
$webdesc[$i]['row1'] 	= '&bull; 2006-2007 &bull; HTML, CSS, JavaScript';//'&bull; 2006-2007 &bull; <dfn title="HTML, CSS, JavaScript">Code</dfn>';
$webdesc[$i]['row2'] 	= 'Swedish supplier of top-end pro audio equipment.';
$webdesc[$i]['img'] 	= 'arva';
$webdesc[$i]['ldate'] 	= '2007-03-07';
$i++;

// C-Zone
/*
$webdesc[$i]['title'] 	= 'C-Zone';
$webdesc[$i]['href'] 	= '-';
$webdesc[$i]['row1'] 	= '&bull; 2002-2005 &bull; Design &bull; Code (HTML, JavaScript, PHP, MySQL)';
$webdesc[$i]['row2'] 	= 'Swedish internet community online 2004-2005.';
$webdesc[$i]['img'] 	= 'c-zone';
$webdesc[$i]['ldate'] 	= '2004-12-11';
$i++;
*/

// Dream Zone
/*
$webdesc[$i]['title'] 	= 'Dream Zone';
$webdesc[$i]['href'] 	= '-';
$webdesc[$i]['row1'] 	= '&bull; 2005-2006 &bull; Design &bull; Code';
$webdesc[$i]['row2'] 	= 'Personal portfolio and related music site.';
$webdesc[$i]['img'] 	= 'dreamzone';
$webdesc[$i]['ldate'] 	= '2005-11-01';
$i++;
*/

// Fabbelous
$webdesc[$i]['title'] 	= 'Fabbelous';
$webdesc[$i]['href'] 	= 'http://www.fabbelous.com';
$webdesc[$i]['row1'] 	=  '&bull; 2008 &bull; HTML, CSS, JavaScript';//'&bull; 2008 &bull; <dfn title="HTML, CSS, JavaScript">Code</dfn>';
$webdesc[$i]['row2'] 	= 'Illustrations and art by illustrator Eva Bergstrom.';
$webdesc[$i]['img'] 	= 'fabbelous';
$webdesc[$i]['ldate'] 	= '2008-08-26';
$i++;

// IF Södernissarna OLD
/*
$webdesc[$i]['title'] 	= 'IF Södernissarna 2001-2006';
$webdesc[$i]['href'] 	= '-';
$webdesc[$i]['row1'] 	= '&bull; 2001-2006 &bull; Design &bull; Code';
$webdesc[$i]['row2'] 	= 'Previous site for swedish floorball team IF Södernissarna.';
$webdesc[$i]['img'] 	= 'ifsOld';
$webdesc[$i]['ldate'] 	= '2001-09-01';
$i++;
*/

// KAOS
/*
$webdesc[$i]['title'] 	= 'KAOS';
$webdesc[$i]['href'] 	= '-';
$webdesc[$i]['row1'] 	= '&bull; 2004 &bull; Design &bull; Code';
$webdesc[$i]['row2'] 	= 'Theater performance written by a good friend of mine.';
$webdesc[$i]['img'] 	= 'kaos';
$webdesc[$i]['ldate'] 	= '2004-02-07';
$i++;
*/

// Södra Orienten
$webdesc[$i]['title'] 	= 'Södra Orienten';
$webdesc[$i]['href'] 	= 'http://www.sodraorienten.se';
$webdesc[$i]['row1'] 	=  '&bull; 2008 &bull; Design &bull; Photos &bull; HTML, CSS, PHP';//'&bull; 2008 &bull; Design &bull; <dfn title="HTML, CSS">Code</dfn> &bull; Photos';
$webdesc[$i]['row2'] 	= 'Swedish restaurant with Lebanese, Turkish and Greek food.';
$webdesc[$i]['img'] 	= 'sodraorienten';
$webdesc[$i]['ldate'] 	= '2008-08-27';
$i++;

// Fabula Storytelling
$webdesc[$i]['title'] 	= 'Fabula Storytelling';
$webdesc[$i]['href'] 	= 'http://storytelling.se';
$webdesc[$i]['row1'] 	=  '&bull; 2011 &bull; CMS (Concrete5)';
$webdesc[$i]['row2'] 	= 'Swedish company with storytelling at heart.';
$webdesc[$i]['img'] 	= 'storytelling';
$webdesc[$i]['ldate'] 	= '2011-09-02';
$i++;



usort($webdesc, "cmpdater");

//shuffle($webdesc);

?>