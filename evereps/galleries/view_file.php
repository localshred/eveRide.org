<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db("everideo_ss", $dbh);
?>

<html>
<head>
<title>Gallery Administration</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>

<?php
if ($id) {

	$a = array(
		'photo' => '../../gallery/',
		'shirt' => '../../shirt/',
		'terrain' => '../../terrain/',
		'article' => '../../articles/images/'
		);

	$select = "SELECT id, file, title, credit, type, height FROM photo WHERE id = '$id'";
	$query = mysql_query($select, $dbh);
	
	if ($query) {
		while($row = mysql_fetch_array($query, MYSQL_NUM)) {
			if (empty($row[2])) {
				$title = "No Title";
			}
			else {
				$title = $row[2]."<br><strong>(".strlen($row[2])." Characters)</strong>";
			}
			
			if (strstr($row[2], '09/11/03 - ')) {
				$img = "<img src=\"".$a["$row[4]"]."sept11th/".$row[1]."\">";
				$size = getimagesize($a["$var"]."sept11th/".$row[1]);
			}
			else {
				$img = "<img src=\"".$a["$row[4]"].$row[1]."\">";
				$size = getimagesize($a["$var"].$row[1]);
			}
			
			$row[3] = empty($row[3]) || $row[3] == '' ? "No Credit" : $row[3];
			$tbl_size = $size[0] < 700 ? 700 : $size[0];
			
			printf ("<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"$tbl_size\" align=\"center\">
<tr>
	<td align=\"center\" colspan=\"2\"><h2>File View: %s </h2></td>
</tr>
<tr>
	<td align=\"right\" width=\"40%%\"><strong>ID:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>FILE NAME:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>TITLE:</strong></td>
	<td>$title</td>
</tr>
<tr>
	<td align=\"right\"><strong>CREDIT:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>FILE TYPE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>DIMENSIONS:</strong></td>
	<td>$size[0]x$size[1] (%s)</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">$img</td>
</tr>
", ucfirst($row[4]), $row[0], $row[1], $row[3], $row[4], $row[5]);
		}
	}
}
else {
	print "
<tr>
	<td colspan=\"2\" align=\"center\">Could not bring up the info for under <strong>ID: $id</strong></td>
</tr>
";
}
?>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="center">[ <a href="edit_file.php?id=<?php echo $id; ?>&edit=getfile&var=<?php echo $var; ?>">Edit</a> | <a href="del_file.php?id=<?php echo $id; ?>&del=maybe&var=<?php echo $var; ?>">Delete</a> | <a href="list.php?var=<?php echo $var; ?>">Galleries Admin</a> ]</td>
</tr>
</table>

</body>
</html>

<?php
mysql_close($dbh);
?>