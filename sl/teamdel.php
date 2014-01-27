<html>
<head>
<title>eveRide Humanitarian Events Administration || Delete Event</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body>
<h2 class="eventtext">Delete an Event</h2>

<p align="center">&middot; <a href="admin.php" class="menubar">Events Administration</a> &middot; <a href="addevent.php" class="menubar">Add an Event</a> &middot;</p>

<form name="del_event" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

<?php

$dbh = mysql_connect("localhost","everideo_bj","tunahead");
if (!$dbh)
	{
	die ("Couldn't connect to Database: ".mysql_error()."</body>\n</html>");
	}
mysql_select_db("everideo_events", $dbh);

if ($_POST['delete'])
{
$query = "SELECT `id` , `atitle` , `utitle`, `date` , `time` , `desc` , `donation` , `place`, `infodesc` FROM `hevents` WHERE `atitle` = '".$_POST['atitle']."'";

$getrows = mysql_query($query, $dbh);

print "<h2 class=\"eventtext\">Are you SURE you want to delete this Event?</h2>";

WHILE ($row = mysql_fetch_array($getrows, MYSQL_NUM))
	{
	printf ("<p class=\"eventtext\"><strong>ID</strong>: %s<br>\n<strong>Title</strong>: %s %s<br>\n<strong>Date</strong>: %s<br>\n<strong>Time</strong>: %s<br>\n<strong>Description</strong>: %s<br>\n<strong>Donation:</strong>: %s<br>\n<strong>Place</strong>: %s<br>\n<strong>Info Desc</strong>: %s</p>\n\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
	}

print "<p><input type=\"submit\" name=\"yes\" value=\"YES\">&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"no\" value=\"NO\"></p>\n\n<hr width=\"75%%\" color=\"#FFFFFF\">\n\n";
}
	
elseif ($_POST['yes'])
	{
	$delquery = "DELETE FROM `hevents` WHERE `atitle`='".$_POST['atitle']."'";
	$delete = mysql_query ($delquery, $dbh);
	if ($delquery)
		{
		print "<h2 class=\"eventtext\">Event Deleted Succesfully</h2>\n\n<hr width=\"75%%\" color=\"#FFFFFF\">\n\n";
		}
	else
		{
		print "<h2 class=\"eventtext\">Event was not deleted successfully, talk to BJ!</h2>\n\n<hr width=\"75%%\" color=\"#FFFFFF\">\n\n";
		}
	}

if ($_POST['no'])
	{
	print "<h2 class=\"eventtext\">Delete action cancelled by user, Event remains in database</h2>\n\n<hr width=\"75%%\" color=\"#FFFFFF\">\n\n";
	}


$ddquery = "SELECT `atitle`, `utitle` FROM `hevents`";
$gettitle = mysql_query($ddquery, $dbh);

print 	"<table border=\"0\" class=\"eventtext\">\n".
		"<tr>".
		"<td>".
		"<select name=\"atitle\">\n";
while ($rows = mysql_fetch_array($gettitle, MYSQL_NUM))
	{
	$selected = ($_POST['atitle'] == $rows[0]) ? ' selected' : '';
	printf ("\t<option value=\"%s\"%s>%s %s</option>\n", $rows[0], $selected, $rows[0], $rows[1]);
	}
print 	"</select>\n".
		"</td>\n</tr>\n</table>\n";


if (!mysql_close($dbh))
	{
	die ("Couldn't close Database: ".mysql_error."</body>\n</html>");
	}

?>

<p><input type="submit" name="delete" value="Delete Event"></p>

</form>

<p align="center">&middot; <a href="admin.php" class="menubar">Events Administration</a> &middot; <a href="addevent.php" class="menubar">Add an Event</a> &middot;</p>

</body>
</html>