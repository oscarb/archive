<?php

// FUNCTIONS


/*
 * - 1 -
*/

// Parse TimeEdit iCalendar to course data
function parseTimeEdit($ical_events) {

	global $ALLEVENTS;

	foreach($ical_events as $event):

		// Separera anmärkning från övrigt
		@list($details, $comment) = explode('#', $event['SUMMARY']);

		// Kurs, Kursomg, Moment
		@list($courses, $moment) = explode('\n', $details);


		// Flera kurser?
		$courses = explode('\, ', $courses);
		//array_walk($courses, create_function('&$v, $k', '$v = explode(".", $v);'));
		//$coursestring = implode(", ", array_map(create_function('$a', 'return $a[0];'), $courses));	// Till printfn
		//print_r($courses);
		$coursename = $courses[0];

		// Konvertera anmärkning till ISO-8859-1
		$comment = str_replace("\r\n ", "", utf8_decode($comment));
		//$comment = str_replace("\r\n ", "", $comment);

		$location = "";
		// Om inte sal finns, leta i anmärkning
		if(isset($event['LOCATION'])):
			$location = str_replace('\, ', ', ', utf8_decode($event['LOCATION']));
		elseif($comment):
			preg_match_all('/\p{Lu}\d{2,3}/', $comment, $matches);
			//print_r($matches);
			$location = implode(", ", $matches[0]);
		endif;

		// Hämta tid
		$datestart = $event['DTSTART;TZID=Europe/Stockholm'];
		preg_match('/(\d{4})(\d{2})(\d{2})T(\d{2})(\d{2})(\d{2})Z?/', $datestart, $matches);
		$datestart = strtotime(sprintf("%04d-%02d-%02d %02d:%02d:%02d", $matches[1], $matches[2], $matches[3], $matches[4], $matches[5], $matches[6]));

		$dateend = $event['DTEND;TZID=Europe/Stockholm'];
		preg_match('/(\d{4})(\d{2})(\d{2})T(\d{2})(\d{2})(\d{2})Z?/', $dateend, $matches);
		$dateend = strtotime(sprintf("%04d-%02d-%02d %02d:%02d:%02d", $matches[1], $matches[2], $matches[3], $matches[4], $matches[5], $matches[6]));


		// Lägg till extra
		$extra = "";
		if (@isset($extra[$courses[0][0]][$datestart])):
			$extra .= $extra[$courses[0][0]][$datestart];
		endif;

		//printf("--- \nTime: %s \nCourse: %s \nGroup: %s \nRound: %s \nType: %s\nComments: %s\nLocation: %s\n", $datestart, $coursestring, $courses[0][1], $round, $moment, $comment, $location);

		// Spara i global
		$ALLEVENTS[$coursename][$datestart] = array('datestart'		=> $datestart,
													'dtstart' 		=> $event['DTSTART;TZID=Europe/Stockholm'],
													'dtend'	  		=> $event['DTEND;TZID=Europe/Stockholm'],
													'uid'	  		=> $event['UID'],
													'dtstamp' 		=> $event['DTSTAMP'],
													'courses' 		=> $courses,
													//'course'		=> @$courses[0][0],
													//'group'			=> @$courses[0][1],
													'moment'		=> $moment,
													'comment'		=> $comment,
													'location'		=> $location,
													'extra'			=> $extra
													);

		//ksort($ALLEVENTS[$coursename]);
		//unset($event['LOCATION']);

	endforeach;

}


/*
 * - 2 -
*/

// Add Extra info to TimeEdit data from user info
function addExtras($extra) {
	global $ALLEVENTS;

	// Gå igenom och lägg till...
	foreach($extra as $coursename => $data) {
		foreach($data as $time => $info) {
			$info = strtr($info, array("\r\n" => '\n', "\n" => '\n', "\r" => '\n', "\t" => ""));
			$key = strtotime($time);
			if(isset($ALLEVENTS[$coursename][$key])) {
				$ALLEVENTS[$coursename][$key]['extra'] = $info;
				if (strlen($ALLEVENTS[$coursename][$key]['location']) < 3) {
					preg_match_all('/\p{Lu}\d{2,3}/', $info, $matches);
					$ALLEVENTS[$coursename][$key]['location'] = implode(", ", $matches[0]);
				}
			}
		}
	}
}






/*
 * - 3 -
*/

// Print iCalendar Event from TimeEdit data
function TimeEditEventToCalendar ($e) {
	global $coursenames;
	global $filterCourse;
	global $moments;
	
	if(array_key_exists($e['courses'][0], $filterCourse))
		if(!in_array($e['moment'], $filterCourse[$e['courses'][0]]))
			return;

// 	if($e['moment'] != $filterCourse[$e['courses'][0]])


	printf("BEGIN:VEVENT\r\n");
	//printf("DTSTART;TZID=Europe/Stockholm:%s\r\n", date("Ymd\THis", $e['dtstart']));
	//printf("DTEND;TZID=Europe/Stockholm:%s\r\n", date("Ymd\THis", $e['dtend']));

	printf("DTSTART;TZID=Europe/Stockholm:%s\r\n", $e['dtstart']);
	printf("DTEND;TZID=Europe/Stockholm:%s\r\n", $e['dtend']);


	print ($e['uid']) ? "UID:{$e['uid']}\r\n" : "";
	print ($e['dtstamp']) ? "DTSTAMP:{$e['dtstamp']}\r\n" : "";
	printf("LOCATION:%s\r\n", $e['location']);

	printf("SUMMARY:");

	
	// "SF2717, SF2719" => "Ma Historia, Ma Födrjupning"
	$coursename = str_replace(array_keys($coursenames), $coursenames, implode(", ", $e['courses'])); 

	// OLD CODE
	/*
	$coursename = $e['courses'][0];
	foreach($e['courses'] as $course)
		if(isset($coursenames[$course]))
			$coursename = $coursenames[$course];
	*/
	

	//$coursename = utf8_encode($coursename);
	print (isset($e['extra'][0]) && $e['extra'][0] == "*") ? "* " . $coursename : $coursename; 	// * Databasteknik
	//print ($e['group']) ? " (" . strtoupper($e['group']) . ") " : " ";	// (C-D)
	print (isset($moments[$e['moment']])) ? " " . $moments[$e['moment']] : " " . $e['moment']; 	// Frl
	print "\r\n";

	printf("DESCRIPTION:");
	//$e['extra'] = utf8_encode($e['extra']);
	print ($e['extra'] && $e['extra'][0] == "*") ? substr($e['extra'], 2) . '\n' : $e['extra'] . '\n';
	print $e['comment'];
	print "\r\n";

	printf("END:VEVENT\r\n");

}


// View specific events...

function filterEvents($course, $moment = false) {
	global $ALLEVENTS;

	if (isset($ALLEVENTS[$course]))
		foreach ($ALLEVENTS[$course] as $event)
			if($moment == false || ($moment && $event['moment'] == $moment)):
				printf("\$extra['%s']['%s'] = ''; ", $course, date("Y-m-d H:i", $event['datestart']), $event['comment']);
				print ($event['comment']) ? "// " . $event['comment'] . "\n" : "\n";
			endif;
}

?>