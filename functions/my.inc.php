<?
if($_SESSION['logged_in'] == "TRUE"){




$pagename = "My EZ Trader";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">My EZ Trader</h1>
<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Auctions I'm watching:</strong></p>
			</div>
		</div>
		<ul>
		<li>None! Perhaps find some <a href="<? echo SITE_URL ?>browse">here</a>?</li>
		</ul>
		<br />
		<br />
		<a href="<? echo SITE_URL ?>profile">Edit my profile.</a>
<?
} else {

$pagename = "My EZ Trader";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">My EZ Trader</h1>
<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Alert:</strong> You must be logged in to see My EZ Trader.</p>
			</div>
		</div>
				<p>Click <a href="<? echo SITE_URL ?>login">here to log in</a>.</p>


<?

}

include(SITE_DIR."inc/footer.php");
?>