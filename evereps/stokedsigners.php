<html>
<head>
<title>eveRide.org Stoked Signers</title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>
<p align="center">[ <a href="javascript:window.close();">Close Window</a> ]</p>

<?php
$dbh = mysql_connect("localhost", "everideo", "evertuna");
mysql_select_db ("everideo_ss", $dbh);

$query = "SELECT `nick`, `ssdate`, `sstime`, `town`, `state`, `comments`, `id` FROM `stoked` ORDER BY `id` DESC $limit";
$getrows = mysql_query($query, $dbh);

/*if (($start{(strlen ($start))-2}) == '1') {
	$start = $start.'th';
}
else {
	$suffix = $start{(strlen ($start))-1};

	if ($suffix == '1') {
		$start = $start.'st';
	}
	elseif ($suffix == '2') {
		$start = $start.'nd';
	}
	elseif ($suffix == '3') {
		$start = $start.'rd';
	}
	else {
		$start = $start.'th';
	}
}*/

$line = mysql_num_rows(mysql_query("SELECT `id` FROM `stoked`",$dbh));

print "<h2 style=\"color:#FFFFFF\">You are viewing $line Signers from the Stoked List</h2>\n\n";

while ($row = mysql_fetch_array($getrows, MYSQL_NUM)) {
	printf 	("<p>\n<table style=\"border-width: 1px; border-color:black; border-style:solid\" width=\"500\">\n".
			"<tr>\n".
			"<td class=\"ssinfo\" colspan=\"2\"><strong>%s</strong> is signer <strong>$line</strong> on the Stoked List<br>\n".
			"Signed on <strong>%s</strong> at <strong>%s</strong><br>\n".
			"From <strong>%s, %s</strong></td>\n".
			"\t<td width=\"50\" rowspan=\"2\">[ <a href=\"editcomments.php?getid=%s\">edit</a> ]</td>".
			"</tr>\n<tr>\n".
			"<td class=\"sscomment\"><strong>Comments:</strong><br>\n%s</td>\n".
			"</tr>\n\n</table></p>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[6], $row[5]);
	$line--;
}

mysql_close($dbh);
?>

<p align="center">[ <a href="javascript:window.close();">Close Window</a> ]</p>
</body>
</html>