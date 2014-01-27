<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);
?>

<html>
<head>
<title>Edit an Existing Story</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<?php
if($edit == 'getstory') {

	$select = "SELECT id, title, date, thumbnail, caption, story FROM article WHERE id = '$id'";
	$query = mysql_query($select, $dbh);
	
	if($query) {
		print "<form name=\"editarticle\" action=\"edit_story.php?id=$id\" method=\"post\">";
		
		while ($get = mysql_fetch_array($query, MYSQL_NUM)) {
			if (strlen($get[3]) == 0) {
				$link = " No Image";
			}
			else {
				$link = " [ <a href=\"http://www.everide.org/articles/images/$get[3]\">$get[3]</a> ]";
			}
			printf("
<h2 align=\"center\">Edit Article: <i>%s</i></h2>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\"><strong>ID:</strong></td>
	<td><input type=\"text\" onFocus=\"this.blur();\" name=\"id\" value=\"%s\" size=\"5\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>TITLE:</strong></td>
	<td><input type=\"text\" name=\"title\" value=\"%s\" size=\"25\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>DATE:</strong></td>
	<td><input type=\"text\" name=\"date\" value=\"%s\" size=\"35\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>IMAGE:</strong></td>
	<td><input type=\"text\" name=\"thumbnail\" value=\"%s\" size=\"25\">$link</td>
</tr>
<tr>
	<td align=\"right\"><strong>CAPTION:</strong></td>
	<td><textarea name=\"caption\" rows=\"3\" cols=\"60\">%s</textarea></td>
</tr>
<tr>
	<td align=\"right\"><strong>STORY:</strong></td>
	<td><textarea name=\"story\" rows=\"10\" cols=\"60\">%s</textarea></td>
</tr>
<tr>
	<td align=\"right\" colspan=\"2\">
		<input type=\"hidden\" name=\"edit\" value=\"1\">
	</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"yesedit\" value=\"Update %s\">&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"noedit\" value=\"Don't Update\"></td>
</tr>
</table>
", $get[1], $get[0], $get[1], $get[2], $get[3], $get[4], $get[5], $get[1]);
		}
		print "</form>\n\n";
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">You screwed it up. For some reason, you're query didn't go through. Go back to the <a href=\"story_list.php\">Article Listing</a>.</p>";
	}
}
elseif (!isset($edit) || (isset($edit) && $edit !== '1')) {
	print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">No Article was found for editing, please view the <a href=\"story_list.php\">Article Listing</a> to edit an article.</p>";
}
else {
	if (isset($yesedit)) {

		$update = "UPDATE article SET id = '$id', title = '$title', date = '$date', thumbnail = '$thumbnail', caption = '$caption', story = '$story' WHERE id = '$id'";
		$upquery = mysql_query($update, $dbh);

		if($upquery) {
			$upselect = "SELECT id, title, date, thumbnail, caption, story FROM article WHERE id = '$id'";
			$selquery = mysql_query($upselect, $dbh);

			while($c = mysql_fetch_array($selquery, MYSQL_NUM)) {
				if (strlen($c[3]) == 0) {
					$c[3] = "No Image";
				}
				else {
					$c[3] = "[ <a href=\"http://www.everide.org/articles/images/$c[3]\">$c[3]</a> ]";
				}
				printf ("
<h2 align=\"center\">Updated Article: <i>%s</i></h2>

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
	<td colspan=\"2\" align=\"center\">[ <a href=\"edit_story.php?id=$id&edit=getstory\">Edit Again</a> ] | [ <a href=\"http://www.everide.org/story_f.php?id=$id\" target=\"_blank\">Read Story</a> ] | [ <a href=\"story_list.php\">Article Listing</a> ]</td>
</tr>
</table>
", $c[1], $c[0], $c[1], $c[2], $c[3], $c[4], nl2br($c[5]));
			}
		}
		else {
			print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">Your query didn't go through. Please try again, or go back to the <a href=\"story_list.php\">Article Listing</a>.</p>";
		}

	}
	elseif (isset($noedit)) {
		print "<p align=\"center\">No Changes Were made to your Article.</p>\n\n<p align=\"center\">[ <a href=\"story_list.php\">Article Listing</a> ]</p>";
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">No Article was found for editing, please view the <a href=\"story_list.php\">Article Listing</a> to edit an article.</p>";
	}
}

?>
</body>
</html>

<?php
mysql_close($dbh);
?>