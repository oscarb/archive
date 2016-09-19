<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');



// LOAD...
require_once 'curl_get_contents.php';
require_once 'iCalReader.php';
require_once 'courseinfo.php';
require_once 'functions.php';


$ALLEVENTS = array();

// A standard vCalendar file has an extension of .vcs and MIME type of text/x-vCalendar.
// If you use iCalendar, the MIME type is "text/Calendar" and the extension is .ics.

header("Content-Type: text/plain; charset=iso-8859-1");
//header("Content-Disposition: attachment; filename=schema.ics");


// Make cache...
// =0D=0A=  line-break

// Load CL5 calendars...
// http://schema.sys.kth.se/4DACTION/iCal_downloadReservations/timeedit.ics?from=1034&to=1050&id1=17022000&id2=27808000&id3=18446000&branch=8&lang=1
// VT11: http://schema.sys.kth.se/4DACTION/iCal_downloadReservations/timeedit.ics?from=1101&to=1121&id1=16072000&id2=17523000&id3=29326000&id4=20510000&id5=20512000&id6=17436000&branch=8&lang=1
// HT11: http://schema.sys.kth.se/4DACTION/iCal_downloadReservations/timeedit.ics?from=1134&to=1202&id1=17022000&id2=18446000&id3=17523000&id4=19336000&branch=8&lang=1
$ical = new iCalReader('http://schema.sys.kth.se/4DACTION/iCal_downloadReservations/timeedit.ics?from=1202&to=1223&id1=17436000&branch=8&lang=1');

$meta = $ical->getMeta();
$events = $ical->getEvents();
parseTimeEdit($events);


//print_r($events);
// Load additional calendars...



// Add extra info
if(isset($extra))
	addExtras($extra);

// Sort
foreach($ALLEVENTS as $course => $moment)
	ksort($ALLEVENTS[$course]);


// Add meta data and remove bugs
$meta['X-WR-CALNAME'] = "KTH Schema CL5MADA HT11 v35-2";
unset(	$meta['BEGIN'],
		$meta['END'],
		$meta['TZID'],
		$meta['DTSTART'],
		$meta['TZOFFSETTO'],
		$meta['TZOFFSETFROM'],
		$meta['TZNAME']
		);

//print(file_get_contents('http://schema.sys.kth.se/4DACTION/iCal_downloadReservations/timeedit.ics?from=903&to=922&id1=14660000&branch=1&lang=1'));



/*filterEvents("UQK700");
filterEvents("UCK700");

filterEvents("SF1633");
filterEvents("SF1637");*/
filterEvents("DD2385");





// Made by Oscar Björkman 2009-02-02
// Updated for HT11 2011-09-18
?>