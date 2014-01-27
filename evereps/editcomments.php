<html>
<head>
<title>Edit a Stoked List Comment</title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>
<h2 style="color: white">Edit a Stoked List Comment</h2>

<?php
$dbh = mysql_connect('localhost', 'everideo_bj', 'tunahead');
mysql_select_db('everideo_ss');

if (empty($edited)) {
	print	"<form name=\"edit\" method=\"post\" action=\"editcomments.php\">\n".
			"<table border=\"0\" cellspacing=\"3\">\n".
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\">[ <a href=\"javascript:window.close();\">Close Window</a> ]</td>\n".
			"</tr>\n".
			"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n";
	
	$searchtitle = mysql_query("SELECT `id`, `ssdate`, `sstime`, `name`, `email`, `age`, `town`, `state`, `nick`, `comments` FROM `stoked` WHERE `id`='$getid'", $dbh);
	while ($row = mysql_fetch_array($searchtitle, MYSQL_NUM)) {
		printf("<tr>\n".
				"\t<td align=\"right\"><strong>ID</strong></td>\n".
				"\t<td><input type=\"text\" name=\"id\" size=\"4\" value=\"%s\" onFocus=\"this.blur();\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Date</strong></td>\n".
				"\t<td><input type=\"text\" name=\"ssdate\" size=\"12\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Time</strong></td>\n".
				"\t<td><input type=\"text\" name=\"sstime\" size=\"12\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Name</strong></td>\n".
				"\t<td><input type=\"text\" name=\"name\" size=\"25\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Email</strong></td>\n".							
				"\t<td><input type=\"text\" name=\"email\" size=\"25\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Age</strong></td>\n".
				"\t<td><input type=\"text\" name=\"age\" size=\"5\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Town</strong></td>\n".							
				"\t<td><input type=\"text\" name=\"town\" size=\"25\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>State</strong></td>\n".							
				"\t<td><input type=\"text\" name=\"state\" size=\"5\" value=\"%s\"></td>\n".
				"</tr>\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Nickname</strong></td>\n".							
				"\t<td><input type=\"text\" name=\"nick\" size=\"25\" value=\"%s\"></td>\n".
				"</tr>\n\n\n<tr>\n".
				"\t<td align=\"right\"><strong>Comments</strong></td>\n".							
				"\t<td><textarea name=\"comments\" cols=\"45\" rows=\"8\">%s</textarea></td>\n".
				"</tr>\n\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
	}
	echo	"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n\n".
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"edited\" value=\"Submit Correction\">&nbsp;&nbsp;&nbsp;<input type=\"reset\"></td>\n".
			"</tr>\n".
			"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n".	
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\">[ <a href=\"javascript:window.close();\">Close Window</a> ]</td>\n".
			"</tr>\n".
			"</table>\n".
			"</form>\n\n";
}

if (isset($edited)) {

	print	"<table border=\"0\" cellspacing=\"3\">\n".
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\">[ <a href=\"javascript:window.close();\">Close Window</a> ]</td>\n".
			"</tr>\n".
			"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n";

	$updatetitle = mysql_query("UPDATE `stoked` SET `id`=\"$id\", `nick`=\"$nick\", `ssdate`=\"$ssdate\", `sstime`=\"$sstime\", `name`=\"$name\", `email`=\"$email\", `age`=\"$age\", `town`=\"$town\", `state`=\"$state\", `comments`=\"$comments\" WHERE `id`='$id'");
	if (!$updatetitle) {
		die("Can't Edit Comment $commentid: ".mysql_error()."\n\n</body></html>");
	}
	else {
		$printcorrection = mysql_query("SELECT `id`, `ssdate`, `sstime`, `name`, `email`, `age`, `town`, `state`, `nick`, `comments` FROM `stoked` WHERE `id`='$id'", $dbh);
		while ($row = mysql_fetch_array($printcorrection, MYSQL_NUM)) {
				printf("<tr>\n".
						"\t<td colspan=\"2\"><p><strong>Comment $commentid has been Corrected Succesfully</strong><br></p></td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>ID:</strong></td>\n".										
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>SSDate:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>SSTime:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Name:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Email:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Age:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Town:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\" valign=\"top\"><strong>State:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Nickname:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\" valign=\"top\"><strong>Comments:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
		}
	}
	print	"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n".	
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\">[ <a href=\"javascript:window.close();\">Close Window</a> ]</td>\n".
			"</tr>\n".
			"</table>\n\n";
}
mysql_close($dbh);
?>
</body>
</html>