<?php





function areaurl($number,$site_preceed)
{
	$link_root = explode("/", $_SERVER['REQUEST_URI']);
	return mysql_real_escape_string($link_root[$number+$site_preceed]);

}


?>