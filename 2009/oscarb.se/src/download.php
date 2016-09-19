<?php

/*
	Oscar B 08
	www.oscarb.se

*/

include "includes/conn.php";
include "includes/musicdesc.php";

/**
 * This function reads a file in chunks, then outputs to the client.
 * This replaces the original readfile() function which first reads
 * an entire file into memory before sending any data to the client.
 *
 * @param $filename the file to read.
 */
function readfile_chunked ($filepath)
{
    $chunksize = 1 * (1024 * 1024);    // Chunk size (1MiB)
    $buffer = "";                      // Buffer
    $handle = fopen($filepath, "rb");  // File handle

    // If opening failed, return false.
    if ($handle === false)
        return false;

    // Loop until there's still data to read.
    while (!feof($handle))
    {
        // Read one chunk into the buffer
        $buffer = fread($handle, $chunksize);

        // Output the buffer.
        echo $buffer;

        // Force flushing.
        flush();
    }

    return fclose($handle);
}



// Windows - use spaces instead of %20

/*

	MUSIC

*/

if (isset($_GET['music'])) {

	// Search for track!
	foreach ($musicdesc as $track) {
		if ($track['Title'] == $_GET['music']) {
				$filepath = utf8_decode(rawurldecode($track['File']));
				$filesize = $track['Filesize'];
				break;
		}
	}

	if (!isset($filepath))
		die("Could not find file to download!");
	else if (!file_exists($filepath)) {
		die("Error! Could not find file!");
	} else {
		// Update downloads
		$sql = "UPDATE music SET downloads = downloads + 1 WHERE title = '" . $_GET['music'] . "'";
		//die($sql);
		mysql_query($sql) or die(mysql_error());


		// Send some headers to the client.

		header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
		header('Content-Length: '. $filesize );

		// Read the file
		readfile_chunked($filepath);

		exit;
	}


/*

	LYRICS

*/

} else if (isset($_GET['lyrics'])) {

	// Search for track!
	foreach ($musicdesc as $track) {
		if ($track['Title'] == $_GET['lyrics'] && $track["Filetype"] == "mp3") {

			//Track found! Load lyrics...
			$sql = "SELECT lyrics, LENGTH(lyrics) AS size FROM music WHERE title = '" . $track['Title'] . "' LIMIT 1";
			$res = mysql_query($sql) or die(mysql_error());

			$lyrics = mysql_result($res, 0, 'lyrics');
			//$size = mysql_result($res, 0, 'size');

			// Preface
			$preface  = $track['Title'] . "\n";
			$preface .= "© " . $track['Year'] . "\n";
			$preface .= "www.oscarb.se \n";
			$preface .= "-------------\n";
			$preface .= "\n";




			//header('Content-Description: File Transfer');
		    //header('Content-Type: text/plain');
		    //header('Content-Disposition: inline;');
		    //header('Content-Disposition: inline; filename="' . $track['Title'] . '.txt"');
		    //header('Content-Transfer-Encoding: binary');
		   	//header('Expires: 0');
		    //header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    //header('Pragma: public');
			//header('Content-Length: '. strlen($preface . $lyrics) );

/*
			header("Cache-Control: must-revalidate");

			$offset = 60 * 60 * 24 * 3;
			$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
			header($ExpStr);


			echo $preface . $lyrics;
*/
			$html = true;

			if($html):

			/*	HTML MODE	*/
		    header('Content-Type: text/html');
		    header('Content-Disposition: inline; filename="' . $track['Title'] . '.htm"');
		    //header('Content-Transfer-Encoding: binary');
		   	//header('Expires: 0');
		    //header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    //header('Pragma: public');
			//header('Content-Length: '. strlen($preface . $lyrics) );



			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://www.w3.org/2005/10/profile">

<title>oscarb.se - Lyrics: <?= $track['Title'] ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href="images/favicon.gif" />
<style type="text/css">
html, body {
	background-color: #fff;
	margin: 0;
	padding: 0;
}


pre {
	margin: 1em 0 1em 1.5em;
	padding: 0;
	<?
	/*
	color: #333;
	font-family:  Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 1.5em;
	*/
	?>

}
</style>
<!--[if IE 6]>
<style type="text/css">
html    { overflow-x: hidden; }
body    { padding-right: 1em; }
</style>
<![endif]-->

</head>
<body>
<pre>
<?= $preface . $lyrics ?>
</pre>

<?php
include('includes/analytics.php');
?>

</body>
</html>
			<?php

			endif;

			exit;
		}
	}
	die("Could not find lyrics!");


} else {
	die("Error! No media specified!");
}

?>