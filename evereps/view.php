<html>
<head>
<title>Stoked Signers For <?php echo $refer; ?></title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>
<?php
print "<p>[ <a href=\"javascript:window.close();\">Close Window</a> ]</p>";

$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

$signers = "SELECT nick, name, ssdate, sstime, town, state, refer, comments, id, email FROM stoked WHERE refer = '$refer' ORDER BY id DESC";
$query = mysql_query($signers, $dbh);

print 	"<p>\n<table style=\"border-width: 1px; border-color:black; border-style:solid\" width=\"650\">\n".
		"<tr>\n".
		"\t<td colspan=\"2\"><h2>Signers referred by $refer (".mysql_num_rows($query)."):</h2></td>\n".
		"</tr>\n";

	while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
		printf ("<tr>\n".
				"\t<td class=\"ssinfo\" colspan=\"2\"><strong>%s (%s, <a href=\"mailto:%s\">%s</a>)</strong><br>\n".
				"Signed on <strong>%s</strong> at <strong>%s</strong><br>\n".
				"From <strong>%s, %s</strong><br>\n".
				"</td>\n".
				"\t<td width=\"50\" rowspan=\"2\">[ <a href=\"editcomments.php?getid=%s\">edit</a> ]</td>".
				"</tr>\n".
				"<tr>\n".
				"\t<td class=\"sscomment\"><strong>Comments:</strong><br>\n%s</td>\n".
				"</tr>\n", $row[1], $row[0], $row[9], $row[9], $row[2], $row[3], $row[4], $row[5], $row[8], $row[7]);
	}
	
print 	"</table>\n</p>\n\n";

mysql_close($dbh);

print "<p>[ <a href=\"javascript:window.close();\">Close Window</a> ]</p>";
?>
</body>
</html>