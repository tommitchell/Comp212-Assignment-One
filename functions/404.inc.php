<?
$pagename = "Page not found!";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">404 Error!</h1>
<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Error!</strong> I'm sorry! We couldn't find the page you are looking for!</p>
			</div>
		</div>
<p>Please go back to the <a href="<? echo SITE_URL ?>">home page</a> and try again.</p>
<?
include(SITE_DIR."inc/footer.php");
?>