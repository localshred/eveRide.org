<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_events',$dbh);
?>

<html>
<head>
<title>Add a New Event</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2 align="center">Add a New Event</h2>

<?php
if (!isset($eventadd)) {
	print "
<form name=\"addevent\" action=\"add_event.php\" method=\"post\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
  <td align=\"right\"><strong>Black Title:</strong></td>
  <td><input type=\"text\" name=\"atitle\" size=\"25\"></td>
</tr>
<tr>
  <td align=\"right\"><strong>Blue Title:</strong></td>
  <td><input type=\"text\" name=\"utitle\" size=\"25\"></td>
</tr>
<tr>
  <td align=\"right\"><strong>Event Date:</strong></td>
  <td><input type=\"text\" name=\"date\" size=\"10\"></td>
</tr>
<tr>
  <td align=\"right\"><strong>Event Time:</strong></td>
  <td><input type=\"text\" name=\"time\" size=\"10\"></td>
</tr>
<tr>
  <td align=\"right\"><strong>Place:</strong></td>
  <td><input type=\"text\" name=\"place\" size=\"25\"></td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\"><strong>Short Description:</strong></td>
  <td><textarea name=\"desc\" cols=\"40\" rows=\"3\" onFocus=\"javascript: this.form.elements['desc'].select();\">Description for Event box</textarea></td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\"><strong>Long Description:</strong></td>
  <td><textarea name=\"infodesc\" cols=\"40\" rows=\"10\" onFocus=\"javascript: this.form.elements['infodesc'].select();\">Description for Event Page, make it good</textarea></td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\"><strong>Donation:</strong></td>
  <td><textarea name=\"donation\" cols=\"40\" rows=\"3\"></textarea></td>
</tr>
<tr>
  <td coslspan=\"2\">&nbsp;</td>
</tr>
<tr>
  <td align=\"center\" colspan=\"2\"><input type=\"submit\" name=\"eventadd\" value=\"Add Event\">&nbsp;&nbsp;&nbsp;<input type=\"reset\" name=\"reset\" value=\"Clear Fields\"></td>
</tr>
<tr>
  <td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
  <td colspan=\"2\" align=\"center\">[ <a href=\"event_list.php\">Events Admin</a> ]</td>
</tr>
</table>
</form>
";
}

if ($eventadd == 'Add Event') {
	$insertquery = "INSERT INTO `hevents` (`id`, `atitle`, `utitle`, `date`, `time`, `donation`, `desc`, `place`, `infodesc`) VALUES ('$id', '$atitle', '$utitle', '$date', '$time', '$donation', '$desc', '$place', '$infodesc')";
	$insertevent = mysql_query($insertquery, $dbh);

	if (!$insertevent) {
		print 	"<p align=\"center\">Your Query wasn't successful. You suck again!</p>\n\n".
				"<p align=\"center\">[ <a href=\"event_list.php\">Events Admin</a> ]</p>\n\n";
	}
	else {
		$sel = "SELECT MAX(id) FROM hevents";
		$lid = mysql_query($sel, $dbh);
		
		while ($lids = mysql_fetch_array($lid, MYSQL_NUM)) {
			$newlid = $lids[0];
		}		

		$select = "SELECT `id`, `atitle`, `utitle`, `date`, `time`, `place`, `desc`, `infodesc`, `donation` FROM `hevents` WHERE `id` = '$newlid'";
		$query = mysql_query($select, $dbh);

		if ($query) {
			print "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">\n";

			while ($add = mysql_fetch_array($query, MYSQL_NUM)) {
				printf ("
<tr>
  <td align=\"right\" width=\"150\"><strong>Black Title:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\"><strong>Blue Title:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\"><strong>Event Date:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\"><strong>Event Time:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\"><strong>Place:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\"><strong>Short Description:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\"><strong>Long Description:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\"><strong>Donation:</strong></td>
  <td>%s</td>
</tr>
<tr>
  <td coslspan=\"2\">&nbsp;</td>
</tr>
",  $add[1], $add[2], $add[3], $add[4], $add[5], $add[6], $add[7], nl2br($add[8]));
			}
		print "
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"edit_event.php?id=$newlid&edit=getevent\">Edit</a> | <a href=\"http://www.everide.org/event_f.php#$newlid\" target=\"_new\">Read</a> | <a href=\"event_list.php\">Events Admin</a> ]</td>
</tr>
</table>
";
		}
		else {
			print 	"<p align=\"center\">Event was added Succesfully, but I can't pull it up... It worked though.</p>\n\n".
					"<p align=\"center\">[ <a href=\"event_list.php\">Events Admin</a> ]</p>\n\n";
		}
	}
}
?>

</body>
</html>

<?php
mysql_close($dbh);
?>