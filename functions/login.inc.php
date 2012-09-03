<?

session_name('Login_Session');
session_set_cookie_params(0,'/comp212/');
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){

$clean_email = mysql_real_escape_string($_POST['email']);
$clean_pass = mysql_real_escape_string($_POST['password']);
	
$query = mysql_query("SELECT * FROM `users` WHERE `email` = '".$clean_email."' AND `password` = sha1('".$clean_pass."')");
$number = mysql_num_rows($query);
$row = mysql_fetch_array($query);
if($number == 1 && $row['active'] == 1){
	
	$_SESSION['logged_in'] = "TRUE";
	$_SESSION['account'] = $clean_email;
	$_SESSION['level'] = $row['level'];
	$_SESSION['f_name'] = $row['first_name'];
	$_SESSION['l_name'] = $row['last_name'];
	header("Location: ".SITE_URL."success");

	} else {
	
		$_SESSION['logged_in'] = "FALSE";
		$_SESSION['account'] = "unauth";
		$error = "nouser";
				
	}
if($row['active'] == 5){
		$_SESSION['logged_in'] = "FALSE";
		$_SESSION['account'] = "suspended";
		$error = "suspended";
} elseif($row['active'] == 0){
		$_SESSION['logged_in'] = "FALSE";
		$_SESSION['account'] = "not_activated";
		$error = "activation";
}
}

$pagename = "Login";
include(SITE_DIR."inc/header.php");
?>
	  <h1 class="cbox_heading">Please log in to continue!</h1>
<?
	  if($_SESSION['logged_in'] == "TRUE"){
		  ?>
			<div id="okaymsg">You are already logged in!</div>
		<?		  
	  } else {
	  if(isset($error)){
	   
	  if($error == "nouser"){
		  ?>
		 <div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Error!</strong> We can't find a user with that username and password!</p>
			</div>
		</div>		<?
			} elseif($error == "suspended"){
		  ?>
		 <div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Alert!</strong> Your account has been suspended!</p>
			</div>
		</div>
		<?
			} elseif($error == "activation"){
		  ?>
		 <div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				<strong>Alert!</strong> Your account has not been activated! Please check your emails for the activation link.</p>
			</div>
		</div>
		<?
			}
			}
	  ?>
	  <form action="<? echo SITE_URL ?>login" method="post">

	  <p>Email Address:</p>
	  <p><input type="text" name="email" size="30"></p>
	  <p>Password</p>
	  <p><input type="password" name="password" size="30"></p>
	  <p><input type="submit" name="Log In"></p>
	  </form>
	  <? }
		  
		  include(SITE_DIR."inc/footer.php");

		  
	  ?>
	  
	  
