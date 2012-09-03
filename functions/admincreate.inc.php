<?
if($_POST['Submit'] == 'Create User'){
	
	$pagename = "Create a User";
	

include(SITE_DIR."inc/header.php");

$clean_email = mysql_real_escape_string($_POST['rego_email']);
$clean_password = mysql_real_escape_string($_POST['rego_password']);
$clean_firstname = mysql_real_escape_string($_POST['f_name']);
$clean_lastname = mysql_real_escape_string($_POST['l_name']);
$clean_nickname = mysql_real_escape_string($_POST['nick_name']);
$clean_sex = mysql_real_escape_string($_POST['sex']);
$clean_dob = mysql_real_escape_string($_POST['dob']);
$clean_number = mysql_real_escape_string($_POST['phone']);
$clean_address1 = mysql_real_escape_string($_POST['address1']);
$clean_address2 = mysql_real_escape_string($_POST['address2']);
$clean_suburb = mysql_real_escape_string($_POST['suburb']);
$clean_city = mysql_real_escape_string($_POST['city']);
$clean_postcode = mysql_real_escape_string($_POST['postcode']);
$clean_country  = mysql_real_escape_string($_POST['country']);
$clean_level  = mysql_real_escape_string($_POST['level']);
$clean_active  = mysql_real_escape_string($_POST['active']);


mysql_query("INSERT INTO `users` (`id`, `email`, `password`, `nickname`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `address_1`, `address_2`, `suburb`, `city`, `postcode`, `country`, `active`, `activation_key`, `level`) VALUES (NULL, '".$clean_email."', SHA1('".$clean_password."'), '".$clean_nickname."', '".$clean_firstname."', '".$clean_lastname."', '".$clean_dob."', '".$clean_sex."', '".$clean_number."', '".$clean_address1."', '".$clean_address2."', '".$clean_suburb."', '".$clean_city."', '".$clean_postcode."', '".$clean_country."','".$clean_active."', NULL, '".$clean_level."');");

	?>
	       
	<h1 class="cbox_heading">User Created.</h1>

<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Done!</strong> The user has been created but the activation email has <b>not</b> been sent.</p>
			</div>
		</div>
	<?
} else {
$query = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_SESSION['account']."';");
$row = mysql_fetch_array($query);

$pagename = "Register for EZ Trader";
	$js = '$(function() {
		$( "#country" ).buttonset();
		$( "#sex" ).buttonset();
		$( "#level" ).buttonset();
		$( "#active" ).buttonset();
		$( "#dob" ).datepicker({ dateFormat: "dd/mm/yy", changeMonth: true,
			changeYear: true, yearRange: "1950:2012" });
			$( "input:submit, a, button", ".button" ).button();

		$( "a", ".demo" ).click(function() { return false; });

				
 $(document).ready(function(){
 	
	jQuery.validator.addMethod("password", function( value, element ) {
		var result = this.optional(element) || value.length >= 6 && /\d/.test(value) && /[a-z]/i.test(value);
		if (!result) {
			element.value = "";
			var validator = this;
			setTimeout(function() {
				validator.blockFocusCleanup = true;
				element.focus();
				validator.blockFocusCleanup = false;
			}, 1);
		}
		return result;
	}, "Your password must be at least 6 characters long and contain at least one number and one character.");
	
	jQuery.validator.addMethod("defaultInvalid", function(value, element) {
		return value != element.defaultValue;
	}, "");
	

	
	jQuery.validator.messages.required = "";
	$("form").validate({
		invalidHandler: function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? \'You missed 1 field. It has been highlighted below\'
					: \'You missed \' + errors + \' fields.  They have been highlighted below\';
				$("div#errorbox span").html(message);
				$("div#errorbox").show();
			} else {
				$("div#errorbox").hide();
			}
		},
		onkeyup: false,
		submitHandler: function() {
			$("div.error").hide();
			document.forms["regoform"].submit();
		},
		messages: {
			password2: {
				required: " ",
				equalTo: "Please enter the same password as above"	
			},
			email: {
				required: " ",
				email: "Please enter a valid email address, for example: you@yourdomain.com",
			}
		},
		debug:true
	});
	


  

	});
	});';
include(SITE_DIR."inc/header.php");
?>

	
<h1 class="cbox_heading">Create a User.</h1>


    <div class="ui-widget" id="errorbox" style="display:none;">
			<div class="ui-state-error ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Error!</strong> <span></span>.</p>
			</div>
		</div>

<form method="post" id="regoform" action="<? echo SITE_URL?>admincreate" >
<p>Email Address: <input type="text" name="rego_email"  size="25" class="required email" ></p>
<p>Password: <input type="password" name="rego_password" class="required password"></p>
<p><br></p>
<p>First name: <input type="text" name="f_name"  class="required"></p>
<p>Last name: <input type="text" name="l_name"  class="required"></p>
<p>Nickname: <input type="text" name="nick_name"  class="required"></p>
<p>Date of birth: <input type="text" name="dob" id="dob"  class="required"></p>
<p>Gender: </p><div id="sex">
		<input type="radio" id="Male" value="Male" name="sex"  class="required" /><label for="Male">Male</label>
		<input type="radio" id="Female" value="Female" name="sex" class="required"  /><label for="Female">Female</label>

	</div>
<p>Number: <input type="text" name="phone"  class="required" ></p>
<p>Address 1: <input type="text" name="address1"  class="required"></p>
<p>Address 2: <input type="text" name="address2" ></p>
<p>Suburb: <input type="text" name="suburb" class="required"></p>
<p>City: <input type="text" name="city"  class="required"></p>
<p>Postcode: <input type="text" name="postcode"  class="required" ></p>
<p>Country: </p><div id="country">
		<input type="radio" id="NZ" value="NZ" name="country" class="required" /><label for="NZ">New Zealand</label>
		<input type="radio" id="Australia" value="Australia" name="country" class="required" /><label for="Australia">Australia</label>
		<input type="radio" id="Other" value="Other" name="country"  class="required"/><label for="Other">Other</label>
	</div>
<p>Level: </p><div id="level">
		<input type="radio" id="Admin" value="admin" name="level" class="required" /><label for="Admin">Admin</label>
		<input type="radio" id="User" value="user" name="level" class="required" /><label for="User">User</label>
	</div>
<p>Activation: </p><div id="active">
		<input type="radio" id="0" value="0" name="active" class="required" /><label for="0">Not Activated</label>
		<input type="radio" id="1" value="1" name="active" class="required" /><label for="1">Activated</label>
		<input type="radio" id="5" value="5" name="active" class="required" /><label for="5">Suspended</label>

	</div>
<p></p>
<div class="button">
<br />
<p><input type="submit" name="Submit" value="Create User"></p>
</div>
</form>
<?

}

include(SITE_DIR."inc/footer.php");

?>