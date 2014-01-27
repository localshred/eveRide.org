<?php
if (!isset($var) || $var == '') {
	header("location:https://www.everide.org/~everideo/evereps/galleries/var.php");
}

$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db("everideo_ss", $dbh);

$a = array(
		'photo' => 'localphoto_f.php',
		'shirt' => 'shirtcontest_f.php',
		'terrain' => 'terrainsketch_f.php',
		'article' => ''
		);
?>

<html>
<head>
<title>Galleries Admin</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2> Galleries Administration</h2>

<table border="0" cellspacing="0" cellpadding="3" width="500">
<tr>
	<td colspan="4">[ <strong><a href="../var.php">Upload a New File</a></strong> | <a href="var.php">Select Another Gallery</a> | <a href="../everteam.php">Megaman Home</a> ]</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<tr>
	<td colspan="4"><strong><?php echo ucfirst($var); ?> Gallery</strong> [ <a href="http://www.everide.org/<?php echo $a["$var"]; ?>" target="_new">View Dir</a> ]</td>
</tr>
<?php
$newsel = "SELECT id, file FROM photo WHERE type = '$var' ORDER BY file";
$newquery = mysql_query($newsel, $dbh);

if(mysql_num_rows($newquery) == 0) {
	print "
<tr>
	<td width=\"15\">&nbsp;</td>
	<td colspan=\"3\">No Images/Designs Found in the ".ucfirst($var)." Directory</td>
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
	<td width=\"305\">%s</td>
	<td width=\"175\">[ <a href=\"view_file.php?id=%s&var=$var\" >View</a> | <a href=\"edit_file.php?id=%s&edit=getfile&var=$var\">Edit</a> | <a href=\"del_file.php?id=%s&del=maybe&var=$var\">Delete</a> ]</td>
</tr>
", $new[0], $new[1], $new[0], $new[0], $new[0]);
		$i++;
		$i %= 2;
	}
}
?>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
</table>

</body>
</html>

<?php
mysql_close($dbh);
?>