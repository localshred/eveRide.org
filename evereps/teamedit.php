<html>
<head>
<title>Edit Riders and Reps</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>

<form name="edit" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="3" class="blbody" width="400">
<?php

$noedit = "Please Contact BJ to change this information (webmaster@eveRide.org)";

//connect to table
$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);
	
	//get name from table
	$hi = "SELECT `name`,`user` FROM `team` WHERE `user`='$user'";
	$query = mysql_query($hi, $dbh);

	while ($getname = mysql_fetch_array($query, MYSQL_NUM)) {
		printf ("<h2 style=\"color: white\">Edit your profile (%s)</h2>\n", $getname[0]);
	}

$search = mysql_query("SELECT `name`, `email`, `phone1`, `phone2`, `city`, `state`, `type`, `comments`, `user`, `public` FROM `team` WHERE `user`='$user'", $dbh);
		if (mysql_num_rows($search) > 0) {
				while ($row = mysql_fetch_array($search, MYSQL_NUM)) {
					printf("<tr>\n".
							"\t<td align=\"right\"><strong>Name</strong></td>\n".
							"\t<td><input type=\"text\" name=\"name\" size=\"25\" value=\"%s\" onFocus=\"javascript:alert('$noedit');this.blur();\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Email</strong></td>\n".
							"\t<td><input type=\"text\" name=\"email\" size=\"25\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Phone 1</strong></td>\n".
							"\t<td><input type=\"text\" name=\"phone1\" size=\"15\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Phone 2</strong></td>\n".
							"\t<td><input type=\"text\" name=\"phone2\" size=\"15\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>City</strong></td>\n".
							"\t<td><input type=\"text\" name=\"city\" size=\"20\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>State</strong></td>\n".
							"\t<td><input type=\"text\" name=\"state\" size=\"5\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\" valign=\"top\"><strong>Type</strong></td>\n".
							"\t<td><input type=\"text\" name=\"type\" size=\"25\" value=\"%s\" onFocus=\"javascript:alert('$noedit');this.blur();\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Comments</strong></td>\n".							
							"\t<td><textarea name=\"comments\" cols=\"20\" rows=\"3\">%s</textarea></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Username</strong></td>\n".
							"\t<td><input type=\"text\" name=\"user\" size=\"20\" value=\"%s\" onFocus=\"javascript:alert('$noedit');this.blur();\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td colspan=\"2\"><br>Can we show the other Reps your info? <strong><a style=\"color: #FFFFFF; text-decoration: none\" href=\"javascript:void(0);\" onClick=\"javascript:alert('$noedit');this.blur();\">%s</a></strong> (Default)</td>\n".
							"</tr>\n\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], strtoupper($row[9]));
					}
				echo	"<tr>\n".
						"\t<td colspan=\"2\">&nbsp;</td>\n".
						"</tr>\n\n".
						"<tr>\n".
						"\t<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"correction\" value=\"Submit Correction\">&nbsp;&nbsp;&nbsp;<input type=\"reset\"></td>\n".
						"</tr>\n\n";
				}
		else {
			print "<p><strong>Cannot Bring up Records for $user</p></strong>";
		}

if ($_POST['correction']) {

	$name = ucwords(strtolower($name));
	$email = strtolower($email);
	$city = ucwords(strtolower($city));
	$state = strtoupper($state);
	$comments = ucfirst(strtolower($comments));

	$update_mem = mysql_query("UPDATE `team` SET `name`=\"$name\", `email`=\"$email\", `phone1`=\"$phone1\", `phone2`=\"$phone2\", `city`=\"$city\", `state`=\"$state\", `type`=\"$type\", `comments`=\"$comments\", `user`=\"$user\" WHERE `name`='$name'");
	if (!$update_mem) {
		die("Can't Edit the record under $name: ".mysql_error()."\n\n</body></html>");
	}
	else {
		$printcorrection = mysql_query("SELECT `name`, `email`, `phone1`, `phone2`, `city`, `state`, `type`, `comments`, `user`, `public` FROM `team` WHERE `name`=\"$name\"", $dbh);
		while ($row = mysql_fetch_array($printcorrection, MYSQL_NUM)) {
				printf("<tr>\n".
						"\t<td colspan=\"2\"><p><strong>%s updated successfully</strong><br></p></td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Name:</strong></td>\n".										
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Email:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Phone1:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Phone2:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>City:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>State:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td  align=\"right\"><strong>Type:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\" valign=\"top\"><strong>Comments:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>User:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Show your info?:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n", $row[0], $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
		}
	}
}

mysql_close($dbh);
?>
</table>
</form>

</body>
</html>