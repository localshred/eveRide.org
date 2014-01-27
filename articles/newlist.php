<?php
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);

$select = "SELECT id, title, thumbnail, caption, date FROM article ORDER BY id DESC";
$query = mysql_query($select, $dbh);

if($query) {
	
	print	"<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"400\" align=\"center\" class=\"body\">
<tr>
	<td colspan=\"2\" style=\"color: #666666;\">Local Photos:</td>
<tr>
<tr>
	<td colspan=\"2\" align=\"center\">
		<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" align=\"center\" class=\"body\">
		<tr>
			<td align=\"center\"><a href=\"localphoto_f.php\" title=\"Your Future Girlfriends\"><img src=\"gallery/article_img/hot_chicks.jpg\"></a></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td style=\"color: #666666;\">rider: Babes!</td>
	<td style=\"text-align: right; color: #666666;\">credit: Courtney Kunz</td>
</tr>
<tr>
	<td colspan=\"2\"><h2 align=\"center\">Latest News<br><img src=\"images/divider.gif\"></h2></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
";

	$i = 1;
	while($new = mysql_fetch_array($query, MYSQL_NUM)) {
		if($i == 1) {
			$align = "";
		}
		else {
			$align = " align=\"right\"";
		}
		
		if(empty($new[2])) {
			$title = 	"<tr>\n".
						"\t<td$align colspan=\"2\" style=\"background-color: #1a5c8a\"><a style=\"font-weight: bold; color: #FFFFFF; font-size: 15px\" href=\"story_f.php?id=$new[0]\">$new[1]</a></td>\n".
						"</tr>\n";
		}
		else {
			$thumb = substr_replace($new[2], '_sm', strpos($new[2], '.'), 0);
			$resize = getimagesize("http://www.everide.org/articles/images/thumbnails/$thumb");
			$width = 'width="'.(400 - $resize[0]).'"';
			$padding = " padding-left: 5px";
			
			$title = 	"<tr>\n".
						"\t<td$align valign=\"top\" rowspan=\"3\" $resize[3] style=\"border-color: #1a5c8a; border-width: 2px; border-style: solid\"><a href=\"story_f.php?id=$new[0]\"><img src=\"articles/images/thumbnails/$thumb\"></a></td>\n".
						"\t<td$align $width height=\"18\" style=\"background-color: #1a5c8a\"><a style=\"font-weight: bold; color: #FFFFFF; font-size: 15px\" href=\"story_f.php?id=$new[0]\">$new[1]</a></td>\n".
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
", $new[3], $new[4]);
	
	$i++;
	$i %= 2;
	}
	print	"<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"old_articles.php\">View Old Articles</a> ]</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
</table>
";
}
else {
	print "<p>No Articles Found</p>";
}

mysql_close($dbh);
*/
	print	"
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"400\" align=\"center\" class=\"body\">
<tr>
	<td colspan=\"2\" style=\"color: #666666;\">Local Photos:</td>
<tr>
<tr>
	<td colspan=\"2\" align=\"center\">
		<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" align=\"center\" class=\"body\">
		<tr>
			<td align=\"center\"><a href=\"localphoto_f.php\" title=\"Your Future Girlfriends\"><img src=\"gallery/article_img/hot_chicks.jpg\"></a></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td style=\"color: #666666;\">rider: Babes!</td>
	<td style=\"text-align: right; color: #666666;\">credit: Courtney Kunz</td>
</tr>
<tr>
	<td colspan=\"2\"><h2 align=\"center\">Latest News<br><img src=\"images/divider.gif\"></h2></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\">No Articles Found</td>
</tr>
</table>";
?>