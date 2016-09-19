<?php

// DOMAIN
$domain = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/";

// MUSIC

// Get descriptions
include('includes/conn.php');
include('includes/musicdesc.php');

// RSS
header("Content-Type: application/rss+xml; charset=iso-8859-1");
//header("Content-Disposition: inline; filename=art.rss");

//TOP

echo '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>' . "\n";
?>
  <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
    	<title>oscarb.se - Music</title>
    	<link><?= $domain ?></link>
    	<description>Music by Oscar B</description>
    	<language>en-us</language>
    	<lastBuildDate><?= date("D, d M Y H:i:s O") ?></lastBuildDate>
    	<atom:link href="<?= $domain ?>music.rss" rel="self" type="application/rss+xml" />
    	<?php
		// LOOP
		foreach($musicdesc as $track) {    	?>

	<item>
            <title><?= $track['Title'] ?></title>
            <link><?= $domain ?>index.php?music=<?= rawurlencode($track["Title"]) ?></link>
            <guid isPermaLink="false"><?= $domain . $track['File'] ?></guid>
            <description><![CDATA[
            <?php
       		printf("<h4>%d &bull; Download <a href=\"%sdownload.php?music=%s\" title=\"Downloads: %d &bull; Size: %s \">%s</a>",
				 $track["Year"], $domain, urlencode($track["Title"]), $track["Downloads"], format_size($track["Filesize"]), strtoupper($track["Filetype"]));

			echo ($track["Filetype"] != "zip") ? " &bull; View <a href=\"{$domain}download.php?lyrics=" . urlencode($track["Title"]) . "\" title=\"Lyrics: " . $track["Title"] . "\">Lyrics</a>" : "";
			echo ($track["Extra"] != "") ? " &bull; " . $track["Extra"] : "";
			echo "</h4>\n\t    ";
			echo '<p><small><a href="http://www.oscarb.se">http://www.oscarb.se</a></small></p>';
			?>

            ]]></description>
            <enclosure url="<?= $domain . $track['File'] ?>" length="<?=$track['Filesize']?>" type="audio/mpeg" />
            <media:content
            	url="<?= $domain . $track['File'] ?>"
            	fileSize="<?= $track['Filesize'] ?>"
            	type="audio/mpeg"
            	medium="audio"
            	lang="en" />
            <pubDate><?= date("D, d M Y H:i:s O" , strtotime($track['Ldate'])) ?></pubDate>
	</item>
        <?php //END LOOP
    	} ?>

    </channel>
</rss>