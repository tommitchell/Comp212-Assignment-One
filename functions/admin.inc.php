<?

if($_SESSION['logged_in'] != "TRUE" && $_SESSION['level'] != "admin"){
	header("Location: ".SITE_URL."");
	exit;
} else {

	$pagename = "Admin Functions";
	

include(SITE_DIR."inc/header.php");

?>
	
<h1 class="cbox_heading">Admin Functions.</h1>

<p><a href="<? echo SITE_URL ?>adminlist">View Users</a></p>
<p><a href="<? echo SITE_URL ?>admincreate">Create User</a></p>
<?
}
include(SITE_DIR."inc/footer.php");

?>