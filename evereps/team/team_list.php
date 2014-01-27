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
<h2>everTeam Administration</h2>

<table border="0" cellspacing="0" cellpadding="3" width="460">
<tr>
	<td colspan="3">[ <strong><a href="add_team.php">Add A New Person</a></strong> | <a href="../everteam.php">Megaman Home</a> ]</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><strong>Ads &amp; Founders</strong></td>
</tr>
<?php
$adsel = "SELECT name FROM team WHERE type = '1' OR type = 'founder' ORDER BY name";
$adquery = mysql_query($adsel, $dbh);

if(mysql_num_rows($adquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"2\">No Entries Found</td>
</tr>
";
}
else {
	$i = 1;
	while($new = mysql_fetch_array($adquery, MYSQL_NUM)) {
		$color = ($i == 1) ? "#1a5c8a" : "#000000";
		
		printf ("
<tr bgcolor=\"$color\">
	<td width=\"15\">&nbsp;</td>
	<td width=\"285\">%s</td>
	<td>[ <a href=\"view_team.php?name=%s\">View</a> | <a href=\"edit_team.php?name=%s&edit=getteam\">Edit</a> | <a href=\"del_team.php?name=%s&del=maybe\">Delete</a> ]</td>
</tr>
", $new[0],  $new[0], $new[0], $new[0]);
		$i++;
		$i %= 2;
	}
}
?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><strong>Reps</strong></td>
</tr>
<?php
$repsel = "SELECT name FROM team WHERE type = 'Rep' ORDER BY name";
$repquery = mysql_query($repsel, $dbh);

if(mysql_num_rows($repquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"2\">No Entries Found</td>
</tr>
";
}
else {
	$i = 1;
	while($new = mysql_fetch_array($repquery, MYSQL_NUM)) {
		$color = ($i == 1) ? "#1a5c8a" : "#000000";
		
		printf ("
<tr bgcolor=\"$color\">
	<td width=\"15\">&nbsp;</td>
	<td width=\"285\">%s</td>
	<td>[ <a href=\"view_team.php?name=%s\">View</a> | <a href=\"edit_team.php?name=%s&edit=getteam\">Edit</a> | <a href=\"del_team.php?name=%s&del=maybe\">Delete</a> ]</td>
</tr>
", $new[0],  $new[0], $new[0], $new[0]);
		$i++;
		$i %= 2;
	}
}
?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><strong>Riders</strong></td>
</tr>
<?php
$newsel = "SELECT name FROM team WHERE type = 'Rider' OR type = 'Rider/Rep' ORDER BY name";
$newquery = mysql_query($newsel, $dbh);

if(mysql_num_rows($newquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"2\">No Entries Found</td>
</tr>
";
}
else {
	$i = 1;
	while($new = mysql_fetch_array($newquery, MYSQL_NUM)) {
		$color = ($i == 1) ? "#1a5c8a" : "#000000";
		
		printf ("
<tr bgcolor=\"$color\">
	<td width=\"15\">&nbsp;</td>
	<td width=\"285\">%s</td>
	<td>[ <a href=\"view_team.php?name=%s\">View</a> | <a href=\"edit_team.php?name=%s&edit=getteam\">Edit</a> | <a href=\"del_team.php?name=%s&del=maybe\">Delete</a> ]</td>
</tr>
", $new[0],  $new[0], $new[0], $new[0]);
		$i++;
		$i %= 2;
	}
}

?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
</table>

</body>
</html>

<?php
mysql_close($dbh);
?>