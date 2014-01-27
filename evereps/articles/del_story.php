<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_news',$dbh);

if($del == 'maybe') {
	$cs = " colspan='2'";
}
else {
	$cs = '';
}
?>

<html>
<head>
<title>Delete an Article</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>

<h2>Delete An Article</h2>
<table border="0" cellspacing="0" cellpadding="3">
<?php
if($del == 'maybe') {
	$select = "SELECT title FROM article WHERE id = '$id'";
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
	<td$cs><strong>Delete the Article entitled <i>%s</i></strong></td>
</tr>
<tr>
	<td align=\"center\">[ <strong><a href=\"del_story.php?id=$id&del=yes\">YES</a></strong> ]</td>
	<td align=\"center\">[ <strong><a href=\"del_story.php?id=$id&del=no\">NO</a></strong> ]</td>
</tr>			
", $row[0]);
		}
	}
}
elseif($del == 'yes') {
	$delete = "DELETE FROM article WHERE id = '$id'";
	$query = mysql_query($delete, $dbh);
	
	if(mysql_affected_rows() == 1) {
		print "
<tr>
	<td$cs><strong>Article Deleted Succesfully</strong></td>
</tr>
";
	}
	else {
		print "
<tr>
	<td$cs><strong>Could Not Find the Article you were looking for</strong></td>
</tr>			
";
	}
}
elseif($del == 'no') {
			print "
<tr>
	<td$cs><strong>Article was not deleted</strong></td>
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