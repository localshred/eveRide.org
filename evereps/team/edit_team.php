<?php
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);
?>

<html>
<head>
<title>Edit a Team Member</title>
<link rel="stylesheet" href="../newstyle.css" type="text/css">
</head>

<body>
<?php
if($edit == 'getteam') {

	$select = "SELECT name, email, phone1, phone2, city, state, type, user, public, comments FROM team WHERE name = '$name'";
	$query = mysql_query($select, $dbh);
	
	if($query) {
		print "<form name=\"editteam\" action=\"edit_team.php?name=$name\" method=\"post\">";
		
		while ($get = mysql_fetch_array($query, MYSQL_NUM)) {
			$ad = $get[6] == '1' ? " selected" : "";
			$founder = $get[6] == 'founder' ? " selected" : "";
			$rep = $get[6] == 'Rep' ? " selected" : "";
			$rep_rider = $get[6] == 'Rider/Rep' ? " selected" : "";
			$rider = $get[6] == 'Rider' ? " selected" : "";
			printf("
<h2 align=\"center\">Edit Team: <i>%s</i></h2>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\"><strong>NAME:</strong></td>
	<td><input type=\"text\" name=\"name\" value=\"%s\" size=\"30\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>EMAIL:</strong></td>
	<td><input type=\"text\" name=\"email\" value=\"%s\" size=\"30\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>PHONE 1:</strong></td>
	<td><input type=\"text\" name=\"phone1\" value=\"%s\" size=\"15\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>PHONE 2:</strong></td>
	<td><input type=\"text\" name=\"phone2\" value=\"%s\" size=\"15\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>CITY:</strong></td>
	<td><input type=\"text\" name=\"city\" value=\"%s\" size=\"15\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>STATE:</strong></td>
	<td><input type=\"text\" name=\"state\" value=\"%s\" size=\"15\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>TYPE:</strong></td>
	<td>
		<select name=\"type\">
		<option value=\"1\"$ad>Advertisement</option>
		<option value=\"founder\"$founder>Founder</option>
		<option value=\"Rep\"$rep>Rep</option>
		<option value=\"Rider/Rep\"$rep_rider>Rider/Rep</option>
		<option value=\"Rider\"$rider>Rider</option>
		</select>
	</td>
</tr>
<tr>
	<td align=\"right\"><strong>USERNAME:</strong></td>
	<td><input type=\"text\" name=\"user\" value=\"%s\" size=\"15\"></td>
</tr>
<tr>
	<td align=\"right\"><strong>PUBLIC?</strong></td>
	<td><input type=\"text\" name=\"public\" value=\"%s\" size=\"15\"></td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>COMMENTS:</strong></td>
	<td><textarea name=\"comments\" rows=\"3\" cols=\"45\">%s</textarea></td>
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
", $get[0], $get[0], $get[1], $get[2], $get[3], $get[4], $get[5],  $get[7], $get[8], $get[9], $get[0]);
		}
		print "</form>\n\n";
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">You screwed it up. For some reason, you're query didn't go through. Go back to the <a href=\"team_list.php\">everTeam Admin</a>.</p>";
	}
}
elseif (!isset($edit) || (isset($edit) && $edit !== '1')) {
	print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">No Person was found for editing, please view the <a href=\"team_list.php\">everTeam Admin</a> to edit a team member.</p>";
}
else {
	if (isset($yesedit)) {

		$update = "UPDATE `team` SET `name`=\"$name\", `email`=\"$email\", `phone1`=\"$phone1\", `phone2`=\"$phone2\", `city`=\"$city\", `state`=\"$state\", `type`=\"$type\", `comments`=\"$comments\", `user`=\"$user\" WHERE `name`='$name'";
		$upquery = mysql_query($update, $dbh);

		if($upquery) {
			$upselect = "SELECT name, email, phone1, phone2, city, state, type, user, public, comments FROM team WHERE name = '$name'";
			$selquery = mysql_query($upselect, $dbh);

			while($c = mysql_fetch_array($selquery, MYSQL_NUM)) {
				printf ("
<h2 align=\"center\">Team Updated: <i>%s</i></h2>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"500\" align=\"center\">
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td align=\"right\"><strong>NAME:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>EMAIL:</strong></td>
	<td><a href=\"mailto:%s\">%s</a></td>
</tr>
<tr>
	<td align=\"right\"><strong>PHONE 1:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>PHONE 2:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>CITY:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>STATE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>TYPE:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>USERNAME:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\"><strong>PUBLIC?</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td align=\"right\" valign=\"top\"><strong>COMMENTS:</strong></td>
	<td>%s</td>
</tr>
<tr>
	<td colspan=\"2\">&nbsp;</td>
</tr>
<tr>
	<td colspan=\"2\" align=\"center\">[ <a href=\"edit_team.php?name=$name&edit=getteam\">Edit Again</a>  | <a href=\"team_list.php\">everTeam Admin</a> ]</td>
</tr>
</table>
", $c[0], $c[0], $c[1], $c[1], $c[2], $c[3], $c[4], $c[5], $c[6], $c[7], $c[8], $c[9]);
			}
		}
		else {
			print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">Your query didn't go through. Please try again, or go back to the <a href=\"team_list.php\">everTeam Admin</a>.</p>";
		}

	}
	elseif (isset($noedit)) {
		print "<p align=\"center\">No Changes Were made to this person.</p>\n\n<p align=\"center\">[ <a href=\"team_list.php\">everTeam Admin</a> ]</p>";
	}
	else {
		print "<h2 align=\"center\">Nope, See Ya!</h2>\n\n<p align=\"center\">No Person was found for editing, please view the <a href=\"team_list.php\">everTeam Admin</a> to edit a team member.</p>";
	}
}

?>
</body>
</html>

<?php
mysql_close($dbh);
?>