<?php
header('Content-type: text/html; charset=iso-8859-1');

// LAUNCH
$domain = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/";


// ACCESS GRANTED FOR OSCAR B
/*
if($_SERVER['SERVER_NAME'] != "localhost" && !isset($_GET['backdoor'])) {
	header("Location: http://oscarb.se.roadrunner.kontrollpanelen.se/index.php");
	exit;
}
*/

// Database Connection
include('includes/conn.php');

// ART
include('includes/artdesc.php');
$artTotal = count($files);
$ipp = 5;	// images per page
$artPages = ceil($artTotal/$ipp);

// WEB
include('includes/webdesc.php');
$webTotal = count($webdesc);

// MUSIC
include('includes/musicdesc.php');
$musicTotal = count($musicdesc);

// SPECIAL EVENTS
$holiday['2009-03-28'] = "earthhour";
$holiday['2011-03-26'] = "earthhour";
$holiday['2012-03-31'] = "earthhour";


$daydir = (array_key_exists(date("Y-m-d"), $holiday)) ? $holiday[date("Y-m-d")] . "/" : "";

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://www.w3.org/2005/10/profile">

<title>oscarb.se - Personal portfolio for Oscar B, aka paq</title>

<script type="text/javascript">/*<![CDATA[*/document.documentElement.className="hasJS"/*]]>*/</script>
<meta name="description" content="Art, Music and Web by Oscar B" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href="images/favicon.gif" />
<link rel="alternate" type="application/rss+xml" href="art.rss" title="oscarb.se - Art RSS 2.0" id="gallery" />
<link rel="alternate" type="application/rss+xml" href="music.rss" title="oscarb.se - Music RSS 2.0" />
<link rel="alternate" type="application/rss+xml" href="web.rss" title="oscarb.se - Web RSS 2.0" />
<link rel="stylesheet" type="text/css" href="<?= $daydir ?>style.css" media="screen" />
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="iesucks.css" media="screen" />
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="ie6sucks.css" media="screen" />
<![endif]-->
<style type="text/css">
/* Hide content when JavaScript is disabled */
/* Also avoids flash of non yet hidden elements */
/* Source: http://www.websemantics.co.uk/resources/useful_css_snippets */

<?php

// PAGE SELECTOR
// ART
$artPageSelector = "&bull; ";
for($i = 2; $i <= $artPages; $i++)
		$artPageSelector .= '<a href="#" onclick="changePage(' . $i . ', \'art\'); return false;">&bull; </a>';

// WEB
$webPageSelector = "&bull; ";
for($i = 2; $i <= $webTotal; $i++)
		$webPageSelector .= '<a href="#" onclick="changePage(' . $i . ', \'web\'); return false;">&bull; </a>';

// MUSIC
$musicPageSelector = "&bull; ";
for($i = 2; $i <= $musicTotal; $i++)
		$musicPageSelector .= '<a href="#" onclick="changePage(' . $i . ', \'music\'); return false;">&bull; </a>';


// DISPLAY PAGES WHEN JAVASCRIPT IS DISABLED
// ART
for($i = 2; $i <= $artPages; $i++ )
	$a[] = ".hasJS #a" . $i;

// WEB
for($i = 2; $i <= $webTotal; $i++ )
	$w[] = ".hasJS #w" . $i;

// MUSIC
for($i = 2; $i <= $musicTotal; $i++ )
	$m[] = ".hasJS #m" . $i;

echo implode(array_merge($a, $w, $m), ", ") . " { \n\t display: none; \n}\n ";

?>

</style>
<script type="text/javascript">
/* Load data about content length from server side using PHP */

function loadData() {
	window.artPage = 1;
	window.webPage = 1;
	window.musicPage = 1;

	window.artPages = <?= $artPages ?>;
	window.webPages = <?= $webTotal; ?>;
	window.musicPages = <?= $musicTotal ?>;

	window.artImagesPerPage = <?= $ipp ?>;
}


<?php
// Shadowbox img loader 1.0
if (isset($_GET['art']) && array_search($_GET['art'], $artfiles) !== false) {
	echo "function ShadowboxMediaLoader() {\n\t";
	echo "Shadowbox.open(document.getElementById('art_" . filename($_GET['art']) . "')); \n";
	echo "}";

} elseif (isset($_GET['web']) && array_search_recursive($_GET['web'], $webdesc)) {
	$key = array_search_recursive($_GET['web'], $webdesc);
	echo "function ShadowboxMediaLoader() {\n\t";
	echo "Shadowbox.open(document.getElementById('web_" . $_GET['web'] . "')); \n\t";
	echo "changePage(" . ($key[0] + 1) . ", 'web');\n";
	echo "}";

} elseif (isset($_GET['music']) && array_search_recursive($_GET['music'], $musicdesc)) {
	$key = array_search_recursive($_GET['music'], $musicdesc);
	echo "function ShadowboxMediaLoader() {\n\t";
	echo "changePage(" . ($key[0] + 1) . ", 'music');\n";
	echo "}";

} else {
	echo "function ShadowboxMediaLoader() {\n\t";
	echo "return false;\n";
	echo "}\n";

}
?>

</script>
<!-- JavaScript Behaviour functions -->
<script type="text/javascript" language="JavaScript" src="includes/behavior.js"></script>
<!-- Audio Player -->
<script type="text/javascript" language="JavaScript" src="includes/audio-player/audio-player.js"></script>
<!-- SHADOWBOX 2.0 -->
<script type="text/javascript" language="JavaScript" src="includes/shadowbox-2.0/src/adapter/shadowbox-base.js"></script>
<script type="text/javascript" language="JavaScript" src="includes/shadowbox-2.0/src/shadowbox.js"></script>
<!-- Settings for Shadowbox and Audio Player -->
<script type="text/javascript" language="JavaScript" src="includes/mediasettings.js"></script>
<?php
// Override Audio Player settings...
if(array_key_exists(date("Y-m-d"), $holiday)): ?>
<script type="text/javascript">
AudioPlayer.setup("includes/audio-player/player.swf", {
			width: 420,
			initialvolume: 100,
			transparentpagebg: "yes",

			bg:					"000000",
			leftbg:				"000000",
			lefticon:			"204877",
			voltrack:			"171717",
			volslider:			"204877",
			rightbg:			"b1b0b0",
			rightbghover:		"229451",
			righticon:			"000000",
			righticonhover:		"000000",
			loader:				"229451",
			track:				"000000",
			tracker:			"171717",
			border:				"000000",
			skip:				"536880",
			text:				"b1b0b0"

});
</script>
<?php endif; ?>

</head>

<body>

<!-- Site content -->
<div id="wrapper">
<div id="pagediv">

<!-- Logotype -->
<h1>oscarb.se</h1>
<img src="<?= $daydir ?>images/logo.jpg" alt="oscarb.se logotype" id="logotype" />

<?php
// <!-- oscarb.se one year older -->
if(date("md") == "1013")
	echo '<img src="images/oneyearolder.png" title="oscarb.se - Happy birthday to me!" alt="oscarb.se - Happy birthday to me!" id="oneyearolder" />';
?>

<?php
// TRY SEARCHING FOR FACEBOOK BOT
// facebookexternalhit/1.0 (+http://www.facebook.com/externalhit_uatext.php)
if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "facebook") !== false):
?>
<!-- Facebook Thumbnail -->
<img src="art/80x60/oscarb08.jpg" alt="oscarb.se logotype (Facebook thumbnail)" id="fbthumb" />
<? endif; ?>

<!-- ART  -->

<div id="art">
	<h2>Art</h2>
	<div class="count"><?= $artPageSelector ?></div>
	<div class="navi"><a href="#" onclick="nextPage('art'); return false;">next &gt;&gt;</a></div>
	<?php
	// CREATE IMAGE GALLERY

	for($j = 1; $j <= $artPages; $j++) {

		echo '<div id="a' . $j . '" class="content">' . "\n\t\t";

		for($i = ($j - 1)*$ipp; $i < $ipp*$j; $i++) {
			if ($i >= $artTotal)
				break;

			$f = $artfiles[$i];	// Get array of image files

			// If image has description - write it out, else echo filename
			echo ($artdesc[filename($f)][0]) ? "<a rel=\"shadowbox[Art]\" id=\"art_" . filename($f) . "\" href=\"art/" . $f ."\" title=\"" . $artdesc[filename($f)][0] . "\">" : "<a rel=\"shadowbox[Art]\" id=\"art_" . filename($f) . "\" href=\"art/" . $f ."\" title=\"" . $f . "\">";
			echo ($artdesc[filename($f)][0]) ? "<img src=\"art/80x60/" . $f . "\" alt=\"" . $artdesc[filename($f)][0] . "\" />": "<img src=\"art/80x60/" . $f . "\" alt=\"" . $f . "\" />";
			echo '<span class="mbf-item"> #gallery ' . filename($f) . ' <br /></span>';
			echo '</a>';

		}

		echo "\n\t</div>\n\t";
	}
?>

</div>


<!-- WEB  -->

<div id="web">
	<h2>Web</h2>
	<div class="count"><?= $webPageSelector ?></div>
	<div class="navi"><a href="#" onclick="nextPage('web'); return false;">next &gt;&gt;</a></div>
	<?php
	// WEB

	for($i = 0; $i < $webTotal; $i++) {
		echo '<div id="w' . ($i + 1) . '" class="content">' . "\n";


		// Get first thumbnail
		echo "\t\t";
		echo '<a rel="shadowbox[' . $webdesc[$i]['img'] . ']" class="thumbnail" href="web/' . $webdesc[$i]['img'] . '-1.jpg" title="' . $webdesc[$i]['title'] . '" id="web_'. $webdesc[$i]['img'] .'">';
		echo '<img src="web/thumbs/' . $webdesc[$i]['img'] . '.jpg" alt="' . $webdesc[$i]['title'] . '" width="100" height="75" />';
		echo '</a>';
		echo "\n";

		// More pictures
		foreach($webFiles as $f) {
			if(substr(filename($f), 0, strrpos($f, '-')) == $webdesc[$i]['img'] && substr(filename($f), strrpos($f, '-') + 1) != "1"):
				echo "\t\t";
				echo '<a rel="shadowbox[' . $webdesc[$i]['img'] . ']" class="hidden" href="web/' . $f . '" title="' . $webdesc[$i]['title'] . '">' . substr(filename($f), strrpos($f, '-') + 1) . '</a>';
				echo "\n";
			endif;
		}

		// Information
		echo "\t\t";
		echo '<h3>' . $webdesc[$i]['title'] . '</h3>';
		echo "\n\t\t";
		echo ($webdesc[$i]['href'] != "-") ? '<h4><a href="' . $webdesc[$i]['href'] . '" target="_blank">' . $webdesc[$i]['href'] . '</a></h4>' : '<h4>URL not available</h4>';
		echo "\n\t\t";
		echo '<p>' . $webdesc[$i]['row1'] . '</p>';
		echo "\n\t\t";
		echo '<p>' . $webdesc[$i]['row2'] . '</p>';
		echo "\n\t";
		echo '</div>';

		echo "\n\t";
		echo '<div style="clear:both;"></div>';
		echo "\n\t";

	}
	?>

</div>


<!-- MUSIC  -->

<div id="music">
	<h2>Music</h2><div class="count"><?= $musicPageSelector ?></div>
	<div class="navi"><a href="#" onclick="nextAudioPlayer();  return false;">next &gt;&gt;</a></div>
	<?php

	// MUSIC
	for($i = 0; $i < $musicTotal; $i++) {
		echo '<div id="m' . ($i + 1) . '" class="content">';

		echo "\n\t\t";
		printf("<h3>%s</h3>\n\t\t", $musicdesc[$i]["Title"]);
		printf("<h4>%d &bull; Download <a href=\"download.php?music=%s\" title=\"Downloads: %d &bull; Size: %s \">%s</a>",
				$musicdesc[$i]["Year"], urlencode($musicdesc[$i]["Title"]), $musicdesc[$i]["Downloads"], format_size($musicdesc[$i]["Filesize"]), strtoupper($musicdesc[$i]["Filetype"]));

		echo ($musicdesc[$i]["Filetype"] != "zip") ? " &bull; View <a href=\"download.php?lyrics=" . urlencode($musicdesc[$i]["Title"]) . "\" rel=\"shadowbox;width=550\" title=\"Lyrics: " . $musicdesc[$i]["Title"] . "\">Lyrics</a>" : "";
		echo ($musicdesc[$i]["Extra"] != "") ? " &bull; " . $musicdesc[$i]["Extra"] : "";
		echo "</h4>";
		echo "\n\t\t";

		echo "<div id=\"audioplayer_" . ($i + 1) . "\">&nbsp;</div>\n\t";
		echo "</div>\n\t";

	}

	// Embed audioplayers...
	echo "\n\t<script type=\"text/javascript\" language=\"JavaScript\">";
	for($i = 0; $i < $musicTotal; $i++) {
		echo "\n\tAudioPlayer.embed(\"audioplayer_" .  ($i + 1) . "\", {";
		echo ($musicdesc[$i]["Filetype"] != "zip") ? "soundFile: \"" . $musicdesc[$i]["File"] . "\"});" : "soundFile: \"" . $msfrstdPreview . "\"});";
		}
	echo "\n\t</script>\n\n\t";

	echo "<noscript><p>Enable JavaScript to play media directly in your browser.</p></noscript>\n\n";

	?>
</div>


<!-- ME  -->
<?php

// How old am I?
$birth = strtotime("1987-10-13 09:04:00");
$now = time(); //strtotime("2008-10-14 18:00:00");

$years = date("Y", $now) - date("Y", $birth);
$years = (date("m", $now) > date("m", $birth) || date("m", $now) == date("m", $birth) && date("d", $now) >= date("d", $birth)) ? $years : $years - 1;

// Birthday tomorrow, today or any other day?
if($now >= mktime(0, 0, 0, date("m", $birth), date("d", $birth) - 1, date("Y", $now)) && $now < mktime(0, 0, 0, date("m", $birth), date("d", $birth), date("Y", $now))) {
	$suffix = "tomorrow!";
	$years++;
} elseif ($now >= mktime(0, 0, 0, date("m", $birth), date("d", $birth), date("Y", $now)) && $now < mktime(0, 0, 0, date("m", $birth), date("d", $birth) + 1, date("Y", $now))) {
	$suffix = "today!";
} else {
	$suffix = "old.";
}

// What is my mail?
$email = "oscarb@oscarb.se";
$emailCoded = "";

for($i = 0; $i < strlen(trim($email)); $i++) {
	$emailCoded .= "&#" . ord($email{$i}) . ";";
}

?>
<div id="me">
	<h2>Me</h2>
	<img src="<?= $daydir ?>images/sign.gif" id="signature" alt="Signature" />
	<div class="content">
		<h3><?=sprintf("Oscar B. %d years %s Stockholm, Sweden.", $years, $suffix) ?></h3>
		<p>Contact me at <?= $emailCoded ?></p>
		<div class="copy">&copy; oscarb.se <?=date("Y")?></div>
	</div>
</div>


<!--

oscarb.se - Personal portfolio for Oscar B, also known as paq
http://www.oscarb.se
Version 8.1.1

 # CHANGELOG
 * 2011-09-30 version 8.2
 - Updated signature, sign.gif
 - Updated visual representation of .count with bullets

 * 2010-01-24 version 8.1.1
 - Fixed MySQL problem with http://oscarb.se

 * 2010-01-24 version 8.1
 - Fixed art.php -> art.rss
 - Fixed Shadowbox issue in IE8
 - Added "one year older" picture
 - Fixed oscarb.se.roadrunner.kontrollpanelen.se -> oscarb.se

 * 2009-03-27 version 8.0.2
 - Earth Hour Day

 * 2009-02-28 version 8.0.1
 - Added _blank to WEB links
 - Added Facebook compability: meta description and thumbnail

 # About this site...

 Browers used for testing during development:
 * Mozilla Firefox 3.0.5
 * Mozilla Firefox 3.5.7
 * Google Chrome 1.0.154.43
 * Google Chrome 4.0.249.78
 * Safari 3.2.1
 * Opera 9.63
 * Internet Explorer 6.0
 * Internet Explorer 7.0
 * Internet Explorer 8.0

 Platform: Windows XP Home SP2

 # The site is valid...

 * XHTML 1.0 Transitional
 - http://validator.w3.org/check?uri=http%3A%2F%2Fwww.oscarb.se

 * Media RSS 2.0
 - http://validator.w3.org/feed/check.cgi?url=http%3A//www.oscarb.se/art.rss
 - http://validator.w3.org/feed/check.cgi?url=http%3A//www.oscarb.se/music.rss
 - http://validator.w3.org/feed/check.cgi?url=http%3A//www.oscarb.se/web.rss

 * CSS level 2.1
 - http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fwww.oscarb.se%2Fstyle.css&profile=css21&usermedium=all&warning=1
 - http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fwww.oscarb.se%2Fiesucks.css&profile=css21&usermedium=all&warning=1
 - http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fwww.oscarb.se%2Fie6sucks.css&profile=css21&usermedium=all&warning=1


 # The site supports...

 * Cooliris 1.9 (formerly known as PicLens)
 - http://cooliris.com/

 * Shadowbox 2.0
 - http://www.mjijackson.com/shadowbox/

 * WordPress Audio Player 2.0 beta 6
 - http://wpaudioplayer.com/

 * Facebook Link Embedding
 - http://www.facebook.com/externalhit_uatext.php

 * JavaScript disabled

 # Thanks goes to...

 * J
 - http://freethinc.wordpress.com/


 Oscar B
 www.oscarb.se

-->

<?php
include('includes/analytics.php');
?>

</div> <!-- PAGEDIV -->
<div class="push"></div>
</div> <!-- WRAPPER -->

<div id="footer"><br /></div>

</body>
</html>
