<?php

switch($_SERVER['HTTP_HOST']) {

	case "localhost":
		$mysql_server = "localhost";
		$mysql_user = "root";
		$mysql_password = "";
		$mysql_database = "oscarb08";
		break;

	// Loopia
	case "www.oscarb.se":
		$mysql_server = "mysql203.loopia.se";
		$mysql_user = "oscarb_se@o32988";
		$mysql_password = "";
		$mysql_database = "oscarb_se";
		break;

	case "oscarb.se":
		$mysql_server = "mysql203.loopia.se";
		$mysql_user = "oscarb_se@o32988";
		$mysql_password = "";
		$mysql_database = "oscarb_se";
		break;

	case "oscarb.se.roadrunner.kontrollpanelen.se":
		$mysql_server = "mysql30.kontrollpanelen.se";
		$mysql_user = "web35105_paq";
		$mysql_password = "";
		$mysql_database = "web35105_oscarb";
		break;

	default:
		$mysql_server = "mysql203.loopia.se";
		$mysql_user = "oscarb_se@o32988";
		$mysql_password = "";
		$mysql_database = "oscarb_se";
		break;

}


@$conn = mysql_connect($mysql_server, $mysql_user, $mysql_password);
if (!$conn) {
	die();
	//header("Location: {$domain}error.php");
	//exit;
}

mysql_select_db($mysql_database, $conn);



/*
   Se till att det inte finns några dolda tecken, typ radbyte
   eller mellanslag, efter den avslutande PHP-taggen !!!
*/

setlocale(LC_ALL, "swedish");
setlocale(LC_ALL, "sv_SE");
setlocale(LC_ALL, "sv_SE.ISO8859-1");


function array_search_recursive($needle, $haystack, $path=array())
{
    foreach($haystack as $id => $val)
    {
         $path2 = $path;
         $path2[] = $id;

         if($val === $needle)
              return $path2;
         else if(is_array($val))
              if($ret = array_search_recursive($needle, $val, $path2))
                   return $ret;
      }

      return false;
}






?>
