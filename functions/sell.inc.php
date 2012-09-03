<?
if($_SESSION['logged_in'] == "TRUE"){




$pagename = "Sell Items";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">Sell Items</h1>
<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Coming soon!</strong></p>
			</div>
		</div>
		<p>Please go back to the <a href="<? echo SITE_URL ?>">home page</a>.</p>
<?
} else {

$pagename = "Sell Items";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">Sell Items</h1>
<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Alert:</strong> You must be logged in to sell items.</p>
			</div>
		</div>
				<p>Click <a href="<? echo SITE_URL ?>login">here to log in</a>.</p>


<?

}

include(SITE_DIR."inc/footer.php");
?>