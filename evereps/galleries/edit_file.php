<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

$a = array(
	'photo' => '../../gallery/',
	'shirt' => '../../shirt/',
	'terrain' => '../../terrain/',
	'article' => '../../articles/images/'
);
?>

<html>
<head>
<title>Edit a Gallery File</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<?php
if($edit == 'getfile') {

	$select = "SELECT id, file, title, credit, type, height FROM photo WHERE id = '$id'";
	$query = mysql_query($select, $dbh);
	
	if($query) {
		print	"<form name=\"editfile\" action=\"edit_file.php?id=$id\" method=\"post\">\n".
				"<input type=\"hidden\" name=\"edit\" value=\"1\">\n".
				"<input type=\"hidden\" name=\"var\" value=\"$var\">\n";
		
		while ($get = mysql_fetch_array($query, MYSQL_NUM)) {

			if (strstr($get[2], '09/11/03 - ')) {
				$img = "<img src=\"".$a["$get[4]"]."sept11th/".$get[1]."\">";
				$size = getimagesize($a["$get[4]"]."sept11th/".$get[1]);
			}
			else {
				$img = "<img src=\"".$a["$get[4]"].$get[1]."\">";
				$size = getimagesize($a["$get[4]"].$get[1]);
			}
			
			$tbl_size = $size[0] < 500 ? 500 : $size[0];
			
			$photo = $var == 'photo' ? " selected" : "";
			$shirt = $var == 'shirt' ? " selected" : "";
			$terrain = $var == 'terrain' ? " selected" : "";
			$article = $var == 'article' ? " selected" : "";
			
			printf("
<h2 align=\"center\">Edit File Info: %s (".ucfirst($var).")</h2>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"$tbl_size\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\" width=\"50%%\"><strong>ID:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>FILENAME:</strong></td>
	<td><input type=\"text\" value=\"%s\" name=\"filename\" size=\"25\" onClick=\"javascript:alert('Make sure to Rename this file on the Server\\nor you're DEAD!!');\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>TITLE:</td>
	<td>".strlen($get[2])." Characters</strong> (100 MAX)</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\"><input type=\"text\" name=\"title\" value=\"%s\" size=\"100\" maxlength=\"100\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>CREDIT:</strong></td>
	<td><input type=\"text\" name=\"credit\" value=\"%s\" size=\"25\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>TYPE:</strong></td>
	<td>
	<select name=\"type\">
	<option value=\"photo\"$photo>Photo</option>
	<option value=\"shirt\"$shirt>Shirt</option>
	<option value=\"terrain\"$terrain>Terrain</option>
	<option value=\"article\"$article>Article</option>
	</select>
	</td>
</tr>
<tr>
	<td align=\"right\"><strong>HEIGHT:</strong></td>
	<td>$size[0]x$size[1] (%s)</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">$img</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"yesedit\" value=\"Update %s\">&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"noedit\" value=\"Don't Update\"></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"javascript:history.go(-1);\">Go Back</a>  | <a href=\"list.php?var=$var\">Galleries Admin</a> ]</td>
</tr>
</table>
", $get[1], $get[0], $get[1], $get[2], $get[3], $get[5], $get[1]);
		}
		print "</form>\n\n";
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">You screwed it up. For some reason, you're query didn't go through. Go back to the <a href=\"list.php?var=$var\">Galleries Admin</a>.</p>";
	}
}
elseif (!isset($edit) || (isset($edit) && $edit !== '1')) {
	print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">No File was found for editing, please view the <a href=\"list.php?var=$var\">Galleries Admin</a> to edit a file.</p>";
}
else {
	if (isset($yesedit)) {
	
		$credit = empty($credit) ? "No Credit" : $credit;
		while (strstr($title, '"')) {
			$title = substr_replace($title, "'", strpos($title, '"'), 1);
		}
		
		$update = "UPDATE `photo` SET `file` = \"$filename\", `title`=\"$title\", `credit`=\"$credit\", `type` = \"$type\" WHERE `id`='$id'";
		$upquery = mysql_query($update, $dbh);

		if($upquery) {
			$upselect = "SELECT id, file, title, credit, type, height FROM photo WHERE id = '$id'";
			$selquery = mysql_query($upselect, $dbh);

			while($c = mysql_fetch_array($selquery, MYSQL_NUM)) {

				if (empty($c[2])) {
					$title = "No Title";
				}
				else {
					$title = $c[2]."<br><strong>(".strlen($c[2])." Characters)</strong>";
				}
			
				if (strstr($c[2], '09/11/03 - ')) {
					$img = "<img src=\"".$a["$c[4]"]."sept11th/".$c[1]."\">";
					$size = getimagesize($a["$c[4]"]."sept11th/".$c[1]);
				}
				else {
					$img = "<img src=\"".$a["$c[4]"].$c[1]."\">";
					$size = getimagesize($a["$c[4]"].$c[1]);
				}
				
				$tbl_size = $size[0] < 700 ? 700 : $size[0];

				printf ("
<h2 align=\"center\">File Updated Succsessfully: %s (".ucfirst($var).")</h2>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"$tbl_size\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\" width=\"50%%\"><strong>ID:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>FILENAME:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>TITLE:</strong></td>
	<td>$title</strong></td>
</tr>
<tr>
	<td align=\"right\"><strong>CREDIT:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>TYPE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>HEIGHT:</strong></td>
	<td>$size[0]x$size[1] (%s)</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">$img</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"edit_file.php?id=$id&edit=getfile&var=$var\">Edit Again</a>  | <a href=\"list.php?var=$var\">Galleries Admin</a> ]</td>
</tr>
</table>
", $c[1], $c[0], $c[1], $c[3], $c[4], $c[5], $c[1]);
			}
		}
		else {
			print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">Your query didn't go through. Please try again, or go back to the <a href=\"list.php?var=$var\">Galleries Admin</a>.</p>";
		}

	}
	elseif (isset($noedit)) {
		print "<p align=\"center\">No Changes Were made to this file.</p>\n\n<p align=\"center\">[ <a href=\"list.php?var=$var\">Galleries Admin</a> ]</p>";
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">No file was found for editing, please view the <a href=\"list.php?var=$var\">Galleries Admin</a> to edit another file.</p>";
	}
}

?>
</body>
</html>

<?php
mysql_close($dbh);
?>