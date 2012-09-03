<?

if($_SESSION['logged_in'] != "TRUE" && $_SESSION['level'] != "admin"){
	header("Location: ".SITE_URL."");
	exit;
} else {

	$pagename = "Admin Functions";
	

include(SITE_DIR."inc/header.php");

$clean_id = mysql_real_escape_string($_GET['id']);
mysql_query("DELETE FROM `users` WHERE `id` IN ('".$clean_id."');");

?>
	
<h1 class="cbox_heading">User Deleted.</h1>

<p><a href="<? echo SITE_URL ?>admin">Back to admin.</a></p>
<?
}
include(SITE_DIR."inc/footer.php");

?>