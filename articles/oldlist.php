<?php
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);

$select = "SELECT id, title, thumbnail, caption, date FROM old_article ORDER BY id DESC";
$query = mysql_query($select, $dbh);

if($query) {
	
	print	"<table border=\"0\" width=\"390\" cellpadding=\3\" cellspacing=\"0\" class=\"body\">
<tr>
	<td colspan=\"2\"><h2 align=\"center\">Old Articles<br><img src=\"images/divider.gif\"></h2></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
";

	$i = 1;
	while($old = mysql_fetch_array($query, MYSQL_NUM)) {
		if($i == 1) {
			$align = "";
		}
		else {
			$align = " align=\"right\"";
		}
		
		if(empty($old[2])) {
			$title = 	"<tr>\n".
						"\t<td$align colspan=\"2\" style=\"background-color: #1a5c8a\"><a style=\"font-weight: bold; color: #FFFFFF; font-size: 15px\" href=\"story_f.php?id=$old[0]\">$old[1]</a></td>\n".
						"</tr>\n";
		}
		else {
			$thumb = substr_replace($old[2], '_sm', strpos($old[2], '.'), 0);
			$resize = getimagesize("http://www.everide.org/articles/images/thumbnails/$thumb");
			$width = 'width="'.(400 - $resize[0]).'"';
			$padding = " padding-left: 5px";
			
			$title = 	"<tr>\n".
						"\t<td$align valign=\"top\" rowspan=\"3\" $resize[3] style=\"border-color: #1a5c8a; border-width: 2px; border-style: solid\"><a href=\"story_f.php?id=$old[0]&tbl=1\"><img src=\"articles/images/thumbnails/$thumb\"></a></td>\n".
						"\t<td$align $width height=\"18\" style=\"background-color: #1a5c8a\"><a style=\"font-weight: bold; color: #FFFFFF; font-size: 15px\" href=\"story_f.php?id=$old[0]&tbl=1\">$old[1]</a></td>\n".
						"</tr>\n";
		}
		printf("$title
<tr>
	<td colspan=\"2\" valign=\"top\" style=\"font-size: 10px;$padding\"$align>%s</td>
</tr>
<tr>
	<td colspan=\"2\" style=\"font-size: 10px;$padding\"$align><i>Posted on %s</i></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\"><img src=\"images/divider.gif\"></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
", $old[3], $old[4]);
	
	$i++;
	$i %= 2;
	}
	print	"<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"index.php\">Back to Latest News</a> ]</td>
</tr>
</table>
";
}
else {
	*/
	print "<p>No Articles Found</p>";
/*
}

mysql_close($dbh);
*/
?>