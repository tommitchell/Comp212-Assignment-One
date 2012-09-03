<?
if($_SESSION['logged_in'] != "TRUE" && $_SESSION['level'] != "admin"){
	header("Location: ".SITE_URL."");
	exit;
} else {
if($_POST['Submit'] == 'Update'){
	
	$pagename = "Update Profile";
	

include(SITE_DIR."inc/header.php");

$clean_email = mysql_real_escape_string($_POST['email']);
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
$clean_id  = mysql_real_escape_string($_POST['id']);
$clean_active  = mysql_real_escape_string($_POST['active']);



mysql_query("UPDATE `users` SET 
`nickname` = '".$clean_nickname."',
`email` = '".$clean_email."',

`first_name` = '".$clean_firstname."', 
`last_name` = '".$clean_lastname."', 
`dob` = '".$clean_dob."', 
`gender` = '".$clean_sex."', 
`phone` = '".$clean_number."', 
`address_1` = '".$clean_address1."', 
`address_2` = '".$clean_address2."', 
`suburb` = '".$clean_suburb."', 
`city` = '".$clean_city."', 
`postcode` = '".$clean_postcode."', 
`country` = '".$clean_country."',
`level` = '".$clean_level."',
`active` = '".$clean_active."' 



WHERE `id` = '".$clean_id."';
")

	?>
	       
	<h1 class="cbox_heading">Profile Updated.</h1>
	<p><a href="<? echo SITE_URL?>admin">Back to admin</a></p>
	<?
} else {
$query = mysql_query("SELECT * FROM `users` WHERE `id` = '".$_GET['id']."';");
$row = mysql_fetch_array($query);

$pagename = "Update Profile";
	$js = '$(function() {
		$( "#country" ).buttonset();
		$( "#sex" ).buttonset();
		$( "#level" ).buttonset();
		$( "#active" ).buttonset();
		$( "input:submit, a, button", ".button" ).button();
		$( "input:update, a, button", ".button" ).button();
		$( "input:button, a, button", ".button" ).button();

		$( "#dob" ).datepicker({ dateFormat: "dd/mm/yy", changeMonth: true,
			changeYear: true, yearRange: "1950:2012" });
	});';
include(SITE_DIR."inc/header.php");
?>

	
<h1 class="cbox_heading">Edit Profile.</h1>
<p>Edit details then click "Update".</p>
<form method="post" action="<? echo SITE_URL?>adminedit">
<input type="hidden" name="id" value="<? echo $_GET['id'] ?>">
<p>Email: <input type="text" name="email" value="<? echo $row['email'] ?>" size="25"></p>

<p>First name: <input type="text" name="f_name" value="<? echo $row['first_name'] ?>"></p>
<p>Last name: <input type="text" name="l_name" value="<? echo $row['last_name'] ?>"></p>
<p>Nickname: <input type="text" name="nick_name" value="<? echo $row['nickname'] ?>"></p>
<p>Date of birth: <input type="text" name="dob" id="dob" value="<? echo $row['dob'] ?>"></p></p>
<p>Gender: <div id="sex">
		<input type="radio" id="Male" value="Male" name="sex" <? if($row['gender'] == "male"){ echo "checked=\"checked\""; } ?> /><label for="Male">Male</label>
		<input type="radio" id="Female" value="Female" name="sex" <? if($row['gender'] == "female"){ echo "checked=\"checked\""; } ?> /><label for="Female">Female</label>

	</div>
</p>
<p>Number: <input type="tel" name="phone" value="<? echo $row['phone'] ?>"></p>
<p>Address 1: <input type="text" name="address1" value="<? echo $row['address_1'] ?>"></p>
<p>Address 2: <input type="text" name="address2" value="<? echo $row['address_2'] ?>"></p>
<p>Suburb: <input type="text" name="suburb" value="<? echo $row['suburb'] ?>"></p>
<p>City: <input type="text" name="city" value="<? echo $row['city'] ?>"></p>
<p>Postcode: <input type="text" name="postcode" value="<? echo $row['postcode'] ?>"></p>
<p>Country: <div id="country">
		<input type="radio" id="NZ" value="NZ" name="country" <? if($row['country'] == "NZ"){ echo "checked=\"checked\""; } ?> /><label for="NZ">New Zealand</label>
		<input type="radio" id="Australia" value="Australia" name="country" <? if($row['country'] == "Australia"){ echo "checked=\"checked\""; } ?> /><label for="Australia">Australia</label>
		<input type="radio" id="Other" value="Other" name="country" <? if($row['country'] == "Other"){ echo "checked=\"checked\""; } ?>/><label for="Other">Other</label>
	</div>
</p>
<p>Level: <div id="level">
		<input type="radio" id="Admin" value="admin" name="level" <? if($row['level'] == "admin"){ echo "checked=\"checked\""; } ?> /><label for="Admin">Admin</label>
		<input type="radio" id="User" value="user" name="level" <? if($row['level'] == "user"){ echo "checked=\"checked\""; } ?> /><label for="User">User</label>
	</div>
</p>
<p>Activation: <div id="active">
		<input type="radio" id="0" value="0" name="active" <? if($row['active'] == 0){ echo "checked=\"checked\""; } ?> /><label for="0">Not Activated</label>
		<input type="radio" id="1" value="1" name="active" <? if($row['active'] == 1){ echo "checked=\"checked\""; } ?> /><label for="1">Activated</label>
		<input type="radio" id="5" value="5" name="active" <? if($row['active'] == 5){ echo "checked=\"checked\""; } ?> /><label for="5">Suspended</label>

	</div>
</p>

<p></p>
<div class="button">
<br />
<p><input type="submit" name="Submit" value="Update"></p>
<br />
<br />
<br />
</form>
<SCRIPT language="JavaScript">
<!--
function go_there()
{
 var where_to= confirm("Do you really want to go to delete this user?");
 if (where_to== true)
 {
   window.location="<? echo SITE_URL ?>admindelete/?id=<? echo $_GET['id'] ?>";
 }
 
}
//-->
</SCRIPT>
<FORM>
<input type="button" value="Delete User" onClick="go_there()">
</div>
</FORM>

</div>
<?

}
}
include(SITE_DIR."inc/footer.php");

?>