<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_events',$dbh);

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
	$select = "SELECT atitle, utitle FROM hevents WHERE id = '$id'";
	$query = mysql_query($select, $dbh);
	
	while($row = mysql_fetch_array($query, MYSQL_NUM)) {
		if(mysql_num_rows($query) == 0) {
			print "
<tr>
	<td$cs><strong>Could Not Find the Event you were looking for</strong></td>
</tr>			
";
		}
		else {
			printf ("
<tr>
	<td$cs><strong>Delete the Event entitled <i>%s %s</i></strong></td>
</tr>
<tr>
	<td align=\"center\">[ <strong><a href=\"del_event.php?id=$id&del=yes\">YES</a></strong> ]</td>
	<td align=\"center\">[ <strong><a href=\"del_event.php?id=$id&del=no\">NO</a></strong> ]</td>
</tr>			
", $row[0], $row[1]);
		}
	}
}
elseif($del == 'yes') {
	$delete = "DELETE FROM hevents WHERE id = '$id'";
	$query = mysql_query($delete, $dbh);
	
	if(mysql_affected_rows() == 1) {
		print "
<tr>
	<td$cs><strong>Event Deleted Succesfully</strong></td>
</tr>
";
	}
	else {
		print "
<tr>
	<td$cs><strong>Could Not Find the Event you were looking for</strong></td>
</tr>			
";
	}
}
elseif($del == 'no') {
			print "
<tr>
	<td$cs><strong>Event was not Deleted</strong></td>
</tr>
";
}
else {
			print "
<tr>
	<td$cs><strong>You Must Specify an Event to Delete</strong></td>
</tr>
";
}
?>
<tr>
	<td<?php echo $cs; ?>>&nbsp;</td>
</tr>
<tr>
	<td<?php echo $cs; ?> align="center">[ <a href="event_list.php">Events Admin</a> ]</td>
</tr>
</table>
</body>
</html>

<?php
mysql_close($dbh);
?>