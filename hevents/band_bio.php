<html>
<head>
<title>Biography</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<?php

$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_events',$dbh);

$bio = "SELECT `name`, `town`, `site`, `sample`, `type`, `description` FROM `bands` WHERE `name`='$band_desc'";
$query = mysql_query($bio,$dbh);

if(!$query) {
    print "No Good, can't find the band $band_desc";
}
else {
    while ($row = mysql_fetch_array($query,$dbh)) {

    printf ("<h2 style=\"color: #FFFFFF\">Band Biography for %s</h2>\n\n".
    "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"body\" style=\"color: #FFFFFF\">".
	"<tr>\n\t<td width=\"150\"><strong>Hometown</strong>:</td>\n".
	"\t<td>%s</td>\n</tr>\n".
    "<tr>\n\t<td width=\"150\"><strong>Website</strong>:</td>\n".
	"\t<td><a href=\"%s\" class=\"menubar\" target=\"_blank\">%s</a></td>\n</tr>\n".
    "<tr>\n\t<td width=\"150\"><strong>Music Sample</strong>:</td>\n".
	"\t<td><a href=\"%s\" class=\"menubar\" target=\"_blank\">%s</a></td>\n</tr>\n".
    "<tr>\n\t<td width=\"150\"><strong>Music Type</strong>:</td>\n".
	"\t<td>%s</td>\n</tr>\n".
    "<tr>\n\t<td width=\"150\"><strong>Self Proclaimed Description</strong>:</td>\n".
	"\t<td>%s</td>\n</tr>\n".
	"</table>\n", $row[0], $row[1], $row[2], $row[2], $row[3], $row[3], $row[4], $row[5]);
    }
}

mysql_close($dbh);
?>
</body>
</html>
