<?php

$domain = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/";

// ART

// <guid> - Cooliris aka PicLens depends on this to connect pictures in RSS feed with pictures on site

// Get descriptions
include('includes/artdesc.php');

// RSS
header("Content-Type: application/rss+xml; charset=iso-8859-1");
//header("Content-Disposition: inline; filename=art.rss");

//TOP

echo '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>' . "\n";
?>
  <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
    	<title>oscarb.se - Art</title>
    	<link><?= $domain ?></link>
    	<description>Art by Oscar B</description>
    	<language>en-us</language>
    	<lastBuildDate><?= date("D, d M Y H:i:s O") ?></lastBuildDate>
    	<atom:link href="<?= $domain ?>art.rss" rel="self" type="application/rss+xml" />
    	<atom:icon><?= $domain ?>images/piclens.png</atom:icon>
    	<?php
		// LOOP
		foreach($files as $ldate => $f) { echo "\n\t"?><item>
            <title><?= ($artdesc[filename($f)][0]) ? allhtmlentities($artdesc[filename($f)][0]) : $f ?></title>
            <link><?= $domain ?>index.php?art=<?= $f ?></link>
            <guid isPermaLink="false"><?= filename($f) ?></guid>
            <media:thumbnail url="<?= $domain ?>art/100x75/<?=$f ?>" />
            <media:content url="<?= $domain ?>art/<?= $f ?>" />
            <media:description type="plain"><?= ($artdesc[filename($f)][0]) ? allhtmlentities($artdesc[filename($f)][0]) : $f ?></media:description>
            <description><![CDATA[
            <?= ($artdesc[filename($f)][0]) ? "<a href=\"" . $domain . "art/" . $f ."\" title=\"" . $artdesc[filename($f)][0] . "\">" : "<a href=\"" . $domain . "art/" . $f ."\" title=\"" . basename($f) . "\">"; ?><img src="<?= $domain ?>art/100x75/<?= $f ?>" alt="<?= ($artdesc[filename($f)][0]) ? allhtmlentities($artdesc[filename($f)][0]) : $f ?>" /></a>
            <p><small><a href="http://www.oscarb.se">http://www.oscarb.se</a></small></p>
            ]]></description>
            <pubDate><?= date("D, d M Y H:i:s O" , $ldate) ?></pubDate>
	</item>
       <?php } ?>

    </channel>
</rss>