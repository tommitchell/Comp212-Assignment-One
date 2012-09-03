<?php
    if(isset($_ENV["USER"])){
    if($_ENV["USER"] == "thomas") {
	    
	      
        $site_env = "dev";
	    $site_preceed = 2;
        
	    define('SITE_DIR', '/Server/comp212/assign1/');

	    define('ASSET_URL', 'http://localhost/comp212/assign1/');
	    define('SITE_URL', 'http://localhost/comp212/assign1/');

	    define('SQL_DBASHHOST',   /*  MYSQL HOST - USUALLY LOCALHOST  */'localhost');
	    define('SQL_DBASHUSER', /* DB LOGIN USER */'root');
	    define('SQL_DBASHPASS', /* DB LOGIN PASS */'root');

	    define('SQL_DBASHDB',   /*  DB ITS SELF  */'comp212_assign1');
	}
	} else {
		
		// PRODUCTION DATA REDACTED!
		
	}
    

require('functions/index_database.inc.php');
require('functions/index_domain.inc.php');
?>