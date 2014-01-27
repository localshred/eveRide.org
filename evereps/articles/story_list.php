<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);
?>

<html>
<head>
<title>View Articles</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>

<h2>Article Listing</h2>

<table border="0" cellspacing="0" cellpadding="3" width="550">
<tr>
	<td colspan="4">[ <strong><a href="add_story.php">Add A New Article</a></strong> | <a href="../everteam.php">Megaman Home</a> ]</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<tr>
	<td colspan="4"><strong>New Articles</strong> (Newest First)</td>
</tr>
<?php
$newsel = "SELECT id, title FROM article ORDER BY id DESC";
$newquery = mysql_query($newsel, $dbh);

if(mysql_num_rows($newquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"3\">No Entries Found</td>
</tr>
";
}
else {
	$i = 1;
	while($new = mysql_fetch_array($newquery, MYSQL_NUM)) {
		$color = ($i == 1) ? "#1a5c8a" : "#000000";
		
		printf ("
<tr bgcolor=\"$color\">
	<td width=\"15\">&nbsp;</td>
	<td width=\"5\">%s</td>
	<td width=\"300\">%s</td>
	<td>[ <a href=\"http://www.everide.org/story_f.php?id=%s\" target=\"_blank\">Read</a> | <a href=\"edit_story.php?id=%s&edit=getstory\">Edit</a> | <a href=\"move_story.php?id=%s&move=maybe&table=article\">Move</a> | <a href=\"del_story.php?id=%s&del=maybe\">Delete</a> ]</td></tr>
", $new[0], $new[1], $new[0], $new[0], $new[0], $new[0]);
		$i++;
		$i %= 2;
	}
}
?>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<tr>
	<td colspan="4"><strong>Old Articles</strong> (Newest First)</td>
</tr>
<?php
$oldsel = "SELECT id, title FROM old_article ORDER BY id DESC";
$oldquery = mysql_query($oldsel, $dbh);

if(mysql_num_rows($oldquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"3\">No Entries Found</td>
</tr>
";
}
else {
	$i = 1;
	while($old = mysql_fetch_array($oldquery, MYSQL_NUM)) {
		$color = ($i == 1) ? "#1a5c8a" : "#000000";
		
		printf ("
<tr bgcolor=\"$color\">
	<td width=\"15\">&nbsp;</td>
	<td width=\"5\">%s</td>
	<td width=\"300\">%s</td>
	<td>[ <a href=\"http://www.everide.org/story_f.php?id=%s\" target=\"_blank\">Read</a> | <a href=\"edit_story.php?id=%s&edit=getstory\">Edit</a> | <a href=\"move_story.php?id=%s&move=maybe&table=old_article\">Move</a> | <a href=\"del_story.php?id=%s&del=maybe\">Delete</a> ]</td>
</tr>
", $old[0], $old[1], $old[0], $old[0], $old[0], $old[0]);
		$i++;
		$i %= 2;
	}
}
?>
</table>
</body>
</html>

<?php
mysql_close($dbh);
?>