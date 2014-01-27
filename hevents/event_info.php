<h2>eveRide Humanitarian Events</h2>
<?php

$dbh = mysql_connect("localhost","everideo_bj","tunahead");
mysql_select_db("everideo_events", $dbh);

$query = "SELECT `id`, `atitle`, `utitle`, `date`, `time`, `place`, `donation`, `infodesc` FROM `hevents` ORDER BY `id` DESC";
$getrows = mysql_query($query, $dbh);
if (mysql_num_rows($getrows) == 0) {
	print "<p align=\"center\">No Events were found. Please check back soon to see when we'll be planning the next event.</p>\n\n";
}
else {
	while ($row = mysql_fetch_array($getrows, MYSQL_NUM)) {
		printf ("<a name=\"%s\"></a><p><table border=\"0\" class=\"body\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%%\">\n".
				"<tr>\n".
				"\t<td colspan=\"2\"><font class=\"blacktitle\">%s</font> <font class=\"bluetitle\">%s</font></td>\n".
				"</tr>\n<tr>\n".
				"\t<td valign=\"top\" width=\"25%%\" style=\"background-color: #1a5c8a; color: #FFFFFF\"><strong>Date</strong>:</td>\n".
				"\t<td>%s</td>\n".
				"</tr>\n<tr>\n".
				"\t<td valign=\"top\" width=\"25%%\" style=\"background-color: #1a5c8a; color: #FFFFFF\"><strong>Time</strong>:</td>\n".
				"\t<td>%s</td>\n".
				"</tr>\n<tr>\n".
				"\t<td valign=\"top\" width=\"25%%\" style=\"background-color: #1a5c8a; color: #FFFFFF\"><strong>Place</strong>:</td>\n".
				"\t<td>%s</td>\n".
				"</tr>\n<tr>\n".
				"\t<td valign=\"top\" width=\"25%%\" style=\"background-color: #1a5c8a; color: #FFFFFF\"><strong>Donation</strong>:</td>\n".
				"\t<td>%s</td>\n".
				"</tr>\n<tr>\n".
				"\t<td style=\"background-color: #1a5c8a; font-size: 5px\">&nbsp;</td>\n".
				"\t<td align=\"center\"><img src=\"images/divider.gif\"></td>\n".
				"</tr>\n<tr>\n".
				"\t<td valign=\"top\" width=\"25%%\" style=\"background-color: #1a5c8a; color: #FFFFFF\"><strong>Event Description</strong>:</td>\n".
				"\t<td>%s</td>\n".
				"</td>\n</table></p>\n\n", $row[0], strtolower($row[1]), strtolower($row[2]), $row[3], $row[4], $row[5], $row[6], nl2br($row[7]));
	}
}
mysql_close($dbh);

print "<br><br><p align=\"center\">For more information on any eveRide event,<br>feel free to <a href=\"contact_f.php?sel=event\">contact us</a>.</p>"
?>