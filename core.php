<?
session_name('Login_Session');
session_set_cookie_params(0,'/comp212/');
session_start();

require('app/app.php');

function __autoload($class){

    $class = str_replace('_', '/', $class);
    $path = "".SITE_DIR."functions/$class.inc.php";
    
    if(empty($class)){
	    
	    require("".SITE_DIR."functions/home.inc.php");
	    
    } else {
    
    if(file_exists($path)){
	    
	    require $path;

    } else {
       $fourohfour_path = "".SITE_DIR."functions/404.inc.php";

require (''.$fourohfour_path.'');
     
 
}
}
}


__autoload(areaurl('1',$site_preceed));


?>