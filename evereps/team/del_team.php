<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

if($del == 'maybe') {
	$cs = " colspan='2'";
}
else {
	$cs = '';
}
?>

<html>
<head>
<title>Delete Event</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2 align="center">Delete An Event</h2>
<table border="0" cellspacing="0" cellpadding="3" align="center">
<?php
if($del == 'maybe') {
	$select = "SELECT name FROM team WHERE name = '$name'";
	$query = mysql_query($select, $dbh);
	
	while($row = mysql_fetch_array($query, MYSQL_NUM)) {
		if(mysql_num_rows($query) == 0) {
			print "
<tr>
	<td$cs><strong>Could Not Find the Person you were looking for</strong></td>
</tr>			
";
		}
		else {
			printf ("
<tr>
	<td$cs><strong>Delete <i>%s</i> from the Team?</strong></td>
</tr>
<tr>
	<td align=\"center\">[ <strong><a href=\"del_team.php?name=$name&del=yes\">YES</a></strong> ]</td>
	<td align=\"center\">[ <strong><a href=\"del_team.php?name=$name&del=no\">NO</a></strong> ]</td>
</tr>			
", $row[0]);
		}
	}
}
elseif($del == 'yes') {
	$delete = "DELETE FROM team WHERE name = '$name'";
	$query = mysql_query($delete, $dbh);
	
	if(mysql_affected_rows() == 1) {
		print "
<tr>
	<td$cs><strong>$name was deleted Succesfullly</strong></td>
</tr>
";
	}
	else {
		print "
<tr>
	<td$cs><strong>Could Not Find $name</strong></td>
</tr>			
";
	}
}
elseif($del == 'no') {
			print "
<tr>
	<td$cs><strong>$name was not Deleted</strong></td>
</tr>
";
}
else {
			print "
<tr>
	<td$cs><strong>You Must Specify a Person to Delete</strong></td>
</tr>
";
}
?>
<tr>
	<td<?php echo $cs; ?>>&nbsp;</td>
</tr>
<tr>
	<td<?php echo $cs; ?> align="center">[ <a href="team_list.php">everTeam Admin</a> ]</td>
</tr>
</table>
</body>
</html>

<?php
mysql_close($dbh);
?>