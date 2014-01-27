<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db("everideo_ss", $dbh);
?>

<html>
<head>
<title>everTeam Admin</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<table border="0" cellspacing="0" cellpadding="3" width="500" align="center">

<?php
if ($name) {
	$select = "SELECT name, email, phone1, phone2, city, state, type, comments, user, public FROM team WHERE name= '$name'";
	$query = mysql_query($select, $dbh);
	
	if ($query) {
		while($row = mysql_fetch_array($query, MYSQL_NUM)) {
			$row[7] = empty($row[7]) ? "No Comments" : nl2br($row[7]);
			printf ("
<tr>
	<td colspan=\"2\" align=\"center\"><h2>%s</h2></td>
</tr>
<tr>
	<td align=\"right\"><strong>Name:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Email:</strong></td>
	<td><a href=\"mailto:%s\">%s</a></td>
</tr>
<tr>
	<td align=\"right\"><strong>Phone 1:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Phone 2:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>City:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>State:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Type:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Username:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Info Public?</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Comments:</strong></td>
	<td>%s</td>
</tr>
", $row[0], $row[0], $row[1], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[8], strtoupper($row[9]), $row[7]);
		}
	}
}
else {
	print "
<tr>
	<td colspan=\"2\" align=\"center\">Could not bring up the info for $name</td>
</tr>
";
}
?>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center">[ <a href="edit_team.php?name=<?php echo $name; ?>&edit=getteam">Edit</a> | <a href="del_team.php?name=<?php echo $name; ?>&del=maybe">Delete</a> | <a href="team_list.php">everTeam Admin</a>]</td>
</tr>
</table>

</body>
</html>

<?php
mysql_close($dbh);
?>