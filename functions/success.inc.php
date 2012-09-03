<?
if($_SESSION['logged_in'] != "TRUE"){
	header("Location: ".SITE_URL."login");
} else {
$pagename = "Success";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">Success! You have been logged in.</h1>
<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Use the menu above to access site functions.</strong></p>
			</div>
		</div>
<?
include(SITE_DIR."inc/footer.php");
}
?>