<?


 // Create a link to the database server
$link = mysql_connect(SQL_DBASHHOST, SQL_DBASHUSER, SQL_DBASHPASS);
if(!$link) :
	die('Could not connect: ' . mysql_error());
endif;

// Select a database where our member tables are stored
$db = mysql_select_db(SQL_DBASHDB, $link);
if(!$db) :
	die ('Can\'t connect to database : ' . mysql_error());
endif;

	?>