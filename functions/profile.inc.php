<?
if($_SESSION['logged_in'] != "TRUE"){
	header("Location: ".SITE_URL."login");
	exit;
} else {
if($_POST['Submit'] == 'Update'){
	
	$pagename = "Update Profile";
	

include(SITE_DIR."inc/header.php");

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

mysql_query("UPDATE `users` SET 
`nickname` = '".$clean_nickname."',
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
`country` = '".$clean_country."' 

WHERE `email` = '".$_SESSION['account']."';
")

	?>
	       
	<h1 class="cbox_heading">Profile Updated.</h1>
	<p><a href="<? echo SITE_URL?>">Back to home</a></p>
	<?
} else {
$query = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_SESSION['account']."';");
$row = mysql_fetch_array($query);

$pagename = "Update Profile";
	$js = '$(function() {
		$( "#country" ).buttonset();
		$( "#sex" ).buttonset();
		$( "#dob" ).datepicker({ dateFormat: "dd/mm/yy", changeMonth: true,
			changeYear: true, yearRange: "1950:2012" });
	});';
include(SITE_DIR."inc/header.php");
?>

	
<h1 class="cbox_heading">Edit Profile.</h1>
<p>Edit details then click "Update".</p>
<form method="post" action="<? echo SITE_URL?>profile">
<p>First name: <input type="text" name="f_name" value="<? echo $row['first_name'] ?>"></p>
<p>Last name: <input type="text" name="l_name" value="<? echo $row['last_name'] ?>"></p>
<p>Nickname: <input type="text" name="nick_name" value="<? echo $row['nickname'] ?>"></p>
<p>Date of birth: <input type="text" name="dob" id="dob" value="<? echo $row['dob'] ?>"></p>
<p>Gender: </p><div id="sex">
		<input type="radio" id="Male" value="Male" name="sex" <? if($row['gender'] == "male"){ echo "checked=\"checked\""; } ?> /><label for="Male">Male</label>
		<input type="radio" id="Female" value="Female" name="sex" <? if($row['gender'] == "female"){ echo "checked=\"checked\""; } ?> /><label for="Female">Female</label>

	</div>
<p>Number: <input type="text" name="phone" value="<? echo $row['phone'] ?>"></p>
<p>Address 1: <input type="text" name="address1" value="<? echo $row['address_1'] ?>"></p>
<p>Address 2: <input type="text" name="address2" value="<? echo $row['address_2'] ?>"></p>
<p>Suburb: <input type="text" name="suburb" value="<? echo $row['suburb'] ?>"></p>
<p>City: <input type="text" name="city" value="<? echo $row['city'] ?>"></p>
<p>Postcode: <input type="text" name="postcode" value="<? echo $row['postcode'] ?>"></p>
<p>Country: </p><div id="country">
		<input type="radio" id="NZ" value="NZ" name="country" <? if($row['country'] == "NZ"){ echo "checked=\"checked\""; } ?> /><label for="NZ">New Zealand</label>
		<input type="radio" id="Australia" value="Australia" name="country" <? if($row['country'] == "Australia"){ echo "checked=\"checked\""; } ?> /><label for="Australia">Australia</label>
		<input type="radio" id="Other" value="Other" name="country" <? if($row['country'] == "Other"){ echo "checked=\"checked\""; } ?>/><label for="Other">Other</label>
	</div>

<p></p>
<p><input type="submit" name="Submit" value="Update"></p>
</form>

<?

}
}
include(SITE_DIR."inc/footer.php");

?>