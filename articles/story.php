<?php

$tbl = isset($tbl) ? "`old_article`" : "`article`";
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);

$select = "SELECT `thumbnail`, `title`, `date`, `caption`, `story` FROM $tbl WHERE `id` = '$id'";
$query = mysql_query($select, $dbh);

if(mysql_num_rows($query) !== 0) {
	while ($story = mysql_fetch_array($query, MYSQL_NUM)) {
		if(strlen($story[0]) == 0) {
			$img = "";
		}
		else {
			$img = "<img src=\"articles/images/$story[0]\" align=\"left\">";
		}
		printf ("
<p>
<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%%\" class=\"body\">
<tr>
	<td align=\"right\" colspan=\"2\">[ <a href=\"http://www.everide.org/\">Latest News</a> ]</td>
</tr>
<tr>
	<td colspan=\"2\" valign=\"top\" style=\"background-color: #1a5c8a; color: #FFFFFF; font-size: 15px; font-weight: bold\">%s</td>
</tr>
<tr>
	<td width=\"15\">&nbsp;</td>
	<td><i>Posted %s</i></td>
</tr>
<tr>
	<td width=\"15\">&nbsp;</td>
	<td>%s</td>
</tr>
<tr>
	<td style=\"font-size: 5px\" colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"center\" colspan=\"2\"><img src=\"images/divider.gif\"></td>
</tr>
<tr>
	<td style=\"font-size: 5px\" colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td width=\"15\">&nbsp;</td>
	<td>$img%s</td>
</tr>
<tr>
	<td style=\"font-size: 5px\" colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"center\" colspan=\"2\"><img src=\"images/divider.gif\"></td>
</tr>
</table>
</p>

", $story[1], $story[2], $story[3], nl2br($story[4]));
	}	
	print "<p align=\"center\">To view people's comments about this Story, please visit our <a href=\"http://everide.org/ipw-web/bulletin/bb/index.php\" target=\"_new\">Online Forum</a></p>\n\n<br>\n";
}
else {
*/
	print "<p align=\"center\">We're sorry, the story you have selected is no longer available, or an error has occurred.<br>Please <a href=\"contact_f.php?sel=error\">Contact Us</a> if you are angry with us. Thank You.</p>";
/*
}		
mysql_close($dbh);
*/
?>