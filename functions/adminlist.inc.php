<?
if($_SESSION['logged_in'] != "TRUE" && $_SESSION['level'] != "admin"){
	header("Location: ".SITE_URL."");
	exit;
} else {

	
	$pagename = "List Users";
	

include(SITE_DIR."inc/header.php");

?>

<h1 class="cbox_heading">List Users.</h1>
<?
$query = mysql_query("SELECT * FROM `users` LIMIT 0,1000;");
echo "<table border=\"1\"><tr><td>Name</td><td>Email</td><td>Level</td><td>Edit</td></tr>";
while($row = mysql_fetch_array($query)){
	
	echo "<tr>";
	echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['level']."</td>";
	echo "<td><a href=\"".SITE_URL."adminedit/?id=".$row['id']."\">Edit</a></td>";
	echo "</tr>
	";

}
?>
</table>
</div>
<?


}
include(SITE_DIR."inc/footer.php");

?>