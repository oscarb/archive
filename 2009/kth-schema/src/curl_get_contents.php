<?php
// Alternativ till file_get_contents

function curl_get_contents($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);

	$contents = curl_exec($ch);
	curl_close($ch);

	if (is_string($contents) && strlen($contents))
		return $contents;
	else
		return false;

}



?>
