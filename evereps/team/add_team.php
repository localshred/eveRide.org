<html>
<head>
<title>Add a Rep/Rider</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<h2 align="center">Add a New Rep or Rider</h2>

<table border="0" cellspacing="0" cellpadding="3" width="500" align="center">
<?php
if (!isset($yesadd)) {
	print "
<form name=\"addteam\" action=\"add_team.php\" method=\"post\">
<tr>
  <td align=\"right\">Name: </td>
  <td><input type=\"text\" name=\"name\" size=\"25\"></td>
</tr>
<tr>
  <td align=\"right\">Email: </td>
  <td><input type=\"text\" name=\"email\" size=\"25\"></td>
</tr>
<tr>
  <td align=\"right\">Phone: </td>
  <td><input type=\"text\" name=\"phone1\" size=\"10\"></td>
</tr>
<tr>
  <td align=\"right\">Phone 2: </td>
  <td><input type=\"text\" name=\"phone2\" size=\"10\"></td>
</tr>
<tr>
  <td align=\"right\">City: </td>
  <td><input type=\"text\" name=\"city\" size=\"20\"></td>
</tr>
<tr>
  <td align=\"right\">State: </td>
  <td><input type=\"text\" name=\"state\" size=\"4\" maxlength=\"2\"></td>
</tr>
<tr>
  <td align=\"right\">Team Type: </td>
  <td><select name=\"type\">
      <option value=\"Rep\">Rep</option>
      <option value=\"Rider\">Rider</option>
      <option value=\"Rider/Rep\">Rider/Rep</option>
      </select>
  </td>
</tr>
<tr>
  <td align=\"right\" valign=\"top\">Comments: </td>
  <td><textarea name=\"comments\" cols=\"25\" rows=\"3\"></textarea></td>
</tr>
<tr>
  <td align=\"right\">Username: </td>
  <td><input type=\"text\" name=\"user\" size=\"20\"></td>
</tr>
<tr>
  <td align=\"right\">Public: </td>
  <td><input type=\"text\" name=\"public\" size=\"10\" value=\"yes\"></td>
</tr>
<tr>
  <td coslspan=\"2\">&nbsp;</td>
</tr>
<tr>
  <td align=\"center\" colspan=\"2\"><input type=\"submit\" name=\"yesadd\" value=\"Add that Beeeeach!\">&nbsp;&nbsp;&nbsp;<input type=\"reset\" name=\"reset\" value=\"Clear Fields\"></td>
</tr>
<tr>
<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"team_list.php\">everTeam Admin</a> ]</td>
</tr>
";
}


if ($yesadd == 'Add that Beeeeach!') {
	$dbh = mysql_connect("localhost","everideo_bj","tunahead");
	mysql_select_db("everideo_ss", $dbh);

	$insertquery = "INSERT INTO `team` (`name`, `email`, `phone1`, `phone2`, `city`, `state`, `type`, `comments`, `user`, `public`) VALUES ('$name', '$email', '$phone1', '$phone2', '$city', '$state', '$type', '$comments', '$user', '$public')";
	$insert = mysql_query($insertquery, $dbh);
	
	if (!$insert) {
		print 	"<tr>\n".
				"\t<td colspan=\"2\" align=\"center\">Could not Insert $name to database. No good for shizzle.</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td colspan=\"2\">&nbsp;</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td colspan=\"2\" align=\"center\">[ <a href=\"team_list.php\">everTeam Admin</a> ]</td>\n".
				"</tr>\n";
	}
	else {
		$select = "SELECT name, email, phone1, phone2, city, state, type, comments, user, public FROM team WHERE name = '$name'";
		$query = mysql_query($select, $dbh);
		
		if ($query) {
			while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
				$row[7] = empty($row[7]) ? "No Comments" : nl2br($row[7]);
				printf ("
<tr>
	<td colspan=\"2\" align=\"center\"><strong>$name added succesfully to the everTeam</strong></td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\"><strong>Name:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Email:</strong></td>
	<td><a href=\"mailto:%s\">%s</a></td>
</tr>
<tr>
	<td align=\"right\"><strong>Phone 1:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Phone 2:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>City:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>State:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Type:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Username:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Info Public?</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>Comments:</strong></td>
	<td>%s</td>
</tr>
", $row[0], $row[1], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[8], $row[9], $row[7]);
			}
			print	"<tr>\n".
					"\t<td colspan=\"2\">&nbsp;</td>\n".
					"</tr>\n".
					"<tr>\n".
					"\t<td colspan=\"2\" align=\"center\">[ <a href=\"edit_team.php?name=$name&edit=getteam\">Edit</a> | <a href=\"del_team.php?name=$name&del=maybe\">Delete</a> | <a href=\"team_list.php\">everTeam Admin</a> ]</td>\n".
					"</tr>\n";

		}
		else {
		print 	"<tr>\n".
				"\t<td colspan=\"2\" align=\"center\">Could not bring up the records for $name, But they are in the database.</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td colspan=\"2\">&nbsp;</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td colspan=\"2\" align=\"center\">[ <a href=\"team_list.php\">everTeam Admin</a> ]</td>\n".
				"</tr>\n";
		}
	}
mysql_close($dbh);
}
?>
</table>
</body>
</html>