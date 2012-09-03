<!DOCTYPE html>
<html>
<head>
       
      <link type="text/css" href="http://localhost/comp212/assign1assets/jqueryui/css/ui-lightness/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<link type="text/css" href="http://localhost/comp212/assign1assets/template.css" rel="stylesheet">
<script type="text/javascript" src="http://localhost/comp212/assign1assets/jqueryui/js/jquery-1.8.0.min.js">
</script>
<script type="text/javascript" src="http://localhost/comp212/assign1assets/jqueryui/js/jquery-ui-1.8.23.custom.min.js">
</script>
<script type="text/javascript" src="http://localhost/comp212/assign1assets/jqueryui/js/jquery.validate.js">
</script>

        <title>EZ Trader! | <? echo $pagename ?></title>
        <script type="text/javascript">
	<?
	if(isset($js)){
		echo $js;
	}
	?>
	</script>
</head>
<body>
<div class="app_text" id="right_menu">
<? if($_SESSION['logged_in'] == "TRUE"){
?>
Hi there <? echo $_SESSION['f_name']." ".$_SESSION['l_name']; ?> | <a href="<? echo SITE_URL ?>profile">Edit Profile</a> |
<a href="<? echo SITE_URL ?>logout">Logout</a>
<?
} else { ?>
You are not logged in, please click <a href="<? echo SITE_URL ?>login">here</a> to log in |  <a href="<? echo SITE_URL ?>register">Register</a>
<? } ?>
</div>
<div id="avatar" class="console"></div>
<div id="title"><a href="<? echo SITE_URL ?>">EZ Trader</a>
<ul class="tabs">
<?
$function = areaurl('3',$site_preceed);
?>
<li class="<? if(empty($function)){ echo "active"; } ?>"> <a href="<? echo SITE_URL ?>" title=""><span>Home</span></a></li>

<li class="<? if($function == "browse"){ echo "active"; } ?>"><a href="<? echo SITE_URL ?>browse"><span>Browse Auctions</span></a></li>
<li class="<? if($function == "sell"){ echo "active"; } ?>"><a href="<? echo SITE_URL ?>sell"><span>Sell</span></a></li>
<?
if($_SESSION['logged_in'] == "TRUE"){
		echo "<li class=\"";
		 if($function == "my"){ echo "active"; } 
		echo "\"><a href=\"".SITE_URL."my\"><span>My EasyTrader</span></a></li>";
} else {
	
	echo "<li class=\"";
		 if($function == "register"){ echo "active"; } 
		echo "\"><a href=\"".SITE_URL."register\"><span>Register Now</span></a></li>";
	
	
}
if(($_SESSION['logged_in'] == "TRUE") && ($_SESSION['level'] == "admin")){
		echo "<li class=\"";
		 if($function == "admin"){ echo "active"; } 
		echo "\"><a href=\"".SITE_URL."admin\"><span>Admin</span></a></li>";
}
?>
<li class="<? if($function == "help"){ echo "active"; } ?>"><a href="<? echo SITE_URL ?>help"><span>Help</span></a></li>

</ul>
</div><div id="c_box">