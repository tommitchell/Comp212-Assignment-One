<?
$pagename = "Account Activation";
include(SITE_DIR."inc/header.php");
?>
<h1 class="cbox_heading">Account Activation</h1>
<?

$query = mysql_query("SELECT * FROM `users` WHERE `activation_key` = '".$_GET['key']."'");
$num = mysql_num_rows($query);
$row = mysql_fetch_array($query);

if($num = 1){
	
	mysql_query("UPDATE `users` SET `active` = '1' WHERE `activation_key` = '".$_GET['key']."';");
	mysql_query("UPDATE `users` SET `activation_key` = NULL WHERE `activation_key` = '".$_GET['key']."';");

?>
<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Hi <? echo $row['first_name']." ".$row['last_name'] ?>, your account has been activated.</strong></p>
			</div>
		</div>
		<p><a href="<? echo SITE_URL ?>login">Click here to login.</a></p>

<?
	
} else {

?>
<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Couldn't find an account with that link.</strong></p>
			</div>
		</div>

<?
}
include(SITE_DIR."inc/footer.php");
?>