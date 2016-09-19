<?php

// DOMAIN
$domain = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/";

// MUSIC

// Get descriptions
include('includes/webdesc.php');

// RSS
header("Content-Type: application/rss+xml; charset=iso-8859-1");
//header("Content-Disposition: inline; filename=art.rss");

//TOP

echo '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>' . "\n";
?>
  <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
    	<title>oscarb.se - Web</title>
    	<link><?= $domain ?></link>
    	<description>Web by Oscar B</description>
    	<language>en-us</language>
    	<lastBuildDate><?= date("D, d M Y H:i:s O") ?></lastBuildDate>
    	<atom:link href="<?= $domain ?>web.rss" rel="self" type="application/rss+xml" />
    	<?php
		// LOOP
		foreach($webdesc as $website) { ?>

	<item>
            <title><?= $website['title'] ?></title>
            <link><?= $domain ?>index.php?web=<?= $website['img'] ?></link>
            <guid isPermaLink="false"><?= ($website['href'] != "-") ? $website['href'] : $domain . 'index.php?web=' . $website['img'] ?></guid>
            <description><![CDATA[
            <?php

            echo '<a href="' . $domain . 'web/' . $website['img'] . '-1.jpg" title="' . $website['title'] . '">';
			echo '<img src="' . $domain . 'web/thumbs/' . $website['img'] . '.jpg" alt="' . $website['title'] . '" width="100" height="75" />';
			echo '</a><br />' . "\n\t    ";

			echo ($website['href'] != "-") ? '<h4><a href="' . $website['href'] . '">' . $website['href'] . '</a></h4>' : '<h4>URL not available</h4>';
			echo "\n\t    ";
			echo '<p>' . $website['row1'] . '</p>';
			echo "\n\t    ";
			echo '<p>' . $website['row2'] . '</p>';
			echo "\n\t    " . '<p><small><a href="http://www.oscarb.se">http://www.oscarb.se</a></small></p>';	?>

            ]]></description>
            <pubDate><?= date("D, d M Y H:i:s O" , strtotime($website['ldate'])) ?></pubDate>
	</item>
        <?php //END LOOP
    	} ?>

    </channel>
</rss>