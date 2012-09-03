<?
if($_GET['v'] != 'done'){
session_name('Login_Session');
session_set_cookie_params(0,'/comp212');
session_start();
session_destroy();
session_unset();
$pagename = "Logout";
header("Location: ".SITE_URL."logout/?v=done");

}

include(SITE_DIR."inc/header.php");

?>
<h1 class="cbox_heading">You have logged out</h1>
<p><a href="<? echo SITE_URL ?>login">Log back in</a></p>
<?
include(SITE_DIR."inc/footer.php");
