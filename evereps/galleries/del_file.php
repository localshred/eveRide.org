<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

if($del == 'maybe') {
	$cs = " colspan='2'";
}
else {
	$cs = '';
}
?>

<html>
<head>
<title>Delete Event</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2 align="center">Delete A Gallery File</h2>
<table border="0" cellspacing="0" cellpadding="3" align="center">
<?php
if($del == 'maybe') {
	$select = "SELECT id, file FROM photo WHERE id = '$id'";
	$query = mysql_query($select, $dbh);
	
	while($row = mysql_fetch_array($query, MYSQL_NUM)) {
		if(mysql_num_rows($query) == 0) {
			print "
<tr>
	<td$cs><strong>Could Not Find the ".ucfirst($var)." File you were looking for</strong></td>
</tr>			
";
		}
		else {
			printf ("
<tr>
	<td$cs><strong>Delete <i>%s</i> from the ".ucfirst($var)." Directory?</strong></td>
</tr>
<tr>
	<td align=\"center\">[ <strong><a href=\"del_file.php?var=$var&id=%s&file=%s&del=yes\">YES</a></strong> ]</td>
	<td align=\"center\">[ <strong><a href=\"del_file.php?var=$var&id=%s&file=%s&del=no\">NO</a></strong> ]</td>
</tr>			
", $row[1], $row[0], $row[1], $row[0], $row[1]);
		}
	}
}
elseif($del == 'yes') {
	$delete = "DELETE FROM photo WHERE id = '$id'";
	$query = mysql_query($delete, $dbh);
	
	if(mysql_affected_rows() == 1) {
		print "
<tr>
	<td$cs><strong>$file Deleted from Database</strong></td>
</tr>
";
	}
	else {
		print "
<tr>
	<td$cs><strong>Could Not Find $file in the Database</strong></td>
</tr>			
";
	}
	
	$a = array(
		'photo' => '/home/everideo/public_html/gallery/',
		'shirt' => '/home/everideo/public_html/shirt/',
		'terrain' => '/home/everideo/public_html/terrain/',
		'article' => '/home/everideo/public_html/articles/images/'
		);
	$delete_file = unlink($a["$var"].$file);

	if ($delete_file) {
		print "
<tr>
	<td$cs><strong>$file Deleted Successfully</strong></td>
</tr>
";
	}
	else {
		print "
<tr>
	<td$cs><strong>$file Was Not Deleted</strong></td>
</tr>
";
	}
}
elseif($del == 'no') {
			print "
<tr>
	<td$cs><strong>$file was not Deleted</strong></td>
</tr>
";
}
else {
			print "
<tr>
	<td$cs><strong>You Must Specify a File to Delete</strong></td>
</tr>
";
}
?>
<tr>
	<td<?php echo $cs; ?>>&nbsp;</td>
</tr>
<tr>
	<td<?php echo $cs; ?> align="center">[ <a href="list.php?var=<?php echo $var; ?>">Galleries Admin</a> ]</td>
</tr>
</table>
</body>
</html>

<?php
mysql_close($dbh);
?>