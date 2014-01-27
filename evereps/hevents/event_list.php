<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db("everideo_events", $dbh);
?>

<html>
<head>
<title>eveRide Humanitarian Events Administration</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2>eveRide Humanitarian Events Administration</h2>

<table border="0" cellspacing="0" cellpadding="3" width="500">
<tr>
	<td colspan="4">[ <strong><a href="add_event.php">Add A New Event</a></strong> | <a href="../everteam.php">Megaman Home</a> ]</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<tr>
	<td colspan="4"><strong>Current Events</strong> (Newest First)</td>
</tr>
<?php
$newsel = "SELECT id, atitle, utitle FROM hevents ORDER BY id DESC";
$newquery = mysql_query($newsel, $dbh);

if(mysql_num_rows($newquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"3\">No Entries Found</td>
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
	<td width=\"5\">%s</td>
	<td width=\"300\">%s %s</td>
	<td>[ <a href=\"http://www.everide.org/event_f.php#%s\" target=\"_blank\">Read</a> | <a href=\"edit_event.php?id=%s&edit=getevent\">Edit</a> | <a href=\"del_event.php?id=%s&del=maybe\">Delete</a> ]</td>
</tr>
", $new[0], $new[1], $new[2], $new[0], $new[0], $new[0]);
		$i++;
		$i %= 2;
	}
}
?>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
</table>

</body>
</html>

<?php
mysql_close($dbh);
?>