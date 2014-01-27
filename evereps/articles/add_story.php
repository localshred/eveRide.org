<?php
/*
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);
*/
?>

<html>
<head>
<title>Add a New Article</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<?php
if (!isset($yesadd)) {
	print "
<h2 align=\"center\">Add a New Article</h2>

<form name=\"addstory\" action=\"add_story.php\" method=\"post\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\"><strong>TITLE:</strong></td>
	<td><input type=\"text\" name=\"title\" size=\"25\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>IMAGE:</strong></td>
	<td>/articles/images/<input type=\"text\" name=\"thumbnail\" size=\"25\"></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>CAPTION:</strong></td>
	<td><textarea name=\"caption\" rows=\"3\" cols=\"60\"></textarea></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>STORY:</strong></td>
	<td><textarea name=\"story\" rows=\"10\" cols=\"60\"></textarea></td>
</tr>
<tr>
	<td colspan=\"2\">
		<input type=\"hidden\" name=\"add\" value=\"1\">
	</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"yesadd\" value=\"Add New Article\">&nbsp;&nbsp;&nbsp;<input type=\"reset\" value=\"Clear Article\"></td>
</tr>
</table>
</form>

<p align=\"center\">[ <a href=\"story_list.php\">Return to Article Listing ]</a></p>
";
}
elseif ($yesadd == 'Add New Article') {
	$date = date('l F j, Y');
	$insert = "INSERT INTO article (title, date, thumbnail, caption, story) VALUES ( '$title', '$date', '$thumbnail', '$caption', '$story')";
	$query = mysql_query($insert, $dbh);
	
	if($query) {
		$select = "SELECT id, title, date, thumbnail, caption, story FROM article WHERE title = '$title'";
		$selquery = mysql_query($select, $dbh);

		while($c = mysql_fetch_array($selquery, MYSQL_NUM)) {
			if (strlen($c[3]) == 0) {
				$c[3] = "No Image";
			}
			else {
				$c[3] = "[ <a href=\"http://www.everide.org/articles/images/$c[3]\">$c[3]</a> ]";
			}
			printf ("
<h2 align=\"center\">New Article: <i>%s</i></h2>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\"><strong>ID:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>TITLE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>DATE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>IMAGE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>CAPTION:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>STORY:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"edit_story.php?id=%s&edit=getstory\">Edit Story</a> ] | [ <a href=\"http://www.everide.org/story_f.php?id=%s\" target=\"_blank\">Read Story</a> ] | [ <a href=\"story_list.php\">Article Listing</a> ]</td>
</tr>
</table>
", $c[1], $c[0], $c[1], $c[2], $c[3], $c[4], nl2br($c[5]), $c[0], $c[0]);
		}
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">You screwed it up. For some reason, you're query didn't go through. Go back to the <a href=\"story_list.php\">Article Listing</a>.</p>";
	}
}
else {
	print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">You screwed it up. Either <a href=\"add_story.php\">Try Again</a> to add an article,<br>or go back to the <a href=\"story_list.php\">Article Listing</a>.</p>";
}

?>
</body>
</html>

<?php
mysql_close($dbh);
?>