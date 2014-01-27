<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);

$move_to = $table == 'article' ? 'old_article' : 'article';

if($move == 'maybe') {
	$cs = " colspan='2'";
}
else {
	$cs = '';
}
?>

<html>
<head>
<title>Move an Article</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>

<h2>Move An Article</h2>
<table border="0" cellspacing="0" cellpadding="3">
<?php
if($move == 'maybe') {
	$select = "SELECT title FROM $table WHERE id = '$id'";
	$query = mysql_query($select, $dbh);
	
	while($row = mysql_fetch_array($query, MYSQL_NUM)) {
		if(mysql_num_rows($query) == 0) {
			print "
<tr>
	<td$cs><strong>Could Not Find the Article you were looking for</strong></td>
</tr>			
";
		}
		else {
			printf ("
<tr>
	<td$cs><strong>Move the Article entitled <em>%s</em> to the <em>".ucwords($move_to)."</em> Table?</strong></td>
</tr>
<tr>
	<td align=\"center\">[ <strong><a href=\"move_story.php?id=$id&move=yes&table=$table\">YES</a></strong> ]</td>
	<td align=\"center\">[ <strong><a href=\"move_story.php?id=$id&move=no&table=$table\">NO</a></strong> ]</td>
</tr>			
", $row[0]);
		}
	}
}
elseif($move == 'yes') {
	$move_it = "INSERT INTO $move_to SELECT * FROM $table WHERE id = '$id'";
	$query = mysql_query($move_it, $dbh);
	
	if(mysql_affected_rows() == 1) {
		print "
<tr>
	<td$cs><strong>Article Moved Succesfully to <em>$move_to</em></strong></td>
</tr>
";
		$delete = "DELETE FROM $table WHERE id = '$id'";
		$query = mysql_query($delete, $dbh);
		
		if(mysql_affected_rows() == 1) {
			print "
<tr>
	<td$cs><strong>Article Deleted Succesfully from <em>$table</em></strong></td>
</tr>
";
		}
		else {
			print "
<tr>
	<td$cs><strong>Article wasn't deleted from <em>$table</em></strong></td>
</tr>			
	";
		}
	}
	else {
		print "
<tr>
	<td$cs><strong>Could Not Find the Article you were looking for</strong></td>
</tr>			
";
	}
}
elseif($move == 'no') {
			print "
<tr>
	<td$cs><strong>Article was not Moved</strong></td>
</tr>
";
}
else {
			print "
<tr>
	<td$cs><strong>You Must Specify an Article</strong></td>
</tr>
";
}
?>
<tr>
	<td<?php echo $cs; ?>>&nbsp;</td>
</tr>
<tr>
	<td<?php echo $cs; ?> align="center">[ <strong><a href="story_list.php">Article Listing</a></strong> ]</td>
</tr>
</table>
</body>
</html>

<?php
mysql_close($dbh);
?>