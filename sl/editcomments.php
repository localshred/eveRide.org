<html>
<head>
<title>Edit Humanitarian Event</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<h2 style="color: white">Edit a Stoked List Comment</h2>

<p><a onClick="javascript:window.open('sort_signers.php','','scrollbars=yes,height=520,width=640', false);" href="javascript:void(0);" class="menubar">View all stoked signers</a></p>

<form name="eventdd" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0">
<tr>
	<td align="right">Stoked Comments to Edit:</td>
	<td valign="top">					
<?php
$link = mysql_connect("localhost", "everideo_bj", "tunahead");
mysql_select_db("everideo_ss");

$query = "SELECT `id` FROM `stoked` ORDER BY `id` DESC";
$gettitle = mysql_query($query, $link);

print "<select name=\"commentid\">\n";
while ($rows = mysql_fetch_array($gettitle, MYSQL_NUM))
	{
	printf ("\t<option value=\"%s\">%s</option>\n", $rows[0], $rows[0]);
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
	<td colspan="2"><input type="submit" name="editcomment" value="Edit Selected Comment"><br><input type="reset" value="Clear"></td>
</tr>
</table>
</form>


<form name="edit" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="3">
<?php

$commentid = $_POST['commentid'];

//connect to DB
if (! $dbh = mysql_connect('localhost', 'everideo_bj', 'tunahead'))
	{
	die ("Can't Connect to Database: ".mysql_error());
	}
	
//Query table from DB	
mysql_select_db('everideo_ss');

if($_POST['editcomment']) 
{
	$searchtitle = mysql_query("SELECT `id`, `ssdate`, `sstime`, `name`, `email`, `age`, `town`, `state`, `nick`, `comments` FROM `stoked` WHERE `id`='$commentid'", $dbh);
			if (mysql_num_rows($searchtitle) > 0)
				{
while ($row = mysql_fetch_array($searchtitle, MYSQL_NUM)) 
					{
					printf("<tr>\n".
							"\t<td align=\"right\"><strong>ID</strong></td>\n".
							"\t<td><input type=\"text\" name=\"id\" size=\"4\" value=\"%s\" onFocus=\"this.blur();\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Date</strong></td>\n".
							"\t<td><input type=\"text\" name=\"ssdate\" size=\"12\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Time</strong></td>\n".
							"\t<td><input type=\"text\" name=\"sstime\" size=\"12\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Name</strong></td>\n".
							"\t<td><input type=\"text\" name=\"name\" size=\"25\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Email</strong></td>\n".							
							"\t<td><input type=\"text\" name=\"email\" size=\"25\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Age</strong></td>\n".
							"\t<td><input type=\"text\" name=\"age\" size=\"5\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Town</strong></td>\n".							
							"\t<td><input type=\"text\" name=\"town\" size=\"25\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>State</strong></td>\n".							
							"\t<td><input type=\"text\" name=\"state\" size=\"5\" value=\"%s\"></td>\n".
							"</tr>\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Nickname</strong></td>\n".							
							"\t<td><input type=\"text\" name=\"nick\" size=\"25\" value=\"%s\"></td>\n".
							"</tr>\n\n\n<tr>\n".
							"\t<td align=\"right\"><strong>Comments</strong></td>\n".							
							"\t<td><textarea name=\"comments\" cols=\"45\" rows=\"8\">%s</textarea></td>\n".
							"</tr>\n\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
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
				print "<p><strong>Cannot Bring up Comment $commentid</p></strong>";
				}				
}

if ($_POST['correction'])
{

$name = stripslashes(ucwords(strtolower($name)));
$email = stripslashes(strtolower($email));
$town = stripslashes(ucwords(strtolower($town)));
$state = stripslashes(strtoupper($state));
$nick = stripslashes(strtolower($nick));
$comments = stripslashes(ucfirst(strtolower($comments)));

	$updatetitle = mysql_query("UPDATE `stoked` SET `id`=\"$id\", `nick`=\"$nick\", `ssdate`=\"$ssdate\", `sstime`=\"$sstime\", `name`=\"$name\", `email`=\"$email\", `age`=\"$age\", `town`=\"$town\", `state`=\"$state\", `comments`=\"$comments\" WHERE `id`='$id'");
	if (!$updatetitle)
	{
	die("Can't Edit Comment $commentid: ".mysql_error()."\n\n</body></html>");
	}
	else
	{
		$printcorrection = mysql_query("SELECT `id`, `ssdate`, `sstime`, `name`, `email`, `age`, `town`, `state`, `nick`, `comments` FROM `stoked` WHERE `id`='$id'", $dbh);
		while ($row = mysql_fetch_array($printcorrection, MYSQL_NUM)) 
				{
				printf("<tr>\n".
						"\t<td colspan=\"2\"><p><strong>Comment $commentid has been Corrected Succesfully</strong><br></p></td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>ID:</strong></td>\n".										
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>SSDate:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>SSTime:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\"><strong>Name:</strong></td>\n".						
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Email:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Age:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Town:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\" valign=\"top\"><strong>State:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td valign=\"top\" align=\"right\"><strong>Nickname:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n\n<tr>\n".
						"\t<td align=\"right\" valign=\"top\"><strong>Comments:</strong></td>\n".
						"\t<td>%s</td>\n".
						"</tr>\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
				}
	}
}

?>
</table>
</form>

</body>
</html>