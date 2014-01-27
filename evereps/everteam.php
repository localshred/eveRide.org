<html>
<head>
<title>home of the eveRide team</title>
<link rel="stylesheet" href="newstyle.css" type="text/css">
</head>

<body>
<?php

$dbh = mysql_connect('localhost','everideo_bj','tunahead');
mysql_select_db('everideo_ss',$dbh);

$user = $_SERVER['PHP_AUTH_USER'];

$welcome = mysql_query("SELECT name FROM team WHERE user = '$user'", $dbh);

while ($name = mysql_fetch_array($welcome, MYSQL_NUM)) {
	printf("<h2 style=\"color: #FFFFFF\">Hey %s, Welcome to the New Reps Area</h2>", $name[0]);
}

print "<p><a href=\"teamedit.php?user=$user\" class=\"menubar\">Click Here to Edit Your Profile</a></p>\n";

if ($user == 'megaman') {

print "
<hr align=\"left\" width=\"50%\"><br>

<strong>Administrative Links</strong>

<ul>
<li><a href=\"articles/story_list.php\">Front Page Article Admin</a></li>
<li><a href=\"hevents/event_list.php\">Humanitarian Events Admin</a></li>
<li><a href=\"galleries/var.php\">Gallery Files Admin</a></li>
<li><a href=\"team/team_list.php\">everTeam Admin</a></li>
<li><a href=\"var.php\">Upload and Delete Admin</a></li>
<li><a onClick=\"javascript:window.open('stokedsigners.php','','scrollbars=yes,height=520,width=700', false);\" href=\"javascript:void(0);\">View all stoked signers</a></li>
<li><a href=\"bah.php\" target=\"_new\">All Stoked Names</a></li>
</ul>

<hr align=\"left\" width=\"50%\">
";

print "<h2>Stoked Signers<br><font style=\"font-size: 11px\">Click Any Name to View their Info, or Click the Number to View their Signers</font></h2>\n\n";

print 	"<p>\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" width=\"500\">\n".
		"<tr>\n".
		"\t<td colspan=\"2\"><h3>Advertisements</h3></td>\n".
		"</tr>\n".
		"<tr>\n".
		"\t<td colspan=\"2\">&nbsp;</td>\n".
		"</tr>\n".
		"<tr>\n";

$ad = "SELECT `name` FROM `team` WHERE `type` = 'founder' OR `type` = '1' OR `type` = 'administrator' ORDER BY `name`";
$adquery = mysql_query($ad, $dbh);

while ($ads = mysql_fetch_array($adquery, MYSQL_NUM)) {
		$adsel = "SELECT * FROM stoked WHERE refer ='$ads[0]'";
		$adqueer = mysql_query($adsel, $dbh);
		
		print	"<tr>\n".
				"\t<td width=\"25\">&nbsp;</td>\n".
				"\t<td style=\"padding-left: 15px;\"><a href=\"team/view_team.php?name=$ads[0]\">$ads[0]</a> (<a onClick=\"javascript:window.open('view.php?refer=$ads[0]','','scrollbars=yes,height=520,width=700', false);\" href=\"javascript:void(0);\">".mysql_num_rows($adqueer)."</a>)</td>\n".
				"</tr>\n";
}

print 	"<tr>\n".
		"\t<td colspan=\"2\">&nbsp;</td>\n".
		"</tr>\n".
		"<tr>\n".
		"\t<td colspan=\"2\"><h3>Rider/Reps</h3></td>\n".
		"</tr>\n".
		"<tr>\n".
		"\t<td colspan=\"2\">&nbsp;</td>\n".
		"</tr>\n".
		"<tr>\n";


$riders = "SELECT `name` FROM `team` WHERE `type`='Rider' OR `type`='Rider/Rep' ORDER BY `name`";
$ridequery = mysql_query($riders, $dbh);

while ($ride = mysql_fetch_array($ridequery, MYSQL_NUM)) {
		$ridesel = "SELECT * FROM stoked WHERE refer ='$ride[0]'";
		$ridequeer = mysql_query($ridesel, $dbh);
		
		print	"<tr>\n".
				"\t<td width=\"25\">&nbsp;</td>\n".
				"\t<td style=\"padding-left: 15px;\"><a href=\"team/view_team.php?name=$ride[0]\">$ride[0]</a> (<a onClick=\"javascript:window.open('view.php?refer=$ride[0]','','scrollbars=yes,height=520,width=700', false);\" href=\"javascript:void(0);\">".mysql_num_rows($ridequeer)."</a>)</td>\n".
				"</tr>\n";
}

print 	"<tr>\n".
		"\t<td colspan=\"2\">&nbsp;</td>\n".
		"</tr>\n".
		"<tr>\n".
		"\t<td colspan=\"2\"><h3>Reps</h3></td>\n".
		"</tr>\n".
		"<tr>\n".
		"\t<td colspan=\"2\">&nbsp;</td>\n".
		"</tr>\n".
		"<tr>\n";

$reps = "SELECT `name` FROM `team` WHERE `type`='Rep' ORDER BY `name`";
$repquery = mysql_query($reps, $dbh);

while ($rep = mysql_fetch_array($repquery, MYSQL_NUM)) {
		$repsel = "SELECT * FROM stoked WHERE refer ='$rep[0]'";
		$repqueer = mysql_query($repsel, $dbh);
		
		print	"<tr>\n".
				"\t<td width=\"25\">&nbsp;</td>\n".
				"\t<td style=\"padding-left: 15px;\"><a href=\"team/view_team.php?name=$rep[0]\">$rep[0]</a> (<a onClick=\"javascript:window.open('view.php?refer=$rep[0]','','scrollbars=yes,height=520,width=700', false);\" href=\"javascript:void(0);\">".mysql_num_rows($repqueer)."</a>)</td>\n".
				"</tr>\n";
}

print "</table>\n</p>\n";

/*	
	$getrefer = mysql_query("SELECT `name` FROM `team` ORDER BY `name`", $dbh);
	
	while($temp = mysql_fetch_array($getrefer, MYSQL_NUM)) {	
		$ssrefer[] = $temp[0];
	}
	
	print "<a name=\"top\"></a>\n\n";
	
	//open main table
	print 	"<p>\n<table class=\"blbody\" width=\"800\">\n".
			"<tr>\n".
			"<td width=\"500\" valign=\"top\">\n\n";
	
	//open signers table
	print 	"<table class=\"blbody\" style=\"border-width: 1px; border-color:black; border-style:solid\" width=\"100%\">\n".
			"<tr>\n".
			"\t<td colspan=\"2\" align=\"center\">:: ";
			
	foreach ($ssrefer as $anchor) {
		print "<a href=\"#".$anchor."\" class=\"menubar\">$anchor</a> ::";			
	}
			
	print	"</td>\n".
			"</tr>\n";
			
	foreach ($ssrefer as $key) {

		$signers = mysql_query("SELECT s.nick, s.name, s.ssdate, s.sstime, s.town, s.state, s.refer, s.comments, s.id, t.user, t.name, s.email FROM stoked s, team t WHERE t.name = '$key' AND t.name = s.refer ORDER BY s.id DESC", $dbh);
		$num_signed = mysql_num_rows($signers);

		print	"<tr>\n".
				"\t<td width=\"75%\" align=\"center\" valign=\"top\"><a name=\"$key\"></a><h3 style=\"color: #FFFFFF\">$key has referred <font style=\"font-size: 16px; font-weight: bold\">$num_signed</font> Signers</h3></td>\n".
				"\t<td valign=\"top\" align=\"right\">[<a href=\"#top\" class=\"menubar\">Back to Top</a>]</td>\n".
				"</tr>\n";

		while ($getit = mysql_fetch_array($signers, MYSQL_NUM)) {
			if($getit[6] == 'Billboard' || $getit[6] == 'Sticker' || $getit[6] == 'Flyer' || $getit[6] == 'BJ Neilsen' || $getit[6] == 'Tyler Theobald' || $getit[6] == 'Kevin Woods') {
				printf ("<tr>\n".
						"\t<td colspan=\"2\" class=\"ssinfo\"><strong>%s (%s, <a class=\"menubar\" href=\"mailto:%s\" onClick=\"javascript:alert('Please only contact this person if you want them to go to the show on Friday!\\nWe don\'t want to make them feel like their email was given out!!!');\">%s</a>)</strong><br>\n".
						"Signed on <strong>%s</strong> at <strong>%s</strong><br>\n".
						"From <strong>%s, %s</strong><br>\n".
						"</td>\n".
						"</tr>\n".
						"<tr>\n".
						"\t<td colspan=\"2\" class=\"sscomment\"><strong>Comments:</strong><br>\n%s</td>\n".
						"</tr>\n", $getit[1], $getit[0], $getit[11], $getit[11], $getit[2], $getit[3], $getit[4], $getit[5], $getit[7]);
			}
		}
	}
	print 	"</table>\n\n".
			"</td>\n".
			"<td width=\"300\" valign=\"top\">\n\n".
			"<table class=\"blbody\" style=\"border-width: 1px; border-color:black; border-style:solid\" width=\"100%\">\n".
			"<tr>\n".
			"\t<td width=\"50\">&nbsp;</td>\n".
			"\t<td width=\"250\" valign=\"top\">";

	include 'team.php';

	print	"</td>\n".
			"</tr>\n".
			"</table>\n\n".
			"</td>\n".
			"</tr>\n".
			"</table>\n\n";
*/	
}
else {

	$signers = "SELECT s.nick, s.name, s.ssdate, s.sstime, s.town, s.state, s.refer, s.comments, s.id, t.user, t.name, s.email FROM stoked s, team t WHERE t.user = '$user' AND t.name = s.refer ORDER BY s.id DESC";
	$query = mysql_query($signers, $dbh);
	
	print 	"<p>\n<table style=\"border-width: 1px; border-color:black; border-style:solid\" width=\"800\">\n".
			"<tr>\n".
			"\t<td width=\"500\" align=\"center\" valign=\"top\">As of this moment, <font style=\"font-size: 16px; font-weight: bold\">".mysql_num_rows($query)."</font> people have signed the Stoked list... BECAUSE OF YOU!</td>\n".
			"\t<td width=\"50\" rowspan=\"".((mysql_num_rows($query)) + 1)."\">&nbsp;</td>\n".
			"\t<td width=\"250\" valign=\"top\" rowspan=\"".((mysql_num_rows($query) * 2) + 1)."\">";
	
	include 'team.php';
	
	print	"</td>\n".
			"</tr>\n";
	
	while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
		printf ("<tr>\n".
				"\t<td class=\"ssinfo\"><strong>%s (%s, <a href=\"mailto:%s\" onClick=\"javascript:alert('Please only contact this person if you want them to go to the show on Friday!\\nWe don\'t want to make them feel like their email was given out!!!');\">%s</a>)</strong><br>\n".
				"Signed on <strong>%s</strong> at <strong>%s</strong><br>\n".
				"From <strong>%s, %s</strong><br>\n".
				"</td>\n".
				"</tr>\n".
				"<tr>\n".
				"\t<td class=\"sscomment\"><strong>Comments:</strong><br>\n%s</td>\n".
				"</tr>\n", $row[1], $row[0], $row[11], $row[11], $row[2], $row[3], $row[4], $row[5], $row[7]);
	}
	print 	"</table>\n</p>\n\n";
}	

mysql_close($dbh);
?>

</body>
</html>