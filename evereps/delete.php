<html>
<head>
<title>Delete a Temp File</title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>

<table width="300" border="0" class="blbody" cellspacing="0" cellpadding="3" align="center">
<?php
if(!$delsubmit || count($filedel) == 0) {
	print 	"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\"><a href=\"var.php\">Click Here</a> to specify which files you need to delete.</td>\n".
			"</tr>\n";
}
else {

	$deldir = $_POST['deldir'];

	print 	"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\"><h2>Delete a Temp File</h2></td>\n".
			"</tr>\n".	
			"<tr>\n".
			"\t<td><strong>File Name</strong></td>\n".
			"\t<td><strong>Deleted?</strong></td>\n".
			"</tr>\n".
			"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n".	
			"<tr>\n";

	foreach($filedel as $key) {
		if(file_exists($deldir.$key)) {
			$delete = unlink($deldir.$key);
			if($delete) {
				print 	"<tr>\n".
						"\t<td>$key</td>\n".
						"\t<td>YES</td>\n".
						"</tr>\n";
			}
			else {
				print 	"<tr>\n".
						"\t<td>$key</td>\n".
						"\t<td>NO</td>\n".
						"</tr>\n";
			}
		}
		else {
			print 	"<tr>\n".
					"\t<td>$key</td>\n".
					"\t<td>Doesn't Exist</td>\n".
					"</tr>\n";
		}
	}
	print 	"<tr>\n".
			"\t<td colspan=\"2\">&nbsp;</td>\n".
			"</tr>\n".
			"<tr>\n".
			"\t<td colspan=\"2\">[ <strong><a href=\"var.php\">Back To Upload Types and Actions</a></strong> ]</td>\n".
			"</tr>\n";
}
?>
</table>
</body>
</html>