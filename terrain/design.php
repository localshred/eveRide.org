<html>
<head>
<title><?php echo $filename; ?></title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<?php

$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss', $dbh);

$select = "SELECT `file`, `credit` FROM `photo` WHERE `file` = '$filename'";
$query = mysql_query($select,$dbh);

while($row = mysql_fetch_array($query, MYSQL_NUM)) {
	printf("
<table class=\"blbody\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">
<tr>
	<td colspan=\"2\" valign=\"top\" align=\"center\"><img src=\"$filename\"></td>
</tr>
<tr>
	<td>filename: %s</td>
	<td align=\"right\">credit: %s</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\"><a class=\"menubar\" href=\"javascript:window.close();\">Close Window</a></td>
</tr>
</table>
			", $row[0], $row[1], $row[2]);
}

mysql_close($dbh);
?>

</body>
</html>
