<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
	?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>oscarb.se - Home of <?php echo sprintf("Oscar B. %d years %s Stockholm, Sweden.", $years, $suffix) ?></title>
        <meta name="description" content="Showcase of Oscar B">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <style>
        background-color: #354d72; /* Old browsers */
        </style>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="centered"><img src="img/oscarb9-scratch.png" alt="oscarb.se - Logo #9" id="logotype" /></div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-2565070-4'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
