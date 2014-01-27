<html>
<head>
<title>Edit Riders and Reps</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<h2 style="color: white">Edit a Humanitarian Event</h2>

<!--<p align="center">&middot; <a href="admin.php" class="menubar">Events Admin</a> &middot; <a href="addevent.php" class="menubar">Add an Event</a> &middot; <a href="delevent.php" class="menubar">Delete an Event</a> &middot;</p>-->



<form name="teamdd" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0">
<tr>
	<td align="right">Team Member to edit:</td>
	<td valign="top">					
<?php
$link = mysql_connect("localhost", "everideo_bj", "tunahead");
mysql_select_db("everideo_ss");

$query = "SELECT `name` FROM `team` ORDER BY `name`";
$getname = mysql_query($query, $link);

print "<select name=\"name\">\n";
while ($rows = mysql_fetch_array($getname, MYSQL_NUM))
	{
	printf ("\t<option value=\"%s\">%s %s</option>\n", $rows[0], $rows[0], $rows[1]);
	}
print "</select>\n";

mysql_close($link);
?>					
	</td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>

<tr>
	<td colspan="2"><input type="submit" name="editteam" value="Edit Team Member"><br><input type="reset" value="Clear"></td>
</tr>
</table>
</form>


<form name="edit" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="3">
<?php

$name = $_POST['name'];

//connect to DB
if (! $dbh = mysql_connect('localhost', 'everideo_bj', 'tunahead'))
	{
	die ("Can't Connect to Database: ".mysql_error());
	}
	
//Query table from DB	
mysql_select_db('everideo_ss');

if($_POST['editteam']) 
{
	$search = mysql_query("SELECT `name`, `email`, `phone1`, `phone2`, `city`, `state`, `type`, `comments` FROM `team` WHERE `name`='$name'", $dbh);
			if (mysql_num_rows($search) > 0)
				{
while ($row = mysql_fetch_array($search, MYSQL_NUM)) 
					{
					printf("<tr>\n".
							"\t<td align=\"right\"><strong>Name</strong></td>\n".
							"\t<td><input type=\"text\" name=\"name\" size=\"25\" value=\"%s\" onFocus=\"this.blur();\"></td>\n".
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
							"\t<td align=\"right\"><strong>Type</strong></td>\n".							
							"\t<td><input type=\"text\" name=\"type\" size=\"25\" value=\"%s\"><br>Types (case sensitive): Rider, Rider/Rep, Rep</td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Comments</strong></td>\n".							
							"\t<td><textarea name=\"comments\" cols=\"45\" rows=\"3\">%s</textarea></td>\n".
							"</tr>\n\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
					}
				echo	"<tr>\n".
						"\t<td colspan=\"2\">&nbsp;</td>\n".
						"</tr>\n\n".
						"<tr>\n".
						"\t<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"correction\" value=\"Submit Correction\">&nbsp;&nbsp;&nbsp;<input type=\"reset\"></td>\n".
						"</tr>\n\n";
				}
				else
				{
				print "<p><strong>Cannot Bring up Records for $name</p></strong>";
				}				
}

if ($_POST['correction'])

{

$name = ucwords(strtolower($name));
$email = strtolower($email);
$city = ucwords(strtolower($city));
$state = strtoupper($state);
$comments = ucfirst(strtolower($comments));

	$update_mem = mysql_query("UPDATE `team` SET `name`=\"$name\", `email`=\"$email\", `phone1`=\"$phone1\", `phone2`=\"$phone2\", `city`=\"$city\", `state`=\"$state\", `type`=\"$type\", `comments`=\"$comments\" WHERE `name`='$name'");
	if (!$update_mem)
	{
	die("Can't Edit the record under $name: ".mysql_error()."\n\n</body></html>");
	}
	else
	{
		$printcorrection = mysql_query("SELECT `name`, `email`, `phone1`, `phone2`, `city`, `state`, `type`, `comments`	 FROM `team` WHERE `name`=\"$name\"", $dbh);
		while ($row = mysql_fetch_array($printcorrection, MYSQL_NUM)) 
				{
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
						"</tr>\n", $row[0], $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
				}
	}
}

?>
</table>
</form>

<!--<p align="center">&middot; <a href="admin.php" class="menubar">Events Admin</a> &middot; <a href="addevent.php" class="menubar">Add an Event</a> &middot; <a href="delevent.php" class="menubar">Delete an Event</a> &middot;</p>-->

</body>
</html>