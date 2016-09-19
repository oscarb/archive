<?php

// Mail Oscar
include('includes/conn.php');

@$conn = mysql_connect($mysql_server, $mysql_user, $mysql_password);

$message = "";

$message .= sprintf("An error has occured at http://www.oscarb.se \n");
$message .= sprintf("Date: %s \n",  date("Y-m-d H:i:s"));
$message .= sprintf("User Agent: %s \n",  $_SERVER['HTTP_USER_AGENT']);
$message .= sprintf("IP: %s \n",  $_SERVER['REMOTE_ADDR']);
$message .= sprintf("PHP Error Message: %s \n",  @$php_errormsg);
$message .= sprintf("MySQL Error: %d: %s \n", mysql_errno(), mysql_error());
$message .= sprintf("\n End of message.");

$headers = 'From: info@oscarb.se' . "\r\n" .
    'Reply-To: info@oscarb.se' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(@mail("error@oscarb.se", "error @ oscarb.se", $message)) {
	$hello = "Come back later...";
} else {
	$hello = "error@oscarb.se";
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>oscarb.se - Personal portfolio for Oscar B, aka paq</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
html, body {
	background: #e8e8e8;
}

h1 {
	color: #fff;
	display: block;
}

</style>
</head>
<body>
<div id="pagediv">
<h1><?= $hello ?></h1>
</div>

<?php
include('includes/analytics.php');
?>

</body>
</html>
