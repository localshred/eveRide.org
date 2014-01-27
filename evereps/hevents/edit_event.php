<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_events',$dbh);
?>

<html>
<head>
<title>Edit Humanitarian Event</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2 align="center">Edit a Humanitarian Event</h2>

<?php

if ($edit == 'getevent') {
	print '<form name="edit" method="post" action="edit_event.php">';
		print "
<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
";
	$searchtitle = mysql_query("SELECT `id`, `atitle`, `utitle`, `date`, `time`, `donation`, `desc`, `place`, `infodesc` FROM `hevents` WHERE `id`='$id'", $dbh);
	while ($row = mysql_fetch_array($searchtitle, MYSQL_NUM)) {
		printf("
<tr>
	<td align=\"right\"><strong>ID</strong></td>
	<td><input type=\"text\" name=\"id\" size=\"4\" value=\"%s\" onFocus=\"this.blur();\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>Black Title</strong></td>
	<td><input type=\"text\" name=\"atitle\" size=\"20\" value=\"%s\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>Blue Title</strong></td>
	<td><input type=\"text\" name=\"utitle\" size=\"20\" value=\"%s\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>Date</strong></td>
	<td><input type=\"text\" name=\"date\" size=\"15\" value=\"%s\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>Time</strong></td>
	<td><input type=\"text\" name=\"time\" size=\"15\" value=\"%s\"></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>Donation</strong></td>
	<td><textarea name=\"donation\" cols=\"45\" rows=\"3\">%s</textarea></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>Short Description</strong></td>
	<td><textarea name=\"desc\" cols=\"45\" rows=\"3\">%s</textarea></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>Place</strong></td>							
	<td><textarea name=\"place\" cols=\"45\" rows=\"3\">%s</textarea></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>Long Description</strong></td>							
	<td><textarea name=\"infodesc\" cols=\"45\" rows=\"8\">%s</textarea></td>
</tr>
", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
	}
	echo	"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n\n".
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"corrected\" value=\"Submit Correction\">&nbsp;&nbsp;&nbsp;<input type=\"reset\"></td>\n".
			"</tr>\n".
		 	"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n".
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\">[ <a href=\"event_list.php\">Events Admin</a> ]</td>\n".
			"</tr>\n".	
			"</table>\n".
		 	"</form>\n\n";
}
else {
	if ($corrected) {
		$updatetitle = mysql_query("UPDATE `hevents` SET `atitle`=\"$atitle\", `utitle`=\"$utitle\", `date`=\"$date\", `time`=\"$time\", `donation`=\"$donation\", `desc`=\"$desc\", `place`=\"$place\", `infodesc`=\"$infodesc\" WHERE `id`='$id'");
		if (!$updatetitle) {
			print 	"<p align=\"center\"><strong>Your Update Query didn't work. You suck.</strong></p>\n\n".
					"<p align=\"center\">[ <a href=\"event_list.php\">Events Admin</a> ]</p>\n\n";
		}
		else {
			$printcorrection = mysql_query("SELECT `id`, `atitle`, `utitle`, `date`, `time`, `donation`, `desc`, `place`, `infodesc` FROM `hevents` WHERE `id`=\"$id\"", $dbh);
	
			print "
	<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
	<tr>
		<td colspan=\"2\" align=\"center\"><strong>The Event has been corrected succesfully</strong></td>
	</tr>
	";
	
			while ($row = mysql_fetch_array($printcorrection, MYSQL_NUM)) {
				printf ("
<tr>
	<td align=\"right\"><strong>ID:</strong></td>										
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Title:</strong></td>						
	<td>%s %s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Date:</strong></td>						
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Time:</strong></td>						
	<td>%s</td>
</tr>
<tr>
	<td valign=\"top\" align=\"right\"><strong>Donation:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td  valign=\"top\" align=\"right\"><strong>Short Description:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td  valign=\"top\" align=\"right\"><strong>Place:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>Long Description:</strong></td>
	<td>%s</td>
</tr>
", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], nl2br($row[8]));
			}
		}
		print	"<tr>\n".
				"\t<td colspan=\"2\">&nbsp;</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td colspan=\"2\" align=\"center\">[ <a href=\"edit_event.php?id=$id&edit=getevent\">Edit Again</a> | <a href=\"http://www.everide.org/event_f.php#$id\" target=\"_new\">Read</a> | <a href=\"event_list.php\">Events Admin</a> ]</td>\n".
				"</tr>\n".	
				"</table>\n\n";
	}
	else {
		print 	"<p align=\"center\"><strong>You didn't specify which event to edit.</strong></p>\n\n".
				"<p align=\"center\">[ <a href=\"event_list.php\">Events Admin</a> ]</p>\n\n";
	}
}


?>

</body>
</html>

<?php
mysql_close($dbh);
?>