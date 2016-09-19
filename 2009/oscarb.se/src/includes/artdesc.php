<?php

// ART FILES

//
// FUNCTIONS
//

function filename($filename)
{
    $pos = strrpos($filename, '.');
    if ($pos === false)
    { // dot is not found in the filename
        return $filename; // no extension
    }
    else
    {
        $basename = substr($filename, 0, $pos);
        $extension = substr($filename, $pos + 1);
        return $basename;
    }
}

function extension($filename) {
	$pos = strrpos($filename, '.');
	if ($pos === false)
		return false;
	else
		return strtolower(substr($filename, $pos + 1));
}

function allhtmlentities($string) {
    return preg_replace('/[^\x00-\x7F]/e', '"&#".ord("$0").";"', $string);
}



//
// ART DESCRIPTION
//


$artSupportedFiletypes = array("jpg", "png", "gif");


// DESCRIPTIONS FOR ART

$artdesc = array();

// ART 	  Filename					  Title										Modification time

$artdesc['c-zone'] = 			array("C-Zone - Community online 2004-2005", "2004-12-11");
$artdesc['cd_missforstadd'] =	array("Album: Missförstådd (2004)", "2004-12-24");
$artdesc['cd_onestep'] = 		array("Single: One Step (2008)", "2008-05-10");
$artdesc['cpuman'] = 			array("Computer Man", "2008-02-10");
$artdesc['dreamzone'] = 		array("Dream Zone", "2002-11-14");
$artdesc['hand'] = 				array("Hand", "2006-06-12");
$artdesc['ifslogos'] = 			array("IF Södernissarna logotype", "2007-09-11");
$artdesc['kitchen'] = 			array("Art in kitchen", "2004-07-22");
$artdesc['lamp'] = 				array("Art in lamp", "2006-01-30");
$artdesc['manga'] = 				array("Manga (2003)", "2003-11-08");
$artdesc['mario'] = 				array("Super Mario Statue", "2004-07-22");
$artdesc['master'] = 			array("Master Art", "2004-09-02");
$artdesc['masterlock'] = 		array("Master Art 2", "2004-09-03 12:43");
$artdesc['mesushi'] = 			array("Photo by Pelle Piano http://www.studiobild.com", "2007-07-29");
$artdesc['onestepb'] = 			array("One Step", "2006-06-02");
$artdesc['oneupthewall'] = 	array("One Up The Wall", "2007-08-09");
$artdesc['oscar06'] = 			array("old oscar logotype", "2003-08-04");
$artdesc['oscarb08'] = 			array("oscarb logotype", "2008-10-13");
$artdesc['paq'] = 				array("paq", "2005-07-29");
$artdesc['play'] = 				array("Play Art", "2004-09-02");
$artdesc['referee'] = 			array("Photo by Mark Elert", "2007-10-13");
$artdesc['sign'] = 				array("Signature Simplified", "2006-06-20");
$artdesc['simplicity'] = 		array("Simplicity", "2005-01-23");
//$artdesc['theartofspeed'] = 	array("The Art of Speed 1280x1024", "2007-03-12");
$artdesc['onestepw'] =	 		array("Two Steps", "2006-06-02");

$artdesc['4soundad'] =	 		array("4Sound Ad", "2007-08-03");
$artdesc['4soundxmas07'] =	 	array("4Sound Christmas Special 2007", "2007-10-29");

$artdesc['walkingaway'] =	 	array("Walking Away From Me", "2006-06-02");
$artdesc['aircity'] =	 		array("Air City", "2003-02-28");

$artdesc['marwall'] =	 		array("Brown Eyes 1280x1024", "2006-07-04");
$artdesc['cokewindow'] =	 	array("there's a coke in my window", "2008-07-19");

$artdesc['fishstreet'] =	 	array("Where is the fish?", "2005-08-08");
$artdesc['whoami'] =		 		array("Who am I?", "2007-09-11");
$artdesc['rainday'] =		 	array("it can't rain everyday", "2008-07-18");

$artdesc['extralife'] =		 	array("Framed - 3 entries in EXTRALIFE logo contest at http://myextralife.com", "2008-05-23");
$artdesc['superschema'] =		array("Super Schema - School chart web concept", "2008-10-15");

$artdesc['whoisshe'] =			array("who is she?", "2009-01-31");
$artdesc['acmicpc2009'] =		array("ACM ICPC 2009 - TV graphics for ICPC Live, shown online and on swedish Axess TV", "2009-04-21");
$artdesc['mii'] =					array("Mii playing table tennis in the summer of 2009", "2009-10-04");
$artdesc['sahra'] =				array("SAHRA logotype alternative - Original design and idea by Malin Holm", "2010-01-12");

$artdesc['html5'] =				array("HTML5 is coming", "2010-03-11");
$artdesc['godjul2010'] =		array("God Jul / Merry Christmas 2010", "2010-12-24");


$artdesc['collection'] =		array("Collage 2011", "2011-10-13");
$artdesc['streetpasslovestory'] =		array("a StreetPass love story", "2011-08-25");
$artdesc['sunglasses'] =		array("Sunglasses makes everything look cooler", "2011-05-28");
$artdesc['archipelago'] =		array("Stockholm archipelago seen from Försöket", "2011-08-21");
$artdesc['hybris'] =		array("Hybris", "2011-07-14");

$artdesc['godjul2011'] =		array("God Jul / Merry Christmas 2011", "2011-12-24");



array_walk($artdesc, create_function('&$v, $k', '$v[0] = htmlentities($v[0], ENT_QUOTES);'));



//
// LOAD FILES
//

$size = "80x60";
$dir = 'art/';
$files = Array();

if(is_dir($dir)){
	if ($handle = opendir($dir)) {

	    /* This is the correct way to loop over the directory. */
	   while (false !== ($file = readdir($handle))) {

	   		// What files can there be...
			if(in_array(extension($file), $artSupportedFiletypes) && $file[0] != "_" ) {

	            // Modification time...
				if($artdesc[filename($file)][1]) {
					$time = strtotime($artdesc[filename($file)][1]);
					if (array_key_exists($time, $files))
						$time++;

					$files[$time] = $file;

				} else {
					$files[filemtime($dir . $file)] = $file;
				}

	        }
	    }
	    closedir($handle);
	}
}


krsort($files);

$artfiles = array_values($files);

//shuffle($files);


?>